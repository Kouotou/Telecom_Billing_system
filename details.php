<?php 
    include('config/db_connect.php');

    if(isset($_POST['delete'])) {

        $id_to_delete = mysqli_real_escape_string($conn, $_POST['id_to_delete']);

        $sql = "DELETE FROM subscriber WHERE subs_id = $id_to_delete";

        if(mysqli_query($conn, $sql)) {
            // success
            header('Location: index.php');
        } {
            // failure
            echo 'query error:' . mysqli_error($conn);
        }
    }

    //check GET request id Param
    if(isset($_GET['id'])){
        $id = mysqli_real_escape_string($conn, $_GET['id']);

        // make sql
        $sql = "SELECT * FROM subscriber WHERE subs_id = $id";

        // Get the query results
        $result = mysqli_query($conn, $sql);

        // fetch results in array format
        $subscriber = mysqli_fetch_assoc($result);
        
        //good practice is to free results from memory once used
        mysqli_free_result($result);

        //close connection
        mysqli_close($conn);

        //print_r($subscriber);
    }

?>

<!DOCTYPE html>
<html>
    <?php include('templates/header.php'); ?>
    <div class="container center">
        <?php if($subscriber): ?>

            <h4><?php echo htmlspecialchars($subscriber['subs_name']); ?></h4>
            <p>Email: <?php echo htmlspecialchars($subscriber['email']); ?></p>
            <p><?php echo date($subscriber['subscription_date']); ?></p>
            <h5>Address</h5>
            <p><?php echo htmlspecialchars($subscriber['address']); ?></p>

            <!-- DELETE FORM-->
            <form action="details.php" method="POST">
                <input type="hidden" name="id_to_delete" value="<?php echo $subscriber['subs_id'] ?>">
                <input type="submit" name="delete" value="Delete" class = "btn brand z-depth-0">
            </form>

        <?php else: ?>
            <h5>No such Subscriber exist!</h5>
        <?php endif; ?>
    </div>
    <?php include('templates/footer.php'); ?>
</html>