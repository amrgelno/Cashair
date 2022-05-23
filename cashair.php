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
<title>تقارير الصراف</title>
</head>


<body>
<style>

body{
	background:rgb(240 242 246);
	color"#000;
	font-weight:bold;
	font-size:18px;
}
	
</style>
<div id="loader">

<div class="logo"><img src="img/cashair.png" class="loading-logo"/></div>
<!--<div id="loading">loading...</div>
<div id="dev1"><span class="enime"></span></div>
<div id="dev2">  </div>
<div id="dev3"> </div> -->
  </div>

<form action="cashair.php"  method="post">


<input type="text"   name="cashair" placeholder="ادخل اسم الكاشير "/>



<input type="submit" name="ok"  value="ok"/>


</form>

<br/>
<br/>

<table width="300" border="1">
  <tr style="background:#06F; color:white;">
    <td>    رقم الفاتورة  </td>
    <td>       النقدية </td>
  </tr>
  
  
  
 <?php

include("connect.php");


class cashair extends  condb{        
  

public function sql(){


?>   
        
<?php

@$RepName =$_POST['cashair'];

$sql="select  *  from   client_report  where  RepName = '$RepName'  ";

if(@$_POST['ok']){

$query=$this->connectF()->query($sql);	

while($row=mysqli_fetch_object($query)){
	
?>
 <tr>
    <td><?php echo $row->invoice?></td>
    <td><?php echo $row->cash?></td>
  </tr>

<?php
}
}
?>


<?php

@$RepName =$_POST['cashair'];


$suminv="select SUM(cash) AS SUM from  client_report  where  RepName= '$RepName' " ; 
 
$sumq=$this->connectF()->query($suminv);	


while($sum = @mysqli_fetch_object($sumq)){
	
	?>
<tr>
    <td>total is:_ <?php echo $sum->SUM?></td>
  </tr>
 <?php
}
?>

</table>

<?PHP
}
}
$use= new cashair();
$use->connectF();
$use->sql();
?>

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



















