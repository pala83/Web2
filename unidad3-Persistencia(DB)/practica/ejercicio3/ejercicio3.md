# Cree la tabla **pagos** con la siguiente informacion 

- **deudor**: Nombre de la persona.
- **cuota** : Número de cuota pagada.
- **cuota_capital**: Monto  de la cuota pagada.
- **fecha_pago**: Fecha que se realizó el pago de la cuota.

~~~ sql
CREATE DATABASE deudas;

CREATE TABLE deudas.pagos (
   deudor VARCHAR(45) NOT NULL,
   id_cuota INT NOT NULL AUTO_INCREMENT,
   monto_cuota FLOAT NOT NULL ,  
   fecha_pago DATE NOT NULL , 
   PRIMARY KEY (id_cuota)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
~~~

**SI**!!!!! Siempre es necesario agregar una clave primaria, siempre, sin exepciones.

En este caso puede ser el id_cuota, o se peude hacer un nuevo id

# Inserte varios registros “a mano”.
> Arreglar el tramite del DATE como atributo en SQL
~~~~ sql
INSERT INTO pagos (deudor, id_cuota, monto_cuota, fecha_pago) VALUES ("Pepe", 1123, 9.95, 1);
INSERT INTO pagos (deudor, id_cuota, monto_cuota, fecha_pago) VALUES ("Fulano", 1124, 11.95, 1);
INSERT INTO pagos (deudor, id_cuota, monto_cuota, fecha_pago) VALUES ("Jose", 1125, 14.95, 1);
INSERT INTO pagos (deudor, id_cuota, monto_cuota, fecha_pago) VALUES ("Jepeto", 1126, 19.95, 1);
INSERT INTO pagos (deudor, id_cuota, monto_cuota, fecha_pago) VALUES ("Milton", 1127, 3.25, 1);
INSERT INTO pagos (deudor, id_cuota, monto_cuota, fecha_pago) VALUES ("Ana", 1128, 29.95, 1);
INSERT INTO pagos (deudor, id_cuota, monto_cuota, fecha_pago) VALUES ("Mister", 1129, 9.95, 1);
INSERT INTO pagos (deudor, id_cuota, monto_cuota, fecha_pago) VALUES ("Daniel", 1130, 2.50, 1);
INSERT INTO pagos (deudor, id_cuota, monto_cuota, fecha_pago) VALUES ("Freddy", 1131, 7.95, 1);
~~~~

# Realize consultas SQL para:

1. Listar todos los pagos.
2. Listar sólo aquellos pagos que pertenezcan a un deudor determinado.
3. Listar los pagos mayores a un monto determinado.
4. Eliminar un pago determinado.
5. Insertar un pago.
6. Actualizar la cuota-capital de un pago determinado.
7. Obtener el promedio de las cuotas pagadas.
8. Obtener la cantidad de cuotas pagadas por un deudor determinado.

~~~ sql
1. SELECT * FROM pagos;
2. SELECT *
   FROM pagos
   WHERE deudor like "Fulanito" AND cuota > 10;
3. SELECT *
   FROM pagos
   WHERE cuota > 10;
4. DELETE FROM pagos WHERE id=1123;
5. INSERT INTO pagos (deudor, id_cuota, monto_cuota, fecha_pago) VALUES ("Ana", 1228, 29.95, DATE);
6. UPDATE pagos SET monto_cuota=90.75
      WHERE id=1128;
7. SELECT AVG(monto_cuota) FROM pagos;
8. SELECT count(deudor="Mister") FROM pagos; // este esta mal
~~~

