<?php require_once "includes/header.php"; ?>
<div class="container">
	<?php display_message(); ?>
	<div class="row">
		<div class="col-m-2 col-lg-2  col-xl-2 col-sm-3 col-xs-3"></div>
		<div class="col-m-8 col-lg-8 col-xl-8 col-sm-6 col-xs-6">
			<?php echo validate_login(); ?>
			<form action="" class="bg-dark user-form" method="post">
				<div class="form-group">
					<label for="username">Username or Email: </label>
					<input type="text" name="username" id="username" class="form-control" placeholder="Username or Email">
				</div>
				<div class="form-group">
					<label for="password">Password: </label>
					<input type="password" name="password" id="password" class="form-control" placeholder="Password">
				</div>
				<div class="form-group">
					<input type="checkbox" name="remember" class=""> <span>Remember Me</span>
				</div>
				<div class="form-group">
					<input type="submit" name="submit" class="form-control btn-primary">
				</div>
				<div class="form-group">
					<span>Not registered yet? <a href="<?php echo URL . "register" ?>">Register Here!</a></span>
					<br>
					<span>Forgot your password? <a href="<?php echo URL . "reset" ?>">Reset Here!</a></span>
				</div>
			</form>
		</div>
		<div class="col-m-2 col-lg-2 col-xl-2 col-sm-3 col-xs-3"></div>
	</div>
</div>
<?php require_once "includes/footer.php"; ?>