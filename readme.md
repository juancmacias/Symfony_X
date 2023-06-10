# Prueba para el proyecto de Symfony
## Despues de clonar el repositorio
``
composer install
`` 
## Tenemos que tener una Base de Dados con el nombre: 
## Recordar cambiar los parametros del archivo 
``.env``

### Aquí esta configurado para conectar a la SQL;
```
otra
```
# Si no se crean las tablas al usar 'composer install'  ejecutar en la consola del proyecto
 ```
 php bin/console doctrine:schema:update --complete --force
 ```

### CREACIÓN DE LAS ENTIDADES Y SUS RELACIONES
```
Tabla alumnos
nombre -> string
apellido -> string

```
```
Tabla curso
titulo -> string
apellido -> string

```
```
Tabla relacion
fk_alumno -> relation -> ManyToOne -> alumno 
fk_curso -> relation -> ManyToOne -> curso

```

### Nota importante
```
Tener muy en cuenta las mayusculas y las minuscular al crear las relaciones con las entidades
```