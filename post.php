<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Untitled Document</title>
</head>
<body>
<?php 
 include("con_db.php");
$username=$_POST['username'];
$e_mail=$_POST['email'];
$password=$_POST['password'];
$Mobile=$_POST['Mobile'];
$user_TYPE=$_POST['user_TYPE'];
$select= "select * from  users  where Name='$username' or  email='$e_mail'  ";
$insert="INSERT INTO users (Name,Email,password,Mobile,user_TYPE,Date) vaLues ('$username','$e_mail','$password','$Mobile','$user_TYPE',now())";
$query=mysqli_query($connect,$select); 
if ($_POST['submit']){
	if($column=mysqli_fetch_array($query)){
echo"your Data already  on data base";
echo"<meta http-equiv='refresh'   content='3;url=form.php' />";
}
else{
mysqli_query($connect,$insert);	
echo"your Data sent to data base";
echo"<meta http-equiv='refresh'   content='3;url=form.php' />";
		
}
}
?>   








</div>
</body>
</html>