<?php

    class ControllerHome{
        /**
         * Retourne la page d'accueil.
         */
        public function index(){
            return Twig::render("home-index.php");
        }

        /**
         * Retourne la page erreur 404.
         */
        public function error(){
            return Twig::render("error.php");
        }
    }

?>