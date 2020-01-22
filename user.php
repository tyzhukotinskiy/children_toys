<?php
	class Country{
		protected $country_id;
		protected $country_name;

		public function getId()
		{
			return $this->country_id;
		}

		public function setId($id){
			$this->country_id = $id;
		}

		public function getName(){
			return $this->country_name;
		}

		public function setName($name){
			$this->country_name = $name;
		}
	}

	$connection = new PDO('mysql:host=localhost;dbname=football;charset=utf8', 'root', '');

	$statement = $connection->query('SELECT * FROM countries');

	$statement->setFetchMode(PDO::FETCH_CLASS, 'Country');
	//$row = $statement->fetch(PDO::FETCH_CLASS)
	$country = $statement->fetch();
	var_dump($country);
	echo "А вот эта страна называется: ".$country->getName();
	
?>