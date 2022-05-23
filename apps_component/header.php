<div class="header">
 <div class="input"> 
<DIV ID="MENUAFTER"> </DIV>
<div id="menuico"> </div> 
<DIV ID="MENUBEFORE"> </DIV>
      </div>
<ul class="nav">
<?PHP
include('con_db.php');

@$Email=$_POST['Email'];
 @$password=$_POST['password'];
@$UID=$_POST['UID'];

$select_member="select *  from   member  where  Email='$Email' and  password='$password' or  ID='$UID'";  #login -> select data  / subscribe 	
 
$query_member=mysqli_query($connect,$select_member );

if(!$row=mysqli_fetch_array($query_member)){
?>
 <Li ><a href='techsys.php'>

مركز الدعم  <img src="img/website.png"  width="20px" height="20px"/> </a> </Li>

<?php
}else{
?>
 
  <Li ><a href="techsys.php?UID=<?php echo $row['ID'] ?>">

 تسجيل خروج  <img src="img/logout.png"  width="40px" height="20px"/> </a>
 

  </Li>


<?php
}
?>

<Li>   من نحن  <img src="img/aboutus.png"  width="40px" height="17px"/></Li>
<Li> سياسية أستخدام   <img src="img/PRIVACY SETTING.png "  width="50px" height="20px"/> </Li>

<?PHP
include('con_db.php');

@$Email=$_POST['Email'];
 @$password=$_POST['password'];
 @$UID=$_POST['UID'];

$select_member="select *  from   member  where  Email='$Email' and  password='$password' or  ID='$UID' ";  #login -> select data  / subscribe 	
 
$query_member=mysqli_query($connect,$select_member );

if(!$row=mysqli_fetch_array($query_member)){
?>
 <Li class="bt1log">  تسجيل الدخول  <img src="img/images copy.png"  width="40px" height="17px"/></Li>
<?php
}else{
?>
<Li class="active"> أدوات العضوية  <img src="img/MEMBER.png"  width="30px" height="20px"/>
<ul class="submenu" style="text-align:center;"> 
    <Li  class="bt1user"> <span class="iconify" data-icon="whh:businesscard" style="color: white;" data-width="20" data-height="20" data-flip="horizontal"></span> <br/>  معلومات المستخدم </Li>
  <Li  class="bt1logg"> <span class="iconify" data-icon="zmdi:confirmation-number" style="
  color: white; text-align:center;" data-width="20" data-height="20" ></span><br/> أنشاء تذكرة   </Li>
   <Li class="checkticket"><span class="iconify" data-icon="zmdi:ticket-star" style="color: white;" data-width="20"
    data-height="20"></span><br/> تفحص التذكرة    </Li>
    <Li > 
    
     <span class="iconify" data-icon="fa:twitch" style="color: white;" data-width="20" data-height="20"></span>
     <form action="MSSG_CLIENT.PHP" method="post">  
    <input type="hidden"  name="MID"   value="<?php echo $row['ID'] ?>"   />
    <input  type="submit"   value="رسائل" style="background:none; border:none;"/>
    </form>
    
    <?php
	
	$MID =$row['ID'];
    
    $sel_count="select count(ID) AS  Number  FROM  mssg  where recevier_id ='$MID' "; 
	
	$sel_query=mysqli_query($connect,$sel_count);
	
	while($row=mysqli_fetch_array($sel_query)){
		
		echo $row['Number'];
    
    
	}
    ?>
    
       </Li>
    </ul>
</Li>
</ul>

<?php
}
?>

</div>  
 </div>
 
 
<div class="log">
<?PHP
include('con_db.php');

@$Email=$_POST['Email'];
 @$password=$_POST['password'];
 @$UID=$_POST['UID'];

$select_member="select *  from   member  where  Email='$Email' and  password='$password' or  ID='$UID'";  #login -> select data  / subscribe 	
 
$query_member=mysqli_query($connect,$select_member );

if(!$row=mysqli_fetch_array($query_member)){
?>
<font size="+2">
 <div class="logtitle"> سجل دخولك الان للاتصال بالدعم الفني  </div> 
  <div class="logtitle2"> سجل الان بخدمة الدعم الفني  لشركه تك تاك  </div> 
</font>
<br /><br />
<form    method="post" id="formy" >

<button type='button' class="x">X</button>


<input type="email" placeholder="الايميل" title="insert your E-MAIL ETC name@YAHOO.COM  or  name@gmail.COM "  
  width="500"  id='input'  class='email '    name="Email"    required />
<br />  <br />
<span id="emailerror">       </span>

<input type="PASSWORD" placeholder="كلمة السر"   title="insert your password from 0-9"  pattern="[a-zA-Z-0-9]{5,10}"  
width="200" id='input' class='password'  name="password" required  />

<!--
<br/> <br/>

<input type="text" placeholder="أسم العميل أو الشركة " title="insert your Company or Yourname" pattern="[a-zA-Z]{7,20}"  id='input'  width="500"   class='company'   name="company"  />

<br/> <br/>

<input type="text"   placeholder="موبيل"  width="500"    pattern="[0-9]{10,11}"  id='input'  class='mobile '   name="Mobile"  />

<br/> <br/>
-->

<br/> <br/>
<input type="submit" name="submit"  class='login'  id="submitval"   onclick="valid();"   /> 

</form>
 
<br/> <br/>
<!--
<div class="subscribe"  >  

ان لم تكن مشتركا يمكنك التسجيل من
<br/>
<span class="btreg">   هنا    </span>

 </div>

<div class="logs"  >  

أذا كنت مشترك سجل دخولك 
<br/>
<span class="bt1log"> من هنا  </span>

 </div>
-->


<?PHP
}else{
	
?>

<div class="ticket" style="display:none;" >

<form    action="?page" method="post"  enctype="multipart/form-data"  >

<input type="hidden"   placeholder="UID"  width="500"   class='mobile '    id="MID"  value="<?php echo $row['ID'] ?>" />


<input type="hidden"   placeholder="UID"  width="500"   class='mobile '  name="UID"   value="<?php echo $row['ID'] ?>" />
<br/>


<Select  style='color:#000' id='ISSUE' width='200px' >
    <option  value="مشكلة خاصة بالانظمة  المالية"> مشكلة خاصة بالانظمة  المالية  </option>
    <option  value="مشكلة خاصة بالانظمة التسويقية"> مشكلة خاصة بالانظمة التسويقية   </option>
     <option  value="مشكلة خاصة بانظمة  الدعم والتحكم"> مشكلة خاصة بانظمة  الدعم والتحكم   </option>
    </Select>   
<br/>
<br/>

<!--<textarea type="text"   name="issue_Title"  placeholder="insert new topic here"   style="color:#000;" cols="50" rows="10" >
</textarea>-->

<textarea type="text"   id="issue_Title"  placeholder="insert new topic here"   style="color:#000;" cols="30" rows="10" >
</textarea>

<br/> <br/>
<input type="file"  name='upload'   value="أختر صورة من فضلك"   style="width:500px;" />


<button type="submit" name="ticketbtt"   style='background:#06F' id='ticketbt' 
 onclick='ticketcr();'  />
 أنشاء تذكرة </button>


</form>


</div>

<!--
<div  class="userInfo" style="display:none;">

<div > يمكنك تعديل بياناتك من هنا  </div> 

<input type="hidden"   placeholder="UID"  width="500"      id="UID" style='color:black;' 
 value="<?php echo $row['ID'] ?>" />


<input type="button"  placeholder="الايميل" width="500"      id="Email"  style='color:black;' 
value="<?php echo $row['Email'] ?>"   />

<br/>

<input type="text" placeholder="أسم العميل أو الشركة "     pattern="[a-zA-Z-0-9]{5,10}"   width="500"    id="company" style='color:black;'
value="<?php echo $row['Company'] ?>"   />

<br/>

<input type="text" placeholder="موبيل"  width="500"    pattern="[0-9]{10,11}"    id="Mobile" style='color:black;' 
value="<?php echo $row['Mobile'] ?>"    />

<br/>


<input type="PASSWORD" placeholder="كلمة السر"  pattern="[a-zA-Z-0-9]{5,10}"      width="500"  style='color:black;' 
value="<?php echo $row['password'] ?>" 
id="password" required />

<br/>

<button type="submit"  name="submit"  style='background:#06F'  onclick='Changeinfo();'  /> تعديل معلومات 
</button>

</div>
-->
<div class="ticket_status"> <?php  require_once('ticketResult.php'); ?>      </div>

<?php
	}		
	?>    
    </br>     
</div>     
<div class="coverimg"><img src="img/pexels-photo-3184357.jpeg" class="imgcover" alt=""/>

<div class="searchBar">

<div class='typer' >   </div>

  <script>
	var typed3 = new Typed('.typer', {
    strings: [' ',' شركة تك تاك لتكنولوجيا المعلومات والحلول متكاملة  يسعدنا تلقى تذكرة الدعم الفني منكم آملين في تلبية طلبكم بأقصى سرعة ممكنة'],
     typeSpeed: 50,
    backSpeed: -800,
    cursorChar:'',
    shuffle: true,
    smartBackspace: true,
    loop: false
  });
	</script>

