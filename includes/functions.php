<?php  
	require_once "db.php";

	  ///////////////////////////////////////////////////////
	 //         		 Message Functions   	          //
	///////////////////////////////////////////////////////
	function validate_error($message) {
			$message = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
						  <strong>{$message}</strong>
						  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
						    <span aria-hidden='true'>&times;</span>
						  </button>
						</div>";
			return $message;
	}

	  ///////////////////////////////////////////////////////
	 //              BASIC HELPER FUNCTIONS               //
	///////////////////////////////////////////////////////

	//Extracts the htmlentities function to make things clean in a form
	//the string is what you are cleaning
	function clean($string) {
		return htmlentities($string, ENT_QUOTES, "UTF-8");
	}

	//extracts the Header function to redirect
	//the location is where you want to redirect to
	function url($location) {
		return header("Location: {$location}");
	}

	//extracts the mail function to send emails
	//email is all emails
	//subject is the email subject
	//message is the body content for the message
	//headers are email headers you may use an array 
	function send_email($email, $subject, $message, $headers) {
		return mail($email, $subject, $message, $headers);
	}

	//allows you to create a flash message
	//the string will be the content of the message
	function set_message($string) {
		if(!empty($string)) {
			$message = $_SESSION["message"] = $string;
		} else {
			$message = '';
		}
	}

	//this will desplay the flash message you have created or not display any message is none is set
	function display_message() {
		if(isset($_SESSION["message"])) {
			echo $_SESSION["message"];

			unset($_SESSION["message"]);
		}
	}

	//tokens are used to prevent Cross Site Request Forgery
	//I used md5 with a uniqid
	//feel free to use your own encryption if you want a different way of generating a token
	function token_creator() {
		$token = $_SESSION['token'] = md5(uniqid(mt_rand(), true));
		return $token;
	}

	  ///////////////////////////////////////////////////////
	 //         	BASIC USER HELPER FUNCTIONS           //
	///////////////////////////////////////////////////////

	//check and see if the username already exits
	//uses an sql statment 
	//then check the statment using our rows function
	//then returns a true or false statment based on the result
	//You dont have to worry because of another function there cannot be more than 1 result returned
	function username_exists($username) {
		$sql = "SELECT * FROM users WHERE user_username = '$username'";
		$result = query($sql);
		if(rows($result) == 1) {
			return true;
		} else {
			return false;
		}
	}

	//this function is similar to the one above, but this time we check for email
	//the process is the exact same with diferent values 
	function email_existis($email) {
		$sql = "SELECT * FROM users WHERE user_email = '$email'";
		$result = query($sql);
		if(rows($result) == 1) {
			return true;
		} else {
			return false;
		}
	}

	//this function will require a user to be logged in to view a page
	//when a user logs in they will recive a session and cookie of logged in
	//if they dont have the session or cookie they will be redirected and sent a flash message
	function requiredLogin() {
		if(!isset($_SESSION["loggedin"]) || !isset($_COOKIE['loggedin'])) {
			set_message("Sorry, but that page requires you to be logged in");
			url("login?notLoggeding");
		}
	}

	  ///////////////////////////////////////////////////////
	 //         	BASIC Validation FUNCTIONS            //
	///////////////////////////////////////////////////////

	//this function creates an array errors
	//for every validation, if it comes back false it will then add error to the array
	//it will then display the errors inside the function
	//if all validation pass user will then be registered
	function validate_registration() {
		$errors = [];

		// create variables to use in the checks
		$min = 5;
		$max = 21;

		// use the request method to check for post submission
		// if it exists then it will create variables and run checks
		// else nothing will happen
		if($_SERVER['REQUEST_METHOD'] == 'POST') {
			//each variable will need to be cleaned and escaped for security reasons
			$first 			= clean(escape($_POST["first"]));
			$last 			= clean(escape($_POST["last"]));
			$username 		= clean(escape($_POST["username"]));
			$email 			= clean(escape($_POST["email"]));
			$password 		= clean(escape($_POST["password"]));
			$confirmPass 	= clean(escape($_POST["confirmpassword"]));

			//check for username exsting in the database
			//we will use our function that we created earlier
			if(username_exists($username)) {
				//add error to the array
				$errors[] = "Sorry, but {$username} has already been registered with us please login or select a new username";
			}

			//check for email exsting in the database 
			//using the function made earlier
			if(email_existis($email)) {
				//add error to the array
				$errors[] = "Sorry, but {$email} has already been registered with us please login or select a new email.";
			}

			//check for empty first name
			if(empty($first)) {
				//add error to the array
				$errors[] = "Oops, you for got to fill out your first name!";
			}

			//check for empty last name
			if(empty($last)) {
				//add error to the array
				$errors[] = "Oops, you for got to fill out your last name!";
			}

			//check for empty username
			if(empty($username)) {
				//add error to the array
				$errors[] = "Oops, you for got to fill out your username!";
			}

			//check for empty email
			if(empty($email)) {
				//add error to the array
				$errors[] = "Oops, you for got to fill out your email!";
			}

			//check for empty password
			if(empty($password)) {
				//add error to the array
				$errors[] = "Oops, you for got to fill out your password!";
			}

			//check for empty confirmpassword
			if(empty($confirmPass)) {
				//add error to the array
				$errors[] = "Oops, you must confirm your password!";
			}

			//check to see if username is correct length
			//check for max character size in username
			if(strlen($username) >= $max) {
				//add error to the array
				$errors[] = "Sorry, but your username, {$username} can not be longer than {$max} characters";
			}

			//check for min character size in username
			if(strlen($username) <= $min) {
				//add error to the array
				$errors[] = "Sorry, but your username, {$username} can not be shorter than {$max} characters";
			}

			//check to see if password is correct length
			//check for max character size in password
			if(strlen($password) >= $max) {
				//add error to the array
				$errors[] = "Sorry, but your password, {$password} can not be longer than {$max} characters";
			}

			//check for min character size in password
			if(strlen($password) <= $min) {
				//add error to the array
				$errors[] = "Sorry, but your password, {$password} can not be shorter than {$max} characters";
			}

			//checks for password matching
			if($confirmPass != $password) {
				$errors[] = "Sorry, but {$confirmPass} does not match the password you provided";
			}

			//displays errors if any
			if(!empty($errors)) {
				foreach($errors as $error) {
					echo validate_error($error);
				}
			} 
			 register_user($first, $last, $username, $email, $password);

				set_message("
								<div class='alert alert-success alert-dismissible fade show' role='alert'>
								  <strong>Your account was registered!</strong> before you can login you must first activate your account. We have sent you an email containing your activation link. Make sure you check your spam folder. If in 15 minutes you still have not recived an email, contact an admin to manualy activate your account.
								  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
								    <span aria-hidden='true'>&times;</span>
								  </button>
								</div>
							");
				url("login");
			
			 
		} 
	}

	//login validation
	//if validation passes we will log the user in
	//else we will dispaly all errors usingo our errors array
	function validate_login() {
		$errors = [];

		//create any variables you would like to add
		$max = 20;
		$min = 6;

		//check for post submission
		if($_SERVER['REQUEST_METHOD'] == 'POST') {
			//must clean and escape for user protection/security
			$username = clean(escape($_POST['username']));
			$password = clean(escape($_POST['password']));
			$remember = (isset($_POST['rememberMe']));

			//check if username is left empty
			if(empty($username)) {
				//add error to array
				$errors[] = "Sorry, but you forgot to fill out your username or email!";
			}

			//check if password is empty
			if(empty($password)) {
				//add error to the array
				$errors[] = "Sorry, but you forgot to fill out your password!";
			}

			//check to see if username or email exists in the database sql statment
			$sql = "SELECT * FROM users WHERE user_username = '$username' OR user_email = '$username'";
			//query the database for the username or email
			$query = query($sql);
			//if any results are returned if statment will execute
			if(rows($query) == 1) {
				//creates an associative array
				//grabs user's password, and weather they are active
				$row = assoc($query);
				$active = $row["user_valid"];
				$pass = $row["user_password"];

				if($active == 0) {
					$errors[] = "Your account has not been activated yet";
				}
		
			} else {
				//adds username/email error if no results are returned
				$errors[] = "Your username or email is invalid";
			}
			//check if errors are in the array
			if(!empty($errors)) {
				foreach($errors as $error) {
					//displayes errors out on login page
					echo validate_error($error);
				}
			} else {
				//log user in
				if(login_user($username, $password, $remember)) {
					url("dashboard/admin");
				} else {
					echo validate_error("Password was incorrect.");
				}
			}
		}
	}

	  ///////////////////////////////////////////////////////
	 //         	   User action FUNCTIONS              //
	///////////////////////////////////////////////////////

	//register the user
	function register_user($first, $last, $username, $email, $password) {
		//start by cleaning all the info for the varibles
		$username = clean(escape($username));
		$email = clean(escape($email));
		$password = clean(escape($password));
		$first = clean(escape($first));
		$last = clean(escape($last));

		//find if the email exists already
		//return false if it exists
		//then do the same for the username
		if(email_existis($email)) {
			return false;
		} else if(username_exists($username)) {
			return false;
		} else {
			//create variables for all other slots in the database
			$password = password_hash($password, PASSWORD_DEFAULT);
			$code = md5($username) . md5($email) . md5(microtime());
			$membership = "Member";
			$active = 0;
			$date = date("d-m-Y");

			//write the sql for the users table
			$sql = "INSERT INTO users (user_first, user_last, user_username, user_email, user_password, user_code, user_valid, user_joined, user_type) VALUES ('$first', '$last', '$username', '$email', '$password', '$code', '$active', '$date', '$membership')";

			//run the query
			$result = query($sql);

			//create email confirmation
			//create subject
			//create message
			//create headers
			//then send the email
			$subject = "Activate Account";
			$msg = "Hello {$username}, Please activate your account by clicking <a href='http://localhost/" . URL . "activate?email={$email}&confirmationcode={$code}'>here</a>. If you can not view the link please click here http://localhost" . URL . "activate?email={$email}&code={$code}";
			$headers = "<JCoNet Community><admin@mydomain.com>";

			//dont for get we have the email from the user's input in the form
			send_email($email, $subject, $msg, $headers);
		}
	}

	//log the user in
	function login_user($username, $password, $remember) {
		//select the password id and if the user is valid in the table
		$sql = "SELECT user_password, user_id, user_valid FROM users WHERE user_email = '$username' OR user_username = '$username' AND user_valid = 1";

		//run the query
		$result = query($sql);

		//find any results if any from the query
		if(rows($result) == 1) {
			//set the row = to an associtive array
			//pull out any nesssary data from the database
			$row = assoc($result);
			$db_password = $row['user_password'];
			$id = $row['user_id'];
			$active = $row["user_valid"];

			//check the user's password with the one in the database
			if(password_verify($password, $db_password)) {
				//if passed then set session = id and loggedin
				$_SESSION['id'] = $id;
				$_SESSION['loggedin'] = "true";

				//check for the remember me function
				//if clicked
				if($remember == "on") {
					//if clicked sets a cookie to allow the user to be logged in for 24 hours
					setcookie('loggedin', $id, time() + 86400);
				}
				//if user passed returns true and lets user login
				return ture;
			} else {
				//failed then does not let user log in
				return false;
			}
			//if returned true then results were found
			return true;
		} else {
			//checks of the user is activated
			$sql = "SELECT * FROM users WHERE user_username = '$username' OR user_email = '$username'";
			$query = query($sql);

			//checks of the user is activated returns any rows from the username or email
			if(rows($query) == 1) {
				$row = assoc($result);
				$active = $row["user_valid"];

				if($active === 0) {
				//echos validation error if account is not active
				echo validate_error("Your account is not active!");

				}
			}
			//if returned false user cannot login
			return false;
		}
	}

	//activate the user 
	function activate_user() {
		// sends off a get request
		if($_SERVER['REQUEST_METHOD'] == "GET") {
			//if the get request exits then email will be pulled from it
			//if code does not exist your account will not be activated
			if(isset($_GET['email'])) {
				$email = clean(escape($_GET['email']));
				$code = clean(escape($_GET['code']));

				//searches for email and validation code
				$sql = "SELECT * FROM users WHERE user_email = '$email' AND user_code = '$code'";
				$result = query($sql);

				//if validation code and email exist for the same user then returns 1 result
				if(rows($result) == 1) {
					//update the user to set active to true and resets the code to 0
					$sql = "UPDATE users SET user_valid = 1, user_code = 0 WHERE user_email = '$email'";
					//query is run
					$query = query($sql);

					//creates flash message for success
					set_message("<div class='alert alert-success alert-dismissible fade show' role='alert'>
						  <strong>Sweet your account got activated,</strong> maybe you should login!
						  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
						    <span aria-hidden='true'>&times;</span>
						  </button>
						</div>");
					//redirects to the login page
					url("login");
				} else {
					//creates flash message for failure
					set_message("<div class='alert alert-danger alert-dismissible fade show' role='alert'>
						  <strong>Oh No.... </strong> Something went wrong and your account was not activated!
						  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
						    <span aria-hidden='true'>&times;</span>
						  </button>
						</div>");
					//redirects to the login page
					url("login");
				}	
			}
		}
	}
?>