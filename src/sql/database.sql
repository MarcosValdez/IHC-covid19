
CREATE TABLE ADMINISTRADOR
(
	id_admin INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
	nombre_admin VARCHAR(20) NULL,
	password VARCHAR(200) NULL,
	permiso VARCHAR(20) NULL
);



CREATE TABLE UBICACION
(
	id_ubicacion         INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
	departemento         VARCHAR(20) NULL,
	distritio            VARCHAR(20) NULL,
	provincia            VARCHAR(20) NULL
);



CREATE TABLE HOSPITAL
(
	id_hospital          INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
	nombre_hospital      VARCHAR(100) NULL,
	direccion_hospital   VARCHAR(100) NULL,
	telefono_paciente    VARCHAR(20) NULL,
	id_ubicacion         INTEGER NULL,
	mapa                 VARCHAR(500) NULL,
	FOREIGN KEY (id_ubicacion) REFERENCES UBICACION (id_ubicacion)
);



CREATE TABLE CATEGORIA
(
	id_categoria         INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
	nombre_categoria     VARCHAR(20) NULL
);



CREATE TABLE SUBCATEGORIA
(
	id_subcategoria      INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
	nombre_subcategoria  CHAR(18) NULL,
	id_categoria         INTEGER NULL,
	FOREIGN KEY (id_categoria) REFERENCES CATEGORIA (id_categoria)
);


CREATE TABLE PERSONA
(
	dni          INTEGER NOT NULL PRIMARY KEY,
	nombre     VARCHAR(20) NULL,
	apellido    VARCHAR(20) NULL,
	estado    boolean NULL,
	edad INTEGER null,
	fecha_emision date null,
	id_hospital          INTEGER NULL,
	id_ubicacion         INTEGER NULL,
	id_subcategoria      INTEGER NULL,
	FOREIGN KEY (id_hospital) REFERENCES HOSPITAL (id_hospital),
	FOREIGN KEY (id_ubicacion) REFERENCES UBICACION (id_ubicacion),
	FOREIGN KEY (id_subcategoria) REFERENCES SUBCATEGORIA (id_subcategoria)
);


