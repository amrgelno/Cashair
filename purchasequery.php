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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<title>purchaseQuery</title>
</head>
<body>

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
	

</style>

</body>
<div id="loader">
<div class="logo"><img src="img/Invoice_report.png" class="loading-logo"/></div>
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
<div id="c1">
 
<table width="900" border="1" >
<tr  colspan="6" >
<td width="1500px" > فواتير المشتريات
</td>
</tr>
  <tr style="background:#FF0; color:#00F;">
    <td >رقم الفاتورة</td>
    <td >  أسم فاتورة</td>
    <td >المندوب</td>
     <td>المورد</td>
    <td>الوقت</td>
    <td>الحالة</td>
    <td>تعديل</td>
    <td>حذف</td>
  </tr>
<?php

include("connect.php");


class purquery  extends  condb{        
  

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



$sel_inv="select  *  from  purchase  limit  $start,$perpage ";


$query=$this->connectF()->query($sel_inv);


$sel_count="select count(ID) AS  Number  FROM  purchase    ";

$query_count=$this->connectF()->query($sel_count);

$col=mysqli_fetch_object($query_count);

$Number=$col->Number;


$Lastpage=ceil($Number/$perpage);




while($col=mysqli_fetch_object($query)){

?>

  <tr>
    <td width="500px" style="text-align:center;"><?php echo $col->ID?></td>
    <td width="500px" style="text-align:center;"><?php echo $col->INVOICE?></td>
    <td width="500px" style="text-align:center;"><?php echo $col->RepName?></td>
    <td width="500px" style="text-align:center;"><?php echo $col->vendors?></td>
    <td width="500px" style="text-align:center;"><?php echo $col->Time?></td>
    <td width="500px" style="text-align:center;"><?php echo $col->paid?></td>

    <td width="500px" style="text-align:center;">
    
   <?php
	
 $INVTYPE=$col->INVOICE;
 
	
if($INVTYPE == " فاتورة مشتريات"){
	?>
     <form  action="Edit_purorder.php"   method="post">
    <?php
	}
elseif($INVTYPE == " فاتورة مردودات مبيعات"){
		?>
	 <form  action="EditSalesreturns.php"   method="post">	
        <?php
	}
    ?>  
    
    <Input  type="hidden"   value="<?php echo $col->ID?>"  name="INVOID" /> 
    
    <Input  type="submit"   value="update"  name="update" /> 
    
    </form>
                             </td>
    <td width="500px">  <form  action="<?php echo $php_self?>"   method="post">
    
    <Input  type="hidden"   value="<?php echo $col->ID?>"  name="ID" /> 
    
    <Input  type="submit"   value="delete"  name="delete" /> 
    
    </form>                          </td>
  </tr>

<?php
}
?>

</table>


<br/>

<br/>

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
<?php	
}
}
$use= new purquery();
$use->connectF();
$use->sql();
?>  
</div>
<script>
$(document).ready(function(){
    $("#loader").delay(1200).fadeOut("fast");   
    });
</script>

</body>
</html>
