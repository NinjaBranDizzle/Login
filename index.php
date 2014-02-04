<?php 
	include 'header.php'; 
	require_once 'classes/users.php';
	$user = new User();

	$user->confirm_User();
?>
<body>
   <h1>Secret page</h1>
   <a href="login.php?status=loggedout">Logout</a>
</body>
</html>