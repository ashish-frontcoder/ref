<?php
	session_start();

	require_once ('dbConfig.php');

	function getUserIP(){
		$ipAddress = '';
		if (isset($_SERVER['HTTP_CLIENT_IP']) && !empty($_SERVER['HTTP_CLIENT_IP'])) {
			$ipAddress = $_SERVER['HTTP_CLIENT_IP'];
		} elseif (isset($_SERVER['HTTP_X_FORWARDED_FOR']) && !empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
			$ipAddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
		} elseif (isset($_SERVER['HTTP_X_FORWARDED']) && !empty($_SERVER['HTTP_X_FORWARDED'])) {
			$ipAddress = $_SERVER['HTTP_X_FORWARDED'];
		} elseif (isset($_SERVER['HTTP_FORWARDED_FOR']) && !empty($_SERVER['HTTP_FORWARDED_FOR'])) {
			$ipAddress = $_SERVER['HTTP_FORWARDED_FOR'];
		} elseif (isset($_SERVER['HTTP_FORWARDED']) && !empty($_SERVER['HTTP_FORWARDED'])) {
			$ipAddress = $_SERVER['HTTP_FORWARDED'];
		} elseif (isset($_SERVER['REMOTE_ADDR']) && !empty($_SERVER['REMOTE_ADDR'])) {
			$ipAddress = $_SERVER['REMOTE_ADDR'];
		} else {
			$ipAddress = 'Magic';
		}

		return $ipAddress;
	}

	function spamBlocker($userIP){

		$blockSpammer = array('2a06:98c0:3600::103', '209.85.238.', '66.249.89.');

		foreach ($blockSpammer as $thisSpammer) {
			if(strpos($userIP, $thisSpammer) !== false){
				exit;
			}
		}
	}

	function alphaToCharlie($userIP, $currLogCount, $currLog){
		//Include PHP mailer config file to send mail
		include('/var/www/html/callcenterhosting/public/mailerConfig.php');

		$latestLog = array();
		$latestLog = json_decode($currLog, true);

		$latestLogURL = $latestLog['page'];
		$latestLogTime = date('jS F, Y H:i:s a', strtotime($latestLog['log_at']));

		$mailbody = '<!doctype html>

		            <html>

		            <body>

		              <p style="font-size: 14px;">
		              Hello Team,
		              <br />
		              This is to inform you that a user has visited the PPC pages more frequently than expected time (10 minutes).<br />
		              Please find the details below for your reference.</p>
		              
		              <p style="font-size: 14px;">
		                <strong>User Information:</strong><br />
		                IP Address: '.$userIP.' <br />
		                Total Logs Count: '.$currLogCount.' <br />
		                Latest Logged Time: '.$latestLogTime.' <br />
		                Current Page URL: '.$latestLogURL.' <br />
		              </p>
		              
		              <br />

		              <p style="font-size: 14px;">
		                Regards, <br />
		                Development Team
		              </p>

		            </body>

		            </html>';

		$subject = "Alert! CCH User Tracker: ".$userIP;

		if ($userIP != '') {
                
            try {
                //Sender
                $sendMailTeam->setFrom('info@callcenterhosting.com');
                //Recipients
                $sendMailTeam->addAddress('ppc@acefone.com');
				$sendMailTeam->addCC('piyush.goel@acefone.com');

                //Content
                $sendMailTeam->isHTML(true);                                  //Set email format to HTML
                $sendMailTeam->Subject = $subject;
                $sendMailTeam->Body = $mailbody;
                // $sendMailTeam->AltBody = 'This is the body in plain text for non-HTML mail clients';

                $sendMailTeam->send();
                // echo 'Message has been sent';
            } catch (Exception $e) {
                // echo "Message could not be sent. Mailer Error: {$sendMailTeam->ErrorInfo}";
            }
        
        }
	}


	// Making logs in entire OTP process
	function userCreateLog(){

		$userIP = getUserIP();

		if($userIP == '' || $userIP == 'Magic' || $userIP == '::1' || $userIP == '127.0.0.1'){
			$userIP = 'NA';
		}

		if($userIP == '49.249.43.34' || $userIP == '61.95.184.218'){
			$userIP = 'Office';
		}

		$isItSpam = false;

		$tempLog = array();

		$tempLog['log_at'] = date('Y-m-d H:i:s', time());
		$tempLog['page'] = 'https://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

		$newLog = json_encode($tempLog);
		unset($tempLog);

		$logConn = new Connection();

		$logConn->connect();

		$sqlGetLogs =  "SELECT * FROM `user_logs` WHERE `ip_address` = '".$userIP."'";

		$resultGetLogs = $logConn->get($sqlGetLogs);

		if($resultGetLogs->num_rows > 0){
			
			while($log = $resultGetLogs->fetch_assoc()){
				$currLogs = $log['logs'];

				$uLogsJsons = explode(' @TNT@ ', $currLogs);

				if(count($uLogsJsons) > 2){
					if($userIP != 'Office'){
						$uLogs = array();
						$uLogs = json_decode($uLogsJsons[2], true);
						$logDiff =  strtotime($currLogTime) - strtotime($uLogs['log_at']);
						if($logDiff < 600){
							$isItSpam = true;
						}
					}
				}

				$updatedLogs = $newLog.' @TNT@ '.$currLogs;
			}

			$sqlUpdateLogs =  "UPDATE `user_logs` SET `logs` = '".$updatedLogs."' WHERE `ip_address` = '".$userIP."'";
	
			$resultUpdateLogs = $logConn->get($sqlUpdateLogs);

			if($resultUpdateLogs != false){
				// $response['userMsg'] = 'User Updated';
				// $response['userStep'] = 2;
			}

			if($isItSpam){
				alphaToCharlie($userIP, count($uLogsJsons), $newLog);
			}
			
		}
		else{
			$sqlCreateLogs =  "INSERT INTO `user_logs` (`ip_address`, `created_on`, `logs`) VALUES ('".$userIP."', '".date('Y-m-d H:i:s', time())."', '".$newLog."')";
	
			$resultCreateLogs = $logConn->get($sqlCreateLogs);

			if($resultCreateLogs != false){
				// $response['userMsg'] = 'User Updated';
				// $response['userStep'] = 2;
			}
		}

		spamBlocker($userIP);
	}

	userCreateLog();

?>