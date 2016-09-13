<?php
session_start('admin');
if(isset($_SESSION['pass']))
{
	echo "<script type='text/javascript'> alert('You Don\'t have the proper Rights!!'); location='admin_login.php';</script>";
	die();
}

?>


<html>
<head>

    <link type="text/css" href="css/materialize.min.css" rel="stylesheet">
    <link type="text/css" href="css/header.css" rel="stylesheet">
    <link rel="icon" type="image/png" sizes="32x32" href="img/favicon.ico">
    <link rel="icon" type="image/png" sizes="96x96" href="img/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="img/favicon-16x16.png">
    <title>
        ADMIN-PAGE
    </title>

    <style>
        .admin
        {
            margin-left: 20%;
            margin-top:0;
        }

        ul.tabs li.tab a.create
        {
            color: darkorange;
            font-size: 21px;
            text-shadow: 1px 1px 1px rgba(206, 107, 0, 0.65);
        }

        .tabs .indicator
        {
            background-color: blue;
        }

        ul.tabs li.tab a.update
        {
            color: rgba(23, 46, 255, 0.98);
            font-size: 21px;
            text-shadow: 1px 1px 1px rgba(50, 57, 218, 0.86);
        }

        ul.tabs li.tab a.del
        {
            color: rgb(0, 235, 0);
            font-size: 21px;
            text-shadow: 1px 1px 1px rgba(0, 53, 0, 0.86);
        }

        ul.tabs li.tab a.create:hover
        {
            color: rgba(255, 132, 0, 0.31);
        }

        ul.tabs li.tab a.update:hover {
            color: rgba(70, 76, 244, 0.43);
        }

        ul.tabs li.tab a.del:hover
        {
            color: rgba(0, 236, 0, 0.32);
        }

        div.admin_title span.center{

            font-size: 3em;
            padding-left: 4em;
        }
    </style>
</head>

<body>

<div class="admin">
    <div class="container card">
        <div class="section">
            <div class="admin_title">
           <span class="center"> ADMIN-PANEL </span>
           <div style="float:right" >
                <a href="logout.php"><button class="btn waves-effect waves-light" style="margin-right: 30px;" name="action">Log Out
                <i class="material-icons"></i>
                </button></a>
            </div>
            </div>

            <div class="row">
                <div class="col s12">
                    <ul class="tabs">
                        <li class="tab col s3 "><a class="active create" href="#create">Create New</a></li>
                        <li class="tab col s3 "><a class="update" href="#update">Update</a></li>
                        <li class="tab col s3 "><a class="del" href="#del">Delete</a></li>
                    </ul>
                </div>


<!--                create-->

                <div id="create" class="col s12 offset-l1" style="padding-top: 40px;">
                    <form method="post" action="create.php" >
                        <div class="row">
                            <div class="center">
                            <div class="input-field col l5 m5 s12 ">
                                <input type="text" name="_aadhar_no" id="Aadhar" onkeypress="return isNumberKey(event)"  maxlength="12" required />
                                <label for="Aadhar">Aadhar Number</label>
                            </div>

                                <div class="input-field col l5 m5 s12 ">
                                    <input type="text" name="name" id="name" required />
                                    <label for="name">Full Name</label>
                                </div>
                            <div class="input-field col l5 m5 s12 " style="line-height: 1em;">
                                <input name="dob" id="birthdate" type="date" class="datepicker">
                                <label for="birthdate">Date of Birth</label>
                            </div>

                                <div class="input-field col s12 l5">
                                    <label for="gender">Gender</label>

                                    <p>
                                        <input name="group1" type="radio" id="male" />
                                        <label for="male">Male</label>

                                        <input name="group1" type="radio" id="female" />
                                        <label for="female">Female</label>
                                    </p>
                                </div>

                                <div class="input-field col l10 m5 s12 ">
                                    <input type="text" name="address" id="address" required />
                                    <label for="address">Address</label>
                                </div>

                                <div class="input-field col l5 m5 s12 ">
                                    <input type="text" name="pin_code" id="pin_code" onkeypress="return isNumberKey(event)"  maxlength="6" required />
                                    <label for="pin_code">Pin Code</label>
                                </div>

                                <div class="col l12">
                                    <button class="btn waves-effect waves-light" style="margin-right: 30px;" type="submit" name="action">Submit
                                        <i class="material-icons"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>



<!--                update-->


                <div id="update" class="col s12 offset-l1"  style="padding-top: 40px;">
                    <form method="post" action="update.php" >
                        <div class="row">
                            <div class="center">
                                <div class="input-field col l5 m5 s12 ">
                                    <input type="text" name="_aadhar_no" id="Aadhar" onkeypress="return isNumberKey(event)"  maxlength="12" required />
                                    <label for="Aadhar">Aadhar Number</label>
                                </div>


                                <div class="col l5 m5 s12">
                                    <button class="btn waves-effect waves-light" style="margin-right: 30px;" type="submit" name="action">Search
                                        <i class="material-icons"></i>
                                    </button></div>

                                        <br><br><br><br>

                                <div class="input-field col l5 m5 s12 ">
                                    <input type="text" name="name" id="name" required />
                                    <label for="name">Full Name</label>
                                </div>


                                <div class="input-field col l5 m5 s12 " style="line-height: 1em;">
                                    <input name="dob" id="birthdate" type="date" class="datepicker" >
                                    <label for="birthdate">Date of Birth</label>
                                </div>

                                <div class="input-field col s12 l5" >
                                    <label for="gender" >Gender</label>

                                    <p>
                                        <input name="group2" type="radio" id="male_delete" "/>
                                        <label for="male_delete">Male</label>

                                        <input name="group2" type="radio" id="female_delete" "/>
                                        <label for="female_delete">Female</label>
                                    </p>
                                </div>

                                <div class="input-field col l5 m5 s12 ">
                                    <input type="text" name="pin_code" id="pin_code" onkeypress="return isNumberKey(event)"  maxlength="6"  />
                                    <label for="pin_code">Pin Code</label>
                                </div>

                                <div class="input-field col l10 m5 s12 ">
                                    <input type="text" name="address" id="address"  />
                                    <label for="address">Address</label>
                                </div>
                                <div class="col l6 m5 s12">
                                    <button class="btn waves-effect waves-light" style="margin-right: 30px;" type="submit" name="action">Update
                                        <i class="material-icons"></i>
                                    </button></div>

                            </div>
                            </div>
                        </form>
                    </div>


<!--                delete-->
            <div id="del" class="col s12 offset-l1"  style="padding-top: 40px;">
                <form method="post" action="delete.php" >
                    <div class="row">
                        <div class="center">
                            <div class="input-field col l5 m5 s12 ">
                                <input type="text" name="_aadhar_no" id="Aadhar" onkeypress="return isNumberKey(event)"  maxlength="12" required />
                                <label for="Aadhar">Aadhar Number</label>
                            </div>

                            <div class="col l5 m5 s12">
                                <button class="btn waves-effect waves-light" style="margin-right: 30px;" type="submit" name="action">Search
                                    <i class="material-icons"></i>
                                </button></div>

                            <br><br><br><br>
                            <div class="input-field col l5 m5 s12 ">
                                <input type="text" name="name" id="name" disabled  />
                                <label for="name">Full Name</label>
                            </div>
                            <div class="input-field col l5 m5 s12 " style="line-height: 1em;">
                                <input name="dob" id="birthdate" type="date" class="datepicker" disabled>
                                <label for="birthdate">Date of Birth</label>
                            </div>

                            <div class="input-field col s12 l5" >
                                    <label for="gender" >Gender</label>

                                    <p>
                                        <input name="group2" type="radio" id="male_delete" disabled="disabled"/>
                                        <label for="male_delete">Male</label>

                                        <input name="group2" type="radio" id="female_delete" disabled="disabled"/>
                                        <label for="female_delete">Female</label>
                                    </p>
                                </div>

                            <div class="input-field col l5 m5 s12 ">
                                <input type="text" name="pin_code" id="pin_code" onkeypress="return isNumberKey(event)"  maxlength="6" disabled />
                                <label for="pin_code">Pin Code</label>
                            </div>

                            <div class="input-field col l10 m5 s12 ">
                                <input type="text" name="address" id="address" disabled />
                                <label for="address">Address</label>
                            </div>



                            <div class="col l12">
                                <button class="btn waves-effect waves-light" style="margin-right: 30px;" type="submit" name="action">Delete
                                    <i class="material-icons"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            </div>
        </div>

        </div>
    </div>


<script src="js/jquery-2.x.js"></script>
<script src="js/materialize1.js"></script>

<!-- tabs js   -->
<script>
$(document).ready(function(){
$('ul.tabs').tabs();
});
</script>

<script>
$(document).ready(function() {
$('select').material_select();
});
</script>


<!--datepicker script-->

    <script type="text/javascript">
        $('.datepicker').pickadate({
            selectMonths: true, // Creates a dropdown to control month
            selectYears: 100 // Creates a dropdown of 15 years to control year
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
</body>
</html>
