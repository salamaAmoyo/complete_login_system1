 <div  class="bodiv" >
<?php $name =( !empty($_GET['name'])?$_GET['name']:null);  ?>
   <H1>Hello !
      <?php print($name);?>
         
       
   </H1>
    <div class="aaa">

      <form action="/complete_login_system1/files_upload_form/validateupload.form.php" method="post" name="upload_form"  enctype="multipart/form-data" onsubmit="return  validateUpload()" >
        <table >
   <tr><th colspan="2" align="center" ><h2 style="color:white" >Image Uploads Form</h2></th></tr>        
            <tr><td colspan="2" align="center"><br/><input type="text" name="propertyname"  placeholder="property Name" required class="inputs_text" value=""></td></tr>
            <tr><td colspan="2" align="center"><div class="image" class="div-image">
                <img  src="form-img/icon_uploads.png"  class="image"/><span class="upload" style="color:white">Choose  file</span>               
                <input type="file" name="image"  id="image_src"  required></div> </td></tr>
            <tr><td colspan="2" align="center"><input type="text" name="propertydisc"  placeholder="property discription" required class="inputs_text"></td></tr>
            <tr><td colspan="2" align="center"> <br/><input type="number" name="propertyprice"  placeholder=" Price of property" required class="inputs_number" value=""></td><br/></tr>
            <tr><td colspan="2" align="center" style="position:relative;"><br/><div  style="display: inline-block;"><input id="autocomplete"  type="text"   name="location" placeholder="property location" 
          onkeydown="jQuery('.tooltip3').fadeIn(); jQuery('.tooltip4').fadeIn();" onkeyup="check();confirmLocation();"   onblur=" jQuery('.tooltip3').fadeOut(8000); jQuery('.tooltip4').fadeOut(8000);"   dir="ltr" size="20"   maxlength="20"  class="inputs_text">
        
     
                </div>
                      
                
										<div class="tooltip3">
                                         
                                            <p class="tooltip4" style="color:white;">
                                                
                                                    <span style="font-size: 15px; font-weight: bold; text-decoration: underline; line-height: 150%;"><font><font> Location: </font></font></span><br>
                                                <img id="location-tooltip-img" src="" width="14" height="15"><span style="vertical-align: text-bottom;"><font><font style="color:white;">enter property location</font></font></span><br>
                                                <img id="location-tooltip-img1" src="" width="14" height="15"><span style="vertical-align: text-bottom;"><font><font style="color:white;">Choose a match from the dropdawn list</font></font></span><br>
											                                            </p>
											                                            
											                                            
                                        </div>
                                        
                                        
                                        
                                        
                                        
                                        
                
                </td></tr>
               
            <tr><td colspan="2" align="right"><span id="error_location" style="color:red"></span></td></tr>
           
             <tr><td colspan="2" align="center" style="text-align: center;"><br><input type="submit" value="Submit" name="Submit" id="aaa" ></td><br></tr>
              <tr><td><input type="text"  class="inputs_text" name="latitude" id="latitude"  hidden="hidden"></td></tr>
            <tr> <td><input type="text" name="Longitude" id="Longitude" hidden="hidden"><br>
            </td></tr>
            
            
           
        </table>  
      </form>
       
     </div>
   
    </div>
     