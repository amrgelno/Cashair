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
<title>purchase invoice</title>
</head>
<style>
	
	
	.odd{
		background-color:#930;
	}
	body {
	background:rgb(240 242 246);
	}
	
	label {
    display: inline-block;
    margin-bottom: 5px;
    font-weight: bold;
    margin-top: 31px;
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
    content: 'loading`Invoice';
 
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
    content: 'loading`Invoice';
 
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
    content: 'loading`Invoice';
 
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
    content: 'loading`Invoice';
 
    padding: 27px 79px 43px 76px;
}

 }  
 
</style>
	


<body>

<div id="loader">
<div class="logo"><img src="img/create_invoice.png" class="loading-logo"/></div>
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
<?php

include("connect.php");


class purorder  extends  condb{        
  

public function sql(){
	
	?>
<?php
@$INVOICE =$_POST['INV_ID'];  #   رقم فاتورة:فاتورة مشتريات

@$username =$_POST['REP_INV'];   #   أسم كاشير

$INVQ="insert into purchase (INVOICE,RepName,paid,TIME) values ('$INVOICE','$username','Notpaid',NOW())";

if(@$_POST['pur']){
$this->connectF()->query($INVQ);
?>
<span style='font-weight:bold; background:#06C; color:white; ' > Creat purchase  Invoice  أنشاء فاتوره مشتريات</span> <br />
<?php
}
?>

<?php
$invs="select *  from  purchase where TIME=NOW()"; 
$invq= $this->connectF()->query($invs);
while($colu = mysqli_fetch_object($invq)){
?>
<BR />

<td><label>INVOICE NO:-</label> <input  type="text" name="INVOID" value="<?php echo $colu->ID?>"   disabled="disabled" /></td>

<?php
}
?>


<form action="purorder.php" method="post">

<?php
$select="select DISTINCT Item_dep from stock "; 
$sqlq= $this->connectF()->query($select);
?>
<label>ITEM_CATE:-</label>

<select name="item_dep"  id='cat_type' onchange="sel_product();">
 <option value="select category">select category </option>
<?php
while($column = mysqli_fetch_object($sqlq)){
?>   

  <option value="<?php  echo $column->Item_dep?>"  ><?php  echo $column->Item_dep?></option> 
<?php
}
?>
 </select>
 
 <script>

function sel_product(){

var cat_type=document.getElementById('cat_type').value;

$('#PRODUCT_SEC').load('product.php',{ITEM_DEP:cat_type}); 

}

</script>
  
 <label>SELECT_ITEM:-</label> 
 
 <select name="item"   id='PRODUCT_SEC' onchange="PRODUCT_SEL();" required>  <!--select_item-->


 
 </select>
 

 <input  type="submit"  name="ok"  value="تاكيد"  id="bts" style="background:#999;"/>
<?php
@$username =$_POST['REP_INV'];
@$vendor_INV = $_POST['vendor_INV'];

$invs="select *  from  purchase where ID=(SELECT MAX(id) FROM `purchase` where RepName='$username')";

$invq= $this->connectF()->query($invs);
while($colu = mysqli_fetch_object($invq)){
?>
<BR />
<input  type="hidden" name="INVOID"   value="<?php echo $colu->ID?>" />
<label>REP_Name:</label><input  type="text" name="REP_INV"  value="<?php echo $colu->RepName?>"      placeholder="Rep_Name" style="background-color:#FFF;
width:100px;  border:none;"   onmouseover='calert();' />
<?php
$select="select * from  vendor_record ";
 
$sqlq= $this->connectF()->query($select);
?>

<label>vendors_Name:</label>

  <select  name="vendor_INV"  required >
  
  <option value="<?php echo $vendor_INV ; ?>">
  
  <?php   
  if($vendor_INV == false ){       #$Client_INV ==''
	?>  
  Select vendor
   <?php
  
  }
  else{
  
  echo $vendor_INV;
 
  }
  ?>
  
  </option>
<?php
while($column = mysqli_fetch_object($sqlq)){
?>   

  <option value="<?php  echo $column->Name?>"  ><?php  echo $column->Name?></option> 
  
<?php
}
?>

 </select>
<?php
}
?>
</form>
<?PHP
if(@$_POST['ok']) {
	@$nvnoID=$_POST['INVOID'];  //  INPUT INVOICE  NAME =  INVOID  ---- form    to  insert  in order  table (invoices)
	@$item = $_POST['item'];    //  Select item  NAME =  item   -----  form  to  insert  in order  table (invoices)
	@$vendors_INV = $_POST['vendor_INV'];   //  INPUT Client  NAME =  Client_INV  ---- form  to  insert  in order  table (invoices) and   update  client  in   invoice  table  (invno)
	@$REP_Name = $_POST['REP_INV'];
	
$sel="select *  from stock where ID ='$item' ";  


$sql= $this->connectF()->query($sel);


$sqq="update  purchase  SET   vendors='$vendors_INV'  WHERE  ID ='$nvnoID'  ";

$this->connectF()->query($sqq);


?>

<?php
while(@$row = mysqli_fetch_object($sql)){
	
?> 
<br/> 
<form action="purorder.php"  method="post"> 
<td><label>INVOICE NO:</label><input type="TEXT" value="<?php echo $nvnoID ?>"  name="INVOID" style="background-color:#FFF;  width:100px;  border:none;" 
onmouseover='calert();' >
<td><label>Item_ID:</label><input type="input" value="<?php echo $row ->ID?>"  name="Item_ID" style="background-color:#FFF;
width:100px;  border:none;" onmouseover='calert();' /></td>
<td><label>Item:</label><input type="input" value="<?php echo $row ->Item?>"  name="Item" style="background-color:#FFF;
width:100px;  border:none;" onmouseover='calert();' /></td>
<td><label>cost:</label><input type="input"  value="<?php echo $row ->cost?>"  name="cost"  style="background-color:#FFF;
width:100px;  border:none;" onmouseover='calert();' /> </td>
<td><label>Qsupply:</label><input value="<?php echo $row ->Qsupply?>"  name ="Qsupply"  type="input"  style="background-color:#FFF;width:100px; border:none;" onmouseover='calert();'/></td>
<td><label>Qpurchase:</label><input  type="input" name="Qpurchase"  placeholder="الكمية المطلوبة" /></td>
<input type="hidden" name="REP_INV"  value="<?php echo $REP_Name ?>" /></td>
<input  type="hidden" name="vendor_INV"  value="<?php echo $vendors_INV ?>"  /></td>
 
<td><input type="submit" value="Add"  name="Add" /></td>
    </form>    
<?php
}
}
?>    

<script>
function  calert(){

alert('لايسمح بذلك');

}
</script>
    
<?php
@$ItemID=$_POST['Item_ID'];
@$inv=$_POST['INVOID'];
@$Item =$_POST['Item'];
@$cost = $_POST['cost'];
@$Qsupply=$_POST['Qsupply'];
@$Qpurchase=$_POST['Qpurchase'];
@$surplus=$Qsupply+$Qpurchase;
@$RepName=$_POST['REP_INV'];
@$vendors_INV = $_POST['vendor_INV']; 
@$total=$Qpurchase*$cost;

if(@$_POST['Add']){
	if($surplus<0){

$surplus2=0;

$sur="update  stock  SET   Qsupply='$surplus2'  WHERE  ID ='$ItemID'  ";

}

elseif($surplus>0){

$sux="update  stock  SET   Qsupply='$surplus'  WHERE  ID ='$ItemID'  ";

}

if($Qpurchase<=0){
	
	echo"invaild format";
                  }
				  
	else      {

$sqli="insert into  pur_order (Item,Item_ID,invoice_type,vendors,RepName,cost,Qsupply,Qpurchase,total,InvoiceNo,Time) 
values ('$Item','$ItemID','فاتورة مشتريات' ,'$vendors_INV','$RepName','$cost','$Qsupply','$Qpurchase','$total','$inv',NOW())";
@$this->connectF()->query($sqli);
@$this->connectF()->query($sur);
@$this->connectF()->query($sux);
	}
#echo"request sent";
#echo'<meta http-equiv="refresh"  content="3;url=index.php"/>';
}
?>

 <br/>
 <br/>
 
 <table width="300" border="1" style="border:2px solid #000;">
  <tr style="background:#06F; color:white;"> 
<td >الصنف </td>
<td  width="45">السعر </td>
<td  width="57">كمية </td> 
<td  width="57">العميل </td>   
<td  width="78">الاجمالي </td> 
<td  width="78"> حذف </td> 
    </tr>
    
 <?PHP
@$nvnoID=$_POST['INVOID'];

$sele="select *  from  pur_order where InvoiceNo=$nvnoID  And   invoice_type= 'فاتورة مشتريات' ";

$sqlw= $this->connectF()->query($sele);

while($column = @mysqli_fetch_object($sqlw)){
?>
  <form action="purorder.php"  method="post">  
  <tr> 
<td><?php  echo $column->Item?>       </td>
<td><?php  echo $column->cost?>       </td>
<td> <Input type="text"  value="<?php  echo $column->Qpurchase?>"  name="REQRDER"  style="background-color:#FFF;
 width:100px;  border:none;"  />      </td>
     <input  type="hidden" name="REP_INV"  value="<?php echo $column->RepName?>"   />
<td><input  type="text" name="vendor_INV" value="<?php echo $column->vendors?>"   /></td>
<td> <?php  echo $column->total?>      </td>
<td>
<input type="hidden"  value="<?php  echo $nvnoID ?>"  name="INVOID" />
<input type="hidden"  value="<?php  echo $column->ID?>"  name="Itemp_NO" />
<input type="hidden"  value="<?php  echo $column->Item_ID?>"  name="Itemp_ID" />     
<input type="submit"  value="حذف"  name="delete" />    
</form>
</td>
</tr>
  
 
<tr>
<td>
 <?php
  }  
  ?>
  
  <?php
  @$nvnoID=$_POST['INVOID'];


$selx="select *  from  pur_order where   ID=(SELECT MAX(ID) FROM `pur_order` where InvoiceNo='$nvnoID')";

$sqls= $this->connectF()->query($selx);

while($column = @mysqli_fetch_object($sqls)){
  
  
  ?>
  
  
<form action="purchase.php"   method="post">
   
   
<input type="hidden"  value="فاتورة مشتريات"  name="INVOtype" />
   
<input type="hidden"  value="<?php  echo $nvnoID ?>"  name="INVOID" />
 
 <input  type="hidden" name="RepName" value="<?php echo $column->RepName?>"   />
 
 
  <input  type="hidden" name="vendor_INV" value="<?php echo $column->vendors?>"   />


  <input  type="text"     name="Amount"  required="required"  onkeyup="typeSCc();" />


<select name="p_method">      

<option value="cash on  hand"> cash on  hand  </option>

<option value="credit card"> credit card  </option>

</select>

<input  type="submit"  value="paid"    name="cash" onclick="btclick();" />
  
</td>
  </tr>
 <?php
}
?>
   <?PHP
@$nvnoID=$_POST['INVOID'];

$suminv="select SUM(total) AS SUM from  pur_order where InvoiceNo=$nvnoID ";


$sumq= $this->connectF()->query($suminv);



while($sum = @mysqli_fetch_object($sumq)){


?>

  <tr> 
<td>   </td>
<td>   </td>
<td>   </td>
<td>   </td>
<td width="30px"> 

<label> invoice ToTAL:_ </label> 

<input type="text"  value ="<?php  echo $sum->SUM?>"  id='total'   name="TOTAL"  disabled="disabled"  /> 

<input  type="text"    name="Discount" id="Discount"  placeholder="نسبة المئوية"   onchange="typeSC();" />

<input  type="text"      id='Netval'   name="Net"   value='<?php  echo $sum->SUM?>'  disabled="disabled" />

    </td>
 </tr> 
 
 
 </form>  
<script>
   
   function typeSC() {
	   	   
	   var total=document.getElementById('total').value;
	   
	   var Discount=document.getElementById('Discount').value;
	   
	   var percantage=total*(Discount/100);
	   
	   var Net= total-percantage;
	      	   	   	   
	  document.getElementById('Discount').value=percantage;
	  
	  document.getElementById('Netval').value=Net;
	  	  	  
	 // $('#net').load('invoiceAjax.php',{ID:ID,TOTAL:total,Discount:Discount,Net:Net}); 
   }
   </script>
   
   
   <script>
   
   function btclick() {
	   	   
	  document.getElementById('Netval').disabled=false;
	  document.getElementById('total').disabled=false;
	  
   }
   </script>
  
<script>
   
   function typeSCc() {
	   	   
	   var total=document.getElementById('total').value;
	   
	   var Discount=document.getElementById('Discount').value;	   
	
	   var Net= total-Discount;
	      	   	   	   	  
	  document.getElementById('Netval').value=Net;
	  	  	  
	 // $('#net').load('invoiceAjax.php',{ID:ID,TOTAL:total,Discount:Discount,Net:Net}); 
   }
   </script> 

 
<?php

}

?>  
  <?php 
  @$Itemp_NO=$_POST['Itemp_NO']; //    رقم الامر SERIAL_NO
@$ITEMID = $_POST['Itemp_ID']; //    ITEM ID   كود الصنف
@$reorder_Q  = $_POST['REQRDER']; //  reorder Q    المسترجع
@$nvnoID=$_POST['INVOID'];  // invoice ID
@$username =$_POST['REP_INV'];  //  render rep value
@$vendors_INV = $_POST['vendor_INV'];   //  render client value

$rorder="select * from   stock  where  ID =$ITEMID "; 
    
  if(@$_POST['delete']){
  
  $selo= $this->connectF()->query($rorder);
 
  while($sorder = @mysqli_fetch_object($selo)){
	  ?>
	   <form action="purorder.php"  method="post">  
       هل بالفعل تريد حذف الطلب اذا كنت تريد اضغط نعم
                  <input type="hidden"  value="<?php  echo $nvnoID ?>"  name="INVOID" />
                <input type="hidden"  value="<?php  echo  $Itemp_NO  ?>"  name="Item_NO" />  
         <input type="hidden"  value="<?php  echo $sorder->ID?>"  name="Item_ID" /> 
  <input type="hidden"  value="<?php  echo $sorder->Qsupply?>"  name="supplyQ" />  
      <input type="hidden"  value="<?php  echo $reorder_Q ?>"  name="ReorderQ" /> 
      <input  type="hidden" name="REP_INV"  value="<?php echo $username ?>"   />
      <input  type="hidden" name="vendor_INV" value="<?php echo $vendors_INV ?>"   />
    <br /><input type="submit"  value="نعم"  name="yes" />    
  </form>
	  <?php
  }
  }
  ?>
  
  
  
  <?php
   @$Item_NO=$_POST['Item_NO']; // delete order No     حذف  الامر
@$Item_ID=$_POST['Item_ID']; //  Item id      كود الصنف
@$Qsupply=$_POST['supplyQ'];  // re Qorder  المعروض ف مخزون
@$QReorder=$_POST['ReorderQ'];   //Item ID  ارجاع الكمية 
@$surp=$Qsupply-$QReorder; 


$query="update  stock  SET   Qsupply='$surp'  WHERE  ID ='$Item_ID'  ";

$delo="delete  from    pur_order   WHERE   ID = $Item_NO ";

if(@$_POST['yes']){
  
  
$this->connectF()->query($query);  
  
$this->connectF()->query($delo);
  
  
  
}
  ?> 
 </table> 
 
 <?php	
}
}
$use= new purorder();
$use->connectF();
$use->sql();
?>   
  

</div>
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
