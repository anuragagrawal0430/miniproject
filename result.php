<!DOCTYPE html>
<html>
<head>
  
</head>
<body>
<nav id="navi" role="navigation" style="background-color: rgba(29, 27, 68, 0.77);">
    <div class="nav-wrapper container">


        <a href="#">  <img src="img/download%20(3).png" height="100" style="margin-top: -10px"/></a>

        <ul class="right hide-on-med-and-down">
            <li><a href="index.php" class="waves-effect waves-green waves-ripple" id="select"> &nbsp; Home</a></li>
            <li><a href="index.php#party" class="waves-effect waves-green waves-ripple"> &nbsp; &nbsp; Parties</a></li>
            <li><a href="candidate.html" class="waves-effect waves-green waves-ripple"> &nbsp; &nbsp;Candidates</a></li>
            <li><a href="index.php#contact" class="waves-effect waves-green waves-ripple"> &nbsp; &nbsp;About Us</a></li>
            <li><a href="index.php#contact" class="waves-effect waves-green waves-ripple"> &nbsp; &nbsp;Contact Us</a></li>
        </ul>
        <ul id="slide-out" class="side-nav">
            <li><a href="#" class="waves-effect waves-green waves-ripple"> &nbsp; Home</a></li>
            <li><a href="index.php#party" class="waves-effect waves-green waves-ripple"> &nbsp; &nbsp; Parties</a></li>
            <li><a href="candidate.html" class="waves-effect waves-green waves-ripple"> &nbsp; &nbsp;Candidates</a></li>
            <li><a href="index.php#contact" class="waves-effect waves-green waves-ripple"> &nbsp; &nbsp;About Us</a></li>
            <li><a href="index.php#contact" class="waves-effect waves-green waves-ripple"> &nbsp; &nbsp;Contact Us</a></li>
        </ul>
        <a href="#" data-activates="slide-out" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
    </div>

</nav>
</body>
</html>


<?php 

#To display Error if any on php file
/*ini_set('display_errors',1);*/

session_start();

#Connecting Mongodb
$connection = new MongoClient();

#connecting to our database.
$db=$connection->OVS;

#Connection to Aadhar Collection.
$collection=$db->aadhar_info;

#Connection to User Collection.
$collection1=$db->user_login;

#Connection to Political Parties.
$collection2=$db->Political_Parties;

$search=$collection2->find();

?>

<!doctype HTML>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="css/materialize.css"  type="text/css" rel="stylesheet" media="screen,projection"/>
    <link rel="icon" type="image/png" sizes="32x32" href="img/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="img/favicon.ico">
    <link rel="icon" type="image/png" sizes="16x16" href="img/favicon-16x16.png">

    <title></title>
    <style>

    div.col.l6.button
    {
        float:right;
         margin-top: 12px;
        padding: 10px;
    }

    div.col.l6
    {
        height: 50px;
        padding: 30px;
        line-height: 50px;
    }
        
        #grad1 {
    background: -webkit-linear-gradient(left, rgb(200,200,200), rgb(192,192,192)); /* For Safari 5.1 to 6.0 */
    background: -o-linear-gradient(right, rgb(200,200,200), rgb(192,192,192)); /* For Opera 11.1 to 12.0 */
    background: -moz-linear-gradient(right, rgb(200,200,200), rgb(192,192,192)); /* For Firefox 3.6 to 15 */
    background: linear-gradient(to right, rgb(200,200,200), rgb(192,192,192); /* Standard syntax (must be last) */
}
    </style>
</head>

<body id="grad1">

<div class="container" style="padding-top: 5%; margin-left:20%;" >
    <div class="section">
        <div class="card" style="width:80%;">
    <div class="row">
        <!-- <div class="col l10"> -->
            <form method="post">
                  <div class="col l6 m6">
                    Bhartiya Janata Party
                   </div>
                   <div class="col l6 button">
                   <?php
                   foreach ($search as $document ) 
                   {
                   if($document["Abbrevation"]=='BJP')
                   	echo $document["Votes"];
                   }
                   	?>
                    
                    </div>
                    <div class="col l6">
                    Indian National Congress(INC)
                    </div>
                   <div class="col l6 button">
                    <p>
                    	<?php
                   foreach ($search as $document ) 
                   {
                   if($document["Abbrevation"]=='INC')
                   	echo $document["Votes"];
                   }
                   ?>
                    </p> 
                    </div>

                    <div class="col l6">
                    Communist Party of India -Marxist
                    </div>
                   <div class="col l6 button">
                    <p>	<?php
                   foreach ($search as $document ) 
                   {
                   if($document["Abbrevation"]=='CPI-M')
                   	echo $document["Votes"];
                   }
                   ?></p> 
                    </div>

                    <div class="col l6">
                    Maharashtra Navnirman Sena
                    </div>
                   <div class="col l6 button">
                    <p>
                    	<?php
                   foreach ($search as $document ) 
                   {
                   if($document["Abbrevation"]=='MNS')
                   	echo $document["Votes"];
                   }
                   ?>
                    </p> 
                    </div>

                    <div class="col l6">
                   Shiv Sena
                    </div>
                   <div class="col l6 button">
                    <p>
                    	<?php
                   foreach ($search as $document ) 
                   {
                   if($document["Abbrevation"]=='SS')
                   	echo $document["Votes"];
                   }
                   ?>
                    </p>  
                    </div>

                    <div class="col l6">
                        None Of Above
                    </div>
                   <div class="col l6 button">
                    <p>
                    	<?php
                   foreach ($search as $document ) 
                   {
                   if($document["Abbrevation"]=='NA')
                   	echo $document["Votes"];
                   }
                   ?>
                    </p> 
                    </div>
                   
  
                </form>


            
             </div>
    </div>
</div>
</div>
<script src="js/jquery-2.x.js"></script>
<script src="js/materialize.js"></script>

<script type="text/javascript">
history.pushState(null, null, '#');
window.addEventListener('popstate', function(event) {
history.pushState(null, null, '#');
});
</script>

</body>
</html>
