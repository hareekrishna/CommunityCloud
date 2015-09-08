<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>The community Cloud</title>
        <script type="text/javascript" src="library/jquery.min.js" ></script>
        <script type="text/javascript" src="library/jquery.qrcode-0.11.0.min.js"></script>
        
    </head>

    <body> 
    	<?PHP  
	include('../hree/cred.php');
	if(isset($_POST['submit']) && $_POST['admin_name'] && $_POST['admin_pass'] && $_POST['select_desig'] && $_POST['employee_name'] && $_POST['imei_num'] ){
		 
		$username=htmlspecialchars($_POST['admin_name']);
		$password=htmlspecialchars($_POST['admin_pass']); 
		$emp=htmlspecialchars($_POST['employee_name']);
		$imei=htmlspecialchars($_POST['imei_num']);
		$desig_temp=$_POST['select_desig'];
		$desig='0-0@'.$desig_temp;
		$stm=$mysqli->prepare("select * from `drive`.`officials` where `name`= '".$username."'");
		$stm->execute();
		$stm->bind_result($mem_id,$name,$db_pass,$salt);
		$stm->store_result();
		if($stm->fetch()){
			$password1 = hash('sha512', $password.$salt);
			
			if($db_pass==$password1){
				$stm->close(); 
				$stm1=$mysqli->prepare("insert into `drive`.`members` (`name`,`designation`, `number`) values(?,?,?)");
				$stm1->bind_param('sss',$emp,$desig,$imei);
				if($stm1->execute()){
					echo "<h1>Details have been added successfully</h1>";
					}
				}
				

			}
		
		}
 ?>
    	<style>
        	body{
				font-family:verdana;
				margin: 0 0 0 0;
				background-color: gainsboro;
				}
			div{
				display:inline-block;
				}
			span{
				margin-left:20px;
				display:inline-block;
				}
			span img{
				float:left;
				}
			h1{
				text-align: center;
 				 color: #545353;
				}
			h6{
				margin:0 0 0 0;
				}
			span h3{
				display:inline-block;
				margin:0 0 0 0;
				}
			.global_container_outer{
				margin: 10% 0px 0px 0px;
  				width: 100%;
				}
			.global_container_inner{
				width: 100%;
				  background-color: rgba(244, 244, 244, 0.71);
				  box-shadow: 0px 0px 9px 0px #B8B3B3;				
				}
			.global_container{
				width:100%;
				}
			.qrcode_outer{
				
				  margin: 0px 00px 0px 25%;
			  float: left;
			  padding: 0px 5%;
			  border-right: 1px solid #B2ADAD;
				}
			.qrcode_main{
				padding:20px;
				}
			.qrcode_outer p{
				font-size:20px;
				
				}
			.admin_signup_outer{
				margin:10px 50px;
				}
			.text_box{
				padding:7px 20px;
				margin:5px;
				background-color:transparent;
				border:1px solid #888;
				}
			.select_desig{
				padding:7px 58px;
				margin:5px;
				background-color:transparent;
				border:1px solid #888;
				
				}
			.submit_button{
			  margin: 5px 70px;
			  padding: 5px 20px;
			  background-color: transparent;
			  border: 1px solid #B3B2B2;
				}
			 button{
				 cursor:pointer;
				padding: 5px 20px;
				  background-color: transparent;
				  border: 1px solid #B3B2B2;
				}
			.admin_button_outer{
				margin:10%;
				
				}
			.admin_button_outer button {
				padding:7px 25px;
				border: 2px solid #8E8687;
				}
			.admin_login_outer{
				display:none;
				margin:7% 0% 0% 7%;
				}
			.text{
				float:none;
				  padding: 7px 10px;
				  margin: 5px;
				  background-color: rgba(60, 57, 57, 0.1);
				  border: 0px solid #A5A0A0;
				}
			.admin_submit_outer{
				float:right;
				margin:5px;
				}
			.admin_login_outer p{
				color: red;
  				font-size: 11px;
				}
			.suc_outer{
				display:none;
				margin:10% 0% 0% 8%;
				}
			.suc_outer button{
				margin:5px;
				border: 2px solid #8E8687;
				}
			.edit_user_div_o{
				margin-top:5%;
				}
			.edit_user_div_i h6,.edit_user_div_i span{
				float:left;
				}
			.edit_user_div_i span{
				width:110px;
				}
			
			select{
			  margin-left: 5px;
			  padding: 5px;
			  background-color: transparent;
				}
				.edit_user_div_i .text{
					margin:0%;
					float:left;
					
					}
				.edit_user_div_i div{
					padding:2%;
					width:50%;	
					}
				#add_user_div_i div{
					width:70%;
					}
				.edit_user_div_i h6{
					font-size:16px;
					padding-right:2%;
					}
        </style>
    	<script>
			function admin_panel(){
						$(".admin_button_outer").hide();
						var append="<div class='admin_login_outer'><div class='admin_login_inner'>";
							append+="<input type='text' name='adminname' class='text' id='adminname' placeholder='Admin Name'><br/>";
							append+="<input type='text' name='adminpass' class='text' id='adminpass' placeholder='Admin Pass'><br/>";
							append+="<div class='admin_submit_outer'><button onclick='admin_login();'>Log-In</button></div></div></div>";
						$(append).appendTo(".global_container").fadeIn(1000);
						}
			function admin_login(){
				var admin_name=$(document).find("#adminname").val();
				var admin_pass=$(document).find("#adminpass").val();
				if(admin_name !='' && admin_pass != ''){
					$.ajax({
						url:'infogiver.php',
						dataType:"text",
						method:"post",
						data:{
							flag:'admin_login',
							admin_name:admin_name,
							admin_pass:admin_pass
							
							},
						success:function(data){
							if(data=='authenticate'){
								$(".admin_login_outer").remove();
								var append="<div class='suc_outer'><div class='suc_inner'>";
									append+="<button onclick='editexit();' id='edit'>Edit existing</button>";
									append+="<button onclick='addnew();' id='addnew'>Add new</button></div></div>";
								$(append).appendTo(".global_container").fadeIn(500);
								}
							else{
								var append='<p>Wrong Credentials.Please try again.</p>';
								$(".admin_login_outer").find("p").remove();
								$(append).appendTo(".admin_login_outer");
								}
							},
						error:function(jXHR,textStatus,errorThrown){
							alert(errorThrown);
							}
						});
					}
				}
			var mobile_no_edit="";
			function editexit(){
				
				$(document).find(".suc_inner button").remove();
				var append="<button onclick='Edit_info();' id='edit_info'>Edit user info</button>";
					append+="<button onclick='edit_dev()'; id='edit_dev'>Edit user device</button>";
				$(append).appendTo($(document).find(".suc_inner"));
				
					
				}
			
        	$(function(){
					
					
					function makeid()
						{
							var text = "";
							var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
						
							for( var i=0; i < 10; i++ )
								text += possible.charAt(Math.floor(Math.random() * possible.length));
						
							return text;
						}
						
						var makeid=makeid();
						
					$(".qrcode_main").qrcode({'text':makeid});
					if($(".qrcode_main").html() != ''){
						$.ajax({
							url:'infogiver.php',
							method:'post',
							dataType:'text',
							data:{
								flag:'qrcode_init',
								qrcode:makeid
								},
							success:function(data){
								
								 },
							error:function(jXHR,textStatus,errorThrown){
								alert(errorThrown);
								}
										});
						}
					$(document).on('click','#edit_info',function(){
						$(".qrcode_outer").find("p").html("Scan the code to configure your device");
						$(".got_qr").attr('class','got_qr_edit');
						var string='update_'+makeid;
						$(".qrcode_main").html('').qrcode({'text':string});
						
					});
					$(document).on("click",".got_qr_edit button",function(){
					$.ajax({
							url:'infogiver.php',
							method:'post',
							dataType:'text',
							data:{
								flag:'qrcode_get_edit',
								string:makeid
								},
							success:function(data){
								if(data!=false){
									mobile_no_edit=data;
									}
								
							},
							error:function(jXHR,textStatus,errorThrown){
							alert(errorThrown);
							}
						});
					});
					$(document).on("click",".got_qr",function(){
						$.ajax({
							url:'infogiver.php',
							method:'post',
							dataType:'text',
							data:{
								flag:'qrcode_check'
								},
							success:function(data){
								
								if(data!='authenticated'){
									window.location.replace("thru_pc.php?num="+makeid);
									}
								 },
							error:function(jXHR,textStatus,errorThrown){
								alert(errorThrown);
								}
							
							});
						});
					$(document).on("click",'.got_qr_edit',function(){
						$.ajax({
							url:'infogiver.php',
							method:'post',
							dataType:'text',
							data:{
								flag:'got_qr_edit_user',
								rand_code:makeid
								},
							success:function(data){
								if(data!=false){
									
									var info=JSON.parse(data);
									if(info){
										var append="<div class='edit_user_div_o' id='edit_user_div_o'><div class='edit_user_div_i' id='edit_user_div_i'>";
											append+="<div><span>Name:</span><input type='text' class='text' name='user_name_db' value='"+info['name']+"'/></div><br/>";
											append+="<div><span>Designation:</span>";
											append+="<input type='radio' name='radio_desig' class='radio_desig' value='ceo'"+info['ceo']+">ceo";
											append+="<input type='radio' name='radio_desig' class='radio_desig' value='HOD'"+info['HOD']+">HOD";
											append+="<input type='radio' name='radio_desig' class='radio_desig' value='member'"+info['member']+">member</div>";
											append+="<div><span>Department:</span><select id='select_dept'><option id='analytics'>Analytics</option><option id='designers'>Designers</option><option id='developers'>Developers</option><option id='testing'>Testing</option></select></div>";
											append+="<div><span>Status:</span><h6>"+info['active']+"</h6><button>"+info['active_button']+"</button></div><br/>";
											append+="<div><button id='submit_form' style='float:right'>Submit</button></div></div></div>"
										$(".qrcode_inner,.admin_button_outer").remove();
										$(".qrcode_outer").animate({'margin-left':'10%','padding':0},200);
										$(append).appendTo($(document).find(".qrcode_outer")).hide().fadeIn(500);
										$(document).find("#select_dept").val(info['dept']);
										}
									}
								else{
									$(".qrcode_inner p").html("you missed something!Ttry again..").animate({'color':'red'},500);
									}
//								
								 },
							error:function(jXHR,textStatus,errorThrown){
								alert(errorThrown);
								}
							
							});
						});
					$(document).on("click","#submit_form",function(){
						var name=$(document).find(".edit_user_div_i .text").val();
						var desig=$(document).find('input[name="radio_desig"]:checked').val();
						var dept=$(document).find("#select_dept").val();
						if(name !='' && desig!='' && dept!=""){
							$.ajax({
								url:'infogiver.php',
								method:'post',
								dataType:'text',
								data:{
									flag:'submit_form_user_info',
									name:name,
									desig:desig,
									dept:dept
									},
								success:function(data){
									if(data=='updated'){
										alert("The details you have provided has been updated.");
										window.location.reload();
										}
									else{
										alert("Oops!You missed something,please try again.");
										}
									},
								error:function(jXHR,textStatus,errorThrown){
									alert(errorThrown);
								}
									
									});
						}
						});
					$(document).on("click","#edit_dev",function(){
						var append="<div class='edit_dev_text'><input type='text' name='edit_d_t' class='text' placeholder='Enter the name..' /><button>Submit</button></div>";
						$(".suc_inner button").remove();
						$(append).appendTo($(document).find(".suc_inner")).hide().fadeIn(500);
						});
					$(document).on("click",".edit_dev_text button",function(){
						var name_d=$(document).find(".edit_dev_text .text").val();
						if(name_d != ''){
							$.ajax({
								url:'infogiver.php',
								method:'post',
								dataType:'text',
								data:{
									flag:'edit_dev_n',
									name_d:name_d
									},
								success:function(data){
									if(data =='authenticate'){
										$(document).find(".edit_dev_text").remove();
										var append="<center>Here you are.,<br/>Just scan the QR code shown with your new device.</center>";
										$(append).appendTo($(document).find(".suc_inner")).hide().fadeIn(500);
										var string='add_'+makeid;
										$(".qrcode_main").html('').qrcode({'text':string});
										$(".got_qr").attr("class","got_qr_chd");
										}
									},
								error:function(jXHR,textStatus,errorThrown){
									alert(errorThrown);
								}
									
									});
							}
						});
					$(document).on("click","#addnew",function(){
						var string="add_"+makeid;
						$(".qrcode_main").html('').qrcode({'text':string});	
						$(".got_qr").attr("class","got_qr_add");
						
						});
					$(document).on("click",".got_qr_add",function(){
						
							$.ajax({
								url:'infogiver.php',
								method:'post',
								dataType:'text',
								data:{
									flag:'add_user_new',
									rand_code:makeid
									},
								success:function(data){
							
									if(data=='itsthere'){
										var append="<div class='edit_user_div_o' id='add_user_div_o'><div class='edit_user_div_i' id='add_user_div_i'>";
											append+="<div><span>Name:</span><input type='text' class='text' name='user_name' id='user_name_box' value=''/></div><br/>";
											append+="<div><span>Designation:</span>";
											append+="<input type='radio' name='radio_desigBox' class='radio_desig' value='ceo'>ceo";
											append+="<input type='radio' name='radio_desigBox' class='radio_desig' value='HOD'>HOD";
											append+="<input type='radio' name='radio_desigBox' class='radio_desig' value='member'>member</div>";
											append+="<div><span>Department:</span><select id='select_deptBox'><option id='analytics'>Analytics</option><option id='designers'>Designers</option><option id='developers'>Developers</option><option id='testing'>Testing</option></select></div>";
											
											append+="<div><button id='submit_form_add' style='float:right'>Submit</button></div></div></div>"
										$(".qrcode_inner,.admin_button_outer").remove();
										$(".qrcode_outer").animate({'margin-left':'10%','padding':0},200);
										$(append).appendTo($(document).find(".qrcode_outer")).hide().fadeIn(500);
										}
									},
								error:function(jXHR,textStatus,errorThrown){
									alert(errorThrown);
								}
									
						});
					});
				$(document).on("click","#submit_form_add",function(){
					var nameFrmBox=$("#user_name_box").val();
					var desigFrmBox=$("input[name='radio_desigBox']:checked").val();
					var deptFrmBox=$("#select_deptBox").val();
						
							$.ajax({
								url:'infogiver.php',
								method:'post',
								dataType:'text',
								data:{
									flag:'submit_form_add',
									rand_code:makeid,
									nameFrmBox:nameFrmBox,
									desigFrmBox:desigFrmBox,
									deptFrmBox:deptFrmBox
									},
								success:function(data){
									if(data=='donenow'){
										$(".edit_user_div_i").remove();
										$(".edit_user_div_o").append("<h6><center>Welcome,"+nameFrmBox+"<br/>now enjoy the services of CommunityCloud..</center></h6>");
										}
									else{
										alert("Oops!You have missed something,please try again.");
										}
									},
								error:function(jXHR,textStatus,errorThrown){
									alert(errorThrown);
								}
									
						});
					});
				
				});
        </script>
    	<div class="global_container_outer">
        		<span>
                    <img src="img/logo.png" width='75'><br/>
                    <h3>The CommunityCloud</h3>
                </span>
        	<div class="global_container_inner">
            	
            	<div class="global_container">		
                	
                	<div class="qrcode_outer">
                    	<div class="qrcode_inner">
                        	 <p>Scan the code through your device</p>
                        	<div class="qrcode_main">
                            	
                            </div>
                            <div class="got_qr">	
                            	<button>Got It!</button>
                            </div>
                           
                        </div>
                    </div>
                    <div class="admin_button_outer">
                    	<div class="admin_button_inner">
                        	<button onClick="admin_panel();">Admin Panel</button>
                        </div>
                    </div>
                   <!-- <div class='admin_signup_outer'>
                    	<div class="admin_signup_inner">
                        	<div class="admin_signup_main">
                            	<p>Sign-in with your account to add an employee</p>
                            	<form class="admin_form" name="admin_form" action="admin.php" method="post">
                                	<input type='text' name='admin_name' class='text_box' placeholder="Name"><br/>
                                    <input type='password' name='admin_pass' class='text_box' placeholder='Password' ><br/>
                                    <input type='text' name='employee_name' class='text_box' placeholder='Employee name'><br/>
                                    <select name='select_desig' class="select_desig">
                                    	<option value="1">Analyst</option>
                                        <option value='2'>Programmer</option>
                                        <option value="3">Tester</option>
                                    </select><br/>
                                    
                                    <input type='submit' name='submit' class='submit_button' value='Submit'>
                                </form>
                            </div>
                        </div>
                    </div>-->
                </div>
            </div>
        </div>
    </body>
</html>
