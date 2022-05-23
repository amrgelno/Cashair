
function valid(){
	
var formy= document.getElementById('formy'); 		

formy.addEventListener("submit",function(error){  

var result=document.getElementById('input');

if(result.value.indexOf("$")!=-1){


error.preventDefault();

document.getElementById('emailerror').innerHTML="خطأ في صيغة مدخل رجاء أدخال صيغة صالحة";




}


else if(result.value.indexOf("%")!=-1){


error.preventDefault();

document.getElementById('emailerror').innerHTML="خطأ في صيغة مدخل رجاء أدخال صيغة صالحة";




}


else if(result.value.indexOf(")")!=-1){


error.preventDefault();

document.getElementById('emailerror').innerHTML="خطأ في صيغة مدخل رجاء أدخال صيغة صالحة";




}


else if(result.value.indexOf("(")!=-1){


error.preventDefault();

document.getElementById('emailerror').innerHTML="خطأ في صيغة مدخل رجاء أدخال صيغة صالحة";

}

else if(result.value.indexOf("*")!=-1){


error.preventDefault();

document.getElementById('emailerror').innerHTML="خطأ في صيغة مدخل رجاء أدخال صيغة صالحة";


}


else if(result.value.indexOf("?")!=-1){


error.preventDefault();

document.getElementById('emailerror').innerHTML="خطأ في صيغة مدخل رجاء أدخال صيغة صالحة";




}


else if(result.value.indexOf(">")!=-1){


error.preventDefault();

document.getElementById('emailerror').innerHTML="خطأ في صيغة مدخل رجاء أدخال صيغة صالحة";




}


else if(result.value.indexOf("<")!=-1){


error.preventDefault();

document.getElementById('emailerror').innerHTML="خطأ في صيغة مدخل رجاء أدخال صيغة صالحة";




}


else if(result.value.indexOf(",")!=-1){


error.preventDefault();

document.getElementById('emailerror').innerHTML="خطأ في صيغة مدخل رجاء أدخال صيغة صالحة";




}


else if(result.value.indexOf("&")!=-1){


error.preventDefault();

document.getElementById('emailerror').innerHTML="خطأ في صيغة مدخل رجاء أدخال صيغة صالحة";




}

else if(result.value.indexOf("+")!=-1){


error.preventDefault();

document.getElementById('emailerror').innerHTML="خطأ في صيغة مدخل رجاء أدخال صيغة صالحة";




}

else if(result.value.indexOf("#")!=-1){


error.preventDefault();

document.getElementById('emailerror').innerHTML="خطأ في صيغة مدخل رجاء أدخال صيغة صالحة";




}

else if(result.value.indexOf("!")!=-1){


error.preventDefault();

document.getElementById('emailerror').innerHTML="خطأ في صيغة مدخل رجاء أدخال صيغة صالحة";




}


else if(result.value.indexOf("~")!=-1){


error.preventDefault();

document.getElementById('emailerror').innerHTML="خطأ في صيغة مدخل رجاء أدخال صيغة صالحة";




}


else if(result.value.indexOf("^")!=-1){


error.preventDefault();

document.getElementById('emailerror').innerHTML="خطأ في صيغة مدخل رجاء أدخال صيغة صالحة";

   


}


else if(result.value.indexOf("/")!=-1){


	error.preventDefault();
	
	document.getElementById('emailerror').innerHTML="خطأ في صيغة مدخل رجاء أدخال صيغة صالحة";
	
	   
	
	
	}


	else if(result.value.indexOf("\/")!=-1){


		error.preventDefault();
		
		document.getElementById('emailerror').innerHTML="خطأ في صيغة مدخل رجاء أدخال صيغة صالحة";
		
		   
		
		
		}


else{

alert('جاري تحميل بياناتك شكرا لك');

return true;


}



});

}