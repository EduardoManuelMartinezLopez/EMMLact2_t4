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
  db_config.example.php   -> plantilla de credenciales (si va a github)
  db_config.php           -> credenciales reales (no va a github)
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

## Respuestas al cuestionario

**a) ¿Qué significa CRUD y qué operación corresponde a cada letra?**

CRUD = Create, Read, Update, Delete (Crear, Leer, Actualizar, Eliminar).
En SQL: Create = INSERT, Read = SELECT, Update = UPDATE, Delete = DELETE.

**b) ¿Qué entidad elegiste y por qué? Enlista sus campos.**

Elegí Destinos de viaje porque estoy trabajando en un proyecto de una app
de viajes (PlanGo) en otras actividades y quise mantener el mismo tema.
Campos: id_destino, nombre, pais, precio, duracion_dias, descripcion,
imagen.

**c) ¿Qué función de PHP usaste para conectarte a la base de datos y por qué es importante no dejar las credenciales visibles?**

Usé mysqli, con conexiones orientadas a objetos (`new mysqli(...)`) y
sentencias preparadas (`prepare` / `bind_param`) para evitar inyección
SQL. No hay que dejar las credenciales (usuario y contraseña de MySQL)
visibles en el código que se sube a GitHub porque cualquiera que vea el
repositorio podría usarlas para entrar directamente a la base de datos
del servidor y leer, modificar o borrar la información, o usar ese
acceso para meterse al resto del VPS. Por eso separé las credenciales
reales en `config/db_config.php`, que excluí del repositorio con
`.gitignore`, y dejé solo una plantilla de ejemplo sin datos reales
(`db_config.example.php`).

**d) Enlace del repositorio de GitHub y link del CRUD funcionando:**

- Repositorio: ``
- CRUD en el VPS: `http://IP_DEL_VPS/TUSINICIALESact2t4/](http://187.127.254.39/EMMLact2t4/`
