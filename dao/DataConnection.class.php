<?php
	if ( !defined("__DATACONNECTION__") ){
		define("__DATACONNECTION__","");
		class DataConnection
		{	
			private $link;
			private $server;
			private $user;
			private $password;
			private $database = "cookies";
			
			public function __construct($s, $u, $p)  
			{  
				
				$this->server = $s;
				$this->user = $u;
				$this->password = $p;

				$link = mysql_connect($this->server,$this->user,$this->password);
				
			} 
			
			public function connectDB()
			{
				if ( $this->link != NULL )
				{
					$db_selected = mysql_select_db($this->database, $this->link);
					if ($db_selected) {
						$this->link = $link;
						return;
					}
				}
			}

			public function isConnectionEstablished(){
				if ( $this->link != NULL ) return true; return false;
			}
			
			public function executeQuery($qry){
				if ( $this->link != NULL )
					return mysql_query($qry,$this->link);
				return false;
			}

			public function getDB($qry){

			    //$link = mysql_connect("localhost","root","root");

				return mysql_query($qry);
			}


		}
	}
?>