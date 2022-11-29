<?php 
    class Database{
        private static $DATABASE_NAME = 'kelompok2';
        private static $DATABASE_HOST = 'localhost';
        private static $DATABASE_USERNAME = 'root';
        private static $DATABASE_PASSWORD = '';
        private static $cont  = null;

        public static function connect(){
            if(null == self::$cont){
                try{
                    self::$cont = new PDO("mysql:host=".self::$DATABASE_HOST.";"."dbname=".self::$DATABASE_NAME, self::$DATABASE_USERNAME, self::$DATABASE_PASSWORD); 

                }catch(PDOException $e){
                    exit($e->getMessage());
                }

                return self::$cont;
            }
        }

        public static function disconnect(){
            self::$cont = null;
        }
    }
?>