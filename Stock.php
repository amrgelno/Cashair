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
<title>inventory</title>
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
    content: 'loading`stock';
 
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
    content: 'loading`stock';
 
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
    content: 'loading`stock';
 
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
    content: 'loading`stock';
 
    padding: 27px 79px 43px 76px;
}

 }  
 
</style>

<body>

<div id="loader">
<div class="logo"><img src="img/stock.png" class="loading-logo"/></div>
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
  
   
 <div id='content' style="display:none;">
<form action="Stock.php"   method="post">
<label>  Item Name  </label>  
<input type="text"   placeholder=" اسم الصنف "   name="Item"  /> 
<label>  Item_dep  </label>  
<input type="text"   placeholder=" تحت قسم "   name="Item_dep"  /> 
<label>price1 </label>  
<input type="text"   placeholder=" سعر البيع "   name="Item_price1"  />
<label>price2 </label>  
<input type="text"   placeholder=" سعر البيع "   name="Item_price2"  />
<label> price3 </label>  
<input type="text"   placeholder=" سعر البيع "   name="Item_price3"  />
<label> Item_COST </label>  
<input type="text"   placeholder=" سعر الشراء "   name="Item_cost"  /><br/>  
<label> Q_Supply</label>  
<input type="text"   placeholder="الكمية المعروضه "   name="Q_Supply"  />
<input type="submit" value="اضافة" name ="ADD" />   
</form>
<br/> <br/>
<div id='c1' >
<table width="450" border="1"  style="margin-left:10px; text-align:center" >
<td colspan="6"  style="background:#FF0;  text-align:center;"> تقارير الاصناف </td>
  <tr  style="background:#0CF; text-align:center;">
<td>اسم الصنف<BR/>Item</td>
<td>قسم الصنف<br/>(ITEM_DEP)</td>
<td  width='150px'>سعر بيع1<br/>(price )</td>
<td  width='150px'>سعر بيع2<br/>(price )</td>
<td  width='150px'>سعر بيع3<br/>(price )</td>
<td  width='150px'>سعر شراء<br/>(price Cost)</td> 
<td> الكمية معروضة<br/>(QSupply)</td>  
 <td>حذف الصنف </td>
  <td>تعديل الصنف </td>  
  </tr>
  
 <?php

include("connect.php");


class cashair extends  condb{        
  

public function sql(){


?>  
  
  
<?php
$select="select *  from  stock "; 

$sqlq=$this->connectF()->query($select);	

while($col= mysqli_fetch_object($sqlq)){
?>
<tr>
<form action="stock.php" method="post">
<input type="hidden"   name="ID" value="<?php  echo $col->ID?>"  />
    <td width='100px'><input type="text" name="Item" VALUE="<?php echo $col->Item?>"  style="background:none;" /></td>
    <td width='100px'><input type="text" name="Item_dep" VALUE="<?php echo $col->Item_dep?>" style="background:none;" /></td>
    <td width='100px' ><input type="text" name="price" VALUE="<?php echo $col->price?>" style="background:none;" /></td>
    <td width='100px' ><input type="text" name="price2" VALUE="<?php echo $col->price2?>" style="background:none;" /></td>
    <td width='100px' ><input type="text" name="price3" VALUE="<?php echo $col->price3?>" style="background:none;" /></td>
    <td width='100px' ><input type="text" name="cost"  VALUE="<?php echo $col->cost?>"  style="background:none;" /></td>
    <td width='100px'><input type="text" name="Qsupply" VALUE="<?php echo $col->Qsupply?>"  style="background:none;" /> </td>
    <td width='100px'> <input type="submit" value="UPDATE" name="update" /> </td>   
   <td>
   </form>
   
 <form action="stock.php" method="post">
 
     <input type="hidden"  name="ID"  value="<?php echo $col->ID?>"  />       
     
    <input type="submit" value="Delete" name="Delete" />
    
   </form>
   </td>
   
       </tr>


<?php
}
?>
</table>



<?php


@$Item=$_POST['Item'];

@$Item_dep=$_POST['Item_dep'];

@$price=$_POST['price'];

@$price2=$_POST['price2'];

@$price3=$_POST['price3'];

@$cost=$_POST['cost'];

@$Qsupply=$_POST['Qsupply'];


@$ID=$_POST['ID'];


$update_Stock="Update  stock  Set  Item='$Item',Item_dep='$Item_dep',price='$price',price2='$price2',price3='$price3',cost='$cost',Qsupply='$Qsupply'  


where ID='$ID'  ";

if(@$_POST['update']){

$this->connectF()->query($update_Stock);	

echo'<meta http-equiv="refresh"  content="3;url=Stock.php"/>';


?>


<?php
}


?>





<?php

@$price=$_POST['Item_price1'];
@$price2=$_POST['Item_price2'];
@$price3=$_POST['Item_price3'];
@$Item_dep=$_POST['Item_dep'];
@$Item=$_POST['Item'];
@$Q_Supply=$_POST['Q_Supply'];
@$cost=$_POST['Item_cost'];

$ins="insert into stock (Item,Item_dep,cost,price,price2,price3,Qsupply) VALUES  ('$Item ','$Item_dep','$cost','$price','$price2','$price3','$Q_Supply')";


IF(@$_POST['ADD']){


$this->connectF()->query($ins);	


echo "<meta http-equiv='refresh'  content='1;url=stock.php'/>";


}

?>



<?php

@$ID=$_POST['ID'];


$Del_Item="delete  from   stock  where  ID='$ID'";


IF(@$_POST['Delete']){

$this->connectF()->query($Del_Item);	


echo "<meta http-equiv='refresh'  content='1;url=stock.php'/>";



}



?>


<?PHP
}
}
$use= new cashair();
$use->connectF();
$use->sql();
?>
</div>
</div>
<script>
$(document).ready(function(){
    $("#loader").delay(1200).fadeOut("fast"); 
	$("#content").delay(1200).fadeIn("fast");  
    });
</script>

</body>
</html>
