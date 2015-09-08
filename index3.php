<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>WELCOME TO CLOUD CORPARATES!</title>
</head>

<body>
 <?PHP
		
		
		define("HOST","localhost");
		define("USER","root");
		define("PASSWORD","");
		define("DATABASE","drive1");
		
		$mysqli=new mysqli(HOST,USER,PASSWORD,DATABASE);
		if(!$_SESSION['name']){
			header("location:index.php");
			}
		$name=$_SESSION['name'];
		$stm=$mysqli->prepare("select * from `drive1`.`members` where `name`='".$name."' ");
		$stm->execute();
		$stm->bind_result($mem_id,$name,$designation,$teams,$files,$shared_files);
		$stm->store_result();
		$stm->fetch();
		
		
		if(isset($_POST['upload_submit'])){
			
			$temp = explode(".", $_FILES["file"]["name"] );
			$extension = end($temp);
			
			$team_select=0;
			$team_select= $_POST['team_select'];
			$target=$mem_id."_".$team_select."_".time();
			
			$add="data/data/".$mem_id."/";
			$file_name_en=$target.".enc.".$extension;
			$file_name=$add.$target.".".$extension;
			move_uploaded_file($_FILES['name'],$filename);
			$desc_u=$_POST['text_desc'];
			$team_u=$_POST['team_select'];
			$team_t[]=($team_u);
			$permissions_u=serialize($team_t);
			
			$stm1=$mysqli->prepare("insert into `drive1`.`files` (`location`,`MEM_ID`,`TEAM_ID`,`permissions`,`desc`) values(?,?,?,?,?)");
			$stm1->bind_param('sisss',$file_name,$mem_id,$team_u,$permissions_u,$desc_u);
			$stm1->execute();
			$id_row=mysqli_insert_id($mysqli);
			$stm2=$mysqli->prepare("select `files` from `drive1`.`members` where `MEM_ID`=$mem_id ");
			$stm2->execute();
			$stm2->bind_result($file2);
			$stm2->store_result();
			if($stm2->fetch()){
				$file2_temp=unserialize($file2);
				$temp3=array();
				array_push($file2_temp,$id_row);
				
				$temp2=serialize($file2_temp);
				
				$stm3=$mysqli->prepare("update `drive1`.`members` set `files`='".$temp2."' where  `MEM_ID`=$mem_id  ");
				if($stm3->execute()){
					echo 'updated';
					}
				
				
				}
			
			
			
			
			
			}
		
	 ?>
    <style>
    	body{
			font-family:verdana;
			margin:0 0 0 0;
			

			}
		h3{
			font-weight:100;
			}
		.nav_bar_outer{
			width:100%;
			}
		.nav_bar_inner{
			background: rgb(73,192,240);
background: -moz-linear-gradient(top,  rgba(73,192,240,1) 0%, rgba(44,175,227,1) 100%);
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(73,192,240,1)), color-stop(100%,rgba(44,175,227,1)));
background: -webkit-linear-gradient(top,  rgba(73,192,240,1) 0%,rgba(44,175,227,1) 100%);
background: -o-linear-gradient(top,  rgba(73,192,240,1) 0%,rgba(44,175,227,1) 100%);
background: -ms-linear-gradient(top,  rgba(73,192,240,1) 0%,rgba(44,175,227,1) 100%);
background: linear-gradient(to bottom,  rgba(73,192,240,1) 0%,rgba(44,175,227,1) 100%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#49c0f0', endColorstr='#2cafe3',GradientType=0 );
			border-bottom: 2px solid rgb(10, 91, 160);
			background-color:white;
			padding:5px;
			}
		.drive1_name h2{
			padding-left:100px;
			
			}
		.welcome_msg{
			  text-align: center;
		  font-size: 18px;
		  box-shadow: 0px 0px 30px 1px #848484;
			}
		.welcome_msg h3{
			margin: 0px;
			padding: 7px;

		}
		.welcome_msg button{
			cursor:pointer;
			float: right;
		    background-color: #3FD2F4;
		    padding: 7px 30px;
  			border: 1px solid #19A0B2;
			margin-right:100px;
			}
		.main_container{
			padding:30px;
			}
		.self_upload_main{
			padding:5px;
			
		} 
		.self_upload_main ul{
			list-style:none;
			}
		.self_upload_main li{
			margin:0px;
			background: rgb(255,255,255);
background: -moz-linear-gradient(top,  rgba(255,255,255,1) 0%, rgba(246,246,246,1) 47%, rgba(237,237,237,1) 100%);
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(255,255,255,1)), color-stop(47%,rgba(246,246,246,1)), color-stop(100%,rgba(237,237,237,1)));
background: -webkit-linear-gradient(top,  rgba(255,255,255,1) 0%,rgba(246,246,246,1) 47%,rgba(237,237,237,1) 100%);
background: -o-linear-gradient(top,  rgba(255,255,255,1) 0%,rgba(246,246,246,1) 47%,rgba(237,237,237,1) 100%);
background: -ms-linear-gradient(top,  rgba(255,255,255,1) 0%,rgba(246,246,246,1) 47%,rgba(237,237,237,1) 100%);
background: linear-gradient(to bottom,  rgba(255,255,255,1) 0%,rgba(246,246,246,1) 47%,rgba(237,237,237,1) 100%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ffffff', endColorstr='#ededed',GradientType=0 );
			box-shadow:0px 0px 5px 1px #999;
			cursor:pointer;	
			}
			
		.self_upload_main li:hover{
			box-shadow:0px 0px 5px 1px #0794BF;
			}
		.self_upload_main li span{
			padding:31px;
			float:left;
				
			background: rgb(183,222,237);
background: -moz-linear-gradient(-45deg,  rgba(183,222,237,1) 0%, rgba(113,206,239,1) 50%, rgba(33,180,226,1) 51%, rgba(183,222,237,1) 100%);
background: -webkit-gradient(linear, left top, right bottom, color-stop(0%,rgba(183,222,237,1)), color-stop(50%,rgba(113,206,239,1)), color-stop(51%,rgba(33,180,226,1)), color-stop(100%,rgba(183,222,237,1)));
background: -webkit-linear-gradient(-45deg,  rgba(183,222,237,1) 0%,rgba(113,206,239,1) 50%,rgba(33,180,226,1) 51%,rgba(183,222,237,1) 100%);
background: -o-linear-gradient(-45deg,  rgba(183,222,237,1) 0%,rgba(113,206,239,1) 50%,rgba(33,180,226,1) 51%,rgba(183,222,237,1) 100%);
background: -ms-linear-gradient(-45deg,  rgba(183,222,237,1) 0%,rgba(113,206,239,1) 50%,rgba(33,180,226,1) 51%,rgba(183,222,237,1) 100%);
background: linear-gradient(135deg,  rgba(183,222,237,1) 0%,rgba(113,206,239,1) 50%,rgba(33,180,226,1) 51%,rgba(183,222,237,1) 100%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#b7deed', endColorstr='#b7deed',GradientType=1 );

			
			}
		.self_upload_main li p{
			padding: 21px 10px;
			margin:0 0 0 0;
			display:inline-block;
			}
		.no_files{
			color:#999;
			}
		.team_desc{
			display:inline-block;
			color:#16B8B2;
			}
		.upload_outer{
			display:inline-block;
			margin:50px 150px;
			box-shadow:0px 0px 1px 1px #999;
			
			}
		.upload_outer h3{
			margin:0 0 0 0;
			padding: 100px 	150px;
			border-right:1px solid #999;
			background: -moz-linear-gradient(top,  rgba(206,219,233,0.33) 0%, rgba(170,197,222,0.32) 17%, rgba(97,153,199,0.3) 50%, rgba(58,132,195,0.3) 51%, rgba(65,154,214,0.3) 59%, rgba(75,184,240,0.29) 71%, rgba(58,139,194,0.28) 84%, rgba(38,85,139,0.27) 100%); /* FF3.6+ */
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(206,219,233,0.33)), color-stop(17%,rgba(170,197,222,0.32)), color-stop(50%,rgba(97,153,199,0.3)), color-stop(51%,rgba(58,132,195,0.3)), color-stop(59%,rgba(65,154,214,0.3)), color-stop(71%,rgba(75,184,240,0.29)), color-stop(84%,rgba(58,139,194,0.28)), color-stop(100%,rgba(38,85,139,0.27))); /* Chrome,Safari4+ */
background: -webkit-linear-gradient(top,  rgba(206,219,233,0.33) 0%,rgba(170,197,222,0.32) 17%,rgba(97,153,199,0.3) 50%,rgba(58,132,195,0.3) 51%,rgba(65,154,214,0.3) 59%,rgba(75,184,240,0.29) 71%,rgba(58,139,194,0.28) 84%,rgba(38,85,139,0.27) 100%); /* Chrome10+,Safari5.1+ */
background: -o-linear-gradient(top,  rgba(206,219,233,0.33) 0%,rgba(170,197,222,0.32) 17%,rgba(97,153,199,0.3) 50%,rgba(58,132,195,0.3) 51%,rgba(65,154,214,0.3) 59%,rgba(75,184,240,0.29) 71%,rgba(58,139,194,0.28) 84%,rgba(38,85,139,0.27) 100%); /* Opera 11.10+ */
background: -ms-linear-gradient(top,  rgba(206,219,233,0.33) 0%,rgba(170,197,222,0.32) 17%,rgba(97,153,199,0.3) 50%,rgba(58,132,195,0.3) 51%,rgba(65,154,214,0.3) 59%,rgba(75,184,240,0.29) 71%,rgba(58,139,194,0.28) 84%,rgba(38,85,139,0.27) 100%); /* IE10+ */
background: linear-gradient(to bottom,  rgba(206,219,233,0.33) 0%,rgba(170,197,222,0.32) 17%,rgba(97,153,199,0.3) 50%,rgba(58,132,195,0.3) 51%,rgba(65,154,214,0.3) 59%,rgba(75,184,240,0.29) 71%,rgba(58,139,194,0.28) 84%,rgba(38,85,139,0.27) 100%); /* W3C */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#54cedbe9', endColorstr='#4526558b',GradientType=0 ); /* IE6-9 */




			}
		.upload_outer h3,.upload_file{
			
			float:left;
			}
		.upload_main,.submit{
			margin:10px 30px;
			}
		.text_desc,.team_select{
			padding:5px;
			width:200px;	
			border:1px solid #999;
			margin:10px 30px;
			}
		   </style>
	<div class="global_container">
        <div class="nav_bar_outer">
            <div class="nav_bar_inner">
                <div class="drive1_name">
                    <h2>CLOUD CORPORATES</h2>
                </div>
            </div>
        </div>
        <div class="welcome_msg">
        		<h3>hey,<?PHP echo $name; ?>.Welcome to your drive1.</h3>
                
            </div>
        <div class="main_container">
        	
           <div class="self_uploads_outer">
           		<div class="self_upload_inner">
                	<h3>Your files..</h3>
                    <br/>
                    <div class="self_upload_main">
                    	<ul>
                        	<?PHP 
								
								if($files){
									 echo "<ul>";
									 $files=unserialize($files);
									 
									foreach($files as $add){
										
										$stm=$mysqli->prepare("select * from `drive1`.`files` where `FILE_ID`='".$add."' ");
										$stm->execute();
										$stm->bind_result($file_id,$location,$mem_id,$team_id,$permissions,$desc);
										$stm->store_result();
										$stm->fetch();
										$temp="data/mem_folder_".$mem_id;
									
										if(file_exists($temp)){
											
											echo "<li id='".$add."'><span></span><p> ".$desc."</p></li><br/>";
											
											}
										}
									echo "</ul>";
									}	
							?>
                        </ul>
                    </div>
                    <h3>Your shared files..</h3>
                    <br/>
                    <div class="self_upload_main shared_upload">
                    	<ul>
                    		<?PHP 
								
								if($shared_files){
									 echo "<ul>";
									 $shared_files=unserialize($shared_files);
									 
									foreach($shared_files as $shared_add){
										
										$stm=$mysqli->prepare("select * from `drive11`.`files` where `FILE_ID`='".$shared_add."' ");
										$stm->execute();
										$stm->bind_result($file_id,$location,$mem_id,$team_id,$permissions,$desc);
										$stm->store_result();
										$stm->fetch();
										$temp="data/mem_folder_".$mem_id;
									
										if(file_exists($temp)){
											if($team_id){
												$stm=$mysqli->prepare("select * from `drive1`.`teams` where `TEAM_ID`='".$team_id."' ");
												$stm->execute();
												$stm->bind_result($team_id,$team_desc,$team_mem,$team_leader,$files);
												$stm->store_result();
												$stm->fetch();
												}
											echo "<li id='".$add."'><span></span><p>".$desc."</p><p class='team_desc'>on ".$team_desc."</p></li><br/>";
											
											}
										}
									echo "</ul>";
									}
								else{
									echo "<p class='no_files' >no files here..</p>";
									}	
							?>
                        </ul>
                    </div>
                </div>
           </div>
             <h3>you can just share your files with your team..</h3>
           <div class="upload_outer">
           		<div class="upload_inner">
                	<h3>upload!</h3> 
                 
                    <form action="" class="upload_file" name="upload" enctype="multipart/form-data" method="post" >
                    	<input type="text" class="text_desc" name="text_desc" placeholder="description" >
                        <br/>
                    	<input type="file" name="file"  class="upload_main"><br/>	
                       
                        <select class="team_select" name="team_select">
                        	<option></option>
                        	<option value="2">project 1</option>
                            <option value="4">project drive1</option>
                            <option value="34">project website</option>
                       </select>
                       <br/>
                       <input type="submit" name="upload_submit" class="submit" value="upload">
                       
                       	
                    </form> 
                </div>
           </div>
        </div>
    </div>
   
</body>
</html>