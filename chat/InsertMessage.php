<?php
	session_start();
include "classes.php";
if(isset($_POST['ChatText'])){
		$chat=new chat();
		$chat->setChatUserName($_SESSION['UserName']);
		$chat->setChatText($_POST['ChatText']);
		$chat->InsertChatMessage();
	
header("Location:Home2.php?success=1");

	}

?>
