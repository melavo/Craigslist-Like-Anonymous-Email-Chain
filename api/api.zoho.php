<?
class Zoho{
	var $authtoken = '';
	var $zoid = '';
	var $BASE_URI = 'https://mail.zoho.com/api/organization/';
	public function __construct($config = array()) {
       if(isset($config['authtoken'])){
		   $this->authtoken = $config['authtoken'];
	   }
	   if(isset($config['zoid'])){
		   $this->zoid = $config['zoid'];
	   }
    }
	/*
	This function add forward email to real email client
	params $data=array(accountId=>'',  
					'zuid'=>'',
					mailForward=>array(
						mailForwardTo:"gratuser1@gauthamzmail.com"
					),
					"mode":"enableMailForward"
					);
	*/
	public function addforwarding($data =array()){
		if(strlen($this->authtoken)>10 && strlen($this->zoid)>7){
			$request_parameters = array(
				 'authtoken' => $this->authtoken,
				 'body' => $data,
				  );
								 
			$url_account = $this->$BASE_URI.$this->zoid.'./accounts/'.$data['accountId'];//this email 
					
			$ch = curl_init($url_account);
			
			curl_setopt($ch, CURLOPT_HTTPHEADER, array('X-Authorization:'.$this->authtoken,'Accept: application/json'));
			curl_setopt($ch, CURLOPT_POST, true);			// set method to POST
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);	// set to return data to string ($result)
			curl_setopt($ch, CURLOPT_TIMEOUT, 30); 			// set timeout to 30s
			curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($request_parameters));
			$result = curl_exec($ch);						// execute curl
			$response_info = curl_getinfo($ch);
			$response_body = substr($response, $response_info['header_size']);
			if(isset($response_body['status']['code'])==200){
				return "done";
			}else if(isset($response_body['status']['description'])){
					return "ERROR ".$response_body['status']['description'];
			}else {
				return "ERROR Can't add email forwarding";
			}
			
		}else if(strlen($this->authtoken)<10 && strlen($this->zoid)<7){
			return "ERROR in method " . __METHOD__. ": Required class var `authtoken` and `zoid` is empty!";
		}else if(strlen($this->authtoken)<10){
			return "ERROR in method " . __METHOD__. ": Required class var `authtoken` is empty!";
		}else{
			return "ERROR in method " . __METHOD__. ": Required class var `zoid` is empty!";
		}
	}
	/*
	This function create random email
	*/
	public function createEmail($data = array())
	{
		
		if(strlen($this->authtoken)>10 && strlen($this->zoid)>7){
			$request_parameters = array(
				 'authtoken' => $this->authtoken,
				 'body' => $data,
				  );
								
			$url_account = $this->$BASE_URI.$this->zoid.'./accounts/';
					
			$ch = curl_init($url_account);
			
			curl_setopt($ch, CURLOPT_HTTPHEADER, array('X-Authorization:'.$this->authtoken,'Accept: application/json'));
			curl_setopt($ch, CURLOPT_POST, true);			// set method to POST
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);	// set to return data to string ($result)
			curl_setopt($ch, CURLOPT_TIMEOUT, 30); 			// set timeout to 30s
			curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($request_parameters));
			$result = curl_exec($ch);						// execute curl
			$response_info = curl_getinfo($ch);
			$response_body = substr($response, $response_info['header_size']);
			if(isset($response_body['status']['code'])==200){
				return $response_body['id'];
			}else if(isset($response_body['status']['description'])){
					return "ERROR ".$response_body['status']['description'];
			}else {
				return "ERROR Can't create account";
			}
		}else if(strlen($this->authtoken)<10 && strlen($this->zoid)<7){
			return "ERROR in method " . __METHOD__. ": Required class var `authtoken` and `zoid` is empty!";
		}else if(strlen($this->authtoken)<10){
			return "ERROR in method " . __METHOD__. ": Required class var `authtoken` is empty!";
		}else{
			return "ERROR in method " . __METHOD__. ": Required class var `zoid` is empty!";
		}
	}
}
?>
