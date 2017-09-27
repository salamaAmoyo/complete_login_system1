<?php 
session_start();


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "imguplaod2";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}

$entered_email =(!empty( $_POST['email']) ? $_POST["email"]:"");
$entered_password =(!empty( $_POST['password']) ? $_POST["password"]:"");

$entered_email = $_POST["email"];
$entered_password = $_POST["password"];

//simulated database of 1 person
//$sql = "SELECT id,email,password FROM profile_pages";

  $sql="SELECT id,email,password FROM profile_pages WHERE email = '".$entered_email."' AND password='".$entered_password."'";

//$sql = "SELECT * FROM profile_pages";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
 
    while($row = $result->fetch_assoc()) {
      $registeredId=$row["id"];       
     $databaseEmail=$row["email"];
     $databasepassword=$row["password"];
    
    
}   
 
        
     if($entered_email == $databaseEmail && $databasepassword == $entered_password )
{
if(!empty( $_POST['email']) && !empty( $_POST['password'])){    
 $_SESSION["loggedIn"]="YES";   
 $_SESSION["name"] = "George";   
 $url = "Location: ../profile/index.profile.php?user=".$registeredId;
  
 header($url);
    exit;
    
}
    
    }
} else {
    echo "0 results";
}




$problem="";

if(empty( $_POST['email']))
{
    $problem="emptyEmail";
}
else if(empty( $_POST['password']))
{
    $problem="emptyPassword";
}
 
if($entered_email == $databaseEmail && $databasepassword != $entered_password )
{
    $problem="invalidpassword";
}

else if($entered_email != $databaseEmail)
{
    $problem="invalidUser";
    
}

   $url="Location: /complete_login_system1/frontend/main_home_page.php?url=login&problem=$problem";
   header($url);
  exit;
 

?>
