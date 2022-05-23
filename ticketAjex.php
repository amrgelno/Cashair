
<?PHP
include('con_db.php');
  @$issue_Title=$_POST['issue_Title'];
 @$issue=$_POST['ISSUE'];
 @$MID=$_POST['MID'];
  
  $ins_ticket="insert into ticket (issue,issue_Title,UID,status,Date) VALUES ('$issue','$issue_Title' ,'$MID','في الانتظار',now())";
  
   mysqli_query($connect,$ins_ticket);
   
   	 echo  "تم أنشاء تذكرة بنجاح";
	 
	  #echo'<meta http-equiv="refresh"  content="2;url=?page"/>';


 ?>
 
 <button class="x">X</button>
 
 <?php

 ?>