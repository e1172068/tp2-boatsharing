<?php

    RequirePage::requireModel("CRUD");
    RequirePage::requireModel("Sailboat");
    RequirePage::requireModel("Sailboattype");
    RequirePage::requireLibrary('Validation');


    class ControllerSailboat {
        /**
         * Retourne la liste des voiliers récupérée à la bd.
         */
        public function list() {
            $sailboat = new ModelSailboat;
            $select = $sailboat->select();
            $sailboattypes = new ModelSailboattype;
            $sailboattypes = $sailboattypes->select("name");
            return Twig::render("sailboat-list.php", ["sailboats" => $select, "types" => $sailboattypes]);
        }

        /**
         * Retourne la page d'ajout de voilier.
         */
        public function add() {
            $sailboattypes = new ModelSailboattype;
            $sailboattypes = $sailboattypes->select("name");
            return Twig::render("sailboat-add-form.php", ["types" => $sailboattypes]);
        }

        /**
         * Valide les informations soumises par l'usager dans la page d'ajout de voilier et insère un nouveau voilier à la bd si valide. Sinon, retourne au formulaire d'ajout avec le(s) message(s) d'erreur approprié.
         */
        public function store() {
            $validation = new Validation;
            extract($_POST);
            $validation->name("name")->value($name)->pattern("words")->max(45);
            $validation->name("sailboat_type_id")->value($sailboat_type_id)->pattern("int")->max(11);
            
            if ($validation->isSuccess()) {
                $sailboat = new ModelSailboat;
                $insert = $sailboat->insert($_POST);
                RequirePage::redirect("sailboat/list");
            } else {
                $errors = $validation->displayErrors();
                $sailboattypes = new ModelSailboattype;
                $sailboattypes = $sailboattypes->select("name");
                return Twig::render("sailboat-add-form.php", ["errors" => $errors, "sailboat" => $_POST, "types" => $sailboattypes]); 
            }
        }

        /** Supprime le voilier dont le id est envoyé en argument dans la bd. Redirige à la liste de voiliers. */
        public function delete($id) {
            $sailboat = new ModelSailboat;
            $delete = $sailboat->delete($id);
            RequirePage::redirect("sailboat/list");
        } 
    }

?>