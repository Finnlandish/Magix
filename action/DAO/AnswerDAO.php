<?php
   
   require_once("action/DAO/Connection.php");
   
    class AnswerDAO {
        public static function getStats()
        {
            $connection = Connection::getConnection();

            $statement = $connection->prepare("SELECT COUNT(cardid) FROM stats GROUP BY cardid;");

            $statement->setFetchMode(PDO::FETCH_ASSOC);

            $statement->execute();

            return $statement->fetchAll();

        }

        public static function addCard($cardid)
        {
            # code...
            $connection = Connection::getConnection();

            $statement = $connection->prepare("INSERT INTO stats (cardid) VALUES ($cardid)");

            $statement->execute();

        }
        public static function clearBD()
        {
            # code...
            $connection = Connection::getConnection();

            $statement = $connection->prepare("DELETE FROM stats");

            $statement->execute();

        }
        
    }