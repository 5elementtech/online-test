<?php
/******************************************************************
	ABOUT THE AUTHOR
	CREATED BY: Tan, Angelito S.
	EMAIL ADDRESS: angelito.tan23@yahoo.com
	
	OPEN SOURCE FRAMEWORK
	PHP VERSION: Written in PHP 5.3.5
	
	PURPOSE: To help other's who want to create there own framework
	
	YEAR CREATION: 2011
	Update Year: 2012
*******************************************************************/

Class _Db{
	private $user;
	private $pass;
	private $host;
	private $dbnm;
	private $cn;
	private $mysql_result;
	
	public function __construct()
	{
		$this->user = DB_USER;
		$this->pass = DB_PASS;
		$this->host = DB_HOST;
		$this->dbnm = DB_NAME;
		$this->cn = mysqli_connect( $this->host, $this->user, $this->pass ) or die('error connection');
		
	}

	public function connect(){
	//$dbConnection = mysql_pconnect( $myHostname, $myUsername, $myPassword  );
		$this->cn = mysqli_connect( $this->host, $this->user, $this->pass ) or die('error connection');
		mysqli_select_db ( $this->cn ,$this->dbnm );
		//if ( !mysql_ping( $this->cn ) )
		//{
			//echo 'this';
		   //$this->cn = mysql_pconnect( $this->host, $this->user ) or die('error connection');
		   //mysql_select_db ( $this->dbname , $this->cn );
		//}
		//http://localhost:82/cool-schools/index.php?__profile/profile&id=-19%20UNION%20SELECT%201,2,3,4,5,6,7,8,9,10,11,12,13
	}
	
	public function query( $str , $assoc_type = 'assoc' ){
		$this->connect();
		if( strpos(strtolower($str), 'select') === 0 ){
		
		$this->mysql_result = mysqli_query( $this->cn , $str );
			if ( $this->mysql_result && mysqli_error($this->cn) == '' ){
					switch ( $assoc_type )
					{
						case 'assoc':
							while( $row= mysqli_fetch_assoc( $this->mysql_result ) ) {
								$result[] =  $row;
							}
						break;
						
						case 'fetch_row':
							$result = mysqli_fetch_row( $this->mysql_result );
						break;
					}
			}else{
				return mysql_error();
			}
		}else{
			mysqli_query($this->cn, $str );
		}
		if ( isset($result) ) return $result;
		
	}
	
	public function insert( $table, $values ) {
		print_r($values) ;
		$fields = implode(",", array_keys($values) );
		$val = implode("," , array_values($values) );
		echo "INSERT INTO ".$table. "(".$fields.") VALUES (".$val .")";
	   $this->query("INSERT INTO ".$table. "(".$fields.") VALUES (".$val .")");
		
	}
	/*
	public function update( $table, $values, $where = null ){
		for($fields = 0; $fields < count(array_keys($values)); $fields ++){
			$fields_val = isset( $fields_val ) ? $fields_val  . array_keys($values)[$fields] . '=' :   array_keys($values)[$fields] . '=';
			for($val = $fields; $val <= $fields; $val++){
				//$fields_val .= ( $val== count(array_keys($values)) - 1  ) ? array_values($values)[$val] : array_values($values)[$val] . ',';
			}
		}
		$this->query("UPDATE {$table} SET $fields_val {$where}");
	}
	*/
	public function delete( $table, $where = null ){
		$this->query("DELETE FROM {$table} {$where}");
	}

	public function fetch_all_rows( $sql, $assoc_type = 'assoc' ){
		return $this->query($sql, $assoc_type);
	}
}
?>