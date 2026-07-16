<?php
require_once __DIR__ . '/../config/Conexion.php';

class ModeloDestino {

    // registrar un destino nuevo
    public static function mdlRegistrarDestino($datos) {
        $con = Conexion::conectar();

        $sql = "INSERT INTO destinos (nombre, pais, precio, duracion_dias, descripcion, imagen)
                VALUES (?, ?, ?, ?, ?, ?)";

        $stmt = $con->prepare($sql);
        $stmt->bind_param(
            'ssdiss',
            $datos['nombre'],
            $datos['pais'],
            $datos['precio'],
            $datos['duracion_dias'],
            $datos['descripcion'],
            $datos['imagen']
        );

        $ok = $stmt->execute();

        $stmt->close();
        $con->close();

        return $ok ? 'ok' : 'error';
    }

    // traer todos los destinos
    public static function mdlMostrarDestinos() {
        $con = Conexion::conectar();

        $resultado = $con->query("SELECT * FROM destinos ORDER BY id_destino DESC");

        $destinos = array();
        while ($fila = $resultado->fetch_assoc()) {
            $destinos[] = $fila;
        }

        $con->close();

        return $destinos;
    }

    // traer un solo destino, para precargar el form de editar
    public static function mdlMostrarDestino($id) {
        $con = Conexion::conectar();

        $stmt = $con->prepare("SELECT * FROM destinos WHERE id_destino = ?");
        $stmt->bind_param('i', $id);
        $stmt->execute();

        $destino = $stmt->get_result()->fetch_assoc();

        $stmt->close();
        $con->close();

        return $destino;
    }

    // actualizar un destino existente
    public static function mdlActualizarDestino($datos) {
        $con = Conexion::conectar();

        $sql = "UPDATE destinos
                SET nombre=?, pais=?, precio=?, duracion_dias=?, descripcion=?, imagen=?
                WHERE id_destino=?";

        $stmt = $con->prepare($sql);
        $stmt->bind_param(
            'ssdissi',
            $datos['nombre'],
            $datos['pais'],
            $datos['precio'],
            $datos['duracion_dias'],
            $datos['descripcion'],
            $datos['imagen'],
            $datos['id_destino']
        );

        $ok = $stmt->execute();

        $stmt->close();
        $con->close();

        return $ok ? 'ok' : 'error';
    }

    // eliminar un destino
    public static function mdlBorrarDestino($id) {
        $con = Conexion::conectar();

        $stmt = $con->prepare("DELETE FROM destinos WHERE id_destino = ?");
        $stmt->bind_param('i', $id);

        $ok = $stmt->execute();

        $stmt->close();
        $con->close();

        return $ok ? 'ok' : 'error';
    }
}
