-- correr con: mysql -u root -p < database.sql

CREATE DATABASE IF NOT EXISTS plango_destinos
    CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

USE plango_destinos;

CREATE TABLE IF NOT EXISTS destinos (
    id_destino     INT AUTO_INCREMENT PRIMARY KEY,
    nombre         VARCHAR(100) NOT NULL,
    pais           VARCHAR(60)  NOT NULL,
    precio         DECIMAL(10,2) NOT NULL,
    duracion_dias  INT NOT NULL,
    descripcion    TEXT,
    imagen         VARCHAR(255)
);

INSERT INTO destinos (nombre, pais, precio, duracion_dias, descripcion, imagen) VALUES
('Tulum Paradise', 'México', 899.00, 5, 'Playas de arena blanca y ruinas mayas frente al mar.', 'https://placehold.co/300x200?text=Tulum'),
('Aventura en Cusco', 'Perú', 1200.00, 7, 'Recorrido por Machu Picchu y el Valle Sagrado.', 'https://placehold.co/300x200?text=Cusco'),
('Escapada a Kioto', 'Japón', 2100.00, 8, 'Templos históricos y jardines tradicionales japoneses.', 'https://placehold.co/300x200?text=Kioto'),
('Playa de Cancún', 'México', 750.00, 4, 'Aguas turquesa y vida nocturna en el Caribe mexicano.', 'https://placehold.co/300x200?text=Cancun'),
('Ruta por la Toscana', 'Italia', 1650.00, 9, 'Viñedos, pueblos medievales y gastronomía italiana.', 'https://placehold.co/300x200?text=Toscana'),
('Safari en Kenia', 'Kenia', 2800.00, 10, 'Avistamiento de fauna africana en el Masái Mara.', 'https://placehold.co/300x200?text=Kenia'),
('Islas Griegas', 'Grecia', 1900.00, 8, 'Recorrido por Santorini y Mykonos con playas de ensueño.', 'https://placehold.co/300x200?text=Grecia'),
('Nueva York en Navidad', 'Estados Unidos', 2200.00, 6, 'Luces navideñas, patinaje en Central Park y Broadway.', 'https://placehold.co/300x200?text=NuevaYork'),
('Trekking en la Patagonia', 'Argentina', 1750.00, 7, 'Glaciares y montañas en el fin del mundo.', 'https://placehold.co/300x200?text=Patagonia'),
('Bangkok y Templos', 'Tailandia', 1100.00, 6, 'Mercados flotantes, templos dorados y street food.', 'https://placehold.co/300x200?text=Bangkok'),
('Marrakech Místico', 'Marruecos', 980.00, 5, 'Zocos, riads y el desierto del Sahara a un paso.', 'https://placehold.co/300x200?text=Marrakech'),
('Fiordos Noruegos', 'Noruega', 3100.00, 9, 'Cruceros entre montañas y auroras boreales.', 'https://placehold.co/300x200?text=Noruega'),
('Bali Relax', 'Indonesia', 1300.00, 8, 'Templos, arrozales y playas para desconectar.', 'https://placehold.co/300x200?text=Bali');