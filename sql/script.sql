ALTER TABLE  `UNIDAD_EQUIPO` ADD  `proximo_mantenimiento` TIMESTAMP NOT NULL COMMENT  'El mtto preventivo' AFTER  `ultimo_mantenimiento` ;

ALTER TABLE  `EQUIPO` ADD  `tiempo_mantenimiento` INT( 2 ) NOT NULL COMMENT  'Cada cuantos dias se da el mtto preventivo' AFTER  `descripcion` ;
