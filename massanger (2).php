<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>


</head>

<body>

<?php

include("con_db2.php");

$sender_id=$_POST['sender_id'];   /*purchaser_id--->sender*/

$recevier_id='2'; /*seller_id-->seller* Admin/


$selector="select  *  from  mssg where  recevier_id ='techsupportid'  And  sender_id ='memberid-login' or   recevier_id ='memberid'  And  sender_id='techsupportid-login'     ";




$fetch_dta=mysqli_query($connect,$selector);


while($row=mysqli_fetch_array($fetch_dta)){

?>
<div  style="direction:<?PHP echo $row["DIR"]?>;">

<div class="member_img" style="background-image:url(IMG/<?PHP echo $row["IMG_sender"] ?>);">


</div>

<div class='text' style="background-color:<?PHP echo $row["bg_color"] ?>;  ">

username:-
<?php echo $row["username"]?>-->
<br />
Time:-
<?php echo $row["Time"]?> 
<!--
<p> public info </p>
الايميل:-
<?php /*echo #$row["Email"]*/?> &nbsp &nbsp
المعروض المختار:-
<?php /*echo #$row["product"]*/?>  &nbsp  &nbsp
<?Php echo '<br/>' ?>
البلد	
<?php /*echo #$row["country"]*/?> &nbsp  &nbsp
الموبيل:-
<?php /*echo #$row["mobile"]*/?> &nbsp  &nbsp
:-المنطقة
<?php /*echo #$row["distantion"]*/?> 
<?Php echo '<br/>' ?>
-->
<br />

massage:-
<?php echo $row["massage"]?>  
</div>
</div>
<?php
}
?>



<?php

include("con_db2.php");

$sender_id=$_POST['sender_id'];   /*purchaser_id--->sender*/

$recevier_id=$_POST['recevier_id']; /*seller_id-->seller*/


$selector="select

 member.facebook, member.instgram , member.olx ,member.prof_pic,member.mobile, member.UserName ,member.country ,
 
 member.distantion, member.Email , member.ID ,  member.user_type , orders.product ,orders.recevier_id , orders.sender_id   
       
 from  member left join 

 orders ON  orders.recevier_id = member.ID  where   orders.recevier_id='$recevier_id'   And  sender_id='$sender_id' ";


$fetch_dta=mysqli_query($connect,$selector);

if($row=mysqli_fetch_array($fetch_dta)){

?>

<form action="replay.php"  method="POST">

<!--purchaser-->
<input type="hidden"   value="<?php echo $row["sender_id"]?>"  id='sender_id<?php #echo $row['ID']?>'  name="sender_id" />  
<!--seller (recevier_id)-->
<input type="hidden"   value="<?php echo $row["recevier_id"]?>" id='recevier_id<?php #echo $row['ID']?>'   name="recevier_id" />  

<input type="hidden"   value="<?php echo $row["UserName"] ?>"  id='IMG_sender<?php #echo $row['ID']?>'    name="UserName" /> 

<input type="hidden"   value="<?php echo $row["mobile"] ?>"  id='Email<?php #echo $row['ID']?>'   name="mobile" /> 


<input type="hidden"   value="<?php echo $row["product"] ?>"  id='Email<?php #echo $row['ID']?>'   name="product" /> 


<input type="hidden"   value="<?php echo $row["Email"] ?>"  id='Email<?php #echo $row['ID']?>'   name="Email" /> 
   
<input type="hidden"   value="<?php echo $row["distantion"] ?>" id='distantion<?php #echo $row['ID']?>'   name="distantion" /> 

<input type="hidden"   value="<?php echo $row["country"] ?>" id='country<?php #echo $row['ID']?>'   name="country" /> 

<input type="hidden"   value="<?php echo $row["prof_pic"] ?>"  id='IMG_sender<?php #echo $row['ID']?>'    name="IMG_sender" /> 

<input type="hidden"   value="<?php echo $row["user_type"] ?>"  id='IMG_sender<?php #echo $row['ID']?>'    name="user_type" /> 


<textarea   name="massage" cols="50" rows="4"> </textarea>


 <!--seller-->
<input type="submit"   value="أرسل"  onclick='sent<?php echo $row['ID']?>();'   id='send'  name="send"  style="background:#06C; border-radius:100px; color:black; "/>
<form>




<?php
}
?>

 <!--seller-->











