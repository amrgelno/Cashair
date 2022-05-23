<?PHP
include('con_db.php');

 @$company=$_POST['company'];
 @$Mobile=$_POST['Mobile'];
# @$Email=$_POST['Email'];
 @$password=$_POST['password']; 
 @$filter_Mobile=$_POST['Mobile'];
 @$Mobile=filter_var($filter_Mobile,FILTER_SANITIZE_NUMBER_INT);
 @$UID=$_POST['UID'];
  
 $update_member="UPDATE member SET Company ='$company', Mobile='$Mobile', password ='$password'
  WHERE ID ='$UID';";
 
  mysqli_query($connect,$update_member);   

  echo  "تم تعديل بياناتك بنجاح";
  echo  " <meta http-equiv='refresh'   content='3,techsys.php' />";	 
  
 ?>
 
 
