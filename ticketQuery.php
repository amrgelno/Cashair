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
<title>تذاكرة الفترة</title>
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
<table width="100%" border="1">
<tr>
<td> 


  </td>

<td  style="background:#F00;"> تذاكرة الفترة 
</td>
</tr>
  <tr style="background:#FF0; text-align:center;">
    <td  >رقم تذكرة</td>
    <td  >  مشكلة البرمجية</td>
    <td >تفاصيل المشكلة</td>
     <td>لقطة الشاشة</td>
    <td >التاريخ و الوقت</td>
     <td >الحالة</td>
    <td  >الشركة</td>
     <td >حذف</td>     
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

$sel_inv="SELECT `member`.`Company`
,`member`.`Email` , `ticket`.`ID` ,`ticket`.`issue_Title` ,`ticket`.`issue` , `ticket`.`status` , `ticket`.`Date`,`ticket`.`img`
FROM  ticket 
LEFT JOIN  member   ON `member`.id = `ticket`.`UID`  
  limit $start,$perpage ";

$sel_count="select count(ID) AS  Number  FROM  ticket    ";

$query_count=$this->connectF()->query($sel_count);	

$col=mysqli_fetch_object($query_count);

$Number=$col->Number;


$Lastpage=ceil($Number/$perpage);



$query=$this->connectF()->query($sel_inv);


while($col=mysqli_fetch_object($query)){

?>

  <tr width='50%'>
<td style="text-align:center;"><?php echo $col->ID?></td>
<td style="text-align:center;"><?php echo $col->issue?></td> 
<td  style="text-align:center;"><?php echo $col->issue_Title?></td>
<td style="text-align:center;"><a href='img/<?php echo $col->img?>'><img src="img/<?php echo $col->img?>" width='100px' height="100px" /></img></a></td>
<td  style="text-align:center;"><?php echo $col->Date?></td>
    <td  style="text-align:center;">
    <form  action="?page" method="post">
      <input type='hidden' value='<?php echo $col->ID?>' name='ID' />
      
     <input type='submit' value='<?php echo $col->status?>' NAME='submit'  id='submit<?php echo $col->ID?>' style='color:black; border:none; background:none;'/>
   
    <Select name='status' style='color:#000' id='status' width='200px' 
    onchange='convert<?php echo $col->ID?>();'>
    <option  value="رجاء أختيار">رجاء أختيار   </option>
    <option  value="لم تتم المعالجة">لم تتم المعالجة   </option>
    <option  value="جاري البحث"> جاري البحث  </option>
    <option  value="جاري الأجراء"> جاري الأجراء  </option>
    <option  value=" تم الأنتهاء">تم الأنتهاء  </option> 
    <option  value=" فى الانتظار">فى الانتظار  </option>  
    <option  value=" متوقف لسبب راجع للعميل ">متوقف لسبب راجع للعميل </option>   
    </Select>   
    </form>
    </td>
    <td  style="text-align:center;"><?php echo $col->Company?> </td>  
    
   <td> <script>

function convert<?php echo $col->ID?>(){
	
document.getElementById('submit<?php echo $col->ID?>').value='ـاكيد';
document.getElementById('submit<?php echo $col->ID?>').style.background='orange';
document.getElementById('submit<?php echo $col->ID?>').style.color='white';	
document.getElementById('submit<?php echo $col->ID?>').style.border='2px solid #000';	

	
}

</script></td>
  
                      
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

