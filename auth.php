<?PHP
header('Content-type: application/json');

if(isset($_POST)){
	if($_POST['flag'] == 'authenticate' && $_POST['mobile_no'] && $_POST['ticket']){
		include('../hree/cred.php');

		
		
		function generateRandomString($length) {
			$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
			$charactersLength = strlen($characters);
			$randomString = '';
			for ($i = 0; $i < $length; $i++) {
				$randomString .= $characters[rand(0, $charactersLength - 1)];
			}
			return $randomString;
			}
		$mobile_id=$_POST['mobile_no'];
		
		$ran=generateRandomString('15');
		$tkt_string_db="";	
		if($stm1=$mysqli->prepare("select `tkt_string` from `drive`.`members` where `number` = '".$mobile_id."'") ){
			$stm1->execute();
			$stm1->bind_result($tkt_string_db);
			$stm1->store_result();
			$stm1->fetch();
			if($tkt_string_db != '0'){
			$temp=hash('sha512',$mobile_id.$tkt_string_db);
			if($temp==$_POST['ticket']){
				$ran1=generateRandomString('10');
				$temp1=hash('sha512',$mobile_id.$ran1);
				$stm1->close();
				
				$stm2=$mysqli->prepare("update `drive`.`members` set `tkt_string`='".$ran1."' where `number` = '".$mobile_id."'") ;
					if($stm2->execute())
					
					$stm=$mysqli->prepare("insert into `drive`.`auth` values(?,?)");
					$stm->bind_param('is',$mobile_id,$ran);
					
					$stm->execute();
						$stm->close();
						$array=array();
						$array['rand_code']= $ran;
						$array['tkt']=$temp1; 
						echo json_encode($array);
						}
					
				
			}
				}
			}
		
		else {header("location:error.html");}
	}
	else {header("location:error.html");}
?>