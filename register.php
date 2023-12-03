<!DOCTYPE html>
<html lang="en">

<head>
	<title>REGISTER</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="images/icons/favicon.ico" />
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
</head>

<body>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="images/img-01.png" alt="IMG">
				</div>

				<form class="login100-form validate-form">
					<span class="login100-form-title">
						Member Register
					</span>

					<?php
					session_start();
					include 'koneksi.php';

					if ($_SERVER["REQUEST_METHOD"] == "POST") {
						$username = $_POST['username'];
						$email = $_POST['email'];
						$alamat = $_POST['alamat'];
						$password = $_POST['password'];
						$role = $_POST['role'];

						$query = "INSERT INTO user (username, email, alamat, password, role) VALUES ('$username', '$email', '$alamat', '$password', '$role')";
						$result = $koneksi->query($query);

						if ($result) {
							header("location: index.php");
							exit();
						} else {
							$error = "Registrasi gagal. Silakan coba lagi.";
						}
					}
					?>

					<form class="login100-form validate-form" action="" method="post">
						<?php if (isset($error)) {
							echo "<p class='error'>$error</p>";
						} ?>

						<div class="wrap-input100 validate-input" data-validate="Valid Username is required: Ra***">
							<input class="input100" type="text" name="username" placeholder="Username" required>
							<span class="focus-input100"></span>
							<span class="symbol-input100">
								<i class="fa fa-user-circle-o" aria-hidden="true"></i>
							</span>
						</div>

						<div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
							<input class="input100" type="text" name="email" placeholder="email" required>
							<span class="focus-input100"></span>
							<span class="symbol-input100">
								<i class="fa fa-envelope" aria-hidden="true"></i>
							</span>
						</div>

						<div class="wrap-input100 validate-input" data-validate="Password is required">
							<input class="input100" type="password" name="password" placeholder="Password" required>
							<span class="focus-input100"></span>
							<span class="symbol-input100">
								<i class="fa fa-lock" aria-hidden="true"></i>
							</span>
						</div>

						<div class="wrap-input100 validate-input" data-validate="Role is required: User">
							<select class="input100" name="role" placeholder="Role" required>
								<option value="user">User</option>
								<option value="admin">Admin</option>
								<option value="distributor">Distributor</option>
							</select>
							<span class="focus-input100"></span>
							<span class="symbol-input100">
								<i class="fa fa-address-book" aria-hidden="true"></i>
							</span>
						</div>

						<div class="container-login100-form-btn">
							<button class="login100-form-btn">
								Register
							</button>
						</div>

						<div class="text-center p-t-136">
							<p>Already have an account? <a href="index.php">Login here</a></p>
						</div>
					</form>
			</div>
		</div>
	</div>

	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="vendor/select2/select2.min.js"></script>
	<script src="vendor/tilt/tilt.jquery.min.js"></script>
	<script>
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
	<script src="js/main.js"></script>
</body>

</html>