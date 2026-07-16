<?php
require_once __DIR__ . '/../modelo/ModeloDestino.php';

class ControladorDestino {

    public function ctrMostrarDestinos() {
        return ModeloDestino::mdlMostrarDestinos();
    }

    public function ctrMostrarDestino($id) {
        return ModeloDestino::mdlMostrarDestino($id);
    }

    public function ctrRegistrarDestino() {
        if (isset($_POST['nombre'])) {
            $datos = array(
                'nombre'        => $_POST['nombre'],
                'pais'          => $_POST['pais'],
                'precio'        => $_POST['precio'],
                'duracion_dias' => $_POST['duracion_dias'],
                'descripcion'   => $_POST['descripcion'],
                'imagen'        => $_POST['imagen'],
            );

            $respuesta = ModeloDestino::mdlRegistrarDestino($datos);

            if ($respuesta == 'ok') {
                header('location: index.php?mensaje=creado');
            } else {
                header('location: crear.php?mensaje=error');
            }
            exit();
        }
    }

    public function ctrActualizarDestino() {
        if (isset($_POST['id_destino'])) {
            $datos = array(
                'id_destino'    => $_POST['id_destino'],
                'nombre'        => $_POST['nombre'],
                'pais'          => $_POST['pais'],
                'precio'        => $_POST['precio'],
                'duracion_dias' => $_POST['duracion_dias'],
                'descripcion'   => $_POST['descripcion'],
                'imagen'        => $_POST['imagen'],
            );

            $respuesta = ModeloDestino::mdlActualizarDestino($datos);

            if ($respuesta == 'ok') {
                header('location: index.php?mensaje=actualizado');
            } else {
                header('location: editar.php?id=' . $datos['id_destino'] . '&mensaje=error');
            }
            exit();
        }
    }

    public function ctrEliminarDestino() {
        if (isset($_GET['idEliminar'])) {
            $respuesta = ModeloDestino::mdlBorrarDestino($_GET['idEliminar']);

            if ($respuesta == 'ok') {
                header('location: index.php?mensaje=eliminado');
            } else {
                header('location: index.php?mensaje=error');
            }
            exit();
        }
    }
}
