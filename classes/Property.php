<?php
namespace App;

class Property{
    //db attribute
    protected static $db;
    protected static $dbColumns = ['id','title','price','image','description','rooms','bathrooms','garages','seller_id','created_at'];

    //errors
    protected static $errors = [];

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

    //connection to db
    public static function setDB($database){
        self::$db = $database;
    }

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

        //sanitize data
        $attributes = $this->sanitizeData();

        //save record on db
        $query = "INSERT INTO properties ( ";
        $query.= join(', ',array_keys($attributes));
        $query.= " )VALUES('";
        $query.= join("', '",array_values($attributes));
        $query.= "')";

        $result = self::$db->query($query);
        //debugear($result);
    }

    //identify and map the attributes of the db
    public function attributes(){
        $attributes = [];
        foreach(self::$dbColumns as $column){
            if($column === 'id') continue;
            $attributes[$column] = $this->$column;
        }
        return $attributes;
    }

    public function sanitizeData(){
        $attributes = $this->attributes();
        $sanitized = [];
        foreach($attributes as $key => $value){
            $sanitized[$key] = self::$db->escape_string($value);
        }
        return $sanitized;
    }

    //validation
    public static function getErrors(){
        return self::$errors;
    }

    public function validate(){
        if(!$this->title){
            self::$errors[] = 'Please enter title';
          }
        if(!$this->price){
        self::$errors[] = 'Please enter price';
        }
        if(strlen($this->description) < 50){
        self::$errors[] = 'Please enter description min 50 characters';
        }
        if(!$this->rooms){
        self::$errors[] = 'Please enter rooms';
        }
        if(!$this->bathrooms){
        self::$errors[] = 'Please enter bathrooms';
        }
        if(!$this->garages){
        self::$errors[] = 'Please enter garages';
        }
        if(!$this->seller_id){
        self::$errors[] = 'Please select the seller';
        }
        //if(!$this->image['name']){
        //  self::$errors[] = "Please Upload an image";
        //}

        //validate size of image (max 100 Kb)
    //   $size = 1000 * 100;

    //   if($this->image['size'] > $size  || $this->image['error']){
    //     self::$errors[] = 'Image size must be less that 100 kb';
    //   }
    return self::$errors;
    }
}