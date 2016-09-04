<?php
ini_set('display_errors',1);


#Connecting Mongodb
$connection = new MongoClient();
$db=$connection->OVS;
$collection=$db->aadhar_info;



$aadhar_no=$_POST["_aadhar_no"];
$Name=$_POST["Name"];
$Dob=$_POST["Dob"];
$Sex=$_POST["Sex"];
$Address=$_POST["Address"];
$Pincode=$_POST["Pincode"];

$insert_document=array(
						"_aadhar_no" =>$aadhar_no,
						"Name"=>$Name,
						"Dob"=>$Dob,
						"Sex"=>$Sex,
						"Address"=>$Address,
						"Pincode"=>$Pincode,
					);
echo "idhar aya";
$collection->insert($insert_document);
echo "idhar hag diya";
echo "<script type='text/javascript'>alert('Succesfully Created'); location='database_input.html';</script>";

?>