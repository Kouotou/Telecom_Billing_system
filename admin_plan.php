<?php
require_once"database.inc.php";



//user search by the adnin RO select operation
        //user update by admin
        $plan_name = "yamo"; //$_POST["username"]; (uncomment this then replace the value Gace with name specified from the html form)
       // $plan_id = 105;                                 
        $descriptn = "for youth and students";  //$_POST["email"];
        $cost = "500";
       
        $plansearch= "sms";
        $operation = "update";
        
try{
    
 
switch($operation){
  case 'search':
    $query = "SELECT * FROM services WHERE plan_name = :Plansearch;";

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":Plansearch", $plansearch);

    $stmt->execute();

    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if(empty($results)){
         echo"results not found";

    }
    else{
        foreach($results as $row){
        
        echo htmlspecialchars($row["plan_name"]);
        echo htmlspecialchars($row["plan_id"]);
        echo htmlspecialchars($row["descriptn"]);
        echo htmlspecialchars($row["cost"]);
     }
    }
  break;


  case'add':
    $querry = "INSERT INTO services(plan_id, plan_name, descriptn,cost)
              VALUES (:plan_id, :plan_name, :descriptn,:cost);";
              $stmt = $pdo->prepare($querry);

              $stmt-> bindparam("plan_id", $plan_id);
              $stmt-> bindparam("plan_name", $plan_name);
              $stmt-> bindparam("descriptn", $descriptn);
              $stmt-> bindparam("cost", $cost);
  

    $stmt->execute();

break;

case'update':
    $querry = "UPDATE services SET plan_name = :plan_name, descriptn = :descriptn,
               cost = :cost WHERE plan_id = 108;";

           $stmt = $pdo->prepare($querry);
    

           $stmt-> bindparam("plan_name", $plan_name);
           $stmt-> bindparam("descriptn", $descriptn);
           $stmt-> bindparam("cost", $cost);

           $stmt->execute();
break;

case 'delete':
    $querry = "DELETE FROM services WHERE plan_id = :plan_id AND plan_name = :plan_name;";

         $stmt = $pdo->prepare($querry);
  
         $stmt-> bindparam("plan_id", $plan_id);
         $stmt-> bindparam("plan_name", $plan_name);
        
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

?>

