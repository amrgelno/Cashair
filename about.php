<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<body>
<script src="js/jquery-1.11.0.min.js"></script>
<meta name="viewport" content="width = device-width,">
<link href="css/xs.css" rel="stylesheet" type="text/css"/>
<link href="css/sm.css" rel="stylesheet" type="text/css"/>
<link href="css/lg.css" rel="stylesheet" type="text/css" />
<link href="css/md.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
</body>

<?php

include("connect.php");


class about extends  condb{        
  

public function sql(){



$sele="select  * from  company where ID =(select max(id) from  company) ";


$query=$this->connectF()->query($sele);	


while ($row=mysqli_fetch_object($query)){
	?>
	<div class="IMG">
    <img src="img/<?php echo $row->path_pic?>" class="Image"/>
    </div>
    <font size="+2">المؤسسة    </font><div class="comp"><?php echo $row->comp_Na?>  </div>
    <font size="+2">مجال العمل   </font><div class="comp"><?php echo $row->Business?> </div>
    <font size="+2">السجل الضريبي  </font><div class="comp"><?php echo $row->Tax_register?></div>
    <font size="+2">رقم التليفون</font><div class="comp"><?php echo $row->Tele_Number?></div>
    <font size="+2">الفاكس</font><div class="comp"><?php echo $row->fax?></div>
    <font size="+2">البلد</font><div class="comp"><?php echo $row->country?></div>
   <font size="+2">المدينة </font><div class="comp"><?php echo $row->City?></div>
    <font size="+2">الشارع</font><div class="comp"><?php echo $row->street?></div>
    <font size="+2">بداية السنة المالية </font><div class="comp"><?php echo $row->first?></div>
    <font size="+2">نهاية السنة المالية</font><div class="comp"><?php echo $row->last?></div>    
	<?php	
}
}
}
$use= new about();
$use->connectF();
$use->sql();
?>
?>
<div class="img">  </div>
</body>
</html>
