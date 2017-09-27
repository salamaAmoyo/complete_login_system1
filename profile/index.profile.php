<?php
     session_start();


	require_once('dbConfig.php');
	//$upload_dir = '../images/';
	$upload_dir = '../upload_folder/';
	if(isset($_GET['delete']) and isset($_GET['rowId'])){
		$id = $_GET['delete'];
        $rowId=$_GET['rowId'];

		
		$sql = "select * from addphoto where propertyId ='".$id."' AND id='".$rowId."'";
		$result = mysqli_query($conn, $sql);
		if(mysqli_num_rows($result) > 0){
			$row = mysqli_fetch_assoc($result);
			$photo = $row['photo'];
			unlink($upload_dir.$photo);
			//delete record from database
			
			$sql = "delete from addphoto where propertyId ='".$id."' AND id='".$rowId."'";
			if(mysqli_query($conn, $sql)){
				header('location: index.profile.php?user='.$id);
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
    <!--<link rel="stylesheet" href="pages/css/profile-page.css">-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   
    <script src="pages/nav_responsive.js"></script>
  
	  <?php 
    // session_start();
    //if(!$_SESSION['loggedIn'])
    if(!isset($_SESSION['loggedIn']))
    {
        header("Location: /complete_login_system1/frontend/index.php?url=login&problem=notLoggedIn");
        exit;
    }
    $name = $_SESSION["name"];
    
    ?>
    
<style>
    
    
    
     .responsive-contener-pc{
            display:inline-block;
            width:100%;
            margin-top: 75px;
         
        }
    
    .responsive-contener-mobile{
        display: none;
         width:100%;
        margin-top: 75px;
    }
    
    
      .marquee_text_mobile{
            display:none;
        } 
    
    
/***********************************************************************
*  OPAQUE NAVBAR SECTION
***********************************************************************/
        #nav-bg-ground{
        font-weight: bolder;
         color: white;
         text-shadow: 2px 2px 4px #000000;   
        width: 100%;    
          background-image: url('bg_img/nav-ocean2.jpg');
          background-size: cover;    
              
        }        
        
.opaque-navbar {
    background-color: rgba(0,0,0,0.5);
    height: 60px;
    border-bottom: 0px;
    transition: background-color .5s ease 0s;
}

.opaque-navbar.opaque {
    font-weight: bolder;
    height: 60px;
    transition: background-color .5s ease 0s;
}

ul.dropdown-menu{
    background-color:transparent;
        }
 



@media (max-width: 992px) {

  .opaque-navbar {
    background-color:transparent;
    height: 60px;
    transition: background-color .5s ease 0s;
}
         #nav-bg-ground{
        font-weight: bolder;
         color: white;
         text-shadow:none;   
        width: 100%;    
          background-image: url('bg_img/nav-ocean2.jpg');
          background-size: cover;    
              
        } 
    
       #dropDown-ul{
               background-image: url('bg_img/nav-ocean2.jpg');
       }


}
   



        
        
/* -----------------------  End of responsive manu----------------*/
    
    
    
    
    
    
    
    
    
    .responsive-table{
       border: 1px solid gray;    
      /* background-color:*/
        color:black;
    
    }
    .responsive-table td{
    /* background-color: lightgray;*/
     padding: 10px;    
        
    }
    label{
        color: green;
    }
    
    @media (max-width: 992px) {
        .responsive-contener-mobile{
            display: inline-block;
            width: 100%;
        }
        .responsive-contener-pc{
            display:none;
        }
        
        .marquee_text_pc{
            display: none;
        } 
        .marquee_text_mobile{
            display:inline-block;
        }    


}
    
    
      
  div footer{
	  -webkit- display:flex;
     display:flex;
    justify-content:space-around;
    background-color:#eff5f9;
}
footer ul{
  
  list-style-type:none;
}
footer a{
    color:gray;
   text-decoration:none;
}

.footer-item {
       
        text-transform: uppercase;
      text-align: center;
    border-radius: 100px 15px;
     padding: 15px 10px 15px 10px;
    background-color:#ffffff;
    width:30%;
    
}
       
    
    
@media screen and (max-width:500px){
	div footer{
	  -webkit- display:flex;
     display:flex;
     flex-wrap: wrap;
}
	
.footer-item {
       
    border-radius: 25px;
     padding: 15px 10px 15px 10px;
    width:100%;
    
}
	
}

 
    </style>    
</head>

<body>
    

<!--********************** res ponsive nav start*****************
-->      
    <div class="navbar navbar-inverse navbar-fixed-top opaque-navbar" id='nav-bg-ground'>
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navMain">
  <span class="glyphicon glyphicon-chevron-right" style="color:white;"></span>
    
  </button>
     <!-- <a class="navbar-brand" href="#"><?php echo $firstname." ".$lastname; ?></a>-->
     
    
	
		
			<?php
            	if(isset($_GET['user'])){
		        $id = $_GET['user'];
                $sql = "select * from profile_pages where id = ".$id; 
                $result = mysqli_query($conn, $sql);
				if(mysqli_num_rows($result)){
					while($row = mysqli_fetch_assoc($result)){
                    $firstname=$row["Fname"];    
                    $lastname=$row["Lname"]; 
                    $edit_id=$row["id"];     
         echo"<div class='marquee_text_pc'><marquee behavior=''><h3  style='color:#75f99a;'>Hello  ".$firstname." ! Welcome To Your Profile Page  <img src='bg_img/ok.png'></h3></marquee></div>";  
                        
        echo"<div class='marquee_text_mobile'><h3  style='color:#75f99a;'>Hello ! ".$firstname."<img src='bg_img/ok.png'></h3></div>";       
                            
                    }
                }
                }
                ?> 
       
		
	<!--<form action="logoff.php" id="form1" name="form1" method="post" style="float:right;">

    <button type="submit" class="btn btn-info btn-lg">
          <span class="glyphicon glyphicon-log-out"></span> Log out
        </button>
   
</form> -->

     
    </div>
    <div class="collapse navbar-collapse" id="navMain">
      <ul class="nav navbar-nav pull-right" id='dropDown-ul'>
          <li ><a href="/complete_login_system1/frontend/index.php">Home</a></li>
          <li><a href="edit_contact_infor.php?id2=<?php echo $edit_id; ?>">Update Contact Information</a></li>
  <!--    <li><a href="/complete_login_system1/frontend/main_home_page.php?url=login">Log Out</a></li> -->
     	<li><form action="logoff.php" id="form1" name="form1" method="post" style="float:right;">

    <button type="submit" class="btn btn-info btn-lg" style="background:transparent">
         <!-- <span class="glyphicon glyphicon-log-out"></span> --> Log out
        </button>
   
</form> 
          </li>
        </ul>
    </div>
  </div>
</div>
<!--********************** End start*****************
-->    
     
<!--     **********************START OF PC WRAPPER*************
-->     
<div class="responsive-contener-pc">




<div class="container">
	
	<table class="table table-bordered table-responsive">

			<thead>
				<tr>
				
					<th>Name</th>
					<th>Price</th>
                    <th>Photo</th>
                    <th>Add New Photos</th>
					<th>Action Edit</th>
					<th>Action Delete</th>
				</tr>
			</thead>
			<tbody>
		<?php
            	if(isset($_GET['user'])){
		        $id = $_GET['user'];
                $sql = "select * from properties where id = ".$id; 
                $result = mysqli_query($conn, $sql);
				if(mysqli_num_rows($result)){
					while($row = mysqli_fetch_assoc($result)){
                 
                  ?>
                  
       
                  
                   <tr>
                   
					<td><?php echo $row['name'] ?></td>
					<td ><?php echo "<span style='color:red;'>"." "."$".$row['price']."</span>"; ?></td>
					
					<td style=""><img src="<?php echo $upload_dir.$row['image'] ?>"  width="100%"></td>
                      <td>
		     
			<a class="btn btn-default" href="add.php?id2=<?php echo $row['id'] ?>">
				<span class="glyphicon glyphicon-plus"></span> &nbsp;Add New
			</a>
		</td>
					<td>
						<a class="btn btn-info" href="edit.php?id2=<?php echo $row['id'] ?>">
							<span class="glyphicon glyphicon-edit"></span>Edit
						</a>
				</td>		
				<td>		
						<a class="btn btn-danger " href="index.profile.php?delete2=<?php echo $row['id'] ?>" onclick="return confirm('Are you sure to delete this record?')">
							<span class="glyphicon glyphicon-remove-circle"></span>Delete
						</a>
						
				
		
					</td>
               
                </tr>
                   <?php
                    }
                }
                }
                ?>    
			<?php
            	if(isset($_GET['user'])){
		        $id = $_GET['user'];

		//select old photo name from database
		//$sql = "select * from properties where id = ".$id;
       $sql="SELECT * FROM properties INNER JOIN addphoto ON properties.id=addphoto.propertyId AND properties.id='$id';";            

	   
                
				
				$result = mysqli_query($conn, $sql);
				if(mysqli_num_rows($result)){
					while($row = mysqli_fetch_assoc($result)){
                        
			?>
				<tr>
					
					<td><?php echo $row['name'] ?></td>
               <td ><?php echo"<span style='color:red;'>"." "."$".$row['price']."</span>"; ?></td>
					
					<td><img src="<?php echo $upload_dir.$row['photo'] ?>"  width="100%"></td>
					       <td>
		
			<!--<a class="btn btn-default" href="add.php">-->
			<a class="btn btn-default" href="add.php?id=<?php echo $row['propertyId'] ?>">
				<span class="glyphicon glyphicon-plus"></span> &nbsp;Add New
			</a>
		</td>
					<td>
						<a class="btn btn-info" href="edit.php?id=<?php echo $row['propertyId'] ?>">
							<span class="glyphicon glyphicon-edit"></span>Edit
						</a>
				</td>		
				<td>		
						<a class="btn btn-danger" href="index.profile.php?delete=<?php echo $row['propertyId'] ?>&rowId=<?php echo $row['id'] ?>" onclick="return confirm('Are you sure to delete this record?')">
							<span class="glyphicon glyphicon-remove-circle"></span>Delete
						</a>
						
		
					</td>
				</tr>
		
			<?php
					}
				}   
                    
                    
                    
                }
              
			?>
			
			</tbody>
	</table>
</div>
</div>

<!--*********************END OF PC WRAPPER********************
-->




<!--*********************START OF MOBILE WRAPPER********************
--> 
<div class="responsive-contener-mobile">




<div class="container">

	<table class="table table-bordered table-responsive">
	
			<tbody>
		<?php
            	if(isset($_GET['user'])){
		        $id = $_GET['user'];
                $sql = "select * from properties where id = ".$id; 
                $result = mysqli_query($conn, $sql);
				if(mysqli_num_rows($result)){
					while($row = mysqli_fetch_assoc($result)){
                 
                  ?>
               
           <!-- ******start******* -->
                <tr><td><label>Edit price</label></td><td><?php echo "<span style='color:red;'>"."$".$row['price']."</span>"; ?></td><td><a style=" padding-right:35px; padding-left:35px;" class="btn btn-info" href="editprice.php?id2=<?php echo $row['id'] ?>">
							<span class="glyphicon glyphicon-edit"></span>Edit
						</a></td></tr>
               
               <tr>
                <table width="100%"   class="responsive-table" >
                <tr>	
                
                <td align="center"><label for=""> Name  : </label><?php echo "<span style='color:blue;'>"." ".$row['name']."</span>"; ?></td>
                   
					<td align="center"><label for="">Price  : </label><?php echo "<span style='color:red;'>"." "."$".$row['price']."</span>"; ?></td>
                    </tr>
                </table>
					
					<td><img src="<?php echo $upload_dir.$row['image'] ?>"  width="100%"></td>
                      
		
			
			<table width="100%">
			<tr>
			<td><a class="btn btn-default" href="add.php?id2=<?php echo $row['id'] ?>">
				<span class="glyphicon glyphicon-plus"></span> &nbsp;Add New
			</a>
		  </td>
					<td>
						<a style=" padding-right:35px;
    padding-left:35px;" class="btn btn-info" href="edit.php?id2=<?php echo $row['id'] ?>">
							<span class="glyphicon glyphicon-edit"></span>Edit
						</a>
				</td>		
				<td align="right">		
						<a  style=" padding-right:30px;
    padding-left:30px;" class="btn btn-danger " href="index.profile.php?delete2=<?php echo $row['id'] ?>" onclick="return confirm('Are you sure to delete this record?')">
							<span class="glyphicon glyphicon-remove-circle"></span>Delete
						</a>
						
				
		
					</td>
              </tr>
               </table>
                </tr>  <!-- ****** End here******* -->
                   <?php
                    }
                }
                }
                ?>    
			<?php
            	if(isset($_GET['user'])){
		        $id = $_GET['user'];

		
       $sql="SELECT * FROM properties INNER JOIN addphoto ON properties.id=addphoto.propertyId AND properties.id='$id';";            
       
				$result = mysqli_query($conn, $sql);
				if(mysqli_num_rows($result)){
					while($row = mysqli_fetch_assoc($result)){
                        
			?>
				 <!-- ******start here ******* --><tr>
				
				<table width="100%" class="responsive-table" cellpadding='4'>
                <tr>	
                
                <td align="center"><label for=""> Name: </label><?php echo "<span style='color:blue;'>".$row['name']."</span>"; ?></td>
                   
					<td align="center"><label for="">Price: </label><?php echo "<span style='color:red;'>"."$".$row['price']."</span>"; ?></td>
                    </tr>
                </table>
                
					<td colspan="2"> <img src="<?php echo $upload_dir.$row['photo'] ?>"  width="100%"></td>					      
					 
		       <table width='100%'>
			
			<td><a class="btn btn-default" href="add.php?id=<?php echo $row['propertyId'] ?>">
				<span class="glyphicon glyphicon-plus"></span> &nbsp;Add New
			</a>
		    </td>
					<td>
						<a  style=" padding-right:35px;
    padding-left:35px;" class="btn btn-info" href="edit.php?id=<?php echo $row['propertyId'] ?>">
							<span class="glyphicon glyphicon-edit" ></span>Edit
						</a>
				</td>		
				<td align="right">		
						<a style=" padding-right:30px;
    padding-left:30px;" class="btn btn-danger" href="index.profile.php?delete=<?php echo $row['propertyId'] ?>&rowId=<?php echo $row['id'] ?>" onclick="return confirm('Are you sure to delete this record?')">
							<span class="glyphicon glyphicon-remove-circle"></span>Delete
						</a>
						

		
                </td>
                </table>
				</tr> <!-- ****** End here ******* -->
			
			<?php
					}

                }   
                    
                    
                    
                }
              
			?>
			
			</tbody>
	</table>
</div>
   
    </div>
    <hr>
    <div><footer>
  <div class="footer-item"><ul>
  <li><a href="#">Hospitality</a></li>  
  </ul></div>
  <div class="footer-item"><ul><li><a href="#">site map</a></li></ul></div>
  <div class="footer-item"><ul><li><a href="#">social media</a></li></ul></div>  
		</footer></div>
     
</body>
</html>
