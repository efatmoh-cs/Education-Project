<?php 
 include_once("../includes/conn.php");
 if($_SERVER["REQUEST_METHOD"] === "GET"){
  
  
  try{
    $sql = "SELECT  `fullname` FROM `usears` ";
    $stmt=$conn->prepare($sql);
    $stmt->execute();
   $stmt->fetch();

   $name=  $_REQUEST ["fullname"];
 
   

   

  }catch(PDOException $e){
      echo "Failed Delete Data: " . $e->getMessage();
  
  }}
?>
 
 <!-- menu profile quick info -->
  <div class="profile clearfix">
              <div class="profile_pic">
                <img src="images/img.jpg" alt="..." class="img-circle profile_img">
              </div>
              
              <div class="profile_info">
                <span>Welcome</span>
                
                <h6> <?php echo $name  ?></h6>
              </div>
           
            </div>
            <!-- /menu profile quick info -->