 function telTextSize(){
    var x=document.getElementById("tel");
    var y=document.getElementById("mobile");
    x.style.fontSize ='20px';
    y.style.fontSize ='20px';
    x.style.textAlign = "left"; 
   // x.style.padding='2px';
   // y.style.padding='2px';
    x.style.color='#5494f9';
    y.style.color='#5494f9';
}
    
    
    function preTeltextSize(){
    var x=document.getElementById("preTel");
    var y=document.getElementById("premobile");
    x.style.fontSize ='20px';
    y.style.fontSize ='20px';
    x.style.color='#5494f9';
    y.style.color='#5494f9';
}
/******************************************/


//var clean=true;


         var pass_ok="form-img/ok.png";       
        var pass_notOk="form-img/not_ok.png";
        var not_too_Ok="form-img/not_to_Ok.png";

         function confirmPassword() {
           
         var pass1=document.forms["register_form"]["NewPassword"].value;           
        var pass2=document.forms["register_form"]["NewPassword2"].value;   

        if((pass1 === pass2) && (!pass1 =="" || !pass2=="")){ 
        if(pass1.length<6){ 
            
            document.getElementById("pass-img").setAttribute("src",not_too_Ok); 
           var pass_Ok_text= document.getElementById("pass-ok-text");
           pass_Ok_text.innerHTML='password are the same but must be minimum of 6 characters!'; 
           pass_Ok_text.style.color='#e6e600';
           pass_Ok_text.style.fontSize='15px'; 
        
        }else{ 
               
            document.getElementById("pass-img").setAttribute("src",pass_ok); 
           var pass_Ok_text= document.getElementById("pass-ok-text");
           pass_Ok_text.innerHTML='passwords are OK !'; 
           pass_Ok_text.style.color='#00FF00'}    
        
        }else{
            
            document.getElementById("pass-img").setAttribute("src",pass_notOk);
             var pass_notOk_text=document.getElementById("pass-ok-text");
             pass_notOk_text.innerHTML='password are not the same!';
             pass_notOk_text.style.color='red';
            
             }
             
  
}   
             
        


 function setclass_darkBackground(){
         
    
     document.getElementById("form3").className = "form2";
  
}




function clearConfirmPassword(){

    document.getElementById("pass-img").removeAttribute("src"); 
    document.getElementById("pass-ok-text").innerHTML="";
    
}
                       
    /*************** PRE_SUBMIT CHECKING_PASSWORD MATCH**********************/ 
         
         
         
    /*************** TOOLTIPS FOR valid password condition information **********************/ 
         
         	function checkStrength() {
		var testThis = jQuery.trim(jQuery("#NewPassword").val());
		var onlyLetters = /[a-zA-Z]/;
		var onlyNumbers = /[0-9]/;
		var specialCharacters = /[^\w\s]/;

		var matches = 0;
       

		var checkIcon = "form-img/check_icon.png";
		var crossIcon = "form-img/cross-icon.png";

		if (testThis.length > 5) matches += 1;
        matches += (onlyLetters.test(testThis) && onlyNumbers.test(testThis)) ? 1 : 0;
        matches += specialCharacters.test(testThis) ? 1 : 0;

		if (testThis.length > 5) {
			jQuery("#password-img").attr("src", checkIcon);
		} else {
			jQuery("#password-img").attr("src", crossIcon);
		}

        if (onlyLetters.test(testThis) && onlyNumbers.test(testThis)) {
			jQuery("#password-img1").attr("src", checkIcon);
		} else {
			jQuery("#password-img1").attr("src", crossIcon);
		}
 /***************END OF TOOLTIPS FOR valid password condition information **********************/ 
           
  
 /***************START OF PASSWORD  STRENGTH ANIMATION**********************/
		if (jQuery("#strength").length == 0 ) {
			var strength = jQuery("<div id='strength"+matches+"' style='width: 0px;' data-strength='"+matches+"'></div>");
			jQuery("#passStrength").html(strength);	
		}

		jQuery("#strength"+matches).animate({'width': (matches*33)+'%'}, 1000, function() {jQuery("#strength"+matches).attr('data-strength',matches) });
	}
         
		function isPasswordsMatch() {
		if ( jQuery("#NewPassword").val().length == 0 ||  jQuery("#NewPassword2").length == 0 || jQuery("#NewPassword").val() != jQuery("#NewPassword2").val()) 
		{
			jQuery("#varified").hide();
			jQuery("#notvarified").fadeIn(1000);
			return false;
		} else {
			jQuery("#varified").fadeIn(300);
			jQuery("#notvarified").hide();
			return true;
		}
	}

	function varifyPasswords() {
		if (jQuery("#strength").attr('data-strength') < 3) {
			setTimeout(function() { 
				alert ('password is too week !');
			}, 
			500);
			return false;
		}
		return false;
	}
	
    /***************END OF PASSWORD  STRENGTH ANIMATION**********************/  
         


         
    /**********************************************************************************/   
   function removeErrorMsg(id){
        
     var clearError=document.getElementById('error_'+id).innerHTML="";
    return clearError;    
    }            
         //checkForm
  function validateRegister()             
 {
    
 
        var onlyLetters = /[a-zA-Z]/;
		var onlyNumbers = /[0-9]/;
		var specialCharacters = /[^\w\s]/;

    var str="";
    var nameReg = /^[A-Za-z]+$/;
    var numberReg =  /^[0-9]+$/;
    var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
     
     
     
     /****************************/
     /*    CHECK EMAIL ADDRESS   */
     /****************************/
    var mail=document.forms["register_form"]["email"].value;
      if (mail=="")
      {
     
           str= "<b>Error!:&nbsp;</b>Email address must be filled !";
    
          document.getElementById("error_email").innerHTML=str;
    
    }

    else if (!emailReg.test(mail))
    {
     
        str="<b>Error!:&nbsp;</b>wrong e-mail address!";
      document.getElementById("error_email").innerHTML=str; //"<b>Error!:&nbsp;</b>wrong e-mail address!";
    
    }
    
     
     
       /**********************/
     /*     CHECK PASSWORD     */
     /**********************/
     
        var pass1=document.forms["register_form"]["NewPassword"].value;           
        var pass2=document.forms["register_form"]["NewPassword2"].value; 
     
      if (pass1=="" && pass2=="")
      {
          
           str="<b>Error!:&nbsp;</b>password must be filled !";
          document.getElementById("error_pass").innerHTML=str; //"<b>Error!:&nbsp;</b>password must be filled !";
        
      }
     
      else if ((onlyLetters.test(pass1) || specialCharacters.test(pass1)) && !onlyNumbers.test(pass1))
          
    
      {
         str="<b>Error!:&nbsp;</b>password must include Numbers[0-9]";
          document.getElementById("error_pass").innerHTML=str;  //"<b>Error!:&nbsp;</b>password must include Numbers[0-9]";
        
      }
     
      else if ((!onlyLetters.test(pass1) && !specialCharacters.test(pass1)) && onlyNumbers.test(pass1))
          
    
      {
          str="<b>Error!:&nbsp;</b>password must inlude Letters[a-z]";
          document.getElementById("error_pass").innerHTML=str;  //"<b>Error!:&nbsp;</b>password must inlude Letters[a-z]";
          
      }
     
     
       else if ( pass1 != pass2)
      {
          str="<b>Error!:&nbsp;</b>passwords do not match!";
          document.getElementById("error_pass").innerHTML=str; //"<b>Error!:&nbsp;</b>passwords do not match!";
        
      }
     
        else if (pass1.length<6) 
      {
           str="<b>Error!:&nbsp;</b>password must be minimum of 6 characters!";
          document.getElementById("error_pass").innerHTML=str; //"<b>Error!:&nbsp;</b>password must be minimum of 6 characters!";
         //return(false);  
      }
        

 
     
     /**********************/
     /*     CHECK FIRST NAME     */
     /**********************/

     
     
     
        
     var fname=document.forms["register_form"]["firstname"].value;
     
     if (fname=="")
      {
        str="<b>Error!:&nbsp;</b>First name must be filled !";
         document.getElementById("error_firstname").innerHTML=str;"<b>Error!:&nbsp;</b>First name must be filled !";
         
      }
    
     
       else if (fname.length<2)
      {
          
        str="<b>Error!:&nbsp;</b>First name is to short!";
        document.getElementById("error_firstname").innerHTML=str; //"<b>Error!:&nbsp;</b>First name is to short!";
    
      }
     
     
     
      else if(!nameReg.test(fname))
        {
         str="<b>Error!:&nbsp;</b>First name is wrong!";
         document.getElementById("error_firstname").innerHTML=str; //"<b>Error!:&nbsp;</b>First name is wrong!";
         //return(false);    
        }
     
     
     
        /****************************/
     /*    CHECK LAST NAME    */
     /****************************/

    
    var lname=document.forms["register_form"]["lastname"].value;
     if (lname=="")
      {
        
        str="<b>Error!:&nbsp;</b>Last name is must be filled!"; 
         document.getElementById("error_lastname").innerHTML=str; //"<b>Error!:&nbsp;</b>Last name is must be filled!"; 
           
      }
       
     
     else if (lname.length<2)
      {
       str="<b>Error!:&nbsp;</b>Last name is to short!";    
        document.getElementById("error_lastname").innerHTML=str; //"<b>Error!:&nbsp;</b>Last name is to short!";    
      }
    
     
       else  if(!nameReg.test(lname))
        {
        str="<b>Error!:&nbsp;</b>Last name is wrong!"; 
          document.getElementById("error_lastname").innerHTML=str; //"<b>Error!:&nbsp;</b>Last name is wrong!"; 
           // return(false);   
        }
     
     /****************************/
     /*    CHECK PHONE NUMBER  **/
       
     /****************************/
     
     
     var PrePhone=document.forms["register_form"]["PrePhone"].value;
     var phoneSuffix=document.forms["register_form"]["phoneSuffix"].value;
     var PreMobile=document.forms["register_form"]["PreMobile"].value;
     var mobileSuffix=document.forms["register_form"]["mobileSuffix"].value;
     

    var phone=PrePhone + phoneSuffix;
     var mobile=PreMobile + mobileSuffix; 
    
    
     
     if (phoneSuffix=="" && mobileSuffix=="")
      {
       str="<b>Error!:&nbsp;</b>Enter  one or two Phone number !"; 
        document.getElementById("error_phone").innerHTML=str; //"<b>Error!:&nbsp;</b>Enter  one or two Phone number !"; 
          
      }
    
     else if (!numberReg.test(phoneSuffix) && !numberReg.test(mobileSuffix))
    {
        str="<b>Error!:&nbsp;</b>phone number contain illegal digits !"; 
       document.getElementById("error_phone").innerHTML=str; //"<b>Error!:&nbsp;</b>phone number contain illegal digits !"; 
  
    }
    
     else if ((phone.length<9 || phone.length>11) && (mobile.length<9 || mobile.length>11) )
    {
       str="<b>Error!:&nbsp;</b>phone number those not equal valid digits !";
       document.getElementById("error_phone").innerHTML=str; //"<b>Error!:&nbsp;</b>phone number those not equal valid digits !";
        //return(false);   
    }
     
    
     /****************************/
     /*    CHECK AGE  */
     /****************************/
   
    var age=document.forms["register_form"]["age"].value;
     
     if (age=="")
      {
         str="<b>Error!:&nbsp;</b>Age must be filled !";
         document.getElementById("error_a").innerHTML=str; //"<b>Error!:&nbsp;</b>Age must be filled !";
           
    
      }
    
     else  if (age.length>3)
      {
       str="<b>Error!:&nbsp;</b>invalid Age !";
        document.getElementById("error_a").innerHTML=str; //"<b>Error!:&nbsp;</b>invalid Age !";
         // return(false);   
      }
    
     
     
     /****************************/
     /*    CHECK CITY */
     /****************************/
   
    var city=document.forms["register_form"]["city"].value;
     
     if (city=="")
      {
        str="<b>Error!:&nbsp;</b> City must be filled!";
        document.getElementById("error_city").innerHTML=str; //"<b>Error!:&nbsp;</b> City must be filled!";
            
      }
    
       else if (numberReg.test(city) && !nameReg.test(city))
      {
       str="<b>Error!:&nbsp;</b>street name must contain a letter(A/z)!";
       document.getElementById("error_city").innerHTML=str; //"<b>Error!:&nbsp;</b>street name must contain a letter(A/z)!";
        
      }
       else if (city.length<2)
      {
      str="<b>Error!:&nbsp;</b>city name is to short!"; 
        document.getElementById("error_city").innerHTML=str; //"<b>Error!:&nbsp;</b>city name is to short!"; 
        //return(false);     
      }
    
      
   
     
         /****************************/
     /*    CHECK NEIBORHOOD */
     /****************************/
   
    var Neighborhood=document.forms["register_form"]["neighborhood"].value;
     
     if (Neighborhood=="")
      {
       str="<b>Error!:&nbsp;</b>Neighborhood must be filled!";
        document.getElementById("error_neighborhood").innerHTML=str; //"<b>Error!:&nbsp;</b>Neighborhood must be filled!";
             
      }
     
       else if (numberReg.test(Neighborhood) && !nameReg.test(Neighborhood))
      {
       str="<b>Error!:&nbsp;</b>street name must contain a letter(A/z)!";
       document.getElementById("error_neighborhood").innerHTML=str; //"<b>Error!:&nbsp;</b>street name must contain a letter(A/z)!";
      }
      else if (Neighborhood.length<2)
      {
        str="<b>Error!:&nbsp;</b>Neighborhood name is to short!"; 
        document.getElementById("error_neighborhood").innerHTML=str; //"<b>Error!:&nbsp;</b>Neighborhood name is to short!"; 
        //return(false);     
      }
    
  
            
     
        /****************************/
       /*    CHECK STREET */
       /****************************/
   
     var Street=document.forms["register_form"]["street"].value;
     
     if (Street=="")
      {
       str="<b>Error!:&nbsp;</b>Street must be filled!";
       document.getElementById("error_street").innerHTML=str;
     
      }
     
      else if (numberReg.test(Street) && !nameReg.test(Street))
      {
       str="<b>Error!:&nbsp;</b>street name must contain a letter(A/z)!";
       document.getElementById("error_street").innerHTML=str; //"<b>Error!:&nbsp;</b>street name must contain a letter(A/z)!";

      
      }
     
       else if (Street.length<2)
      {
        str="<b>Error!:&nbsp;</b>Street name is to short!"; 
        document.getElementById("error_street").innerHTML=str; //"<b>Error!:&nbsp;</b>Street name is to short!"; 
        //return(false);     
      }
   
     
              /****************************/
     /*    CHECK HOME NO */
     /****************************/
   
    var homeNo=document.forms["register_form"]["homeNo"].value;
     
     if (homeNo=="")
      {
        str="<b>Error!:&nbsp;</b>Home No must be filled!";
        document.getElementById("error_homeNo").innerHTML=str; //"<b>Error!:&nbsp;</b>Home No must be filled!";
       // return(false);     
      }
   
     
    
    /*********************************/
     /*    CHECK IF ANY WRONG FIELD   */
     /*********************************/
     
      if (str!="")
      {
     
       return false;
      }
 
    //return false;
      
 }
 

 
   function show_send()
 {
     var agree=document.forms["register_form"]["agree"].checked;
     var x=document.getElementById("sendMe");
     if (!agree)
      {
       x.disabled = true;
       x.style.opacity = 0.5;
       x.style.cursor = "default";
      }
     else
      {
       x.disabled = false;
       x.style.opacity = 1;
       x.style.cursor = "pointer";
      }

 }

         