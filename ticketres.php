<?php
include('con_db.php');

if(@$_POST['page'] ){

$current_page=$_POST['page'];   /* get page value from next  prev  Link */

}else{
	
$current_page=1;	/* dafault value */

}

@$nextpage=$current_page+1;
@$prevpage=$current_page-1;

$perpage=1;

@$start=($current_page-1)*$perpage;



@$ID=$row['ID'];  #submit->login   member ID

if(empty ($ID))
{
@$UID=$_POST['UID'];  #Ajax

echo $UID;
}else{
	
@$UID=$ID;  	
	
}

$select_ticket="select *  from   ticket  where  UID='$UID'  and  status != 'تم الانتهاء'  limit $start,$perpage ORDER BY  ID ASC  ";  #login -> select data  / subscribe 	

$sel_count="select count(ID) AS  Number  FROM  ticket where  UID='$UID'   and  status != 'تم الانتهاء'    ORDER BY  ID ASC";

$query_count=mysqli_query($connect,$sel_count);	

$col=mysqli_fetch_assoc($query_count);

$Number=$col['Number'];

$Lastpage=ceil($Number/$perpage);

$query_ticket=mysqli_query($connect,$select_ticket );

while($row=mysqli_fetch_array($query_ticket)){


?>

 <div >تذاكرك الحالية </div>
 <hr/>
<table border="5px solid #000" width="85%" align="center">
<tr width="50%"> <td> رقم التذكرة </td>  <td><?php echo $row['ID'] ?></td> </tr>

<tr>  <td> تفاصيل المشكلة</td> <td><?php echo $row['issue_Title'] ?> </td> </tr>

<tr>  <td> المشكلة</td> <td><?php echo $row['issue'] ?>  </td>  </tr> 

<tr> <td>  الحالة</td>  <td> <?php echo $row['status'] ?> </td>  </tr>
</table>


<?php  require_once('panel.php'); ?> 


<?PHP	
}
?>