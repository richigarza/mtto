GRANT ALL PRIVILEGES ON *.* TO 'SYSMAN'@'localhost' IDENTIFIED BY 'SYSMAN' WITH GRANT OPTION;
COMMIT;

DROP DATABASE IF EXISTS SYSMAN;

CREATE DATABASE SYSMAN;

-- TABLA DE DEPARTAMENTOS
CREATE TABLE SYSMAN.DEPARTAMENTO(
  id int(10) NOT NULL AUTO_INCREMENT PRIMARY KEY COMMENT "Identificador único del Registro.",
  nombre varchar(100) NOT NULL COMMENT "Nombre del departamento",
  ubicacion varchar(250) NOT NULL COMMENT "Ubicacion del departamento",
  no_equipos int(10) COMMENT "Numero de equipos en el departamento",
  estatus varchar(1) NOT NULL DEFAULT "A" COMMENT "Estatus del Registro. A - Activo / I - Inactivo.",
  ultima_fecha_actualizacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP COMMENT "Última Fecha de actualización del registro.",
  ultimo_editor varchar(100) NOT NULL COMMENT "Ultima persona que edito el registro"
 
)DEFAULT CHARSET=utf8 COMMENT "Tabla de departamentos del sistema";

-- TABLA DE USUARIOS
CREATE TABLE SYSMAN.USUARIO(
  id int(10) NOT NULL AUTO_INCREMENT PRIMARY KEY COMMENT "Identificador único del Registro.",
  departamento_id int(10) NOT NULL COMMENT "Llave Foranea. Tabla PGJ.DEPARTAMENTO. Identificador del Departamento al que pertenece el usuario",
  nombre_usuario varchar(100) NOT NULL COMMENT "Nombre completo del usuario",
  username varchar(100) NOT NULL COMMENT "Nombre de usuario",
  password varchar(100) NOT NULL COMMENT "Clave de acceso del usuario",
  estatus varchar(1) NOT NULL DEFAULT "A" COMMENT "Estatus del Registro. A - Activo / I - Inactivo.",
  ultima_fecha_actualizacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP COMMENT "Última Fecha de actualización del registro.",
  ultimo_editor varchar(100) NOT NULL COMMENT "Ultima persona que edito el registro",
  
  KEY USUARIO_DEPARTAMENTO_KEY (departamento_id),
  CONSTRAINT USUARIO_DEPARTAMENTO FOREIGN KEY (departamento_id) REFERENCES SYSMAN.DEPARTAMENTO(id)
  
)DEFAULT CHARSET=utf8 COMMENT "Tabla de usuarios del sistema";

-- TABLA DE ROLES
CREATE TABLE SYSMAN.ROL(
  id int(10) NOT NULL AUTO_INCREMENT PRIMARY KEY COMMENT "Identificador único del Registro.",
  descripcion varchar(100) NOT NULL COMMENT "Descripcion del rol",
  estatus varchar(1) NOT NULL DEFAULT "A" COMMENT "Estatus del Registro. A - Activo / I - Inactivo.",
  ultima_fecha_actualizacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP COMMENT "Última Fecha de actualización del registro.",
  ultimo_editor varchar(100) NOT NULL COMMENT "Ultima persona que edito el registro"
)DEFAULT CHARSET=utf8 COMMENT "Tabla de Roles de usuario del sistema";

-- TABLA DE RELACION USUARIO ROL
CREATE TABLE SYSMAN.USUARIO_ROL(
  id int(10) NOT NULL AUTO_INCREMENT PRIMARY KEY COMMENT "Identificador único del Registro.",
  usuario_id int(10) NOT NULL COMMENT "Llave Foranea. Tabla PGJ.USUARIO. Identificador del usuario al que pertenece la relacion",
  rol_id int(10) NOT NULL COMMENT "Llave Foranea. Tabla PGJ.ROL. Identificador del rol al que pertenece la relacion",
  estatus varchar(1) NOT NULL DEFAULT "A" COMMENT "Estatus del Registro. A - Activo / I - Inactivo.",
  ultima_fecha_actualizacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP COMMENT "Última Fecha de actualización del registro.",
  ultimo_editor varchar(100) NOT NULL COMMENT "Ultima persona que edito el registro",
  
  KEY USUARIO_ROL_USUARIO_KEY (usuario_id),
  KEY USUARIO_ROL_ROL_KEY (rol_id),
  CONSTRAINT USUARIO_ROL_USUARIO FOREIGN KEY (usuario_id) REFERENCES SYSMAN.USUARIO(id),
  CONSTRAINT USUARIO_ROL_ROL FOREIGN KEY (rol_id) REFERENCES SYSMAN.ROL(id)
)DEFAULT CHARSET=utf8 COMMENT "Tabla de Roles de usuario del sistema";


CREATE TABLE SYSMAN.EQUIPO(
  id int(10) NOT NULL AUTO_INCREMENT PRIMARY KEY COMMENT "Identificador único del Registro.",
  nombre varchar(100) NOT NULL COMMENT "Nombre del equipo",
  descripcion varchar(512) NOT NULL COMMENT "Descripcion del equipo",
  -- Imagen del equipo cambiara de tipo a blob
  imagen_equipo varchar(2096) NOT NULL COMMENT "Imagen del equipo",
  estatus varchar(1) NOT NULL DEFAULT "A" COMMENT "Estatus del Registro. A - Activo / I - Inactivo.",
  ultima_fecha_actualizacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP COMMENT "Última Fecha de actualización del registro.",
  ultimo_editor varchar(100) NOT NULL COMMENT "Ultima persona que edito el registro"
)DEFAULT CHARSET=utf8 COMMENT "Tabla de Equipos registrados para dar mantenimiento";


CREATE TABLE SYSMAN.REFACCION(
  id int(10) NOT NULL AUTO_INCREMENT PRIMARY KEY COMMENT "Identificador único del Registro.",
  equipo_id int(10) NOT NULL COMMENT "Llave Foranea. Tabla SYSMAN.EQUIPO, Identificador del equipo al que pertenece la refaccion",
  nombre varchar(100) NOT NULL COMMENT "Nombre de la refaccion",
  descripcion varchar(512) NOT NULL COMMENT "Descripcion de la refaccion",
  unidades_disponibles int(10) NOT NULL COMMENT "Unidades disponibles en almacen",
  unidades_por_equipo int(10) NOT NULL COMMENT "Unidades requeridas por unidad de equipo",
  costo_refaccion decimal NOT NULL COMMENT "Costo de la refaccion",
  -- Imagen del equipo cambiara de tipo a blob
  imagen_equipo varchar(2096) NOT NULL COMMENT "Imagen de la refaccion",
  estatus varchar(1) NOT NULL DEFAULT "A" COMMENT "Estatus del Registro. A - Activo / I - Inactivo.",
  ultima_fecha_actualizacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP COMMENT "Última Fecha de actualización del registro.",
  ultimo_editor varchar(100) NOT NULL COMMENT "Ultima persona que edito el registro",
  KEY REFACCION_EQUIPO_KEY (equipo_id),
  CONSTRAINT REFACCION_EQUIPO FOREIGN KEY (equipo_id) REFERENCES SYSMAN.EQUIPO(id)
)DEFAULT CHARSET=utf8 COMMENT "Tabla de Refacciones requeridas por equipo";

CREATE TABLE SYSMAN.UNIDAD_EQUIPO(
  id int(10) NOT NULL AUTO_INCREMENT PRIMARY KEY COMMENT "Identificador único del Registro.",
  equipo_id int(10) NOT NULL COMMENT "Llave Foranea. Tabla SYSMAN.Equipo. Identificador del equipo",
  departamento_id int(10) NOT NULL COMMENT "Llave Foranea. Tabla SYSMAN.Departamento. Departamento donde se encuentra ubicada la unidad",
  descripcion varchar(255) COMMENT "Descripcion o comentarios de la unidad",
  ultimo_mantenimiento TIMESTAMP COMMENT "Ultimo mantenimiento a la unidad",
  estatus varchar(1) NOT NULL DEFAULT "A" COMMENT "Estatus del Registro. A - Activo / I - Inactivo.",
  ultima_fecha_actualizacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP COMMENT "Última Fecha de actualización del registro.",
  ultimo_editor varchar(100) NOT NULL COMMENT "Ultima persona que edito el registro",
  
  KEY UNIDAD_EQUIPO_EQUIPO_KEY (equipo_id),
  KEY UNIDAD_EQUIPO_DEPARTAMENTO_KEY (departamento_id),
  CONSTRAINT UNIDAD_EQUIPO_EQUIPO FOREIGN KEY (equipo_id) REFERENCES SYSMAN.EQUIPO(id),
  CONSTRAINT UNIDAD_EQUIPO_DEPARTAMENTO FOREIGN KEY (departamento_id) REFERENCES SYSMAN.DEPARTAMENTO(id)
)DEFAULT CHARSET=utf8 COMMENT "Tabla de unidad existentes por cada tipo de equipo";

CREATE TABLE SYSMAN.RUTINA(
  id int(10) NOT NULL AUTO_INCREMENT PRIMARY KEY COMMENT "Identificador único del Registro.",
  equipo_id int(10) NOT NULL COMMENT "Llave Foranea. Tabla SYSMAN.Equipo. Identificador del equipo al que pertenece la rutina",
  descripcion varchar(521) COMMENT "Descripcion de la rutina de mantenimiento",
  tiempo_procedimiento int(10) NOT NULL COMMENT "Tiempo en minutos que lleva realizar la rutina de mantenimiento",
  estatus varchar(1) NOT NULL DEFAULT "A" COMMENT "Estatus del Registro. A - Activo / I - Inactivo.",
  ultima_fecha_actualizacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP COMMENT "Última Fecha de actualización del registro.",
  ultimo_editor varchar(100) NOT NULL COMMENT "Ultima persona que edito el registro",
  KEY RUTINA_EQUIPO_KEY (equipo_id),
  CONSTRAINT RUTINA_EQUIPO FOREIGN KEY (equipo_id) REFERENCES SYSMAN.EQUIPO(id)  
)DEFAULT CHARSET=utf8 COMMENT "Tabla de Rutinas de mantenimiento por equipo";


CREATE TABLE SYSMAN.RUTINA_DETALLE(
  id int(10) NOT NULL AUTO_INCREMENT PRIMARY KEY COMMENT "Identificador único del Registro.",
  rutina_id int(10) NOT NULL COMMENT "Llave Foranea. Tabla SYSMAN.Rutina. Rutina a la que pertenece el paso en cuestion",
  numero_paso int(10) NOT NULL COMMENT "Numero de paso dentro del procedimiento",
  descripcion varchar(520) COMMENT "Descripcion detallado del paso",
  tiempo_ejecucion int(10) NOT NULL COMMENT "Tiempo en minutos que lleva realizar el paso",
  estatus varchar(1) NOT NULL DEFAULT "A" COMMENT "Estatus del Registro. A - Activo / I - Inactivo.",
  ultima_fecha_actualizacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP COMMENT "Última Fecha de actualización del registro.",
  ultimo_editor varchar(100) NOT NULL COMMENT "Ultima persona que edito el registro",
  KEY RUTINA_DETALLE_RUTINA_KEY (rutina_id),
  CONSTRAINT RUTINA_DETALLE_RUTINA FOREIGN KEY (rutina_id) REFERENCES SYSMAN.RUTINA(id)  
)DEFAULT CHARSET=utf8 COMMENT "Tabla de detalle de Rutinas de mantenimiento por equipo";


CREATE TABLE SYSMAN.HERRAMIENTA(
  id int(10) NOT NULL AUTO_INCREMENT PRIMARY KEY COMMENT "Identificador único del Registro.",
  nombre varchar (100) NOT NULL COMMENT "Nombre de la herramienta",
  descripcion varchar(520) COMMENT "Descripcion detallado de la herramienta",
  unidades_disponibles int(10) NOT NULL COMMENT "Unidades disponibles de la herramienta",
  estatus varchar(1) NOT NULL DEFAULT "A" COMMENT "Estatus del Registro. A - Activo / I - Inactivo.",
  ultima_fecha_actualizacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP COMMENT "Última Fecha de actualización del registro.",
  ultimo_editor varchar(100) NOT NULL COMMENT "Ultima persona que edito el registro"
)DEFAULT CHARSET=utf8 COMMENT "Tabla de detalle de Rutinas de mantenimiento por equipo";

CREATE TABLE SYSMAN.RUTINA_DET_HERRAMIENTA(
  id int(10) NOT NULL AUTO_INCREMENT PRIMARY KEY COMMENT "Identificador único del Registro.",
  rutina_detalle_id int(10) NOT NULL COMMENT "Llave Foranea. Tabla SYSMAN.RUTINA_DETALLE. Identificador del paso de la rutina",
  herramienta_id int(10) NOT NULL COMMENT "Llave Foranea. Tabla SYSMAN.HERRAMIENTA. Identificador de la herramienta",
  estatus varchar(1) NOT NULL DEFAULT "A" COMMENT "Estatus del Registro. A - Activo / I - Inactivo.",
  ultima_fecha_actualizacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP COMMENT "Última Fecha de actualización del registro.",
  ultimo_editor varchar(100) NOT NULL COMMENT "Ultima persona que edito el registro",
  
  KEY RUTINA_DET_HER_RD_KEY(rutina_detalle_id),
  KEY RUTINA_DET_HER_HER_KEY(herramienta_id),
  CONSTRAINT RUTINA_DET_HER_RD FOREIGN KEY (rutina_detalle_id) REFERENCES SYSMAN.RUTINA_DETALLE(id),
  CONSTRAINT RUTINA_DET_HER_HER FOREIGN KEY (herramienta_id) REFERENCES SYSMAN.HERRAMIENTA(id)  
)DEFAULT CHARSET=utf8 COMMENT "Tabla de herramientas requeridas por paso de rutina";

CREATE TABLE SYSMAN.ODT_ESTATUS(
  id int(10) NOT NULL AUTO_INCREMENT PRIMARY KEY COMMENT "Identificador único del Registro.",
  descripcion VARCHAR(100) NOT NULL COMMENT "Descripcion del estatus de la orden de trabajo",
  estatus varchar(1) NOT NULL DEFAULT "A" COMMENT "Estatus del Registro. A - Activo / I - Inactivo.",
  ultima_fecha_actualizacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP COMMENT "Última Fecha de actualización del registro.",
  ultimo_editor varchar(100) NOT NULL COMMENT "Ultima persona que edito el registro"
)DEFAULT CHARSET=utf8 COMMENT "Tabla de estatus de las ordenes de mantenimiento";


CREATE TABLE SYSMAN.ODT(
  id int(10) NOT NULL AUTO_INCREMENT PRIMARY KEY COMMENT "Identificador único del Registro.",
  equipo_id int(10) NOT NULL COMMENT "Llave Foranea. Tabla SYSMAN.Equipo. Identificador del equipo al que pertenece la orden de trabajo",
  rutina_id int(10) NOT NULL COMMENT "Llave Foranea. Tabla SYSMAN.Rutina. Identificador de la rutina a la que pertenece la orden de trabajo",
  usuario_id int(10) NOT NULL COMMENT "Llave Foranea. Tabla SYSMAN.Usuario. Identificador del usuario que ejecuta la orden de trabajo",
  unidad_equipo_id int(10) NOT NULL COMMENT "Llave Foranea. Tabla SYSMAN.Unidad_equipo. Identificador de la unidad de equipo a la que pertenece la orden de trabajo",
  odt_estatus_id int(10) NOT NULL COMMENT "Llave Foranea. Tabla SYSMAN.ODT_ESTATUS. Identificador del estatus de la orden de trabajo",
  fecha DATE NOT NULL COMMENT "Fecha de creacion de la orden de trabajo",
  -- La hora se debera validar con una expresion regular
  hora VARCHAR(5) NOT NULL COMMENT "Hora de ejecucion de la orden de trabajo",
  -- Validar el contenido que se va a almacenar como evidencia
  evidencia varchar(3000) COMMENT "Evidencia de la ejecucion de la orden de trabajo",
  estatus varchar(1) NOT NULL DEFAULT "A" COMMENT "Estatus del Registro. A - Activo / I - Inactivo.",
  ultima_fecha_actualizacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP COMMENT "Última Fecha de actualización del registro.",
  ultimo_editor varchar(100) NOT NULL COMMENT "Ultima persona que edito el registro",
  
  KEY ODT_EQUIPO_KEY(equipo_id),
  KEY ODT_RUTINA_KEY(rutina_id),
  KEY ODT_USUARIO_KEY(usuario_id),
  KEY ODT_UNIDAD_EQUIPO_KEY(unidad_equipo_id),
  KEY ODT_ODT_ESTATUS_KEY(odt_estatus_id),
  CONSTRAINT ODT_EQUIPO FOREIGN KEY (equipo_id) REFERENCES SYSMAN.Equipo(id),
  CONSTRAINT ODT_RUTINA FOREIGN KEY (rutina_id) REFERENCES SYSMAN.Rutina(id),
  CONSTRAINT ODT_USUARIO FOREIGN KEY (usuario_id) REFERENCES SYSMAN.Usuario(id),
  CONSTRAINT ODT_UNIDAD_EQUPO FOREIGN KEY (equipo_id) REFERENCES SYSMAN.Unidad_Equipo(id),
  CONSTRAINT ODT_ODT_ESTATUS FOREIGN KEY (odt_estatus_id) REFERENCES SYSMAN.Odt_estatus(id)
)DEFAULT CHARSET=utf8 COMMENT "Tabla de encabezado de ordenes de trabajo";


CREATE TABLE SYSMAN.ODT_DETALLE(
  id int(10) NOT NULL AUTO_INCREMENT PRIMARY KEY COMMENT "Identificador único del Registro.",
  odt_id int(10) NOT NULL COMMENT "Llave Foranea. Tabla SYSMAN.ODT. Identificador de la orden de trabajo a la que pertenece el detalle",
  rutina_detalle_id int(10) NOT NULL COMMENT "Llave Foranea. Tabla SYSMAN.Rutina_Detalle, Paso de la rutina a la que pertenece el registro de detalle",
  estatus_paso int(10) NOT NULL COMMENT "Estatus del paso de la orden de trabajo",
  descripcion varchar(512) COMMENT "Resultado de la ejecucion del procedimiento",
  estatus varchar(1) NOT NULL DEFAULT "A" COMMENT "Estatus del Registro. A - Activo / I - Inactivo.",
  ultima_fecha_actualizacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP COMMENT "Última Fecha de actualización del registro.",
  ultimo_editor varchar(100) NOT NULL COMMENT "Ultima persona que edito el registro",
  
  KEY ODT_DETALE_ODT_KEY(odt_id),
  KEY ODT_DETALE_RUTINA_DET_KEY(rutina_detalle_id),
  CONSTRAINT ODT_DETALLE_ODT FOREIGN KEY (odt_id) REFERENCES SYSMAN.odt(id),
  CONSTRAINT ODT_DETALLE_RUTINA_DET FOREIGN KEY (rutina_detalle_id) REFERENCES SYSMAN.Rutina_detalle(id)
)DEFAULT CHARSET=utf8 COMMENT "Tabla de detalle de las ordenes de trabajo";
