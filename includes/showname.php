<?php

    try{
        $sql = "SELECT * FROM `usears` WHERE id = ?  ";
        $stmt=$conn->prepare($sql);
        $stmt->execute([$id]);
       $stmt->fetch();


       $_REQUEST ["fullname"];
       
    
       
    
      }catch(PDOException $e){
          echo "Failed Delete Data: " . $e->getMessage();
      }


?>