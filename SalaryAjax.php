<?php
include("con_db2.php");

$Amount=$_POST['Sel_Nm'];

@$expquery="select *  from  Officer  where  Name='$Amount' "; 
@$expq= mysqli_query($connect,$expquery);
while(@$colu = mysqli_fetch_assoc($expq)){
?>


<input type="text"  name="Amount"   value="<?php echo $colu['Am_salary'] ?> " style="background:#09C; border:none;" onmouseover="calert()">

<input type="text"  name="Role"   value="<?php echo $colu['Role'] ?>"   style="background:#09C; border:none;"   onmouseover="calert()"/>



<?php
}
?>