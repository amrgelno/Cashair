<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>فواتير الخاصة بمندوب مبيعات</title>
<script src="js/jquery-1.11.0.min.js"></script>
<meta name="viewport" content="width = device-width,">
<link href="css/xs.css" rel="stylesheet" type="text/css"/>
<link href="css/sm.css" rel="stylesheet" type="text/css"/>
<link href="css/lg.css" rel="stylesheet" type="text/css" />
<link href="css/md.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
</head>
<body>
</body>


<style>

body{
	background:rgb(240 242 246);
	color"#000;
	font-weight:bold;
	font-size:15px;
}
	
	
	
tr:nth-child(even){
	background:#0CC;
	color:black;
}
	

</style>
	
<body>

<div id="loader">
<div class="logo"><img src="img/invoice.png" class="loading-logo"/></div>
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

<table width="900" border="1">
<tr>
<td>   </td>

<td width="1500px" style="background:#F00;"> فواتير الخاصة بمندوب مبيعات
</td>
</tr >
  <tr style="background:#FF0; text-align:center;  color:blue;">
    <td >رقم الفاتورة</td>
    <td >  أسم فاتورة</td>
    <td >المندوب </td>
    <td >العميل</td>
    <td >الوقت</td>
    <td >تعديل</td>
  </tr>

<?php

include("connect.php");


class selinv  extends  condb{        
  

public function sql(){
	
	?>

<?php
include("con_db2.php");

$sel_inv="select  *  from  invno  where   paid='Notpaid'    ";

$query=$this->connectF()->query($sel_inv);	


while($col=mysqli_fetch_object($query)){

 
?>

  <tr>
  
    <td width="500px" style="text-align:center;"><?php echo $col->ID?></td>
    <td width="500px" style="text-align:center;"><?php echo $col->INVOICE?></td>
    <td width="500px" style="text-align:center;"><?php echo $col->RepName?></td>
    <td width="500px" style="text-align:center;"><?php echo $col->client?></td>
    <td width="500px" style="text-align:center;"><?php echo $col->TIME?></td>
    <td width="500px" style="text-align:center;">
   
    <?php
	
 $INVTYPE=$col->INVOICE;
 
	
if($INVTYPE == " فاتورة مبيعات"){
	?>
     <form  action="Edit_seles.php"   method="post">
    <?php
	}
elseif($INVTYPE == " فاتورة مردودات  مشتريات"){
		?>
	 <form  action="Edit_purreturn.php"   method="post">	
        <?php
	}
    ?>  
    
    <Input  type="hidden"   value="<?php echo $col->INVOICE?>"  name="INVTYPE" />
    
    <Input  type="hidden"   value="<?php echo $col->ID?>"  name="INVOID" /> 
    
    <Input  type="submit"   value="update"  name="update" /> 
    
    </form>
    
                             </td>
    <td width="500px">  <form  action="selinv.php"   method="post">
    
    <Input  type="hidden"   value="<?php echo $col->ID?>"  name="ID" /> 
    
    <Input  type="submit"   value="delete"  name="delete" /> 
    
    </form>                          </td>
  </tr>

<?php
}
?>

</table>

<?php
@$nvnoID=$_POST['INVOID']; 

@$paid =$_POST['p_method'];  //   فاتورة مبيعات

@$LAm_paid=$_POST['LAm_paid'];

@$Amount=$_POST['Amount'];

@$Am_paid=$Amount+$LAm_paid;

@$username =$_POST['username'];

@$Total=$_POST['TOTAL'];

@$Net=$_POST['Net'];

@$Discount=$_POST['Discount'];

@$surplus=$Net-$Am_paid;   // باقي الاجل

@$paidQ="Update  invno   SET  paid='$paid' ,  TOTAL='$Total',Net='$Net',Discount='$Discount' , Am_paid='$Am_paid'  , surplus='$surplus'    where    ID ='$nvnoID'  ";   
 
 
 if(@$_POST['cash']){
	 
$this->connectF()->query($paidQ);	
	  
 }
 
  
  
  ?>
  
 
  <?php

  include("con_db2.php");
  
  @$invotype=$_POST['INVOtype'];

  @$invoice=$_POST['INVOID'];
  
  @$Amount=$_POST['Amount'];
  
  @$p_method=$_POST['p_method'];
  
  @$Client_INV=$_POST['Client_INV'];
  
  @$RepName=$_POST['RepName'];
  
  @$vendor_INV=$_POST['vendor_INV'];
  
  @$LAm_paid=$_POST['LAm_paid'];
  
  @$Net=$_POST['Net'];
  
  @$total=$Net-$LAm_paid;
   
  @$invoicetb=$invotype.' '.$invoice;
  
  $surplus=$total-$Amount;  /*  فاتورة مبيعات*/
  
  $surplus2=$Amount-$total;   /*  فاتورة مردودات  مشتريات*/

$ins1="insert into client_report(invoice,invoice_type,client,RepName,total,cash,surplus,Time)VALUES('$invoice','$invotype','$Client_INV','$RepName','$total','$Amount','$surplus',Now())";


$ins2="insert into vendors_report (invoice,invoice_type,vendors,RepName,total,cash,surplus,Time)
VALUES('$invoice','$invotype','$vendor_INV','$RepName','$total','$Amount','$surplus2',Now())";


$ins_cash="insert into cash(AC,DEBIT,CREDIT,TIME) VALUES ('$invoicetb',0,'$Amount',NOW())";


if(@$_POST['cash']){

 if($invotype=='مردودات مشتريات'){
	
$this->connectF()->query($ins2);	
$this->connectF()->query($ins_cash);	
 
 echo'<meta http-equiv="refresh"  content="3;url=selinv.php"/>';
 
}

elseif($invotype=='فاتورة مبيعات'){

$this->connectF()->query($ins1);	
$this->connectF()->query($ins_cash);

 echo'<meta http-equiv="refresh"  content="3;url=selinv.php"/>';

}


}

   ?>
   
   <?php	
}
}
$use= new selinv();
$use->connectF();
$use->sql();
?>  
</body>
<script>
$('table tr:odd').css('background-color','#F60');
</script>

<script>
$(document).ready(function(){
    $("#loader").delay(1200).fadeOut("fast");   
    });
</script>
</html>
