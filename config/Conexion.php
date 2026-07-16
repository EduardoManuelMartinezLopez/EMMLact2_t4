<?php
require_once __DIR__ . '/db_config.php';

class Conexion {

    public static function conectar() {
        $conexion = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

        if ($conexion->connect_error) {
            die('Error de conexion: ' . $conexion->connect_error);
        }

        $conexion->set_charset('utf8mb4');

        return $conexion;
    }
}
