<?php

#To display Error if any on php file
ini_set('display_errors',1);


#Connecting Mongodb
$connection = new MongoClient();

#connecting to our database.
$db=$connection->OVS;

#Connection to Aadhar Collection.
$collection=$db->aadhar_info;


#Storing data in variables 
$aadhar_no=$_POST["_aadhar_no"];
$Name=$_POST["Name"];
$Dob=$_POST["Dob"];
$Sex=$_POST["Sex"];
$Address=$_POST["Address"];
$Pincode=$_POST["Pincode"];

#Creating database document ready.
$insert_document=array(
						"_aadhar_no" =>$aadhar_no,
						"Name"=>$Name,
						"Dob"=>$Dob,
						"Sex"=>$Sex,
						"Address"=>$Address,
						"Pincode"=>$Pincode,
					);

#Saving data to database.
$collection->insert($insert_document);

?>