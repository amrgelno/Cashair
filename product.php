<?php
include("con_db2.php");


$cattype=$_POST['ITEM_DEP'];


$SEL_cat="select * from  stock  where  Item_dep='$cattype' ";


$qu_sel=mysqli_query($connect,$SEL_cat);
?>
 
 <?php
while($row=mysqli_fetch_array($qu_sel)){
?>

<option value='<?php echo $row['ID']?>'> <?php echo $row['Item']?> </option>


<?PHP
}
?>