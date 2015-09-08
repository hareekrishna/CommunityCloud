<!doctype html>
<html>
    <head>
   	   <meta charset="utf-8">
    <title>Start::CommunityCloud</title>
        <script type="text/javascript" src="library/jquery.min.js" ></script>
    </head>
    
    <body>
    	<style>
        	body{
				font-family:verdana;
				color:#333;
				background-color:#0DC9D0;
				text-align:center;
				}
			p{
				margin :0 0 0 0;
				}
			.main_container_outer{
				margin:40% 5%;
				}
			.img_outer img{
				 padding: 0% 1%;
 				 width: 20%;
				}
			.img_outer p{
				color: black;
  				font-size: 7vw;
				}
			.buttons{
				margin-top:8%;
				}
			button{
				margin:3%;
				padding:5% 7%;
				width:70%;
				background-color:rgba(0, 0, 0, 0.18);
				border: 1px solid #5E5C5C;
				}
        </style>
		<script type="text/javascript">
		
			function getUrlParameter(sParam)
				{
					var sPageURL = window.location.search.substring(1);
					var sURLVariables = sPageURL.split('&');
					for (var i = 0; i < sURLVariables.length; i++) 
					{
						var sParameterName = sURLVariables[i].split('=');
						if (sParameterName[0] == sParam) 
						{
							return sParameterName[1];
						}
					}
				} 
	function thru_pc(){
		var mobile_no=getUrlParameter('num');
				if(mobile_no){
					window.JSInterface.thru_pc();
					}
		}
	function mydrive(){	
				var mobile_no=getUrlParameter('num');
				if(mobile_no){
					$("button").fadeOut(500);
					$(".img_outer p").animate({'font-size':'10vw'},500);
					$(".text_outer p").html("Redirecting..");
					var TKT=getUrlParameter('TKT');
					$.ajax({
						url:'auth.php',
						dataType:"text",
						type:'POST',
						data:{
							flag:'authenticate',
							mobile_no:mobile_no,
							ticket:TKT
							},
						success:function(data){
							var info=JSON.parse(data);
							if(info['rand_code']){
								window.JSInterface.donow(info['rand_code'],info['tkt']);
								}
							
							
							},
						error:function(jXHR,errorThrown,textstatus){
							alert(errorThrown);
							}
					
						});
				}
				else {
					window.location.replace("error.html");
				}
				}
	$(function(){
		var check=/AppName\/[0-9\.]+$/.test(navigator.userAgent);
		if(check){
		var mobile_no=getUrlParameter('num');
		
		if(mobile_no){
			
			}
			else {
			window.location.replace("error.html");
			}
		}
		else {
			window.location.replace("error.html");
			}
		});
        </script>
        <div class='global_container'>
        	<div class='main_container_outer'>
            	<div class='main_container_inner'>
                	<div class="img_outer">
                    	<img src="img/logo.png"><p>CommunityCloud</p>
                    </div><br/>
                    <div class="text_outer">
                		<p>Hey,welcome..</p>
                    </div>
                    <div class="buttons">
                    	<button onClick="mydrive();">My Drive</button><br/>
                        <button onClick="thru_pc();">Thru pc</button>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
