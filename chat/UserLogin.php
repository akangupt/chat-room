<?php
	session_start();
        include_once "conn.php";
	include "classes.php";
        $user= new user();
$user->setUserMail($_POST['UserMailLogin']);
$user->setUserPassword(sha1($_POST['UserPasswordLogin']));
		if($user->Userlogin()==true){
                  $_SESSION['UserId']=$user->getUserId();
		  $_SESSION['UserName']=$user->getUserName();
		  $_SESSION['UserMail']=$user->getUserMail();

                  setcookie("usera",$user->getUserName(),time()+86400);
                  $ol=$bdd->prepare("INSERT INTO onlineusers (UserName,LoginTime) VALUE (:OlUser,:LoginTime)");
$ol->execute(array(
'OlUser'=>$user->getUserName(),
'LoginTime'=>time()));
}
?>