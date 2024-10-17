 <?php 
    // For chat form
    ob_start();
    error_reporting(0);
    session_start(); 
    
                                
    if(isset($_POST) && !empty($_POST)){

        // chat specific data
        $name = filter_var($_POST['names'], FILTER_SANITIZE_STRING);
        
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

        $email = filter_var($_POST['emails'], FILTER_SANITIZE_STRING);
        $contact_number = (isset($_POST['phones']) && !empty($_POST['phones'])) ? filter_var($_POST['phones'], FILTER_SANITIZE_STRING) : '';
        if($contact_number == 0){
            $contact_number = '';
        }
        $noofLinesRange = (isset($_POST['noofLinesRange']) && !empty($_POST['noofLinesRange'])) ? filter_var($_POST['noofLinesRange'], FILTER_SANITIZE_STRING) : '';
        $company_name = (isset($_POST['company_name']) && !empty($_POST['company_name'])) ? filter_var($_POST['company_name'], FILTER_SANITIZE_STRING) : '';

        // campaign specific data / hard coded / send from form
        $organization = filter_var($_POST['organization'], FILTER_SANITIZE_STRING);
        $leadQuality = filter_var($_POST['leadQuality'], FILTER_SANITIZE_STRING);
        $roleOfContact = filter_var($_POST['roleOfContact'], FILTER_SANITIZE_STRING);
        $company = filter_var($_POST['company'], FILTER_SANITIZE_STRING);
        $leadOrigin = filter_var($_POST['leadOrigin'], FILTER_SANITIZE_STRING);
        $leadSource = filter_var($_POST['leadSource'], FILTER_SANITIZE_STRING);

        // Specifing lead medium here manually because we are fetching the lead medium from form as well
        // $leadMedium = filter_var($_POST['leadMedium'], FILTER_SANITIZE_STRING);
        $leadMedium = 'Chat';
        
        $leadCampaignCategory = filter_var($_POST['leadCampaignCategory'], FILTER_SANITIZE_STRING);
        $leadCampaign = filter_var($_POST['leadCampaign'], FILTER_SANITIZE_STRING);
        $leadCampaignLong = filter_var($_POST['leadCampaignLong'], FILTER_SANITIZE_STRING);
        $leadCampaignType = filter_var($_POST['leadCampaignType'], FILTER_SANITIZE_STRING);
        $webformName = filter_var($_POST['webformName'], FILTER_SANITIZE_STRING);
        
        // Keeping webform name blank in case of leads by chat
        // $webformPosType = filter_var($_POST['webformPosType'], FILTER_SANITIZE_STRING);
        $webformPosType = '';
        
        $sourceURL = filter_var($_POST['sourceURL'], FILTER_SANITIZE_STRING);
        $keywordMatchType = filter_var($_POST['keywordMatchType'], FILTER_SANITIZE_STRING);
        $accountType = filter_var($_POST['accountType'], FILTER_SANITIZE_STRING);
        $initialSource = filter_var($_POST['initialSource'], FILTER_SANITIZE_STRING);
        $utmcsr = filter_var($_POST['utmcsr'], FILTER_SANITIZE_STRING);
        $utmcmd = filter_var($_POST['utmcmd'], FILTER_SANITIZE_STRING);
        $utmccn = filter_var($_POST['utmccn'], FILTER_SANITIZE_STRING);
        $utmctr = filter_var($_POST['utmctr'], FILTER_SANITIZE_STRING);
        $referenceURL = filter_var($_POST['referenceURL'], FILTER_SANITIZE_STRING);
        
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

        
        
      //  $ip = $_SERVER['REMOTE_ADDR'];

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
                                
        if(count($outputZoho['data']) > 0){
            foreach($outputZoho['data'] as $leadData => $value){
                if($value['Email'] == $email  ){
                    $getLeadId  =  $value['id']; 
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
 

    }
?>