<?php
require_once"database.inc.php";



//user search by the adnin RO select operation
        //user update by admin
        $user_name = "bilal"; //$_POST["username"]; (uncomment this then replace the value Gace with name specified from the html form)
        $plan_id = 103;                                 
        $email = "bilal@gmail.com";  //$_POST["email"];
        $phone_num = "6820810000";
        $pwd = "jsh2p34";  //$_POST['password'];
        $hash = password_hash($pwd, PASSWORD_DEFAULT);
       
        $Usersearch= "junir";
        $operation = "update";
        
try{
    
 
switch($operation){
  case 'search':
    $query = "SELECT * FROM subscribers WHERE user_name = :Usersearch;";

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":Usersearch", $Usersearch);

    $stmt->execute();

    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if(empty($results)){
         echo"results not found";

    }
    else{
        foreach($results as $row){
        
        echo htmlspecialchars($row["user_name"]);
        echo htmlspecialchars($row["phone_num"]);
        echo htmlspecialchars($row["email"]);
        echo htmlspecialchars($row["sub_date"]);
     }
    }
  break;


  case'add':
        $querry = "INSERT INTO subscribers(user_name, plan_id, email, phone_num,pwd)
         VALUES (:user_name, :plan_id, :email, :phone_num,:hash);";
         $stmt = $pdo->prepare($querry);
  
         $stmt-> bindparam("user_name", $user_name);
         $stmt-> bindparam("plan_id", $plan_id);
         $stmt-> bindparam("email", $email);
         $stmt-> bindparam("phone_num", $phone_num);
         $stmt-> bindparam("hash", $hash);

         $stmt->execute();

break;

case'update':
    $querry = "UPDATE subscribers SET user_name = :user_name, plan_id = :plan_id, email = :email,
             phone_num = :phone_num, pwd = :hash WHERE sub_id = 6;";

           $stmt = $pdo->prepare($querry);
    
           $stmt-> bindparam("user_name", $user_name);
           $stmt-> bindparam("plan_id", $plan_id);
           $stmt-> bindparam("email", $email);
           $stmt-> bindparam("phone_num", $phone_num);
           $stmt-> bindparam("hash", $hash);

           $stmt->execute();
break;

case 'delete':
    $querry = "DELETE FROM subscribers WHERE user_name = :user_name AND plan_id = :plan_id;";

         $stmt = $pdo->prepare($querry);
  
         $stmt-> bindparam("user_name", $user_name);
         $stmt-> bindparam("plan_id", $plan_id);
        
         $stmt->execute();
break;

default:
echo"Please enter an Operation!";

           $pdo = null;
           $stmt = null;
}

}
 catch(PDOException $e){
 die("Query Failed:" . $e->getMessage());
    }

// else{
//header("location: ../index.php");
//}