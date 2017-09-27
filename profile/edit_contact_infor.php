<?php
	require_once('dbConfig.php');
	
     $upload_dir = '../upload_folder/';
    
/* Editing properties table*/
if(isset($_GET['id2'])){
		$id = $_GET['id2'];
		$sql = "select * from profile_pages where id=".$id;
		$result = mysqli_query($conn, $sql);
		if(mysqli_num_rows($result) > 0){
			$row = mysqli_fetch_assoc($result);
		}else{
			$errorMsg = 'Could not select a record';
		}
	

	if(isset($_POST['btnUpdate'])){
        
    $email =$_POST['email'];
    $NewPassword=$_POST['NewPassword'];
    $NewPassword2=$_POST['NewPassword2'];
     $Fname= $_POST['firstname'];
    $Lname=$_POST['lastname'];
    /*********telephone **********/
    $PrePhone=$_POST['PrePhone'];
    $phoneSuffix=$_POST['phoneSuffix'];
       /*********telephone **********/
      /************mobile******************/
    $PreMobile=$_POST['PreMobile'];
    $mobileSuffix=$_POST['mobileSuffix'];
    
    /************mobile******************/
    
    $age=$_POST['age'];
    $city=mysqli_real_escape_string($conn,$_POST['city']);
    $neighborhood=mysqli_real_escape_string($conn,$_POST['neighborhood']);
    $street=mysqli_real_escape_string($conn,$_POST['street'] );
    $homeNo=$_POST['homeNo'];
    $mobile=$PreMobile.$mobileSuffix;
		if(empty($email)){
			$errorMsg = 'Please input email';
		}else if(empty($NewPassword)){
			$errorMsg = 'Please input password';
		}else if(empty($NewPassword2)){
			$errorMsg = 'Please confirm password';
		}else if($NewPassword2 !== $NewPassword){
			$errorMsg = ' password do not match';
		}else if(empty($mobileSuffix) || empty($phoneSuffix)){
			$errorMsg = 'Please input telephone';
		}else if(empty($Fname)){
			$errorMsg = 'Please input First name';
		}else if(empty($Lname)){
			$errorMsg = 'Please input Last name';
		}else if(empty( $age)){
			$errorMsg = 'Please input age';
		}else if(empty( $city)){
			$errorMsg = 'Please input city';
		}else if(empty($neighborhood)){
			$errorMsg = 'Please input neighborhood';
		}else if(empty( $street)){
			$errorMsg = 'Please input street';
		}else if(empty( $homeNo)){
			$errorMsg = 'Please input homeNo';
		}
        
		//udate image if user select new image


		//check upload file not error than insert data to database
		if(!isset($errorMsg)){
    
     $sql = "UPDATE profile_pages
       
           SET email ='".$email."', 
            password='".$NewPassword."', 
            Fname='".$Fname."',
            Lname='".$Lname."', 
            telprefix='".$PrePhone."', 
            tel='".$phoneSuffix."', 
            mobileprefix='".$PreMobile."', 
            mobile='".$mobileSuffix."', 
            age='".$age."', 
            city='".$city."', 
            neighborhood='".$neighborhood."', 
            street='".$street."', 
            homeNo='".$homeNo."' 
            WHERE profile_pages.id =".$id; 

            
			$result = mysqli_query($conn, $sql);
			if($result){
				$successMsg = 'New record updated successfully';
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
	<link rel="stylesheet" href="editContact_css/editContact.style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="editContact_js/editContact_validate.js"></script>
</head>
<body>

<div class="navbar navbar-default">
	<div class="container">
		<div class="navbar-header">
			<h3 class="navbar-brand">Update Contact Information</h3>
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

	
    
<div class='wrapper'>
        

 
   <!-- <center  style =''>  /complete_login_system1/login_folder2/  -->
           
      <div  class="backlayer"  id="form3">
      <form   action="" method="post" name="register_form" onsubmit="return validateRegister()" >  

        <table cellpadding="2" cellspacing="1">
            <tr><th colspan="2" align="center" class="headpad"><h2 style="color:white" ><marquee >update your contact information!</marquee></h2></th></tr>  	
        
            <tr><th colspan="2" style="padding-right:40px;"><h4 style="color:saddlebrown; text-align:right">Account Information </h4></th></tr>
    
            <tr><td align="left"><label >Email :</label></td><td> <input type="text" name="email"  placeholder="email address"  onkeyup="removeErrorMsg('email')" value="<?php echo $row['email']; ?>"></td></tr>
            <tr><td colspan="2" align="right"><span id="error_email" style="color:red"></span></td></tr>
             <tr><td align="left"><br><label >  Password:</label></td><td style="width: 120px;  position: relative; color: black;"><div id="NewPassword_input" style="display: inline-block;"><input type="text"   name="NewPassword" value="<?php echo $row['password']; ?>" 
             id="NewPassword" onkeydown="jQuery('#tooltip3').fadeIn(); jQuery('#tooltip4').fadeIn();" onkeyup="checkStrength();removeErrorMsg('pass');clearConfirmPassword() " onblur="varifyPasswords(); jQuery('#tooltip3').fadeOut(); jQuery('#tooltip4').fadeOut();" dir="ltr" size="20"  class="validate[required] input_box"  maxlength="20"></div>
             
<!--             *************************tooltipsmsgdata-name="סיסמא" name="password1" *******************************
-->             
             	
										<div id="tooltip3">
                                             <p id="tooltip4" style="color:white;">
                                                    <span style="font-size: 15px; font-weight: bold; text-decoration: underline; line-height: 150%;"><font><font> password: </font></font></span><br>
                                                <img id="password-img" src="" width="14" height="15"><span style="vertical-align: text-bottom;"><font><font>Minimum of 6 characters </font></font></span><br>
                                                <img id="password-img1" src="" width="14" height="15"><span style="vertical-align: text-bottom;"><font><font>at least one foreign letter and one number</font></font></span><br>
											                                            </p>
											                                            
											                                            
											                                            
                                        </div>
                                    
             
             </td></tr>
             
<!-- ******************************tooltips msg******************-->



            

                         
             <tr><td align="left"><label > Repeat Password:</label></td><td><div><input type="text" name="NewPassword2"  placeholder="Confirm password"  maxlength="20"  onkeyup="removeErrorMsg('pass');confirmPassword()"value="<?php echo $row['password']; ?>"></div></td></tr>
                 
            <!--      PASSWORD NEW VALIDATION-->
                  
                  
                 <tr><td colspan="2" align="right"><span  class="msg" id="error_pass" style="color:red"></span></td></tr>
                 
                  <!--      PASSWORD NEW VALIDATION-->
                 
            <tr><td align="center" style="font-family: Arial; font-size: 18px; color: green; font-weight: bold;" colspan="2"><span id="pass-ok-text"></span><img src="" id="pass-img" /></td>
            </tr>
            
<!--            /****************************passwooord strength********************************/
-->            
            <tr>
								<td style="text-indent: 15px;" align="left">
									<div class="small"><font><font  style="color:saddlebrown;">Password strength</font></font></div>
								</td>
								<td>
									<div id="passStrength">&nbsp;</div>
								</td>
							</tr>
            
            
<!--            /****************************passwooord strength  data-name="סיסמא"********************************/data-name="שם משתמש"
-->     
            
           
            
            <tr><th colspan="2"   style="padding-right:40px;"><h4 style="color:saddlebrown; text-align:right"> Personal Information </h4></th></tr>
             <tr><td align="left"><label>First Name :</label></td><td>  <input type="text" name="firstname"  placeholder="first Name" data-name="שם משתמש" onkeyup="removeErrorMsg('firstname')"value="<?php echo $row['Fname']; ?>"></td></tr>
               <tr><td colspan="2" align="right"><span  class="msg" id="error_firstname" style="color:red"></span></td></tr>
               
            <tr><td align="left"><br><label >Last Name :</label></td><td><input type="text" name="lastname"placeholder="Last Name" onkeyup="removeErrorMsg('lastname')"value="<?php echo $row['Lname']; ?>"></td></tr>
             <tr><td colspan="2" align="right"><span   class="msg" id="error_lastname" style="color:red"></span></td></tr>
           <!--  TELEPHONE-->
       
       
            <tr><td align="left"><label > Phone 1 :</label></td><td><div style="width:201px;"><div  style="float:left; width:65px;"><select align="center" class=" RegistrationFormStyle" name="PrePhone"  style="width:100% !important; margin-right: 3px; vertical-align:middle; " id="preTel" onchange="preTeltextSize()" >
																						<option value="<?php echo $row['telprefix']; ?>"><font><font><?php echo $row['telprefix']; ?></font></font></option><font><font>;
																							</font></font><option value="03"><font><font>03</font></font></option><font><font>;
																							</font></font><option value="04"><font><font>04</font></font></option><font><font>;
																							</font></font><option value="08"><font><font>08</font></font></option><font><font>;
																							</font></font><option value="09"><font><font>09</font></font></option><font><font>;
																							</font></font><option value="050"><font><font>050</font></font></option><font><font>;
																							</font></font><option value="052"><font><font>052</font></font></option><font><font>;
																							</font></font><option value="053"><font><font>053</font></font></option><font><font>;
																							</font></font><option value="054"><font><font>054</font></font></option><font><font>;
																							</font></font><option value="055"><font><font>055</font></font></option><font><font>;
																							</font></font><option value="058"><font><font>058</font></font></option><font><font>;
																							</font></font><option value="072"><font><font>072</font></font></option><font><font>;
																							</font></font><option value="073"><font><font>073</font></font></option><font><font>;
																							</font></font><option value="074"><font><font>074</font></font></option><font><font>;
																							</font></font><option value="076"><font><font>076</font></font></option><font><font>;
																							</font></font><option value="077"><font><font>077</font></font></option><font><font>;
																							</font></font><option value="078"><font><font>078</font></font></option><font><font>;
																							</font></font><option value="1599"><font><font>1599</font></font></option><font><font>;
																							</font></font><option value="1700"><font><font>1700</font></font></option><font><font>;
																							</font></font><option value="1800"><font><font>1800</font></font></option><font><font>;
																							</font></font><option value="1801"><font><font>1801</font></font></option><font><font>;
                </font></font></select></div><div style="float:right;width:136px;"><input   style="width:100%;  padding-left: 2px;"     type="text" name="phoneSuffix"  maxlength="7" id="tel" onkeyup="telTextSize();removeErrorMsg('phone')" value="<?php echo $row['tel']; ?>" ></div></div></td></tr>
            
            
      <!--    select-div-height:30px;  select-height:30px;  TELEPHONE-->
           
              
<!--           TELE-MOBILE  
--> 
                                  
                     <tr><td align="left"><label > Phone 2 :</label></td><td><div style="width:201px;"><div  style="float:left; width:65px;"><select align="center" class=" RegistrationFormStyle" name="PreMobile"  style="width:100% !important; margin-right: 3px; height:30px; vertical-align:middle; " id="premobile" onchange="preTeltextSize()" >
		<option value="050"><font><font>050</font></font></option>
																							<option value="<?php echo $row['mobileprefix']; ?>"><font><font><?php echo $row['mobileprefix']; ?></font></font></option>
																							<option value="053"><font><font>053</font></font></option>
																							<option value="054"><font><font>054</font></font></option>
																							<option value="055"><font><font>055</font></font></option>
																							<option value="058"><font><font>058</font></font></option>																				</select></div><div style="float:right;width:136px;"><input   style="width:100%; padding-left: 2px;"     type="text" name='mobileSuffix' value="<?php echo $row['mobile']; ?>" maxlength="7" id="mobile" onkeyup="telTextSize();removeErrorMsg('phone')" ></div></div></td></tr>
																							
																							           <tr><td colspan="2" align="right"><span  class="msg" id="error_phone" style="color:red" ></span></td></tr>
						                         																           
 																           
            
                    
                                         
                                           
                                         
                 <tr><td align="left"><br><label>Age :</label></td><td><input type="number" name="age" maxlength="3" onkeyup="removeErrorMsg('a')" value="<?php echo $row['age']; ?>"></td></tr>
               <tr><td colspan="2" align="right"><span class="msg" id="error_a" style="color:red"></span></td></tr>
                     
            <tr><td colspan="2" align="right"><span class="msg" id="error_age" style="color:red"></span></td></tr>
                      
            <tr><td align="left"><label  >  City:</label></td><td><div><input type="text" name="city"  placeholder="city of residence" onkeyup="removeErrorMsg('city')" value="<?php echo $row['city']; ?>"></div></td></tr>
                       <tr><td colspan="2" align="right"><span  class="msg"  id="error_city" style="color:red"></span></td></tr>
            <tr><td align="left"><br><label> Neighborhood:</label></td><td><div><input type="text" name="neighborhood"  placeholder="neighborhood" onkeyup="removeErrorMsg('neighborhood')" value="<?php echo $row['neighborhood']; ?>"></div></td></tr>
                       <tr><td colspan="2" align="right"><span   class="msg" id="error_neighborhood" style="color:red"></span></td></tr>
                       
            <tr><td align="left"><label>Street:</label></td><td><div><input type="text" name="street"  value="<?php echo $row['street']; ?>"onkeyup="removeErrorMsg('street')" ></div></td></tr>
             <tr><td colspan="2" align="right"><span   class="msg" id="error_street" style="color:red"></span></td></tr>
             
            <tr><td align="left"><br><label>Home No:</label></td><td><div><input type="number" name="homeNo"  value="<?php echo $row['homeNo']; ?>" onkeyup="removeErrorMsg('homeNo')" ></div></td></tr>
              <tr><td colspan="2" align="right"><span   class="msg"  id="error_homeNo" style="color:red"></span></td></tr>
           
            <tr><td> <span style="font-size:20px; color:saddlebrown">Click >>></span></td> <td align="right" style="text-align:center;padding:2px; ">
            
            <button  type="submit" value="submit" name="btnUpdate" id="ssendMe"  onclick="clearConfirmPassword();setclass_darkBackground()"   >Update</button>
        </td></tr>
            

        </table>
         
      </form> 
    </div>    
         

</div>


</div>
<?php }?>
</body>
</html>