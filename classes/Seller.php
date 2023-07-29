<?php
 namespace App;

class Seller extends ActiveRecord {
    protected static $table = 'sellers';
    protected static $dbColumns = ['id','name','lastname','phone'];
    
    public $id;
    public $name;
    public $lastname;
    public $phone;

    function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->name = $args['name'] ?? '';
        $this->lastname = $args['lastname'] ?? '';
        $this->phone = $args['phone'] ?? '';
    }
}