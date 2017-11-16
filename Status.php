<!DOCTYPE HTML>
<html>
<head><title>Customer Portal : Status Image manupulation to b/w</title>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.4/css/bootstrap.min.css">
</head>
<body>
  <div class="container">
   <h2 align="center"><a href="Submit.php">Back to Submit Images</a></h2>

   <img src="Status-page.png" alt="Status background animated" width="800" height="500" />
 </div>
</body>
</html>

<?php
// Start the session
session_start();
echo "<h3>Your Input:</h3>";
echo "Email ID : ".$_POST['email']."\n";
echo "Cell no. : ".$_POST['phone']."\n";
echo "File Uploaded : ".$_POST['userfile']."\n";
echo "\n";
$uploaddir = '/tmp/';
$uploadfile = $uploaddir . basename($_FILES['userfile']['name']);

echo '<pre>';
if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
    echo "File is valid, and was successfully uploaded.\n";
} else {
    echo "Possible file upload attack!\n";
}
echo 'File upload details:';
print_r($_FILES);

require 'vendor/autoload.php';
$s3 = new Aws\S3\S3Client([
    'version' => 'latest',
    'region'  => 'us-west-2a'
]);

// Retrieve URL of uploaded files
$s3result = $s3->putObject([
    'ACL' => 'public-read',
    'Bucket' => 'raw-vip',
    'Key' =>  basename($_FILES['userfile']['name']),
    'SourceFile' => $uploadfile
]);
$url=$s3result['ObjectURL'];
echo "</br>";
echo "\n". "Hey! Your S3 Image URL: " . $url ."\n"; echo "</br>";

//Insert the obtained user details from Submit page to DB
$rdsclient = new Aws\Rds\RdsClient([
  'region' => 'us-west-2a',
  'version' => 'latest'
]);
$rdsresult = $rdsclient->describeDBInstances([
    'DBInstanceIdentifier' => 'sz-itmo544'
]);
$endpoint = $rdsresult['DBInstances'][0]['Endpoint']['Address'];

$link = mysqli_connect($endpoint,"poweruser","zaq12wsx","customers", 3306) or die("Error " . mysqli_error($link));
/* check db connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
echo "</br>";
if (!($stmt = $link->prepare("INSERT INTO customers(id, email, phone, s3rawurl, s3finishedurl,status, receipt) VALUES (NULL, ?,?,?,?,?,?)"))) {
    echo "Prepare failed: (" . $stmt->errno . ") " . $stmt->error; echo "</br>";
}
//store the data into variables
$email=$_POST["email"];
$phone=$_POST["phone"];
$finishedurl=' ';
$status=0;
$receipt=md5($url);
// prepared statement to bind the data to insert to DB
$stmt->bind_param("sz01",$email,$phone,$url,$finishedurl, $status,$receipt);
if (!$stmt->execute()) {
    echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
}
printf("%d Result for row inserted :\n", $stmt->affected_rows);
echo "</br>";
$stmt->close();


?>
