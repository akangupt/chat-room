<?php
	session_start();
?>
<!DOCTYPE html>  
<html>
<head>
<style>
body
{
background-image:url('background.jpg');
}
</style>
	<link href="Style/Style.css" type"text/css" rel="stylesheet"/>
	<script type="text/javascript" src="Js/jquery.js"></script>
	<title>Chat Application Home</title>
</head>
<body >
<br/>
<br/>
<h2><center><span style="color:white">Welcome <?php echo $_SESSION['UserName'];?></span><center/></h2>
		</br></br>
<div id="onlineusers"></div>
		<div class="chatBox">
	
	<div class="main">
		
	</div>
	<div class="messageBox">
		
		<form name="newMessage" class="newMessage" action=" InsertMessage.php"  method="post">
			<div class="left">
				<textarea name="ChatText" id="ChatText"></textarea>
			</div>
			<div class="right">
				<input type="submit" id="newMessageSend" value="SEND" />
			</div>
		</form>
	</div>
</div>
<br>
<br>
<center><a href=logout.php>LOGOUT</a><center/>
<script src="Js/refresh_message_log.js" type="text/javascript"></script>
<script src="Js/onlineusers.js" type="text/javascript"></script>
</body>
</html>