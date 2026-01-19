/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

CREATE TABLE IF NOT EXISTS `aspirantes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ideleccion` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `apellido` varchar(45) DEFAULT NULL,
  `tipo_documento` varchar(45) DEFAULT NULL,
  `documento` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `telefono` varchar(45) NOT NULL,
  `programa` varchar(45) NOT NULL,
  `semestre` varchar(45) NOT NULL,
  `foto` varchar(150) DEFAULT NULL,
  `numero_tarjeton` varchar(2) DEFAULT NULL,
  `solicitud` varchar(200) DEFAULT NULL,
  `declaracion` varchar(200) DEFAULT NULL,
  `nota` mediumtext,
  `estado` varchar(15) DEFAULT NULL COMMENT 'A=>Aspirante\nS=>Seleccionado\nR=>Rechazado\n',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_candidatos_Elecciones_idx` (`ideleccion`),
  CONSTRAINT `fk_candidatos_Elecciones0` FOREIGN KEY (`ideleccion`) REFERENCES `elecciones` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*!40000 ALTER TABLE `aspirantes` DISABLE KEYS */;
REPLACE INTO `aspirantes` (`id`, `ideleccion`, `nombre`, `apellido`, `tipo_documento`, `documento`, `email`, `telefono`, `programa`, `semestre`, `foto`, `numero_tarjeton`, `solicitud`, `declaracion`, `nota`, `estado`, `created_at`, `updated_at`) VALUES
	(11, 20, 'MANUEL', 'MEJIA', 'CC', '62839', 'manuel@gmail.com', '36139283', 'INGENIERIA', '9', 'vx7XIVNkfZL9ZlvYYfkOhTy9VVKceia30OvPGq7p.jpeg', '2', 'm4ET070dtpk6xNH3OIChwaPoHdOhrClbo8mR6fmK.pdf', 'JTm9ojHqVfZWf2iFQ3FVC8UrIzMlPaBUPXmSBgJ5.pdf', 'CUMPLE CON TODOS', 'S', '2020-05-29 01:10:28', '2020-05-29 01:10:45');
/*!40000 ALTER TABLE `aspirantes` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `candidatos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ideleccion` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `apellido` varchar(45) DEFAULT NULL,
  `foto` varchar(150) DEFAULT NULL,
  `numero_tarjeton` varchar(2) DEFAULT NULL,
  `estado` varchar(15) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_candidatos_Elecciones_idx` (`ideleccion`),
  CONSTRAINT `fk_candidatos_Elecciones` FOREIGN KEY (`ideleccion`) REFERENCES `elecciones` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*!40000 ALTER TABLE `candidatos` DISABLE KEYS */;
REPLACE INTO `candidatos` (`id`, `ideleccion`, `nombre`, `apellido`, `foto`, `numero_tarjeton`, `estado`, `created_at`, `updated_at`) VALUES
	(40, 20, 'DAVID STEVEN', 'DURAN', 'BZBQEPCfYyavztF7tJvqi4mAWjGiL025qJVuQ5n2.png', '1', 'Activo', '2020-05-29 01:09:35', '2020-05-29 01:09:35'),
	(41, 20, 'MANUEL', 'MEJIA', 'vx7XIVNkfZL9ZlvYYfkOhTy9VVKceia30OvPGq7p.jpeg', '2', 'Activo', '2020-05-29 01:10:45', '2020-05-29 01:10:45'),
	(42, 20, 'Voto en Blanco', '', 'blanco.jpg', '10', 'Activo', '2020-05-29 01:13:07', '2020-05-29 01:13:07'),
	(43, 20, 'Voto en Blanco', '', 'blanco.jpg', '10', 'Activo', '2020-05-29 01:18:36', '2020-05-29 01:18:36'),
	(44, 21, 'MABEL', 'ALONIA', 'qWwvW7tC0JTPMTXLbQDmt28G4kKsoQNZDNMFO3OB.png', '1', 'Activo', '2020-05-29 09:04:31', '2020-05-29 09:04:32'),
	(45, 21, 'YULI', 'AGUIRRE', 'pmtcsyUGheMnFsLpCBJbiorrAszFxCd2g1rKyJzg.png', '2', 'Activo', '2020-05-29 09:04:59', '2020-05-29 09:04:59'),
	(46, 21, 'Voto en Blanco', '', 'blanco.jpg', '10', 'Activo', '2020-05-29 09:06:43', '2020-05-29 09:06:43'),
	(47, 22, 'SANDRA', 'MEJIA', 'L5V4g3EIQGjJCHAKa4tB0QxddZk9HhhlpFV2cquy.png', '1', 'Activo', '2020-05-29 11:07:06', '2020-05-29 11:07:06'),
	(48, 22, 'MARTHA', 'VALLEJO', 'zEJVLrHmo6RJt4zNr1i322H3PKQdIHhEJg1cZkyR.png', '2', 'Activo', '2020-05-29 11:07:34', '2020-05-29 11:07:34'),
	(49, 22, 'Voto en Blanco', '', 'blanco.jpg', '10', 'Activo', '2020-05-29 11:13:23', '2020-05-29 11:13:23');
/*!40000 ALTER TABLE `candidatos` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `datos_solicitud` (
  `iddatos_solicitud` int(11) NOT NULL AUTO_INCREMENT,
  `numero_radicado` int(11) DEFAULT NULL,
  `fecha_respuesta` datetime DEFAULT NULL,
  `fecha_notificacion` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `fecha_radicado` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `solicitud_id` int(11) NOT NULL,
  PRIMARY KEY (`iddatos_solicitud`),
  KEY `fk_datos_solicitud_solicitud1_idx` (`solicitud_id`),
  CONSTRAINT `fk_datos_solicitud_solicitud1` FOREIGN KEY (`solicitud_id`) REFERENCES `solicitudes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*!40000 ALTER TABLE `datos_solicitud` DISABLE KEYS */;
/*!40000 ALTER TABLE `datos_solicitud` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `dependencias` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `descripcion` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `id_entidad` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_dependencia_entidad1_idx` (`id_entidad`),
  CONSTRAINT `fk_dependencia_entidad1` FOREIGN KEY (`id_entidad`) REFERENCES `entidades` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*!40000 ALTER TABLE `dependencias` DISABLE KEYS */;
/*!40000 ALTER TABLE `dependencias` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `elecciones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(250) NOT NULL,
  `descripcion` varchar(250) DEFAULT NULL,
  `departamento` varchar(45) DEFAULT NULL,
  `ciudad` varchar(45) DEFAULT NULL,
  `lugar` varchar(155) DEFAULT NULL,
  `estado` varchar(15) NOT NULL DEFAULT 'Pendiente',
  `id_entidad` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `fecha_incio` timestamp NULL DEFAULT NULL,
  `fecha_fin` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_eleccion_entidad_idx` (`id_entidad`),
  CONSTRAINT `fk_eleccion_entidad` FOREIGN KEY (`id_entidad`) REFERENCES `entidades` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*!40000 ALTER TABLE `elecciones` DISABLE KEYS */;
REPLACE INTO `elecciones` (`id`, `nombre`, `descripcion`, `departamento`, `ciudad`, `lugar`, `estado`, `id_entidad`, `created_at`, `fecha_incio`, `fecha_fin`, `updated_at`) VALUES
	(20, 'ELECCION DE PRUEBA', 'PRUEBA', 'VALLE DEL CAUCA', 'TULUA', 'EVOTO', 'Cerrada', NULL, '2020-05-29 01:09:10', NULL, NULL, '2020-05-29 01:19:18'),
	(21, 'Elección de prueba Unidad Central del Valle del Cauca', 'Elección de prueba Unidad Central del Valle del Cauca', 'VALLE', 'TULUA', 'EVOTO', 'Cerrada', NULL, '2020-05-29 09:03:36', NULL, NULL, '2020-05-29 11:05:44'),
	(22, 'Elección de prueba Unidad Central del Valle del Cauca 2020', 'Elección de prueba Unidad Central del Valle del Cauca', 'VALLE DEL CAUCA', 'TULUA', 'EVOTO', 'Ejecucion', NULL, '2020-05-29 11:06:33', NULL, NULL, '2020-05-29 11:13:23');
/*!40000 ALTER TABLE `elecciones` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `encuestas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_entidad` int(11) NOT NULL,
  `users_id` int(10) unsigned NOT NULL,
  `nombre` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `descripcion` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `estado` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `fecha_inicio` date DEFAULT NULL,
  `fecha_cierre` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_encuestas_entidad1_idx` (`id_entidad`),
  KEY `fk_encuestas_users1_idx` (`users_id`),
  CONSTRAINT `fk_encuestas_entidad1` FOREIGN KEY (`id_entidad`) REFERENCES `entidades` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_encuestas_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*!40000 ALTER TABLE `encuestas` DISABLE KEYS */;
/*!40000 ALTER TABLE `encuestas` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `entidades` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nit` varchar(50) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `direccion` varchar(45) DEFAULT NULL,
  `telefono` varchar(45) DEFAULT NULL,
  `email` varchar(45) NOT NULL,
  `sitio_web` varchar(100) DEFAULT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `logo` varchar(80) DEFAULT NULL,
  `estado` varchar(10) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*!40000 ALTER TABLE `entidades` DISABLE KEYS */;
REPLACE INTO `entidades` (`id`, `nit`, `nombre`, `direccion`, `telefono`, `email`, `sitio_web`, `descripcion`, `logo`, `estado`, `created_at`, `updated_at`) VALUES
	(3, '12334534-4', 'UNIDAD CENTRAL DEL VALLE', 'Cra 27 A No. 48 - 144 Kilómetro 1 salida Sur', '2310283 - 3029384', ' info@uceva.edu.co ', 'http://www.uceva.edu.co/', 'UNIVERSIDAD\r\n', 'http://localhost/diser/public/logo/4JdvF9k8W1IQZu4pqY5oFuM2xb4EYWhfIxLgNv85.png', 'Activo', '2018-04-30 10:17:22', '2018-05-01 08:32:43');
/*!40000 ALTER TABLE `entidades` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `grupos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `estado` varchar(10) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*!40000 ALTER TABLE `grupos` DISABLE KEYS */;
REPLACE INTO `grupos` (`id`, `nombre`, `descripcion`, `estado`, `created_at`, `updated_at`) VALUES
	(5, 'GRUPO GENERAL', 'GRUPO GENERAL, PARA GESTIONAR TODOS LOS USUARIOS', 'Activo', '2018-05-16 04:17:23', '2018-05-16 04:17:23'),
	(6, 'JORNADA TARDE', 'HORARIO DE 2 PM A 6 PM', 'Activo', '2018-05-16 04:18:22', '2018-05-16 04:18:22'),
	(7, 'JORNADA NOCHE', 'HORARIO DE 6 PM A 11 PM', 'Activo', '2018-05-16 04:19:00', '2018-05-16 04:19:00'),
	(10, 'ADMINISTRADORES', 'SOLO PARA GRUPOS DE ADMINISTRADORES', 'Activo', '2018-11-26 17:02:37', '2018-11-26 17:02:37'),
	(11, 'ADMINISTRATIVOS', 'USUARIOS ADMINISTRATIVOS DE EVOTO', 'Activo', '2020-05-26 08:07:34', '2020-05-26 08:07:34'),
	(12, 'CONSEJO DIRECTIVO', 'CONSEJO DIRECTIVO', 'Activo', '2020-05-29 05:53:34', '2020-05-29 05:53:34');
/*!40000 ALTER TABLE `grupos` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `historico_sufragantes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_eleccion` int(11) NOT NULL,
  `id_user` int(10) unsigned NOT NULL,
  `estado` varchar(15) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_usuarios_Elecciones_idx` (`id_eleccion`),
  KEY `fk_sufragantes_users1_idx` (`id_user`),
  CONSTRAINT `fk_sufragantes_users10` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_usuarios_Elecciones0` FOREIGN KEY (`id_eleccion`) REFERENCES `elecciones` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*!40000 ALTER TABLE `historico_sufragantes` DISABLE KEYS */;
REPLACE INTO `historico_sufragantes` (`id`, `id_eleccion`, `id_user`, `estado`, `created_at`, `updated_at`) VALUES
	(13, 20, 1, 'Desactivado', '2020-05-29 01:11:16', '2020-05-29 01:11:16'),
	(14, 20, 72, 'Activo', '2020-05-29 01:11:18', '2020-05-29 01:11:18'),
	(16, 21, 123, 'Activo', '2020-05-29 09:05:22', '2020-05-29 09:05:22'),
	(17, 21, 124, 'Activo', '2020-05-29 09:05:22', '2020-05-29 09:05:22'),
	(18, 21, 125, 'Activo', '2020-05-29 09:05:24', '2020-05-29 09:05:24'),
	(19, 21, 126, 'Activo', '2020-05-29 09:05:26', '2020-05-29 09:05:26'),
	(20, 21, 127, 'Activo', '2020-05-29 09:05:27', '2020-05-29 09:05:27'),
	(21, 21, 128, 'Activo', '2020-05-29 09:05:28', '2020-05-29 09:05:28'),
	(22, 21, 129, 'Activo', '2020-05-29 09:05:28', '2020-05-29 09:05:28'),
	(23, 21, 106, 'Activo', '2020-05-29 09:05:36', '2020-05-29 09:05:36'),
	(24, 21, 107, 'Activo', '2020-05-29 09:05:37', '2020-05-29 09:05:37'),
	(25, 21, 108, 'Activo', '2020-05-29 09:05:39', '2020-05-29 09:05:39'),
	(26, 21, 109, 'Activo', '2020-05-29 09:05:40', '2020-05-29 09:05:40'),
	(27, 21, 110, 'Desactivado', '2020-05-29 09:05:41', '2020-05-29 09:05:41'),
	(28, 21, 111, 'Activo', '2020-05-29 09:05:43', '2020-05-29 09:05:43'),
	(29, 21, 112, 'Activo', '2020-05-29 09:05:44', '2020-05-29 09:05:44'),
	(30, 21, 113, 'Activo', '2020-05-29 09:05:45', '2020-05-29 09:05:45'),
	(31, 21, 114, 'Activo', '2020-05-29 09:05:46', '2020-05-29 09:05:46'),
	(32, 21, 115, 'Activo', '2020-05-29 09:05:47', '2020-05-29 09:05:47'),
	(33, 21, 117, 'Activo', '2020-05-29 09:05:49', '2020-05-29 09:05:49'),
	(34, 21, 118, 'Activo', '2020-05-29 09:05:50', '2020-05-29 09:05:50'),
	(35, 21, 119, 'Activo', '2020-05-29 09:05:51', '2020-05-29 09:05:51'),
	(36, 21, 120, 'Activo', '2020-05-29 09:05:53', '2020-05-29 09:05:53'),
	(37, 21, 121, 'Activo', '2020-05-29 09:05:54', '2020-05-29 09:05:54'),
	(38, 21, 1, 'Desactivado', '2020-05-29 09:06:06', '2020-05-29 09:06:06'),
	(39, 21, 72, 'Activo', '2020-05-29 09:06:07', '2020-05-29 09:06:07');
/*!40000 ALTER TABLE `historico_sufragantes` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `home_images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `imagen` varchar(45) DEFAULT NULL,
  `estado` varchar(10) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*!40000 ALTER TABLE `home_images` DISABLE KEYS */;
REPLACE INTO `home_images` (`id`, `imagen`, `estado`, `created_at`, `updated_at`) VALUES
	(1, 'home.JPG', 'Activo', '2018-12-27 00:30:50', '2018-12-27 00:30:51'),
	(2, 'tarjeton.jpg', 'Activo', NULL, NULL);
/*!40000 ALTER TABLE `home_images` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `horarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_eleccion` int(11) NOT NULL,
  `fecha_hora_inicio` datetime NOT NULL,
  `fecha_hora_cierre` datetime NOT NULL,
  `estado` varchar(10) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Horarios_Eleccions_idx` (`id_eleccion`),
  CONSTRAINT `fk_Horarios_Eleccions` FOREIGN KEY (`id_eleccion`) REFERENCES `elecciones` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*!40000 ALTER TABLE `horarios` DISABLE KEYS */;
/*!40000 ALTER TABLE `horarios` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
REPLACE INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `notificaciones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `em_inicio_elecc` varchar(2) CHARACTER SET latin1 DEFAULT NULL COMMENT 'enviar email al iniciar eleccion!!!\nS->"si"\nN->"no"',
  `em_conf_voto` varchar(2) CHARACTER SET latin1 DEFAULT NULL COMMENT '\nenviar email al realizar el voto!!!\nS->"si"\nN->"no"',
  `sms_inicio_elecc` varchar(2) CHARACTER SET latin1 DEFAULT NULL COMMENT 'enviar sms cuando se activa la eleccion\nS->"si"\nN->"no"',
  `sms_conf_voto` varchar(2) CHARACTER SET latin1 DEFAULT NULL COMMENT 'enviar sms al realizar el voto!!!\nS->"si"\nN->"no"',
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*!40000 ALTER TABLE `notificaciones` DISABLE KEYS */;
REPLACE INTO `notificaciones` (`id`, `em_inicio_elecc`, `em_conf_voto`, `sms_inicio_elecc`, `sms_conf_voto`, `updated_at`, `created_at`) VALUES
	(1, 'S', 'N', 'S', 'N', '2020-05-26 08:47:43', NULL);
/*!40000 ALTER TABLE `notificaciones` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `opciones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_encuesta` int(11) NOT NULL,
  `nombre` varchar(145) CHARACTER SET latin1 NOT NULL,
  `descripcion` varchar(245) CHARACTER SET latin1 DEFAULT NULL,
  `imagen` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `tipo_contenido` varchar(20) CHARACTER SET latin1 DEFAULT NULL COMMENT 'es para determinar en la vista si lleva contenido y descripcion,  o son respuestas cortar',
  PRIMARY KEY (`id`),
  KEY `fk_contenido_encuesta_idx` (`id_encuesta`),
  CONSTRAINT `fk_contenido_encuesta` FOREIGN KEY (`id_encuesta`) REFERENCES `preguntas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*!40000 ALTER TABLE `opciones` DISABLE KEYS */;
/*!40000 ALTER TABLE `opciones` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `preguntas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_encuesta` int(11) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `imagen` varchar(100) DEFAULT NULL,
  `estado` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`,`id_encuesta`),
  KEY `fk_preguntas_encuestas1_idx` (`id_encuesta`),
  CONSTRAINT `fk_preguntas_encuestas1` FOREIGN KEY (`id_encuesta`) REFERENCES `encuestas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*!40000 ALTER TABLE `preguntas` DISABLE KEYS */;
/*!40000 ALTER TABLE `preguntas` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `resultados_encuestas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_encuesta` int(11) NOT NULL,
  `id_contenido` int(11) NOT NULL,
  `fecha_hora` datetime NOT NULL,
  `idusuario` varchar(45) CHARACTER SET latin1 DEFAULT NULL COMMENT 'para validar que ya el usuario realizao el voto a esa pregunta',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `encuestas_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_encuesta_resultado_encuesta_idx` (`id_encuesta`),
  KEY `fk_contenido_resultado_encuesta_idx` (`id_contenido`),
  KEY `fk_resultados_encuestas_encuestas1_idx` (`encuestas_id`),
  CONSTRAINT `fk_contenido_resultado_encuesta` FOREIGN KEY (`id_contenido`) REFERENCES `opciones` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_encuesta_resultado_encuesta` FOREIGN KEY (`id_encuesta`) REFERENCES `preguntas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_resultados_encuestas_encuestas1` FOREIGN KEY (`encuestas_id`) REFERENCES `encuestas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*!40000 ALTER TABLE `resultados_encuestas` DISABLE KEYS */;
/*!40000 ALTER TABLE `resultados_encuestas` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `estado` varchar(15) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
REPLACE INTO `roles` (`id`, `nombre`, `descripcion`, `estado`, `created_at`, `updated_at`) VALUES
	(4, 'Usuario', 'usuario podrá realizar votaciones y contestar encuestas', 'Activo', NULL, '2018-11-19 16:50:18'),
	(1989, 'Administrador', 'El administrador tiene acceso total, podrá gestionar usuarios', 'Activo', NULL, '2018-11-19 16:49:02');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `solicitudes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `asunto` varchar(150) CHARACTER SET latin1 NOT NULL,
  `detalle` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `adjunto` varchar(180) CHARACTER SET latin1 DEFAULT NULL,
  `id_tipo_solicitud` int(11) NOT NULL,
  `fecha_solicitud` datetime NOT NULL,
  `id_empresa` int(11) NOT NULL,
  `estado` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_solicitud_idtipo_soliitud_idx` (`id_tipo_solicitud`),
  KEY `fk_solicitud_empresa_idx` (`id_empresa`),
  CONSTRAINT `fk_solicitud_empresa` FOREIGN KEY (`id_empresa`) REFERENCES `entidades` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_solicitud_idtipo_soliitud` FOREIGN KEY (`id_tipo_solicitud`) REFERENCES `tipos_solicitud` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*!40000 ALTER TABLE `solicitudes` DISABLE KEYS */;
/*!40000 ALTER TABLE `solicitudes` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `sufragantes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_eleccion` int(11) NOT NULL,
  `id_user` int(10) unsigned NOT NULL,
  `estado` varchar(15) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_usuarios_Elecciones_idx` (`id_eleccion`),
  KEY `fk_sufragantes_users1_idx` (`id_user`),
  CONSTRAINT `fk_sufragantes_users1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_usuarios_Elecciones` FOREIGN KEY (`id_eleccion`) REFERENCES `elecciones` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*!40000 ALTER TABLE `sufragantes` DISABLE KEYS */;
REPLACE INTO `sufragantes` (`id`, `id_eleccion`, `id_user`, `estado`, `created_at`, `updated_at`) VALUES
	(64, 22, 123, 'Activo', '2020-05-29 11:07:48', '2020-05-29 11:07:48'),
	(65, 22, 124, 'Activo', '2020-05-29 11:07:48', '2020-05-29 11:07:48'),
	(66, 22, 125, 'Activo', '2020-05-29 11:07:50', '2020-05-29 11:07:50'),
	(67, 22, 126, 'Desactivado', '2020-05-29 11:07:52', '2020-05-29 11:07:52'),
	(68, 22, 127, 'Activo', '2020-05-29 11:07:52', '2020-05-29 11:07:52'),
	(69, 22, 128, 'Activo', '2020-05-29 11:07:54', '2020-05-29 11:07:54'),
	(70, 22, 129, 'Activo', '2020-05-29 11:07:54', '2020-05-29 11:07:54'),
	(71, 22, 106, 'Desactivado', '2020-05-29 11:08:07', '2020-05-29 11:08:07'),
	(72, 22, 107, 'Desactivado', '2020-05-29 11:08:08', '2020-05-29 11:08:08'),
	(73, 22, 108, 'Desactivado', '2020-05-29 11:08:10', '2020-05-29 11:08:10'),
	(74, 22, 109, 'Desactivado', '2020-05-29 11:08:10', '2020-05-29 11:08:10'),
	(75, 22, 110, 'Desactivado', '2020-05-29 11:08:12', '2020-05-29 11:08:12'),
	(76, 22, 111, 'Desactivado', '2020-05-29 11:08:13', '2020-05-29 11:08:13'),
	(77, 22, 112, 'Desactivado', '2020-05-29 11:08:14', '2020-05-29 11:08:14'),
	(78, 22, 113, 'Activo', '2020-05-29 11:08:15', '2020-05-29 11:08:15'),
	(79, 22, 114, 'Activo', '2020-05-29 11:08:16', '2020-05-29 11:08:16'),
	(80, 22, 115, 'Activo', '2020-05-29 11:08:21', '2020-05-29 11:08:21'),
	(81, 22, 117, 'Activo', '2020-05-29 11:08:22', '2020-05-29 11:08:22'),
	(82, 22, 118, 'Activo', '2020-05-29 11:08:23', '2020-05-29 11:08:23'),
	(83, 22, 119, 'Activo', '2020-05-29 11:08:24', '2020-05-29 11:08:24'),
	(84, 22, 120, 'Desactivado', '2020-05-29 11:08:25', '2020-05-29 11:08:25'),
	(85, 22, 121, 'Activo', '2020-05-29 11:08:26', '2020-05-29 11:08:26'),
	(86, 22, 1, 'Desactivado', '2020-05-29 11:09:10', '2020-05-29 11:09:10'),
	(87, 22, 72, 'Activo', '2020-05-29 11:09:11', '2020-05-29 11:09:11');
/*!40000 ALTER TABLE `sufragantes` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `temporales_de_ayuda` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `import_grupo` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*!40000 ALTER TABLE `temporales_de_ayuda` DISABLE KEYS */;
REPLACE INTO `temporales_de_ayuda` (`id`, `import_grupo`, `created_at`, `updated_at`) VALUES
	(1, 12, NULL, '2020-05-29 05:53:50');
/*!40000 ALTER TABLE `temporales_de_ayuda` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `tipos_solicitud` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(80) CHARACTER SET latin1 NOT NULL,
  `descripcion` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `tiempo_respuesta` int(11) NOT NULL,
  `id_dependencia` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_tipo_solicitud_dependencia1_idx` (`id_dependencia`),
  CONSTRAINT `fk_tipo_solicitud_dependencia1` FOREIGN KEY (`id_dependencia`) REFERENCES `dependencias` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*!40000 ALTER TABLE `tipos_solicitud` DISABLE KEYS */;
/*!40000 ALTER TABLE `tipos_solicitud` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_grupo` int(11) NOT NULL,
  `id_entidad` int(11) NOT NULL,
  `id_role` int(11) NOT NULL,
  `documento` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellido` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `fk_users_grupos1_idx` (`id_grupo`),
  KEY `fk_users_entidades1_idx` (`id_entidad`),
  KEY `fk_users_roles1_idx` (`id_role`),
  CONSTRAINT `fk_users_entidades1` FOREIGN KEY (`id_entidad`) REFERENCES `entidades` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_grupos1` FOREIGN KEY (`id_grupo`) REFERENCES `grupos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_roles1` FOREIGN KEY (`id_role`) REFERENCES `roles` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*!40000 ALTER TABLE `users` DISABLE KEYS */;
REPLACE INTO `users` (`id`, `id_grupo`, `id_entidad`, `id_role`, `documento`, `name`, `apellido`, `email`, `password`, `estado`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 10, 3, 1989, '1116245855', 'DAVID', 'DURAN VALLEJO', 'davidstevend@gmail.com', '$2y$10$5XfDCDWrsVRPLpaQpbd0FOLdIJtuzs98SQc0Aia94SBHuElKZVpnC', 'Activo', '6dpArGJe4Toax5wAnI8X306JDjVapoHAt7fcNmg4n38xVimz7MS6yzronos2', '2018-04-28 09:57:55', '2020-05-29 11:09:10'),
	(72, 10, 3, 1989, '12345678988', 'MANUEL', 'MEJIA', 'spidermejo7@gmail.com', '$2y$10$KesGnKK44ASSjJkv.SGbX.zCeVHCK7Dy7/5.h4A4vVXIOQ.DhFx82', 'Activo', 'TybTJNRRcgeWQb6RnUHHei9aZycsYbAN0o493Sj5cZbevlwJ2T89x7wm41xN', '2020-05-07 23:22:51', '2020-05-29 11:09:11'),
	(73, 5, 3, 1989, '23456789', 'EVOTO', 'APP', 'diser@uceva.edu.co', '$2y$10$8gcVtUlNIgDDmFsMH1ZizOjxDRsc1BZoKisP4S23wqcirlovJIbf2', 'Activo', 'UlMN4O4DLe7ePwRFIEL8qm7880gsStJdzij9SaTniSZRj8sgzQj6O23VWgLm', '2020-05-26 04:38:26', '2020-05-26 04:38:26'),
	(106, 11, 3, 4, '1234', 'Patricia Londoño Sepulveda', ' ', 'plondono@uceva.edu.co', '$2y$10$RsJnz2uvCKbdEDDvUHsX8.0o0eR/XnE2sPJAlPhU.trJLwIbvu.nO', 'Activo', 'uAawNM6Vmp7aVCCes9WYcxXlheish9AG8DbQkiRxaDzG9yKqfDAzZPNHKKLQ', '2020-05-26 08:44:43', '2020-05-29 11:08:07'),
	(107, 11, 3, 4, '12345', 'Ana Maria Espinosa Cerquera', ' ', 'aespinosa@uceva.edu.co', '$2y$10$W8zRq0E/.ZzL41/e2e6e7.0PwFhP8tHlkPfFfQ73UHpL/UHwWWL3e', 'Activo', 'qp2lo3rTluJTOZHofxxeJ1uPzqYYnhLxw6IZg8vk5R5vh4ZFlCsFyWdqwbSb', '2020-05-26 08:44:43', '2020-05-29 11:08:09'),
	(108, 11, 3, 4, '23456', 'Diana Lucia Lucumi ', ' ', 'dlucumi@uceva.edu.co', '$2y$10$TrxhtsE4al5TzQgXEiHo..CgVoLL7D4yWBJBkCAcrbKucd46rmdfy', 'Activo', 'rvcyfxAsyHPdsMG1xPuWTeZJwBS99b2mTXcaLTJVaEDvWWCJUTDGsbIv7nUt', '2020-05-26 08:44:43', '2020-05-29 11:08:10'),
	(109, 11, 3, 4, '34567', 'Pablo Cesar Agudelo', ' ', 'pagudelo@uceva.edu.co', '$2y$10$32lVPakxfIUSee6WY5Wx3uuzkgM4Pd3ydl4IGBm6NZ9S1T.iY3VvO', 'Activo', 'KnLCA7ihx1pHvMTkXTpDB2DmoE8PmRyOPGgV6o3lkoYPJ6E24TG7mK7Ph7C9', '2020-05-26 08:44:44', '2020-05-29 11:08:10'),
	(110, 11, 3, 4, '45678', 'Juan Carlos Tascón', ' ', 'jctascon@uceva.edu.co', '$2y$10$837mV2g9YeTDnHQfrdlyNeXh.2lkvPulQRfs5lcUUJlkOSntka1Xu', 'Activo', '4UCdvoHSnCzq6JYFxCkVQjZTw6krMseJbBfgsqpGHFv96EI5oyrVWg8cDRiE', '2020-05-26 08:44:44', '2020-05-29 11:08:12'),
	(111, 11, 3, 4, '56789', 'Julio Cesar Herrera', ' ', 'jherrera@uceva.edu.co', '$2y$10$MDHg1yPZXExfwedcAMsoI.TLait1MV3KfBIrm0ZdTAtOahJ7om7j6', 'Activo', '5K95MBWXmHNE4HCe4tYIq0Fajh7myYfdaFj5yZO31YO7uYMfeyJZho6TBF65', '2020-05-26 08:44:44', '2020-05-29 11:08:13'),
	(112, 11, 3, 4, '67900', 'Wilmar Salgado Ariza', ' ', 'wsalgado@uceva.edu.co', '$2y$10$/gkcXUV6Tl2rdsks2xyrxu1eR7D9UvxJtOUlZHWaX7OyT9C1pSYf6', 'Activo', '2eDJzt06iTqcZY6zcpNmxeXnGMuAyMZSuQH8FflNhEugZ5RrTXNuTG67lKCF', '2020-05-26 08:44:44', '2020-05-29 11:08:14'),
	(113, 11, 3, 4, '79011', 'Limbania Perea', ' ', 'lperea@uceva.edu.co', '$2y$10$xOzKqm2Saj1q6bv7MfD6DO3I1xk.MxdtTWU97K2teQkv/UFrAlOO2', 'Activo', NULL, '2020-05-26 08:44:44', '2020-05-29 11:08:15'),
	(114, 11, 3, 4, '90122', 'Andrés Felipe Jaramillo', ' ', 'ajarmillo@uceva.edu.co', '$2y$10$RiI.ar0i3/9aiiNR7967w.AikypPXQ8mG3UL/enf/bz7hPYmmZQzu', 'Activo', NULL, '2020-05-26 08:44:44', '2020-05-29 11:08:16'),
	(115, 11, 3, 4, '101233', 'Juan Carlos Urriago', ' ', 'jurriago@uceva.edu.co', '$2y$10$cB0O6aGGhdnjj.er29dcEOIoLMzxhX6fpR8TUkJBs0pHV1/20nOoy', 'Activo', NULL, '2020-05-26 08:44:44', '2020-05-29 11:08:21'),
	(117, 11, 3, 4, '123455', 'Carlos Hernan Mendez', ' ', 'cmendez@uceva.edu.co', '$2y$10$uw7qrhYXaCDLYNtBkeoVn.YBIMu.odDSk7fDMeRVBcXKeWSsskPAm', 'Activo', NULL, '2020-05-26 08:44:44', '2020-05-29 11:08:22'),
	(118, 11, 3, 4, '134566', 'Alexánder Romero Sánchez', ' ', 'aromero@uceva.edu.co', '$2y$10$uN.88.Tue3opX.IoNgh3cOA5cCjz5IGL0gHpkpo3.9Bomrky69zl6', 'Activo', NULL, '2020-05-26 08:44:44', '2020-05-29 11:08:23'),
	(119, 11, 3, 4, '145677', 'Oscar Javier Velasquez', ' ', 'ovelasquez@uceva.edu.co', '$2y$10$2kIYlxI52eMrVGzWigTOe.5HNRiouIQNmTDL0IMf6bY1nwHs.lL2m', 'Activo', NULL, '2020-05-26 08:44:44', '2020-05-29 11:08:25'),
	(120, 11, 3, 4, '156788', 'María Isabela Cardona Sánchez', ' ', 'maria.cardona03@uceva.edu.co', '$2y$10$CDWXOEAAQ6Qi9zNwLGJZROeunOr5YEWIkhZg2S3cVDMUM/ZW9A/VK', 'Activo', 'lpr8VSgXjpLdsAfrQlYNv6937XPPqxSbMoMWCreAhR3p2pxtSesagv1kFS5M', '2020-05-26 08:44:44', '2020-05-29 11:08:26'),
	(121, 11, 3, 4, '167899', 'urriago', ' ', 'rectoria@uceva.edu.co', '$2y$10$UVQWia748/Ryg5vrVpYdh.6MXEq4ILKG6hQnB3m/7SNd5.27CWY7S', 'Activo', 'HRINUv9JNNMXwSv8vMpFFRHITUc6sIvUXeB7SPjkkc5Nc23j2CCYwksgzs8E', '2020-05-26 08:44:45', '2020-05-29 11:08:27'),
	(122, 5, 3, 4, '124363467567568', 'SANDRA', 'MEJIA', 'sandrita7_8@gmail.com', '$2y$10$7g/Ht2Oax8qCMQt013wC2elZFPLN0gHs0l5v9nNwh2w52CA5qTud6', 'Activo', 'uvfbhJoFykRWYbe8KE68S0wp6O0aEeJUJR9X316QULVlOoENRdk3KoRIRXkt', '2020-05-29 02:24:19', '2020-05-29 02:24:55'),
	(123, 12, 3, 4, '4657890', 'Jhon Jairo Gómez Aguirre', ' ', ' alcalde@tulua.gov.co', '$2y$10$iU8lMPRK2vBmdAT.PaxHkeLN08yU6aN1XGyo8oJzke28KFy1NmnFO', 'Activo', NULL, '2020-05-29 05:53:51', '2020-05-29 11:07:48'),
	(124, 12, 3, 4, '4657891', 'German Trujillo Martínez', ' ', 'getruma1@gmail.com', '$2y$10$tYlTYqOXsCRTDzw3DGPyXua5NiBgSlb6qgUQ98ugfgPJYuAEdPvOm', 'Activo', NULL, '2020-05-29 05:53:51', '2020-05-29 11:07:48'),
	(125, 12, 3, 4, '4657892', 'Raquel Díaz Ortiz', ' ', 'rdiaz@mineducacion.gov.co', '$2y$10$VIAXU/6HaDSFr61EsevifeeAjP9j1EwAdJvBfK3yazu97ZxMR.B5C', 'Activo', NULL, '2020-05-29 05:53:52', '2020-05-29 11:07:50'),
	(126, 12, 3, 4, '4657894', 'Harlys Rivas Perea', ' ', 'hrivas@uceva.edu.co', '$2y$10$/Bwtxt0.rppSVruDyE1u8ejCRWABolQwbzUircY5a/nbrgPtxrvEa', 'Activo', 'KARdg1T7hnNtaJJtNeQ12MUTGFChQTzAvy8m9L4135GwkMqzDBx4xR2JnkWX', '2020-05-29 05:53:52', '2020-05-29 11:07:52'),
	(127, 12, 3, 4, '4657895', 'Javier Humberto Arango Giron', ' ', 'j-sol-7771@hotmail.com', '$2y$10$d.SxvVeVSUBmGsMrwuZJP.bZfrwG2kLBVvggosJ31icJmu3qXKOae', 'Activo', NULL, '2020-05-29 05:53:52', '2020-05-29 11:07:53'),
	(128, 12, 3, 4, '4657896', 'Jorge Eliecer Andrade Rada', ' ', 'gerencia@tiendastokiko.com\n', '$2y$10$ZhaH4gJ7YcuDYPFSnA1n1eSuBsW5fT5laGHIlWUb29R2Fg..vKAle', 'Activo', NULL, '2020-05-29 05:53:52', '2020-05-29 11:07:54'),
	(129, 12, 3, 4, '4657896233', 'Gustavo Adolfo Cárdenas Messa', ' ', 'gcardenas@uceva.edu.co\n', '$2y$10$N.DsLvMgboXPSZGPO34DCuj8AMGn177TkeRK44msedrig2A1hw0v2', 'Activo', NULL, '2020-05-29 05:53:52', '2020-05-29 11:07:55');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `votaciones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_candidato` int(11) NOT NULL,
  `fecha_hora` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_votacion_candidato_idx` (`id_candidato`),
  CONSTRAINT `fk_votacion_candidato` FOREIGN KEY (`id_candidato`) REFERENCES `candidatos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*!40000 ALTER TABLE `votaciones` DISABLE KEYS */;
REPLACE INTO `votaciones` (`id`, `id_candidato`, `fecha_hora`, `created_at`, `updated_at`) VALUES
	(7, 42, '2020-05-29 01:19:02', '2020-05-29 01:19:02', '2020-05-29 01:19:02'),
	(8, 44, '2020-05-29 09:06:57', '2020-05-29 09:06:57', '2020-05-29 09:06:57'),
	(9, 46, '2020-05-29 09:49:42', '2020-05-29 09:49:42', '2020-05-29 09:49:42'),
	(10, 48, '2020-05-29 11:14:39', '2020-05-29 11:14:39', '2020-05-29 11:14:39'),
	(11, 48, '2020-05-29 11:19:01', '2020-05-29 11:19:01', '2020-05-29 11:19:01'),
	(12, 49, '2020-05-29 11:19:59', '2020-05-29 11:19:59', '2020-05-29 11:19:59'),
	(13, 49, '2020-05-29 11:21:11', '2020-05-29 11:21:11', '2020-05-29 11:21:11'),
	(14, 47, '2020-05-29 11:23:21', '2020-05-29 11:23:21', '2020-05-29 11:23:21'),
	(15, 49, '2020-05-29 11:23:28', '2020-05-29 11:23:28', '2020-05-29 11:23:28'),
	(16, 48, '2020-05-29 11:24:57', '2020-05-29 11:24:57', '2020-05-29 11:24:57'),
	(17, 48, '2020-05-29 12:52:38', '2020-05-29 12:52:38', '2020-05-29 12:52:38'),
	(18, 47, '2020-05-29 13:08:11', '2020-05-29 13:08:11', '2020-05-29 13:08:11'),
	(19, 47, '2020-05-30 09:25:02', '2020-05-30 09:25:02', '2020-05-30 09:25:02');
/*!40000 ALTER TABLE `votaciones` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
