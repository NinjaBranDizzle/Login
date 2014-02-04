<?php
	session_start(); 
	require_once 'classes/users.php';
	$user = new User();

	//If the user clicks the "logged out" on the index page
	if(isset($_GET['status']) && $_GET['status'] == 'loggedout'){
		$user->log_User_Out();
	}

	//Did the user enter a password/username and click submit?
	if($_POST && !empty($_POST['username']) && !empty($_POST['pwd'])){
		$response = $user -> validateUser($_POST['username'], $_POST['pwd']);
	}

	include 'header.php'; 


?>
<body>
   <div id="login">
   	<form method="post" action="">
   		<h2>Login <small>enter your credentials</small></h2>
   		<p>
   			<label for="username">Username: </label>
   			<input type="text" name="username" />
   		</p>
   		<p>
   			<label for="pwd">Password: </label>
   			<input type="password" name="pwd" />
   		</p>
   		<p>
   			<input type="submit" id="submit" value="Login" name="submit" />
   		</p>
   	</form>
   	<?php if(isset($response)) echo "<h4 class='alert'>". $response  ."</h4>"; ?>
   </div><!-- /login-->
</body>
</html>