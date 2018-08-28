<?php
define("IN_CLOUD", TRUE);

class WX{

    public function __construct(){

    }

    public function accessToken(){
        $wx_info = M('wechat') -> where('id=1') -> find();
        if(intval($wx_info['access_time']) - 3600 < time()){
            $url = 
        }
    }

    private function valid(){
        $tmpArr = array($this -> getSetting('token'), $_GET["timestamp"], $_GET["nonce"]);
        sort($tmpArr, SORT_STRING);
		if( sha1(implode( $tmpArr )) == $_GET["signature"] ){
            die($_GET["echostr"]);
		}else{
			return false;
		}
    }

    private function getSetting($key = null){
        $list = json_decode(file_get_contents('data/setting.json'), true);
        foreach ($list as $v) {
            if(intval($v['ENABLE']) == 1){
                return $key == null ? $v : $v[strtoupper($key)];
            }
        }
    }
}
?>
