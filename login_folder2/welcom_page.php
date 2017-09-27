<!DOCTYPE html>
<html lang="">
<head>
    
    <title>welcom page</title>
    <?php 
     session_start();
    if(!$_SESSION['loggedIn'])
    {
        header("Location:index.php?problem=notLoggedIn");
        exit;
    }
    $name = $_SESSION["name"];
    
    ?>
    
</head>

<body bgcolor="white">
   <H1>Welcom !
      <?php print($name);?>
       
       
   </H1>
   
<form action="logoff.php" id="form1" name="form1" method="post">
<p>
    <input type="submit" name="loginButton" id="loginButton" value="Logoff">
</p>    
</form>   
   
</body>
</html> 
    

