<?php
	namespace main\models;

	class CategoriesModel{
		protected $id;
		protected $title;
		protected $description;

		public function getId(){
			return $this->id;
		}

		public function getTitle(){
			return $this->title;
		}

		public function setTitle($title){
			$this->title = $title;
		}

		public function getDescription (){
			return $this->description;
		}

		public function setDescription ($desc){
			$this->description = $desc;
		}
	}
?>