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
<title>الدعم الفني</title>
</head>

<body>
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



}

@media only screen and (min-width: 768px)
 {
	 body{
	font-weight:bold;
	font-size:30px;
}
      
 


}



@media only screen and (width:1024px)
 {
	 body{
	font-weight:bold;
	font-size:30px;
}
      
 img.loading-logo {
    width: 336px;
}


   
} 
 
 
 
@media only screen and (min-width: 1200px)
{
	body{	
	font-weight:bold;
	font-size:15px;
}


img.loading-logo {
    width: 168px;
    height: 179px;
}



.logo {
    width: 31px;
    height: 10px;
    margin: 244px 573px;
}



 }  
 
</style>


<body>

<?php

include("connect.php");


class techsupport extends  condb{        
  

public function sql(){
	
	?>


<div id="loader">

<div class="logo"><img src="img/Engineering_icons-11-512.png" class="loading-logo"/></div>
<!--<div id="loading">loading...</div>
<div id="dev1"><span class="enime"></span></div>
<div id="dev2">  </div>
<div id="dev3"> </div> -->
  </div>
  
  <div id='content' style="display:none;">
  
  <div class="Brand"><img src="img/logo.png" class="logo2"/></div>
  
 <button type="button" onclick="goback()" class="back"> < Back  </button>  
 <button type="button" onclick="gonext()" class="back"> Next > </button> 
  <button onClick="window.location.reload();">↻Refresh Page</button>  
  
<hr />
  
<?php  

@$REP_INV=$_POST['REP_INV'];

$ID=$_POST['REP_ID'];

$select="select * from users where ID = $ID  ";

$query=$this->connectF()->query($select);	


while($row= mysqli_fetch_object($query)){

?>

<form action="?page"   method="post">
<input  type="hidden"   name="REP_ID"   value="  <?php  echo  $row->ID?> "   style="background-color:#FFF;width:40px; border:none;"   />
Hi &nbsp <?php  echo  $row->username?> &nbsp <?php  echo  $row->lastname?>  &nbsp  insert your problem if you have
<input  type="hidden"   name="username"   value=" <?php  echo  $row->username?> "   style="background-color:#FFF;width:100px; border:none;"   />
<input  type="hidden"   name="lastname"   value=" <?php  echo  $row->lastname?> "   style="background-color:#FFF;width:40px; border:none;"   />
<br />
<br />      
<textarea  name="massage"   cols="80"  rows="20" ></textarea>
<input type="submit"  name="OK" />
</form>

<?php
}
?>

<?php

#$REP_INV=$_POST['REP_INV'];

#$ID=$_POST['REP_ID'];

@$lastname=$_POST['lastname'];


@$qwery="select * from tecsupport ";

$s_mssg=$this->connectF()->query($qwery);	


while($rows= mysqli_fetch_object($s_mssg)){

?>

<span style="background:none;  width:200px; height:50px;"><?php  echo $rows->username?><?php  echo $rows->lastname?></span>

<br/>
<span style="background:#9F9; width:200px; height:50px;"><?php  echo $rows->massage?></span>
<br/>
<?php

}

?>
<?php

@$USERNAME=$_POST['username'];
@$massage=$_POST['massage'];
@$lastname=$_POST['lastname'];

$ins="insert into tecsupport (username,lastname,massage) VALUES  ('$USERNAME','$lastname','$massage')";

if(@$_POST['OK']){

#echo "<meta  http-equiv='refresh'   content='3;url=techsupport.php' />";

$this->connectF()->query($ins);	

}
?>

</div>

	<?php	
}
}
$use= new techsupport();
$use->connectF();
$use->sql();
?>


<script>
$('table tr:odd').css('background-color','#ccc');
</script>

<script>
$(document).ready(function(){
    $("#loader").delay(1200).fadeOut("fast");
	$("#content").delay(1200).fadeIn("fast");   
    });
</script>

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
</body>
</html>
