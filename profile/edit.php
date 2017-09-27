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
		$name = $_POST['name'];
        $price = $_POST['price'];
		$imgName = $_FILES['myfile']['name'];
		$imgTmp = $_FILES['myfile']['tmp_name'];
		$imgSize = $_FILES['myfile']['size'];
     	
     

		

		if(empty($name)){
			$errorMsg = 'Please input name';
		}else if(empty($price)){
			$errorMsg = 'Please input price';
		}
		//udate image if user select new image
		if($imgName){
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
					//delete old image
					unlink($upload_dir.$row['image']);
					move_uploaded_file($imgTmp ,$upload_dir.$userPic);
				}else{
					$errorMsg = 'Image too large';
				}
			}else{
				$errorMsg = 'Please select a valid image';
			}
		}else{
			//if not select new image - use old image name
			$userPic = $row['image'];
		}

		//check upload file not error than insert data to database
        
       
        if(!isset($errorMsg)){       
                      
         $sql = "UPDATE properties
       
           SET   properties.name ='".$name."',
            properties.price ='".$price."', 
            properties.image ='".$userPic."'
            WHERE properties.id =$id";
           
         /*  $sql = "UPDATE properties, addphoto    
         SET properties.name= CASE WHEN  properties.name IS NOT NULL THEN '".$name."' ELSE   properties.name END ,
            addphoto.price = CASE WHEN addphoto.price IS NOT NULL THEN '".$price."' ELSE  addphoto.price  END ,
            properties.price = CASE WHEN properties.price  IS NOT NULL THEN '".$price."' ELSE  properties.price END,
             properties.image = CASE WHEN properties.image  IS NOT NULL THEN '".$userPic."' ELSE  properties.image END
            WHERE properties.id =$id
            and properties.id = addphoto.propertyId";*/
            

            
          
			$result = mysqli_query($conn, $sql);
			if($result){
				$successMsg = 'New record updated successfully';
				header('refresh:5;index.profile.php?user='.$id);
			}else{
				$errorMsg = 'Error '.mysqli_error($conn);
			}
		
          #*************
        /*$sql2 = "select * from addphoto where id=".$id;
		//$result2 = mysqli_query($conn, $sql2);
		if( mysqli_query($conn, $sql2)){
			//$row2 = mysqli_fetch_assoc($result2);
           $sql = "UPDATE properties, addphoto
          SET  properties.price ='".$price."', 
            addphoto.photo ='".$userPic."',
            addphoto.price ='".$price."'
           
            WHERE  properties.id = addphoto.propertyId 
       
            AND properties.id =".$id;
            
  
    
			$result = mysqli_query($conn, $sql);
			if($result){
				$successMsg = 'New record updated successfully';
				header('refresh:5;index.profile.php?user='.$id);
			}else{
                
				$errorMsg = 'Error '.mysqli_error($conn);
			}
		
            
		}
            
         else if(! mysqli_query($conn, $sql2)){
			   $sql = "UPDATE properties   
         SET properties.name= '".$name."' ,
            properties.price = '".$price."',
             properties.image = '".$userPic."'
            WHERE properties.id =".$id;
        
            
  
    
			$result = mysqli_query($conn, $sql);
			if($result){
				$successMsg = 'New record updated successfully';
				header('refresh:5;index.profile.php?user='.$id);
			}else{
                
				$errorMsg = 'Error '.mysqli_error($conn);
			}
		}
        */
        #*****************
        
        }    
 
		
      else{
				$errorMsg = 'Error '.mysqli_error($conn);
			}
	
	
      

	}
    //i end first if here below
        }
/* Editing properties table*/


     /*Editing addedphotos table*/

	if(isset($_GET['id'])){
		$id = $_GET['id'];
    
		$sql = "select * from addphoto where propertyId=".$id;
		$result = mysqli_query($conn, $sql);
		if(mysqli_num_rows($result) > 0){
			$row = mysqli_fetch_assoc($result);
		}else{
			$errorMsg = 'Could not select a record';
		}
	

	if(isset($_POST['btnUpdate'])){
		$name = $_POST['name'];
         $price = $_POST['price'];
		$imgName = $_FILES['myfile']['name'];
		$imgTmp = $_FILES['myfile']['tmp_name'];
		$imgSize = $_FILES['myfile']['size'];
     

		if(empty($name)){
            
			$errorMsg = 'Please input name';
		}else if(empty($price)){
			$errorMsg = 'Please input price';
		}
        

		//udate image if user select new image
		if($imgName){
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
					//delete old image
					unlink($upload_dir.$row['photo']);
					move_uploaded_file($imgTmp ,$upload_dir.$userPic);
				}else{
					$errorMsg = 'Image too large';
				}
			}else{
				$errorMsg = 'Please select a valid image';
			}
		}else{
			//if not select new image - use old image name
			$userPic = $row['photo'];
		}

		//check upload file not error than insert data to database
		if(!isset($errorMsg)){
            
                      
     $sql = "UPDATE properties, addphoto
          SET  properties.price ='".$price."', 
            addphoto.photo ='".$userPic."',
            addphoto.price ='".$price."', 
            addphoto.name ='".$name."' 
            
            WHERE  properties.id = addphoto.propertyId 
       
            AND properties.id =".$id;
            
          
			$result = mysqli_query($conn, $sql);
			if($result){
				$successMsg = 'New record updated successfully';
				header('refresh:5;index.profile.php?user='.$id);
			}else{
				$errorMsg = 'Error '.mysqli_error($conn);
			}
            
            
		}

	}
/* i end fist if here below*/
    }
/*for addedphotos*/
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
<!--			<a class="btn btn-default" href="index.php">
-->				<span class="glyphicon glyphicon-arrow-left"></span> &nbsp;Back
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
				<input type="text" name="name" class="form-control" value="<?php echo $row['name']; ?>">
			</div>
		</div>
		
		  <div class="form-group">
			<label for="price" class="col-md-2">Edit Price?</label>
			<div class="col-md-10">
				<input type="text" name="price" class="form-control" value="<?php echo $row['price']; ?>">
			</div>
		</div>
	
		<div class="form-group">
			<label for="photo" class="col-md-2">Photo</label>
			<div class="col-md-10">
				<img src="<?php echo $upload_dir.$row['image'] ?>"  alt="image"  width="200">
				<input type="file" name="myfile">
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
<?php } else{ ?>//this is for added photo?>
<div class="container">
	<div class="page-header">
		<h3>Add New
		<a class="btn btn-default" href="index.profile.php?user=<?php echo $id; ?>">
			<!--<a class="btn btn-default" href="index.php">-->
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
				<input type="text" name="name" class="form-control" value="<?php echo $row['name']; ?>">
			</div>
		</div>
       <div class="form-group">
			<label for="price" class="col-md-2">Edit Price?</label>
			<div class="col-md-10">
				<input type="text" name="price" class="form-control" value="<?php echo $row['price']; ?>">
			</div>
		</div>

		<div class="form-group">
			<label for="photo" class="col-md-2">Photo</label>
			<div class="col-md-10">
				<img src="<?php echo $upload_dir.$row['photo'] ?>"  alt="image"  width="200">
				<input type="file" name="myfile">
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
<?php }?>
</body>
</html>