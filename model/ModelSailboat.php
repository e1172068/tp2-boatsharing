<?php

    class ModelSailboat extends CRUD { 
        protected $table = "sailboat";
        protected $primaryKey = "id";
        protected $fillable = ["id", "name", "sailboat_type_id"];
    }

?>