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

	/**
 	 * Method for getting data from server and convert to array.
 	 *
	 * @type must be a valid type.
 	 * @identification must be an user or account.
 	 * @return the data as array.
	 */

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

	/**
 	 * Get all users.
 	 *
 	 * @return all users.
	 */

	public function getUsers(){
		$data = $this->getData("customers", NULL);

		return $data;
	}

	/**
 	 * Get information about one user.
 	 *
 	 * @identification must be an valid user.
 	 * @return information about user.
	 */

	public function getUser($identification){
		$data = $this->getData("customers", $identification);

		//if contains user not found return error.

		return $data;
	}

	/**
 	 * Get accounts for one user.
 	 *
 	 * @identification must be an valid user.
 	 * @return users accounts.
	 */

	public function getAccounts($identification){
		$data = $this->getData("accounts", $identification);

		return $data;
	}

	/**
 	 * Get information about account.
 	 *
 	 * @identification must be an account number.
 	 * @return information about account.
	 */

	public function getAccount($identification){
		$data = $this->getData("account", $identification);

		return $data;
	}

	/**
 	 * Get account balance. Identification must be an account.
 	 *
 	 * @identification must be an account number.
 	 * @return account balance.
	 */

	public function getBalance($identification){
		$data = $this->getData("balance", $identification);

		return $data;
	}
}
