<?php
namespace App;

class Property{
    //db attribute
    protected static $db;

    public $id;
    public $title;
    public $price;
    public $image;
    public $description;
    public $rooms;
    public $bathrooms;
    public $garages;
    public $seller_id;
    public $created_at;

    function __construct($args = [])
    {
        $this->id = $args['id'] ?? '';
        $this->title = $args['title'] ?? '';
        $this->price = $args['price'] ?? '';
        $this->image = $args['image'] ?? 'image.jpg';
        $this->description = $args['description'] ?? '';
        $this->rooms = $args['rooms'] ?? '';
        $this->bathrooms = $args['bathrooms'] ?? '';
        $this->garages = $args['garages'] ?? '';
        $this->seller_id = $args['seller_id'] ?? '';
        $this->created_at = date('Y/m/d');
    }

    public function saving(){
        //echo "Saving properties";
        //save record on db
        $query = "INSERT INTO properties (title,price,image,description,rooms,bathrooms,garages,created_at,seller_id)
        VALUES('$this->title','$this->price','$this->image','$this->description','$this->rooms','$this->bathrooms','$this->garages','$this->created_at','$this->seller_id')";
        //debugear($query);
        $result = self::$db->query($query);
        //debugear($result);
    }

    //connection to db
    public static function setDB($database){
        self::$db = $database;
    }
}