# PlanGo - Actividad 2 (Tema 4): CRUD en PHP y MySQL con Bootstrap (MVC)

CRUD de Destinos de viaje, hecho en PHP con patrón MVC, conectado a MySQL
con mysqli, e interfaz con Bootstrap 5.

## Entidad: Destinos

| Campo           | Tipo          |
|-----------------|---------------|
| id_destino      | INT (PK, AI)  |
| nombre          | VARCHAR(100)  |
| pais            | VARCHAR(60)   |
| precio          | DECIMAL(10,2) |
| duracion_dias   | INT           |
| descripcion     | TEXT          |
| imagen          | VARCHAR(255)  |

## Estructura

```
config/
  Conexion.php            -> conexion a MySQL con mysqli
  db_config.example.php   -> plantilla de credenciales
  db_config.php           -> credenciales reales
modelo/
  ModeloDestino.php        -> INSERT, SELECT, UPDATE, DELETE
controlador/
  ControladorDestino.php   -> conecta las vistas con el modelo
vista/plantillas/
  header.php / footer.php
index.php     -> listar (READ) + eliminar (DELETE)
crear.php     -> registrar (CREATE)
editar.php    -> modificar (UPDATE)
database.sql  -> crea la base de datos y la tabla
```

## Instalación

1. `mysql -u root -p < database.sql`
2. Copiar `config/db_config.example.php` a `config/db_config.php` y poner
   ahí las credenciales reales.
3. Subir el proyecto a `/TUSINICIALESact2t4/` en el VPS.
4. Abrir `http://IP_DEL_VPS/TUSINICIALESact2t4/`
