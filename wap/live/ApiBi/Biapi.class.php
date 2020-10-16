<?php

require "Des.php";	//加密


class Biapi extends JoDES{
	
    /*
	ÅäÖÃ²ÎÊý
	*/
	protected $key='HdsdmIlN';                                     //站点秘钥
	
	protected $WebSiteCode='3b8000f1-4387-44c5-ae06-caf0c9b7e634'; //站点code
	
	protected $password='1234567'; 	

	protected $biUrl = 'api.bisoft.me';
	// ¶î¶È×ª»»
	 public function zzmoney($game,$user,$type,$money)          //ÓÃ»§¶î¶È×ª»»  	ÓÎÏ·Ãû	ÓÃ»§Ãû	×ªÈë'IN'×ª³ö'OUT'	×ªÕË½ð¶î
	{
		$t = time();
		$str_check = "platformCode=" . $game . '&userName=' . $user .'&userPassWord='.$this->password .'&TimeStamp='.$t;
		$str_encheck = $this->encode($str_check, $this->key);
		if ($type === 'IN')
		{
			$url = 'http://'.$this->biUrl.'/Api/Regis ter?parameter=' . $str_encheck . '&WebSiteCode=' . $this->WebSiteCode;
			$res = $this->https_request($url);
		}
		
        $data = "platformCode=" . $game . '&userName=' . $user . '&transferType=' . $type . '&credit=' . $money.'&TimeStamp='.$t;
        $urlen = ($this->encode($data, $this->key));
        $url = 'http://'.$this->biUrl.'/Api/Transfer?parameter=' . $urlen . '&WebSiteCode=' . $this->WebSiteCode;
		
        $res = $this->https_request($url);
        if ($res['retCode'] === 0) {
            return $res['retMsg'];
        } else {
            return "";
        }
	}
	// »ñÈ¡Óà¶î
	// 額度查詢 游戲 帳號名 
	public function balances($game,$user)							//×ÓÇ®°ü²éÑ¯·½·¨ ÓÎÏ·Ãû ÓÃ»§Ãû  
	{
		$t=time();
		$pp=($this->encode('platformCode='.$game.'&userName='.$user.'&userPassWord='.$this->password.'&TimeStamp='.$t,$this->key));
		$url='http://'.$this->biUrl.'/Api/GetUserBalance?parameter='.$pp.'&WebSiteCode='.$this->WebSiteCode;
		$res=$this->https_request($url);
		return $res['retMsg'];
	}
	// ½øÈëÓÎÏ·
	// 
	
	public function loginbi($game,$user,$gametype=null,$usertype=3,$devices=null,$gameId = null, $gameName = null)
	{ 
		$user = str_replace('_','s',$user);
		$user = $user;
		 // substr($user,0,5).substr($user,-3);
		$devices = 0;
		$str = 'platformCode='.$game.'&userName='.$user.'&userPassWord='.$this->password;
		// ÊÇ·ñÓÐÓÎÏ·ÀàÐÍ
		if ($gametype != null)
			$str .= '&gameType='.$gametype;
		// ÊÇ·ñÎªÊÖ»ú¶Ë
		if ($devices != 0)
			$str .= '&devices='.$devices;
		// ÊÇ·ñÓÐgameId£¬½öÏÞTTG
		if ($gameId != null)
			$str .='&gameId='.$gameId;
		// ÊÇ·ñÓÐgameName£¬½öÏÞTTG
		if ($gameName != null)
			$str .='&gameName='.$gameName;

		if ($usertype != 3)
			$str .='&userType='.$usertype;
		// ¼ÓÃÜ²ÎÊý
		 // echo $str;exit;

		$str = $this->encode($str, $this->key);
		$url='http://'.$this->biUrl.'/Api/Login?parameter='.$str.'&WebSiteCode='.$this->WebSiteCode;
		return $url;
	}

	public function loginGame($game,$user,$gametype=null)
	{
		$TimeStamp = time();
		
		$str = 'platformCode='.$game.'&userName='.$user.'&userPassWord='.$this->password.'&TimeStamp='.$TimeStamp;
		if ($gametype != null){
			$str .= '&GameType='.$gametype;
		}
		
		// ÊÇ·ñÎªÊÖ»ú¶Ë
		// ¼ÓÃÜ²ÎÊý
		// echo $str;exit;
		$str = $this->encode($str, $this->key);
		$url='http://'.$this->biUrl.'/Api/PlayGame?parameter='.$str.'&WebSiteCode='.$this->WebSiteCode;
		return $url;
	}


	// »ñÈ¡Í¶×¢¼ÇÂ¼
	public function GetMerchantReport($platformCode, $StartTime, $EndTime, $TimeStamp, $PageIndex, $PageSize) {
        $Str = "platformCode=" . $platformCode . "&StartTime=" . $StartTime . "&EndTime=" . $EndTime . "&TimeStamp=" . $TimeStamp . "&PageIndex=" . $PageIndex . "&PageSize=" . $PageSize . "";
        $DesStr = ($this->encode($Str, $this->key));
		
        $url = 'http://report.gebbs.net/QueryApi/GetMerchantReport?parameter=' . $DesStr . '&WebSiteCode=' . $this->WebSiteCode; 
        $data_array = $this->https_request($url);
        return $data_array;
    }
	// «@È¡ß[‘òÖÐÎÄÃû
	public function GetGameCNName($platformCode, $gameCode)
	{
		if ($platformCode == '' || $gameCode == '')
			return "error!";
		else
		{// **game.jsµÄÎÄ¼þÄ¿Â¼£¬Ò²¿ÉÒÔºÍ²É¼¯ÎÄ¼þ·ÅÍ¬Ò»Ä¿Â¼
			$file_path = "game.js";
			$arr = null;
			if(file_exists($file_path)){
				$str = file_get_contents($file_path);//½«Õû¸öÎÄ¼þÄÚÈÝ¶ÁÈëµ½Ò»¸ö×Ö·û´®ÖÐ
				$arr = json_decode($str, true);
			}

			$flag = false;
			foreach($arr as $k=>$v)
			{
				if ($k == 'electronicgame'.$platformCode)
				{
					$flag = true;
					foreach($v as $m)
					{
						if ($m['gameType'] == $gameCode)
						{// »ñµÃÖÐÎÄÃû³Æ
							$gName = $m['gameName'];
							return $gName;
						}
					}
				}
				if ($flag)
					break;
			}
		}
	}
	// »ñÈ¡ÉÌ»§Æ½Ì¨Óà¶î
	public function BusinessBalance(){
		$url='http://'.$this->biUrl.'/Api/BusinessBalance?WebSiteCode='.$this->WebSiteCode;
		$Business_data= $this->https_request($url);
		return $Business_data;
	}
	
	//½Ó¿ÚÇëÇóº¯Êý
	public function https_request($url,$data = null)
	{
		$curl = curl_init();//¿ªÆôÇëÇó»á»°
		curl_setopt($curl, CURLOPT_URL, $url);  //ÇëÇóµÄµØÖ·
		
		//Ä¬ÈÏÖ´ÐÐGETÇëÇó
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);  //ÇëÇóÄ£Ê½ÎªgetµÄÉèÖÃ
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE); //ÇëÇóÄ£Ê½ÎªgetµÄÉèÖÃ
		
		//Ö´ÐÐPOSTÇëÇó
		if (!empty($data))
		{
			curl_setopt($curl, CURLOPT_POST, 1);   // ÉèÖÃPOSTÇëÇó·½Ê½
			curl_setopt($curl, CURLOPT_POSTFIELDS, $data);  // ÉèÖÃPOSTÇëÇó·½Ê½,²¢ÇÒ¼ÓÉÏjsonÊý¾Ý
		}
		
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);  //Ö´ÐÐÒÔºó·µ»ØÎÄ¼þÁ÷£¬¶ø²»Ö±½ÓÊä³ö
		
		//Ö´ÐÐÇëÇó
		$output = curl_exec($curl);
		//¹Ø±Õ×ÊÔ´
		curl_close($curl);
		//°É·µ»ØµÄJSON×ª³ÉÊý×é
		$output=json_decode($output,true); 
		return $output;
	}
	
	/*ÒÆ¶¯¶ËÅÐ¶Ï*/
	function isMobile()
	{ 
		// Èç¹ûÓÐHTTP_X_WAP_PROFILEÔòÒ»¶¨ÊÇÒÆ¶¯Éè±¸
		if (isset ($_SERVER['HTTP_X_WAP_PROFILE']))
		{
			return true;
		} 
		// Èç¹ûviaÐÅÏ¢º¬ÓÐwapÔòÒ»¶¨ÊÇÒÆ¶¯Éè±¸,²¿·Ö·þÎñÉÌ»áÆÁ±Î¸ÃÐÅÏ¢
		if (isset ($_SERVER['HTTP_VIA']))
		{ 
			// ÕÒ²»µ½Îªflase,·ñÔòÎªtrue
			return stristr($_SERVER['HTTP_VIA'], "wap") ? true : false;
		} 
		// ÄÔ²Ð·¨£¬ÅÐ¶ÏÊÖ»ú·¢ËÍµÄ¿Í»§¶Ë±êÖ¾,¼æÈÝÐÔÓÐ´ýÌá¸ß
		if (isset ($_SERVER['HTTP_USER_AGENT']))
		{
			$clientkeywords = array ('nokia',
				'sony',
				'ericsson',
				'mot',
				'samsung',
				'htc',
				'sgh',
				'lg',
				'sharp',
				'sie-',
				'philips',
				'panasonic',
				'alcatel',
				'lenovo',
				'iphone',
				'ipod',
				'blackberry',
				'meizu',
				'android',
				'netfront',
				'symbian',
				'ucweb',
				'windowsce',
				'palm',
				'operamini',
				'operamobi',
				'openwave',
				'nexusone',
				'cldc',
				'midp',
				'wap',
				'mobile'
				); 
			// ´ÓHTTP_USER_AGENTÖÐ²éÕÒÊÖ»úä¯ÀÀÆ÷µÄ¹Ø¼ü×Ö
			if (preg_match("/(" . implode('|', $clientkeywords) . ")/i", strtolower($_SERVER['HTTP_USER_AGENT'])))
			{
				return true;
			} 
		} 
		// Ð­Òé·¨£¬ÒòÎªÓÐ¿ÉÄÜ²»×¼È·£¬·Åµ½×îºóÅÐ¶Ï
		if (isset ($_SERVER['HTTP_ACCEPT']))
		{ 
			// Èç¹ûÖ»Ö§³Öwml²¢ÇÒ²»Ö§³ÖhtmlÄÇÒ»¶¨ÊÇÒÆ¶¯Éè±¸
			// Èç¹ûÖ§³ÖwmlºÍhtmlµ«ÊÇwmlÔÚhtmlÖ®Ç°ÔòÊÇÒÆ¶¯Éè±¸
			if ((strpos($_SERVER['HTTP_ACCEPT'], 'vnd.wap.wml') !== false) && (strpos($_SERVER['HTTP_ACCEPT'], 'text/html') === false || (strpos($_SERVER['HTTP_ACCEPT'], 'vnd.wap.wml') < strpos($_SERVER['HTTP_ACCEPT'], 'text/html'))))
			{
				return true;
			} 
		} 
		return false;
	}
	
	


}

?>