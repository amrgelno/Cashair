<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script src="js/jquery-1.11.2.min.js"></script>
<meta name="viewport" content="width = device-width,">
<link href="Admin_css/xs.css" rel="stylesheet" type="text/css"/>
<link href="Admin_css/sm.css" rel="stylesheet" type="text/css"/>
<link href="Admin_css/lg.css" rel="stylesheet" type="text/css" />
<link href="Admin_css/md.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="js/Validation/valid.js"></script>
<title>عملاء سير كونسلت</title>
</head>

<style>
input {
	float:left;
}

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
	

</style>
<body>
<!--<div class="loadingbg">
<div class="logo"><img src="img/SIRCONSULTLOGO.png" class="loading-logo"/></div>
<!--<div id="loading">loading...</div>
<div id="dev1"><span class="enime"></span></div>
<div id="dev2">  </div>
<div id="dev3"> </div>
 </div>  --> 
 <div class="Brand"><img src="img/SIRCONSULTLOGO.png" class="logo2"/></div> 
  <div class='bts'>
 <button type="button" onclick="goback()" > < Back  </button>  
 <button type="button" onclick="gonext()" > Next > </button> 
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
  
  <div style="border:2px solid #09C; padding:50px;">
  <h1>    لوحة أدخال بيانات العملاء </h1>
  <br />  <br />
  <form    method="post" id="formy" >


<input type="email" placeholder="الايميل" title="insert your E-MAIL ETC name@YAHOO.COM  or  name@gmail.COM "  
  width="500"  id='input'  class='email '    name="Email"    required />
&nbsp;

<input type="PASSWORD" placeholder="كلمة السر"   title="insert your password from 0-9"  pattern="[a-zA-Z-0-9]{5,10}"  
width="200" id='input' class='password'  name="password" required  />
&nbsp;



<input type="text" placeholder="أسم العميل أو الشركة " title="insert your Company or Yourname" pattern="[a-zA-Z]{7,20}"  id='input'  width="500"   class='company'   name="company" required  />
&nbsp;



<input type="text"   placeholder="موبيل"  width="500"    pattern="[0-9]{10,11}"  id='input'  class='mobile '   name="Mobile" required  />
&nbsp;


<input type="submit" name="submit"  class='login'  id="submitval"   onclick="valid();"   /> 

</form>

</div>

<div id="c1"> 
<table width="900" border="1">
<tr>
<td> 


  </td>

<td width="1500px" style="background:#F00;"> سجلات العملاء 
</td>
</tr>
  <tr style="background:#FF0; text-align:center;">
    <td >رقم العضوية</td>
    <td> اسم العميل/الشركة</td>
    <td >موبيل</td>
    <td >الايميل</td>
     <td >الباسورد</td>
     <td >حذف</td>     
     <td>
   </td>
  </tr>

<?php

include("connect.php");


class customer  extends  condb{        
  

public function sql(){
	
	?>

<?php

if(@$_GET['page'] ){

$current_page=$_GET['page'];   /* get page value from next prev  Link */

}else{
	
$current_page=1;	/* dafault value */

}


@$nextpage=$current_page+1;
@$prevpage=$current_page-1;

$perpage=40;

@$start=($current_page-1)*$perpage;

$sel_inv="SELECT * FROM  member  limit $start,$perpage ";

$sel_count="select count(ID) AS  Number  FROM  member    ";

$query_count=$this->connectF()->query($sel_count);	

$col=mysqli_fetch_object($query_count);

$Number=$col->Number;


$Lastpage=ceil($Number/$perpage);



$query=$this->connectF()->query($sel_inv);


while($col=mysqli_fetch_object($query)){

?>

  <tr>
    <td width="500px" style="text-align:center;"><?php echo $col->ID?></td>
    <td width="500px" style="text-align:center;"><?php echo $col->Company?></td>
    <td width="500px" style="text-align:center;"><?php echo $col->Mobile?></td> 
    <td width="500px" style="text-align:center;"><?php echo $col->Email?></td>
    <td width="500px" style="text-align:center;"><?php echo $col->password?></td>

  </tr>

<?php
}
?>

</table>

<form  action="?page"  method="get">
<?php

if($current_page==1){
?>
 prevpage
 
<?php
}

else{
?>	
<a href="?page=<?php echo $prevpage ; ?>"><Input type="button"  value="< Last"   />   </a>
	
<?php	
}
?>
<!--
<input type="text"  value="   "  name="page"  style="width:20px;" /> 

:

<input type="button"  value="<?php echo $Lastpage ?>"   /> 

<input type="submit"   value="submit"   hidden  /> 
-->

<?php
for($i=1;$i<=$Lastpage;$i++){
?>

<a href="?page=<?php  echo  $i; ?>"> <?php  echo  $i; ?> </a>

<?php
}
?>
<?php

if($nextpage==$Lastpage+1){

?>

nextpage

<?php

}

else{
	
?>
	
<a href="?page=<?php echo $nextpage ; ?>"><Input type="button"  value="Next >"   /> </a>
	
<?php	
}
?>
</form>



<br/>
<br/>


<?PHP

 @$company=$_POST['company'];
 @$filter_Mobile=$_POST['Mobile'];
 @$Mobile=filter_var($filter_Mobile,FILTER_SANITIZE_NUMBER_INT);
 @$filter_Email=$_POST['Email']; 
 @$Email=filter_var($filter_Email,FILTER_SANITIZE_EMAIL);
 @$password=$_POST['password'];
 
 $ins_query="insert into member (Mobile,Company,Email,password,chat)value
 ('$Mobile','$company','$Email','$password','NULL')";  #subscribe -> insert data
$select_member="select *  from   member  where  Email='$Email' and  password='$password' ";  #login -> select data  / subscribe 	

$query_member=$this->connectF()->query($select_member );   #subscribe

		 if(@$_POST['submit']){
		     
if($row=mysqli_fetch_object($query_member)){
	
?>
<script> alert('تم تسجيل بيانات من قبل');</script>  <!-- subscribe fault dashboard -->
<script> alert('العميل مسجل من قبل ورقم العضوية الخاص به<?php echo $row->ID; ?>');</script>
<?php	
}else{
	
	if(!empty($company) or !empty($Mobile)or !empty($Email) or !empty($password)){
		
		
		 $this->connectF()->query($ins_query);    # subscribe success dashboard 
 ?>  
<script> alert('تم تسجيل بيانات ');</script> 

<meta http-equiv="refresh"  content="2;url=?page"/>
<?php
}else{

 !$this->connectF()->query($ins_query);

}
}
		 }
	
}
}
$use= new customer();
$use->connectF();
$use->sql();
?>  
  <script>
$(document).ready(function(){
    $("#loader").delay(1200).fadeOut("fast");   
    });
</script>

</div>
</body>
<script src="js/function.js"></script>
</html>



