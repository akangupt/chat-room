<html>

<head>
<script type="text/javascript" src="Js/jquery.js"></script>
<style>
body
{
background-image:url('login.jpg');

}
</style>
</head>
</br>
</br>
<h1><i><b><u><center>LOGIN FORM</center></u></b></i>
<form method="post" action="UserLogin.php">
<br/>
<br/>
<br/>
 <div><center><font size="5"<u><i><b>Email:</b></i></u></font><input type="email" name="UserMailLogin" /></center></div>
 <br/>
<div><center><font size="5"<u><i><b>Password: </b></i></u></font><input type="password" name="UserPasswordLogin" /></center></div>
<br/>
 <div><center><input type="submit" value="Login" name="LOG IN"  /></center></div>
<br/>
<?php
if(isset($_GET['error'])){
?>
<span style="color:red"><center>ERROR LOGIN</center></span>
<?php
}
?>
</form>
</body>
</html>
