 <?php
include("con_db2.php");
@$Item_ID=$_POST['ID'];
@$Total=$_POST['TOTAL'];
@$Net=$_POST['Net'];
@$Discount=$_POST['Discount'];
@$update="update  invno  SET   TOTAL='$Total',Net='$Net',Discount='$Discount' WHERE  ID ='$Item_ID'";
mysqli_query($connect,$update);
?>
