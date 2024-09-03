<?php

namespace Cards\App\Models;

use Illuminate\Database\Capsule\Manager as Capsule;

class CreateTables {

public $id_user;
public $project = 'cards';
public $tableCategory;
public $tableWords;

public function __construct() { 
    if(isset($_SESSION['user']['id_user']))
    {
        $this->id_user = $_SESSION['user']['id_user'];
    }
        $this->tableCategory = $this->project."_".$this->id_user."_category";
            $this->tableWords = $this->project."_".$this->id_user."_words"; 
}

public function createTables() {
    // Create table category
    if(!Capsule::schema()->hasTable($this->tableCategory))
    {   
        // Create table
        Capsule::schema()->create($this->tableCategory, function ($table) {
            $table->increments('id_category');
            $table->string('category');
            $table->tinyInteger('default');
        });
        // Filling table
        Capsule::table($this->tableCategory)->insert([
            'category'=>'My words',
            'default'=> 1
        ]);
    }
    // Create table words
    if(!Capsule::schema()->hasTable($this->tableWords))
    {   
        // Create table
        Capsule::schema()->create($this->tableWords, function ($table) {
            $table->increments('id_words');
            $table->string('native');
            $table->string('translate');
            $table->string('sentence');
            $table->tinyInteger('score')->default(0);
            $table->integer('id_category');
            $table->timestamp('created_at');
        });
    }
    // Recorder table exist
    Capsule::table('users')
        ->where('id_user', $this->id_user)
        ->update(['analytics' => 1]);

    $_SESSION['user']['analytics'] = 1;
}

}
