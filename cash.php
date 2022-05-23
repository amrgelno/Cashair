<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script src="jquery-1.11.0.min.js"></script>
<meta name="viewport" content="width = device-width,">
<link href="css/xs.css" rel="stylesheet" type="text/css"/>
<link href="css/sm.css" rel="stylesheet" type="text/css"/>
<link href="css/lg.css" rel="stylesheet" type="text/css" />
<link href="css/md.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<title>النقدية</title>
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
    content: 'cash';
 
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
    content: 'cash';
 
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
    content: 'cash';
 
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
    content: 'cash';
 
    padding: 27px 79px 43px 76px;
}

 }  
 
</style>

<body>
<div id="loader">
<div class="logo"><img src="img/cash.png" class="loading-logo"/></div>
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

<table width="500" border="1" style="border:2px solid #000; text-align:center; align:center;">


  <tr style="background:#06F; color:white;"> 
<td   width="150"> بيان </td>
<td  width="150">مصروف </td>
<td  width="150">ايراد </td> 
<td  width="150">الوقت </td>   
    </tr>
    
 <?php

include("connect.php");


class cash extends  condb{        
  

public function sql(){


?>   
       
    
    
    
<?php
@$expquery="select *  from  cash "; 

$expq=$this->connectF()->query($expquery);	

while(@$colu = mysqli_fetch_object($expq)){
?>

<tr>

<td>     <?php echo $colu->AC?>                   </td>


<td>     <?php echo $colu->DEBIT?>                   </td>



<td>     <?php echo $colu->CREDIT?>                   </td>




<td>     <?php echo $colu->Time?>                   </td>



</tr>

<?php
}
?>

<td> TOTAL:-  </td>

<td> <?PHP

$sel_count="select SUM(DEBIT) AS DEBIT  FROM  cash    ";

$query_count=$this->connectF()->query($sel_count);	

$col=mysqli_fetch_object($query_count);

$DEBIT=$col->DEBIT;

echo  $DEBIT; 


?>    </td>


<td> 

 <?PHP

$sel_count="select SUM(CREDIT) AS  CREDIT  FROM  cash    ";

$query_count=$this->connectF()->query($sel_count);	

$col=mysqli_fetch_object($query_count);

$CREDIT=$col->CREDIT;

echo  $CREDIT; 

?>             </td>


<td>
<?php

$sub=$CREDIT-$DEBIT;  

echo  $sub;       


?> </td>


</table>
</body>


<?PHP
}
}
$use= new cash();
$use->connectF();
$use->sql();
?>


<script>
$('table tr:odd').css('background-color','#0F9');
</script>

<script>
$(document).ready(function(){
    $("#loader").delay(1200).fadeOut("fast");   
    });
</script>

</html>
