<?php require_once "core/init.php"; ?>
<?php  
	switch ($page) {
		case URL . 'home.php':
			$pageTitle = "Home Page";
			$title = "Home";
			break;
		case URL . "about.php":
			$pageTitle = "About Page";
			$title = "About";
			break;
		case URL . "forums.php":
			$pageTitle = "Forums Page";
			$title = "Forums";
			break; 
		case URL . "login.php":
			$pageTitle = "Login To Your Account";
			$title = "Login";
			break;
		case URL . "register.php":
			$pageTitle = "Register Your Account";
			$title = "Register";
			break;
		case URL . "error404.php":
			$pageTitle = "Error Page Not Found";
			$title = "Error 404";
			break;
		case URL . "activate.php":
			$pageTitle = "Activate Your Account";
			$title = "Activate";
			break;
		default:
			break;
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>JCoNet | <?php 	echo $title ?></title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<a href="<?php echo URL . 'home' ?>" class="navbar-brand">Computing Course-work</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#topNav" aria-controls="topNav">
			<span class="navbar-toggler-icon"></span>			
		</button>
		<div class="collapse navbar-collapse justify-content-end" id="topNav">
			<ul class="navbar-nav">
				<li class="nav-item">
					<a href="<?php echo URL . 'home' ?>" class="nav-link">Home</a>
				</li>
				<li class="nav-item">
					<a href="<?php echo URL . 'about' ?>" class="nav-link">About</a>
				</li>
				<li class="nav-item">
					<a href="<?php echo URL . 'forums' ?>" class="nav-link">Forums</a>
				</li>
				<li class="nav-item">
					<a href="<?php echo URL . 'login' ?>" class="nav-link">Login</a>
				</li>
				<li class="nav-item">
					<a href="<?php echo URL . 'register' ?>" class="nav-link">Register</a>
				</li>
			</ul>
		</div>
	</nav>
	<div class="jumbotron">
		<h1 class="display-4 text-center"><?php echo $pageTitle; ?></h1>
	</div>