<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script src="js/jquery-1.11.0.min.js"></script>
<meta name="viewport" content="width = device-width,">
<link href="Admin_css/xs.css" rel="stylesheet" type="text/css"/>
<link href="Admin_css/sm.css" rel="stylesheet" type="text/css"/>
<link href="Admin_css/lg.css" rel="stylesheet" type="text/css" />
<link href="Admin_css/md.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="js/function.js"></script>
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<title>sir_consult  technical support system</title>
</head>
<body>
<!--<div id="loader">
<div class="logo"><img src="img/logo.png" class="loading-logo"/></div>
<div id="loading">loading...</div>
<div id="dev1"><span class="enime"></span></div>
<div id="dev2">  </div>
<div id="dev3"> </div> 
  </div> -->
<button class="btt1"><a href="#nav">≡</a></button>
  
<ul id="nav">
<li>
<form action="seles.php"  method="post" target="_tab">
<img src="img/create_invoice.png" width="20" height="20" />
<input type="hidden"  name="INV_ID" value=" فاتورة مبيعات"/> 
<input type="hidden"  name="REP_INV" value="<?php echo $column['username']?>"/>
<input type="submit"  value="أنشاء فاتورة"  name="INVBT" style="border:none; background:none;"/></div></div>
</form></li>
<Li><a href="selinv.php" target="_tab"><img src="img/Invoice-Icon.png" width="20" height="20"  />   الفواتير الجارية </a></Li>
<li><img src="img/Engineering_icons-11-512.png" width="20" height="20" /> <form action="techsupport.php"  method="post" target="_tab">
<input type="hidden"  name="REP_ID"        value="<?php echo $column['ID']?>"/>
<input type="hidden"  name="REP_INV"       value="<?php echo $column['username']?>"/>
<input type="submit"  value=" الدعم الفني"   name="submit"      style="border:none; background:none;"/>
</form></li>
<li> <a href="Stock.php" target="_tab"><img src="img/images.png" width="20" height="20" />  المخزون  </a></li>
<li><a href="invoiecequery.php" target="_tab"><img src="img/Invoice-Icon.png" width="20" height="20" />   تقارير الفواتير  </a></li>
<li> <a href="form.php" target="_tab"><img src="img/falt.png" width="20" height="20" />لوحة تحكم الادمن     </a></li>

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
<div class="Brand"><img src="img/SIRCONSULTLOGO.png" class="logo2"/></div>
<hr />
<!--<div class="first1"><span class="img"><img src="img/Engineering_icons-11-512.png" class="ICON" /></span>
<div class="title"><form action="techsupport.php"  method="post" target="_tab">
<input type="hidden"  name="REP_ID"        value="<?php echo $column['ID']?>"/>
<input type="hidden"  name="REP_INV"       value="<?php echo $column['username']?>"/>
<input type="submit"  value=" الدعم الفني"   name="submit"      style="border:none; background:none;"/>
</form>
</div></div></div></div>-->
<div class="first1"><span class="img"><img src="img/Ticket.png" class="ICON" /></span>
<div class="title"><a href="ticketQuery.php" target="_tab">تذاكرة الفترة</a></div></div>
<div class="first1"><span class="img" ><img src ="img/client.png" class="ICON" /></span>
<div class="title"><a href="customer.php" target="_tab">عملاء سير كونسلت</a></div></div>
<div class="first1"><span class="img"><img src ="img/customer_service.jpg" class="ICON" /></span>
<div class="title"><a href="form.php" target="_tab">فريق الدعم</a></div></div>
<div class="first1"><span class="img"><img src ="img/massage.png" class="ICON" /></span>
<div class="title">
<!--<a href="form.php" target="_tab">رسائل الدعم</a>-->
<form action="massanger.php"  method="post" target="_tab">
<input type="hidden"  name="UID" value="<?php echo $column['ID']?>"/> <!-- USER ID SENDR posting -->
<input type="submit"  value="رسائل الدعم"  style="border:none; background:none;"/>
</form>
</div></div>
<hr />
<span class="copyright"> Powerd by sir consult </span> 
</div>
</body>
</html>
