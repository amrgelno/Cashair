<!doctype html>
<html>
<head>
<?php
require_once('apps_component/headtag.php');
?>
</head>
<body >



<div class="apps">

<?php  include('apps_component/header.php'); ?>

<?php  include('apps_component/content.php'); ?>


<?php  include('apps_component/footer.php'); ?>

</div>



                              
</body>




<?PHP  

/*include('con_db.php');

 @$company=$_POST['company'];
 @$filter_Mobile=$_POST['Mobile'];
 @$Mobile=filter_var($filter_Mobile,FILTER_SANITIZE_NUMBER_INT);
 @$filter_Email=$_POST['Email']; 
 @$Email=filter_var($filter_Email,FILTER_SANITIZE_EMAIL);
 @$password=$_POST['password'];
 
 
 $ins_query="insert into member (Mobile,Company,Email,password)value('$Mobile','$company','$Email','$password')";  #subscribe -> insert data
 
 $select_member="select *  from   member  where  Email='$Email' and  password='$password' or  ID='$UID'";  #login -> select data  / subscribe 	
 
 $query_member=mysqli_query($connect,$select_member );

if(empty($company)& empty($Mobile)){ #empty($company)& empty($Mobile)/$company==false&$Mobile==false /$company==""&$Mobile==""       			   #login
if($row=mysqli_fetch_array($query_member)){

?>
<script> alert('أهلا وسهلا <?php echo $row['Company'] ?>  بخدمة الدعم الفني ');</script>  <!-- client dashboard -->

<?php

}else{

@$OFFLINE='OFFLINE';
@$UID=$_GET['UID'];

if(@$_GET['UID']){

$update_chat="UPDATE `member` SET `chat`='$OFFLINE' WHERE  Email='$Email' and  password='$password' or  ID='$UID'";
 
$query_member=mysqli_query($connect,$select_member );

$query_chat=mysqli_query($connect,$update_chat );

?>

<script> alert(' <?php echo $row['Company'] ?>  مع سلامة الله نتمني لكم زيارة موفقة ');</script>

<?php
}else{




?>
<script> alert('عزيزي زائر انت ليس مشترك بالخدمة رجاء أشتراك بالخدمة');</script>  <!-- client dashboard -->

<?php




}


	
}

	
}

else{
	     #subscribe
if($row=mysqli_fetch_array($query_member)){
	
?>
<script> alert('تم تسجيل بياناتك من قبل');</script>  <!-- subscribe fault dashboard -->

<?php	
}
else{
		 mysqli_query($connect,$ins_query);    # subscribe success dashboard 
 ?>  
<script> alert('اهلابك في خدمة الدعم الفني تم اشتراك بالخدمة بنجاح ');</script> 
}
<?php
	
	
}

}
*/
?>


  <div id='output'>    </div>
</html>


 
 <?PHP  

include('con_db.php');

 @$Email=$_POST['Email']; 
 @$password=$_POST['password'];
  @$UID=$_POST['UID'];
 
 $select_member="select *  from   member  where  Email='$Email' and  password='$password' or  ID='$UID'";  
 
 $query_member=mysqli_query($connect,$select_member);

if($row=mysqli_fetch_array($query_member)){

?>
<script> alert('أهلا وسهلا <?php echo $row['Company'] ?>  بخدمة الدعم الفني ');</script>  <!-- client dashboard -->
<?php

}else if(@$_GET['UID']){

@$OFFLINE='OFFLINE';
@$UID=$_GET['UID'];


$update_chat="UPDATE `member` SET `chat`='$OFFLINE' WHERE  Email='$Email' and  password='$password' or  ID='$UID'";
 
$query_member=mysqli_query($connect,$select_member );

$query_chat=mysqli_query($connect,$update_chat );


}elseif(empty($Email)or empty($password) or empty($UID) ){

?>
<script> alert('أهلا بك عزيزي زائر  شركة تك تاك ترحب بكم');</script>  <!-- client dashboard -->
<?php

}else{
		
?>
<script> alert('بأسورد خطأ رجاء التأكد من الباسورد');</script>  <!-- client dashboard -->
<?php
		
}

?>

 
 
 
 <?PHP
include('con_db.php');
 @$issue_Title=$_POST['issue_Title'];
 @$Image_type=$_FILES['upload']['type'];
 @$dir=dirname(__FILES__)."/img/";
 @$path=($_FILES['upload']['tmp_name']);
 @$Image_name=$_FILES['upload']['name'];
 @$UID=$_POST['UID'];
 	  
$up_Img="UPDATE ticket SET  img='$Image_name'  WHERE  ID =(SELECT MAX(id) FROM `ticket` where UID='$UID')";
 
 
    if(!empty($Image_name)){
    if($Image_type=='image/jpeg' or  $Image_type=='image/png' or $Image_type=='image/jpg'  )  {
  
  move_uploaded_file($path,$dir.$Image_name);
  
  mysqli_query($connect,$up_Img);
 
  echo"<script>  تم تحميل الصورة بنجاح  </script>  ";
 
 #echo'<meta http-equiv="refresh"  content="2;url=?page"/>';
	}
	
	else{
		
		
	 echo"<script>  هذا ملف غير مدعوم رجاء تحميل صورة بصيغة png jpg  </script>  ";	
		
	}
	}
	
 ?>
 


 
 