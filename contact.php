<?php
	// Message Vars
	$msg ='';
	$msgClass = '';

	// Check for Submit
	if(filter_has_var(INPUT_POST, 'submit')){
		// Get Form Data
		$name = htmlspecialchars($_POST['name']);
		$email = htmlspecialchars($_POST['email']);
		$message = htmlspecialchars($_POST['message']);

		// Check Required Fields
		if (!empty($email) && !empty($name) && !empty($message)) {
			// Passed
			// Check Email
			if(filter_var($email, FILTER_VALIDATE_EMAIL) === false){
				// Failed
				$msg = 'Please use a valid email';
				$msgClass = 'alert-danger';
			} else {
				// Passed
				$toEmail = 'bryan@slappykrooks.com';
				$subject = 'Contact Request From '.$name;

				$body = "Contact Request\nName: $name\nEmail: $email\n\n$message";


				// Email Headers
				$headers = "MIME-Version 1.0" ."\r\n";
				$headers .="Content-Type:text/html;charset=UTF-8" . "\r\n";

				// Additional Headers
				$headers .= "From: " .$name. "<".$email.">". "\r\n";

				if(mail($toEmail, $subject, $body, $headers)) {
					// Email Sent
					$msg = 'Your email has been sent';
					$msgClass = 'alert-success';
				} else {
					// Failed
					$msg = 'Your email was not sent';
					$msgClass = 'alert-danger';
				}
			}
		} else {
			// Failed
			$msg = 'Please fill in all fields';
			$msgClass = 'alert-danger';
		}
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<script src="https://kit.fontawesome.com/8283a560fc.js" crossorigin="anonymous"></script>
	<link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
	<link rel="stylesheet" href="css_Contact.css">
	
	<title>SlappyKrooks | Contact</title>
</head>
<body>
	<header class="fixed-bar">
		<nav>
			<div class="logo">
				<a href="index.html"><h4>SlappyKrooks</h4></a>
			</div>
			<ul class="nav-links">
				<li><a href="about.html">About</a></li>
				<li><a href="https://krooksapp.herokuapp.com">Blog</a></li>
				<li><a href="work.html">Work</a></li>
				<li><a href="travel.html">Travel</a></li>
			</ul>
			<div class="burger">
				<div class="line1"></div>
				<div class="line2"></div>
				<div class="line3"></div>
			</div>
		</nav>
	</header>

	<section>
		<!--  This could be Above Everything Else -->
	</section>

	<!-- Start Modal -->
	<div class="modalContainer">
		<div class="wrapper">

			<!--  Edit Company Info -->
			<div class="company-info">
				<!-- <span>     this could be above Envelope Contact  </span> -->
				<h3><i class="fas fa-envelope"></i> Contact</h3>
					<div class="emailAddress">
						bryan@slappykrooks.com
					</div>
					<ul>
						<li><a href="https://www.instagram.com/bryan_moll"><i class="fab fa-instagram"></i> Instagram</a></li>
						<li><a href="https://www.youtube.com/user/jumanjiwarlord"><i class="fab fa-youtube"></i> Youtube</a></li>
						<li><a href="https://github.com/themulligan"><i class="fab fa-github"></i> Github</a></li>
					</ul>
					<p class="desktop-info">
                        Get in touch.  Collaborate.  Leave feedback.
					</p>
			</div>
			<!--  End Company Info -->

			<!--  Edit Form -->
			<div class="contact">
				<?php if($msg !=''): ?>
					<div class="alert <?php echo $msgClass; ?>"><?php echo $msg; ?></div>
				<?php endif; ?>
				<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
					<p class="full">
						<input type="text" name="name" placeholder="NAME" value="<?php echo isset($_POST['name']) ? $name : ''; ?>">
					</p>
					<p class="full">
						<input type="text" name="email" placeholder="EMAIL" value="<?php echo isset($_POST['email']) ? $email : ''; ?>">
					</p>
					<p class="full">
						<textarea name="message" placeholder="MESSAGE"><?php echo isset($_POST['message']) ? $message : ''; ?></textarea>
					</p>
					<p class="full">
					    <button type="submit" name="submit">SEND</button>
					</p>
				</form>
			</div>
			<!-- End Form -->
		</div>
	</div>
	<!-- End Modal -->

	<div class="social">
		<div><a href="http://www.instagram.com/bryan_moll"><i class="fab fa-instagram"></i></a></div>
		<div><a href="http://www.github.com/themulligan"><i class="fab fa-github"></i></a></div>
		<div><a href="http://www.youtube.com/jumanjiwarlord"><i class="fab fa-youtube"></i></a></div>
	</div>

	<div class="footer">
		<div><a href="http://www.instagram.com/bryan_moll"><i class="fab fa-instagram"></i></a></div>
		<div><a href="contact.php"><i class="far fa-envelope"></i></a></div>
		<div><a href="http://www.youtube.com/jumanjiwarlord"><i class="fab fa-youtube"></i></a></div>
	</div>

	<script src="javaScript.js"></script>

</body>
</html>


