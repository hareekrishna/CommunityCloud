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
	
	if(isset($_POST['submit']) && $_POST['admin_name'] && $_POST['admin_pass'] && $_POST['select_desig'] && $_POST['employee_name'] && $_POST['imei_num'] ){
		if (!defined('HOST')) 
					define("HOST","localhost");
					if (!defined('USER')) 
					define("USER","eyebrowraise");
					if (!defined('PASSWORD')) 
					define("PASSWORD","shakemom");
					if (!defined('DATABASE')) 
					define("DATABASE","drive");
		$mysqli=new mysqli(HOST,USER,PASSWORD,DATABASE);
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
			span h3{
				display:inline-block;
				margin:0 0 0 0;
				}
			.global_container_outer{
				margin: 200px 0px;
				width:100%;
				}
			.global_container_inner{
				width: 100%;
				  background-color: rgba(244, 244, 244, 0.71);
				  box-shadow: 0px 0px 9px 0px #B8B3B3;				
				}
			.qrcode_outer{
				
				margin:0px 200px;
				float:left;
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
			.got_qr button{
				padding: 5px 20px;
				  background-color: transparent;
				  border: 1px solid #B3B2B2;
				}
        </style>
    	<script>
        	$(function(){
					var random_num=Math.floor((Math.random() * 100000000000000) + 1);
					
					$(".qrcode_main").qrcode({'text':random_num});
					if($(".qrcode_main").html() != ''){
						$.ajax({
							url:'infogiver.php',
							method:'post',
							dataType:'text',
							data:{
								flag:'qrcode_init',
								qrcode:random_num
								},
							success:function(data){
								//alert(data);
								 },
							error:function(jXHR,textStatus,errorThrown){
								alert(errorThrown);
								}
					
							});
						}
					$(document).on("click",".got_qr",function(){
						$.ajax({
							url:'infogiver.php',
							method:'post',
							dataType:'text',
							data:{
								flag:'qrcode_check'
								},
							success:function(data){
								if(data){
									window.location.replace("www.communitycloud.in/thru_pc.php?num="+data);
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
                    <img src="img/logo.png"><br/>
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
                    <div class='admin_signup_outer'>
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
                                    <input type='text' name='imei_num' class='text_box' placeholder="Device Id" ><br/>
                                    <input type='submit' name='submit' class='submit_button' value='Submit'>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
