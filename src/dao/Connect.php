<?php

//namespace VideoInit\dao;


class Connect  {


	private static $pdo = null;
	
	public static function getConnection() {
	
		if (self::$pdo==null) {
			
			try {
			
				self::$pdo = new PDO(SQL_DSN, SQL_USERNAME, SQL_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));

			} catch (PDOException $e) {
			
				die($e);
			}
		} 
		return self::$pdo; 
	}
	
}


