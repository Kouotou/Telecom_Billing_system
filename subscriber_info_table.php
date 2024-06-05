<?php   

//if ($_SERVER["REQUEST_METHOD"] == "POST") {
   $user_name = "junir"; //$_POST["username"]; (uncomment this then replace the value Gace with name specified from the html form)
   $plan_id = 105;                                 
   $email = "jr@gmail.com";  //$_POST["email"];
   $phone_num = "682082031";
   $pwd = "jrn234";  //$_POST['password'];
   $hash = password_hash($pwd, PASSWORD_DEFAULT);


   try{
      require_once "database.inc.php";
   } catch(PDOException $e){
      die("Querry failed: " .$e->getMessage());
   }
// }
// else{
 //header("location: ../index.php");
//}
$querry = "INSERT INTO subscribers(user_name, plan_id, email, phone_num,pwd)
           VALUES (:user_name, :plan_id, :email, :phone_num,:hash);";
           $stmt = $pdo->prepare($querry);
    
           $stmt-> bindparam("user_name", $user_name);
           $stmt-> bindparam("plan_id", $plan_id);
           $stmt-> bindparam("email", $email);
           $stmt-> bindparam("phone_num", $phone_num);
           $stmt-> bindparam("hash", $hash);

           $stmt->execute();

           $pdo = null;
           $stmt = null;
           
