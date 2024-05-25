<?php 

	$name = $email = $address = $bundles = '';
	$errors = array('name' => '', 'email' => '', 'address' => '', 'bundles' => '');

	if(isset($_POST['submit'])){
		
		// check name
		if(empty($_POST['name'])){
			$errors['name'] = 'A name is required';
		} else{
			$name = $_POST['name'];
			if(!preg_match('/^[a-zA-Z\s]+$/', $name)){
				$errors['name'] = 'Name must be letters and spaces only';
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
		if(empty($_POST['bundles'])){
			$errors['bundles'] = 'At least one bundles is required';
		} else{
			$bundles = $_POST['bundles'];
			if(!preg_match('/^([a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)*$/', $bundles)){
				$errors['bundles'] = 'Bundles must be a comma separated list';
			}
		}

		if(array_filter($errors)){
			//echo "errors in the form;
		} else {
			//echo "No errors in the form;
			header('Location: index.php');
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
			<input type="text" name="name" value="<?php echo htmlspecialchars($name) ?>">
			<div class="red-text"><?php echo $errors['name']; ?></div>
			<label>Your Email</label>
			<input type="text" name="email" value="<?php echo htmlspecialchars($email) ?>">
			<div class="red-text"><?php echo $errors['email']; ?></div>
			<label>Address</label>
			<input type="text" name="address" value="<?php echo htmlspecialchars($address) ?>">
			<div class="red-text"><?php echo $errors['address']; ?></div>
			<label>Bundles (comma separated)</label>
			<input type="text" name="bundles" value="<?php echo htmlspecialchars($bundles) ?>">
			<div class="red-text"><?php echo $errors['bundles']; ?></div>
			<div class="center">
				<input type="submit" name="submit" value="Submit" class="btn brand z-depth-0">
			</div>
		</form>
	</section>

	<?php include('templates/footer.php'); ?>

</html>