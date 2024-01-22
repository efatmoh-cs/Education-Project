<?php

    try{
        $sql = "SELECT * FROM `add_meeting` WHERE id = ?  ";
        $stmt=$conn->prepare($sql);
        $stmt->execute([$id]);
        $resultt = $stmt->fetch();


        $name = $resultt["meetingDate"];
        $title= $resultt["title"];
        $content = $resultt["content"];
        $location = $resultt["location"];
        $price = $resultt["price"];
        $image = $resultt["image"];
        $cat_id = $resultt["cat_id"];
        $published = $resultt["published"];
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