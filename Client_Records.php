<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>client_records</title>
<script src="js/jquery-1.11.0.min.js"> </script>
<meta name="viewport" content="width= device-width,">
<link href="css/xs.css" rel="stylesheet" type="text/css"/>
<link href="css/sm.css" rel="stylesheet" type="text/css"/>
<link href="css/lg.css" rel="stylesheet" type="text/css" />
<link href="css/md.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
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
    content: 'client`records';
 
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
    content: 'client`records';
 
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
    content: 'client`records';
 
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
    content: 'client`records';
 
    padding: 27px 79px 43px 76px;
}

 }  
 
</style>
	
<body>

<div id="loader">
<div class="logo"><img src="img/client_records.png" class="loading-logo"/></div>
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


<div class="client">

<span style='font-weight:bold; background:#06C; color:white; ' >  <strong> Add new client  أدخال عميل جديد </strong>    </span> <br />   <br />   <br /> 

<form action="Client_Records.php"  method="post">


<label>Name</label>
<input type="text"  placeholder=" الاسم بالكامل"  name='fname'/>

<label>  Telephone  </label>
<input type="text"  placeholder="التليفون"  name='telephone' />


<label> Address </label>
<input type="text"  placeholder="العنوان" name='Address' />


<label>job </label>
<input type="text"  placeholder="الوظيفة" name='job' />


<label>sales_rep </label>
<input type="text"  placeholder="مندوب مبيعات" name='seles_rep' />


<input type="submit" value="أدخال" name='ok' />

</form>

</div>


<table   width="1000" border="1" style="border:2px solid #000;">
  <tr style="background:#06F; color:white; "> 
<td  width="300">الاسم بالكامل </td>
<td  width="300">التليفون </td> 
<td  width="300">العنوان </td>   
<td   width="300">الوظيفة </td> 
<td   width="300"> مندوب مبيعات </td> 
<td   width="300"> تعديل </td>
<td   width="300"> حذف </td> 

    </tr>
    
<?php

include("connect.php");


class client_record extends  condb{        
  

public function sql(){


?>      
    
    

<?php
 $sel_tb="select * from   client_record";


$qusel_tb=$this->connectF()->query($sel_tb);	


while($row=mysqli_fetch_object($qusel_tb)){


?>
<tr>
<form action="Client_Records.php" method="post" > 
<input type="hidden"   name="ID" value="<?php  echo $row->ID?>"  />
<td  width="45"><input type="text"   name="Name"  value="<?php  echo $row->Name?>"   style="background:none;" /> </td>
<td  width="57"><input type="text"  name="TELEPHONE"    value="<?php  echo $row->TELEPHONE?>"  style="background:none;" /> </td> 
<td  width="57"><input type="text"  name="Address"  value="<?php  echo $row->Address?>"  style="background:none;"  />  </td>   
<td   width="78"><input type="text"  name="Job" value="<?php  echo $row->job?>"  style="background:none;" /> </td> 
<td   width="78"><input type="text"   name="Seles_Rep"  value="<?php  echo $row->seles_rep?>"   style="background:none;"  /> </td> 
<td   width="78"><input type="submit"   name="update"   value="تعديل" />  </td> 
</form>
<td   width="78"><form action="Client_Records.php" method="post" >
<input type="hidden"   name="ID"  value="<?php  echo $row->ID?>"   />
<input type="submit"   name="Delete"   value="حذف" />
</form>
</td> 
<BR/>

</tr>
<?php
}
?>


</table>


<?php


 @$Name=$_POST['Name'];

@$telephone=$_POST['TELEPHONE'];


@$Address=$_POST['Address'];

@$job=$_POST['Job'];

@$seles_rep=$_POST['Seles_Rep'];

@$ID=$_POST['ID'];


$update_client="Update client_record  Set  Name='$Name' ,  TELEPHONE='$telephone' , Address='$Address' , job='$job',seles_rep='$seles_rep'  

where ID='$ID'  ";

if(@$_POST['update']){

$this->connectF()->query($update_client);	

echo'<meta http-equiv="refresh"  content="3;url=Client_Records.php"/>';


?>


<?php
}


?>


<?php

 @$ID=$_POST['ID'];

$Delete_client=" Delete from client_record where ID='$ID' ";

if(@$_POST['Delete']){

$this->connectF()->query($Delete_client);	

echo'<meta http-equiv="refresh"  content="3;url=Client_Records.php"/>';


}


?>


<?php


 @$Name=$_POST['fname'];

@$telephone=$_POST['telephone'];


@$Address=$_POST['Address'];

@$job=$_POST['job'];

@$seles_rep=$_POST['seles_rep'];


$sel_tab="select * from   client_record where Name='$Name' ";

$qusel_tab= $this->connectF()->query($sel_tab);

$ins_client="insert into  client_record(Name,TELEPHONE,Address,job,seles_rep) values ('$Name','$telephone','$Address','$job','$seles_rep')";

if($row=mysqli_fetch_object($qusel_tab)){
	
echo"داتا العميل موجوده بالفعل يرجي تغير الاسم";	

#echo'<meta http-equiv="refresh"  content="3;url=Client_Records.php"/>';


} else{
	

$this->connectF()->query($ins_client);

echo"the value was add";

echo'<meta http-equiv="refresh"  content="3;url=Client_Records.php"/>';


	
}

?>

<?PHP
}
}
$use= new client_record();
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








