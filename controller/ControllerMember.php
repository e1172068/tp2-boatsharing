<?php

    RequirePage::requireModel("CRUD");
    RequirePage::requireModel("Member");
    RequirePage::requireLibrary('Validation');


    class ControllerMember {
        /**
         * Retourne la liste des membres récupérée à la bd.
         */
        public function list() {
            $member = new ModelMember;
            $members = $member->getMembers();
            return Twig::render("member-list.php", ["members" => $members]);
        }

        /**
         * Retourne la page d'ajout de membre.
         */
        public function add() {
            return Twig::render("member-add-form.php");
        }

        /**
         * Valide les informations soumises par l'usager dans la page d'ajout de membre et insère un nouveau membre à la bd si valide. Sinon, retourne au formulaire d'ajout avec le(s) message(s) d'erreur approprié.
         */
        public function store() {
            $validation = new Validation;
            extract($_POST);
            $validation->name("first_name")->value($first_name)->pattern("alpha")->max(20);
            $validation->name("last_name")->value($last_name)->pattern("alpha")->max(20);
            $validation->name("email")->value($email)->pattern("email")->max(40);
            $validation->name("phone")->value($phone)->pattern("tel")->max(30);

            if ($validation->isSuccess()) {
                $member = new ModelMember;
                $insert = $member->insert($_POST);
                RequirePage::redirect("member/list");
            } else {
                $errors = $validation->displayErrors();
                return Twig::render("member-add-form.php", ["errors" => $errors, "member" => $_POST]); 
            }
        }

        /**
         * Retourne le page de modification du membre dont le id est envoyé en argument.
         */
        public function edit($id) {
            $member = new ModelMember;
            $selectById = $member->selectById($id);

            return Twig::render("member-edit-form.php", ["member" => $selectById]);
        }

        /**
         * Valide les informations soumises par l'usager dans la page de modification de membre et update le membre à la bd si valide. Sinon, retourne au formulaire de modification avec le(s) message(s) d'erreur approprié.
         */
        public function update() {
            $validation = new Validation;
            extract($_POST);
            $validation->name("first_name")->value($first_name)->pattern("alpha")->max(20);
            $validation->name("last_name")->value($last_name)->pattern("alpha")->max(20);
            $validation->name("email")->value($email)->pattern("email")->max(40);
            $validation->name("phone")->value($phone)->pattern("tel")->max(30);

            if ($validation->isSuccess()) {
                $member = new ModelMember;
                $update = $member->update($_POST);
                RequirePage::redirect("member/list");
            } else {
                $errors = $validation->displayErrors();
                return Twig::render("member-edit-form.php", ["errors" => $errors, "member" => $_POST]); 
            }

        }

        /** Supprime le membre dont le id est envoyé en argument dans la bd. Redirige à la liste de membres. */
        public function delete($id) {
            $member = new ModelMember;
            $delete = $member->delete($id);
            RequirePage::redirect("member/list");
        } 
    }

?>
