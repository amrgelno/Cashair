<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Salary </title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script src="jquery-1.11.0.min.js"></script>
<meta name="viewport" content="width = device-width,">
<link href="css/xs.css" rel="stylesheet" type="text/css"/>
<link href="css/sm.css" rel="stylesheet" type="text/css"/>
<link href="css/lg.css" rel="stylesheet" type="text/css" />
<link href="css/md.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<title>Salary</title>
<script src="jquery-1.11.0.min.js"></script>
</head>

<style>
	
	
	
	body {
	background:rgb(240 242 246);
	
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
    content: 'Expense';
 
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
    content: 'Expense';
 
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
    content: 'Expense';
 
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
    content: 'Expense';
 
    padding: 27px 79px 43px 76px;
}

 }  
 
</style>

<body>
<div id="loader">
<div class="logo"><img src="img/salary.png"  class="loading-logo"/></div>
</div>
<div class="Brand"><img src="img/logo.png" class="logo2"/></div> 
  <div class='bts'>
 <button type="button" onclick="goback()" class="back"> < Back  </button>  
 <button type="button" onclick="gonext()" class="back"> Next > </button> 
 <button onClick="window.location.reload();">↻Refresh Page</button>
 <button class="fa fa-print" onclick="printcontent('c1')">Print this page</button> 
 </div>
<hr />



<div class="all"  style="background:#06F;">   

<input  type='button'   value="تعين موظف"  id="Officerbt"  ? />
<input  type='button'   value="أحتساب مرتبات" id="salariesbt"  ? />


<div class="Officer"  style="display:block;" >

<h1>   فورم  تسجيل  موظف       </h1>

<form action="?page"  method="post">

<input type="text"  name="Name"  placeholder="اسم الموظف" />

<input type="text"  name="Role"  placeholder="دوره الوظيفي" />

<input type="text"  name="Amount"  placeholder="مرتب" />

<input type="submit"  name="Add"  value="أضافه" />

</form>

<table width="500" border="1" style="border:2px solid #000; text-align:center;">
  <tr style="background:#06F; color:white;"> 
<td   width="150">الأسم </td>
<td  width="150">دور مسئول </td>
<td  width="150">مرتب </td>   
    </tr>
    
 <?php

include("connect.php");


class Expense extends  condb{        
  

public function sql(){


?>   
    
    
    
<?php

@$expquery="select *  from   Officer "; 

$expq=$this->connectF()->query($expquery);	

while(@$colu = mysqli_fetch_object($expq)){
?>
<BR />
<tr>
<td>     <?php echo $colu->Name?>                   </td>

<td>     <?php echo $colu->Role?>                   </td>

<td>     <?php echo $colu->Am_salary?>                   </td>

<td>     <?php echo $colu->Time?>                   </td>

</tr>



<?php
}
?>
</table>

<?php
@$Name=$_POST['Name'];  

@$Role=$_POST['Role'];

@$Amount=$_POST['Amount'];   

$inser="insert into Officer (Name,Role,Am_salary,Time) values ('$Name','$Role','$Amount',Now())";

if(@$_POST['Add']){
	
$this->connectF()->query($inser);	

echo"تم الادخال بنجاح";
?>
<meta http-equiv="refresh"  content="3;url=Salary.php"/>';
<?php
}
?>
</div>


<div class="salaries"  style="display:none;" >

<h1>   فورم  تسجيل مرتبات       </h1>

<form action="?page" method="post">


<select name="Name"   id='OfficerNm'  onchange="sel_Officer();" >

<?php
@$expquery="select *  from  Officer "; 


$expq=$this->connectF()->query($expquery);	

while(@$colu = mysqli_fetch_object($expq)){

?>
<option value="select category">select Officer </option>
<option value="<?php echo $colu->Name?>">  <?php echo $colu->Name?>   </option>

<?php
}
?>

</select>
<span id='salaryof'>     </span>

<script>

function sel_Officer(){

var Officer_Name =document.getElementById('OfficerNm').value;

$('#salaryof').load('SalaryAjax.php',{Sel_Nm:Officer_Name}); 

}

</script>


<input type="text"  name="Discount"  placeholder="خصم" />


<input type="text"  name="info"  placeholder="ملاحظات" />


<input type="submit"  name="Ad"  value="أضافه" />

</form>


<?php
@$Name=$_POST['Name'];  

@$Role=$_POST['Role'];

@$Amount=$_POST['Amount'];   

@$Discount=$_POST['Discount'];

@$Net=$Amount-$Discount;

@$info=$_POST['info'];

$salaryName=$Name.'مرتب';

$ins="insert into salary (Name,Role,Am_salary,Discount,Net,info,Time) values ('$Name','$Role','$Amount','$Discount','$Net','$info',Now())";

$ins_cash2="insert into cash (AC,DEBIT,CREDIT,Time) VALUES ('$salaryName',$Net,'0',NOW())";

if(@$_POST['Ad']){
	
$this->connectF()->query($ins_cash2);
$this->connectF()->query($ins);	

echo"تم الادخال بنجاح";
?>
<meta http-equiv="refresh"  content="3;url=Salary.php"/>';
<?php
}
?>


<table width="500" border="1" style="border:2px solid #000; text-align:center;">


  <tr style="background:#06F; color:white;"> 
<td   width="150">الأسم </td>
<td  width="150">دور مسئول </td>
<td  width="150">مرتب </td> 
<td  width="150">خصم </td>
<td  width="150">صافي مبلغ </td>  
<td  width="150">ملاحظات </td>   
<td  width="150">الوقت </td>   
   
    </tr>

<?php
@$expquery="select *  from  salary "; 

$expq=$this->connectF()->query($expquery);	
while(@$colu = mysqli_fetch_object($expq)){
?>
<BR />
<tr>

<td>     <?php echo $colu->Name?>                   </td>


<td>     <?php echo $colu->Role?>                   </td>



<td>     <?php echo $colu->Am_salary?>                   </td>



<td>     <?php echo $colu->Discount?>                   </td>


<td>     <?php echo $colu->Net?>                   </td>



<td>     <?php echo $colu->info?>                   </td>


<td>     <?php echo $colu->Time?>                   </td>


</tr>

<?php
}
?>

</table>

</div>

</div>

<?PHP
}
}
$use= new Expense();
$use->connectF();
$use->sql();
?>


</body>
<script>
$('table tr:odd').css('background-color','#0F9');
</script>

<script>
$(document).ready(function(){
    $("#loader").delay(1200).fadeOut("fast");   
    });
</script>



<script>
$(document).ready(function(){
	$("#Officerbt").click(function(e) {
          
    $(".Officer").fadeIn(); 
	
	$(".salaries").fadeOut();  
    });
	
	
	 });
</script>


<script>
$(document).ready(function(){
	$("#salariesbt").click(function(e) {
		
		
	$(".Officer").fadeOut();	
          
    $(".salaries").fadeIn(); 
	
	   
    });
	
	
	 });
</script>


<script>
function  calert(){

alert('لايسمح بذلك');

}
</script>


</html>
