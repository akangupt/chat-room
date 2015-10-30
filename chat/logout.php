<?php
session_start();
include_once "conn.php";
$ChatOl=$bdd->prepare("DELETE FROM onlineusers WHERE UserName=:useri");
$ChatOl->execute(array('useri'=>$_COOKIE["usera"]));
session_destroy();
header("Location:index.php?success=1");
?>