<?php   

//if ($_SERVER["REQUEST_METHOD"] == "POST") {
   $plan_name = "race"; //$_POST["username"]; (uncomment this then replace the value Gace with name specified from the html form)
   $plan_id = 105;                                 
   $descriptn = "no borrow";  //$_POST["email"];
   $cost = "1000";
   


   try{
      require_once "database.inc.php";
   } catch(PDOException $e){
      die("Querry failed: " .$e->getMessage());
   }
// }
// else{
 //header("location: ../index.php");
//}


$querry = "INSERT INTO services(plan_id, plan_name, descriptn,cost)
           VALUES (:plan_id, :plan_name, :descriptn,:cost);";
           $stmt = $pdo->prepare($querry);
    
           $stmt-> bindparam("plan_id", $plan_id);
           $stmt-> bindparam("plan_name", $plan_name);
           $stmt-> bindparam("descriptn", $descriptn);
           $stmt-> bindparam("cost", $cost);
         

           $stmt->execute();

           $pdo = null;
           $stmt = null;
           
