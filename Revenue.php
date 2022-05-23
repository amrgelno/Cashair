<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>أيرادات </title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script src="jquery-1.11.0.min.js"></script>
<meta name="viewport" content="width = device-width,">
<link href="css/xs.css" rel="stylesheet" type="text/css"/>
<link href="css/sm.css" rel="stylesheet" type="text/css"/>
<link href="css/lg.css" rel="stylesheet" type="text/css" />
<link href="css/md.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<title>Revenue</title>
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
    content: 'Revenue';
 
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
    content: 'Revenue';
 
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
    content: 'Revenue';
 
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
    content: 'Revenue';
 
    padding: 27px 79px 43px 76px;
}

 }  
 
</style>

<body>
<div id="loader">
<div class="logo"><img src="img/Revenue.png" class="loading-logo"/></div>
<!--<div id="loading"> </div>
<div id="dev1"><span class="enime"></span></div>
<div id="dev2"> </div>
<div id="dev3"> </div> -->
</div>
<div class="Brand"><img src="img/logo.png" class="logo2"/></div> 
  <div class='bts'>
 <button type="button" onclick="goback()" class="back"> < Back  </button>  
 <button type="button" onclick="gonext()" class="back"> Next > </button> 
 <button onClick="window.location.reload();">↻Refresh Page</button>
 <button class="fa fa-print" onclick="printcontent('c1')">Print this page</button> 
 </div>
<hr />

<form action="Revenue.php"  method="post">

<input type="text"  name="Title"  placeholder="اسم الايراد" />



<input type="text"  name="Amount"  placeholder="مبلغ" />




<input type="text"  name="Notes"  placeholder="ملاحظات" />



<input type="submit"  name="Add"  value="أضافه" />

</form>


<?php

include("connect.php");


class Revenue extends  condb{        
  

public function sql(){


?>
<?php

@$Title =$_POST['Title'];  

@$Amount =$_POST['Amount'];   

@$Notes =$_POST['Notes'];

$Exspense="insert into revenue  (TITLE,Amount,Time,Notes) values ('$Title','$Amount',NOW(),'$Notes')";

if(@$_POST['Add']){

$query=$this->connectF()->query($Exspense);	

?>
echo'<meta http-equiv="refresh"  content="3;url=Revenue.php"/>';
<?php
}
?>


<?PHP

@$Title =$_POST['Title'];  

@$Amount =$_POST['Amount'];   

$ins_cash2="insert into cash (AC,DEBIT,CREDIT,Time) VALUES  ('$Title','0','$Amount',NOW())";


$exc=$this->connectF()->query($ins_cash2);	



?>

<table width="500" border="1" style="border:2px solid #000; text-align:center;">


  <tr style="background:#06F; color:white;"> 
<td   width="150">أسم أيجار </td>
<td  width="150">مبلغ </td>
<td  width="150">ملاحظات </td> 
<td  width="150">الوقت </td>   
    </tr>



<?php

$expquery="select *  from  revenue "; 

$expq=$this->connectF()->query($expquery);	

while(@$colu = mysqli_fetch_object($expq)){
?>
<BR />
<tr>

<td>     <?php echo $colu->TITLE ?>                   </td>


<td>     <?php echo $colu->Amount ?>                   </td>



<td>     <?php echo $colu->Notes ?>                   </td>




<td>     <?php echo $colu->Time ?>                   </td>



</tr>

<?php
}
?>

</table>
<?PHP
}
}
$use= new Revenue();
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

</html>
