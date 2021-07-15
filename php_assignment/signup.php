<?php
require "./includes/common.php";
if (isset($_SESSION['email'])) {
	header("location: products.php");
}
?>
<!DOCTYPE html>
<html>
lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>LifeStyle Stores</title>
	<style>
		.navst {
			margin-bottom: 0px !important;
			border-radius: 0px !important;
		}

		#banner-image {
			padding-top: 75px;
			padding-bottom: 50px;
			text-align: center;
			color: #f8f8f8;
			background: url("images/intro-bg_1.jpg");
			background-position: center;
			background-repeat: no-repeat;
			background-size: cover;
		}

		#banner_content {
			position: relative;
			padding-top: 6%;
			padding-bottom: 6%;
			margin: 12% auto;
			background-color: rgba(0, 0, 0, 0.7);
			max-width: 660px;
		}

		.panel-margin {
			margin-top: 80px;
			margin-bottom: 80px;
		}

		.text-centre {
			text-align: center;
		}

		.navst {
			margin-bottom: 0px !important;
			border-radius: 0px !important;
		}

		.imgmg {
			margin-top: 50px !important;
			margin-bottom: 50px !important;
		}

		.text {
			text-align: center;
		}

		.textp {
			text-align: center;
			font-size: 15px !important;
		}

		.imgc {
			margin-left: 510px;
		}

		footer {
			position: fixed;
			padding: 10px 0;
			text-align: center;
			bottom: 0;
			background-color: #101010;
			color: #9d9d9d;
			width: 100%;
		}
		.red{
			color: red;
		}
	</style>
	<!-- link to Bootstrap minified css-->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<!-- link to Jquery minified-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<!-- link to Bootstrap JS -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<!-- link to external CSS -->
	<link rel="stylesheet" type="text/css" href="index.css">
</head>

<body>
	<?php
	require "./includes/header.php";
	?>
	<div class="container panel-margin">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h2 class="panel-title">SignUp</h2>
			</div>
			<div class="panel-body">
				<form method="post" action="signup_script.php">
					<div class="form-group">
						<input type="text" class="form-control" name="name" placeholder="Name" required pattern="[A-Za-z-0-9]+\s[A-Za-z-'0-9]+">
					</div>
					<div class="form-group">
						<input type="email" class="form-control" name="email" placeholder="Email" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$">
						<div class="red"><?php
						if (isset($_GET['m1'])) {
							echo $_GET['m1'];
						}
						?>
						</div>
					</div>
					<div class="form-group">
						<input type="password" class="form-control" name="password" placeholder="Password (should be more than 8 characters)" required pattern=".{8,}">
					</div>
					<div class="form-group">
						<input type="number" class="form-control" name="contact" id="contact" onsubmit="cont()" placeholder="Contact" required maxlength="10" size="10">
						<div class="red"><?php
						if (isset($_GET['m2'])) {
							echo $_GET['m2'];
						}
						?>
						</div>
					</div>
					<div class="form-group">
						<input type="text" class="form-control" name="city" placeholder="City" required>
					</div>
					<div class="form-group">
						<input type="text" class="form-control" name="address" placeholder="Address" required>
					</div>
					<button type="submit" class="btn btn-primary">Submit</button>
				</form>
			</div>
			<div class="panel-footer">
				Already have an account?Click <a href="login.php">here</a> to login.
			</div>
		</div>
	</div>
	<?php
	require "./includes/footer.php";
	?>
</body>

</html>