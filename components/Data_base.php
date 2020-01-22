<?php
	
	namespace main\components;
	echo "fffff";
 
	class Data_base {

		private $pdo;
		private $isConnected;
		private $statement;
		private $settings = [];
		private $params = [];
		//private $host;
		//private $db_name;
		//private $user;
		//private $password;

		public function __construct($settings){
			$this->settings = $settings;
			$this->connect();
		}

		private function connect(){
			$dsn = 'mysql:host='.$this->settings['host'].';dbname='.$this->settings['dbname'].';charset='.$this->settings['charset'].'';

			$this->pdo = new \PDO($dsn, $this->settings['user'], $this->settings['password']);
			var_dump($this->pdo);
			$this->isConnected = true;

			/*try{
				//$this->pdo = new \PDO($dsn, $this->settings['user'], $this->settings['password']);
				$this->pdo = new \PDO('mysql:host=localhost;dbname=football;charset=utf8', 'root', '');

				//$this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
				//$this->pdo->setAttribute(\PDO::ATTR_EMULATE_PREPARES, false);

				$this->isConnected = true;
				echo "fgfdgfdg";
			} catch (\PDOException $e){
				echo "ne podkluchim";
				exit($e->getMessage());
			}*/

			
		}

		public function closeConnection(){
			$this->pdo = null;
		}

		private function init($query, $params = []){
			if(!$this->isConnected){
				echo "<br />1223<br />";
				$this->connect();
			}
			echo "<br />2233<br />";
			try{
				$this->params = $this->pdo->prepare($query);
				$this->bind($params);
				echo "<br />4233<br />";
			} catch (\PDOException $e) {
				exit($e->getMessage());
			}
		}

		private function bind($params){
			if(!empty($params) and is_array($params)){
				$columns = array_keys($params);
				var_dump($params);
				foreach($columns as $i => &$column){
					$this->params[sizeof($this->params)] = [':'.$column, $params[$column]];
				}
			}
		}

		public function query($query, $params = [], $mode = \PDO::FETCH_ASSOC){
			$query = trim(str_replace('\r', '', $query));
			
			$this->init($query, $params);
			echo $query;
			$rowStatement = explode(' ', $query);
			$statement = strtolower($rowStatement[0]);
			var_dump($statement);

			if($statement === 'select' || $statement === 'show'){
				return $this->$statement->fetchAll($mode);
			} elseif ($statement === 'insert' || $statement === 'update' || $statement === 'delete') {
				return $this->$statement->rowCount();
			} else {
				return null;
			}
		}
	}

	$config = array('host' => 'localhost', 'dbname' => 'football', 'user' => 'root', 'password' => '', 'charset' => 'utf-8');
    /**
     * @var Подключение к бд
     */
    echo "ffff";
    $connection = new PDO('mysql:host=localhost;dbname=football;charset=utf8', 'root', '');
    $connection->exec('INSERT INTO countries VALUES ("Croatia")');
    var_dump($connection->query('SELECT * FROM countries'));



    $connection = new PDO('mysql:host=localhost;dbname=football;charset=utf8', 'root', '');
    $connection->exec('INSERT INTO countries (country_name) VALUES ("Croatia")');
    $connection->exec("UPDATE trainers SET trainer_name = 'Trainer_Lusi' WHERE trainer_id = 3");
    $connection->exec("delete from matches where match_id = 75");
    $statement = $connection->query("SELECT * FROM countries WHERE country_name = 'France'");
    $row = $statement->fetch(PDO::FETCH_ASSOC);
    print_r($row);
?>