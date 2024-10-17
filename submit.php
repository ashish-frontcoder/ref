 <?php 

    ob_start();
    error_reporting(0);
    // error_reporting(E_ALL);
    session_start(); 

    //Include PHP mailer config file to send mail
    include('/var/www/html/therealpbx/public/mailerConfig.php');


    if(isset($_POST) && !empty($_POST)){
        //$name = 'testlead23122020two';
        //$email = 'testlead23122020two@gmail.com';


        define('SITE_KEY', '6LfD0n0lAAAAAFooQ-7Wjpdk1AhqZ37TfyN3wz1t'); 
        define("SECRET_KEY", "6LfD0n0lAAAAAA4dEKVtEif-9QE21gH85cjI_yj5"); 
       
        $mailSendStatus = '';

        // Below variable is there to check if lead is genuine or bot / junk / spam
        $userType = '';
        $gScore = '';
        $return = '';

        function getCaptcha($key){
                
            $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".SECRET_KEY."&response={$key}"); 
            $return = json_decode($response);
            return $return; 
        } 
            
        $return = getCaptcha($_POST['g-recaptcha-response']);
            
        var_dump($return);

        $gScore = json_encode($return);
            
        if(  $return->success == true && $return->score > 0.5){
            echo 'Sucess';
            $mailSendStatus = $return->score;
            
            // User is genuine as score criteria is met
            $userType = 'genuine';
              
        }else{
            echo 'you are robot';
            // exit(); 

            // Junk user send data as junk
            $userType = 'junk';
        }

        // User specific data
        $name = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING);
        $email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);

        // checking if name field value is present or not, if not then use email as name before @ symbol
        if($name == ''){
            $arrayName = explode('@',$email);
            $name = $arrayName[0];
        }
        
        // dividing full name into firstname and lastname
        $arrayres = explode(' ',$name);
        $firstName = $arrayres[0];

        $count = count($arrayres);

        if ($count == 1){
            $lastName = $firstName;
        }else{
            $res = $count-1;
            $x = 1 ;
            $lastName = array();
            for($x; $x <= $res; $x++){
                $last[] = $arrayres[$x];
            }
            $lastName = implode(' ',$last);
        }

        // rechecking if lastname is empty or not; if empty use firstname as lastname
        if($lastName == ''){
            $lastName = $firstName;
        }

        $contact_number = filter_var($_POST['phonenumber'], FILTER_SANITIZE_STRING);
        $noofLinesRange = (isset($_POST['selectNumberUsers']) && !empty($_POST['selectNumberUsers'])) ? filter_var($_POST['selectNumberUsers'], FILTER_SANITIZE_STRING) : '';
        $company_name = (isset($_POST['company_name']) && !empty($_POST['company_name'])) ? filter_var($_POST['company_name'], FILTER_SANITIZE_STRING) : '';
        $message = (isset($_POST['message']) && !empty($_POST['message'])) ? filter_var($_POST['message'], FILTER_SANITIZE_STRING) : '';

        // campaign specific data / hard coded / send from form
        $organization = filter_var($_POST['organization'], FILTER_SANITIZE_STRING);
        $leadQuality = filter_var($_POST['leadQuality'], FILTER_SANITIZE_STRING);
        $roleOfContact = filter_var($_POST['roleOfContact'], FILTER_SANITIZE_STRING);
        $company = filter_var($_POST['company'], FILTER_SANITIZE_STRING);
        $leadOrigin = filter_var($_POST['leadOrigin'], FILTER_SANITIZE_STRING);
        $leadSource = filter_var($_POST['leadSource'], FILTER_SANITIZE_STRING);
        $leadMedium = filter_var($_POST['leadMedium'], FILTER_SANITIZE_STRING);
        $leadCampaignCategory = filter_var($_POST['leadCampaignCategory'], FILTER_SANITIZE_STRING);
        $leadCampaign = filter_var($_POST['leadCampaign'], FILTER_SANITIZE_STRING);
        $leadCampaignLong = filter_var($_POST['leadCampaignLong'], FILTER_SANITIZE_STRING);
        $leadCampaignType = filter_var($_POST['leadCampaignType'], FILTER_SANITIZE_STRING);
        $webformName = filter_var($_POST['webformName'], FILTER_SANITIZE_STRING);
        $webformPosType = filter_var($_POST['webformPosType'], FILTER_SANITIZE_STRING);
        $sourceURL = filter_var($_POST['sourceURL'], FILTER_SANITIZE_STRING);
        $keywordMatchType = filter_var($_POST['keywordMatchType'], FILTER_SANITIZE_STRING);
        $accountType = filter_var($_POST['accountType'], FILTER_SANITIZE_STRING);
        $initialSource = filter_var($_POST['initialSource'], FILTER_SANITIZE_STRING);
        $utmcsr = filter_var($_POST['utmcsr'], FILTER_SANITIZE_STRING);
        $utmcmd = filter_var($_POST['utmcmd'], FILTER_SANITIZE_STRING);
        $utmccn = filter_var($_POST['utmccn'], FILTER_SANITIZE_STRING);
        $utmctr = filter_var($_POST['utmctr'], FILTER_SANITIZE_STRING);
        $referenceURL = substr(filter_var($_POST['referenceURL'], FILTER_SANITIZE_STRING), 0, 400);
        
        // script generated data / third party script
        $getGAId = filter_var($_POST['getGAId'], FILTER_SANITIZE_STRING);
        $zc_gad = filter_var($_POST['zc_gad'], FILTER_SANITIZE_STRING);
        $userID = '';

        // dynamic data / php generated --- Uncomment below lines if send from form
        // $ip = filter_var($_POST['ip'], FILTER_SANITIZE_STRING);


        // getting cookie values from initialtrafficsource
        if(isset($_COOKIE['initialTrafficSource'])){
            $initialSource = $_COOKIE['initialTrafficSource'];

            $initCookieHandler = explode('|', $initialSource);

            for ($i=0; $i < count($initCookieHandler); $i++) { 
                list($k, $v) = explode('=', $initCookieHandler[$i]);
                $separateCookieHandler[$k] = $v;
            }
            foreach ($separateCookieHandler as $key => $value) {
                $$key = $value;
            }
        }

        // getting cookie values from gclid
        if(isset($_COOKIE['gclid'])){
            $zc_gad = $_COOKIE['gclid'];
        }

        // getting cookie values from _ga_GXZY9CS89G (trp) for user_ID
        /*if(isset($_COOKIE['_ga_GXZY9CS89G'])){
            $userID = substr($_COOKIE['_ga_GXZY9CS89G'], 6);
        }*/

        // getting cookie values from _ga for Google client ID
        // if(isset($getGAId) && empty($getGAId)){
            if(isset($_COOKIE['_ga'])){
                $getGAId = substr($_COOKIE['_ga'], 6);
            }
        // }

        // check if company field is present in user form then set that value to company name else use predefined value
        if(isset($company_name) && !empty($company_name)){
            $company = $company_name;
        }

        // date_default_timezone_set("Asia/Kolkata");
        $timezone = 'GMT';
        $datetime = new DateTime($start, new DateTimeZone($timezone));
        $date1 = $datetime->format('Y/m/d h:i a');
        $timestamp= strtotime($date1);
        $start_date = date('c', $timestamp);

        $currentTime = date("d-m-Y"); 

        // getting user IP address and location details
        if (!empty($_SERVER['HTTP_CLIENT_IP']))   
          {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
          }
        elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))  
          {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
          }
        else
          {
        $ip = $_SERVER['REMOTE_ADDR'];
          }

        $data = unserialize(file_get_contents('http://www.geoplugin.net/php.gp?ip='.$ip));

        $ClientState =  $data['geoplugin_city'];
        $ClientIPAddress = $data['geoplugin_request'];;

        if($ClientIPAddress == '156.96.46.226'){
            exit();
        }

        
        $new_note = "Lead Details:-\n\n Name:  $name \n Email:  $email         \n Contact No :  $contact_number \n Dated:  $currentTime"; 
            
        $duplicate_note = "Duplicate Lead Details:-\n\n Name:  $name \n Email:  $email         \n Contact No :  $contact_number \n Dated:  $currentTime";

        // URL of ZOHO to be used
        $url_zoho = "https://accounts.zoho.in/oauth/v2/token?refresh_token=1000.a8c166b83d2dcd70a925a31b46efc255.e764ba6100cbd088bb34231fa23b7f05&client_id=1000.GN7M7BFDUGPJVE2BG9YJJ15AQ1T4NZ&client_secret=385d15e8c8fa048f773071e47dc7de85b94e19bdf7&grant_type=refresh_token";

        // Saving all data into json for further use and storage
        /*$json = array( 
            "data" => array(
                array(
                    "First_Name" => $firstName,
                    "Last_Name" => $lastName,
                    "Phone" => $contact_number,
                    "Email" => $email,
                    "Number_of_Lines_Range_1" => $noofLinesRange,
                    "DLT_Registration" => $dltRegistration,
                    "Number_of_Agents" => $selectAgentDropdown,
                    "Type_of_SMS" => $typeOfSMS,
                    "SMS_Requirement" => $smsRequirement,
                    // "Initial_Requirements" => $selectServiceDropdown,
                    "Organization" => $organization,
                    "Lead_Quality_S" => $leadQuality,
                    "Role_of_Contact" => $roleOfContact,
                    "Company" => $company,
                    "Lead_Origin" => $leadOrigin,
                    "Lead_Source" => $leadSource,
                    "Lead_Medium" => $leadMedium,
                    "Lead_Campaign_Category_S" => $leadCampaignCategory,
                    "Lead_Campaign" => $leadCampaign,
                    "Lead_Campaign_Name_Long_S" => $leadCampaignLong,
                    "Lead_Campaign_Type_S" => $leadCampaignType,
                    "Web_Form_Name" => $webformPosType,
                    // "Initial_Source" => $initialSource,
                    "Source_URL" => $sourceURL,
                    "IP" => $ClientIPAddress,
                    "User_ID" => $userID,
                    "Google_Client_ID" => $getGAId,
                    "Google_Click_ID" => $zc_gad,
                    "GCLID" => $zc_gad,
                    "GA_Source_S" => $utmcsr,
                    "GA_Medium_S" => $utmcmd,
                    "GA_Campaign_S" => $utmccn,
                    "Keyword_Name_S" => $utmctr,
                    "Keyword_Match_Type_S" => $keywordMatchType,
                    "GA_Referral_URL_S" => $referenceURL,
                    "Duplicate_Entries" => array(
                        array(
                            "Date_Time_1" => $start_date,
                            "Duplicate_Note" => $new_note,
                            "Duplicate_URL" => $sourceURL,
                        )
                    ),
                    "Lead_Type_S" => $accountType
                )
            )
        );*/

        $json = '{ 
            "data": [{
                "First_Name":"'.$firstName.'",
                "Last_Name":"'.$lastName.'",
                "Phone":"'.$contact_number.'",
                "Email":"'.$email.'",
                "Number_of_Lines_Range_1":"'.$noofLinesRange.'",
                "Organization":"'.$organization.'",
                "Lead_Campaign_Organization":"'.$organization.'",
                "Lead_Quality_S":"'.$leadQuality.'",
                "Role_of_Contact":"'.$roleOfContact.'",
                "Company":"'.$company.'",
                "Lead_Origin":"'.$leadOrigin.'",
                "Lead_Source":"'.$leadSource.'",
                "Lead_Medium":"'.$leadMedium.'",
                "Lead_Campaign_Category_S":"'.$leadCampaignCategory.'",
                "Lead_Campaign":"'.$leadCampaign.'",
                "Lead_Campaign_Name_Long_S":"'.$leadCampaignLong.'",
                "Lead_Campaign_Type_S":"'.$leadCampaignType.'",
                "Web_Form_Name":"'.$webformPosType.'",
                "Source_URL":"'.$sourceURL.'",
                "IP":"'.$ClientIPAddress.'",
                "User_ID":"'.$userID.'",
                "Google_Client_ID":"'.$getGAId.'",
                "Google_Click_ID":"'.$zc_gad.'",
                "GA_Source_S":"'.$utmcsr.'",
                "GA_Medium_S":"'.$utmcmd.'",
                "GA_Campaign_S":"'.$utmccn.'",
                "Keyword_Name_S":"'.$utmctr.'",
                "Keyword_Match_Type_S":"'.$keywordMatchType.'",
                "GA_Referral_URL_S":"'.$referenceURL.'",
                "$gclid":"'.$zc_gad.'",
                "Duplicate_Entries":[{
                    "Date_Time_1":"'.$start_date.'",
                    "Duplicate_Note":'.json_encode($new_note).',
                    "Duplicate_URL":"'.$sourceURL.'"
                }],
                "Lead_Type_S":"'.$accountType.'"
            }]
        }';

        $json_data = json_encode(json_decode($json, true));


        // Run only if user is genuine
        if($userType != 'junk'){

            $url = $url_zoho;

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $result = curl_exec($ch);
            curl_close($ch);
            $output = json_decode($result, true);
                                                        
            $access_token = $output['access_token'];
                                
                                
            $url = "https://www.zohoapis.in/crm/v2/Leads/upsert";
            $header =array("Authorization: Zoho-oauthtoken $access_token");

            $headerTwo =array("Authorization: Zoho-oauthtoken $access_token");
            $curl = curl_init();
            // curl_setopt ($curl, CURLOPT_URL, "https://www.zohoapis.in/crm/v2/Leads");
            curl_setopt ($curl, CURLOPT_URL, "https://www.zohoapis.in/crm/v2/Leads/search?email=$email");
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($curl, CURLOPT_HTTPHEADER, $headerTwo);
            $return = curl_exec ($curl);
            curl_close ($curl);

            $outputZoho = json_decode($return, true);

            $getLeadId = '';
                                    
            // This array will take existing lead data if found to be sent in email
            $existingLeadData = array();
            
            // This variable will take lead creating time for new or duplicate lead
            $leadCreatedTime = date('d-M-Y h:i:s a');
                                    
            if(count($outputZoho['data']) > 0){
                foreach($outputZoho['data'] as $leadData => $value){
                    if($value['Email'] == $email  ){
                        $getLeadId  =  $value['id']; 
                        $existingLeadData['Lead_ID'] = $value['Lead_ID'];
                        $existingLeadData['Created_Time'] = $value['Created_Time'];
                        $existingLeadData['Organization'] = $value['Organization'];
                        echo $getLeadId; 
                    }
                }
            }


            if( $getLeadId != ''){
                echo $getLeadId; 

                $curlDuplicateId = curl_init();
                curl_setopt ($curlDuplicateId, CURLOPT_URL, "https://www.zohoapis.in/crm/v2/Leads/$getLeadId");
                curl_setopt($curlDuplicateId, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($curlDuplicateId, CURLOPT_HTTPHEADER, $header);
                $return = curl_exec ($curlDuplicateId);
                curl_close ($curlDuplicateId);

                $outputZohoDuplicate = json_decode($return, true);  

                $getDuplicateId = '';  

                foreach($outputZohoDuplicate[data] as $duplicate => $dupId){
                    foreach( $dupId['Duplicate_Entries'] as $findId){
                        $getDuplicateId = $findId[id];
                    }
                }

                echo $getDuplicateId; 

                $jsonNew = array(
                    "data" => array(
                        array( "id" => $getLeadId,
                            "Duplicate_Entries"=>array(
                                array("id"=> $getDuplicateId),
                                array(
                                    "Date_Time_1" => $start_date,
                                    "Duplicate_Note" => $duplicate_note,
                                    "Duplicate_URL" => $sourceURL
                                )
                            )
                        )
                    )
                );

                $json_data_update = json_encode($jsonNew);
                $headerThree =array("Authorization: Zoho-oauthtoken $access_token");  

                $curlDataInsert = curl_init();
                curl_setopt ($curlDataInsert, CURLOPT_URL, "https://www.zohoapis.in/crm/v2/Leads");
                curl_setopt($curlDataInsert, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($curlDataInsert, CURLOPT_HTTPHEADER, $headerThree);
                curl_setopt($curlDataInsert, CURLOPT_POSTFIELDS, $json_data_update);
                curl_setopt($curlDataInsert, CURLOPT_CUSTOMREQUEST, "PUT");
                $return = curl_exec ($curlDataInsert);
                curl_close ($curlDataInsert);

            }else{

                /* code sms api */
                /*$smsPhoneNumber = 'https://ipapi.co/'.$ClientIPAddress.'/country_calling_code/'; 
              
                $smsPhoneCode = file_get_contents($smsPhoneNumber);
              
                $post = array(
                            'to' =>  $smsPhoneCode.$contact_number,
                            'from' => 'Acefone',
                            'message' => 'HI '.$name.', We appreciate your interest in Acefone. This is your first step towards a great communication plan. Our Solutions Consultant will reach out to you soon.',
                            'tracked_link_url' => 'https://acefone.com/contact-us/'
                ); 

                $chol = curl_init('https://api.transmitsms.com/send-sms.json');
                curl_setopt($chol, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($chol, CURLOPT_POST, 1);
                curl_setopt($chol, CURLOPT_POSTFIELDS, http_build_query($post));
                curl_setopt($chol, CURLOPT_USERPWD, "1d29d4ed0e278421ff90b1ca2151f4a5:9874589632");

                $responseSms = curl_exec($chol);
                curl_close($chol);
                $outputSms = json_decode($responseSms, true);*/
              
                // print_r($response);
              
                // $getDeliveryStatus =  $outputSms['error']['code']; 
                // $messageId = strval($outputSms['message_id']); 
              
                /* code sms api */
                     
                /*$json = array( 
                    "data" => array(
                        array(
                            "First_Name" => $firstName,
                            "Last_Name" => $lastName,
                            "Phone" => $contact_number,
                            "Email" => $email,
                            "Number_of_Lines_Range_1" => $noofLinesRange,
                            "DLT_Registration_S" => $dltRegistration,
                            "Number_of_Agents" => $selectAgentDropdown,
                            "Type_of_SMS" => $typeOfSMS,
                            "SMS_Requirement" => $smsRequirement,
                            "Initial_Requirments_S" => $selectServiceDropdown,
                            "Organization" => $organization,
                            "Lead_Quality_S" => $leadQuality,
                            "Role_of_Contact" => $roleOfContact,
                            "Company" => $company,
                            "Lead_Origin" => $leadOrigin,
                            "Lead_Source" => $leadSource,
                            "Lead_Medium" => $leadMedium,
                            "Lead_Campaign_Category_S" => $leadCampaignCategory,
                            "Lead_Campaign" => $leadCampaign,
                            "Lead_Campaign_Name_Long_S" => $leadCampaignLong,
                            "Lead_Campaign_Type_S" => $leadCampaignType,
                            "Web_Form_Name" => $webformPosType,
                            // "Initial_Source" => $initialSource,
                            "Source_URL" => $sourceURL,
                            "IP" => $ClientIPAddress,
                            "User_ID" => '',
                            "Google_Client_ID" => $getGAId,
                            "Google_Click_ID" => $zc_gad,
                            "GA_Source_S" => $utmcsr,
                            "GA_Medium_S" => $utmcmd,
                            "GA_Campaign_S" => $utmccn,
                            "Keyword_Name_S" => $utmctr,
                            "Keyword_Match_Type_S" => $keywordMatchType,
                            "GA_Referral_URL_S" => $referenceURL,
                            "Duplicate_Entries" => array(
                                array(
                                    "Date_Time_1" => $start_date,
                                    "Duplicate_Note" => $new_note,
                                    "Duplicate_URL" => $sourceURL,
                                )
                            ),
                            "Lead_Type_S" => $accountType
                        )
                    )
                );

                $json_data = json_encode($json);*/
                
                
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $result = curl_exec($ch);
                curl_close($ch);
                
                $res = json_decode($result,true );

                // capturing zoho response to log in DB
                $zohoResponse = $result;
                
                $leadId = $res['data'][0]['details']['id'];
                
                $url = "https://www.zohoapis.in/crm/v2/Leads/$leadId";
                $header =array("Authorization: Zoho-oauthtoken $access_token");
                
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $resultl = curl_exec($ch);
                curl_close($ch);
                $res = json_decode($resultl,true );
                
                $Lead_ID = $res['data'][0]['Lead_ID'];
                $leadCreatedTime = $res['data'][0]['Created_Time'];

                // Format lead creation time
                if($leadCreatedTime != ''){
                    $leadCreatedTime = date('d M Y h:i a', strtotime(substr($leadCreatedTime, 0, -6)));
                }
                
                
                /* insert data into sql lead */

                $servername = 'localhost';
                $username = 'newuser'; 
                $password = 'password'; 
                $dbname = 'trp_leads'; 

                // Create connection
                $conn = new mysqli($servername, $username, $password, $dbname);
                // Check connection
                if ($conn->connect_error) {
                  die("Connection failed: " . $conn->connect_error);
                }
                
                $array_sql = array();

                $array_sql['name'] = $name;
                $array_sql['email'] = $email;
                $array_sql['contact_number'] = $contact_number;
                $array_sql['client_state'] = $ClientState;
                $array_sql['client_ip_address'] = $ClientIPAddress;
                $array_sql['source_url'] = $sourceURL;
                $array_sql['lead_source'] = $leadSource;
                $array_sql['lead_origin'] = $leadMedium;
                $array_sql['lead_id'] = $Lead_ID;
                $array_sql['ga_id_form'] = $getGAId;
                $array_sql['token_id'] = '';
                $array_sql['intialSource'] = $initialSource;
                $array_sql['organization'] = $organization;
                $array_sql['lead_campaign'] = $leadCampaign;
                $array_sql['web_form_name'] = $webformPosType;
                $array_sql['duplicate_id'] = $getLeadId;
                $array_sql['reg_date'] = date('Y-m-d H:i:s');
                $array_sql['zoho_trigger'] = 0;
                $array_sql['zoho_logs'] = $zohoResponse;
                $array_sql['user_data_json'] = $json_data;
                

                foreach( array_keys($array_sql) as $key ) {
                    $fields[] = "`$key`";
                    $values[] = "'" . $array_sql[$key] . "'";
                }  

                $fields = implode(",", $fields);
                $values = implode(",", $values);
                
                $sql =  "INSERT INTO `trp_lead_data` ($fields) VALUES ($values) ";

                if ($conn->query($sql) === TRUE) {
                  echo "New record created successfully";
                } else {
                  echo "Error: " . $sql . "<br>" . $conn->error;
                }

                $conn->close();
                    
                /* insert data into sql lead */

            }

            $mailMsgText = '';

            if($message != ''){
                $mailMsgText = 'Message: '.$message.' <br>';
            }

            // This variable is set to send existing lead ID in email if found
            $existingLeadText = '';
            // This variable is set to send a line if duplicate lead is found
            $existingLeadSummLine = '';

            // Checking if we found any existing lead ID
            if(isset($existingLeadData['Lead_ID']) && !empty($existingLeadData['Lead_ID'])){

                // Format lead creation time
                if($existingLeadData['Created_Time'] != ''){
                    $existingLeadData['Created_Time'] = date('d M Y h:i a', strtotime(substr($existingLeadData['Created_Time'], 0, -6)));
                }
                
                $existingLeadSummLine = '<p style="font-size: 14px;"><strong>Please note that this is a duplicate inquiry and existing lead is already there for this visitor.</strong></p>';

                $existingLeadText = '<p style="font-size: 14px;">
                                        <strong>Existing Lead Information:</strong><br />
                                        Organization: '.$existingLeadData['Organization'].' <br />
                                        Existing Lead ID: '.$existingLeadData['Lead_ID'].'<br />
                                        Existing Lead Created Time: '.$existingLeadData['Created_Time'].'<br />
                                    </p>';

            }


            $mailbody = '<!doctype html>

            <html>

            <body>

              <p style="font-size: 14px;">
              Hello Sales Team,
              <br />
              A potential client has completed a webform on our TRP Website.<br />
              Please find the details below and do the needful.</p>
              '.$existingLeadSummLine.'
              
              <p style="font-size: 14px;">
                <strong>Lead Information:</strong><br />
                Organization: '.$organization.' <br />
                Lead ID: '.$Lead_ID.' <br />
                Created Time: '.$leadCreatedTime.' <br />
              </p>

              '.$existingLeadText.'

              <p style="font-size: 14px;">
                <strong>Contact Information:</strong><br />
                Name: '.$name.' <br />
                Email: '.$email.' <br />
                Phone: '.$contact_number.' <br />
                '.$mailMsgText.'
              </p>

              <p style="font-size: 14px;">
                <strong>Requirement:</strong><br />
                Number of users: '.$noofLinesRange.' <br />
              </p>

              <p style="font-size: 14px;">
                <strong>Marketing Information:</strong><br />
                Lead Origin: '.$leadOrigin.' <br />
                Lead Source: '.$leadSource.' <br />
                Lead Medium: '.$leadMedium.' <br />
                Lead Campaign: '.$leadCampaign.' <br />
                Webform: '.$webformPosType.' <br />
                Source URL: '.$sourceURL.' <br />
                Google Client ID: '.$getGAId.'<br />
              </p>

              
              <br />

              <p style="font-size: 14px;">
                Regards, <br />
                CRM Team
              </p>

            </body>

            </html>';


            // Changing subject based on lead type
            if($existingLeadText != ''){
                $subject = "Existing Lead: ".$existingLeadData['Lead_ID'].', '.$existingLeadData['Organization'].', '.$leadSource.', '.$leadCampaign;
            }else{
                $subject = "New Lead: ".$Lead_ID.', '.$organization.', '.$leadSource.', '.$leadCampaign;
            }
                                            
            
           // $from = 'sales@servetel.in';
         //   $to = 'inquiry@servetel.in';
          //  $cc = 'jitendra@servetel.co.in';
            
           // $headers  = 'From: '. $from . "\r\n";
        //    $headers .= 'CC: '. $cc . "\r\n";
          //  $headers .= 'Reply-To: '.$to. "\r\n" ;
        //    $headers .= "MIME-Version: 1.0" . "\r\n";
        //    $headers .= "X-Priority: 3\r\n";
          //  $headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n".'X-Mailer: PHP/' . phpversion();
            
            
            $body = $mailbody;
            if ($email != '') {
                
                // $mail_to_team = mail($to, $subject, $body, $headers);

                try {
                    //Sender
                    $sendMailTeam->setFrom('info@therealpbx.co.uk');
                    //Recipients
                    $sendMailTeam->addAddress('inquiry@therealpbx.co.uk');
                    $sendMailTeam->addCC('jitendra@servetel.co.in');
                    // $sendMailTeam->addCC('rajvinder.singh@acefone.com');
                    // $sendMailTeam->addCC('piyush.goel@acefone.com');

                    //Content
                    $sendMailTeam->isHTML(true);                                  //Set email format to HTML
                    $sendMailTeam->Subject = $subject;
                    $sendMailTeam->Body = $body;
                    // $sendMailTeam->AltBody = 'This is the body in plain text for non-HTML mail clients';

                    $sendMailTeam->send();
                    echo 'Message has been sent';
                } catch (Exception $e) {
                    echo "Message could not be sent. Mailer Error: {$sendMailTeam->ErrorInfo}";
                }
            
            }
            

            $subject_to_client = "Thank you for showing your interest in TheRealPBX.";
            // $from = "info@servetel.in";
            // $to = $email;
            // $headers_to_client  = 'From: '. $from . "\r\n";
            // $headers_to_client .= 'Reply-To: '.$to. "\r\n" ;
            // $headers_to_client .= "MIME-Version: 1.0" . "\r\n";
            // $headers_to_client .= "Content-type:text/html;charset=iso-8859-1" . "\r\n".'X-Mailer: PHP/' . phpversion();
            
            
            $body_to_client = '<!doctype html>
                <html>
                    <head>
                       <meta charset="UTF-8">
                        <meta http-equiv="X-UA-Compatible" content="IE=edge">
                        <meta name="viewport" content="width=device-width, initial-scale=1">
                              
                        <style type="text/css">
                            body{margin:0;padding:0;font-size:14px; color:#444;line-height:20px;}
                            .templateContainer{width:600px !important;}
                            .templateContainer tr td{font-size:14px; color:#444;line-height:20px;}
                            .templateContainer p{font-size:14px; color:#444;margin:12px 0;line-height:20px;}
                            .templateContainer ol li{font-size:14px; color:#444;}
                            .templateContainer ul li{font-size:14px; color:#444;}
                            @media only screen and (min-width:768px){.templateContainer{width:600px !important;}}  
                            @media only screen and (max-width:767px){.templateContainer{width:600px !important;}}               
                        </style>     
                 </head>
                    <body>
                            <table align="left" border="0" cellpadding="0" cellspacing="0" height="100%" width="600" id="bodyTable">
                                <tr>
                                    <td align="left" valign="top" id="bodyCell" style="text-align:left; padding-left:10px;">
                                        <table border="0" cellpadding="0" cellspacing="0" class="templateContainer" style="text-align:left;">
                                            <tr>
                                                <td valign="top" id="templateHeader"></td>
                                            </tr>
                                            <tr>
                                                <td valign="top" id="templateBody"><table border="0" cellpadding="0" cellspacing="0" width="600" class="mcnTextBlock" style="min-width:100%;">
                    <tbody class="mcnTextBlockOuter">
                        <tr>
                            <td valign="top" class="mcnTextBlockInner" style="padding-top:0">
                                <table align="left" border="0" cellpadding="0" cellspacing="0" style="max-width:100%; width:600px;" width="600" class="mcnTextContentContainer">
                                    <tbody><tr>
                                       
                                        <td valign="top" class="mcnTextContent" style="padding-top:0; padding-right:0; padding-bottom:0; padding-left:0;">
                                        
                                            
                <table width="100%" border="0" cellpadding="0" cellspacing="0" style="width:600px;background:#319dd7;word-break: keep-all;">
                    <tr>
                        <td style="text-align:center; height:55px; vertical-align:middle;width:600px;vertical-align:top;font-family:Arial;">
                            <table width="600" border="0" cellpadding="0" cellspacing="0" style="background:#fff;">
                            <tr>
                                <td height="60" style="background:#fff; border-bottom:2px #319dd7 solid; text-align:center;font-family:Arial;padding-top:10px;padding-bottom:10px;"><a style="display:inline-block;" href="http://www.servetel.in/"><img src="https://www.therealpbx.com/wp-content/uploads/2016/06/logo.png" alt="TheRealPBX" style="color:#fff; font-size:28px; font-weight:bold; text-transform:uppercase;height: 43px !important;line-height: 43px;"></a>
                                </td>
                            </tr>
                            
                            <tr>
                                <td style="border-bottom:2px #319dd7 solid;">
                                    <table width="100%" border="0" cellpadding="0" cellspacing="0" style="border-top:2px #fff solid;border-bottom:2px #fff solid;">
                                        <tr>
                                            <td align="center" style="background:#319dd7;font-family:Arial;padding-top:10px;padding-bottom:6px;"><p style="text-align:center;font-family:Arial; color:#fff; font-size:19px;line-height:26px;"><span   style="font-size:35px; color:#fff; font-weight:bold;">Thank You</span><br> for choosing The Real PBX</p></td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            
                            
                            <tr>
                                <td align="left" style="padding:12px;font-family:Arial;">
                                    <table width="100%" border="0" cellpadding="0" cellspacing="0" style="background:#fff;">
                                        
                                        
                                        <tr>
                                            <td style="font-family:Arial; font-weight:bold;"><span style="font-weight:bold;">Hello</span> <span style="color:#319dd7;">'.$name.'</span><br></td>
                                        </tr>
                                        <tr>
                                            <td style="font-family:Arial;">
                                            <p>Thank you for choosing The Real PBX.</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="font-family:Arial;">
                                            <p>We have received your request and our concerned department will get back to you shortly.</p></td>
                                        </tr>
                                        <tr>
                                            <td><br></td>
                                        </tr>
                                        
                                        <tr>
                                            <td >
                                                <table width="100%" border="0" bordercolor="#e1e1e1" cellpadding="0" cellspacing="0" style="word-break: keep-all;">
                                                    
                                                    <tr>
                                <td>
                                    <table width="100%" border="0" cellpadding="0" cellspacing="0" style="word-break: keep-all;">
                                        <tr>
                                            <td width="40%" style="background:#4f4f4f;line-height:36px; color:#fff; padding-left:15px;padding-right:15px; text-align:left;">Website: <a href="https://therealpbx.com/" style="color:#319dd7; text-decoration:none;">https://therealpbx.com/</a></td>
                                            <td width="60%" style="background:#4f4f4f;line-height:36px; color:#fff; padding-left:15px;padding-right:15px;padding-bottom:2px; text-align:right; vertical-align:middle;">
                                            <span style="display:inline-block;">Follow us</span>
                                                <a href="https://www.facebook.com/therealpbx" target="_blank" style="display:inline-block;width:27px; height:26px;vertical-align:middle;"><img src="http://www.servetel.in/emailer/images/fb-2.png" alt="Facebook"></a>
                                                            <a href="https://twitter.com/TheRealPBX" target="_blank" style="display:inline-block;width:27px; height:26px;vertical-align:middle;"><img src="http://www.servetel.in/emailer/images/twitter-2.png" alt="Twitter"></a>
                                                            <a href="https://www.linkedin.com/company/the-real-pbx" target="_blank" style="display:inline-block; width:27px; height:26px; vertical-align:middle;"><img src="http://www.servetel.in/emailer/images/linked-in-2.png" alt="Linkedin"></a>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                                                    
                                                </table>
                                            </td>
                                        </tr>
                                        
                                    </table>
                                </td>
                            </tr>
                            
                            </table>
                       </td>
                    </tr>
                </table>

                                        </td>
                                    </tr>
                                </tbody></table>
                                
                            </td>
                        </tr>
                    </tbody>
                </table><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnTextBlock" style="min-width:100%;">
                    <tbody class="mcnTextBlockOuter">
                        <tr>
                            <td valign="top" class="mcnTextBlockInner" style="padding-top:0;">
                                  
                                <table align="left" border="0" cellpadding="0" cellspacing="0" style="max-width:100%; min-width:100%;" width="100%" class="mcnTextContentContainer">
                                    <tbody>
                                    <tr>
                                        <td valign="top" class="mcnTextContent" style="padding-top:0; padding-right:18px; padding-bottom:0; padding-left:20px !important;">
                                            
                                        </td>
                                    </tr>
                                </tbody></table>
                               
                            </td>
                        </tr>
                    </tbody>
                </table></td>
                                            </tr>
                                            <tr>
                                                <td valign="top" id="templateFooter"></td>
                                            </tr>
                                        </table>
                                        
                                    </td>
                                </tr>
                            </table>
                        
                    </body>
                </html>';

            if ($email != ''){
                // $mail_to_client = mail($email, $subject_to_client, $body_to_client, $headers_to_client);
                
                
                try {
                    
                    //Sender
                    $sendMailClient->setFrom('info@therealpbx.co.uk');
                    //Recipients
                    $sendMailClient->addAddress($email);     //Add a recipient

                    //Content
                    $sendMailClient->isHTML(true);                                  //Set email format to HTML
                    $sendMailClient->Subject = $subject_to_client;
                    $sendMailClient->Body    = $body_to_client;
                    // $sendMailClient->AltBody = 'This is the body in plain text for non-HTML mail clients';

                    $sendMailClient->send();
                    echo 'Message has been sent';
                } catch (Exception $e) {
                    echo "Message could not be sent. Mailer Error: {$sendMailClient->ErrorInfo}";
                }

                
                
                
            } 

        }
        // Genuine lead code ends


        /* Insert Junk Records */
        
        if($userType == 'junk'){

            $url = $url_zoho;

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $result = curl_exec($ch);
            curl_close($ch);
            $output = json_decode($result, true);
                                                        
            $access_token = $output['access_token'];
                                
                                
            $url = "https://www.zohoapis.in/crm/v2/Leads/upsert";
            $header =array("Authorization: Zoho-oauthtoken $access_token");

            $headerTwo =array("Authorization: Zoho-oauthtoken $access_token");
            $curl = curl_init();
            // curl_setopt ($curl, CURLOPT_URL, "https://www.zohoapis.in/crm/v2/Leads");
            curl_setopt ($curl, CURLOPT_URL, "https://www.zohoapis.in/crm/v2/Leads/search?email=$email");
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($curl, CURLOPT_HTTPHEADER, $headerTwo);
            $return = curl_exec ($curl);
            curl_close ($curl);

            $outputZoho = json_decode($return, true);

            $getLeadId = '';
                                    
            // This array will take existing lead data if found to be sent in email
            $existingLeadData = array();
            
            // This variable will take lead creating time for new or duplicate lead
            $leadCreatedTime = date('d-M-Y h:i:s a');
                                    
            if(count($outputZoho['data']) > 0){
                foreach($outputZoho['data'] as $leadData => $value){
                    if($value['Email'] == $email  ){
                        $getLeadId  =  $value['id']; 
                        $existingLeadData['Lead_ID'] = $value['Lead_ID'];
                        $existingLeadData['Created_Time'] = $value['Created_Time'];
                        $existingLeadData['Organization'] = $value['Organization'];
                        echo $getLeadId; 
                    }
                }
            }


            if( $getLeadId != ''){
                echo $getLeadId; 

                $curlDuplicateId = curl_init();
                curl_setopt ($curlDuplicateId, CURLOPT_URL, "https://www.zohoapis.in/crm/v2/Leads/$getLeadId");
                curl_setopt($curlDuplicateId, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($curlDuplicateId, CURLOPT_HTTPHEADER, $header);
                $return = curl_exec ($curlDuplicateId);
                curl_close ($curlDuplicateId);

                $outputZohoDuplicate = json_decode($return, true);  

                $getDuplicateId = '';  

                foreach($outputZohoDuplicate[data] as $duplicate => $dupId){
                    foreach( $dupId['Duplicate_Entries'] as $findId){
                        $getDuplicateId = $findId[id];
                    }
                }

                echo $getDuplicateId; 

                $jsonNew = array(
                    "data" => array(
                        array( "id" => $getLeadId,
                            "Duplicate_Entries"=>array(
                                array("id"=> $getDuplicateId),
                                array(
                                    "Date_Time_1" => $start_date,
                                    "Duplicate_Note" => $duplicate_note,
                                    "Duplicate_URL" => $sourceURL
                                )
                            )
                        )
                    )
                );

                $json_data_update = json_encode($jsonNew);
                $headerThree =array("Authorization: Zoho-oauthtoken $access_token");  

                $curlDataInsert = curl_init();
                curl_setopt ($curlDataInsert, CURLOPT_URL, "https://www.zohoapis.in/crm/v2/Leads");
                curl_setopt($curlDataInsert, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($curlDataInsert, CURLOPT_HTTPHEADER, $headerThree);
                curl_setopt($curlDataInsert, CURLOPT_POSTFIELDS, $json_data_update);
                curl_setopt($curlDataInsert, CURLOPT_CUSTOMREQUEST, "PUT");
                $return = curl_exec ($curlDataInsert);
                curl_close ($curlDataInsert);

            }else{

                /* code sms api */
                /*$smsPhoneNumber = 'https://ipapi.co/'.$ClientIPAddress.'/country_calling_code/'; 
              
                $smsPhoneCode = file_get_contents($smsPhoneNumber);
              
                $post = array(
                            'to' =>  $smsPhoneCode.$contact_number,
                            'from' => 'Acefone',
                            'message' => 'HI '.$name.', We appreciate your interest in Acefone. This is your first step towards a great communication plan. Our Solutions Consultant will reach out to you soon.',
                            'tracked_link_url' => 'https://acefone.com/contact-us/'
                ); 

                $chol = curl_init('https://api.transmitsms.com/send-sms.json');
                curl_setopt($chol, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($chol, CURLOPT_POST, 1);
                curl_setopt($chol, CURLOPT_POSTFIELDS, http_build_query($post));
                curl_setopt($chol, CURLOPT_USERPWD, "1d29d4ed0e278421ff90b1ca2151f4a5:9874589632");

                $responseSms = curl_exec($chol);
                curl_close($chol);
                $outputSms = json_decode($responseSms, true);*/
              
                // print_r($response);
              
                // $getDeliveryStatus =  $outputSms['error']['code']; 
                // $messageId = strval($outputSms['message_id']); 
              
                /* code sms api */
                     
                
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $result = curl_exec($ch);
                curl_close($ch);
                
                $res = json_decode($result,true );

                // capturing zoho response to log in DB
                $zohoResponse = $result;
                
                $leadId = $res['data'][0]['details']['id'];
                
                $url = "https://www.zohoapis.in/crm/v2/Leads/$leadId";
                $header =array("Authorization: Zoho-oauthtoken $access_token");
                
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $resultl = curl_exec($ch);
                curl_close($ch);
                $res = json_decode($resultl,true );
                
                $Lead_ID = $res['data'][0]['Lead_ID'];
                $leadCreatedTime = $res['data'][0]['Created_Time'];

                // Format lead creation time
                if($leadCreatedTime != ''){
                    $leadCreatedTime = date('d M Y h:i a', strtotime(substr($leadCreatedTime, 0, -6)));
                }
                
                /* insert data into sql lead */

                $servername = 'localhost';
                $username = 'newuser'; 
                $password = 'password'; 
                $dbname = 'trp_leads_junk'; 

                // Create connection
                $conn = new mysqli($servername, $username, $password, $dbname);
                // Check connection
                if ($conn->connect_error) {
                  die("Connection failed: " . $conn->connect_error);
                }; 

                $array_sql = array();
                
                $array_sql['name'] = $name;
                $array_sql['email'] = $email;
                $array_sql['contact_number'] = $contact_number;
                $array_sql['client_state'] = $ClientState;
                $array_sql['client_ip_address'] = $ClientIPAddress;
                $array_sql['source_url'] = $sourceURL;
                $array_sql['lead_source'] = $leadSource;
                $array_sql['lead_origin'] = $leadMedium;
                $array_sql['lead_id'] = $Lead_ID;
                $array_sql['ga_id_form'] = $getGAId;
                $array_sql['token_id'] = '';
                $array_sql['intialSource'] = $initialSource;
                $array_sql['organization'] = $organization;
                $array_sql['lead_campaign'] = $leadCampaign;
                $array_sql['web_form_name'] = $webformPosType;
                $array_sql['duplicate_id'] = $getLeadId;
                $array_sql['reg_date'] = date('Y-m-d H:i:s');
                $array_sql['zoho_trigger'] = 0;
                $array_sql['zoho_logs'] = $zohoResponse;
                $array_sql['user_data_json'] = $json_data;
                $array_sql['google_response'] = $gScore;
                

                foreach( array_keys($array_sql) as $key ) {
                    $fields[] = "`$key`";
                    $values[] = "'" . $array_sql[$key] . "'";
                }  

                $fields = implode(",", $fields);
                $values = implode(",", $values);
                
                $sql =  "INSERT INTO `trp_lead_data` ($fields) VALUES ($values) ";
                
                if ($conn->query($sql) === TRUE) {
                  echo "New record created successfully";
                } else {
                  echo "Error: " . $sql . "<br>" . $conn->error;
                }

                $conn->close();
            }

            
            $mailMsgText = '';

            if($message != ''){
                $mailMsgText = 'Message: '.$message.' <br>';
            }

            // This variable is set to send existing lead ID in email if found
            $existingLeadText = '';
            // This variable is set to send a line if duplicate lead is found
            $existingLeadSummLine = '';

            // Checking if we found any existing lead ID
            if(isset($existingLeadData['Lead_ID']) && !empty($existingLeadData['Lead_ID'])){

                // Format lead creation time
                if($existingLeadData['Created_Time'] != ''){
                    $existingLeadData['Created_Time'] = date('d M Y h:i a', strtotime(substr($existingLeadData['Created_Time'], 0, -6)));
                }
                
                $existingLeadSummLine = '<p style="font-size: 14px;"><strong>Please note that this is a duplicate inquiry and existing lead is already there for this visitor.</strong></p>';

                $existingLeadText = '<p style="font-size: 14px;">
                                        <strong>Existing Lead Information:</strong><br />
                                        Organization: '.$existingLeadData['Organization'].' <br />
                                        Existing Lead ID: '.$existingLeadData['Lead_ID'].'<br />
                                        Existing Lead Created Time: '.$existingLeadData['Created_Time'].'<br />
                                    </p>';

            }


            $mailbody = '<!doctype html>

            <html>

            <body>

              <p style="font-size: 14px;">
              Hello Sales Team,
              <br />
              A potential client has completed a webform on our TRP Website.<br />
              Please find the details below and do the needful.</p>
              <p style="font-size: 14px;"><strong>Note: This is a Junk lead inquiry because reCAPTCHA is failed for this visitor.</strong></p>
              '.$existingLeadSummLine.'
              
              <p style="font-size: 14px;">
                <strong>Lead Information:</strong><br />
                Organization: '.$organization.' <br />
                Lead ID: '.$Lead_ID.' <br />
                Created Time: '.$leadCreatedTime.' <br />
              </p>

              '.$existingLeadText.'

              <p style="font-size: 14px;">
                <strong>Contact Information:</strong><br />
                Name: '.$name.' <br />
                Email: '.$email.' <br />
                Phone: '.$contact_number.' <br />
                '.$mailMsgText.'
              </p>

              <p style="font-size: 14px;">
                <strong>Requirement:</strong><br />
                Number of users: '.$noofLinesRange.' <br />
              </p>

              <p style="font-size: 14px;">
                <strong>Marketing Information:</strong><br />
                Lead Origin: '.$leadOrigin.' <br />
                Lead Source: '.$leadSource.' <br />
                Lead Medium: '.$leadMedium.' <br />
                Lead Campaign: '.$leadCampaign.' <br />
                Webform: '.$webformPosType.' <br />
                Source URL: '.$sourceURL.' <br />
                Google Client ID: '.$getGAId.'<br />
              </p>

              
              <br />

              <p style="font-size: 14px;">
                Regards, <br />
                CRM Team
              </p>

            </body>

            </html>';


            // Changing subject based on lead type
            if($existingLeadText != ''){
                $subject = "Existing Lead: ".$existingLeadData['Lead_ID'].', '.$existingLeadData['Organization'].', '.$leadSource.', '.$leadCampaign;
            }else{
                $subject = "New Lead (reCAPTCHA failed): ".$Lead_ID.', '.$organization.', '.$leadSource.', '.$leadCampaign;
            }
                                            
            
           // $from = 'sales@servetel.in';
         //   $to = 'inquiry@servetel.in';
          //  $cc = 'jitendra@servetel.co.in';
            
           // $headers  = 'From: '. $from . "\r\n";
        //    $headers .= 'CC: '. $cc . "\r\n";
          //  $headers .= 'Reply-To: '.$to. "\r\n" ;
        //    $headers .= "MIME-Version: 1.0" . "\r\n";
        //    $headers .= "X-Priority: 3\r\n";
          //  $headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n".'X-Mailer: PHP/' . phpversion();
            
            
            $body = $mailbody;
            if ($email != '') {
                
                // $mail_to_team = mail($to, $subject, $body, $headers);

                try {
                    //Sender
                    $sendMailTeam->setFrom('info@therealpbx.co.uk');
                    //Recipients
                    $sendMailTeam->addAddress('inquiry@therealpbx.co.uk');
                    $sendMailTeam->addCC('jitendra@servetel.co.in');
                    // $sendMailTeam->addCC('rajvinder.singh@acefone.com');
                    // $sendMailTeam->addCC('piyush.goel@acefone.com');

                    //Content
                    $sendMailTeam->isHTML(true);                                  //Set email format to HTML
                    $sendMailTeam->Subject = $subject;
                    $sendMailTeam->Body = $body;
                    // $sendMailTeam->AltBody = 'This is the body in plain text for non-HTML mail clients';

                    $sendMailTeam->send();
                    echo 'Message has been sent';
                } catch (Exception $e) {
                    echo "Message could not be sent. Mailer Error: {$sendMailTeam->ErrorInfo}";
                }
            
            }
        }

        // Junk lead code ends

    }
?>