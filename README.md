# TPE Parte 1

## Integrantes

 * Marcelo Gelato (gelatomarcelo@hotmail.com)

 * Mariano Nesci (nescimarianoa999@gmail.com)

## Temática

 * Venta de vehículos (concesionaria)

## Descripción

 * tabla de marca de vehículos y sus modelos, aniadido tabla usuario

 ### digrama de identidad
![DRE] (/img/captura.jpg)


### SQL
[Script SQL](dataDB/concesionaria.sql)

### tabla usuarios
usuario: webadmin@gmail.com
contraseña : admin


### Despliegue del sitio

Copiar el proyecto dentro de la carpeta htdocs de XAMPP.

Crear una base de datos en phpMyAdmin e importar el archivo concesionaria.sql incluido en el proyecto.

Configurar los datos de conexión en app/config/config.php (host, usuario, contraseña y nombre de base)-> todo esta en predeterminadao (ya configurado avisar si hay probleas al ingresar) .

Iniciar Apache y MySQL, luego acceder desde el navegador a:
👉 http://localhost/TPE1/

Usuario administrador:

Usuario: webadmin@gmail.com

Contraseña: admin


