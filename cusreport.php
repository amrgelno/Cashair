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
<title> تقارير العملاء</title>

</head>

<style>
		
	.odd{
		background-color:#930;
	}
	body {
	background:rgb(240 242 246);
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
    content: 'Customer`Report';
 
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
    content: 'Customer`Report';
 
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
    content: 'Customer`Report';
 
    padding: 27px 79px 43px 18px;
	
}
   
} 
 
 
 
@media only screen and (min-width: 1200px)
{
	body{	
	font-weight:bold;
	font-size:15px;
}


img.loading-logo {
   width: 240px;
   height: 202px;
}



.logo {
    width: 31px;
    height: 10px;
    margin: 244px 573px;
}

.logo:after {
    content: 'Customer`Report';
 
    padding: 27px 79px 43px 76px;
}

 }  
 
</style>




<body>


<div class="Brand"><img src="img/logo.png" class="logo2"/></div>
<hr />
<div id="loader">
<div class="logo"><img src="img/client_report.png" class="loading-logo"/></div>
<!--<div id="loading">loading...</div>
<div id="dev1"><span class="enime"></span></div>
<div id="dev2">  </div>
<div id="dev3"> </div> -->
  </div>

<form action="cusreport.php"  method="post">


<input type="text"   name="cust" placeholder="ادخل اسم العميل"/>



<input type="submit" name="ok"  value="ok"/>


</form>

<br/>
<br/>

<table width="300" border="1">
<tr style="background:#06F; color:white;" >
<td>    رقم الفاتورة  </td>
<td>    نوع الفاتورة  </td>
<td>    العميل    </td>
<td>    الاجمالي    </td>
<td>       النقدية </td>
<td>       المديونية </td>
</tr>

<?php

include("connect.php");


class cusreport extends  condb{        
  

public function sql(){


@$nme =$_POST['cust'];


$sql="select  *  from   client_report  where  client = '$nme'  ";

if(@$_POST['ok']){

$query=$this->connectF()->query($sql);	

while($row=mysqli_fetch_object($query)){
	
?>
 <tr>
    <td><?php echo $row->invoice ?></td>
    <td><?php echo $row->invoice_type ?></td>
    <td><?php echo $row->client ?></td>
    <td><?php echo $row->total ?></td>
    <td><?php echo $row->cash ?></td>
    <td><?php echo $row->surplus ?></td>
  </tr>

<?PHP
}
}

$suminv="select SUM(surplus) AS  SUM   from  client_report  where  client= '$nme' " ; 
 
 
$sumq=$this->connectF()->query($suminv);	


while($sum = mysqli_fetch_object($sumq)){
	
	?>
<tr>
    <td>total is:_ <?php echo $sum->SUM ?></td>
  </tr>
  
 <?PHP
}
}
}
$use= new cusreport();
$use->connectF();
$use->sql();
?>

</table>

<script>
$('table tr:odd').css('background-color','#ccc');
</script>

<script>
$(document).ready(function(){
    $("#loader").delay(1200).fadeOut("fast");   
    });
</script>

</body>
</html>



















