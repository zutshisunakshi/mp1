<?php
require 'vendor/autoload.php';
$client = new Aws\Rds\RdsClient([
  'region'            => 'us-west-2',
    'version'           => 'latest'
]);

$result = $client->describeDBInstances([
    'DBInstanceIdentifier' => 'sz-ITMO544'
]);
$endpoint = $result['DBInstances'][0]['Endpoint']['Address'];
echo $endpoint . "\n";
$link = mysqli_connect($endpoint,"poweruser","zaq12wsx","customers") or die("Error " . mysqli_error($link));
/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
$create_table = 'CREATE TABLE IF NOT EXISTS customers
(
id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
email VARCHAR(32),
phone VARCHAR(32),
s3-raw-url VARCHAR(32),
s3-finished-url VARCHAR(32),
status INT(1),
reciept BIGINT
)';
$create_tbl = $link->query($create_table);
if ($create_table) {
echo "Table is created or No error returned.";
}
else {
        echo "error!!";
}
$link->close();
?>
