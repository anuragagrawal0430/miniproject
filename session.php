
<?php
session_start();
#Setting timezone
date_default_timezone_set('Asia/Kolkata');


#Setting a Start time.
$starttime=strtotime('16-06-25 13:45:00');

#Setting a End time.
$endtime=strtotime('17-10-05 14:00:00');

#time difference calculaation
$remaining=abs(time()-$starttime);

#Time Left calculation
$sec_remaining = abs(floor($remaining %60));
$mins_remaining = abs(floor(($remaining / 60)%60));
$hours_remaining = abs(floor(($remaining % 86400) / 3600));
$days_remaining = abs(floor($remaining / 86400));

/*
floor to round to interger
abs function to get postive value
round function to round up value
*/
/*<div class='fixed-action-btn' style='bottom: 50%; right: 24px;''><a class='waves-green waves-effect  btn-large orange' style='z-index: 10' href='polling.html'>Vote NOW</a></div>*/

if(time()<$starttime)
	echo "<a class='waves-green waves-effect  btn-large orange' style='z-index: 10;opacity:0.90;'  >Voting Opens in $days_remaining D $hours_remaining H $mins_remaining M $sec_remaining S</a>";	
else if (time()>$endtime) 
{
	if(isset($_SESSION["user"]))
   {
	echo "<a class='waves-green waves-effect  btn-large orange' style='z-index: 10;opacity:0.90;' href='result.php' >Voting Results</a>";	
	}
	else
	{
	echo "<a class='waves-green waves-effect  btn-large orange' style='z-index: 10;opacity:0.90;' href='result.php'>Voting Results</a>";		
	}
}
else
{
	if(isset($_SESSION["user"]))
   	{
	echo "<a class='waves-green waves-effect  btn-large orange' style='z-index: 10;opacity:0.90;' href='polling.html'>Vote NOW</a>";	
	}
	else
	{
	echo "<a class='waves-green waves-effect  btn-large orange' style='z-index: 10;opacity:0.90;' onclick='myalert()'>Voting Open</a>";
	}
}

?>

<script type="text/javascript">
	function myalert()
	{
		alert("Please Login To Vote");
	}
</script>
