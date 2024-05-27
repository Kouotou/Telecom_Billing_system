<?php 

	include('config/db_connect.php');

	$subs_name = $phone_number = $email = $address = '';
	$errors = array('subs_name' => '', 'phone_number' => '', 'email' => '', 'address' => '');

	if(isset($_POST['submit'])){
		
		// check name
		if(empty($_POST['subs_name'])){
			$errors['subs_name'] = 'A name is required';
		} else{
			$subs_name = $_POST['subs_name'];
			if(!preg_match('/^[a-zA-Z\s]+$/', $subs_name)){
				$errors['subs_name'] = 'Name must be letters and spaces only';
			}
		}

		// check phone_number
		if(empty($_POST['phone_number'])){
			$errors['phone_number'] = 'A phone Number is required';
		} else{
			$phone_number = $_POST['phone_number'];
			if(!preg_match('/^[0-9\s]+$/', $phone_number)){
				$errors['phone_number'] = 'Address must be letters and spaces only';
			}
		}

		// check email
		if(empty($_POST['email'])){
			$errors['email'] = 'An email is required';
		} else{
			$email = $_POST['email'];
			if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
				$errors['email'] = 'Email must be a valid email address';
			}
		}

		// check address
		if(empty($_POST['address'])){
			$errors['address'] = 'An address is required';
		} else{
			$address = $_POST['address'];
			if(!preg_match('/^[a-zA-Z\s]+$/', $address)){
				$errors['address'] = 'Address must be letters and spaces only';
			}
		}

		// check bundles
		// if(empty($_POST['bundles'])){
		// 	$errors['bundles'] = 'At least one bundles is required';
		// } else{
		// 	$bundles = $_POST['bundles'];
		// 	if(!preg_match('/^([a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)*$/', $bundles)){
		// 		$errors['bundles'] = 'Bundles must be a comma separated list';
		// 	}
		// }

		if(array_filter($errors)){
			//echo "errors in the form;
		} else {

			$subs_name = mysqli_real_escape_string($conn, $_POST['subs_name']);
			$phone_number = mysqli_real_escape_string($conn, $_POST['phone_number']);
			$email = mysqli_real_escape_string($conn, $_POST['email']);
			$address = mysqli_real_escape_string($conn, $_POST['address']);

			//create sql
			$sql = "INSERT INTO subscriber(subs_name, phone_number, email, address) 
			VALUES('$subs_name', '$phone_number', '$email', '$address')";

			//save to db and check
			if(mysqli_query($conn, $sql)){
				//success
				header('Location: index.php');
			} else {
				//error
				echo 'Query Error: '. mysqli_error($conn);
			}

			//echo "No errors in the form";
		}

	} // end POST check

?>

<!DOCTYPE html>
<html>
	
	<?php include('templates/header.php'); ?>

	<section class="container grey-text">
		<h4 class="center">Add a Customer</h4>
		<form class="white" action="add.php" method="POST">
		<label>Your Name</label>
			<input type="text" name="subs_name" value="<?php echo htmlspecialchars($subs_name) ?>">
			<div class="red-text"><?php echo $errors['subs_name']; ?></div>
			<label>Your Phone Number</label>
			<input type="text" name="phone_number" value="<?php echo htmlspecialchars($phone_number) ?>">
			<div class="red-text"><?php echo $errors['phone_number']; ?></div>
			<label>Your Email</label>
			<input type="text" name="email" value="<?php echo htmlspecialchars($email) ?>">
			<div class="red-text"><?php echo $errors['email']; ?></div>
			<label>Address</label>
			<input type="text" name="address" value="<?php echo htmlspecialchars($address) ?>">
			<div class="red-text"><?php echo $errors['address']; ?></div>
			<!-- <label>Bundles (comma separated)</label>
			<input type="text" name="bundles" value="<?php //echo htmlspecialchars($bundles) ?>">
			<div class="red-text"><?php //echo $errors['bundles']; ?></div> -->
			<div class="center">
				<input type="submit" name="submit" value="Submit" class="btn brand z-depth-0">
			</div>
		</form>
	</section>

	<?php include('templates/footer.php'); ?>

</html>