<?php
/**
 * Created by PhpStorm.
 * User: siteflu
 * Date: 14/9/16
 * Time: 7:14 PM
 */

#Connecting Mongodb
$connection = new MongoClient();

#connecting to our database.
$db=$connection->OVS;

#Connection to Aadhar Collection.
$collection=$db->aadhar_info;

$aadhar_number = $_POST["_aadhar_no"];

$result = $collection->remove(array('_aadhar_no' => $aadhar_number));

echo $result;

echo "<script type='text/javascript'>location='admin.php';</script>";

?>