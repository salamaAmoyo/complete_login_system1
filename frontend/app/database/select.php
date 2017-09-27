 <?php  
 //select.php  
 $connect = mysqli_connect("localhost", "root", "", "imguplaod2");  
 $output = array();  
 /*$query = "SELECT * FROM properties"; */
  $query="SELECT * FROM properties INNER JOIN addphoto ON properties.id=addphoto.propertyId";
  //AND properties.id='$id';";  
 $result = mysqli_query($connect, $query);  
 if(mysqli_num_rows($result) > 0)  
 {  
      while($row = mysqli_fetch_array($result))  
      {  
           $output[] = $row;  
      }  
      echo json_encode($output);  
 }  
 ?>  
 
