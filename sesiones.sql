

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


-- Estructura de tabla para la tabla `usuarios`
-- 
CREATE database sesiones;

USE sesiones;

CREATE TABLE `usuarios` (
  `id_usuario` int(100) NOT NULL auto_increment,
  `nombres` varchar(100) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `edad` varchar(100) NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `contrasena` varchar(100) NOT NULL,
  PRIMARY KEY  (`id_usuario`)
);

-- 
-- Volcar la base de datos para la tabla `usuarios`
-- 

INSERT INTO `usuarios` VALUES (1, 'Juan', 'Lopez', '26', 'juan', '123');
