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
<title>purchase invoice</title>
<script src="jquery-1.11.0.min.js"></script>
</head>
<style>
	
	
	.odd{
		background-color:#930;
	}
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

<?php
include("con_db2.php");

@$INVOICE =$_POST['INV_ID'];  #   رقم فاتورة:فاتورة مشتريات

@$username =$_POST['REP_INV'];   #   أسم كاشير

$INVQ="insert into purchase (INVOICE,RepName,paid,TIME) values ('$INVOICE','$username','Notpaid',NOW())";

if(@$_POST['pur']){
mysqli_query($connect,$INVQ);
?>
<span style='font-weight:bold; background:#06C; color:white; ' > Creat purchase  Invoice  أنشاء فاتوره مشتريات</span> <br />
<?php
}
?>

<?php
include("con_db2.php");


$invs="select *  from  purchase where TIME=NOW()"; 
$invq= mysqli_query($connect,$invs);
while($colu = mysqli_fetch_assoc($invq)){
?>
<BR />

<td><label>INVOICE NO:-</label> <input  type="text" name="INVOID" value="<?php echo $colu['ID']?>"   disabled="disabled" /></td>

<?php
}
?>

<?php
include("con_db2.php");

$select="select *  from stock "; 
$sqlq= mysqli_query($connect,$select);
?>
<form action="purorder.php" method="post">
<label>select_item:-</label>

<select name="item">
<?php
while($column = mysqli_fetch_assoc($sqlq)){
?>   

    <option value="<?php  echo $column ['ID']?>" ><?php  echo $column ['Item']?></option> 
<?php
}
?>
 </select>
 <input  type="submit"  name="ok"  value="تاكيد"  id="bts" style="background:#999;"/>
<?php
include("con_db2.php");

@$username =$_POST['REP_INV'];
@$vendor_INV = $_POST['vendor_INV'];

$invs="select *  from  purchase where ID=(SELECT MAX(id) FROM `purchase` where RepName='$username')";

$invq= mysqli_query($connect,$invs);
while($colu = mysqli_fetch_assoc($invq)){
?>
<BR />
<input  type="hidden" name="INVOID"   value="<?php echo $colu['ID']?>" />
<label>REP_Name:</label><input  type="text" name="REP_INV"  value="<?php echo $colu['RepName']?>"      placeholder="Rep_Name" style="background-color:#FFF;
width:100px;  border:none;"   onmouseover='calert();' />
<label>vendors_Name:</label><input  type="text" name="vendor_INV" value="<?php echo $vendor_INV ?>"      placeholder"vendors_Name" required="required" />
<?php
}
?>
</form>
<?PHP
include("con_db2.php");

if(@$_POST['ok']) {
	@$nvnoID=$_POST['INVOID'];  //  INPUT INVOICE  NAME =  INVOID  ---- form    to  insert  in order  table (invoices)
	@$item = $_POST['item'];    //  Select item  NAME =  item   -----  form  to  insert  in order  table (invoices)
	@$vendors_INV = $_POST['vendor_INV'];   //  INPUT Client  NAME =  Client_INV  ---- form  to  insert  in order  table (invoices) and   update  client  in   invoice  table  (invno)
	@$REP_Name = $_POST['REP_INV'];
	
$sel="select *  from stock where ID =$item ";  


$sql= mysqli_query($connect,$sel);


$sqq="update  purchase  SET   vendors='$vendors_INV'  WHERE  ID ='$nvnoID'  ";

mysqli_query($connect,$sqq);


?>

<?php
while(@$row = mysqli_fetch_assoc($sql)){
	
?> 
<br/> 
<form action="purorder.php"  method="post"> 
<td><label>INVOICE NO:</label><input type="TEXT" value="<?php echo $nvnoID ?>"  name="INVOID" style="background-color:#FFF;  width:100px;  border:none;" 
onmouseover='calert();' >
<td><label>Item_ID:</label><input type="input" value="<?php echo $row ['ID']?>"  name="Item_ID" style="background-color:#FFF;
width:100px;  border:none;" onmouseover='calert();' /></td>
<td><label>Item:</label><input type="input" value="<?php echo $row ['Item']?>"  name="Item" style="background-color:#FFF;
width:100px;  border:none;" onmouseover='calert();' /></td>
<td><label>cost:</label><input type="input"  value="<?php echo $row ['price']?>"  name="cost"  style="background-color:#FFF;
width:100px;  border:none;" onmouseover='calert();' /> </td>
<td><label>Qsupply:</label><input value="<?php echo $row ['Qsupply']?>"  name ="Qsupply"  type="input"  style="background-color:#FFF;width:100px; border:none;" onmouseover='calert();'/></td>
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
include("con_db2.php");
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

$sqli="insert into  pur_order (Item,Item_ID,vendors,RepName,cost,Qsupply,Qpurchase,total,InvoiceNo,Time) 
values ('$Item','$ItemID','$vendors_INV','$RepName','$cost','$Qsupply','$Qpurchase','$total','$inv',NOW())";
@mysqli_query($connect,$sqli);
@mysqli_query($connect,$sur);
@mysqli_query($connect,$sux);
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
include("con_db2.php");


@$nvnoID=$_POST['INVOID'];

$sele="select *  from  pur_order where InvoiceNo=$nvnoID";

$sqlw= mysqli_query($connect,$sele);

while($column = @mysqli_fetch_assoc($sqlw)){
?>
  <form action="purorder.php"  method="post">  
  <tr> 
<td><?php  echo $column['Item']?>       </td>
<td><?php  echo $column['cost']?>       </td>
<td> <Input type="text"  value="<?php  echo $column['Qpurchase']?>"  name="REQRDER"  style="background-color:#FFF;
 width:100px;  border:none;"  />      </td>
<input  type="hidden" name="REP_INV"  value="<?php echo $column['RepName']?>"   />
<td><input  type="text" name="vendor_INV" value="<?php echo $column['vendors'] ?>"   /></td>
<td> <?php  echo $column['total']?>      </td>
<td>
<input type="hidden"  value="<?php  echo $nvnoID ?>"  name="INVOID" />
<input type="hidden"  value="<?php  echo $column['ID']?>"  name="Itemp_NO" />
<input type="hidden"  value="<?php  echo $column['Item_ID']?>"  name="Itemp_ID" />     
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
  include("con_db2.php");


@$nvnoID=$_POST['INVOID'];


$selx="select *  from  pur_order where   ID=(SELECT MAX(ID) FROM `pur_order` where InvoiceNo='$nvnoID')";

$sqls= mysqli_query($connect,$selx);

while($column = @mysqli_fetch_assoc($sqls)){
  
  
  ?>
  
  
<form action="purchase.php"   method="post">
   
<input type="hidden"  value="<?php  echo $nvnoID ?>"  name="INVOID" />
 
 <input  type="hidden" name="vendor_INV" value="<?php echo $column['vendors'] ?>"   />

  <input  type="text"     name="Amount"  />


<select name="p_method">      

<option value="cash on  hand"> cash on  hand  </option>

<option value="credit card"> credit card  </option>

<select>

     <input  type="submit"  value="paid"    name="cash" />  
  
</td>
  </tr>
 <?php
}
?>
   <?PHP
include("con_db2.php");

@$nvnoID=$_POST['INVOID'];



$suminv="select SUM(total) AS SUM from  pur_order where InvoiceNo=$nvnoID ";


$sumq= mysqli_query($connect,$suminv);



while($sum = @mysqli_fetch_assoc($sumq)){


?>

  <tr> 
  <td>   </td>
  <td>   </td>
  <td>   </td>
  <td>   </td>
    <td width="30px"> invoice ToTAL:_ <input value ="<?php  echo $sum['SUM'] ?>"  name="total"  />     </td>
 </tr> 
   </form>

 
<?php

}

?>  
  <?php 
  include("con_db2.php");

@$Itemp_NO=$_POST['Itemp_NO']; //    رقم الامر SERIAL_NO
@$ITEMID = $_POST['Itemp_ID']; //    ITEM ID   كود الصنف
@$reorder_Q  = $_POST['REQRDER']; //  reorder Q    المسترجع
@$nvnoID=$_POST['INVOID'];  // invoice ID
@$username =$_POST['REP_INV'];  //  render rep value
@$vendors_INV = $_POST['vendor_INV'];   //  render client value







  $rorder="select * from   stock  where  ID =$ITEMID "; 
  
  
  if(@$_POST['delete']){
  
  $selo= mysqli_query($connect,$rorder);

  
  
  
  
  while($sorder = @mysqli_fetch_assoc($selo)){
	  ?>
	   <form action="purorder.php"  method="post">  
       هل بالفعل تريد حذف الطلب اذا كنت تريد اضغط نعم
                  <input type="hidden"  value="<?php  echo $nvnoID ?>"  name="INVOID" />
                <input type="hidden"  value="<?php  echo  $Itemp_NO  ?>"  name="Item_NO" />  
         <input type="hidden"  value="<?php  echo $sorder['ID']?>"  name="Item_ID" /> 
  <input type="hidden"  value="<?php  echo $sorder['Qsupply']?>"  name="supplyQ" />  
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
   include("con_db2.php");

@$Item_NO=$_POST['Item_NO']; // delete order No     حذف  الامر
@$Item_ID=$_POST['Item_ID']; //  Item id      كود الصنف
@$Qsupply=$_POST['supplyQ'];  // re Qorder  المعروض ف مخزون
@$QReorder=$_POST['ReorderQ'];   //Item ID  ارجاع الكمية 
@$surp=$Qsupply-$QReorder; 


$query="update  stock  SET   Qsupply='$surp'  WHERE  ID ='$Item_ID'  ";

$delo="delete  from    pur_order   WHERE   ID = $Item_NO ";

if(@$_POST['yes']){
  
  
mysqli_query($connect,$query);  
  
  mysqli_query($connect,$delo);
  
}
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
