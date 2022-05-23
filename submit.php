<html>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin control</title>
</head>
<style>
ul{
	list-style:none;
}

.nav {
    background: #0099ff52;
    color: #F00;
    width: 161px;
    height: 250px;
    padding: 20px 50px 30px 10px;
    border-radius: 14px;
    float: right;
    margin-right: 3px;
    margin-top: 17px;
}

li {
    padding: 16px 18px 20px;
}

li a{
	text-decoration:none;
	color:red;
}

.profilepic {
    width: 143px;
    height: 141px;
    border-radius: 500px;
    margin: 2px 87%;
	background:url(avatar-07.jpg);
	background-position:center;
	background-size:cover;
	background-repeat:no-repeat;
    /* float: right; */
}
.username {
    width: 200px;
    height: 23px;
    background: aqua;
	 margin: 10px 85%;
}
.email{
width: 200px;
    height: 23px;
    background: aqua;
	 margin: 10px 85%;	
}
.upload{
	width: 300px;
    height: 23px;
	 margin: 10px 87%;
}
.controlpanel {
    text-align: center;
    font-size: 40px;
    color: orange;
    margin: 20px 30px 50px 60px;
}

#newtopic {
    margin: -196px 10px;
	display:none;
}

#newtopic:target{
	display:block;
}

#edittopic{
margin: -196px 10px;
	display:none;	
}
#edittopic:target{
	display:block;
}
#subscrib{
margin: -196px 10px;
	display:none;	
}
#subscrib:target{
	display:block;
}
#unsubscrib{
	margin: -196px 10px;
	display:none;	
}

#unsubscrib:target{
	display:block;
}
</style>
<body>
<?PHP
if(@$_POST['submit']){
include("con_db.php");
$email=$_POST['Email'];
$PASSWORD=$_POST['password'];

@session_start();
if($_SERVER["REQUEST_METHOD"] == "POST");


$sql="select * from users where Email='$email' AND password='$PASSWORD' " ;


$query = mysqli_query($connect,$sql);

	if(!$column= mysqli_fetch_array($query)){
		
		include("login.php");
        #echo'<meta http-equiv="refresh"  content="1;url=login.php">' ;
	echo"fault in user name or password";
		
	}
		else{
		$user_type=$column["user_TYPE"];
		
		if($user_type==Admin){
		#open  Admin control		
		$_SESSION['Email']=@$email;
		$_SESSION['password']=@$PASSWORD;
        include("Admin.php");          		
	                        }
        elseif($user_type==cashair){
		#open  users	 control	
		$_SESSION['Email']=@$email;
		$_SESSION['password']=@$PASSWORD;
        include("customer_service.php");          		
	                        }
							
	
          }
                                          }


?>

 
 


</div>

</body>
</html>


<!-----image upload---!>





