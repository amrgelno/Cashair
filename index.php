<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width = device-width,">
<link rel="shortcut icon" type="image/ico" href="logo.png"/>
<meta name="discription" content="lont-Group luxor-Branch">
<meta name="keyword" content="lont-Group luxor-Branch">
<meta name="author" content="amr">
<link href="css/xs.css" rel="stylesheet" type="text/css"/>
<link href="css/sm.css" rel="stylesheet" type="text/css"/>
<link href="css/lg.css" rel="stylesheet" type="text/css" />
<link href="css/md.css" rel="stylesheet" type="text/css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv=Content-Type content="text/html; charset=windows-1256">
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<script src="js/jquery-1.11.2.min.js"></script>
<title>Sir Consult support Ticket System </title>
</head>
<body>
<div class="header">
 <div class="input"> 
<DIV ID="MENUAFTER"> </DIV>
<div id="menuico"> </div> 
<DIV ID="MENUBEFORE"> </DIV>
<script>    
$(document).ready(function(e) {
$("#menuico").click (function(){
	$("#MENUBEFORE").css({top:"8px"});
	$("#MENUBEFORE").css({transform:"rotate(45deg)"});
	$("#menuico").css({transform:"rotate(-45deg)"});
	$("#MENUAFTER").css({display:"none"});
	$(".nav").fadeIn();
	    		
});	
});
</script>
<script>    
$(document).ready(function(e) {
$("#MENUBEFORE").click (function(){
	$("#MENUBEFORE").css({top:"-1px"});
	$("#MENUBEFORE").css({transform:"rotate(0deg)"});
	$("#menuico").css({transform:"rotate(0deg)"});
	$("#MENUAFTER").css({display:"block"});
    $(".nav").fadeOut();	    		
});	
});
</script>
<SCRIPT>
$(document).ready(function(e) {
	$(window).scroll(function(){
   $(".title").delay(900).animate({left:"35px"});	     
    });
	});
	</script>
    <SCRIPT>
$(document).ready(function(e) {
   $(".loadingbg").delay(6100).fadeOut();	     
    });	
	</script>
    <script>    
$(document).ready(function(e) {
$(".bt1menu").click (function(){
    $(".contant").slideDown();
	$(".bt1menu").fadeOut();	    		
});	
});
</script>

 <script>    
$(document).ready(function(e) {
$(".bt1log").click (function(){
    $(".logtitle,.email,.password,.login,.log,.x").fadeIn();
	$(".logtitle2,.mobile,.company").fadeOut();
	$(".login").val('سجل دخولك الان');
	
	    		
});	
});
</script>


<script>    
$(document).ready(function(e) {
$(".btreg").click (function(){
    $(".logtitle2,.mobile,.company,.email,.password,.login,.log,.x").fadeIn();
	$(".login").val('أشترك الان');
	$(".logtitle").fadeOut();	    		
});	
});
</script>


 <script>    
$(document).ready(function(e) {
$(".x").click (function(){
    $(".logtitle,.email,.password,.login,.log,.x").fadeOut();	    		
});	
});
</script>

      </div>
<ul class="nav">
<Li ><a href= 'index.php'> الصفحة الرئيسية لمركز الدعم  </a> </Li>
<Li> من نحن  </Li>
<Li> سياسيات استخدام   </Li>
 <Li class="bt1log">  تسجيل الدخول </Li>
<!--<Li class="active">   وظائف حسب التخصصات 
<ul class="submenu"> 
  <Li> IT - Software Development     </Li>
   <Li> Accounting & Audit   </Li>
    <Li> Sales & Retail    </Li>
    <Li> Electrical Engineering    </Li>
    <Li> Marketing & Business Development     </Li>
    <Li> Mechanical Engineering     </Li>
    <Li> Customer Service & Call Center    </Li>
    <Li> Education & Training    </Li>
    <Li> Administration & Secretarial    </Li>
    <Li>IT - Network </Li>
    <Li>Construction </Li>
    </ul>
</Li>
</ul>!-->
</div>  
 </div>
 
 
 
<div class="log">

<font size="+2">
 <div class="logtitle"> سجل دخولك الان للاتصال بالدعم الفني  </div> 
  <div class="logtitle2"> سجل الان بخدمة الدعم الفني  لشركه سير كونسلت  </div> 
</font>
<br /><br />
<form action="techsys.php"  method="post">

<button class="x">X</button>


<input type="text" placeholder="أسم العميل أو الشركة " width="500"   class='company'   name="company"  />


<input type="text"   placeholder="موبيل"  width="500"   class='mobile '   name="Mobile"  />


<input type="email" placeholder="الايميل" width="500"   class='email '   name="Email" required />


<input type="PASSWORD" placeholder="كلمة السر"  width="500" class='password'  name="password" required />

<br/> <br/>

<input type="submit" name="submit"  class='login'   />

</form>

<br/> <br/>
<span class="copyright"  >  

ان لم تكن مشتركا يمكنك التسجيل من
<br/>
<span class="btreg">   هنا    </span>

 </span>
</div>
 

<div class="coverimg"><img src="img/pexels-photo-3184357.jpeg" class="imgcover" alt=""/>

<div class="searchBar">
شركة سير كونسلت لتكنولوجيا المعلومات والأستشارات المالية 
عميلنا العزيز
يسعدنا تلقى تذكرة الدعم الفني منكم آملين في تلبية طلبكم بأقصى سرعة ممكنة
 </div> 

 </div> 
 <!--<div  class="headline"><h1>&nbsp;حدد </h1></div> <br /><br /><br />!-->
 
<div class="div1"><div class="jobtitle"> اعادة ارسال رابط الوصول لتذكرة سابقة
    يمكنك متابعة جميع التذاكر الحالية والسابقة التي قمت بها سابقاً, من خلال الرابط المرسل إلى بريدك الالكتروني    
  
   <br/> <br/>
 <button style="background:#09C; color:white;" class="bt1log">  سجل دخولك الان       </button>  
    
     </a></div></div>
<div class="div1"> <div class="jobtitle"> طلب دعم فني أو انشاء تذكرة
    الرجاء تزويدنا بجميع المعلومات التي تسهل عمل فريق الدعم الفني من أجل ايجاد الحل ومساعدتك بأسرع وقت ممكن 
    
    <br/><br/>
<button style="background:#09C; color:white;" class="bt1log">  سجل دخولك الان   </button>     
      
    </div></div>
<div class="clear">   </div>




<br>
<br>
<br>
<br>
<br>
<br>
<div class="footer"><div class="copyright"> All right reserved -<br/>
sir consult سير كونسلت copyright 2021 
</div>



<SCRIPT>
$(document).ready(function(e) {
	$(window).scroll(function(){
   $("#cat").delay(900).animate({left:"30px"});	 
     $(".navbar").css({position:'fixed', background:'#fff', color:'white'});	 
    })
	});
	</script>
    
<!--<div class="socialmedia">  
<div class="facebook">   F                    </div>
<div  class="twitter">   t                     </div>
<div   class="insta">    IN                      </div>!-->
                               </div>
                               
</body>

<?PHP

include('con_db.php');

 $company=$_POST['company'];
 $Mobile=$_POST['Mobile'];
 $Email=$_POST['Email'];
 $password=$_POST['password'];


if($_POST['submit'] ){

?>
<script> document.alert('client_dashboard');</script>
<?php

}

else{

?>
<script> document.alert('client_dashboard');</script>


<?php


}

?>
</html>
