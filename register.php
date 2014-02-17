<?php
	session_start(); 
	require_once 'classes/users.php';
	$user = new User();
	include 'header.php'; 



if(isset($_POST['submit'])){
	$submit = strip_tags($_POST['submit']);
	$username = strtolower(strip_tags($_POST['username']));
	$password = strip_tags($_POST['password']);
	$repeatpassword = strip_tags($_POST['repeatpassword']);
}

if(isset($_POST['submit']))
{
	$response = $user-> register_User($username, $password, $repeatpassword);

}
?>
<div class="registerWrapper">
	<h1>Register</h1>
	<form action="register.php" method="POST">
		<p><input type="text" name="username" placeholder="Username" /></p>
		<p><input type="password" placeholder="Password" name="password"></p>
		<p><input type="password" placeholder="Repeat Password" name="repeatpassword"></p>
		<input type="submit" name="submit" class="btn btn-primary btn-small" style="margin-left:0;" value="Register">
	</form>
	<?php if(isset($response)) echo "<h4 class='alert'>". $response  ."</h4>"; ?>
</div><!--/registerWrapper-->
<?php include('footer.php'); ?>
