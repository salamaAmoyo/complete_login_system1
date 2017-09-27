<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "imguplaod2";

 session_start();

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
	$msg = "";
$sql = "SELECT * FROM profile_pages
  WHERE id = ( SELECT MAX(id) FROM profile_pages )" ;
$result = $conn->query($sql);
    if ($result->num_rows > 0){
           
while($row = $result->fetch_assoc()) {
    $userid=$row['id'];
  $url="../profile/pages/user_profile.php?url=$userid";
    
}
    }
     
 	//$upload_dir ="phpupload/images/";
 	$upload_dir ="../upload_folder/";
    

if(!empty($_POST['propertyname']) and !empty($_POST['propertydisc']) and !empty($_POST['propertyprice']) and !empty($_POST['location']) and    !empty($_POST['latitude']) and !empty($_POST['Longitude'])){
    $propertyname= $_POST['propertyname'];
    $propertydisc= $_POST['propertydisc'];
    $propertyprice=$_POST['propertyprice'];
   $location=mysqli_real_escape_string($conn,$_POST['location']);
    $latitude =$_POST['latitude'];
    $Longitude=$_POST['Longitude'];
    
    /*
    
	if($imgName){
			//get image extension
			$imgExt = strtolower(pathinfo($imgName, PATHINFO_EXTENSION));
			//allow extenstion
			$allowExt  = array('jpeg', 'jpg', 'png', 'gif');
			//random new name for photo
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

*/
    

	if (isset($_POST['Submit'])){
			
      $imgName = $_FILES['image']['name'];
      $imgSize = $_FILES['image']['size'];
      //get image extension
     $imgExt = strtolower(pathinfo($imgName, PATHINFO_EXTENSION));
      //allow extenstion 
        $allowExt  = array('jpeg', 'jpg', 'png', 'gif');
      //random new name for photo
      $userPic = time().'_'.rand(1000,9999).'.'.$imgExt;    

     //check img insertion
    if(in_array($imgExt, $allowExt)){
    //check image size less than 5MB
				if($imgSize < 5000000){    
    if (move_uploaded_file($_FILES['image']['tmp_name'],$upload_dir.$userPic)) {
			$msg = "<span style='color:#189130'>Image uploaded successfully</span>";
		}else{
			$msg = "<span style='color:red'>Failed to upload image</span>";
		}
                }else{
				$msg = "<span style='color:red'>Please select a valid image</span>";
			}                
    }else{
				$msg= "<span style='color:red'>Please select a valid image</span>";
			}
        
        
    



$sql = "INSERT INTO properties (name,image,description,url,price,location,latitude,longitude)
VALUES ('".$propertyname."','".$userPic."','".$propertydisc."','".$url."','".$propertyprice."','".$location."','".$latitude."','".$Longitude."')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
   
     $_SESSION["loggedIn"]="YES";   
     $_SESSION["name"] = "George"; 
    
    $sql = "SELECT * FROM properties
  WHERE id = ( SELECT MAX(id) FROM properties )" ;
$result = $conn->query($sql);
    if ($result->num_rows > 0){
           
while($row = $result->fetch_assoc()) {
    $id=$row['id'];
 
 
}
        
    }
   
   header("Location: ../profile/index.profile.php?user=$id"); 
    
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
        
    }//close second if
        
}//close first if
 
 
$conn->close();
?>