<?php


#Creating a Session to Access Logined User Details.
session_start();

#To Store user in local variable.
$aadhar_no=$_SESSION["user"];

#To display Error if any on php file
/*ini_set('display_errors',1);*/

#Connecting Mongodb
$connection = new MongoClient();

#connecting to our database.
$db=$connection->OVS;

#Connection to Aadhar Collection.
$collection=$db->aadhar_info;

#Connection to User Collection.
$collection1=$db->user_login;


#Storing data in variables 

#To store otp password.
$otp_password=$_POST["otp_password"];

/*Checking for already voted or not*/

#Retrieving User info to check if voted or not.
/*
$search=$collection1->find();

foreach ($search as $document)
{
	if($document["_aadhar_no"]==$aadhar_no)
	{
		if(!empty($document["status"]))
		{
		header('Location:index.php');
		die();		
		}
	}
	
}
*/
#Retrieving data from database and Aadhar_info Collection.
$search=$collection->find();

foreach ($search as $document) 
{
	if($document["_aadhar_no"]==$aadhar_no)
		{
			#Checking With the Current OTP.
			if($document["otp_password"]==$otp_password)
				{
				header('Location:index.php');
				die();
				}	
		}	
}
		#Giving Alert if Wrong OTP Entered.
		echo "<script type='text/javascript'> alert('Wrong OTP Entered.Try Again !!'); location='otp.html';</script>";
		die();
?>