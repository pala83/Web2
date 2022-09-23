# Bases de datos - Persistencia

## Indice

- [Persistencia](#persistencia)
- [Datos](#datos)
- [Bases de Datos](#bases-de-datos)
- [Archivos como DB](#archivos-como-db)
- [Modelo ENTIDAD-RELACION](#modelo-entidad-relacion)
- [SQL](#sql)
    - [Creacion de tablas](#creacion-de-tablas)
    - [Agregar registros](#agregar-registros)
    - [Cambiar registros](#cambiar-registros)
    - [Borrar regsitros](#borrar-registros)
    - [Consultas SQL](#consultas-sql)
    - [FOREIN KEY](#forein-key)
    - [JOIN](#join)
    - [Operadores](#operadores)
- [Consultas multitabla](#consultas-multitabla)

# Persistencia
Persistencia “es la acción de **preservar** la **información** de forma permanente y a su vez poder **recuperar** la misma para que pueda ser nuevamente utilizada”

## Acciones sobre los datos
Cualquier sistema, independiente del tipo, va a tener que realizar operaciones sobre esos datos
- **Alta**
- **Baja**
- **Modificacion**
- **Consulta**

## Modelado de datos
Los pasos para poder **representar** informacion en el mundo computacional

1. **Identificacion de los datos** de la realidad: actores, recursos,  objetos,  etc.  del  mundo  real  de  los  cuales interesa guardar información. **(ENTIDADES)**
2. **Identificación de relaciones** entre datos: detección de los vínculos significativos que se dan entre los elementos.
3. **Abstracción  de  datos  y  relaciones**:  representación simbólica de los elementos detectados.

**IMP:** los requerimientos funcionales nos dan "pistas" de las principales entidades a persostir.

**IMP:** las tablas modeladas deben tener una **PRIMARY KEY** que va a ser el atributo identificador, este va a diferenciar cada fila de la tabla de forma unica.

# Datos
- Se llama **campo** a cada atributo de la tabla
- Se llama **registro** al conjunto de campos que conforman un elemento de la tabla
> Columnas = campos/atributos
>
> Filas = registros

## Tipos de datos
Cada tipo de dato ocupa cierto espacio en memoria
- **INT**: 4 bytes (2^32)
- **TINYINT**: 1 bytes (2^8)
- **BIGINT**: 8 bytes (2^64)
- **DATE**: 3 bytes
- **TEXT**: longitud + 2 bytes

# Bases de Datos

Una base de datos es una herramienta para recopilar y organizar información.

Es un contenedor para almacenar tablas que guardan datos interrelacionados.

## Ventajas
- **Organizacion de datos** en cantidades execivas de estos
- **Redundancia**: gran duplicidad en los archivos. Una sola referencia evitando que se dupliquen. Esto evita:
    1. se debe actualizar cada una de las fuentes donde se encuentre la info.
    2. gasto innecesario de almacenamiento.
    3. por seguridad, se crean esquemas de acceso a los datos
## Desventajas
Las bases de datos aparecieron como una solución a estas cuestiones, pero...
- La instalación puede ser costosa
- Necesitan personal capacitado
- La implementación y puesta en marcha puede ser larga
- Poco rentable a corto plazo

## DBMS (gestores de bases de datos)
- software que permite al usuario definir, crear, configurar y mantener la base de datos.
- manejo de persistencia de los datos
- control de acceso
- evita inconsistencias
- recuperación antes fallas

### Ventajas de DBMS
- Independencia de los datos: oculta detalles de cómo se almacenan
- control de redundancia
- restricción de accesos a usuarios autorizados
- mejora la integridad de los datos
- aumento de la concurrencia
- servicio de backup y recuperación ante fallas

### Desventajas
- Complejidad
- Tamaño
- Vulnerabilidad a fallas al ser centralizados
- Costo y equipamiento necesario

# Archivos como DB
Los archivos son una manera clásica y poco costosa (al inicio) de  almacenar  información,  pero  hay  una  serie  de inconvenientes que tiene que ver con:
- Redundancia e inconsistencia de los datos,
- Aislamiento de los datos,
- Problemas de acceso,
- Atomicidad, cuando una operación no se pudo realizar se debe poder volver al estado anterior.
- Integridad
- Acceso concurrente y
- Problemas de seguridad

# Modelo ENTIDAD-RELACION
Es un modelo semántico que describe los requerimientos de datos de un sistema. 

Elementos del MER:
- **Entidad**: objeto real o abstracto de la vida real del cual se quiere almacenar información
- **Relación**: asociación entre entidades
- **Atributos**: características que describen las entidades y relaciones

# SQL
SQL nos permite trabajar con una base de datos de manera estructurada siendo un lenguaje de alto nivel muy eficiente.
- Permite crear y modificar esquemas, tablas e 
índices
- Consultar facilmente datos
- Definir tablas
- Insertar, borrar y actualizar muchos datos 
- Buscar muchos datos en poco tiempo

## Creacion de tablas
~~~
CREATE TABLE nombreDB . Transactions(
    Transaction_ID INT NOT NULL,
    Customer_id INT NOT NULL,
    Channel VARCHAR(45) NULL,
    ProductVARCHAR(45) NOT NULL,
    Price FLOAT NOT NULL,
    Discount FLOAT NULL,
    PRIMARY KEY  (Transaction_ID)
) ENGINE = InnoDB;
~~~
## Agregar registros
~~~
INSERT INTO Transactions (Transaction_ID, Customer_id, Channel, Product, Price, Discount) VALUES (1000123, 60067, 'Web', 'Book', 9.95, NULL);
INSERT INTO Transactions (Transaction_ID, Customer_id, Channel, Product, Price, Discount) VALUES (1000124, 12345, 'Store', 'Book', 11.95, NULL);
INSERT INTO Transactions (Transaction_ID, Customer_id, Channel, Product, Price, Discount) VALUES (1000125, 23451, 'Store', 'DVD', 14.95, NULL);
INSERT INTO Transactions (Transaction_ID, Customer_id, Channel, Product, Price, Discount) VALUES (1000126, 70436, 'Reseller', 'DVD', 19.95, 5);
INSERT INTO Transactions (Transaction_ID, Customer_id, Channel, Product, Price, Discount) VALUES (1000127, 66772, 'Store', 'Magazine', 3.25, NULL);
INSERT INTO Transactions (Transaction_ID, Customer_id, Channel, Product, Price, Discount) VALUES (1000128, 60067, 'Web', 'Book', 29.95, NULL);
INSERT INTO Transactions (Transaction_ID, Customer_id, Channel, Product, Price, Discount) VALUES (1000129, 72045, 'Web', 'DVD', 9.95, NULL);
INSERT INTO Transactions (Transaction_ID, Customer_id, Channel, Product, Price, Discount) VALUES (1000130, 82371, 'Reseller', 'Magazine', 2.50, 0.25);
INSERT INTO Transactions (Transaction_ID, Customer_id, Channel, Product, Price, Discount) VALUES (1000131, 12345, 'Store', 'Book', 7.95, NULL);
~~~
## Cambiar registros
~~~
UPDATE TABLE_NAME
SET column1 = value1, column2= value 2
WHERE condition;
    UPDATE Transactions SET Channel='Store' WHERE Transaction_ID=1000123
~~~
## Borrar registros
~~~
DELETE FROM TABLE_NAME
WHERE condition;
    DELETE FROM Transactions WHERE Transaction_ID=1000123;
~~~
## Consultas SQL
| ORDEN     | DESCRIPCION       |
|-----------|-------------------|
| SELECT    | Define que atributos/columnas/campos quiero recuperar o calculas **(obligatorio)** |
| FROM      | Identifica la tabla de la que quiero extraer informacion **(obligatorio)** |
| WHERE     | Agrega filtros que restringe que filas/registros se recuperan **(opcional)** |
| ORDER BY  | Define el orden en el que se obtienen lso resultados **(opcional)** |

~~~
SELECT FIELD_1, FIELD_2, ..., FIELD_N FROM TABLE_NAME
SELECT CHANEL, PRODUCT, PRICE FROM Transactions
SELECT * FROM TABLE_NAME    //retorna toda la tabla

// WHERE
SELECT *
FROM Transactions
WHERE CHANNEL = 'STORE'

//ORDER BY
SELECT FIELD_1, FIELD_2, ..., FIELD_N
FROM TABLE_NAME
ORDER BY FIELD_i, ...., FIELD_n

//orden descendente
ORDER BY FIELD_i DESC
~~~



## FOREIN KEY
- Una clave foránea es un atributo o atributos que establece un vínculo lógico entre tablas, representa las **relaciones**
- Por lo general, asocia un campo de una tabla con la clave primaria de otra tabla o tablas

Supongo que quiero crear una tabla de productos para las transacciones.
~~~
CREATE TABLE nombreDB.Products ( 
    Product VARCHAR(45) NOT NULL,
    Material VARCHAR(45) NULL,
    Medium VARCHAR(45) NULL,
    PRIMARY KEY (`Product`)
)ENGINE = InnoDB;

INSERT INTO Products (Product, Material, Medium) VALUES ('Book', 'Stock Paper', 'Visual’);
INSERT INTO Products (Product, Material, Medium) VALUES (‘DVD’, ‘Plastic', ‘Audiovisual’);
INSERT INTO Products (Product, Material, Medium) VALUES ('Magazine’, ‘Glossy Paper', 'Visual’);
INSERT INTO Products (Product, Material, Medium) VALUES (‘CD’, ‘Plastic', ‘Audio’);
INSERT INTO Products (Product, Material, Medium) VALUES (‘Newspaper', ‘Newsprint', 'Visual’);
INSERT INTO Products (Product, Material, Medium) VALUES (‘MP3', ‘Digital’, ‘Audio’)
~~~
Agregar la clave foranea a la tabla Transactions creada anteriormente
~~~
ALTER TABLE Transactions
    ADD CONSTRAINT fk_Transactions_Products
    FOREIGN KEY (Product)
    REFERENCES Products(Product) 
    ON DELETE RESTRICT ON UPDATE RESTRICT;
~~~
## JOIN
- La operación JOIN (unir) nos permite acceder a más de una tabla al mismo tiempo
- Hay diferentes tipos de JOIN que se pueden aplicar dependiendo del tipo de resultado que esperamos obtener
- Si queremos ver datos de dos tablas (TABLE_1 y TABLE_2) la sintaxis se ve como:
~~~
SELECT a.FIELD_1, ..., a.FIELD_N, b.FIELD_1, ..., b.FIELD_N
FROM TABLE_1 a
INNER JOIN TABLE_2 b
ON a.KEY = b.KEY
~~~
Supongamos que queremos tener más información de los productos que se compraron:
~~~
SELECT a.*, b.*
FROM Transactions a
INNER JOIN Products b
ON a.PRODUCT = b.PRODUCT
~~~
Imprimir los datos de una transacción pero solo si el material del producto es de tipo “Plastic”
~~~
SELECT a.* 
FROM Transactions a
INNER JOIN Products b 
ON a.PRODUCT = b.PRODUCT
WHERE b.Material = 'Plastic'
~~~

## Operadores
SQL tambien tiene consultas mediante operadores:
- De comparacion: = < > <= >= <> != !< !>
- Aritmeticos: + - * / %
- Logicos: AND OR IN BETWEEN LIKE IS NULL NOT
    - **IN**: Chequea si nu nvalor o expresion esta en una lista, evita usar muchos **OR**
    ~~~
    WHERE FIELD_A = 'AAA' OR FIELD_A = 'BBB' OR FIELD_A ='CCC'
    // ==
    WHERE FIELD_A IN ('AAA', 'BBB', 'CCC')
    ~~~
    - **BETWEEN**: chequea si nu nvalor o expresion esta entre otros dos valores o expresiones, alternativa a **AND**
    ~~~
    WHERE FIELD_A >= 10 AND FIELD_A <= 100
    // ==
    WHERE FIELD_A BETWEEN 10 AND 100
    ~~~
    - **LIKE**: Devuelve verdadero si un conjunto de caracteres esta presente en un texto, se complementa con expresiones regulares
    > Comodines:
    >> % cualquier texto de 0 o mas caracteres
    >>
    >> _ cualquier caracter unico
    ~~~
    WHERE FIELD_A LIKE 'abc%'
    //Verdadero para cualquier texto que comience con ‘abc’ sin importar que tan largo sea
    
    WHERE FIELD_A LIKE 'abc_'
    //Verdadero si el texto comienza con ‘abc’ y tiene cuatro caracteres
    
    WHERE FIELD_A LIKE '%abc%’
    //Verdadero si ‘abc’ aparece en cualquier lugar del texto
    ~~~

# Consultas multitabla
Supongamos que queremos imprimir los datos de una transacción junto al material y al soporte (“medium”) del producto comprado.
~~~
<?php
    $db = new PDO('mysql:host=localhost;' .'dbname=Prueba;charset=utf8' , 'root', '');
    $query = $db->prepare( 'SELECT * FROM Transactions');
    $query->execute();
    $transactions = $query->fetchAll(PDO::FETCH_OBJ);

    echo "<ul>";
    foreach($transactions as $transaction){
        $query = $db->prepare( 'SELECT * FROM Products WHERE Product = ?');
        $query->execute([$transaction->Product]);
        $product = $query->fetch(PDO::FETCH_OBJ);
        echo '<li>'.$transaction->Channel.', '.$transaction->Product.', '.$transaction->Price.', '.$product->Material.', '.$product->Medium.'</li>';
    }
    echo "</ul>";
?>
~~~

## Ejemplo con filtro
Supongamos que queremos imprimir los datos de una transacción pero solo si el material del producto es de un determinado tipo
~~~
<?php
    $db = new PDO('mysql:host=localhost;'.'dbname=Prueba;charset=utf8', 'root', '');
    $query = $db->prepare('SELECT * FROM Transactions');
    $query->execute();
    $transactions = $query->fetchAll(PDO::FETCH_OBJ);
    $materialDeseado = "Plastic";
    echo "<ul>";
    foreach($transactions as $transaction){
        $query = $db->prepare('SELECT * FROM Products WHERE Product = ?');
        $query->execute([$transaction->Product]);
        $product = $query->fetch(PDO::FETCH_OBJ);
    if($product->Material == $materialDeseado)
        echo '<li>'.$transaction->Channel.', '.$transaction->Product.', '.$transaction->Price.', '.$product->Material.', '.$product->Medium.'</li>';
    }
    echo "</ul>";
?>
~~~
## Ejemplo con filtro ++
Supongamos que queremos imprimir el promedio de los precios de las transacciones donde el material del producto es de un determinado tipo
~~~
<?php
    $db = new PDO('mysql:host=localhost;'.'dbname=Prueba;charset=utf8', 'root', '');
    $query = $db->prepare('SELECT * FROM Transactions');
    $query->execute();
    $transactions = $query->fetchAll(PDO::FETCH_OBJ);
    $materialDeseado = "Plastic";
    $accum = 0;    
    $cant = 0;
    foreach($transactions as $transaction){
        $query = $db->prepare('SELECT * FROM Products WHERE Product = ?');
        $query->execute([$transaction->Product]);
        $product = $query->fetch(PDO::FETCH_OBJ);
        if($product->Material == $materialDeseado){
            $accum = $accum + $transaction->Price;          
            $cant++;
        }
    }
    echo '<h1> El promedio es '.$accum/$cant.'</h1>';
?>
~~~