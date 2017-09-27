
<div class="wrp_div">

     
      <div class="header">
      <h2>Login</h2>
  </div> 
  
    <form id="form1" name="form1" method="post" action="/complete_login_system1/login_folder2/checklogin.php" class="aaa" >
      <!--      DISPLAY VALIDATION ERRORS HERE
-->
    <?php 
    
      $problem =(isset($_GET['problem']) ? $_GET["problem"]:null);            
        
    $errormsg="<font color='red'> ERROR:";
    if($problem=="invalidUser"){$errormsg=$errormsg ."invalid email or password!!";}
    if($problem=="invalidpassword"){$errormsg=$errormsg ."invalid password or email!!";}
    if($problem=="notLoggedIn"){$errormsg=$errormsg ."you are not logged in yed!!";}
    if($problem=="emptyEmail"){$errormsg=$errormsg ." email or password is empty!!";}
    if($problem=="emptyPassword"){$errormsg=$errormsg ."password or email is empty!!";}    
    $errormsg = $errormsg . "</font>";
        
    if($problem != "") {print($errormsg);}
    
    ?>
       <div class="input-group">
           <label for="">Username</label>
           <input type="text" name="email" placeholder="Email" value="">
       </div>
       
       <div class="input-group">
       <label for="">password</label>
       <input type="password" name="password" placeholder="password" value="">
       </div> 
       
        <div class="input-group">
       
        <button type="submit" name="loginButton" id="aaaa" class="btn">Login</button>
       </div>
        <p style="color:white">Not yet a member ? <a href="/complete_login_system1/frontend/index.php" ><span style="font-size:20px;">Sign Up!</span></a></p>
        
       </form> 
    </div>

