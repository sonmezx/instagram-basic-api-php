<?php

class Instagram{
	public $username;
	
	public string $uri = 'https://i.instagram.com/api/v1/users/web_profile_info/?username=';
	
	public $headers = [
			'User-Agent: Mozilla/5.0 (iPhone; CPU iPhone OS 12_3_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15E148 Instagram 105.0.0.11.118 (iPhone11,8; iOS 12_3_1; en_US; en-US; scale=2.00; 828x1792; 165586599)',
			'Accept: */*',
			'Host: i.instagram.com',
			'Connection: keep-alive',
		];
		
		
	
	public function getUserInfo($username){
		
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, $this->uri . $username);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($curl, CURLOPT_HTTPHEADER, $this->headers);

		$resp = curl_exec($curl);

		curl_close($curl);

		return json_decode($resp, true);
		
	}
	public function getUserID($username){
		$userInfo = $this->getUserInfo($username);
		return $userInfo['data']['user']['id'];
	}

	public function getUserBio($username){
		$userInfo = $this->getUserInfo($username);
		return $userInfo['data']['user']['biography'];
	}

	public function getUserFollowerCount($username){
		$userInfo = $this->getUserInfo($username);
		return $userInfo['data']['user']['edge_followed_by']['count'];
	}

	public function getUserFollowedCount($username){
		$userInfo = $this->getUserInfo($username);
		return $userInfo['data']['user']['edge_follow']['count'];
	}

	public function getUserFullName($username){
		$userInfo = $this->getUserInfo($username);
		return $userInfo['data']['user']['full_name'];
	}

	public function getUserEmail($username){
		$userInfo = $this->getUserInfo($username);
		return $userInfo['data']['user']['business_email'];
	}

	public function getUserPhone($username){
		$userInfo = $this->getUserInfo($username);
		return $userInfo['data']['user']['business_phone_number'];
	}

	public function getUserProfilePic($username){
		$userInfo = $this->getUserInfo($username);
		return $userInfo['data']['user']['profile_pic_url'];
	}

	public function getUserProfilePicHD($username){
		$userInfo = $this->getUserInfo($username);
		return $userInfo['data']['user']['profile_pic_url_hd'];
	}

}


?>