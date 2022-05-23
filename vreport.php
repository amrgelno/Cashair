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
<title>تقارير الموردين</title>
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
    content: 'Vendors`Report';
 
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
    content: 'Vendors`Report';
 
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
    content: 'Vendors`Report';
 
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
    content: 'Vendors`Report';
 
    padding: 27px 79px 43px 76px;
}

 }  
 
</style>
	


<body>

<div id="loader">

<div class="logo"><img src="img/vendors_Report3.png" class="loading-logo"/></div>
<!--<div id="loading">loading...</div>
<div id="dev1"><span class="enime"></span></div>
<div id="dev2">  </div>
<div id="dev3"> </div> -->
  </div>


<form action="vreport.php"  method="post">


<input type="text"   name="cust" placeholder="ادخل اسم المورد"/>



<input type="submit" name="ok"  value="ok"/>


</form>

<br/>

<table width="300" border="1">
<tr style="background:#06F; color:white; font-size:36px;" >
  <tr>
    <td>    رقم الفاتورة  </td>
    <td>     نوع الفاتورة  </td>
    <td>    المورد    </td>
    <td>    اجمالي الفاتورة    </td>
    <td>       المدفوع </td>
    <td>       الباقي غير مسدده </td>
  </tr>
 
<?php

include("connect.php");


class vreport extends  condb{        
  

public function sql(){


@$vendors =$_POST['cust'];



$swl="select  *  from  vendors_report  where  vendors = '$vendors'  ";



if(@$_POST['ok']){

#$query=mysqli_query($connect,$sql);	

$queri=$this->connectF()->query($swl);	


while($row=mysqli_fetch_object($queri)){
	
?>
 <tr>
    <td><?php echo $row->invoice ?></td>
    <td><?php echo $row->invoice_type ?></td>
    <td><?php echo $row->vendors ?></td>
    <td><?php echo $row->total ?></td>
    <td><?php echo $row->cash ?></td>
    <td><?php echo $row->surplus ?></td>
  </tr>

<?php
}
}
?>

<?php

$suminv="select SUM(surplus) AS Total   from  vendors_report  where  vendors= '$vendors' " ; 
 

$sumq=$this->connectF()->query($suminv);	


while($sum = mysqli_fetch_object($sumq)){
	
	?>
<tr  >
    <td style="background-color:#03F; width:100px; font-style:italic; color:#9daade;"  >total is:_ </td>
    <td style="background-color:#0F3;"  ><?php echo $sum->Total  ?></td>     
  </tr>
 <?php
}
?>
<?php
}
}
$use= new vreport();
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



















