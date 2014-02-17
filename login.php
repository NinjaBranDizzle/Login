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
         <h1>Login</h1>
         <p>
            <input type="text" placeholder="Username" name="username" />
         </p>
         <p>
            <input type="password" placeholder="Password" name="pwd" />
         </p>
         <p>
            <input type="submit" id="submit" class="btn btn-primary btn-sm" value="Login" name="submit" />
         </p>
      </form>
      <p><a href="register.php">Register</a></p>
      <?php if(isset($response)) echo "<h4 class='alert'>". $response  ."</h4>"; ?>
   </div><!-- /login-->
</body>
</html>