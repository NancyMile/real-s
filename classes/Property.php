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
        $this->image = $args['image'] ?? '';
        $this->description = $args['description'] ?? '';
        $this->rooms = $args['rooms'] ?? '';
        $this->bathrooms = $args['bathrooms'] ?? '';
        $this->garages = $args['garages'] ?? '';
        $this->seller_id = $args['seller_id'] ?? 1;
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
        return $result;
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

    //set image
    public function setImage($image){
        //delete previous image
        if(isset($this->id)){
            //check if the image exist
            $imageExists = file_exists(IMAGES_FOLDER.$this->image);
            if($imageExists){
                unlink(IMAGES_FOLDER.$this->image);
            }
        }
        //asignt to attribute imagen the name of the new image
        if($image){
            $this->image = $image;
        }
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
        if(!$this->image){
         self::$errors[] = "Please Upload an image";
        }
    return self::$errors;
    }

    //list of all properties
    public static function all(){
        $query = "SELECT * FROM properties";
        $result = self::sqlQuery($query);
        return $result;
    }

    //find a record by id
    public static function find($id){
        $query = "SELECT * FROM properties WHERE id = $id ";
        $result = self::sqlQuery($query);
        return array_shift($result); //return the first position of the array
    }

    public static function sqlQuery($query){
        //query db
        $result = self::$db->query($query);
        //debugear($result->fetch_assoc());

        //iterate results
        $array = [];
        while($record = $result->fetch_assoc()){
            $array[] = self::createObject($record);
        }
        //debugear($array);// now is an array of objects

        //free memory
        $result->free();
        //return results
        return $array;
    }

    public static function createObject($record){
        $object = new self; //instanciate from the main class Property
        //debugear($object); //onject  with all the key empty

        foreach($record as $key => $value){
            if(property_exists($object,$key)){
                $object->$key = $value;  //if the prop exist asign the value
            }
        }

        //debugear($object); //object with the new values;
        return $object;
    }

    // sincronnise the object on memory with thechanges made by the user
    public function sincronnise( $args = [] ){
        foreach($args as $key => $value){
            if(property_exists($this,$key) && !is_null($value)){
                $this->$key = $value;
            }
        }
    }
}