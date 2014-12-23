gestorTaller
============

**gestorTaller** es una aplicación escrita en **PHP** para la gestión de entrada y salida de un taller informático, donde podrás llevar un historial de los ordenadores reparados tanto por el número que identifique a estos mismos, como por cliente guardado en el sistema, entre otras muchas cosas... <br>

Actualmente está funcional una beta donde podrás tanto guardar clientes como entradas asociadas a dichos clientes, estoy implementando tanto las búsquedas como los informes.  

Para la instalación, es necesario tener un servidor de base de datos **MySQL** junto a un **apache** con soporte para **php**.

Debes de seguir los siguientes pasos:

1. Crear una base de datos en el servidor MySQL

		gestorTaller

2. Crear un usuario para dicha base de datos, por defecto en el sistema está configurada para el usuario **gTaller_user** con contraseña **g3stor**, aunque es recomendable cambiarlo
```
grant all privileges on gestorTaller.* to gTaller_usera@'%' identified by 'g3stor' with grant option;  
flush privileges;
```
3. Ejecutar el script llamado **gestorTaller.sql** situado en la carpeta script con el usuario creado anteriormente y en la base de datos.

		mysql -u gTaller_user -p -h <server_ip> < gestorTaller.sql

4. Si hemos cambiado el nombre de la base de datos, usuario o contraseña, debemos de modificar el archivo llamado **configuracion.php** situado en la carpeta **configuracion**.

	Debes de modificar:

	```
	$host = "localhost" ; // IP DEL SERVIDOR
	$bdname = "gestorTaller"; // NOMBRE DE LA BASE DE DATOS
	define("DB_USUARIO", "gTaller_user"); // USUARIO
	define("DB_CONTRASENA", "g3stor"); // CONTRASEÑA
	```
Si tienes algún problema en la instalación no dudes en contactar conmigo carlos(arroba)ccamposfuentes.es o a través de [@ccamposf](http://twitter.com/ccamposf)
