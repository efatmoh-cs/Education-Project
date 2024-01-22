<?php

    try{
        $sql = "SELECT * FROM `usears` WHERE id = ?  ";
        $stmt=$conn->prepare($sql);
        $stmt->execute([$id]);
        $resultt = $stmt->fetch();


        $fullname = $resultt["fullname"];
        $username= $resultt["user_name"];
        $email= $resultt["email"];
      
        $published = $resultt["active"];
        if($published){
            $checked = "Checked";
        }else{
            $checked = "";
        }
      
        $status = true;
    
       
    
      }catch(PDOException $e){
          echo "Failed Delete Data: " . $e->getMessage();
      }


?>