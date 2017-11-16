<?php
echo "S3- test page!";
require 'vendor/autoload.php';
$s3 = new Aws\S3\S3Client([
    'version' => 'latest',
    'region'  => 'us-west-2a'
]);
$result = $s3->listBuckets();
foreach ($result['Buckets'] as $bucket) {
    echo $bucket['Name'] . "\n";
}
$resultdelete = $s3->deleteObject(array(
    'Bucket' => 'raw-sz',

    'Key' => 'Status-page.png',
));
// Convert the result object to a PHP array
$array = $result->toArray();
$resultimg = $s3->putObject(array(
    'Bucket' => 'raw-sz',
    'Key'    => 'Status-page.png',
    'SourceFile' => 'Status-page.png',
    'ACL' => 'public-read',
    'Body'   => 'Hi! I am S3 test page'
));
echo $resultimg['ObjectURL'] . "<br>";
?>
<html>
<body>
<img src="<?php echo $resultimg['ObjectURL'] ?>" width="400" height="400">
</body>
</html>
