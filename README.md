# Projecto Alexa
Proyecto de activacion de actuadores electronicos por comandos de voz

# Version 1.0

## Antes de empezar
El proyecto busca solucionar ciertos problemas que enfrentan las personas con
discapacidad motora, por favor sientete libre de cambiar cualquier parte del codigo
pero por favor ten en cuenta que el proyecto estara mantenido por mas de una persona,
por lo que la documentacion en el codigo es indispensable.

### Pre- requisitos
* Apache
* PHP
* MYSQL
* PYTHON v2.7 (Disponible por defecto en todos los rasberry pi con raspbian)
* RASPBERRYPI v3 (Cualquier version esta bien en realidad pero las pruebas se realizaron en esta version)


```
apt-get install apache php mysql-server mysql-php openssl
```

### Instalacion

A step by step series of examples that tell you have to get a development env running

Stay what the step will be

```
git clone https://github.com/klank4135/Alexa.git
cd Alexa
cp -R web /var/www/html/
```
Y a divertirse!


End with an example of getting some data out of the system or using it for a little demo

## Corriendo pruebas
Se crea un script con el fin de generar todas las pruebas de una sola vez, los scripts para las pruebas se encuentran dentro del directorio web/scripts


## Deployment

Add additional notes about how to deploy this on a live system

## Built With
* HTML5
* CSS3
* PHP V5
* Javascript
* MySQL V5
* Vim

## Authors

* **Alexander Morales** - *Trabajo inicial* -

## License

El presente proyecto esta licenciado por la licencia MIT - vea el archivo [LICENSE.md](LICENSE.md) para mas detalles

## Reconocimientos

* A [cucopc](https://cucopc.es/) por brindar una linea base para el manejo de GPIO
