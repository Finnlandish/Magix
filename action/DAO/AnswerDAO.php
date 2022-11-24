<?php
   
   require_once("action/DAO/Connection.php");
   
    class AnswerDAO {
        public static function getAnswers()
        {
            $connection = Connection::getConnection();

            $statement = $connection->prepare("SELECT * FROM stats");

            $statement->setFetchMode(PDO::FETCH_ASSOC);

            $statement->execute();

            return $statement->fetchAll();

        }

        public static function addCard($cardid)
        {
            # code...
            $connection = Connection::getConnection();

            $statement = $connection->prepare("INSERT INTO stats ($cardid) VALUES ($cardid)");

            $statement->execute();

        }
        
    }