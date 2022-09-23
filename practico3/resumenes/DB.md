# Bases De Datos - Relaciones

## Indice

- [Modelo de Entidad - Relacion 1:N](#modelo-de-entidad---relacion-1n)
- [Datos inconsistentes](#datos-inconsistentes)
- [Forein KEY(FK)](#forein-keyfk)
- [Restricciones de integridad referencial](#restricciones-de-integridad-referencial)
- [JOINS](#joins)

# Modelo de Entidad - Relacion 1:N
Un modelo de entidad-relacion 1:N es la representacion de 2 tablas relacionadas en orden uno a muchos, por ejemplo:
- Productos y categorias:
    - Cada producto pertenece a una unica categoria.
    - Cada categoria puede contener uno o mas productos.
- Jugador y equipo:
    - Cada jugador pertenece a un unico equipo
    - Cada equipo puede contener a 11 o mas jugadores.
- Cliente y producto:
    - Cada producto puede ser comprado por un unico cliente.
    - Cada cliente puede comprar uno o mas productos.
- ETC...
# Datos inconsistentes
Para evitar la inconsistencia de datos en una DB se crean **Relaciones** entre las distintas tablas.

De esta manera se restringe la posibilidad de borrar elementos que contienen otros elementos, o de insertar un elemento "hijo" sin un "padre" que lo contenga.

# Forein KEY(FK)
Para relacionar una tabla con otra, se utilizan uno o mas atributos de la primera para almacenar una **Forein KEY**, que seria la **Primary KEY** de la segunda tabla.
- El tipo de dato entre la FK y la PK debe ser el mismo.
- Las operaciones de eliminar/actualizar se restringen si existe una relacion entre tablas.

**IMP:** No es necesario usar FK para relacionar las tablas, sirve para restringir cuando borramos datos.

## SQL syntax para FK

~~~
CREATE TABLE <table1>(
    atributte1 TYPE NOT NULL,
    .....
    PRIMARY KEY (OrderID),
);

CREATE TABLE <table2>(
    atributte1 TYPE NOT NULL,
    attributeFK TYPE NOT NULL,
    .....
    FOREIGN KEY (attributeFK ) REFERENCES table1(atributte1)
);
~~~

# Restricciones de integridad referencial
Son la restricciones que se aplican en las relaciones entre tablas, al momento de borrar o actualizar sus datos.
### onDelete:
- RESTRINGIDA (**RESTRICTED**): La operación de *eliminación* está restringida al caso en el cual no existen tales envíos. Se rechazará en caso contrario.
- SE PROPAGA (**CASCADE**): La operación de *eliminación* se propaga en cascada eliminando también los envíos correspondientes.
- ANULA (**SET NULL**): Se *asignan nulos* a la clave ajena en todos los envíos correspondientes y enseguida se elimina el proveedor. Esto vale sólo si la clave ajena puede aceptar nulos.
### onUpdate:
- RESTRINGIDA (**RESTRICTED**): La operación de *modificación* está restringida al caso en el cual no existen tales envíos. Se rechazará en caso contrario.
- SE PROPAGA (**CASCADE**): La operación de *modificación* se propaga en cascada modificando también la clave ajena en los envíos correspondientes.
- ANULA (**NULLIFIES**): Se *asignan nulos* a la clave ajena en todos los envíos correspondientes y enseguida se modifica el proveedor. Esto vale sólo si la clave ajena puede aceptar nulos.

# JOINS
Si, hay muuuuuuucha data sobre los joins, pero aca vamos a usar la mas basica de todas

- Permite combinar registros de distintas tablas mediante columnas de las tablas.
- El resultado de la consulta puede retornar información de todas las tablas involucradas.
- Distintos tipos de JOIN (que se verán en otra materia)
~~~
SELECT t1.column1, t1.column2, t2.column1 FROM t1 JOIN t2 ON t1.column1 = t2.column1
~~~
~~~
SELECT * FROM productos JOIN categorias ON productos.id_categoria = categorias.id_categoria
~~~
~~~
SELECT productos.*, categorias.nombre as categoria FROM productos JOIN categorias ON productos.id_categoria = categorias.id_categoria
~~~
~~~
function getProductosConCategoria() {
        $db = connect();
        $query = $db->prepare("SELECT productos.*, categorias.nombre as categoria FROM productos JOIN 
categorias ON productos.id_categoria = categorias.id_categoria");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
}
~~~
- Una única consulta a la base para traer todos los resultados.
- Se puede hacer el FETCH_OBJ para procesar los datos.