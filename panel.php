


<?php

if($current_page==1){
?>
 <span>prevpage</span>
 
<?php
}

else{
?>

<!--<form action="techsys.php" method="post" >-->
	
<Input type="hidden" id='prvpage'  value="<?php echo $prevpage ; ?>"  style='background:#06F' />

<input type="hidden"   placeholder="UID"  width="500" id="UID" style='color:black;' 
 value="<?php echo $row['UID'] ?>" />   <!--  MEMBER ID -->

   
<button   value="<prev"   style='background:#06F'  name='btticket' class='checkticket' onclick='ticketresultprev();'>  < prev    </button>
 
    
<!--<Input type="submit"  value="<prev"  style='background:#06F' class='checkticket' /> 
    </form>
    
<!--<a href="?page=<?php echo $prevpage ; ?> " ><Input type="button"  value="<prev "  style='background:#06F' /> </a>-->
   	
<?php	
}
?>

<?php

if($nextpage==$Lastpage+1){

?>

<span>nextpage</span>

<?php

}

else{
	
?>

<!--<form action="techsys.php" method="post" >-->
	
<Input type="hidden" id='nxtpage'  value="<?php echo $nextpage ; ?>"  style='background:#06F' />

<input type="hidden"   placeholder="UID"  width="500" id="UID" style='color:black;' 
 value="<?php echo $row['UID'] ?>" />   <!-- MEMBER ID -->
    
<button   value="Next >"  name='btticket' style='background:#06F' class='checkticket' onclick='ticketresultnext();'>   Next >    </button>

<!--<Input type="submit"  value="Next >"  style='background:#06F' class='checkticket'   />


    </form>
    
    <!--<a href="?page=<?php echo $nextpage ; ?> " id="nxtpage"><Input type="button"  value="Next >"  style='background:#06F' /> </a>
	-->
    
<?php	
}
?>


<script>/*

var  nxtpage =document.getElementById('nxtpage');


nxtpage.addEventListener('click',function(e){
	
	
e.preventDefault();

});
*/
</script>
