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
<title>seles_Rep</title>
</head>
<body>

<div id="loader">
<div class="logo"><img src="img/logo.png" class="loading-logo"/></div>
<div id="loading">loading...</div>
<div id="dev1"><span class="enime"></span></div>
<div id="dev2">  </div>
<div id="dev3"> </div> 
  </div>
<button class="btt1"><a href="#nav">≡</a></button><br />




<ul id="nav">
<li><img src="img/create_invoice.png" width="20" height="20" /><input type="hidden"  name="INV_ID" value=" فاتورة مبيعات"/> 
<input type="hidden"  name="REP_INV" value="<?php echo $column['username']?>"/>
<input type="submit"  value="أنشاء فاتورة"  name="INVBT" style="border:none; background:none;"/></div></div>
</form></li>
<Li><a href="selinv.php"><img src="img/Invoice-Icon.png" width="20" height="20" />   الفواتير الجارية </a></Li>
<li><a href="    "><img src="img/Engineering_icons-11-512.png" width="20" height="20" /> الدعم الفني </a></li>
<li> <a href="Stock.php"><img src="img/images.png" width="20" height="20" />  المخزون  </a></li>
<li><a href="invoiecequery.php"><img src="img/Invoice-Icon.png" width="20" height="20" />   تقارير الفواتير  </a></li>
<li> <a href="form.php"><img src="img/falt.png" width="20" height="20" />لوحة تحكم الادمن     </a></li>

<li><form action="logout.php"    method="post"   >
<input type="submit" value="Logout"  name="submit"  />
     </form>
     </li>
</ul>

<script>
$(document).ready(function(){
$('button').click(function(){
$('#nav').fadeToggle()
$('#nav').animate({left:"30px"},1550);	   	   
});	    
});
</script>
<script>
$(document).ready(function(){
    $("#loader").delay(15000).fadeOut("slow");   
    });
</script>
<div class="Brand"><img src="img/logo.png" class="logo2"/></div>
<hr />
<div class="first1"><span class="img"><img src="img/Engineering_icons-11-512.png" class="ICON" /></span>
<div class="title"><form action="techsupport.php"  method="post">
<input type="hidden"  name="REP_ID"        value="<?php echo $column['ID']?>"/>
<input type="hidden"  name="REP_INV"       value="<?php echo $column['username']?>"/>
<input type="submit"  value=" الدعم الفني"   name="submit"      style="border:none; background:none;"/>
</form>
</div></div></div></div>
<div class="first1"><span class="img"><img src="img/stock.png" class="ICON" /></span>
<div class="title"><a href="Stock.php">المخزون</a></div></div>
<div class="first1"><span class="img"><img src ="img/invoice.png" class="ICON" /></span>
<div class="title"><a href="selinv.php">الفواتير المبيعات اجلة</a></div></div>
<div class="first1"><span class="img"><img src ="img/Invoice-Icon.png" class="ICON" /></span>
<div class="title"><a href="purchase.php">فواتير مشتريات اجلة</a></div></div>
<div class="first1"><span class="img"><img src="img/create_invoice.png" class="ICON" /></span>
<div class="title">
<form action="seles.php"  method="post">
<input type="hidden"  name="INV_ID" value=" فاتورة مبيعات"/> 
<input type="hidden"  name="REP_INV" value="<?php echo $column['username']?>"/>
<input type="submit"  value="أنشاء فاتورة"  name="INVBT" style="border:none; background:none;" /></form></div></div>

<div class="first1"><span class="img"><img src="img/create_invoice.png" class="ICON" /></span>
<div class="title"><form action="purorder.php"  method="post">
<input type="hidden"  name="INV_ID" value=" فاتورة مشتريات"/> 
<input type="hidden"  name="REP_INV" value="<?php echo $column['username']?>"/>
<input type="submit"  value="انشاء فاتورة مشتريات"  name="pur" style="border:none; background:none;"/></div></div>
</form></div></div>
<div class="first1"><span class="img"><img src="img/falt.png" class="ICON" /></span>
<div class="title">لوحة تحكم الادمن </div></div>
<div class="first1"><span class="img"><img src="img/Invoice_report.png" class="ICON" /></span>
<div class="title"> تقارير المبيعات </div></div>
<div class="first1"><span class="img"><img src="img/client_report.png" class="ICON" /></span>
<div class="title"><a href="cusreport.php">  تقارير العملاء </a></div></div>
<div class="first1"><span class="img"><img src="img/vendors_Report3.png" class="ICON" /></span>
<div class="title"><a href="vreport.php">  تقارير الموردين </a></div></div>
<div class="first1"><span class="img"><img src="img/Invoice_report.png" class="ICON" /></span>
<div class="title">تقارير المشتريات</div></div>
<div class="first1"><span class="img"><img src="img/cashair.png" class="ICON" /></span>
<div class="title"><a href="cashair.php">تقارير النقدية</a></div></div>
<hr />
<span class="copyright">Powerd by tiktuk </span> 
</div>
</body>

</html>
