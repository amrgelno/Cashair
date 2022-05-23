
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>USER CONTROL PANEL</title>
<meta name="viewport" content="width = device-width,">
<link href="Admin_css/xs.css" rel="stylesheet" type="text/css"/>
<link href="Admin_css/sm.css" rel="stylesheet" type="text/css"/>
<link href="Admin_css/lg.css" rel="stylesheet" type="text/css" />
<link href="Admin_css/md.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="js/jquery-1.11.0.min.js"></script>
</head>
<style>


body{
	background:rgb(240 242 246);
	color:#000;
	font-weight:bold;
	font-size:18px;
}		
	
tr:nth-child(even){
	background:#09C;
	color:white;
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
    content: 'loading`USERCONTROLPANEL';
 
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
    content: 'loading`USERCONTROLPANEL';
 
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
    content: 'loading`USERCONTROLPANEL';
 
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
    content: '`loading`USERCONTROLPANEL';
 
    padding: 27px 79px 43px 76px;
}

 }  
	
	
	
	

</style>


<body>

 <div class="Brand"><img src="img/SIRCONSULTLOGO.png" class="logo2"/></div> 
  <div class='bts'>
 <button type="button" onclick="goback()" class="back"> < Back  </button>  
 <button type="button" onclick="gonext()" class="back"> Next > </button> 
 <button onClick="window.location.reload();">↻Refresh Page</button>
 <button class="fa fa-print" onclick="printcontent('c1')">Print this page</button> 
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
  </div>  
<h1>     استمارة تسجيل الموظفين   </h1>
<div class="contactform">
<div class="Banner"> contactform      </div>
<form action="post.php"   method="post">
<p>username:</p>
<input type="text"  name="username"  title="insert your first name a-z " pattern="[a-zA-Z]{3,10}"   placeholder="username" class="inputs" autocomplete="off" autofocus  required="required" ><br /><br />
<p>e-mail:</p>
<input type="email"  name="email"  title="insert your E-MAIL ETC name@YAHOO.COM "   placeholder="email" required "required" class="inputs"><br /><br />
<p>Mobile:</p>
<input type="text"  name="Mobile"  title="Mobile:0127498829 "   placeholder="email" required "required" >
<br /><br />
<P>password:</P>
<input type="password"  name="password" placeholder="password" class="inputs"  required="required"><br /><br />
<P>user_type</P>
<select name="user_TYPE">
<option value="Admin">Admin</option>
<option  value="customer_service">customer_service</option>
</select>
<br />
<br />
<br />
<input type="submit"  name="submit"  class="submitbt1">
</form>

<br/>
<br/>
<a href="#delete_reg.php"> <h3>  تعديل دورالموظفين   </h3> </a>


<div  id="edit_reg">

<iframe  src="delete_reg.php" width="750px" height="250px">
</iframe>

</div>

<!--<script>
$(document).ready(function(){
    $("#loader").delay(1200).fadeOut("fast");   
    });
</script>-->
</body>
  


</html>





