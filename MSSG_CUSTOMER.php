<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<!--<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>-->
 <script src="https://cdn.tiny.cloud/1/g8bgedmglhrimff8ig81gq3oky4gk421axj5pu0g840jz820/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
 <script>
    tinymce.init({
      selector: 'textarea',
      plugins: 'a11ychecker advcode casechange export formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker',
      toolbar: 'a11ycheck addcomment showcomments casechange checklist code export formatpainter pageembed permanentpen table',
      toolbar_mode: 'floating',
      tinycomments_mode: 'embedded',
      tinycomments_author: 'Author name',
    });
  </script>
<!--<script>tinymce.init({selector:'textarea' });</script>-->
<link href="Mssg_css/xs.css" rel="stylesheet" type="text/css"/>
<link href="Mssg_css/sm.css" rel="stylesheet" type="text/css"/>
<link href="Mssg_css/lg.css" rel="stylesheet" type="text/css" />
<link href="Mssg_css/md.css" rel="stylesheet" type="text/css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Customer_Massanger</title>

</head>

<body>

<?php

include('con_db.php');

$UID =$_POST['UID'];    # user_id login
$MID =$_POST['MID'];    # client-member-recevier_id 


$select_member="select *  from  users where ID=$UID";


$querymember=mysqli_query($connect,$select_member);

while($row=mysqli_fetch_array($querymember)){

?>

<h1 style="background-color:#0CF; text-align:center;">  

أهلا وسهلا   بك في خدمة رسائل الفورية 

  لمراسلة الدعم الفني يمكنك أرسال رسالة نصية من هنا</h1>



<form action="?page" method='post'>

<input type='hidden'  name='MID' value='<?php echo $MID ?>'  />  <!-- recevier_ID -->

<input type='hidden'  name='UID' value='<?php echo $UID ?>'  />   <!-- SENDER_ID --> 
<textarea type="text"   name="Mssg"  placeholder="insert new topic here"   style="color:#000;" cols="50" rows="10" >
</textarea>  
<br/><br/>
<button type='submit'  style= "border: 9px solid #ffffff;
    padding: 1px 0px 10px 0px;
    background: #ff6300;
    width: 92px;
    color: white;
    border-raduis: 20px;
    border-radius: 19% 32% 52% 29%;
    text-align: center;">  أرسال رسالة <img src='img/Mssgicon copy.png' width='15px' height='25px'/> </button>
</form>






<?php
$customer_service=$row['Name'];  #users Name
$Email=$row['Email'];  #fixed_value - org Email
$recevier_id=$_POST['MID'];  # member_ID
@$Mssg=$_POST['Mssg'];
$sender_id='2';


$sql_insert="INSERT INTO `mssg`
    (`Name`, `Email`, `type`, `Mssg`, `sender_id`, `recevier_id`,`img`, `bg_color`, `direction`,`Data`)      
	 VALUES ('$customer_service','$Email','Customerservice','$Mssg','$sender_id','$recevier_id','customer_img.png','#0FF','rtl',now())";
	 
	 $massage="select * from `mssg`  where  `Mssg`='$Mssg' ";

$select_mssg=mysqli_query($connect,$massage);
	 
	
if(!empty ($Mssg) ){
	
	if($row=mysqli_fetch_array($select_mssg)){
	

?>
<script> alert ('تم أرسال رسالة من قبل');     </script>
<?php		
		
		
		
	}else{
		
		
	mysqli_query($connect,$sql_insert);

?>
<script> alert ('تم أرسال رسالة بنجاح');     </script>
<?php	
		
		
		
		
	}



?>
<!--<Meta http-equiv="refresh"   content="3,MSSG_CLIENT.PHP" ? />-->

<?php

}

?>
<br/>
<?php

include("con_db.php");

#$sender_id=$_POST['sender_id'];   /*purchaser_id - sender*/

$sender_id='2';  

$recevier_id=$_POST['MID'];   # client-member-recevier_id 
#$recevier_id=$_POST['recevier_id'];

$selector="select  *  from  mssg  where  recevier_id ='$recevier_id'  And  sender_id ='$sender_id' or   recevier_id ='$sender_id'  And  sender_id='$recevier_id'     ";


$fetch_dta=mysqli_query($connect,$selector);


while($row=mysqli_fetch_array($fetch_dta)){

?>
<!--<div  dir="<?PHP echo $row["direction"]?>" >-->

<div>

<div  class="member_img" style="background-image:url(img/<?PHP echo $row["img"] ?>);  background-size:cover;">

</div>

<div class='text'  style="background-color:<?PHP echo $row["bg_color"] ?>; color:white;  ">

<SPAN STYLE='background-color:#06F; border:-5px solid #000;'><?php echo $row["Name"]?>:-</SPAN><br/>
<?php echo $row["Mssg"]?>  
</div>
<br/>
</div>
<?php
}
}
?>

