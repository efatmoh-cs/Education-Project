<?php
$status = false;

// to include the DB
include_once("../includes/conn.php");

try{
    $sql = " SELECT * FROM `catogries`";
$stmtcat = $conn->prepare($sql);
$stmtcat->execute();

}
catch(PDOException $e){
    echo "data failed catgory: " . $e->getMessage();
}

if($_SERVER["REQUEST_METHOD"] === "GET"){
  if(isset($_GET["id"])){
	$id = $_GET["id"];
	include_once("../includes/showeditmeet.php");
  }
}elseif($_SERVER["REQUEST_METHOD"] === "POST"){
  // to update data
  $id = $_POST["id"];
  $name = $_POST["meetingdate"];
  $title = $_POST["title"];
  $content= $_POST["content"];
  $location= $_POST["location"];
  $price= $_POST["price"]; 
 
$active= $_POST["active"]; 
 
  if( isset($active) ){
	$active= "1";

   }else{
	  $active="0";
			 
   }

    // Get reference to uploaded image
    $image_file = $_FILES["image"];

    // Exit if no file uploaded
    if ($_FILES["image"] != "" && $_FILES["image"]["tmp_name"] == "") {
        $image_name = $oldImage;
    }else{
        // Exit if image file is zero bytes
        if (filesize($image_file["tmp_name"]) <= 0) {
            die('Uploaded file has no contents.');
        }

        // Exit if is not a valid image file
        $image_type = exif_imagetype($image_file["tmp_name"]);
        if (!$image_type) {
            die('Uploaded file is not an image.');
        }

        // Get file extension based on file type, to prepend a dot we pass true as the second parameter
        $image_extension = image_type_to_extension($image_type, true);

        // Create a unique image name
        $image_name = bin2hex(random_bytes(16)) . $image_extension;

        // Move the temp image file to the images directory
        move_uploaded_file(
            // Temp image location
            $image_file["tmp_name"],

            // New image location
            __DIR__ . "/../assets/images/" . $image_name
        );
    }
 
  $sql = "UPDATE `add_meeting` SET `meetingDate`=?,`title`=?,`content`=?,`location`=? ,`price`=? ,`image`=?,`published`=?  WHERE  id =?";
  $stmtUpdate=$conn->prepare($sql);
  $stmtUpdate->execute([$name,$title,$content, $location, $price, $image_name,$active, $id]);
  header("Location: meetings.php");
  die();

 
include_once("../includes/showeditmeet.php");

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

	<title>Education Admin | Edit Meeting</title>

	<!-- Bootstrap -->
	<link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
	<!-- Font Awesome -->
	<link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
	<!-- NProgress -->
	<link href="vendors/nprogress/nprogress.css" rel="stylesheet">
	<!-- iCheck -->
	<link href="vendors/iCheck/skins/flat/green.css" rel="stylesheet">
	<!-- bootstrap-wysiwyg -->
	<link href="vendors/google-code-prettify/bin/prettify.min.css" rel="stylesheet">
	<!-- Select2 -->
	<link href="vendors/select2/dist/css/select2.min.css" rel="stylesheet">
	<!-- Switchery -->
	<link href="vendors/switchery/dist/switchery.min.css" rel="stylesheet">
	<!-- starrr -->
	<link href="vendors/starrr/dist/starrr.css" rel="stylesheet">
	<!-- bootstrap-daterangepicker -->
	<link href="vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

	<!-- Custom Theme Style -->
	<link href="build/css/custom.min.css" rel="stylesheet">
</head>

<body class="nav-md">
	<div class="container body">
		<div class="main_container">
			<div class="col-md-3 left_col">
				<div class="left_col scroll-view">
					<div class="navbar nav_title" style="border: 0;">
						<a href="index.html" class="site_title"><i class="fa fa-graduation-cap"></i> <span>Education Admin</span></a>
					</div>

					<div class="clearfix"></div>

					<!-- menu profile quick info -->
					<?php include_once("../includes/menuprofile.php");  ?>
					<!-- /menu profile quick info -->

					<br />

					<!-- sidebar menu -->
					<?php  include_once("../includes/sidebarmenu.php")     ?>
					<!-- /sidebar menu -->

					<?php  include_once("../includes/footerbuttons.php")     ?>
				</div>
			</div>
<?php  include_once("../includes/topnavigation.php")     ?>

			<!-- page content -->
			<div class="right_col" role="main">
				<div class="">
					<div class="page-title">
						<div class="title_left">
							<h3>Manage Meetings</h3>
						</div>

						<div class="title_right">
							<div class="col-md-5 col-sm-5  form-group pull-right top_search">
								<div class="input-group">
									<input type="text" class="form-control" placeholder="Search for...">
									<span class="input-group-btn">
										<button class="btn btn-default" type="button">Go!</button>
									</span>
								</div>
							</div>
						</div>
					</div>
					<div class="clearfix"></div>
					<div class="row">
						<div class="col-md-12 col-sm-12 ">
							<div class="x_panel">
								<div class="x_title">
									<h2>Edit Meeting</h2>
									<ul class="nav navbar-right panel_toolbox">
										<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
										</li>
										<li class="dropdown">
											<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-wrench"></i></a>
											<ul class="dropdown-menu" role="menu">
												<li><a class="dropdown-item" href="#">Settings 1</a>
												</li>
												<li><a class="dropdown-item" href="#">Settings 2</a>
												</li>
											</ul>
										</li>
										<li><a class="close-link"><i class="fa fa-close"></i></a>
										</li>
									</ul>
									<div class="clearfix"></div>
								</div>
								<div class="x_content">
									<br />
									<form  action=""  method="POST" id="demo-form2"  enctype="multipart/form-data"  data-parsley-validate class="form-horizontal form-label-left">
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="meeting-date">Meeting Date <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="date" name="meetingdate"  value="<?php echo $name?>" id="meeting-date" required="required" class="form-control ">
											</div>
										</div>
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="title">Title <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" name="title"  id="title"   value="<?php echo $title ?>"  required="required" class="form-control ">
											</div>
										</div>
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="content">Content <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<textarea id="content" name="content" required="required" class="form-control"> <?php echo $content ?></textarea>
											</div>
										</div>
										<div class="item form-group">
											<label for="location" class="col-form-label col-md-3 col-sm-3 label-align">Location <span class="required">*</span></label>
											<div class="col-md-6 col-sm-6 ">
												<input id="location" class="form-control" type="text"  name="location"  value="<?php echo $location ?>"  required="required">
											</div>
										</div>
										<div class="item form-group">
											<label for="price" class="col-form-label col-md-3 col-sm-3 label-align">Price <span class="required">*</span></label>
											<div class="col-md-6 col-sm-6 ">
												<input id="price" class="form-control"  type="number"  value="<?php echo $price  ?>"   name="price"  required="required">
											</div>
										</div>
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align">Active</label>
											<div class="checkbox">
												<label>
													<input type="checkbox" name="active" <?php echo $checked ?> class="flat">
												</label>
											</div>
										</div>
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="image">Image <span class="required">*</span>
											</label>
											
											<div class="col-md-6 col-sm-6 ">
												
											<img src="../assets/images/<?php echo $image ?>" style="width:200px;" alt="<?php echo $title ?>">
											<hr class="my-4" />
				<div>
					<label for="image" class="col-md-5 col-form-label">Select Image</label>
					<input type="file" id="image" name="image" accept="image/*">
				</div>
	                                       </div>
										</div>
										<input type="hidden" name="id" value="<?php echo $id?>">
										
										<input type="hidden" name="oldImage" value="<?php echo $image ?>">
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="title">Category <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<select class="form-control" name="category" id="">
													<option >Select Category</option>
													<?php
						                          foreach($stmtcat->fetchAll() as $row){
							                           $cat_idcar= $row["cat_id"];
							                           $category = $row["category"];
													   
													   if($cat_idcar == $cat_id){
														$selected = "selected";
													   }else{
														$selected = "";
													   }
						                                      ?>	
													<option value="<?php echo $cat_idcar?>" <?php echo $selected?> >   <?php echo $category?></option>
													<?php
						                               } 

								                       ?>
												</select>
											</div>
										</div>
										

										
										
										<div class="ln_solid"></div>

										<div class="item form-group">
											<div class="col-md-6 col-sm-6 offset-md-3">
												<button class="btn btn-primary" type="button">Cancel</button>
												<button type="submit" class="btn btn-success">Update</button>
											</div>
										</div>

									</form>
								</div>
							</div>
						</div>
					</div>

				</div>
			</div>
			<!-- /page content -->

			<!-- footer content -->
			<?php  include_once("../includes/footer.php")     ?>
			<!-- /footer content -->
		</div>
	</div>

	<!-- jQuery -->
	<?php  include_once("../includes/jquery.php")     ?>

</body></html>
