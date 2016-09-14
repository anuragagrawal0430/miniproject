<?php
/**
 * Created by PhpStorm.
 * User: siteflu
 * Date: 14/9/16
 * Time: 12:19 AM
 */

#Connecting Mongodb
$connection = new MongoClient();

#connecting to our database.
$db=$connection->OVS;

#Connection to Aadhar Collection.
$collection=$db->aadhar_info;


$aadhar_number = $_POST['aadhar'];

$flag=0;

$result = $collection->find();

foreach ($result as $document)
{
    if($document["_aadhar_no"]==$aadhar_number)
    {
         echo json_encode($document);
        $flag=1;
    }
}

if($flag==0)
{
    echo "0";
}
?>

