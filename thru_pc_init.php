<!doctype html>
<html>
    <head>
   	   <meta charset="utf-8">
    <title>Start::CommunityCloud</title>
        <script type="text/javascript" src="library/jquery.min.js" ></script>
    </head>
    
    <body>
    
		<script>
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
			$(function(){
		var check=/AppName\/[0-9\.]+$/.test(navigator.userAgent);
		var rand_code=getUrlParameter('code');
		var mobile_no=getUrlParameter('num');
		var flag=getUrlParameter('flag');
		if(check && rand_code){
			switch(flag){
				case 'thru_pc':
					
						$.ajax({
							url:'infogiver.php',
							dataType:'text',
							type:'post',
							data:{
								flag:'thru_pc_init',
								rand_code:rand_code,
								mobile_no:mobile_no
								},
							success: function(data){
								if(data=='updated'){
									window.JSInterface.gotQR();
									}
								else{
									
									}
								},
							error:function(jXHR,textStatus,errorThrown){
								alert(errorThrown);
								}
							});
					
						break;
				case 'update':
						rand_code=rand_code.replace("update_","");
						$.ajax({
							url:'infogiver.php',
							dataType:'text',
							type:'post',
							data:{
								flag:'update_init',
								rand_code:rand_code,
								mobile_no:mobile_no
								},
							success: function(data){
								if(data=='updated'){
									window.NewUser.update_user();
									}
								else{
									
									}
								},
							error:function(jXHR,textStatus,errorThrown){
								alert(errorThrown);
								}
							});
					
						break;
				case 'add_new':
				
				rand_code=rand_code.replace("add_","");
						$.ajax({
							url:'infogiver.php',
							dataType:'text',
							type:'post',
							data:{
								flag:'added_init',
								rand_code:rand_code,
								mobile_no:mobile_no
								},
							success: function(data){
								var info=JSON.parse(data);
								if(info['status']=='updated'){
									window.NewUser.added_user(info['tkt']);
									}
								else{
									
									}
								},
							error:function(jXHR,textStatus,errorThrown){
								alert(errorThrown);
								}
							});
						break;
					
			}
		}
		else{
			window.location.replace("error.html");
			}
			});
        </script>
    </body>
</html>