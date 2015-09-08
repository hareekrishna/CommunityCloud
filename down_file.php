<?PHP
if(isset($_POST['down_submit'])){ 
		if(isset($_POST['down_file_id'])){ 
			include('../hree/cred.php');

						$stm=$mysqli->prepare("select * from `drive`.`files` where `FILE_ID`='".$_POST['down_file_id']."' ");
						$stm->execute();
						$stm->bind_result($file_id,$location,$mem_id,$team_id,$permissions,$desc,$salt);
						$stm->store_result();
						if($stm->fetch()){
							if(file_exists($location)){
								$temp1=explode("/",$location);
								$filename=end($temp1);
								$temp3=explode("_",$filename);
								$filename_temp3=str_replace($temp3[0].'_',"",$filename);
								$filename_temp=str_replace(".hree","",$filename_temp3);
								
								$temp2='data/temp/';
								$decrypted_file=$temp2.$filename_temp;
								require_once('aes256/AESCryptFileLib.php');
			
								require_once ('aes256/MCryptAES256Implementation.php');
								
								$mcrypt = new MCryptAES256Implementation();
								
								$lib = new AESCryptFileLib($mcrypt);
								
								$lib->decryptFile($location, $salt, $decrypted_file);
								header('Content-Description: File Transfer');
								header('Content-Type: application/octet-stream');
								header('Content-Disposition: attachment; filename='.basename($decrypted_file));
								header('Expires: 0');
								header('Cache-Control: must-revalidate');
								header('Pragma: public');
								header('Content-Length: ' . filesize($decrypted_file));
										ob_end_flush();					
								if(readfile($decrypted_file)){
									unlink($decrypted_file);
									}
								else{
									echo 'the file you have requested seems expired.Please try uploading again.<a href="www.communitycloud.in">home</a>';
									}
								}
							else{
								echo 'the file you have requested seems expired.Please try uploading again.<a href="www.communitycloud.in">home</a>';
								}
							}
							else{
								echo 'the file you have requested seems expired.Please try uploading again.<a href="www.communitycloud.in">home</a>';
								}
						
					
			
			}
			else{
								echo 'the file you have requested seems expired.Please try uploading again.<a href="www.communitycloud.in">home</a>';
								}
		}
		else{
								echo 'the file you have requested seems expired.Please try uploading again.<a href="www.communitycloud.in">home</a>';
								}

 ?>