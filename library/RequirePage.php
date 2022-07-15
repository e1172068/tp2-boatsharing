<?php

    class RequirePage { 
        static function requireModel($page) {
            return require_once "model/Model" . $page . ".php";
        }

        static function redirect($url) {
            header("Location: http://localhost:7080/tp2-boatsharing/$url");
        }

        static function requireLibrary($page) {
            return require_once "library/" . $page . ".php";
        }
    }

?>