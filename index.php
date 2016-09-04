<?php

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

session_start();
$starttime=strtotime('16-06-22 18:11:00');
$endtime=strtotime('16-10-10 18:48:30');

echo "<script>console.log($starttime,$endtime);</script>";

$_SESSION['endtime']=$endtime;
$_SESSION['starttime']=$starttime;
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>OVS | Each Vote Counts</title>
    <link href="css/header.css" type="text/css" rel="stylesheet"/>
    <link href="css/animate.css" type="text/css" rel="stylesheet"/>
    <link href="css/materialize.css"  type="text/css" rel="stylesheet" media="screen,projection"/>
    <link rel="icon" type="image/png" sizes="32x32" href="img/favicon.ico">
    <link rel="icon" type="image/png" sizes="96x96" href="img/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="img/favicon-16x16.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>

 <style>

        div.nav-wrapper.container img
        {
            margin-top: -8px;max-height: 100px
        }
        div.fixed-action-btn.vote
        {
            bottom: 38%; right: 24px
        }
        @media only screen and (max-width: 600px) {
            div.fixed-action-btn.vote
            {
                bottom: 25%;
            }

            div.nav-wrapper.container img
            {
                margin-top: -3px;max-height: 75px
            }

        }

    </style>

</head>
<body>
<nav id="navi" role="navigation">
    <div class="nav-wrapper container">

        <!--<span style="font-size: 2em; font-family: robto;">Each Vote Counts</span>-->

       <img src="img/download%20(3).png" height="100" style="margin-top: -8px"/>

        <ul class="right hide-on-med-and-down">
            <li><a href="#" class="waves-effect waves-green waves-ripple" id="select"> &nbsp; Home</a></li>
            <li><a href="#party" class="waves-effect waves-green waves-ripple"> &nbsp; &nbsp; Parties</a></li>
            <li><a href="candidate.html" class="waves-effect waves-green waves-ripple"> &nbsp; &nbsp;Candidates</a></li>
            <li><a href="#contact" class="waves-effect waves-green waves-ripple"> &nbsp; &nbsp;About Us</a></li>
            <li><a href="#contact" class="waves-effect waves-green waves-ripple"> &nbsp; &nbsp;Contact Us</a></li>
            <?php
            if(!isset($_SESSION["user"]))
            {
	           	echo "<li><a href='#signin' class='waves-effect waves-green waves-ripple modal-trigger'> &nbsp; &nbsp;Sign In</a></li>";
            }
            else{
            	$search=$collection->find();
            	foreach ($search as $document )
            	 {
            		if($_SESSION["user"]==$document["_aadhar_no"])
            			$user=$document["Name"];
            	}
            	echo "<li><a class='dropdown-button' href='#' data-activates='dropdown1'>$user</a><ul id='dropdown1' class='dropdown-content'>
<li><a href='#change_pass' class='waves-effect waves-green waves-ripple modal-trigger'>Change Password</a></li><li><a href='logout.php'>Log Out</a></li></ul></li>";
            }

            ?>
        </ul>
        <ul id="slide-out" class="side-nav">
            <li><a href="#" class="waves-effect waves-green waves-ripple"> &nbsp; Home</a></li>
            <li><a href="#party" class="waves-effect waves-green waves-ripple"> &nbsp; &nbsp; Parties</a></li>
            <li><a href="candidate.html" class="waves-effect waves-green waves-ripple"> &nbsp; &nbsp;Candidates</a></li>
            <li><a href="#" class="waves-effect waves-green waves-ripple"> &nbsp; &nbsp;About Us</a></li>
            <li><a href="#contact" class="waves-effect waves-green waves-ripple"> &nbsp; &nbsp;Contact Us</a></li>
            <li><a href="#signin" class="waves-effect waves-green waves-ripple modal-trigger"> &nbsp; &nbsp;Sign In</a></li>
        </ul>
        <a href="#" data-activates="slide-out" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
    </div>

</nav>

<div class="slider" style="z-index: -100;margin-top: -71px;height: 500px;">
    <ul class="slides">
        <li>

            <img src="img/vote-main.jpg" style="opacity: .5"> <!-- random image -->
            <div class="caption center-align">
                <h3>Scream it out, Say it out loud,</h3>
                <h5 class="light grey-text text-lighten-3">Vote for the one that makes you proud!

                  <!--   <a href="signin.html" class="waves-light waves-light btn">Sign In</a></h5> -->

            </div>

        </li>
        <li>
            <img src="img/slide03-700px.jpg"> <!-- random image -->
            <div class="caption right-align" style="padding-top: 8%;">
                <h3 style="letter-spacing: .2em;font-weight: 500;font-size: 2em;">Shape Tommorow </h3>
                <h5 class="light grey-text text-lighten-3" style="letter-spacing: .1em">by <strong>VOTING</strong> today</h5>
            </div>
        </li>
        <li>
            <img src="img/vote-india-original.jpeg" style="opacity: .9;"><!-- random image -->
            <div class="caption center-align" style="top: 30%;">
                <h3 style="letter-spacing: .1em">Be Bright,</h3>
                <h5 class="light grey-text text-lighten-3" style="letter-spacing: 0.08em;"><strong>VOTE</strong> &nbsp;  for what is right!</h5>
            </div>
        </li>
        <li>
            <img src="img/Electronic-Voting.jpg"> <!-- random image -->
            <div class="caption center-align" style="letter-spacing: .12em; font-weight: 700; text-shadow: 2px 2.5px  #33353f; text-underline: 2;">
                <h4>Have a Vision?</h4>
                <h4>Make the right decision! </h4>
                <h5 class="light grey-text text-lighten-3"><strong><u>Vote!</u </strong></h5>
            </div>
        </li>
    </ul>
</div>


<!--sign form in modal-->

<div id="signin" class="modal">
    <div class="modal-content">

        <h4 class="center">LOG IN</h4>
        <form action="login.php" method="post" id="login_form">
            <div class="row">

                <div class="input-field col s12 l12">
                    <input  name="_aadhar_no" id="_aadhar_no" type="text" class="validate"  onkeypress="return isNumberKey(event)"  maxlength="12" placeholder="Aadhar Number" required autocomplete="off" />
                    <label for="_aadhar_no">Aadhar Number</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12 l12">
                    <input name="password" type="password" id="password" class="validate" placeholder="Password"  required autocomplete="off"  />
                    <label for="password" >Password</label>
                </div>
            </div>

            <div class="row right">
                <a href="forgetpassword.php" onclick="submit_form(); return false;"> Forgot Password?</a>
            </div>

            <div class="row center">
                <div class="col l3 offset-l3">
                <button class="btn waves-effect waves-light"  type="submit" name="action">Log In
                    <i class="material-icons"></i>
                </button>
                    </div>
                <div class="col l3 ">
                <a href="signup.php"> <button class="btn waves-effect waves-light" type="button" name="action">Sign UP
                    <i class="material-icons"></i>
                </button></a>
                    </div>
            </div>
        </form>


    </div>
    <!--<div class="modal-footer">-->
        <!--<a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Agree</a>-->
    <!--</div>-->
</div>



<!--change password form-->

<div id="change_pass" class="modal">
    <div class="modal-content">

        <h4 class="center">Change Password</h4>
        <form method="post" action="change_password.php">
            <div class="row">

                <div class="input-field col l12 m11 s12">
                    <input type="password" id="oldpassword" name="old_password" required/>
                    <label for="oldpassword">Old Password</label>
                </div>

                <div class="input-field col l12 m11 s12">
                    <input type="password" id="new_password" name="new_password" required/>
                    <label for="new_password">Password</label>
                </div>

                <div class="input-field col l12 m11 s12 ">
                    <input type="password" id="Cpassword" name="Cpassword" onkeyup="valid();" required/>
                    <label for="Cpassword">Confirm Password</label>
                </div>

                <div id="check_pass">

                </div>
            </div>

            <div class="row center">
                <button class="btn waves-effect waves-light" style="margin-right: 30px;" type="submit" id="change_password" name="action">Submit
                    <i class="material-icons"></i>
                </button>
            </div>


        </form>


    </div>
</div>

<!--page body starts-->

<!--    Uper Slide ka button-->
 <div class="fixed-action-btn" style="bottom: 45px; right: 24px; ">
    <a class="waves-light waves-effect btn-floating btn-large orange" style="z-index: 10" href="#select">
        <i class="mdi-hardware-keyboard-arrow-up"></i>
    </a>
</div>
<!--parties participated-->


<div class="pad20"></div>
<div class="sec7">
    <a id="party"> </a>    <div class="container">
        <div class="section" style="padding-top: 50px;">

            <h2 class="center"><b>Parties</b> Participated</h2>
            <div class="pad20"></div>
            <div class="row" style="margin-top: 80px;">

                <a href="parties.html"> <div class="col s4 m4">
                    <div class="wrap valign-wrapper z-depth-1">
                        <img class="wow zoomIn animated" data-wow-delay="0.3s" width="40" height="40" title="" alt="" src="img/BJP_election_symbol.png" style="visibility: visible; animation-delay: 0.3s; animation-name: zoomIn;">

                    </div>

                    <h5 class="center">Bharatiya Janata Party</h5>

                </div></a>

                <a href="parties.html#AAP"><div class="col s4 m4">
                    <div class="wrap valign-wrapper z-depth-1">
                        <img class="wow zoomIn animated" data-wow-delay="0.3s" width="40" height="40" title="" alt="" src="img/aaplogo.png" style="visibility: visible; animation-delay: 0.3s; animation-name: zoomIn;">

                    </div>
                    <h5 class="center">Aam Adami Party</h5>
                </div></a>

                <a href="parties.html#INC"><div class="col s4 m4"><div class="wrap valign-wrapper z-depth-1">
                    <img class="wow zoomIn animated" data-wow-delay="0.3s" width="40" height="40" title="" alt="" src="img/Indian_National_Congress.png" style="visibility: visible; animation-delay: 0.3s; animation-name: zoomIn;">

                </div>
                    <h5 class="center">Indian National Congress</h5>
                </div></a>
            </div>

            <div class="row">

                <a href="parties.html#MNS"><div class="col s4 m4"><div class="wrap valign-wrapper z-depth-1">
                    <img class="wow zoomIn animated" data-wow-delay="0.3s" width="40" height="40" title="" alt="" src="img/MNS_Railway_Engine.png" style="visibility: visible; animation-delay: 0.3s; animation-name: zoomIn;">

                </div>
                    <h5 class="center">Maharashtra NavNirman Sena</h5>
                </div></a>

                <a href="parties.html#CPI"><div class="col s4 m4"><div class="wrap valign-wrapper z-depth-1">
                    <img class="wow zoomIn animated" data-wow-delay="0.3s" width="40" height="40" title="" alt="" src="img/CPI_Ears_of_Corn_and_Sickle.png" style="visibility: visible; animation-delay: 0.3s; animation-name: zoomIn;">
                </div>
                    <h5 class="center">Communist Party of India</h5>
                </div></a>


                <a href="parties.html#SS"><div class="col s4 m4"><div class="wrap valign-wrapper z-depth-1">
                    <img class="wow zoomIn animated" data-wow-delay="0.3s" width="40" height="40" title="" alt="" src="img/SS_Bow_And_Arrow.png" style="visibility: visible; animation-delay: 0.3s; animation-name: zoomIn;">
                </div>
                    <h5 class="center">Shiv Sena</h5>

                </div></a>
            </div>

        </div>
    </div>
</div>

<!--End of the page scroll-->

<!--footer starts-->

<footer class="page-footer footer-copy" id="contact">
    <div class="container">
        <div class="row">
            <div class="col l12 s12 m12">
                <h5 class="white-text">Patriotically Designed & Implemented by:</h5>
                    <div class="row" style="letter-spacing: 0.06em;font-size: 1.6em;font-family: 'Pacifico', cursive;">

                        <div class="col m4"> <p class="grey-text text-lighten-4">Amit Gupta</p></div>
                        <div class="col m4"> <p class="grey-text text-lighten-4">Anurag Agrawal</p></div>
                        <div class="col m4 center"> <p class="grey-text text-lighten-4">Leena Deore</p></div>
                    </div>
            </div>
        </div>
    </div>
    <div class="footer-copyright center">
        <div class="container">
            OVS © 2015 All rights Reserved
        </div>
    </div>
</footer>

<!--footer ends-->
<!--Scripts-->

<script src="js/jquery-2.x.js"></script>
<script src="js/materialize.js"></script>



<!--dropdown js-->
<script>
$('.dropdown-button').dropdown({
inDuration: 300,
outDuration: 225,
constrain_width: false, // Does not change width of dropdown to that of the activator
hover: true, // Activate on hover
gutter: 0, // Spacing from edge
belowOrigin: true, // Displays dropdown below the button
alignment: 'left' // Displays dropdown with edge aligned to the left of button
}
);
</script>

<!--modal function-->

<script>
    $('.modal-trigger').leanModal({
                dismissible: true, // Modal can be dismissed by clicking outside of the modal
                opacity: .5, // Opacity of modal background
                in_duration: 300, // Transition in duration
                out_duration: 200 // Transition out duration
//                ready: function() { alert('Ready'); }, // Callback for Modal open
//                complete: function() { alert('Closed'); } // Callback for Modal close
            }
    );
</script>

    <!--side menu script starts-->
<script>
    $('.button-collapse').sideNav({
                menuWidth: 240, // Default is 240
                edge: 'left', // Choose the horizontal origin
                closeOnClick: true // Closes side-nav on <a> clicks, useful for Angular/Meteor
            }
    );

</script>


<!--Password Confirm Validation Script-->
<script type="text/javascript">
    function valid()
    {

        var pass="Password Match";
        var notpass="Password not Match";
        var passwd=document.getElementById('new_password');
        var cpasswd=document.getElementById('Cpassword');



        if(passwd.value==cpasswd.value) {
            document.getElementById("check_pass").innerHTML = pass;
            document.getElementById("check_pass").style.color= '#00DF00';
            document.getElementById("change_password").disabled = false;
        }
        else {
            document.getElementById("check_pass").innerHTML= notpass;
            document.getElementById("check_pass").style.color= '#FF0000';
            document.getElementById("change_password").disabled = true;

        }

    }

</script>

<!--slider js-->

<script>
$(document).ready(function(){
$('.slider').slider({full_width: true});
});
</script>
    <!--slider script ends-->

<script>
    $(document).ready(function(){
        $('.parallax').parallax();
    });
</script>

<!--Only Number Validation Script-->
<script>
    function isNumberKey(evt){
        var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
        return true;
    }
</script>


<!-- <script src="js/jquery-2.1.1.js"></script> -->

<!--   link for VOTE NOW BUTTON-->

<?php
if(isset($_SESSION["user"]))
   {
	$search=$collection1->find();
	foreach ($search as $document)
	{
		# Checking If voted or not
		if($document["_aadhar_no"]==$_SESSION['user'])
		{
			if(empty($document["status"]) || time()>$endtime)
			{
			
			echo "<div id='counter' class='fixed-action-btn' style='bottom: 38%; right: 24px;' ><div>";
			}
			else
			{
			echo "<div class='fixed-action-btn' style='bottom: 38%; right: 24px;''><a class='waves-green waves-effect  btn-large orange' style='z-index: 10' >Already Voted</a></div>";	
			}
		}
	}

}
else
    {
        echo "<div id='counter' class='fixed-action-btn' style='bottom: 38%; right: 24px;' > <div>";
    }
?>

<!-- Code for Back button Disable -->
<script type="text/javascript">
history.pushState(null, null, '#');
window.addEventListener('popstate', function(event) {
history.pushState(null, null, '#');
});
</script>

<!-- Code for Refreshing timer -->
<script type="text/javascript">
$(document).ready(function () 
  {
    setInterval(function () 
    {
        $("#counter").load("session.php");
    }, 1000);
  }
  );
</script>

<!-- For Forgot Password -->
<script>
function submit_form()
{
  var aadhar=document.getElementById("_aadhar_no").value;

  window.location.href='forgetpassword.php?aadhar='+aadhar; 
  
 

}
</script>

<!--smooth scroll js-->

<script type="text/javascript">

    $(function() {
        $('a[href*=#]:not([href=#])').click(function() {
            if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
                if (target.length) {
                    $('html,body').animate({
                        scrollTop: target.offset().top
                    }, 1000);
                    return false;
                }
            }
        });
    });
</script>
</body>
</html>