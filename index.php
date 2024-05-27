<?php 
	//MYSQLi or PDO (PHP Data Object)
	// connecting to database using mysqli
	// $conn = mysqli_connect('localhost', 'group2', 'password', 'telecom_central_db');

	// // check connection
	// if(!$conn){
	// 	echo 'Connection error: ' . mysqli_connect_error();
	// }

	//replacing all the above code by including the new file

	include('config/db_connect.php');

	//write queries for all subscribers
	$sql = 'SELECT subs_name, email, address, subs_id FROM subscriber ORDER BY subscription_date';

	//make query and get results
	$result = mysqli_query($conn, $sql);

	//fetch the resulting rows as an array
	$subscribers = mysqli_fetch_all($result, MYSQLI_ASSOC);

	//good practice is to free results from memory once used
	mysqli_free_result($result);

	//close connection
	mysqli_close($conn);

	//print_r($subscribers);
?>

<!DOCTYPE html>
<html>
	
	<?php include('templates/header.php'); ?>

	<h4 class="centre grey-text">Subscribers</h4>

	<div class="container">
		<div class="row">
			<?php foreach($subscribers as $subscriber): ?>

				<div class="col s6 md3">
					<div class="card z-depth-0">
						<div class="card-content center">
							<h6> <?php echo htmlspecialchars($subscriber['subs_name']); ?></h6>
							<ul>
								<?php foreach(explode(' ', $subscriber['address']) as $subs) : ?>
									<li> <?php echo htmlspecialchars($subs); ?> </li>
								<?php endforeach; ?>
							</ul>
						</div>
						<div class="card-action right-align">
							<a href="#" class="brand-text">More info</a>
						</div>
					</div>
				</div>

			<?php endforeach; ?>

		</div>
	</div>

	<?php include('templates/footer.php'); ?>

</html>