<?php
class Custom{

    private static $instance;

    protected $db;

    public static function init(){
        if(self::$instance == NULL){
            $className = __CLASS__;
            self::$instance = new $className();
        }
        return self::$instance;
    }

    private function __construct(){
        $this->db = Database::init();
    }

    public function getUserIP(){
        $client  = @$_SERVER['HTTP_CLIENT_IP'];
        $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
        $remote  = $_SERVER['REMOTE_ADDR'];

        if(filter_var($client, FILTER_VALIDATE_IP)){
            $ip = $client;
        }
        elseif(filter_var($forward, FILTER_VALIDATE_IP)){
            $ip = $forward;
        }
        else{
            $ip = $remote;
        }

        return $ip;
    }

    public function makeLog(){
        $db = $this->db; // Så slipper du å endre alle $db her til $this->db.
        //$userID     = logged['id'];
        $userID     = "NULL";
        $ip         = $this->getUserIP();
        $url        = $db->escape($_SERVER["REQUEST_URI"]);
        $browser    = $db->escape($_SERVER['HTTP_USER_AGENT']);
        $protocol   = $db->escape($_SERVER['SERVER_PROTOCOL']);
        $method     = $db->escape($_SERVER['REQUEST_METHOD']);
        $referer    = $db->escape((isset($_SEVER['HTTP_REFERER'])?$_SERVER['HTTP_REFERER'] : null));
        $time       = time();

        $db->query("INSERT INTO `log` SET
            `userID`='" . $userID . "',
            `ip`='" . $ip . "',
            `url`='" . $url . "',
            `browser`='" . $browser . "',
            `protocol`='" . $protocol . "',
            `method`='" . $method . "',
            `referer`='" . $referer . "',
            `time`='" . $time . "'
        ");
    }
}
