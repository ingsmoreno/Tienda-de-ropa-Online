<?php

class Database{

    public static function connect(){
        $db = new mysqli ("localhost", "administrador", "admin", "tienda_master");
        $db->query("SET NAMES 'utf8'");
            return $db;
    }
}