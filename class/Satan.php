<?php
class Satan{

    private static $instance;
	private static $server = "http://188.166.68.117:8080/";

    public static function init(){
        if(self::$instance == NULL){
            $className = __CLASS__;
            self::$instance = new $className();
        }
        return self::$instance;
    }

    private function __construct(){

    }

	private function getData($type, $identification){
		if(!empty($identification)){
			$data = self::$server . $type . '/' . $identification;
		}
		else {
			$data = self::$server . $type;
		}

		$data = file_get_contents($data);
		$data = json_decode($data, true);

		return $data;
	}

	public function getUsers(){
		$data = $this->getData("customers", NULL);

		return $data;
	}

	public function getUser($identification){
		$data = $this->getData("customers", $identification);

		//if contains user not found return error.

		return $data;
	}
}
