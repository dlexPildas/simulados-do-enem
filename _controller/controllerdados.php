<?php

class Controllerdados {
	public static $instance;
	
	private function __construct() {
        
    }
	
	public static function getInstance() {
        if (!isset(self::$instance)) {
            self::$instance = new Controllerdados();
        }

        return self::$instance;
    }
	
	public static function zeraSingleton(){
		self::$instance = new Controllerdados();
	}

}
?>