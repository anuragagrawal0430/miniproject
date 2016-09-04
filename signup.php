<?php

session_start('signup');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="css/header.css" rel="stylesheet" type="text/css" media="screen,projection">
    <link href="css/materialize.css" rel="stylesheet" type="text/css" media="screen,projection">

    <title>Sign Up</title>
</head>
<body>
<style type="text/css">
    body
    {
        background-image: url("img/indiaSoMe.jpg");
        background-size: cover;
        background-repeat: no-repeat;
    }

</style>

<div class="container center">
    <div class="section" style="opacity:0.85;">
        <div class="sign_up card">
         <div class="row">
            <div class="col l8 m11 s10 offset-l2 offset-s1 offset-m1">
                <h5 class="pad">SIGN UP FORM</h5>
                <form method="post" action="signup_check.php" >
                    <div class="row">
                    <div class="input-field col l12 m5 s12 ">
                        <input type="text" name="_aadhar_no" id="Aadhar" value="<?php echo ($_SESSION['_aadhar_no'])?>" onkeypress="return isNumberKey(event)"  maxlength="12" required />
                        <label style=" " for="Aadhar">Aadhar Number</label>
                    </div>

                    <!-- <div class="input-field col l12 m5 s12 " style="line-height: 1em;">
                        
                        <input  name="dob" id="birthdate"  type="date" class="datepicker">
                        <label for="birthdate">Date of Birth</label>

                    </div> -->
<div class="input-field col l12 m5 s12 " style="line-height: 1em;">
                        
                        <input name="dob" id="birthdate" type="date" class="datepicker" value="<?php echo ($_SESSION['dob'])?>">
<label for="birthdate">Date of Birth</label>

                    </div>


                    <div class="input-field col l6 m5 s12 ">
                    
                            <input name="email" id="email" type="email" class="validate" value="<?php echo ($_SESSION['email'])?>" >
                            <label for="email">Email</label>
                    </div>
                    
                    <div class="input-field col l6 m5 s12 ">
                        <input  name="mobileno" id="mobileno" type="text" class="validate" value="<?php echo ($_SESSION['mobileno'])?>" onkeypress="return isNumberKey(event)" maxlength="10" required/>
                        <label for="mobileno">Mobile No</label>

                    </div>


                    <div class="input-field col l12 m11 s12 ">
                        <input type="password" id="password" name="password" required/>
                        <label for="password">Password</label>
                    </div>

                    <div class="input-field col l12 m11 s12 ">
                        <input type="password" id="Cpassword" name="Cpassword" onkeyup="valid();" required/>
                        <label for="Cpassword">Confirm Password</label>
                    </div>

                    <div id="check_pass">

                    </div></div>

                    <div class="row center">
                        <button id="signup_button" class="btn waves-effect waves-light" style="margin-right: 30px;" type="submit" name="action">Sign up
                            <i class="material-icons"></i>
                        </button>
                    </div>


                </form>
            </div>
        </div>

    </div>
</div>

</div>





<!--Scrpits-->
<script src="js/jquery-2.x.js"></script>
<script src="js/materialize1.js"></script>


<!--<script src="js/jquery-2.1.1.js"></script>-->
<!--Only Number Validation Script-->
<script>
    function isNumberKey(evt){
        var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
        return true;
    }
</script>

<!--Password Confirm Validation Script-->
<script type="text/javascript">
    function valid()
    {

        var pass="Password Match";
        var notpass="Password not Match";
             var passwd=document.getElementById('password');
             var cpasswd=document.getElementById('Cpassword');



            if(passwd.value==cpasswd.value) {
                document.getElementById("check_pass").innerHTML = pass;
                document.getElementById("check_pass").style.color= '#00DF00';
                document.getElementById("signup_button").disabled = false;
            }
            else {
                document.getElementById("check_pass").innerHTML= notpass;
                document.getElementById("check_pass").style.color= '#FF0000';
                document.getElementById("signup_button").disabled = true;
            }

    }

</script>


<!--datepicker script-->

<script type="text/javascript">
$('.datepicker').pickadate({
selectMonths: true, // Creates a dropdown to control month
selectYears: 100 // Creates a dropdown of 15 years to control year
});

</script>

<script type="text/javascript">
    $("#birthdate").datepicker(
    {
        changeMonth:true;
        changeYear:true;
        maxDate:'-18Y',
        minDate:'-100Y',
    });
</script>
</body>


</html>