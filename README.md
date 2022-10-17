# Prueba Técnica STRADATA 👨‍💻

El proyecto está realizado usando laravel 9 con su variante sail que nos permiten tener todo en contenedores.

El frontend esta desarrollado en bootstrap 5 y Vue js 3.

Se creo un usuario para `PHPMYADMIN` y otro para la prueba del codigo.

## Accesos

* PhpMyAdmin - `usuario:` sail `clave:` password
* Aplicativo - `usuario:` admin@admin.com `clave:` password

## Link

* Video Explicación: https://youtu.be/EK4npZP4Ra4
* Link Aplicativo: http://ec2-3-88-57-218.compute-1.amazonaws.com
* Link DB: http://ec2-3-88-57-218.compute-1.amazonaws.com:8081

# Mejoras para la escalabilidad

1) Normalizar la base de datos.

2) Crear procesos de colas para las peticiones y así evitar sobrecargar la base de datos con tantas consultas.

3) Crear y entrenar un modelo de inteligencia artifical que nos permita mediente base de datos basadas en grafos encontrar similitud entre palabras de forma mucho mas rapida y eficiente.

4) Diseñar una infraestructura de servidores que permita dividir la carga de las peticiones en varios servidores para evitar la saturación en el sistema.
