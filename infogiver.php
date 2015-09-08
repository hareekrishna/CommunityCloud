<?PHP 
header('Content-type: application/json');
function sec_session_start() {
						$session_name = 'sec_session_id';
						$secure = false;
						$httponly = true; 
						ini_set('session.use_only_cookies', 1);
						$cookieParams = session_get_cookie_params(); 
						session_set_cookie_params($cookieParams["lifetime"], $cookieParams["path"], $cookieParams["domain"], $secure, $httponly); 
						session_name($session_name); 
						if(!isset($_SESSION)){
							session_start();
							}
						session_regenerate_id(); 	 
						}
function gen_randString($length){
	$char='0123456789qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM';
	$charlength=strlen($char);
	$rand_string='';
	for($i=0;$i<$length;$i++){
		$rand_string.=$char[rand(0,$charlength-1)];
		}
	return $rand_string;
	}
		sec_session_start();
		include('../hree/cred.php');

		$now = time();
		if (isset($_SESSION['discard_after']) && $now > $_SESSION['discard_after']) {
			
			session_unset();
			session_destroy();
			session_start();
		}
		
		
		$_SESSION['discard_after'] = $now + 3600;
		if(isset($_SESSION['mobile_no'])){ 
		$mobile_no=$_SESSION['mobile_no'];
		
if(isset($_POST['rand_no']) && $_POST['flag']=='init'){ 
		
		
			
		$stm=$mysqli->prepare("select * from `drive`.`members` where `number`=$mobile_no "); 
		$stm->execute();
			
		$stm->bind_result($mem_id,$name,$designation,$teams,$files,$shared_files,$number,$tkt,$active);
		$stm->store_result();
		if($stm->fetch()){
			$rows=$stm->num_rows(); 
			if($rows == 0){
				echo false;
				exit;	
				}
			$json='[';
			$json.='{"mem_id":"'.$mem_id.'",';
			$json.='"name":"'.$name.'",';
			$json.='"designation":"'.$designation.'",';
			$json.='"teams":"'.$teams.'",';
			$json.='"files":'.json_encode($files).',';
			$json.='"shared_files":'.json_encode($shared_files).',';
			$json.='"number":"'.$number.'"}';
			$json.=']';
			echo $json;
			}
			else {
			echo 'false';
			}
		}
		if(isset($_POST['mobile_no']) && $_POST['flag']=='init'){ 
		
			
		$stm=$mysqli->prepare("select * from `drive`.`members` where `number`=$mobile_no "); 
		$stm->execute();
			
		$stm->bind_result($mem_id,$name,$designation,$teams,$files,$shared_files,$number,$tkt,$active);
		$stm->store_result();
		if($stm->fetch()){
			$rows=$stm->num_rows(); 
			if($rows == 0){
				echo false;
				exit;	
				}
			$json='[';
			$json.='{"mem_id":"'.$mem_id.'",';
			$json.='"name":"'.$name.'",';
			$json.='"designation":"'.$designation.'",';
			$json.='"teams":"'.$teams.'",';
			$json.='"files":'.json_encode($files).',';
			$json.='"shared_files":'.json_encode($shared_files).',';
			$json.='"number":"'.$number.'"}';
			$json.=']';
			echo $json;
			}
			else {
			echo 'false';
			}
		}
		

		

		if($_POST['flag']=='files_list' && isset($_POST['files'])){
			$files=$_POST['files'];
			$files_un=array();
			$files_un=unserialize($files);
			
			if($files_un){
				$json='[';
 				foreach($files_un as $add){
					
					
						$stm=$mysqli->prepare("select * from `drive`.`files` where `FILE_ID`='".$add."' ");
						$stm->execute();
						$stm->bind_result($file_id,$location,$mem_id,$team_id,$permissions,$desc,$salt);
						$stm->store_result();
						$stm->fetch();
						$temp="data/mem_folder_".$mem_id;
						 if($json !='['){
						 $json.=',';
						 }
						 $temp_l=str_replace(".hree","",$location);
						$ext=explode(".",$temp_l);
						$ext1=end($ext);
						$json.='{"file_id":"'.$file_id.'",';
						$json.='"location":"'.$location.'",';
						$json.='"ext":"'.$ext1.'",';
						$json.='"mem_id":"'.$mem_id.'",';
						$json.='"team_id":"'.$team_id.'",';
						$json.='"permissions":'.json_encode($permissions).',';
						$json.='"desc":"'.$desc.'"}';
						
					}	
						$json.=']';
						echo $json;
				}
					
															
		
			}
		if($_POST['flag']=='share_list_info'){
			
					
					$stm=$mysqli->prepare("select `shared_files` from `drive`.`members` where `number`='".$mobile_no."' ");
					$stm->execute();
					$stm->bind_result($shared_files);
					$stm->store_result();
					if($stm->fetch()){
						if($shared_files){
								$sh_files=unserialize($shared_files);
								foreach($sh_files as $file_id){
									$stm=$mysqli->prepare("select * from `drive`.`files` where `FILE_ID`='".$file_id."' ");
									$stm->execute();
									$stm->bind_result($file_id,$location,$mem_id,$team_id,$permissions,$desc,$salt);
									$stm->store_result();
									if($stm->fetch()){
										if($mem_id){
											 $temp_l=str_replace(".hree","",$location);
											$ext=explode(".",$temp_l);
											$ext1=end($ext);
											array_push($array,array( 
															'file_id'=>$file_id,
															'ext'=>$ext1,
															'location'=>$location,
															'mem_id'=>$mem_id,
															'team_id'=>$team_id,
															'permissions'=>$permissions,
															'desc'=>$desc,
															));
											}
										}
									}
								}
							echo(json_encode($array));
						}
		}
		if($_POST['flag']=='team_list_info'){
			
					
					$array=array();
					$array['team']=array();
					//$array['team']['files']=array();
					$array['shared_file']=array();
					
					$stm=$mysqli->prepare("select `teams`,`shared_files` from `drive`.`members` where `number`='".$mobile_no."' ");
					$stm->execute();
					$stm->bind_result($teams,$shared_files);
					$stm->store_result();
					if($stm->fetch()){
						
							
						if($teams){
							$team_temp=unserialize($teams);
							foreach($team_temp as $team_id2){
								$stm=$mysqli->prepare("select `TEAM_ID`,`team_desc`,`team_members`,`team_leader`,`files` from `drive`.`teams` where `TEAM_ID`='".$team_id2."' ");
									$stm->execute();
									$stm->bind_result($team_id1,$team_desc,$team_mem,$team_leader,$files);
									$stm->store_result();
									if($stm->fetch()){
										if($team_id1){
											$file_array=array();
											if($files){
											$temp_f=unserialize($files);
											
											foreach($temp_f as $file_id){
												$stm=$mysqli->prepare("select * from `drive`.`files` where `FILE_ID`='".$file_id."' ");
												$stm->execute();
												$stm->bind_result($file_id,$location,$mem_id,$team_id,$permissions,$desc,$salt);
												$stm->store_result();
												if($stm->fetch()){
													if($mem_id){
														 $temp_l=str_replace(".hree","",$location);
														$ext=explode(".",$temp_l);
														$ext1=end($ext);
														
														array_push($file_array,array(
																		'team_id'=>$team_id,
																		'file_id'=>$file_id,
																		'ext'=>$ext1,
																		'location'=>$location,
																		'mem_id'=>$mem_id,
																		'team_id'=>$team_id,
																		'permissions'=>$permissions,
																		'desc'=>$desc
																		));
												
															}
													}
												}
											}
										
										array_push($array['team'],array( 
														 
															'team_id'=>$team_id1,
															'team_desc'=>$team_desc,
															'team_mem'=>$team_mem,
															'team_leader'=>$team_leader,
															'files'=>$file_array,
															));
										
									}	
								}
								
									
							}
							
							}$stm->close();
					}
					
					echo(json_encode($array));
		}
		if($_POST['flag']=='file_info' && isset($_POST['file_id'])){
			$file_id=$_POST['file_id'];
			$json='[';
			if($file_id){
			
					
						$stm=$mysqli->prepare("select * from `drive`.`files` where `FILE_ID`='".$file_id."' ");
						$stm->execute();
						$stm->bind_result($file_id,$location,$mem_id,$team_id,$permissions,$desc,$salt);
						$stm->store_result();
						$stm->fetch();
						$temp="data/mem_folder_".$mem_id;
						 if($json !='['){
						 $json.=',';
						 }
						 $temp_l=str_replace(".hree","",$location);
						$ext=explode(".",$temp_l);
						
						$ext1=end($ext);
						$json.='{"file_id":"'.$file_id.'",';
						$json.='"location":"'.$location.'",';
						$json.='"ext":"'.$ext1.'",';
						$json.='"mem_id":"'.$mem_id.'",';
						$json.='"team_id":"'.$team_id.'",';
						$json.='"permissions":'.json_encode($permissions).',';
						$json.='"desc":"'.$desc.'"}';
						
					}	
						$json.=']';
						echo $json;
			}
		if(isset($_POST['down_submit'] , $_POST['down_file_id'])){ 
				$file_id=$_POST['down_file_id'];
			
			$file_id=$_POST['file_id'];
			
			$stm=$mysqli->prepare("select `location`,`salt` from `drive`.`files` where `FILE_ID`='".$file_id."' ");
						$stm->execute();
						$stm->bind_result($location,$salt);
						$stm->store_result();
						$stm->fetch(); echo $location."33232"; 
				if(file_exists($location)){
					
					echo $location;
					readfile($location);
					if(!readfile($location)){
						echo 323;
						}
					}
				else{
					echo false;
					}
			}
		if($_POST['flag']=='people_submit' && isset($_POST['desc'] , $_POST['add_id'])){
			$team_y=array();
			
				
			if($_POST['desc']){
				$stm=$mysqli->prepare("select `MEM_ID`,`designation` from `drive`.`members` where `number`='".$mobile_no."' ");
				$stm->execute();
				$stm->bind_result($mem_id,$desig);
				$stm->store_result();
				$stm->fetch();
				$stm->close();
				$arr=$arr1=array();
				$arr=$_POST['add_id']; 
				$temp=explode("-",$desig);
				$temp1=explode('@',end($temp));
				
				foreach($arr as $arr_t){
					array_push($arr1,intval($arr_t));
					}
				array_push($arr1,$mem_id); 
				$temp=serialize($arr1);
				$stm1=$mysqli->prepare("insert into `drive`.`teams` (`team_desc`,`team_members`,`team_dept`,`team_leader`) values(?,?,?,?)");
			$stm1->bind_param('ssii',$_POST['desc'],$temp,end($temp),$mem_id);
			$stm1->execute();
			$id_row=mysqli_insert_id($mysqli);
			$flag=0;
			foreach($arr as $arr_temp){
				$flag=0;
			$stm=$mysqli->prepare("select `teams` from `drive`.`members` where `MEM_ID`='".$arr_temp."' ");
			$stm->execute();
			$stm->bind_result($teams);
			$stm->store_result();
			$stm->fetch();
				if($teams)
				$team_y=unserialize($teams);
				
				array_push($team_y,$id_row);
				$team_p=serialize($team_y);
				$stm21=$mysqli->prepare("update `drive`.`members` set `teams`='".$team_p."' where `number`='".$mobile_no."'");
				$stm2=$mysqli->prepare("update `drive`.`members` set `teams`='".$team_p."' where `MEM_ID`='".$arr_temp."'");
							if($stm2->execute() && $stm21->execute()){
								$flag=1;
								}
							
					} 
				if($flag==1){
					echo 'updated_'.$id_row;
					}
				
				}
			}
		if($_POST['flag']=='team_permit_list' && isset($_POST['file_id'])){
			$file_id=$_POST['file_id'];
			$json='[';
			$array=array();
			$array['team']=$array['team']['files']=$array['mem']=array();
			
			if($file_id){
			
					$stm=$mysqli->prepare("select `permissions` from `drive`.`files` where `FILE_ID`='".$file_id."' ");
						$stm->execute();
						$stm->bind_result($permissions);
						$stm->store_result();
						$stm->fetch();
					if($permissions){
						$temp=unserialize($permissions);
						$needle='T';
						if($temp[0]){
							foreach($temp as $id_temp){
								if(strlen(strpos($id_temp,$needle))>0){
									$team_id=str_replace($needle,'',$id_temp);
									$stm=$mysqli->prepare("select `TEAM_ID`,`team_desc`,`team_members`,`team_leader`,`files` from `drive`.`teams` where `TEAM_ID`='".$team_id."' ");
									$stm->execute();
									$stm->bind_result($team_id1,$team_desc,$team_mem,$team_leader,$files);
									$stm->store_result();
									if($stm->fetch()){
										if($team_id1){ 
												array_push($array['team'],array( 
														 
															'team_id'=>$team_id1,
															'team_desc'=>$team_desc,
															'team_mem'=>$team_mem,
															'team_leader'=>$team_leader,
															'files'=>$files));
														
										}
										}
									$stm->close();
									}
								else{
									$stm=$mysqli->prepare("select * from `drive`.`members` where `MEM_ID`='".$id_temp."' ");
									$stm->execute();
									$stm->bind_result($mem_id,$name,$designation,$teams,$files,$shared_files,$number,$tkt,$active);
									$stm->store_result();
									if($stm->fetch()){
										if($mem_id){
											array_push($array['mem'],array( 
															'mem_id'=>$mem_id,
															'name'=>$name,
															));
											}
										}
									}
								
								}
							echo(json_encode($array));
							}
						else{
							echo false;
							}
						}
					
				}
			}
		if($_POST['flag']=='share_list' && isset($_POST['rand_no'])){
			$array=array();
			$mobile_no=$_SESSION['mobile_no'];
			$array['team']=array();
			$array['mem']=array();
			
					$stm=$mysqli->prepare("select `MEM_ID`,`name` from `drive`.`members`   ");
						$stm->execute();
						$stm->bind_result($mem_id,$name);
						$stm->store_result();
						while($stm->fetch()){
							array_push($array['mem'],array(
															'mem_id'=>$mem_id,
															'name'=>$name,
																));
							}
					$stm->close();
					$stm1=$mysqli->prepare("select `teams` from `drive`.`members` where `number`='".$mobile_no."' ");
					$stm1->execute();
					$stm1->bind_result($teams);
					$stm1->store_result();
					$stm1->fetch();
					$stm1->close();
					if($teams){
					$temp_team=unserialize($teams);
					foreach($temp_team as $team_id_temp){
						$stm=$mysqli->prepare("select `TEAM_ID`,`team_desc` from `drive`.`teams` where `TEAM_ID`='".$team_id_temp."' ");
									$stm->execute();
									$stm->bind_result($team_id1,$team_desc);
									$stm->store_result();
									if($stm->fetch()){
										if($team_id1){ 
												array_push($array['team'],array( 
														 
															'team_id'=>$team_id1,
															'team_desc'=>$team_desc,
															));
														
										}
										}
						}
					}
					echo(json_encode($array));
					
			
			}
		if($_POST['flag']=='whoishe'){
			$stm1=$mysqli->prepare("select `designation` from `drive`.`members` where `number`='".$mobile_no."' ");
					$stm1->execute();
					$stm1->bind_result($desig);
					$stm1->store_result();
					$stm1->fetch();
					$stm1->close();
					$temp=explode("-",$desig);
					$temp1=explode('@',end($temp));
					if($temp1[0]==1){
						switch (end($temp1)){
							case '0':$d='Analytics';
									 break;
							case '1':$d='Designers';
									 break;
							case '2':$d='Developers';
									 break;
							case '3':$d='Testing';
									 break;
							default:$d='Analytics';
							}
					$array=array('status'=>'heisgood','placeholder'=>$d);
					$_SESSION['team_id']=end($temp1);
					echo json_encode($array);
						}
					else {
						echo false;
						}
			
			}
		if($_POST['flag']=='search_team_name' && isset($_POST['team_name'])){
			$team_name=$_POST['team_name'];
			$array=array();
		
			$array['team']=$file_array=array();
			$stm=$mysqli->prepare("select `TEAM_ID`,`team_desc`,`team_members`,`team_leader`,`files` from `drive`.`teams` where `team_desc`='".$team_name."' and `team_dept`='".$_SESSION['team_id']."' ");
									$stm->execute();
									$stm->bind_result($team_id1,$team_desc,$team_mem,$team_leader,$files);
									$stm->store_result();
									if($stm->fetch()){
										if($team_id1){
											$file_array=array();
											if($files){
											$temp_f=unserialize($files);
											
											foreach($temp_f as $file_id){
												$stm=$mysqli->prepare("select * from `drive`.`files` where `FILE_ID`='".$file_id."' ");
												$stm->execute();
												$stm->bind_result($file_id,$location,$mem_id,$team_id,$permissions,$desc,$salt);
												$stm->store_result();
												if($stm->fetch()){
													if($mem_id){
														 $temp_l=str_replace(".hree","",$location);
														$ext=explode(".",$temp_l);
														$ext1=end($ext);
														
														array_push($file_array,array(
																		'team_id'=>$team_id,
																		'file_id'=>$file_id,
																		'ext'=>$ext1,
																		'location'=>$location,
																		'mem_id'=>$mem_id,
																		'team_id'=>$team_id,
																		'permissions'=>$permissions,
																		'desc'=>$desc
																		));
												
															}
													}
												}
											}
										
										array_push($array['team'],array( 
														 
															'team_id'=>$team_id1,
															'team_desc'=>$team_desc,
															'team_mem'=>$team_mem,
															'team_leader'=>$team_leader,
															'files'=>$file_array,
															));
										
									}
								}
							echo json_encode($array);
			}
		if($_POST['flag']=='people_list' && isset($_POST['rand_no'])){
			$array=array();
			$mobile_no=$_SESSION['mobile_no'];
			
			
					$stm=$mysqli->prepare("select `MEM_ID`,`name` from `drive`.`members`   ");
						$stm->execute();
						$stm->bind_result($mem_id,$name);
						$stm->store_result();
						while($stm->fetch()){
							$stm1=$mysqli->prepare("select `MEM_ID` from `drive`.`members` where `number`='".$mobile_no."'   ");
							$stm1->execute();
							$stm1->bind_result($mem_id1);
							$stm1->store_result();
							$stm1->fetch();
							if($mem_id != $mem_id1){
							array_push($array,array(
															'mem_id'=>$mem_id,
															'name'=>$name,
																));
							}
						}
					$stm->close();
					$stm1->close();
					
					
					echo(json_encode($array));
					
			
			}
		if(isset($_POST['file_id'] , $_POST['mem_id'] , $_POST['div']) && $_POST['flag']=='add_sharing'){
			$file_id=$_POST['file_id'];
			$mem_id=$_POST['mem_id'];
			$per_temp=array();
			$d=$t="";
			
					if(strlen(strpos($mem_id,"t_s_"))>0){
						$d=str_replace("t_s_","",$mem_id);
						$add_m='T'.$d;
						
						}
					else{
						if(strlen(strpos($mem_id,"m_s_"))>0){
							$t=str_replace("m_s_","",$mem_id);
							$add_m=$t;
							$sh_temp=array();
							$stm2=$mysqli->prepare("select `shared_files` from `drive`.`members` where `MEM_ID`=$t");
							$stm2->execute();
							$stm2->bind_result($shared_files);
							$stm2->store_result();
							if($stm2->fetch()){
								if($shared_files)	
								$sh_temp=unserialize($shared_files);
								if(in_array($file_id,$sh_temp)==false){
								array_push($sh_temp,$file_id);
								$sh_temp1=serialize($sh_temp); 
							$stm2=$mysqli->prepare("update `drive`.`members` set `shared_files`='".$sh_temp1."' where `MEM_ID`=$t");
							$stm2->execute();
							}
							}
							}
					}
					
					$stm=$mysqli->prepare("select `permissions` from `drive`.`files` where `FILE_ID`=$file_id");
					$stm->execute();
					$stm->bind_result($permissions);
					$stm->store_result();
					if($stm->fetch()){
						if($permissions)	
					$per_temp=unserialize($permissions);
					if(in_array($add_m,$per_temp)==false){
					array_push($per_temp,$add_m);
					$add_per_temp=serialize($per_temp);
					
					$stm->close();
					$stm1=$mysqli->prepare("update `drive`.`files` set `permissions`='".$add_per_temp."' where `FILE_ID`=$file_id");
					if($stm1->execute()){
						
						}
					}
					}					
			}
		}
			if(isset($_POST['rand_code'] , $_POST['mobile_no']) && ($_POST['flag']=='thru_pc_init')){
					
					$mobile_no=htmlspecialchars($_POST['mobile_no']);
					$stm=$mysqli->prepare("update `drive`.`qrcodes` set `mobile_id`='".$mobile_no."' where `code_no`='".$_POST['rand_code']."'");
					if($stm->execute()){
						echo 'updated';
						}
					else{
						echo false;
						}
				}
			if($_POST['flag']=='qrcode_check'){
				
				
				sec_session_start();
				
			
				$qrcode_check=$_SESSION['qrcode'];
				$string_check=$_SESSION['string'];
				
				$stm=$mysqli->prepare("select `mobile_id` from `drive`.`qrcodes` where `code_no`='".$qrcode_check."' LIMIT 1 ");
				$stm->execute();
				if($stm->num_rows>0){
					$stm->bind_result($mobile_no_check);
					$stm->store_result();
					$stm->fetch();
					echo $mobile_no_check;
					}
				
				}
			if(isset($_POST['qrcode']) && $_POST['flag']=='qrcode_init'){
				
				$qrcode=$_POST['qrcode'];
				
				
					
					$user_browser=$_SERVER['HTTP_USER_AGENT'];
					$string=hash('sha512',$qrcode.$user_browser);
					$stm=$mysqli->prepare("insert into `drive`.`qrcodes` (`code_no`,`session_hash`) values(?,?) ");
					$stm->bind_param('ss',$qrcode,$string);
					if($stm->execute()){
						
						sec_session_start();
						
						
						$_SESSION['qrcode']=$qrcode;
						
						$_SESSION['string']=$string;
						echo $qrcode;
						}
					
					
					
					
				}
			if($_POST['flag']=='qrcode_check'){
				
				sec_session_start();
				
				$qrcode_check=$_SESSION['qrcode'];
				$string_check=$_SESSION['string'];
				
				$stm=$mysqli->prepare("select `mobile_id` from `drive`.`qrcodes` where `code_no`='".$qrcode_check."' LIMIT 1 ");
				
				if($stm->execute()){
					$stm->bind_result($mobile_no_check);
					$stm->store_result();
					$stm->fetch();
					$_SESSION['mobile_no']= $mobile_no_check;
					echo 'authenticated';
					}
				
				}
			
			if(isset($_POST['mobile_no_check']) && $_POST['flag']=='thru_pc_check'){
				$mobile_no_check=$_POST['mobile_no_check'];
				$session_hash='';
				sec_session_start();
				
					$stm=$mysqli->prepare("select `session_hash`,`mobile_id` from `drive`.`qrcodes` where `code_no`='".$mobile_no_check."'  ");
					if($stm->execute()){
				
					$stm->bind_result($session_hash,$mobile_no);
					$stm->store_result();
					$stm->fetch();
					if($session_hash){ 
						$qrcode_check=$_SESSION['qrcode'];
						$string_check=$_SESSION['string'];
						
						$string_check_temp=hash('sha512',$qrcode_check.$_SERVER['HTTP_USER_AGENT']);
						if($string_check_temp==$session_hash && $session_hash==$string_check){
							$json='[';
							$json.= '{"status":"authenticated",';
							$json.='"mobile_no":"'.$mobile_no.'"}]';
							echo $json;
							$_SESSION['mobile_no']=$mobile_no;
							
							$stm->close();
							$stm1=$mysqli->prepare("delete  from `drive`.`qrcodes` where `code_no`='".$mobile_no_check."'");
							$stm1->execute();							
							}
							else{
								echo 'false';
								}
						}
						else{
							echo 'false';
						}
					}
					else{
							echo 'false';
						}
					
				}
			else{
				echo false;
				}
if(isset($_POST['admin_name'] , $_POST['admin_pass']) && $_POST['flag']=='admin_login'){
	$admin_name=$_POST['admin_name'];
	$admin_pass=$_POST['admin_pass'];
	if($stm=$mysqli->prepare("select * from `drive`.`officials` where `name`='".$admin_name."'")){
		$stm->execute();
		$stm->bind_result($memid,$name,$pass,$salt);
		$stm->store_result();
		$stm->fetch();
		if($pass){
			$temp=hash('sha512',$admin_pass.$salt);
			if($temp===$pass){
				$_SESSION['admin_name']=$admin_name;
				$_SESSION['admin_hash']=hash('sha512',$pass.$_SERVER['HTTP_USER_AGENT']);
				echo 'authenticate';
				
				
				}
			else{
				echo false;
				}
			}
			else{
				echo false;
				}
		
			}
			else{
				echo false;
				}
	
		
	
	}
if($_POST['flag']=='qrcode_get_edit'){
				
				
				sec_session_start();
				
			
				$qrcode_check=$_SESSION['qrcode'];
				$string_check=$_SESSION['string'];
				
				$stm=$mysqli->prepare("select `mobile_id` from `drive`.`qrcodes` where `code_no`='".$qrcode_check."' LIMIT 1 ");
				$stm->execute();
				if($stm->num_rows>0){
					$stm->bind_result($mobile_no_check);
					$stm->store_result();
					$stm->fetch();
					echo $mobile_no_check;
					}
				
				}
		if($_POST['flag']=='update_init' && isset($_POST['rand_code'],$_POST['mobile_no'])){
					$mobile_no=htmlspecialchars($_POST['mobile_no']);
					$stm=$mysqli->prepare("update `drive`.`qrcodes` set `mobile_id`='".$mobile_no."' where `code_no`='".$_POST['rand_code']."'");
					if($stm->execute()){
						$tck_string=gen_randString(10);
							$stm1=$mysqli->prepare("update `drive`.`members` set `tkt_string`='".$tck_string."' where `number`='".$mobile_no."'");
							if($stm1->execute()){
								$tkt=hash('sha512',$mobile_no.$tck_string);
								echo "updated_".$tkt;
								}
							else echo false;
							
						
						}
					else{
						echo false;
						}
	
		}
		if($_POST['flag'] == 'added_init' && isset($_POST['rand_code'],$_POST['mobile_no'])){
					$array=array();
					$array['status']='false';
					$mobile_no=htmlspecialchars($_POST['mobile_no']);
					$tck_string=gen_randString(10);
					$stm=$mysqli->prepare("update `drive`.`qrcodes` set `mobile_id`='".$mobile_no."', `tkt_string_temp`='".$tck_string."' where `code_no`='".$_POST['rand_code']."'");
					if($stm->execute()){
						
							$stm1=$mysqli->prepare("update `drive`.`members` set `tkt_string`='".$tck_string."' where `number`='".$mobile_no."'");
							if($stm1->execute()){
								$tkt=hash('sha512',$mobile_no.$tck_string);
								$array['status']='updated';
								$array['tkt']=$tkt;
								echo json_encode($array);
								}
							else echo false;
							}
					else{
						echo false;
						}
	
		}
		//-----------
		if($_POST['flag']=='got_qr_edit_user' && isset($_POST['rand_code'])){
			if($stm=$mysqli->prepare("select * from `drive`.`qrcodes` where `code_no`='".$_POST['rand_code']."' LIMIT 1") && $stm->execute()){
				$stm->bind-result($rand_code,$session_hash,$mobile_id,$nulltk);
				$stm->store_result();
				$stm->fetch();
				$user_browser=$_SERVER['HTTP_USER_AGENT'];
				$string=hash('sha512',$rand_code.$user_browser);
				$session_check_temp=$_SESSION['session_hash'];
				$_SESSION['mobile_id']=$mobile_id;
				if($string==$session_hash && $string==$session_check_temp){
					$stm->close();
					if($stm1=$mysqli->prepare("select `MEM_ID`,`name`,`designation`,`active` from `drive`.`members` where number ='".$mobile_id."' LIMIT 1") ){
						$stm->execute();
						$stm1->bind_result($mem_id,$name,$desig,$active);
						$stm1->store_result();
						$stm1->fetch();
						$array=array();
						$array['ceo']=$array['HOD']=$array['member']='unchecked';
						$array['active']='deactive';
						if($active=='0'){
							$array['active']='deactivated';
							$array['active_button']='activate';
							}
						else if($active=='1'){
							$array['active']='active';
							$array['active_button']='deactivate';
							}
						
						$array['name']=$name;
						$temp=explode("-",$desig);
						$temp1=explode('@',end($temp));
						if($temp[0]=='1'){
							$array['ceo']='checked';
							}
						elseif($temp1[0]=='1'){
								$array['HOD']='checked';
								}
						else{
							$array['member']='checked';
							}
						switch (end($temp1)){
							case '0':$array['dept']='Analytics';
									 break;
							case '1':$array['dept']='Designers';
									 break;
							case '2':$array['dept']='Developers';
									 break;
							case '3':$array['dept']='Testing';
									 break;
							default:$array['dept']='Analytics';
							}
						echo json_encode($array);
						}
					else{
						echo false;
						}
					}
				}
				else echo false;
			}
		if(isset($_SESSION['admin_name'],$_SESSION['admin_hash'])){ 
			$admin_name=$_SESSION['admin_name'];
			if($stm=$mysqli->prepare("select * from `drive`.`officials` where `name`='".$admin_name."' LIMIT 1") ){
						$stm->execute();
						$stm->bind_result($memid,$name,$pass,$salt);
						$stm->store_result();
						$stm->fetch();
						
						if($pass){
							if(hash('sha512',$pass.$_SERVER['HTTP_USER_AGENT'])==$_SESSION['admin_hash']){
								if($_POST['flag']=='submit_form_user_info' && isset($_POST['name'],$_POST['desig'],$_POST['dept'])){
									$name=$_POST['name'];
									$desig=$_POST['desig'];
									$dept=$_POST['dept'];
									$ceo=$HOD=$dept_s='0';
									if($desig=='ceo'){
										$ceo='1';
										}
									else if($desig=='HOD'){
										$HOD='1';
										}
									switch($dept){
										case 'Analytics':$dept_s='0';
														 break;
										case 'Designers':$dept_s='1';
														 break;
										case 'Developers':$dept_s='2';
														 break;
										case 'Testing':$dept_s='3';
														 break;
											
										}
									$dept_comb=$ceo.'-'.$HOD.'@'.$dept_s;
									if($stm1=$mysqli->prepare("update `drive`.`members` set `name`='".$name."',`designation`='".$dept_comb."' where `number`='".$_SESSION['mobile_id']."'  ") && $stm1->execute()){
											echo 'updated'; 
											}
									else{
										echo false;
										}
									
								}
								
							if($_POST['flag']=='edit_dev_n' && isset($_POST['name_d'])){
								$name_d=$_POST['name_d'];
								if($stm=$mysqli->prepare("select `name` from `drive`.`members` where `name`='".$name_d."' LIMIT 1") && $stm->execute()){
									$rows=$stm->num_rows;
									if($rows>0){
										$_SESSION['name_d']=$name_d;
										echo 'authenticate';
										}
									else echo false;
									}
								else echo false;
								}
								
							if(($_POST['flag']=='add_user_new' )&& isset($_POST['rand_code'])){ 
								$mobile_id='';
								if($stm=$mysqli->prepare("select * from `drive`.`qrcodes` where `code_no`='".$_POST['rand_code']."' LIMIT 1")){ 
									$stm->execute();
									$stm->bind_result($rand_code,$session_hash,$mobile_id,$nulltk);
									$stm->store_result();
									$stm->fetch();
									$user_browser=$_SERVER['HTTP_USER_AGENT'];
									$string=hash('sha512',$rand_code.$user_browser);
									$session_check_temp=$_SESSION['string'];
									
									if($string==$session_hash && $string==$session_check_temp && $mobile_id !=''){
										$stm->close();
										$_SESSION['mobile_id']=$mobile_id;
										
										echo 'itsthere';
										}
									}
								}
							if($_POST['flag']=='submit_form_add' && isset($_POST['rand_code'],$_POST['deptFrmBox'],$_POST['desigFrmBox'],$_POST['nameFrmBox'])){
								$deptFrmBox=htmlspecialchars($_POST['deptFrmBox']);
								$desigFrmBox=htmlspecialchars($_POST['desigFrmBox']);
								$nameFrmBox=htmlspecialchars($_POST['nameFrmBox']); 
								if($deptFrmBox !="" && $desigFrmBox != "" && $nameFrmBox !="" ){
									$ceo=$HOD=$dept_s='0';
									if($desigFrmBox=='ceo'){
										$ceo='1';
										}
									else if($desigFrmBox=='HOD'){
										$HOD='1';
										}
									switch($dept){
										case 'Analytics':$dept_s='0';
														 break;
										case 'Designers':$dept_s='1';
														 break;
										case 'Developers':$dept_s='2';
														 break;
										case 'Testing':$dept_s='3';
														 break;
											
										}
									$dept_comb=$ceo.'-'.$HOD.'@'.$dept_s;
									if($stm=$mysqli->prepare("select * from `drive`.`qrcodes` where `code_no`='".$_POST['rand_code']."' LIMIT 1")){
										$stm->execute();
										$stm->bind_result($rand_code,$session_hash,$mobile_id,$nulltk);
										$stm->store_result();
										$stm->fetch();
										$stm->close();
										$user_browser=$_SERVER['HTTP_USER_AGENT'];
										$string=hash('sha512',$rand_code.$user_browser);
										$session_check_temp=$_SESSION['string'];
										$mobile_id=$_SESSION['mobile_id'];
										if($string==$session_hash && $string==$session_check_temp){
											
											$stm1=$mysqli->prepare("insert into `drive`.`members` (`name`,`designation`, `number`,`tkt_string`) values(?,?,?,?)");
											$stm1->bind_param('ssis',$nameFrmBox,$dept_comb,$mobile_id,$nulltk);
											if($stm1->execute()){
													$row=$stm1->insert_id;
													mkdir("data/mem_folder_".$row);
													echo 'donenow';
													}
												
											}
											
									}
									} else echo false;
								}
							
								
							
				}
				else echo false;
			}
			else echo false;
		}
		else echo false;
	}
?>