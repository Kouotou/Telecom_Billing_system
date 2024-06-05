<?php

   $dns= "mysql:host=localhost;dbname=telecomdb";
   $dbusername = "root";
   $dbpassword = "";
   
   $pdo = new PDO($dns, $dbusername, $dbpassword);
       
   if($pdo){
    echo"you are connected";
   } 
   else{
      echo"You are not connected";
   }