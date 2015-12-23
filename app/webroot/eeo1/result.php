<?php

require_once 'status.php';

class result {
    
    public $status = 0;
    public $message = "success";
    public $data;
    
    function __construct($status = 0, $data = null) {
        $this->status = $status;        
        $this->message = $GLOBALS['STATUS'][$status];
        $this->data = $data;
    }
    
    public function json() {
        if ($this->data != null) {
            $json = array("status" => $this->status, "message" => $this->message, "data" => $this->data);
        } else {
            $json = array("status" => $this->status, "message" => $this->message);
        }
        
        return json_encode($json);
    }
}
?>