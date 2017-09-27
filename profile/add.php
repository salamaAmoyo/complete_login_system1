<?php
	require_once('dbConfig.php');
	
     $upload_dir = '../upload_folder/';


	if(isset($_GET['id'])){
		$propertyId = $_GET['id'];
       $url="pages/user_profile.php?url=".$propertyId; 
	if(isset($_POST['btnSave'])){
		$name = $_POST['name'];

		$imgName = $_FILES['myfile']['name'];
		$imgTmp = $_FILES['myfile']['tmp_name'];
		$imgSize = $_FILES['myfile']['size'];

		if(empty($name)){
			$errorMsg = 'Please input name';
		}elseif(empty($imgName)){
			$errorMsg = 'Please select photo';
		}else{
			//get image extension
			$imgExt = strtolower(pathinfo($imgName, PATHINFO_EXTENSION));
			//allow extenstion
			$allowExt  = array('jpeg', 'jpg', 'png', 'gif');
			//random new name for photo
            //$userPic =basename( $_FILES['myfile']['name']);
			 $userPic = time().'_'.rand(1000,9999).'.'.$imgExt;
		
			//check a valid image
			if(in_array($imgExt, $allowExt)){
				//check image size less than 5MB
				if($imgSize < 5000000){
					move_uploaded_file($imgTmp ,$upload_dir.$userPic);
				}else{
					$errorMsg = 'Image too large';
				}
			}else{
				$errorMsg = 'Please select a valid image';
			}
		}
        
        
        	$sql = "select * from addphoto where id=".$propertyId;
		$result = mysqli_query($conn, $sql);
		if(mysqli_num_rows($result) > 0){
			$row = mysqli_fetch_assoc($result);
            $price=$row['price'];
		}else{
			$errorMsg = 'Could not select a record';
		}

		//check upload file not error than insert data to database
		if(!isset($errorMsg)){
			$sql = "insert into addphoto(propertyId,photo,url,price,name)
					values('".$propertyId."','".$userPic."', '".$url."','".$price."', '".$name."')";
			$result = mysqli_query($conn, $sql);
			if($result){
				$successMsg = 'New record added successfully';
				header('refresh:5;index.profile.php?user='.$propertyId);
			}else{
				$errorMsg = 'Error '.mysqli_error($conn);
			}
		}

	}
        
    }


  /*for properties tables*/
  
 



	if(isset($_GET['id2'])){
		$propertyId = $_GET['id2'];
       $url="pages/user_profile.php?url=".$propertyId; 
	if(isset($_POST['btnSave'])){
		$name = $_POST['name'];

		$imgName = $_FILES['myfile']['name'];
		$imgTmp = $_FILES['myfile']['tmp_name'];
		$imgSize = $_FILES['myfile']['size'];

		if(empty($name)){
			$errorMsg = 'Please input name';
		}elseif(empty($imgName)){
			$errorMsg = 'Please select photo';
		}else{
			//get image extension
			$imgExt = strtolower(pathinfo($imgName, PATHINFO_EXTENSION));
			//allow extenstion
			$allowExt  = array('jpeg', 'jpg', 'png', 'gif');
			//random new name for photo
            //$userPic =basename( $_FILES['myfile']['name']);
			$userPic = time().'_'.rand(1000,9999).'.'.$imgExt;
		
			//check a valid image
			if(in_array($imgExt, $allowExt)){
				//check image size less than 5MB
				if($imgSize < 5000000){
					move_uploaded_file($imgTmp ,$upload_dir.$userPic);
				}else{
					$errorMsg = 'Image too large';
				}
			}else{
				$errorMsg = 'Please select a valid image';
			}
		}
        
        
        	$sql = "select * from properties where id=".$propertyId;
		$result = mysqli_query($conn, $sql);
		if(mysqli_num_rows($result) > 0){
			$row = mysqli_fetch_assoc($result);
            $price=$row['price'];
		}else{
			$errorMsg = 'Could not select a record';
		}
	

		//check upload file not error than insert data to database
		if(!isset($errorMsg)){
			$sql = "insert into addphoto(propertyId,photo,url,price,name)
					values('".$propertyId."','".$userPic."', '".$url."', '".$price."', '".$name."')";
			$result = mysqli_query($conn, $sql);
			if($result){
				$successMsg = 'New record added successfully';
				header('refresh:5;index.profile.php?user='.$propertyId);
			}else{
				$errorMsg = 'Error '.mysqli_error($conn);
			}
		}

	}
        
    }
?>
  

<!DOCTYPE html>
<html>
<head>
	<title>Uploadimage</title>
	<link rel="stylesheet" type="text/css" href="./bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="./bootstrap/css/bootstrap-theme.min.css">
</head>
<body>

<div class="navbar navbar-default">
	<div class="container">
		<div class="navbar-header">
			<h3 class="navbar-brand">PHP upload image</h3>
		</div>
	</div>
</div>
<div class="container">
	<div class="page-header">
		<h3>Add New
			<a class="btn btn-default" href="index.profile.php?user=<?php echo $propertyId; ?>">
				<span class="glyphicon glyphicon-arrow-left"></span> &nbsp;Back
			</a>
		</h3>
	</div>

	<?php
		if(isset($errorMsg)){		
	?>
		<div class="alert alert-danger">
			<span class="glyphicon glyphicon-info">
				<strong><?php echo $errorMsg; ?></strong>
			</span>
		</div>
	<?php
		}
	?>

		<?php
		if(isset($successMsg)){		
	?>
		<div class="alert alert-success">
			<span class="glyphicon glyphicon-info">
				<strong><?php echo $successMsg; ?> - redirecting</strong>
			</span>
		</div>
	<?php
		}
	?>

	<form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
		<div class="form-group">
			<label for="name" class="col-md-2">Name</label>
			<div class="col-md-10">
				<input type="text" name="name" class="form-control">
			</div>
		</div>
		
		<div class="form-group">
			<label for="photo" class="col-md-2">Photo</label>
			<div class="col-md-10">
				<input type="file" name="myfile">
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-2"></label>
			<div class="col-md-10">
				<button type="submit" class="btn btn-success" name="btnSave">
					<span class="glyphicon glyphicon-save"></span>Save
				</button>
			</div>
		</div>
	</form>
</div>

</body>
</html>