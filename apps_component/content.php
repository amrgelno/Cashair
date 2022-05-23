<div class="logo"><img src="img/SIRCONSULTLOGO.png" class="logosize" "></div>
 </div> 

 </div>  
<div class="div1">

<div class="img"> <img src='img/ticketcheck.png' width="99px">      </div>

<div class="jobtitle"> اعادة ارسال رابط الوصول لتذكرة سابقة
    يمكنك متابعة جميع التذاكر الحالية والسابقة التي قمت بها سابقاً, من خلال الرابط المرسل إلى بريدك الالكتروني    
  
   <br/> <br/>
   
   
 <?PHP
include('con_db.php');

@$Email=$_POST['Email'];
 @$password=$_POST['password'];

$select_member="select *  from   member  where  Email='$Email' and  password='$password'";  #login -> select data  / subscribe 	
 
$query_member=mysqli_query($connect,$select_member );

if(!$row=mysqli_fetch_array($query_member)){
?>
 <button style="background:#09C; color:white;" class="bt1log">  سجل دخولك الان   </button>     

<?php
}else{
?>

 <button style="background:#09C; color:white;" class="bt1logg">  فتح تذكرة جديدة   </button>     


<?php
}
?>
    
     </a></div></div>
<div class="div1"> 


<div class="img"> <img src='img/ticketadd.png' width="99px">      </div>

<div class="jobtitle"> طلب دعم فني أو انشاء تذكرة
    الرجاء تزويدنا بجميع المعلومات التي تسهل عمل فريق الدعم الفني من أجل ايجاد الحل ومساعدتك بأسرع وقت ممكن 
    
    <br/><br/>
    <?PHP
include('con_db.php');

@$Email=$_POST['Email'];
 @$password=$_POST['password'];

$select_member="select *  from   member  where  Email='$Email' and  password='$password' or  ID='$UID'";  #login -> select data  / subscribe 	

$update_chat="UPDATE `member` SET `chat`='online' WHERE  Email='$Email' and  password='$password' or  ID='$UID'";
 
$query_member=mysqli_query($connect,$select_member );

$query_chat=mysqli_query($connect,$update_chat );

if(!$row=mysqli_fetch_array($query_member)){
?>
 <button style="background:#09C; color:white;" class="bt1log">  سجل دخولك الان   </button>     

<?php
}else{
?>

 <button style="background:#09C; color:white;" class="checkticket">  تفحص حالة تذكرة    </button>     


<?php
}
?>      
    </div></div>
<div class="clear">   </div>

<br>
<br>
<br>
<br>
<br>
<br>