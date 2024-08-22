# favorit-s
Crud de imágenes

Tabla de Contenidos:
Requisitos Previos
Instalación
Cómo Probar la Aplicación
Proceso de Desarrollo y Justificación
Arquitectura
Técnicas Utilizadas
Consideraciones Adicionales
Próximos Pasos y Mejoras


Requisitos Previos
Antes de instalar y ejecutar la aplicación, asegúrate de tener instalados los siguientes componentes:

PHP: Versión 7.4 o superior.
Servidor Web: Apache o Nginx.
MySQL: Versión 5.7 o superior.
Git: Para clonar el repositorio.
Opcionalmente, puedes utilizar un entorno de desarrollo como XAMPP o WAMP, que incluye Apache, MySQL y PHP.

Instalación
Clonar el Repositorio
Clona el repositorio en tu máquina local utilizando el siguiente comando:
git clone https://github.com/julioarresa/favorit-s.git


Configuración de la Base de Datos
Accede a MySQL y crea una nueva base de datos llamada favoritos_db:
Importa el esquema de la base de datos desde el archivo schema.sql (si está disponible en el repositorio):
Si es necesario edita el archivo db.php en el directorio raíz del proyecto para ajustar la configuración de conexión a la base de datos:
(los datos de conexión están en el archivo db.php)
$servername = "localhost";
$username = "tu-usuario";
$password = "tu-contraseña";
$dbname = "favoritos_db";


Configurar el Servidor Web
Si usas Apache, asegúrate de que el directorio del proyecto esté en el directorio de DocumentRoot.
Asegúrate de que el módulo mod_rewrite esté habilitado si planeas agregar URL amigables.
Permisos de Archivos

Da permisos de escritura al directorio uploads/ para permitir la subida de imágenes:
bash
Copiar código
chmod 755 uploads/
Cómo Probar la Aplicación
Acceso a la Aplicación

Abre tu navegador web y navega a http://localhost/mis-imagenes-favoritas/.
Pruebas Funcionales

Añadir Imagen: Navega a la sección de "Añadir Nueva Imagen" y sube una imagen junto con un título.
Ver Imágenes: Verifica que la imagen aparezca en la galería principal.
Editar Imagen: Edita el título de la imagen o reemplázala por otra.
Eliminar Imagen: Elimina una imagen y verifica que se elimine correctamente.
Pruebas de Validación

Intenta subir archivos no permitidos y verifica que el sistema maneje estos errores de manera adecuada.
Verifica que el sistema no permita entradas vacías o datos maliciosos.
Proceso de Desarrollo y Justificación
Arquitectura
La aplicación sigue una arquitectura básica basada en el modelo MVC (Modelo-Vista-Controlador), aunque de forma no estricta, debido a la naturaleza sin framework del proyecto. A continuación, se describen los componentes principales:

Modelo: En nuestro caso, la capa de modelo está representada por la base de datos MySQL y las operaciones CRUD que interactúan directamente con la tabla imagenes.
Vista: Las vistas están representadas por archivos PHP que generan HTML. Estos archivos son responsables de mostrar los datos al usuario, como la lista de imágenes, formularios para añadir o editar imágenes, etc.
Controlador: Los controladores están implícitos en los scripts PHP que manejan las peticiones (por ejemplo, add.php, edit.php, delete.php). Estos scripts procesan los datos enviados por el usuario, interactúan con la base de datos y redirigen o devuelven la vista apropiada.
Técnicas Utilizadas
PHP Nativo: Se optó por PHP nativo para proporcionar una experiencia de desarrollo más cercana al núcleo del lenguaje, lo cual es ideal para comprender mejor cómo funciona PHP sin la abstracción de un framework.

MySQL: Se utiliza MySQL como sistema de gestión de bases de datos relacional para almacenar la información de las imágenes y sus títulos. Este DBMS es robusto y ampliamente soportado.

Subida y Gestión de Archivos: Se implementó la funcionalidad de subida de archivos con validación básica, asegurando que solo se puedan subir imágenes. Estas imágenes se almacenan en un directorio uploads/, y la ruta se guarda en la base de datos.

Buenas Prácticas:

Separación de Concerns: Aunque es un proyecto pequeño, se mantuvieron separadas las responsabilidades de la capa de presentación (HTML/CSS) y la lógica de negocio (PHP).
Validación del Lado del Servidor: Se implementó validación de datos tanto en la subida de archivos como en la gestión de formularios.
Consideraciones Adicionales
Seguridad: Aunque no se ha implementado un sistema de autenticación, la aplicación fue diseñada para evitar las vulnerabilidades más comunes, como la inyección SQL (utilizando consultas parametrizadas) y la validación de entradas de usuario.
Estructura del Proyecto: Se mantuvo una estructura simple y organizada del proyecto, facilitando la navegación y modificación del código.
Próximos Pasos y Mejoras
Autenticación y Autorización: Implementar un sistema de autenticación para permitir que solo usuarios registrados puedan gestionar sus imágenes.

Mejoras en la Validación: Mejorar la validación tanto en el lado del cliente como en el servidor para una mayor robustez.

Optimización de Imágenes: Implementar técnicas para reducir el tamaño de las imágenes subidas, mejorando así los tiempos de carga.

Pruebas Automatizadas: Añadir un conjunto de pruebas automatizadas para asegurar la estabilidad del código a medida que se añaden nuevas funcionalidades.

API REST: Considerar la creación de una API REST para que la funcionalidad pueda ser consumida por aplicaciones móviles o integraciones de terceros.

