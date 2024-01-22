<?php


if($_SERVER["REQUEST_METHOD"]==="POST"){
  if(isset($_POST["form2"])){
    
   
    $fullname=$_POST["fullname"]; 
    $username =$_POST["username"];
    $email=$_POST["email"];   

$pass=password_hash($_POST["password"],PASSWORD_DEFAULT);


    include_once("../includes/conn.php");
try{
    $sql = " INSERT INTO `usears`(`fullname`, `user_name`, `email`, `pass`) VALUES (?,?,?,?)";
$stmt = $conn->prepare($sql);
$stmt->execute([$fullname,$username,$email,$pass]);
echo "add sucss";
 header("Location:login.php#signin");//---after registration go to login
 die();

 
}
catch(PDOException $e){
    echo "data failed: " . $e->getMessage();
}


}

session_start();
if(isset($_SESSION["logged"])){
  if($_SESSION["logged"]){
    header("Location: meetings.php");
    die();
  }
}

if(isset($_POST["form1"])){
 
$email=$_POST["email"];
$pass =$_POST["password"];

    include_once("../includes/conn.php");
try{
    $sql = 'SELECT pass FROM `usears` WHERE `email`= ?';
$stmt = $conn->prepare($sql);
$stmt->execute([$email]);
if ($stmt->rowCount()>0){
  $result = $stmt->fetch();
  $hash = $result["pass"];
  $verify = password_verify($pass, $hash);
  if($verify){
      $_SESSION["logged"] = true;
      header("Location: meetings.php");
      die();
  }else{
      echo "No it's not the same password";
  }
}else{
  echo "Email not found in our DB";
}

}catch(PDOException $e){
echo "data failed: " . $e->getMessage();
}
}

}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Education Admin | Login/Register</title>

    <!-- Bootstrap -->
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">


            <form action="" method="POST" >
              <h1>Login Form</h1>
              <div>
                <input type="text" name="email" class="form-control" placeholder="email" required="" />
              </div>
              <div>
                <input type="password" name="password" class="form-control" placeholder="Password" required="" />
              </div>
             
              <hr>
        <div class="btn-block">
          <p>By clicking Register, you agree on our <a href="https://www.w3docs.com/privacy-policy">Privacy Policy for W3Docs</a>.</p>
          <button type="submit" name="form1">login</button>
 
          <a class="reset_pass" href="#">Lost your password?</a>
        </div>
             

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">New to site?
                  <a href="#signup" class="to_register"> Create Account </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-graduation-cap"></i></i> Education Admin</h1>
                  <p>©2016 All Rights Reserved. Education Admin is a Bootstrap 4 template. Privacy and Terms</p>
                </div>
              </div>
            </form>
           
            
          </section>
        </div>

        <div id="register" class="animate form registration_form">
          <section class="login_content">
            <form  action="" method="POST" >
              <h1>Create Account</h1>
              <div>
                <input type="text" name="fullname"  class="form-control" placeholder="Fullname"   required="" />
              </div>
              <div>
                <input type="text" name="username" class="form-control" placeholder="Username"  required="" />
              </div>
              <div>
                <input type="email" class="form-control" placeholder="Email" name="email" required="" />
              </div>
              <div>
                <input type="password"  name="password" class="form-control" placeholder="Password" required="" />
              </div>
              <hr>
        <div class="btn-block">
          <p>By clicking Register, you agree on our <a href="https://www.w3docs.com/privacy-policy">Privacy Policy for W3Docs</a>.</p>
          <button type="submit" name="form2">Submit</button>
        </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Already a member ?
                  <a href="#signin" class="to_register"> Log in </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-graduation-cap"></i></i> Education Admin</h1>
                  <p>©2016 All Rights Reserved. Education Admin is a Bootstrap 4 template. Privacy and Terms</p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
</html>
