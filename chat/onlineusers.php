<?php
session_start();
include_once "conn.php";
$thirtyMinutesAgo=time()-1800;
$ChatOl=$bdd->prepare("SELECT * FROM onlineusers WHERE LoginTime >'.$thirtyMinutesAgo.' ORDER BY LoginTime");
$ChatOl->execute();
while($DataOl=$ChatOl->fetch()){
$hoursAndMinutes=date('g:ia', $DataOl['LoginTime']);
echo '<p><strong>'.$DataOl['UserName'].'</strong>: <em>(' . $hoursAndMinutes . ')</em> </p>';
}
?>