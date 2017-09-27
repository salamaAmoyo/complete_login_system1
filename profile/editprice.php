<?php
	require_once('dbConfig.php');
	
     $upload_dir = '../upload_folder/';
    
/* Editing properties table*/
if(isset($_GET['id2'])){
		$id = $_GET['id2'];
		$sql = "select * from properties where id=".$id;
    

		$result = mysqli_query($conn, $sql);
		if(mysqli_num_rows($result) > 0){
			$row = mysqli_fetch_assoc($result);
		}else{
			$errorMsg = 'Could not select a record';
		}
	

	if(isset($_POST['btnUpdate'])){
		
		$price = $_POST['price'];
     

		if(empty($price)){
			$errorMsg = 'Please input price';
		}
	
		//check if not error then insert data to database
		if(!isset($errorMsg)){
			//$sql = "update properties set price = '".$price."' where id=".$id;
            
            
     $sql = "UPDATE properties, addphoto
       
           SET  properties.price ='".$price."', 
           addphoto.price = CASE WHEN addphoto.price IS NOT NULL THEN '".$price."' ELSE  addphoto.price  END
            WHERE  properties.id = addphoto.propertyId 
       
            AND properties.id =".$id;
            
			$result = mysqli_query($conn, $sql);
			if($result){
				$successMsg = 'New price updated successfully';
				header('refresh:5;index.profile.php?user='.$id);
			}else{
				$errorMsg = 'Error '.mysqli_error($conn);
			}
		}

	}
    //i end first if here below
        }
/* Editing properties table*/


   
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
<?php 
   if(isset($_GET['id2'])){ 
    
    ?>
<div class="container">
	<div class="page-header">
		<h3>Add New
		<a class="btn btn-default" href="index.profile.php?user=<?php echo $id; ?>">
            
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
			<label for="price" class="col-md-2">Price</label>
			<div class="col-md-10">
				<input type="text" name="price" class="form-control" value="<?php echo $row['price'] ?>">
			</div>
		</div>
		
		<div class="form-group">
			<label class="col-md-2"></label>
			<div class="col-md-10">
				<button type="submit" class="btn btn-success" name="btnUpdate">
					<span class="glyphicon glyphicon-save"></span>Update
				</button>
			</div>
		</div>
	</form>
</div>
<?php } ?>
</body>
</html>