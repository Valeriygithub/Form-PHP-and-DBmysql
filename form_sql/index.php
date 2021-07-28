<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>form_valera</title>
</head>
<style>
	* {
		font-family: sans-serif;
		margin: 0;
	}

	h2,
	h4 {
		text-align: center;
		margin: 5px 0;
	}

	.form {
		display: flex;
		flex-direction: column;
		max-width: 400px;
		padding: 15px;
		margin: 50px auto;
		border: 1px solid indigo;
	}

	input {
		margin: 5px 0;
		box-shadow: 0px 0px 3px #886868;
		font-size: 15px;
		height: 20px;
		border: 1px solid black;
	}

	.btn {
		background-color: indigo;
		color: #fff;
		text-transform: uppercase;
		height: 30px;
		margin-top: 5px;
		border: 1px solid #222;
	}

	.alert {
		margin: 5px 0;
	}
</style>

<body>
	<?php require('connect.php');



	if (isset($_POST['usname']) && isset($_POST['password'])) {

		$username = $_POST['usname'];
		$email = $_POST['email'];
		$password = $_POST['password'];

		$query = "INSERT INTO users (usname, email, password) VALUES ('$username', '$email', '$password' )";

		// Проверка если есть совпадения в базу данных не полетит новый user
		$result = mysqli_query($connection, $query);
		if ($result) {
			$good = "Registration successful";
		} else {
			$mistake = " Mistake there are matches in the form ";
		}
	}

	?>
	<div class="container">

		<form method="post" class="form">

			<h2>Regitratiom</h2>

			<?php if (isset($good)) { ?>
				<div class="alert">
					<h4><?php echo  $good ?></h4>
				</div>
			<?php } ?>

			<?php if (isset($mistake)) { ?>
				<div class="alert">
					<h4><?php echo  $mistake ?></h4>
				</div>
			<?php } ?>

			<input type="text" name="usname" placeholder="Usernaname" require>
			<input type="emsil" name="email" placeholder="Email" require>
			<input type="password" name="password" placeholder="Password" require>
			<button class="btn" type="submit">Register</button>

		</form>

	</div>

</body>

</html>