<?php


#Creating a Session to Access Logined User Details.
session_start();

#To Store user in session variable.
$_SESSION["user"]=$_POST["_aadhar_no"];

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

#Password of User.
$password=$_POST["password"];

#Aadhar No of User.
$aadhar_no=$_POST["_aadhar_no"];


#function to  Generate OTP
$otp=rand(100000,999999);

#Updating the otp with new one on every login.
$collection->update(array("_aadhar_no" => $aadhar_no),array('$set'=>array('otp_password' => $otp)));

#To check if Aadhar no is invalid or password.
$flag_aadhar=0;

#To check if Aadhar no is invalid or password.
$flag_password=0;

#Retrieving data from database and User Collection.
$search=$collection1->find();

#Looking up in User Login info
foreach ($search as $document) 
{
	#To match the aadhar No. from User Collection.
	if($document["_aadhar_no"]==$aadhar_no)
		{
			#Valid Aadhar No. found.
			$flag_aadhar=1;

			#To match the password with the Aadhar_No respectively.
			if($document["password"]==$password)
				{
					#Valid password  
					$_SESSION['login']=NULL;
					$flag_password=1;
					header('Location:otp_generated.php');
					die();
				}	
			
		}	
		
}

#To show alert if Aadhar not Registered.
if($flag_aadhar==0)
	{			
		echo "<script type='text/javascript'> alert('Aadhar No Not Registered'); location='index.php';</script>";
		session_unset();
		session_destroy();
	}
#To show alert if Password did not match.
else if($flag_password==0)
{
				echo "<script type='text/javascript'> alert('Wrong Password Entered'); location='index.php';</script>";
			session_unset();
		session_destroy();
}

?>