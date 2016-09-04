
<?php 
session_start();
$endtime=$_SESSION['endtime'];

if (time()>$endtime)
{
echo "<script>location='result.php'</script>";
}
else
{
echo "<script>alert('Result Will Be Displayed After Voting Time is Up.');location='index.php'</script>";
}

?>

