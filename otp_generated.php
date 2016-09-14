<?php 

#To display Error if any on php file
ini_set('display_errors',1);

#Creating a Session to Access Logined User Details.

session_start();

#Storing value in local variable from Session variable.
$aadhar_no=$_SESSION["user"];


#Connecting Mongodb
$connection = new MongoClient();


#connecting to our database.
$db=$connection->OVS;

#Connection to Aadhar Collection.
$collection=$db->aadhar_info;


#Connection to User Collection.
$collection1=$db->user_login;

#Storing OTP to send through emails and message.
$search=$collection->find();
foreach ($search as $document) 
{
	if($document["_aadhar_no"]==$aadhar_no)
		{
		$otp_password=$document["otp_password"];
		}
}


#Sending OTP To Mail

#Mail subject
$otp_subject="OTP For Login";

#Mail Message 
$otp_message="The One Time Password For Login is ".$otp_password."\nDon't Share it with anyone.\n";

#Retrieving data from User collection
$search=$collection1->find();

echo $aadhar_no;

foreach ($search as $document) 
{

    #Checking For Aadhar No./home/anurag
	if($document["_aadhar_no"]==$aadhar_no)
		{

			#Mail Being Sent
			$result=mail($document["email_id"],$otp_subject,$otp_message);

			echo $result;
			#To pass it to message function
			$mobile=$document["Mobile_no"];

			#To pass it to message function.
			$email=$document["email_id"];
		}
}


#OTP being send To Number

#Including API file for sms.
include ('way2sms.php');
#using function
send_sms('9028253118','Punit1301',$mobile,$otp_message);

$alert_message="Mail and Message with OTP had been send to ".substr_replace($email, '*****',5, -10)." and ".substr_replace($mobile, '*****',5);

#showing for confirmation.	
echo "<script type='text/javascript'> alert('$alert_message'); location='otp.html';</script>";
		die();
 ?>