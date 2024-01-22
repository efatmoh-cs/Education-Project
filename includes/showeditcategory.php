<?php
if(isset($id)){
    try{
        $sql = "SELECT * FROM `catogries` WHERE cat_id = ?";
        $stmt=$conn->prepare($sql);
        $stmt->execute([$id]);
        $resultt = $stmt->fetch();


        $category = $resultt["category"];
       
     
      
        $status = true;
    
       
    
      }catch(PDOException $e){
          echo "Failed Delete Data: " . $e->getMessage();
      }
}

?>