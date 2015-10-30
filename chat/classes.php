<?php
class user{
private $UserId,$UserName,$UserMail,$UserPassword;

public function getUserId(){
	return $this->UserId;
}

public function setUserId($UserId){
	 $this->UserId=$UserId;
}

public function getUserName(){
	return $this->UserName;
}

public function setUserName($UserName){
	 $this->UserName=$UserName;
}


public function getUserMail(){
	return $this->UserMail;
}

public function setUserMail($UserMail){
	 $this->UserMail=$UserMail;
}

public function getUserPassword(){
	return $this->UserPassword;
}

public function setUserPassword($UserPassword){
	 $this->UserPassword =$UserPassword;
}


public function InsertUser(){
	include "conn.php";
	$req=$bdd->prepare("INSERT INTO users(UserName,UserMail,UserPassword) VALUES(:UserName,:UserMail,:UserPassword)");
	$req->execute(array(
		'UserName'=>$this->getUserName(),
		'UserMail'=>$this->getUserMail(),
		'UserPassword'=>$this->getUserPassword()
		));
}

public function UserLogin(){
	include "conn.php";
	$req=$bdd->prepare("SELECT * FROM users WHERE UserMail=:UserMail AND UserPassword=:UserPassword");

	$req->execute(array(
		'UserMail'=>$this->getUserMail(),
		'UserPassword'=>$this->getUserPassword()
	));

	if($req->rowCount()==0){
		header("Location:login.php?error=1");
		return false;
	}
	else{

		while($data=$req->fetch()){
			$this->setUserId($data['UserId']);
			$this->setUserName($data['UserName']);
			$this->setUserPassword($data['UserPassword']);
			$this->setUserMail($data['UserMail']);

			header("Location:Home2.php");
			return true;
		}
	}
}


}

class chat{
private $ChatId,$ChatUserId,$ChatText;

public function getChatId(){
	return $this->ChatId;
}

public function setChatId($ChatId){
	$this->ChatId=$ChatId;
}



public function getChatUserName(){
	return $this->ChatUserName;
}

public function setChatUserName($ChatUserName){
	$this->ChatUserName=$ChatUserName;
}


public function getChatText(){
	return $this->ChatText;
}

public function setChatText($ChatText){
	$this->ChatText=$ChatText;
}

public function InsertChatMessage(){
	include"conn.php";
$req=$bdd->prepare("INSERT INTO chats(ChatText,ChatUserName,ChatTime) VALUES(:ChatText,:ChatUserName,:ChatTime)");
	$req->execute(array(
		'ChatUserName'=>$this->getChatUserName(),
		'ChatText'=>$this->getChatText(),
'ChatTime'=>time()
		));
}

public function DisplayMessage(){
	include "conn.php";
$fiveMinutesAgo=time()-300;
	$ChatReq=$bdd->prepare("SELECT * FROM chats WHERE ChatTime > '.$fiveMinutesAgo.' ORDER BY ChatTime ");
	$ChatReq->execute();
while($DataChat=$ChatReq->fetch()){
$hoursAndMinutes = date('g:ia', $DataChat['ChatTime']);
		$UserReq=$bdd->prepare("SELECT * FROM users WHERE UserName=:UserName");
		$UserReq->execute(array(
				'UserName'=>$DataChat['ChatUserName']
			));
		$DataUser=$UserReq->fetch();
echo '<p><strong>' . $DataUser['UserName']. '</strong>: <em>(' .$hoursAndMinutes. ')</em> ' . $DataChat['ChatText'] . '</p>';
}
}
}
?>


