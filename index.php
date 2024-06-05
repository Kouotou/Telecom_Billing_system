<?php

require_once"database.inc.php";

$query = "SELECT * FROM services";
$stmt = $pdo->prepare($query);


$stmt->execute();

$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

if(empty($results)){
    echo"results not found";

}
else{
    foreach($results as $row){
        
       $row["plan_name"];"<br>";
       $row["cost"];
       $row["descriptn"];
    }
}
$pdo = null;
$stmt = null;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <ul>
        <li>Plan Name: <?=$row["plan_name"];?></li>
        <li>Plan cost: <?=$row["cost"];?></li>
        <li>Descriptn: <?=$row["descriptn"];?></li>
        
    </ul>
</body>
</html>
