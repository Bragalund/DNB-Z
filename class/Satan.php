<?php
class Satan{

    private static $instance;
	private static $server = "http://tollerud.no/annet/pj3100/";

    public static function init(){
        if(self::$instance == NULL){
            $className = __CLASS__;
            self::$instance = new $className();
        }
        return self::$instance;
    }

    private function __construct(){

    }

	private function getJson($type){
		$data = self::$server . $type;
		$jsondata = file_get_contents($data);
		$json = json_decode($jsondata, true);

		return $json;
	}

	public function getUsers(){
		$data = $this->getJson("customers");

		return $data;
	}
}
