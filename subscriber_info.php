<?php
$user_name = "coolins"; //$_POST["username"]; (uncomment this then replace the value Gace with name specified from the html form)
$plan_id = 103;                                 
$email = "lins@gmail.com";  //$_POST["email"];
$phone_num = "689082031";
$pwd = "cool234";  //$_POST['password'];
$hash = password_hash($pwd, PASSWORD_DEFAULT);

//$Usersearch= "moses";
require_once"database.inc.php";

// user input info
$querry = "INSERT INTO subscribers(user_name, plan_id, email, phone_num,pwd)
           VALUES (:user_name, :plan_id, :email, :phone_num,:hash);";
           $stmt = $pdo->prepare($querry);
    
           $stmt-> bindparam("user_name", $user_name);
           $stmt-> bindparam("plan_id", $plan_id);
           $stmt-> bindparam("email", $email);
           $stmt-> bindparam("phone_num", $phone_num);
           $stmt-> bindparam("hash", $hash);

           $stmt->execute();

    header("location:index.php");

//display user info

$query = "SELECT * FROM subscribers WHERE user_name = :user_name;";

$stmt = $pdo->prepare($query);
$stmt->bindParam(":Usersearch", $Usersearch);

$stmt->execute();

$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

if(empty($results)){
    echo"results not found";

}
else{
    foreach($results as $row){

        echo $row["user_name"];"<br>";
        echo $row["phone_num"];"<br>";
        echo $row["email"];"<br>";
    }
}

$pdo = null;
$stmt = null;