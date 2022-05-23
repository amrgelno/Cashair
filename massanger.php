<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script src="js/jquery-1.11.2.min.js"></script>
<meta name="viewport" content="width = device-width,">
<link href="Admin_css/xs.css" rel="stylesheet" type="text/css"/>
<link href="Admin_css/sm.css" rel="stylesheet" type="text/css"/>
<link href="Admin_css/lg.css" rel="stylesheet" type="text/css" />
<link href="Admin_css/md.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<title>مراسلات</title>
</head>

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
<body>
<!--<div class="loadingbg">
<div class="logo"><img src="img/SIRCONSULTLOGO.png" class="loading-logo"/></div>
<!--<div id="loading">loading...</div>
<div id="dev1"><span class="enime"></span></div>
<div id="dev2">  </div>
<div id="dev3"> </div>
 </div>  --> 
 <div class="Brand"><img src="img/SIRCONSULTLOGO.png" class="logo2"/></div> 
  <div class='bts'>
 <button type="button" onclick="goback()" > < Back  </button>  
 <button type="button" onclick="gonext()" > Next > </button> 
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
<table width="100%" border="1" style="color:#000;">
<tr>
<td> 


  </td>

<td  style="background:#F00;"> مراسلات 
</td>
</tr>
  <tr style="background:#FF0; text-align:center;">
   <td  >رقم العضوية</td>
    <td  >اسم العميل</td>
    <td  >  حالة الأتصال</td>
    <td > الرسالة  </td>
    <td > وقت رسالة  </td>
    <td > مراسلة  </td>
           <td>
   </td>
  </tr>

<?php

include("connect.php");


class invquery  extends  condb{        
  

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

$sel_inv="SELECT `member`.`ID`,`member`.`Company`,`member`.`chat`,`member`.`Email`,`member`.`Mobile`,`mssg`.`Mssg`,`mssg`.`Data` 
FROM  member 
LEFT JOIN  mssg   ON  `member`.`Email` = `mssg`.`Email`  WHERE  `mssg`.`Mssg` <> 'NULL' And  `mssg`.`ID`
  limit $start,$perpage";

$sel_count="select count(ID) AS  Number  FROM  mssg    ";

$query_count=$this->connectF()->query($sel_count);	

$col=mysqli_fetch_object($query_count);

$Number=$col->Number;


$Lastpage=ceil($Number/$perpage);



$query=$this->connectF()->query($sel_inv);


while($col=mysqli_fetch_object($query)){

?>
  <tr width='50%'>
<td style="text-align:center;"><?php echo $col->ID?></td>
<td style="text-align:center;"><?php echo $col->Company?></td> 
<td style="text-align:center;"><?php echo $col->chat?></td> 
<td style="text-align:center;">

<?php echo $col->Mssg?>


</td>
<td style="text-align:center;"><?php echo $col->Data?></td>  
<td style="text-align:center;">
<div >
<a class="PDvGL q8cvFf" href="tel:<?php echo $col->Mobile?>" data-tracking-element-type="3" jslog="56037; track:impression,click" itemprop="telephone" dir="ltr">Call now</a>
<br/><a href="https://api.whatsapp.com/send?phone=<?php echo $col->Mobile?>"  target="_tab">Send via Whatsapp</a>
<br/><a href="mailto:<?php echo $col->Email?>"  target="_tab">Send via Email</a>
<form action="MSSG_CUSTOMER.php" method="post">
<input type="hidden" name='MID' value="<?php echo $col->ID?>" />  <!-- member -recevier_id  (CLIENT)  -->
<input type="hidden"  name="UID" value="<?php echo $_POST['UID'] ?>"/> <!-- USER ID SENDR -->
<button type='submit'  target="_tab"> Send via massanger  <img src='img/Mssgicon copy.png' width='15px' height='25px' style="border:none;
background-color:none;"/> </button>
</form>
</div>
</td> 
</td>
                        
  </tr>
  
<?php
}
?>

</table>

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



<br/>
<br/>



<?php 
/*

@$nvnoID=$_POST['INVOID'];   //   تاكيد  زرار

@$paid =$_POST['p_method'];  //   فاتورة مبيعات

@$username =$_POST['username'];

$paidQ="Update  invno   SET  paid='$paid'   where    ID ='$nvnoID' ";
 
 
 if(@$_POST['cash']){
	 
$this->connectF()->query($paidQ);
	  
 }*/
  ?>
  
  <?php

@$status=$_POST['status'];

@$ID=$_POST['ID'];

$update_status="update ticket  Set  status='$status'  where  ID='$ID' ";

if(@$_POST['submit']){

$this->connectF()->query($update_status);

echo '<meta http-equiv="refresh" content="3,?page" />';

}

?>






  <?php	
}
}
$use= new invquery();
$use->connectF();
$use->sql();
?>  
  <script>
$(document).ready(function(){
    $("#loader").delay(1200).fadeOut("fast");   
    });
</script>
<script>

function convert(){
	
document.getElementById('submit').value='ـاكيد';	
	
	
}

</script>

</div>
</body>
<script src="js/function.js"></script>
</html>

