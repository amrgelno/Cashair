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
<title>فواتير مشتريات اجلة</title>
</head>
<body>

<style>
	
	
	body{
	background:rgb(240 242 246);
	color"#000;
	font-weight:bold;
	font-size:15px;
}
	
	
tr:nth-child(even){
	background:#ccc;
	color:black;
}
	
	
	.odd{
		background-color:#930;
	}

</style>

</body>


<div id="loader">
<div class="logo"><img src="img/Invoice-Icon.png" class="loading-logo"/></div>
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

<?php

include("connect.php");


class purchase  extends  condb{        
  

public function sql(){
	
	?>

<table width="900" border="1">
<tr>
<td>   </td>

<td width="1500px" style="background:#F00;"> فواتير المشتريات
</td>
</tr>
  <tr style="background:#FF0; text-align:center;  color:blue;">
    <td >رقم الفاتورة</td>
    <td >  أسم فاتورة</td>
    <td >المندوب</td>
        <td>المورد</td>
    <td >الوقت</td>
    <td >تعديل</td>
  </tr>
<body>



<?php

$sel_inv="select  *  from  purchase  where paid='Notpaid' ";


$query=$this->connectF()->query($sel_inv);	


while($col=mysqli_fetch_object($query)){

?>

  <tr>
    <td width="500px" style="text-align:center;"><?php echo $col->ID?></td>
    <td width="500px" style="text-align:center;"><?php echo $col->INVOICE?></td>
    <td width="500px" style="text-align:center;"><?php echo $col->RepName?></td>
    <td width="500px" style="text-align:center;"><?php echo $col->vendors?></td>
    <td width="500px" style="text-align:center;"><?php echo $col->Time?></td>
    
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
    
    <td width="500px">
    <Input  type="hidden"   value="<?php echo $col->ID?>"  name="INVOID" /> 
    
    <Input  type="submit"   value="update"  name="update" /> 
    
    </form>   </td>
                             </td>
    <td width="500px">  <form  action="?page"   method="post">
    
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

@$paidQ="Update  purchase   SET  
paid='$paid' ,  TOTAL='$Total',Net='$Net',Discount='$Discount' , Am_paid='$Am_paid'  , surplus='$surplus'    where    ID ='$nvnoID' ";
 
 
 if(@$_POST['cash']){
	 
$this->connectF()->query($paidQ);	
	 
	  
 }
  ?>
  
  <?php
  
  
  @$invotype=$_POST['INVOtype'];
  
  @$invoice=$_POST['INVOID'];
  
  @$Amount=$_POST['Amount'];
  
  @$p_method=$_POST['p_method'];
  
  @$vendor_INV=$_POST['vendor_INV'];
  
  @$Client_INV=$_POST['Client_INV'];
  
  @$RepName=$_POST['RepName']; 
  
  @$LAm_paid=$_POST['LAm_paid'];
  
  @$Net=$_POST['Net'];
  
  @$total=$Net-$LAm_paid;
   
  
  @$surplus=$total-$Amount;    /*  فاتورة  مشتريات*/
  
  @ $surplus2=$Amount-$total;   /*  فاتورة مردودات مبيعات*/
  
  @$invoicetb=$invotype.' '.$invoice;
  
$ins1="insert into vendors_report (invoice,invoice_type,vendors,RepName,total,cash,surplus,Time)
VALUES('$invoice','$invotype','$vendor_INV','$RepName','$total','$Amount','$surplus',Now())";

$ins2="insert into 
client_report(invoice,invoice_type,client,RepName,total,cash,surplus,Time)
VALUES('$invoice','$invotype','$Client_INV','$RepName','$total','$Amount','$surplus2',Now())";

$ins_cash="insert into cash (AC,DEBIT,CREDIT,TIME) VALUES  ('$invoicetb','$Amount',0,NOW())";

if(@$_POST['cash']){
	
if($invotype=="فاتورة مشتريات"){
	 
$this->connectF()->query($ins1);	

$this->connectF()->query($ins_cash);	

 
 
 echo'<meta http-equiv="refresh"  content="3;url=purchase.php"/>';
 
}

elseif($invotype=="مردودات مبيعات"){

$this->connectF()->query($ins2);	

$this->connectF()->query($ins_cash);	

 echo'<meta http-equiv="refresh"  content="3;url=purchase.php"/>';

}

}
   ?>
     
 <?php	
}
}
$use= new purchase();
$use->connectF();
$use->sql();
?>  
   
    
</body>

<script>
$(document).ready(function(){
    $("#loader").delay(1200).fadeOut("fast");   
    });
</script>





</html>
