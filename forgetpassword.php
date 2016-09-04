<?php 
#Creating a Session to Access Logined User Details.
session_start();

#Connecting Mongodb
$connection = new MongoClient();


#connecting to our database.
$db=$connection->OVS;

#Connection to Aadhar Collection.
$collection=$db->aadhar_info;

#Connection to User Collection.
$collection1=$db->user_login;

#Storing value in local variable from Session variable.
$aadhar_no=$_GET['aadhar'];

if($aadhar_no=="")
{
echo "<script type='text/javascript'> alert('Enter Aadhar No. first'); location='index.php';</script>";
die();	
}

#Retrieving data from database and User Collection.
$search=$collection1->find();

#To look for password of User.
foreach ($search as $document) 
{
	if($document["_aadhar_no"]==$aadhar_no)
		{
		#Storing the password to send as email.
		$password=$document["password"];
		}
}
#Password To Mail

#Subject of Mail to be sent.
$password_subject="Your Login Password";

#Message of the mail to be sent.
$password_message="The login Password For you is ".$password."\nDon't Share it with anyone.\n";

#Retrieving Email-id from User Collection.
$search=$collection1->find();


foreach ($search as $document) 
{
	#Looking for the aadhar details of current User.
	if($document["_aadhar_no"]==$aadhar_no)
		{
			#sending mail to User.
			$result=mail($document["email_id"],$password_subject,$password_message);
			$mobile=$document["Mobile_no"];

			#To pass it to message function.
			$email=$document["email_id"];
			/*if(!$result) 
			{ 
			#Giving alert after unsuccessful mail.
			$message="Password Could not been sent to ".substr_replace($document["email_id"], '*****',5, -10);
     		echo "<script type='text/javascript'> alert('$message'); location='index.php';</script>";
     		die();
			}
			else 
			{
			#Giving alert after unsuccessful mail.
    		$message="Password had been sent to ".substr_replace($document["email_id"], '*****',5, -10);
     		echo "<script type='text/javascript'> alert('$message'); location='index.php';</script>";}
     		die();*/

#Including API file for sms.
include ('way2sms.php');

#using function
send_sms('9028253118','Punit1301',$mobile,$password_message);


$alert_message="Mail and Message with Password had been send to ".substr_replace($email, '*****',5, -10)." and ".substr_replace($mobile, '*****',5);

#showing for confirmation.	
echo "<script type='text/javascript'> alert('$alert_message'); location='index.php';</script>";
		die();

		}	
}


#Giving alert on Invalid Aadhar No.
echo "<script type='text/javascript'> alert('Aadhar No Not Registered !!'); location='index.php';</script>";
die();

?>