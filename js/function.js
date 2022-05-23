    
$(document).ready(function(e) {
$("#menuico").click (function(){
	$("#MENUBEFORE").css({top:"8px"});
	$("#MENUBEFORE").css({transform:"rotate(45deg)"});
	$("#menuico").css({transform:"rotate(-45deg)"});
	$("#MENUAFTER").css({display:"none"});
	$(".nav").fadeIn();
	    		
});	
});

    
$(document).ready(function(e) {
$("#MENUBEFORE").click (function(){
	$("#MENUBEFORE").css({top:"-1px"});
	$("#MENUBEFORE").css({transform:"rotate(0deg)"});
	$("#menuico").css({transform:"rotate(0deg)"});
	$("#MENUAFTER").css({display:"block"});
    $(".nav").fadeOut();	    		
});	
});


$(document).ready(function(e) {
	$(window).scroll(function(){
   $(".title").delay(900).animate({left:"35px"});	     
    });
	});
	
    
$(document).ready(function(e) {
   $(".typer").delay(15000).fadeOut();	     
    });	
	
        
$(document).ready(function(e) {
$(".bt1menu").click (function(){
    $(".contant").slideDown();
	$(".bt1menu").fadeOut();	    		
});	
});


     
$(document).ready(function(e) {
$(".bt1log").click (function(){
    $(".logtitle,.email,.password,.login,.log,.subscribe,.x").fadeIn();
	$(".logtitle2,.mobile,.company,.logs").fadeOut();
	$(".login").val('سجل دخولك الان');
	
	    		
});	
});


$(document).ready(function(e) {
$(".btreg").click (function(){
$(".logtitle2,.mobile,.company,.email,.password,.login,.log,.logs,.x").fadeIn();
$(".mobile,.company").prop('required',true);  //document.getElementsByClassName('company').required ="true"  or $(".mobile,.company").attr('required',true);
$(".login").val('أشترك الان');
$(".logtitle,.subscribe").fadeOut();	    		
});	
});

     
$(document).ready(function(e) {
$(".bt1logg").click (function(){
    $(".log").fadeIn();
	 $(".userInfo").fadeOut();
	 $(".ticket").fadeIn();
	 $(".ticket_status").fadeOut();
			    		
});	
});

$(document).ready(function(e) {
$(".bt1user").click (function(){
    $(".log").fadeIn();
	 $(".userInfo").fadeIn();
	  $(".ticket").fadeOut();		    		
	  $(".ticket_status").fadeOut(); 
	  		
});	
});


$(document).ready(function(e) {
$(".checkticket").click (function(){
    $(".log").fadeIn();
	 $(".ticket_status").fadeIn();
	  $(".ticket").fadeOut();		    		
	   $(".userInfo").fadeOut();  
	   			
});	
});

    
$(document).ready(function(e) {
$(".coverimg").click (function(){
    $(".log").fadeOut();
});	
});
     
$(document).ready(function(e) {
$(".x").click (function(){
    $(".logtitle,.email,.password,.login,.log,.x").fadeOut();	    		
});	
});




function ticketcr(){
	
var ISSUE=document.getElementById('ISSUE').value;
var issue_Title=document.getElementById('issue_Title').value;
var MID=document.getElementById('MID').value;

$('.log').load('ticketAjex.php',{ISSUE:ISSUE,issue_Title:issue_Title,MID:MID}); 

}


function ticketresultnext(){
	
var page=document.getElementById('nxtpage').value;
var UID=document.getElementById('UID').value;

$('.log').load('ticketResult.php',{page:page,UID:UID}); 

}



function ticketresultprev(){
	
var page=document.getElementById('prvpage').value;
var UID=document.getElementById('UID').value;

$('.log').load('ticketResult.php',{page:page,UID:UID}); 

}



function Changeinfo(){
	
var company=document.getElementById('company').value;
var Mobile=document.getElementById('Mobile').value;
var Email=document.getElementById('Email').value;
var password=document.getElementById('password').value;
var UID=document.getElementById('UID').value;

$('.log').load('updateinfo.php',{company:company,Mobile:Mobile,Email:Email,password:password,UID:UID}); 

}




$(document).ready(function(e) {
	$(window).scroll(function(){
   $("#cat").delay(900).animate({left:"30px"});	 
     $(".navbar").css({position:'fixed', background:'#fff', color:'white'});	 
    })
	});
	
	
	
	
	$(document).ready(function(e) {
   $(".loadingbg").delay(6100).fadeOut();	     
    });	
	


