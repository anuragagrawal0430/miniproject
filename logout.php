<?php
session_start();
echo "<script type='text/javascript'> alert('Successfully Loged Out'); location='index.php';</script>";
session_unset();
session_destroy();
?>
