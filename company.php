<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script src="js/jquery-1.11.0.min.js"></script>
<meta name="viewport" content="width = device-width,">
<link href="css/xs.css" rel="stylesheet" type="text/css"/>
<link href="css/sm.css" rel="stylesheet" type="text/css"/>
<link href="css/lg.css" rel="stylesheet" type="text/css" />
<link href="css/md.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">

<title>company info</title>
</head>
<style>
body{
	background:rgb(240 242 246);
	color"#000;
	font-weight:bold;
	font-size:15px;
}


@media only screen and (max-width: 767px)
{
	body {
    height: 300px;
    font-size: 17px;
}

img.loading-logo {
    width: 178px;
    height: 175px;
    margin: 11px 35px;
} 

.logo:after {
    content: 'loading`company';
 
    padding: 27px 79px 43px 76px;
}

}

@media only screen and (min-width: 768px)
 {
	 body{
	font-weight:bold;
	font-size:30px;
}
      
 img.loading-logo {
    width: 240px;
}

.logo:after {
    content: 'loading`company';
 
    padding: 27px 79px 43px 18px;
	
}
   
}



@media only screen and (width:1024px)
 {
	 body{
	font-weight:bold;
	font-size:30px;
}
      
 img.loading-logo {
    width: 240px;
}

.logo:after {
    content: 'loading`company';
 
    padding: 27px 79px 43px 18px;
	
}
   
} 
 
 
 
@media only screen and (min-width: 1200px)
{
	body{	
	font-weight:bold;
	font-size:15px;
}

.logo {
    width: 31px;
    height: 10px;
    margin: 244px 573px;
}

.logo:after {
    content: 'loading`company';
 
    padding: 27px 79px 43px 76px;
}

 }  


	</style>
	
<body>

<div id="loader">
<div class="logo"><img src="img/company.png" class="loading-logo"/></div>
<!--<div id="loading">loading...</div>
<div id="dev1"><span class="enime"></span></div>
<div id="dev2">  </div>
<div id="dev3"> </div> -->
  </div>
<div class="Brand"><img src="img/logo.png" class="logo2"/></div> 
  <div class='bts'>
 <button type="button" onclick="goback()" class="back"> < Back  </button>  
 <button type="button" onclick="gonext()" class="back"> Next > </button> 
 <button onClick="window.location.reload();">↻Refresh Page</button>
 </div>
 
  
<hr />
<script>
    function goback(){
        window.history.go(-1);
    }

        
</script>

<script>
    function gonext(){
        window.history.go(+1);
    }

</script>

<script>
const reloadtButton = document.querySelector("#reload");
// Reload everything:
function reload() {
    reload = location.reload();
}
// Event listeners for reload
reloadButton.addEventListener("click", reload, false);
</script>

<script>
function printcontent(el){
var restorpage=document.body.innerHtml;
var printcontent=document.getElementById(el).innerHTML;
document.body.innerHTML=printcontent;
window.print();

}
</script>

<br />
<br />
<br />
<form action="company.php" method="post" enctype="multipart/form-data">
<table >
<tr>
<td>
company_name:-
<input type="text"  name="comp_Na" placeholder="أسم الشركةاو المؤسسة"/>  <br/>  <br/>
</td>
</tr>
<tr>
<td>
Business Type:-
<input type="text"  name="Business_Type" placeholder="مجال العمل"/>     <br/> <br/>
</td>
</tr>
<tr>
<td>
Tax register:-
<input type="text"  name="Tax_register" placeholder="السجل الضريبي"/>    <br/> <br/>
</td>
</tr>
<tr>
<td>
Tele_Number:-
<input type="text"  name="Tele_Number" placeholder="رقم التليفون"/>     <br/> <br/>
</td>
</tr>
<tr>
<td>
fax:-
<input type="text"  name="fax" placeholder="الفاكس"/>      <br/>  <br/>
</td>
</tr>
<tr>
<td>
country:-
<input type="text"  name="country" placeholder="أسم الدولة"/>   <br/>  <br/>
</td>
</tr>
<tr>
<td>
city:-
<input type="text"  name="city" placeholder="المدينة"/>   <br/>  <br/> 
</td>
</tr>
<tr>
<td>
street:-
<input type="text"  name="street" placeholder="المنطقة/الشارع"/>   <br/>  <br/>
</td>
</tr>
<tr>
<td>
finnicial  a yearالسنة المالية
:-
<input type="date"  name="first" placeholder="بداية السنة المالية"/>   
<input type="date"  name="last" placeholder="نهاية السنة المالية"/>    
</tr>
<tr>
<td>
company logo:-
<input type="file"  name="upload"  placeholder="uploadfile" />  <br/>  <br/>
</td>
</tr>
<tr>
<td>
<input type="submit"      value="حفظ"       name="save" /> <br/>   <br/>
</form>
</tr>
</td>
</table>
<form action="about.php"  method="post">  <br/>
<input type="submit"  name="submit"  value="استعرض بيانات الشركة" /> <br/>
</form>





<?php

include("connect.php");


class company extends  condb{        
  

public function sql(){


@$comp_Na=$_POST['comp_Na'];

@$Business=$_POST['Business_Type'];

@$Tax_reg=$_POST['Tax_register'];

@$Tele_Number=$_POST['Tele_Number'];

@$fax=$_POST['fax'];

@$country=$_POST['country'];

@$City=$_POST['city'];

@$street=$_POST['street'];

@$first=$_POST['first'];

@$last=$_POST['last'];

@$Path_pic=($_FILES['upload']['tmp_name']);

@$dir=dirname(__FILES__)."/img/";

@$profpic=($_FILES['upload']['name']);

@$Path_type=$_FILES['upload']['type'];


$ins="insert into company (comp_Na,Business,Tax_register,Tele_Number,fax,country,City,street,first,last,path_pic) 
Values ('$comp_Na','$Business','$Tax_reg','$Tele_Number','$fax','$country','$City','$street','$first','$last','$profpic')";


if($_POST['save']){

if($Path_type=='image/jpeg' or  $Path_type=='image/png'  or  $Path_type=='image/gif' or $Path_type=='image/jpg' )
{
	
move_uploaded_file ($Path_pic,$dir.$profpic);

$this->connectF()->query($ins);	


echo"<script> alert ('image inserted ok') </script>";
	
echo"Your  info  is  saved  successfully";

}

else{
	
echo"<script> alert ('This not Image') </script>";	
	
}
}
}
}
$use= new company();
$use->connectF();
$use->sql();
?>


</body>
<script>
$(document).ready(function(){
    $("#loader").delay(1200).fadeOut("fast");   
    });
</script>
</html>
