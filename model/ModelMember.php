<?php

    class ModelMember extends CRUD { 
        protected $table = "member";
        protected $primaryKey = "id";
        protected $fillable = ["first_name", "last_name", "email", "phone"];

        /**
         * Récupère les données à afficher dans la liste des membres et effectue le décompte du nombre de réservations par membre.
         */
        public function getMembers() {
            $sql = "SELECT member.id, first_name, last_name, email, phone, COUNT(reservation.id) as reservationCount FROM member LEFT OUTER JOIN reservation ON member.id = reservation.member_id GROUP BY member.id";
            $query = $this->prepare($sql);
            $query->execute();
            return $query->fetchAll();
        }
    }

?>