-- DEPARTAMENTOS
insert into sysman.departamento (nombre, ubicacion, no_equipos, ultimo_editor) 
values ('Admin', 'Administrador de la aplicacion', 1, 'pep');

insert into sysman.departamento (nombre, ubicacion, no_equipos, ultimo_editor) 
values ('Sistemas', 'Pisos 1 y 2', 1, 'pep');

insert into sysman.departamento (nombre, ubicacion, no_equipos, ultimo_editor) 
values ('Produccion', 'Planta baja', 1, 'pep');

insert into sysman.departamento (nombre, ubicacion, no_equipos, ultimo_editor) 
values ('Ventas', 'Piso 4', 1, 'pep');

-- USUARIOS
insert into sysman.usuario (departamento_id, nombre_usuario, username, password, ultimo_editor)
values (1, 'Administrador del sistema', 'admin', 'admin','pep');

insert into sysman.usuario (departamento_id, nombre_usuario, username, password, ultimo_editor)
values (2, 'Jose Gonzalez', 'pepgonzalez', '1234','pep');

-- ROLES
insert into sysman.rol (descripcion, ultimo_editor)
values ('Administrador', 'pep');

insert into sysman.rol (descripcion, ultimo_editor)
values ('Soporte', 'pep');

-- USUARIO ROLES
insert into sysman.usuario_rol (usuario_id, rol_id, ultimo_editor)
values(1,1,'pep');

insert into sysman.usuario_rol(usuario_id, rol_id, ultimo_editor)
values (2,2,'pep');

select * from sysman.equipo;
select * from sysman.unidad_equipo;

-- EQUIPO
insert into sysman.equipo(nombre, descripcion, imagen_equipo, ultimo_editor) 
values('Computadora','Computadora HP Desktop bla bla', '/images/equipo/computadora','pep');

-- UNIDAD EQUIPO
insert into sysman.unidad_equipo(equipo_id, departamento_id, descripcion, ultimo_mantenimiento, ultimo_editor) 
values(1, 2, 'HP Destop Unidad 1 Sistemas', sysdate(), 'pep');

insert into sysman.unidad_equipo(equipo_id, departamento_id, descripcion, ultimo_mantenimiento, ultimo_editor) 
values(1, 2, 'HP Destop Unidad 2 Sistemas', sysdate(), 'pep');

insert into sysman.unidad_equipo(equipo_id, departamento_id, descripcion, ultimo_mantenimiento, ultimo_editor) 
values(1, 3, 'HP Destop Unidad 1 Produccion', sysdate(), 'pep');

insert into sysman.unidad_equipo(equipo_id, departamento_id, descripcion, ultimo_mantenimiento, ultimo_editor) 
values(1, 4, 'HP Destop Unidad 2 Ventas', sysdate(), 'pep');

-- herramienta

SELECT * FROM SYSMAN.HERRAMIENTA;

insert into sysman.herramienta(nombre, descripcion, unidades_disponibles, ultimo_editor)
values('Desarmador Plano','Desarmador de Cabeza plana', 10, 'pep');

insert into sysman.herramienta(nombre, descripcion, unidades_disponibles, ultimo_editor)
values('Desarmador Estrella','Desarmador de Cabeza',10,'pep');

insert into sysman.herramienta(nombre, descripcion, unidades_disponibles, ultimo_editor)
values('SO','Instalador del sistema operativo',5,'pep');

insert into sysman.herramienta(nombre, descripcion, unidades_disponibles, ultimo_editor)
values('Drivers','Controladores de interfaces de PC',5,'pep');

-- refaccion
select * from sysman.refaccion;

insert into sysman.refaccion(equipo_id, nombre, descripcion, unidades_disponibles, unidades_por_equipo, costo_refaccion, imagen_equipo, ultimo_editor )
values(1,'Pasta Termica','Pasta termica para impermeabilizacion de CPU y GPU', 10, 1, 150, 'images/refaccion/pastaTermica','pep');

insert into sysman.refaccion(equipo_id, nombre, descripcion, unidades_disponibles, unidades_por_equipo, costo_refaccion, imagen_equipo, ultimo_editor )
values(1,'Aire Comprimido','Unidad de aire comprimido para limpieza de PC', 10, 1, 90, 'images/refaccion/comprimido','pep');

-- Rutina
select * from sysman.rutina;

insert into sysman.rutina(equipo_id, descripcion, tiempo_procedimiento, ultimo_editor)
values(1, 'Mantenimiento Preventivo y Limpieza Interna', 120, 'pep');

insert into sysman.rutina(equipo_id, descripcion, tiempo_procedimiento, ultimo_editor)
values(1, 'Mantenimiento Correctivo Formateo PC', 180, 'pep');

-- rutina detalle

select * from sysman.rutina_detalle;

insert into sysman.rutina_detalle(rutina_id, numero_paso, descripcion, tiempo_ejecucion, ultimo_editor)
values(1, 1, 'Desmontar unidad retirando todos los tornillos que cubren el CPU con el desarmador cuidando de estar trabajando sobre una superficie antiestatica', 20, 'pep');

insert into sysman.rutina_detalle(rutina_id, numero_paso, descripcion, tiempo_ejecucion, ultimo_editor)
values(1, 2, 'Retirar disipadores de calor de cpu y gpu. Limpiar cada uno de los componentes', 40, 'pep');

insert into sysman.rutina_detalle(rutina_id, numero_paso, descripcion, tiempo_ejecucion, ultimo_editor)
values(1, 3, 'Aplicar pasta termica sobre los disipadores y sellar el disipador con el procesador correspondiente', 15, 'pep');

insert into sysman.rutina_detalle(rutina_id, numero_paso, descripcion, tiempo_ejecucion, ultimo_editor)
values(1, 4, 'Limpiar ventiladores y lugares de acceso limitado con el aire comprimido', 15, 'pep');

insert into sysman.rutina_detalle(rutina_id, numero_paso, descripcion, tiempo_ejecucion, ultimo_editor)
values(1, 5, 'Re ensamblaje de la unidad y validacion de correcto funcionamiento', 30, 'pep');


insert into sysman.rutina_detalle(rutina_id, numero_paso, descripcion, tiempo_ejecucion, ultimo_editor)
values(2, 1, 'Realizar respaldo de la informacion relevante existente en el equipo', 30, 'pep');

insert into sysman.rutina_detalle(rutina_id, numero_paso, descripcion, tiempo_ejecucion, ultimo_editor)
values(2, 2, 'Formateo de la unidad de Disco duro del PC', 30, 'pep');

insert into sysman.rutina_detalle(rutina_id, numero_paso, descripcion, tiempo_ejecucion, ultimo_editor)
values(2, 3, 'Instalacion de los controladores en la PC', 60, 'pep');

insert into sysman.rutina_detalle(rutina_id, numero_paso, descripcion, tiempo_ejecucion, ultimo_editor)
values(2, 4, 'Instalacion de los paquetes de software de trabajo en la PC', 60, 'pep');

-- rutina detalle herramienta
select * from sysman.rutina_det_herramienta;

insert into sysman.rutina_det_herramienta(rutina_detalle_id,herramienta_id,ultimo_editor)
values(1,1,'pep'); 
insert into sysman.rutina_det_herramienta(rutina_detalle_id,herramienta_id,ultimo_editor)
values(1,2,'pep');
insert into sysman.rutina_det_herramienta(rutina_detalle_id,herramienta_id,ultimo_editor)
values(5,1,'pep');
insert into sysman.rutina_det_herramienta(rutina_detalle_id,herramienta_id,ultimo_editor)
values(5,2,'pep');

insert into sysman.rutina_det_herramienta(rutina_detalle_id,herramienta_id,ultimo_editor)
values(7,3,'pep');
insert into sysman.rutina_det_herramienta(rutina_detalle_id,herramienta_id,ultimo_editor)
values(8,4,'pep');

-- odt status
select * from sysman.odt_estatus;

insert into sysman.odt_estatus(descripcion, ultimo_editor)
values('Por Ejecutar', 'pep');

insert into sysman.odt_estatus(descripcion, ultimo_editor)
values('En Proceso', 'pep');

insert into sysman.odt_estatus(descripcion, ultimo_editor)
values('Ejecutada', 'pep');

-- odt

select * from sysman.odt;

insert into sysman.odt(equipo_id, rutina_id, usuario_id, unidad_equipo_id, odt_estatus_id, fecha, hora, ultimo_editor)
values(1, 1, 2, 1, 1, curdate(),'12:00','pep');

insert into sysman.odt(equipo_id, rutina_id, usuario_id, unidad_equipo_id, odt_estatus_id, fecha, hora, ultimo_editor)
values(1, 2, 2, 2, 1, curdate(),'15:00','pep');
