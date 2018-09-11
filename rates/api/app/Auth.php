<?php 
class Auth {
	public static function CheckAdminToken($token) {
		// return true;
		$ch = curl_init('http://lowcost-env.cbgaq2vptb.us-west-2.elasticbeanstalk.com/api/auth/admin/auth');
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		
		curl_setopt($ch, CURLOPT_HTTPHEADER, [
			'X-Auth-Token' => $token
		]);
		$responce = curl_exec($ch);
		if($responce === false) {
			return false;		
		}
		$responce = json_decode($responce, true);
		if(isset($responce['admin']) && $responce['userType'] == '1') {
			return $responce['admin'];
		} else {
			return false;
		}
	}
}