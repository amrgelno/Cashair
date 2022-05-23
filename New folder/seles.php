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
<title>creat_invoice</title>
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
  <div class="Brand"><img src="img/logo.png" class="logo2"/></div> 
  <div class='bts'>
 <button type="button" onclick="goback()" class="back"> < Back  </button>  
 <button type="button" onclick="gonext()" class="back"> Next > </button> 
 <button onClick="window.location.reload();">Refresh Page</button>
 <button onclick="printcontent('c1')">Print this page</button> 
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
<div id="c1">

<?php
include("con_db2.php");

@$INVOICE =$_POST['INV_ID']; # رقم فاتورة:فاتورة مبيعات

@$username =$_POST['REP_INV']; #   أسم كاشير 

$INVQ="insert into invno (INVOICE,RepName,paid,TIME)  values ('$INVOICE','$username','Notpaid',NOW())";

if(@$_POST['INVBT']){

mysqli_query($connect,$INVQ);
?>
<span style='font-weight:bold; background:#06C; color:white; ' >  Seles Invoice   فاتوره مبيعات</span> <br />

<?php
}
?>

<?php
include("con_db2.php");

$invs="select *  from  invno where  TIME=NOW()"; 
$invq= mysqli_query($connect,$invs);

while($colu = mysqli_fetch_assoc($invq)){
?>
<BR />

<label>INVOICE NO:-</label> <input  type="text"  name="INVOID"  value="<?php echo $colu['ID']?>"    disabled="disabled"  />

<?php
}
?>

<?php
include("con_db2.php");

$select="select *  from stock ";
 
$sqlq= mysqli_query($connect,$select);
?>
<form action="seles.php"  method="post">  <!--first form -->
<label>select_item:-</label>
<select name="item">
<?php
while($column = mysqli_fetch_assoc($sqlq)){
?>   

  <option value="<?php  echo $column ['ID']?>"  id='idv' ><?php  echo $column ['Item']?></option> 
<?php
}
?>
 </select>
 <input  type="submit"  name="ok"  value="تاكيد"   id="bts"    style="background:brown;  color:white;     border: 2px solid #000;"/>
 
<?php
include("con_db2.php");


@$username =$_POST['REP_INV'];

@$Client_INV = $_POST['Client_INV'];

$invs="select *  from  invno  where ID=(SELECT MAX(id) FROM `invno` where RepName='$username')";


$invq= mysqli_query($connect,$invs);
while($colu = mysqli_fetch_assoc($invq)){
?>
<BR />

<input  type="hidden"  name="INVOID"   value="<?php echo $colu['ID']?>"    onmouseover='calert();' />  
REP_Name:<input  type="text" name="REP_INV"  value="<?php echo $colu['RepName']?>"  placeholder="أسم مندوب" style="background-color:#FFF;  width:100px;  border:none;"  onmouseover='calert();'/>
Client_Name:<input  type="text" name="Client_INV" value="<?php echo $Client_INV ?>" placeholder="أسم_العميل"  required="required"/>
<?php
}
?>
</form>  <!--first form -->
<?PHP
include("con_db2.php");
if(@$_POST['ok']) {
$nvnoID=$_POST['INVOID'];  #  INPUT INVOICE  NAME =  INVOID  ---- form    to  insert  in order  table (invoices)
$item = $_POST['item'];    #  Select item  NAME =  item   -----  form  to  insert  in order  table (invoices)
$Client_INV = $_POST['Client_INV'];   #  INPUT Client  NAME =  Client_INV  ---- form  to  insert  in order  table (invoices) and   update  client  in   invoice  table  (invno)
@$REP_Name = $_POST['REP_INV'];

$sel="select *  from stock where ID =$item ";  

$sql= mysqli_query($connect,$sel);

$sqq="update  invno  SET   client='$Client_INV'  WHERE  ID ='$nvnoID'  ";

mysqli_query($connect,$sqq);


?>

<?php
while(@$row = mysqli_fetch_assoc($sql)){
	
?> 
<br/> 
<form action="seles.php"  method="post"> 
<td>INVOICE NO:<input type="TEXT" value="<?php echo $nvnoID ?>"    name="INVOID" 
style="background-color:#FFF;  width:100px;  border:none;"  onmouseover='calert();'></td>
<td>Item_ID:<input type="input" value="<?php echo $row ['ID']?>"    name="Item_ID"
 style="background-color:#FFF; width:100px;  border:none;"  onmouseover='calert();'/></td>
<td>Item:<input type="input" value="<?php echo $row ['Item']?>"  
name="Item" style="background-color:#FFF; width:100px;  border:none;"  onmouseover='calert();'  onkeypress='calert();'/></td>
<td>Price:<input type="input"  value="<?php echo $row ['price']?>"  name="price"  style="background-color:#FFF; width:100px;  border:none; "   
onkeypress='calert();'/></td>
<td>Qsupply:<input value="<?php echo $row ['Qsupply']?>"  name ="Qsupply"  type="input"  style="background-color:#FFF;width:100px; border:none;"  onmouseover='calert();'/></td>
<td>QuantityOrder:<input  type="input" name="QOrder"  placeholder="الكمية المطلوبة"  /></td>
<td><input   name="REP_INV"  value="<?php echo $REP_Name ?>"   type="hidden"/></td>
<td><input   name="Client_INV"  value="<?php echo $Client_INV ?>"  type="hidden"/></td>
<td><input type="submit" value="Add"  name="Add" style="background-color:#0FF;" /></td>
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
@$price = $_POST['price'];
@$QOrder=$_POST['QOrder'];
@$Qsupply=$_POST['Qsupply'];
@$surplus=$Qsupply-$QOrder;
@$RepName=$_POST['REP_INV'];
@$client=$_POST['Client_INV'];
@$total=$QOrder*$price;

if($surplus<0){

$surplus2=0;

$sur="update  stock  SET   Qsupply='$surplus2'  WHERE  ID ='$ItemID'  ";

}
elseif($surplus>0){

$sux="update  stock  SET   Qsupply='$surplus'  WHERE  ID ='$ItemID'  ";


}


if(@$_POST['Add']){


if($Qsupply<=$QOrder){

$total2=$Qsupply*$price;	

$sqli="insert into  invoices (Item,Item_ID,QOrder,Qsupply,price,RepName,client,total,InvoiceNo,Time) 
                      values ('$Item','$ItemID','$Qsupply','$Qsupply','$price','$RepName','$client','$total2','$inv',NOW())";
@mysqli_query($connect,$sur);
@mysqli_query($connect,$sux);
@mysqli_query($connect,$sqli);
}

elseif($Qsupply>$QOrder){
	
if($QOrder<=0){	

echo"invaild value";	

}

else{
	
$sqli="insert into  invoices (Item,Item_ID,QOrder,Qsupply,price,RepName,client,total,InvoiceNo,Time) 
                    values ('$Item','$ItemID','$QOrder','$Qsupply','$price','$RepName','$client','$total','$inv',NOW())";
@mysqli_query($connect,$sur);
@mysqli_query($connect,$sux);
@mysqli_query($connect,$sqli);
}

}

}

#echo"request sent";
#echo'<meta http-equiv="refresh"  content="3;url=seles.php"/>';

?>

 <br/>
 <br/>
 

 <table width="300" border="1" style="border:2px solid #000;">
  <tr style="background:#06F; color:white;"> 
<td >الصنف </td>
<td  width="45">السعر </td>
<td  width="57">كمية </td> 
<td  width="57">العميل </td>   
<td   width="78">الاجمالي </td> 
<td   width="78"> حذف </td> 
    </tr>

       
 <?PHP
include("con_db2.php");


@$nvnoID=$_POST['INVOID'];

$sele="select *  from   invoices where  InvoiceNo=$nvnoID";

$sqlw= mysqli_query($connect,$sele);

while($column = @mysqli_fetch_assoc($sqlw)){
?>
  <form action="seles.php"  method="post">  
  <tr> 
<td><?php  echo $column['Item']?>   </td>
<td><?php  echo $column['price']?>   </td>
<td> <Input type="text"  value="<?php  echo $column['QOrder']?>"  name="REQRDER"  style="background-color:#FFF;  width:100px;  border:none;"  /> </td>
<input  type="hidden" name="REP_INV"  value="<?php echo $column['RepName']?>"   />
<td><input  type="text" name="Client_INV" value="<?php echo $column['client'] ?>"   /></td>
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


$selx="select *  from invoices where ID=(SELECT MAX(ID) FROM `invoices` where InvoiceNo='$nvnoID')";

$sqls= mysqli_query($connect,$selx);

while($column = @mysqli_fetch_assoc($sqls)){
  ?>
<form action="selinv.php"   method="post">

<input type="hidden"  value="<?php  echo $nvnoID ?>"  name="INVOID" />

<input  type="hidden" name="Client_INV" value="<?php echo $column['client'] ?>"   />

<input  type="hidden" name="RepName"  value="<?php echo $column['RepName'] ?>" />

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

$suminv="select SUM(total)  AS  SUM   from   invoices   where    InvoiceNo=$nvnoID ";

$sumq= mysqli_query($connect,$suminv);

while($sum = @mysqli_fetch_assoc($sumq)){

?>
  <tr> 
<td>   </td>
<td>   </td>
<td>   </td>
<td>   </td>
<td width="30px"> <label> invoice ToTAL:_ </label> <input value ="<?php  echo $sum['SUM'] ?>"  name="total"  />     </td>
 </tr> 
   </form>
 
<?php

}

?>  
  <?php 
include("con_db2.php");

@$Itemp_NO=$_POST['Itemp_NO']; #رقم الامر SERIAL_NO
@$ITEMID = $_POST['Itemp_ID']; #ITEM ID   كود الصنف
@$reorder_Q  = $_POST['REQRDER']; #reorder Q    المسترجع
@$nvnoID=$_POST['INVOID'];  #invoice ID
@$username =$_POST['REP_INV'];  #render rep value
@$Client_INV = $_POST['Client_INV'];  #render client value

$rorder="select * from   stock  where  ID =$ITEMID "; 
    
  if(@$_POST['delete']){
  
  $selo= mysqli_query($connect,$rorder);
  
  while($sorder = @mysqli_fetch_assoc($selo)){
	  ?>
	   <form action="seles.php"  method="post">  
       هل بالفعل تريد حذف الطلب اذا كنت تريد اضغط نعم
<input type="hidden"  value="<?php  echo $nvnoID ?>"  name="INVOID" />
<input type="hidden"  value="<?php  echo  $Itemp_NO  ?>"  name="Item_NO" />  
<input type="hidden"  value="<?php  echo $sorder['ID']?>"  name="Item_ID" /> 
<input type="hidden"  value="<?php  echo $sorder['Qsupply']?>"  name="supplyQ" disabled="disabled" />  
<input type="hidden"  value="<?php  echo $reorder_Q ?>"  name="ReorderQ" /> 
<input  type="hidden" name="REP_INV"  value="<?php echo $username ?>"   />
<input  type="hidden" name="Client_INV" value="<?php echo $Client_INV ?>"   />
<br /><input type="submit"  value="نعم"  name="yes" />    
  </form>
	  <?php
  }
  }
  ?>
  
  <?php
  
 include("con_db2.php");

@$Item_NO=$_POST['Item_NO']; #delete order No     حذف  الامر
@$Item_ID=$_POST['Item_ID']; #Item id      كود الصنف
@$Qsupply=$_POST['supplyQ'];  #re Qorder  المعروض ف مخزون
@$QReorder=$_POST['ReorderQ'];   #Item ID  ارجاع الكمية 
@$surp=$Qsupply+$QReorder; 


$query="update  stock  SET   Qsupply='$surp'  WHERE  ID ='$Item_ID'  ";

$delo="delete  from    invoices   WHERE   ID = '$Item_NO'  ";

if(@$_POST['yes']){
    
mysqli_query($connect,$query);  

mysqli_query($connect,$delo);

#echo "<meta http-equiv='refresh'  content='1,url=seles.php' />" ;

}

  ?> 
</div>



<script>
$('table tr:odd').css('background-color','#ccc');
</script>

<script>
$(document).ready(function(){
    $("#loader").delay(1200).fadeOut("fast");   
    });
</script>


  <br/>
  
</body>

</html>
