<?php  

#To display Error if any on php file
/*ini_set('display_errors',1);*/

session_start('signup');
$_SESSION['_aadhar_no']=$_POST['_aadhar_no'];
$_SESSION['dob']=$_POST['dob'];
$_SESSION['email']=$_POST['email'];
$_SESSION['mobileno']=$_POST['mobileno'];


#Connecting Mongodb
$connection = new MongoClient();


#connecting to our database.
$db=$connection->OVS;

#Connection to Aadhar Collection.
$collection=$db->aadhar_info;

#Connection to User Collection.
$collection1=$db->user_login;

#To check if DOB match with given Aadhar No.
$flag_dob=0;


#Storing data in variables 

#Password of User.
$password=$_POST["password"];

#Aadhar No of User.
$aadhar_no=$_POST["_aadhar_no"];

#Date of birth of User.
$Dob=$_POST["dob"];

#Email-id of User to send otp afterwards.
$email=$_POST["email"];

#Moblile No. of User to send Otp afterwards.
$mobile_no=$_POST["mobileno"];

#Retrieving data from database and User Collection.
$search=$collection1->find();


#To Check if User already present in User Collection.
foreach ($search as $document)
{
	if($document["_aadhar_no"]==$aadhar_no)
	{
		echo "<script type='text/javascript'> alert('Aadhar Number Already Registered'); location='index.php';</script>";
		die();
	}
}

#Retrieving data from database and Aadhar_info Collection.
$search=$collection->find();
#To Check if Aadhar No. is present in Aadhar_info Collection.
foreach ($search as $document) 
{
	#To match the password with the Aadhar_No
	if($document["_aadhar_no"]==$aadhar_no)
		{
			/*echo (date('d F, Y',$document["Dob"]->sec));*/
			#To Match the date with Aadhar_info Collection Date.
			if((date('j F, Y',$document["Dob"]->sec))==$Dob)
			{

				#if Aadhar and DOB match, new user is inserted.
					$insert_document=array(
						"_aadhar_no" =>$aadhar_no,
						"password"=>$password,
						"email_id"=>$email,
						"Mobile_no"=>$mobile_no
					);

				#Inserting User in  User collection.
					$collection1->insert($insert_document);
					session_unset('signup');
					session_destroy('signup');
				#Giving a Alert after successful creation.	
					echo "<script type='text/javascript'> alert('Account Succesfully Created'); location='index.php';</script>";
					die();
			}
			#Giving a Alert when Aadhar No and DOB doesn't match.	
			$_SESSION['dob']=NULL;
			echo "<script type='text/javascript'> alert('Wrong DOB Entered'); location='signup.php';</script>";
			die();
		}	
}
$_SESSION['_aadhar_no']=NULL;
#Giving a Alert when Aadhar No not found in Aadhar_info Collection.	
echo "<script type='text/javascript'> alert('Invalid Aadhar No !!'); location='signup.php';</script>";
die();
?>