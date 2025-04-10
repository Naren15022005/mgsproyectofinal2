-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-04-2025 a las 03:07:08
-- Versión del servidor: 9.0.1
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `msgproyectofinal2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('categorias_flujos', 'O:39:\"Illuminate\\Database\\Eloquent\\Collection\":2:{s:8:\"\0*\0items\";a:4:{i:0;O:29:\"App\\Models\\CategoriaFlujosIEs\":30:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:21:\"categoria_flujos_i_es\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:5:{s:2:\"id\";i:1;s:6:\"nombre\";s:7:\"Salario\";s:11:\"descripcion\";s:19:\"Ingreso por salario\";s:10:\"created_at\";N;s:10:\"updated_at\";N;}s:11:\"\0*\0original\";a:5:{s:2:\"id\";i:1;s:6:\"nombre\";s:7:\"Salario\";s:11:\"descripcion\";s:19:\"Ingreso por salario\";s:10:\"created_at\";N;s:10:\"updated_at\";N;}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:2:{i:0;s:6:\"nombre\";i:1;s:11:\"descripcion\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}i:1;O:29:\"App\\Models\\CategoriaFlujosIEs\":30:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:21:\"categoria_flujos_i_es\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:5:{s:2:\"id\";i:2;s:6:\"nombre\";s:5:\"Venta\";s:11:\"descripcion\";s:30:\"Ingreso por venta de productos\";s:10:\"created_at\";N;s:10:\"updated_at\";N;}s:11:\"\0*\0original\";a:5:{s:2:\"id\";i:2;s:6:\"nombre\";s:5:\"Venta\";s:11:\"descripcion\";s:30:\"Ingreso por venta de productos\";s:10:\"created_at\";N;s:10:\"updated_at\";N;}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:2:{i:0;s:6:\"nombre\";i:1;s:11:\"descripcion\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}i:2;O:29:\"App\\Models\\CategoriaFlujosIEs\":30:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:21:\"categoria_flujos_i_es\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:5:{s:2:\"id\";i:3;s:6:\"nombre\";s:6:\"Compra\";s:11:\"descripcion\";s:30:\"Egreso por compra de productos\";s:10:\"created_at\";N;s:10:\"updated_at\";N;}s:11:\"\0*\0original\";a:5:{s:2:\"id\";i:3;s:6:\"nombre\";s:6:\"Compra\";s:11:\"descripcion\";s:30:\"Egreso por compra de productos\";s:10:\"created_at\";N;s:10:\"updated_at\";N;}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:2:{i:0;s:6:\"nombre\";i:1;s:11:\"descripcion\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}i:3;O:29:\"App\\Models\\CategoriaFlujosIEs\":30:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:21:\"categoria_flujos_i_es\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:5:{s:2:\"id\";i:4;s:6:\"nombre\";s:8:\"Servicio\";s:11:\"descripcion\";s:20:\"Egreso por servicios\";s:10:\"created_at\";N;s:10:\"updated_at\";N;}s:11:\"\0*\0original\";a:5:{s:2:\"id\";i:4;s:6:\"nombre\";s:8:\"Servicio\";s:11:\"descripcion\";s:20:\"Egreso por servicios\";s:10:\"created_at\";N;s:10:\"updated_at\";N;}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:2:{i:0;s:6:\"nombre\";i:1;s:11:\"descripcion\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}', 1744298277),
('spatie.permission.cache', 'a:3:{s:5:\"alias\";a:4:{s:1:\"a\";s:2:\"id\";s:1:\"b\";s:4:\"name\";s:1:\"c\";s:10:\"guard_name\";s:1:\"r\";s:5:\"roles\";}s:11:\"permissions\";a:17:{i:0;a:4:{s:1:\"a\";i:1;s:1:\"b\";s:18:\"gestionar usuarios\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:1;a:4:{s:1:\"a\";i:2;s:1:\"b\";s:18:\"gestionar clientes\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:2;a:4:{s:1:\"a\";i:3;s:1:\"b\";s:19:\"gestionar productos\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:3;a:4:{s:1:\"a\";i:4;s:1:\"b\";s:18:\"gestionar ingresos\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:4;a:4:{s:1:\"a\";i:5;s:1:\"b\";s:17:\"gestionar egresos\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:5;a:4:{s:1:\"a\";i:6;s:1:\"b\";s:12:\"ver informes\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:6;a:4:{s:1:\"a\";i:7;s:1:\"b\";s:15:\"gestionar pagos\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:2;}}i:7;a:4:{s:1:\"a\";i:8;s:1:\"b\";s:15:\"programar citas\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:2;}}i:8;a:4:{s:1:\"a\";i:9;s:1:\"b\";s:12:\"ver clientes\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:9;a:4:{s:1:\"a\";i:10;s:1:\"b\";s:17:\"gestionar rutinas\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:10;a:4:{s:1:\"a\";i:11;s:1:\"b\";s:16:\"programar clases\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:11;a:4:{s:1:\"a\";i:12;s:1:\"b\";s:10:\"ver perfil\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:3;i:1;i:4;}}i:12;a:4:{s:1:\"a\";i:13;s:1:\"b\";s:11:\"ver rutinas\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:4;}}i:13;a:4:{s:1:\"a\";i:14;s:1:\"b\";s:10:\"ver clases\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:4;}}i:14;a:3:{s:1:\"a\";i:15;s:1:\"b\";s:15:\"gestionar roles\";s:1:\"c\";s:3:\"web\";}i:15;a:4:{s:1:\"a\";i:16;s:1:\"b\";s:16:\"generar informes\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:16;a:4:{s:1:\"a\";i:17;s:1:\"b\";s:13:\"ver productos\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}}s:5:\"roles\";a:4:{i:0;a:3:{s:1:\"a\";i:1;s:1:\"b\";s:13:\"administrador\";s:1:\"c\";s:3:\"web\";}i:1;a:3:{s:1:\"a\";i:2;s:1:\"b\";s:13:\"recepcionista\";s:1:\"c\";s:3:\"web\";}i:2;a:3:{s:1:\"a\";i:3;s:1:\"b\";s:10:\"instructor\";s:1:\"c\";s:3:\"web\";}i:3;a:3:{s:1:\"a\";i:4;s:1:\"b\";s:7:\"cliente\";s:1:\"c\";s:3:\"web\";}}}', 1744298279);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `caja_dia`
--

CREATE TABLE `caja_dia` (
  `id` bigint UNSIGNED NOT NULL,
  `fecha` date NOT NULL,
  `monto_inicial` decimal(10,2) NOT NULL,
  `monto_final` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias_productos`
--

CREATE TABLE `categorias_productos` (
  `id` bigint UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `categorias_productos`
--

INSERT INTO `categorias_productos` (`id`, `nombre`, `descripcion`, `created_at`, `updated_at`) VALUES
(1, 'herramientas de entrenamiento', NULL, NULL, NULL),
(2, 'Ropa', NULL, NULL, NULL),
(3, 'Suplementos nutricionales', NULL, NULL, NULL),
(4, 'Hidratacion y bebidas', NULL, NULL, NULL),
(5, 'Accesorios', NULL, NULL, NULL),
(6, 'Equipamiento de entrenamiento', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria_flujos_i_es`
--

CREATE TABLE `categoria_flujos_i_es` (
  `id` bigint UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `categoria_flujos_i_es`
--

INSERT INTO `categoria_flujos_i_es` (`id`, `nombre`, `descripcion`, `created_at`, `updated_at`) VALUES
(1, 'Salario', 'Ingreso por salario', NULL, NULL),
(2, 'Venta', 'Ingreso por venta de productos', NULL, NULL),
(3, 'Compra', 'Egreso por compra de productos', NULL, NULL),
(4, 'Servicio', 'Egreso por servicios', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` bigint UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellido` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `direccion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `genero` enum('masculino','femenino','otro') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `nombre`, `apellido`, `email`, `telefono`, `direccion`, `fecha_nacimiento`, `genero`, `created_at`, `updated_at`) VALUES
(1, 'camilo andres', 'perezc', 'camiloperez@gmail.com', '2534532434', 'casaverdosa', '2025-01-08', 'masculino', '2025-01-09 08:36:23', '2025-01-09 08:52:59'),
(2, 'samuel', 'navarro', 'samuelnavarroch@gmail.com', '4352345345', 'casaroja', '2010-03-03', 'masculino', '2025-01-26 05:15:33', '2025-01-26 05:15:33'),
(3, 'Samanta Saray', 'Pedroza esquivel', 'samanta@gmail.com', '23123423434', 'allaensucasa', '1989-02-15', 'otro', '2025-02-01 10:37:01', '2025-02-01 10:37:01'),
(4, 'briyith natalia', 'navarro chole', 'briyith@gmail.com', '3205114123', 'cra22#20-45', '2007-08-24', 'femenino', '2025-02-09 03:19:38', '2025-02-09 03:19:38'),
(5, 'julian', 'portillo', 'julianportillogutierrezz@gmail.com', '4352345345', 'casaverdes', '2009-06-12', 'masculino', '2025-04-09 08:28:58', '2025-04-09 08:28:58');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes_registrados`
--

CREATE TABLE `clientes_registrados` (
  `id` bigint UNSIGNED NOT NULL,
  `cliente_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `tipo_membresia_id` bigint UNSIGNED NOT NULL,
  `membresia_id` bigint UNSIGNED NOT NULL,
  `fecha_inicio` date NOT NULL,
  `duracion` int NOT NULL,
  `asistencia` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `clientes_registrados`
--

INSERT INTO `clientes_registrados` (`id`, `cliente_id`, `user_id`, `tipo_membresia_id`, `membresia_id`, `fecha_inicio`, `duracion`, `asistencia`, `created_at`, `updated_at`) VALUES
(1, 1, 6, 0, 6, '2025-01-01', 0, 2, NULL, NULL),
(2, 2, 5, 1, 1, '2025-01-30', 5, 2, NULL, NULL),
(3, 3, 9, 4, 1, '2025-02-01', 365, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comments`
--

CREATE TABLE `comments` (
  `id` bigint UNSIGNED NOT NULL,
  `client_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `configuracions`
--

CREATE TABLE `configuracions` (
  `id` bigint UNSIGNED NOT NULL,
  `site_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_favicon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_slogan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_description` text COLLATE utf8mb4_unicode_ci,
  `email_contact` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_contact` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `business_hours` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `maintenance_mode` tinyint(1) NOT NULL DEFAULT '0',
  `dark_mode` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `configuracions`
--

INSERT INTO `configuracions` (`id`, `site_name`, `site_logo`, `site_favicon`, `site_slogan`, `site_description`, `email_contact`, `phone_contact`, `address`, `business_hours`, `maintenance_mode`, `dark_mode`, `created_at`, `updated_at`) VALUES
(4, 'Muscle Gym Sport', 'logos/W2VFIYdKU4ryWGON2dlBcNhfBkZ4ATJDoRht6vRm.jpg', 'favicons/7qwkmmdamdJGPwxOr2GV5WBWXtf3FAJqMZa0LzRr.jpg', 'hacemos tu vida mas facil, mas sana', NULL, 'MgSport@gmail.com', '3011737645', 'la calle ancha', 'Lun-Vie 8:00 AM - 8:00 PM', 0, 0, '2025-04-05 10:30:54', '2025-04-09 21:10:21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estados_membresia`
--

CREATE TABLE `estados_membresia` (
  `id` bigint UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `estados_membresia`
--

INSERT INTO `estados_membresia` (`id`, `nombre`, `created_at`, `updated_at`) VALUES
(1, 'Activo', NULL, NULL),
(2, 'Inactivo', NULL, NULL),
(3, 'Suspendido', NULL, NULL),
(4, 'Pausa', NULL, NULL),
(5, 'Vencida', NULL, NULL),
(6, 'Sin membresia', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `exercises`
--

CREATE TABLE `exercises` (
  `id` bigint UNSIGNED NOT NULL,
  `programa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ejercicio` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `series` int NOT NULL,
  `repeticiones` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `exercises`
--

INSERT INTO `exercises` (`id`, `programa`, `ejercicio`, `series`, `repeticiones`, `created_at`, `updated_at`) VALUES
(1, 'Ayuda para principiantes', 'Sentadillas con peso corporal', 3, 12, '2025-04-07 05:00:05', '2025-04-07 05:00:05'),
(2, 'Ayuda para principiantes', 'Flexiones de rodillas', 3, 10, '2025-04-07 05:00:05', '2025-04-07 05:00:05'),
(3, 'Ayuda para principiantes', 'Plancha abdominal', 3, 30, '2025-04-07 05:00:05', '2025-04-07 05:00:05'),
(4, 'Ayuda para principiantes', 'Elevaciones de talón', 3, 15, '2025-04-07 05:00:05', '2025-04-07 05:00:05'),
(5, 'Ayuda para principiantes', 'Puentes de glúteo', 3, 12, '2025-04-07 05:00:05', '2025-04-07 05:00:05'),
(6, 'Entrenamiento avanzado', 'Sentadilla con barra', 4, 8, '2025-04-07 05:00:05', '2025-04-07 05:00:05'),
(7, 'Entrenamiento avanzado', 'Peso muerto', 4, 8, '2025-04-07 05:00:05', '2025-04-07 05:00:05'),
(8, 'Entrenamiento avanzado', 'Press de banca', 4, 10, '2025-04-07 05:00:05', '2025-04-07 05:00:05'),
(9, 'Entrenamiento avanzado', 'Dominadas', 4, 6, '2025-04-07 05:00:05', '2025-04-07 05:00:05'),
(10, 'Entrenamiento avanzado', 'Fondos en paralelas', 4, 8, '2025-04-07 05:00:05', '2025-04-07 05:00:05'),
(11, 'Pérdida de peso', 'Burpees', 4, 15, '2025-04-07 05:00:05', '2025-04-07 05:00:05'),
(12, 'Pérdida de peso', 'Saltar la cuerda', 4, 30, '2025-04-07 05:00:05', '2025-04-07 05:00:05'),
(13, 'Pérdida de peso', 'Mountain climbers', 4, 20, '2025-04-07 05:00:05', '2025-04-07 05:00:05'),
(14, 'Pérdida de peso', 'Zancadas alternas', 4, 12, '2025-04-07 05:00:05', '2025-04-07 05:00:05'),
(15, 'Pérdida de peso', 'Jump Squats', 4, 10, '2025-04-07 05:00:05', '2025-04-07 05:00:05'),
(16, 'Sin equipo', 'Flexiones de brazos', 4, 15, '2025-04-07 05:00:05', '2025-04-07 05:00:05'),
(17, 'Sin equipo', 'Sentadilla isométrica', 3, 30, '2025-04-07 05:00:05', '2025-04-07 05:00:05'),
(18, 'Sin equipo', 'Abdominales bicicleta', 4, 20, '2025-04-07 05:00:05', '2025-04-07 05:00:05'),
(19, 'Sin equipo', 'Saltos de tijera', 4, 30, '2025-04-07 05:00:05', '2025-04-07 05:00:05'),
(20, 'Sin equipo', 'Plancha lateral', 3, 30, '2025-04-07 05:00:05', '2025-04-07 05:00:05'),
(21, 'Entrenamiento de fuerza', 'Peso muerto', 5, 5, '2025-04-07 05:00:05', '2025-04-07 05:00:05'),
(22, 'Entrenamiento de fuerza', 'Sentadilla con barra', 5, 5, '2025-04-07 05:00:05', '2025-04-07 05:00:05'),
(23, 'Entrenamiento de fuerza', 'Press militar', 5, 5, '2025-04-07 05:00:05', '2025-04-07 05:00:05'),
(24, 'Entrenamiento de fuerza', 'Remo con barra', 5, 5, '2025-04-07 05:00:05', '2025-04-07 05:00:05'),
(25, 'Entrenamiento de fuerza', 'Curl de bíceps con mancuernas', 4, 10, '2025-04-07 05:00:05', '2025-04-07 05:00:05');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `flujos_i_es`
--

CREATE TABLE `flujos_i_es` (
  `id` bigint UNSIGNED NOT NULL,
  `tipo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `monto` decimal(20,2) NOT NULL,
  `descripcion` text COLLATE utf8mb4_unicode_ci,
  `fecha` date NOT NULL,
  `categoria_id` bigint UNSIGNED NOT NULL,
  `usuario_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `flujos_i_es`
--

INSERT INTO `flujos_i_es` (`id`, `tipo`, `monto`, `descripcion`, `fecha`, `categoria_id`, `usuario_id`, `created_at`, `updated_at`) VALUES
(1, 'Egreso', 100000.00, 'Salario mensual', '2025-02-04', 1, 2, '2025-01-07 09:02:18', '2025-04-04 22:17:24'),
(2, 'Ingreso', 2000000.00, 'Compra de suministros', '2023-12-02', 3, 3, '2025-01-07 09:02:18', '2025-01-13 22:41:52'),
(3, 'Ingreso', 60000.00, 'suplemento fisico', '2025-01-10', 2, 2, '2025-01-11 07:53:05', '2025-04-09 23:53:23'),
(4, 'Egreso', 6000000.00, 'compre un pan', '2024-06-11', 3, 2, '2025-01-11 08:04:49', '2025-04-09 23:53:38'),
(6, 'Ingreso', 10000000.00, 'venta de libros de como dormir si tienes sueño', '2025-02-01', 1, 2, '2025-02-01 10:08:45', '2025-04-09 20:40:04'),
(7, 'Ingreso', 10000000.00, 'plata de no se donde', '2025-02-08', 2, 2, '2025-02-09 03:21:45', '2025-04-09 20:30:44'),
(10, 'Ingreso', 5000.00, 'Cierre de caja del día - 09/04/2025', '2025-04-09', 4, 3, '2025-04-09 23:58:06', '2025-04-09 23:58:06'),
(11, 'Ingreso', 25000.00, 'Cierre de caja del día', '2025-04-09', 4, 2, '2025-04-10 00:00:38', '2025-04-10 00:02:14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `membresias`
--

CREATE TABLE `membresias` (
  `id` bigint UNSIGNED NOT NULL,
  `tipo_membresia_id` bigint UNSIGNED NOT NULL,
  `precio` decimal(58,2) NOT NULL,
  `duracion` int NOT NULL,
  `estado` enum('activo','inactivo') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'activo',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `membresias`
--

INSERT INTO `membresias` (`id`, `tipo_membresia_id`, `precio`, `duracion`, `estado`, `created_at`, `updated_at`) VALUES
(1, 1, 90000.00, 30, 'inactivo', NULL, '2025-01-16 05:07:51'),
(2, 2, 20000.00, 190, 'activo', '2025-01-15 05:24:35', '2025-04-04 22:21:42'),
(4, 4, 1000000.00, 365, 'activo', '2025-02-01 10:41:01', '2025-02-01 10:41:01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `membresia_acceso`
--

CREATE TABLE `membresia_acceso` (
  `id` bigint UNSIGNED NOT NULL,
  `membresia_id` bigint UNSIGNED NOT NULL,
  `acceso_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `membresia_acceso`
--

INSERT INTO `membresia_acceso` (`id`, `membresia_id`, `acceso_id`, `created_at`, `updated_at`) VALUES
(2, 2, 2, NULL, NULL),
(6, 1, 1, NULL, NULL),
(14, 4, 3, NULL, NULL),
(15, 4, 4, NULL, NULL),
(16, 1, 2, NULL, NULL),
(17, 4, 2, NULL, NULL),
(21, 2, 4, NULL, NULL),
(22, 1, 3, NULL, NULL),
(23, 1, 4, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `membresia_opcion_acceso`
--

CREATE TABLE `membresia_opcion_acceso` (
  `id` bigint UNSIGNED NOT NULL,
  `membresia_id` bigint UNSIGNED NOT NULL,
  `opcion_acceso_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_01_06_235511_create_permission_tables', 2),
(5, '2024_12_22_025123_create_clientes_table', 3),
(6, '2024_12_22_025148_create_membresias_table', 3),
(7, '2024_12_22_025634_create_personal_table', 3),
(8, '2024_12_22_061703_create_categoria_flujos_i_es_table', 3),
(9, '2024_12_23_202106_create_categorias_productos_table', 3),
(10, '2024_12_23_202605_create_productos_table', 3),
(11, '2024_12_24_032642_create_flujos_i_es_table', 3),
(12, '2025_01_04_011720_create_ventas_table', 3),
(13, '2025_01_04_140158_add_estado_to_clientes_table', 3),
(14, '2025_01_04_212749_create_clientes_registrados_table', 3),
(15, '2025_01_07_072213_create_role_user_table', 4),
(16, '2025_01_14_020325_create_tipos_de_membresia_table', 5),
(17, '2025_01_14_034030_create_opciones_de_acceso_table', 6),
(18, '2025_01_14_034347_create_membresia_opcion_acceso_table', 7),
(19, '2025_01_14_205528_create_membresias_table', 8),
(20, '2025_01_14_234733_create_membresia_acceso_table', 9),
(21, '2025_01_18_233834_create_clientes_registrados_table', 10),
(22, '2025_01_19_005715_create_clientes_registrados_table', 11),
(23, '2025_01_19_171809_create_estados_membresia_table', 12),
(24, '2025_01_19_173737_create_clientes_registrados_table', 13),
(25, '2025_01_23_163246_add_nombre_usuario_to_clientes_table', 14),
(26, '2025_01_27_160913_add_role_to_users_table', 15),
(27, '2025_01_27_162749_add_role_id_to_users_table', 16),
(28, '2025_01_27_164139_add_role_id_to_users_table', 17),
(29, '2025_01_27_164740_add_role_id_to_users_table', 18),
(30, '2025_01_27_170157_create_roles_table_if_not_exists', 19),
(31, '2025_01_30_221127_create_users_table', 20),
(32, '2025_03_11_023801_create_caja_dia_table', 21),
(33, '2025_04_03_181129_create_users_table', 22),
(34, '2025_04_03_222634_create_comments_table', 23),
(35, '2025_04_04_013828_create_settings_table', 24),
(36, '2025_04_05_012246_create_configuracions_table', 25),
(37, '2025_04_06_222331_create_programas_table', 26),
(38, '2025_04_06_233612_create_programas_table', 27),
(39, '2025_04_06_234525_create_users_programas_table', 28),
(40, '2025_04_06_235032_rename_users_programas_to_registros', 29),
(41, '2025_04_06_235524_create_exercises_table', 30),
(42, '2025_04_07_012432_remove_acceso_incluido_id_from_table', 31);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `model_has_permissions`
--

INSERT INTO `model_has_permissions` (`permission_id`, `model_type`, `model_id`) VALUES
(16, 'App\\Models\\User	', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(1, 'App\\Models\\User', 2),
(2, 'App\\Models\\User', 3),
(4, 'App\\Models\\User', 4),
(4, 'App\\Models\\User', 5),
(4, 'App\\Models\\User', 6),
(4, 'App\\Models\\User', 7),
(2, 'App\\Models\\User', 8),
(4, 'App\\Models\\User', 9),
(4, 'App\\Models\\User', 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `opciones_de_acceso`
--

CREATE TABLE `opciones_de_acceso` (
  `id` bigint UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `opciones_de_acceso`
--

INSERT INTO `opciones_de_acceso` (`id`, `nombre`, `created_at`, `updated_at`) VALUES
(1, 'Acceso a la piscina', '2025-01-15 01:17:06', '2025-01-15 01:17:06'),
(2, 'Acceso al gimnasio', '2025-01-15 01:17:07', '2025-01-15 01:17:07'),
(3, 'Acceso a clases de yoga', '2025-01-15 01:17:07', '2025-01-15 01:17:07'),
(4, 'Acceso a la sauna', '2025-01-15 01:17:07', '2025-01-15 01:17:07');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'gestionar usuarios', 'web', '2025-01-07 05:41:18', '2025-01-07 05:41:18'),
(2, 'gestionar clientes', 'web', '2025-01-07 05:41:18', '2025-01-07 05:41:18'),
(3, 'gestionar productos', 'web', '2025-01-07 05:41:18', '2025-01-07 05:41:18'),
(4, 'gestionar ingresos', 'web', '2025-01-07 05:41:18', '2025-01-07 05:41:18'),
(5, 'gestionar egresos', 'web', '2025-01-07 05:41:18', '2025-01-07 05:41:18'),
(6, 'ver informes', 'web', '2025-01-07 05:41:18', '2025-01-07 05:41:18'),
(7, 'gestionar pagos', 'web', '2025-01-07 05:41:18', '2025-01-07 05:41:18'),
(8, 'programar citas', 'web', '2025-01-07 05:41:18', '2025-01-07 05:41:18'),
(9, 'ver clientes', 'web', '2025-01-07 05:41:18', '2025-01-07 05:41:18'),
(10, 'gestionar rutinas', 'web', '2025-01-07 05:41:18', '2025-01-07 05:41:18'),
(11, 'programar clases', 'web', '2025-01-07 05:41:18', '2025-01-07 05:41:18'),
(12, 'ver perfil', 'web', '2025-01-07 05:41:18', '2025-01-07 05:41:18'),
(13, 'ver rutinas', 'web', '2025-01-07 05:41:18', '2025-01-07 05:41:18'),
(14, 'ver clases', 'web', '2025-01-07 05:41:18', '2025-01-07 05:41:18'),
(15, 'gestionar roles', 'web', '2025-01-07 05:45:19', '2025-01-07 05:45:19'),
(16, 'generar informes', 'web', '2025-01-07 07:58:23', '2025-01-07 07:58:23'),
(17, 'ver productos', 'web', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personals`
--

CREATE TABLE `personals` (
  `id` bigint UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellido` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `direccion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `puesto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `salario` decimal(8,2) NOT NULL,
  `fecha_contratacion` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` bigint UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8mb4_unicode_ci,
  `precio` decimal(10,2) NOT NULL,
  `stock` int NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT '0',
  `categoria_id` bigint UNSIGNED NOT NULL,
  `imagen` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `descripcion`, `precio`, `stock`, `estado`, `categoria_id`, `imagen`, `created_at`, `updated_at`) VALUES
(1, 'balon', 'balon Grande', 40000.00, 38, 0, 5, 'balon-1744158545.jpeg', '2025-01-12 04:16:19', '2025-04-10 03:45:11'),
(2, 'barra', 'barra de 1,5m', 50000.00, 18, 1, 1, 'barra-1744158499.jpeg', '2025-01-13 23:23:55', '2025-04-09 18:55:57'),
(3, 'Set 2 Pesas Hexagonales', 'Mancuerna Hx 10kg', 90000.00, 48, 1, 6, 'libros-bipolares-1744158419.jpeg', '2025-02-01 10:32:16', '2025-04-09 08:26:50'),
(4, 'kreatina Platinum', 'Pote 400g', 30000.00, 30, 1, 3, 'kreatina-platinum-1744158464.jpeg', '2025-04-08 08:20:18', '2025-04-09 05:27:44'),
(5, 'Mancuerna', 'Mancuerna 24Kg', 30000.00, 19, 1, 1, 'mancuerna-1744158108.jpeg', '2025-04-09 05:21:48', '2025-04-09 05:21:48');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `programas`
--

CREATE TABLE `programas` (
  `id` bigint UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `programas`
--

INSERT INTO `programas` (`id`, `nombre`, `created_at`, `updated_at`) VALUES
(1, 'Ayuda para principiantes', '2025-04-07 04:37:29', '2025-04-07 04:37:29'),
(2, 'Entrenamiento avanzado', '2025-04-07 04:37:29', '2025-04-07 04:37:29'),
(3, 'Entrenamiento de fuerza', '2025-04-07 04:37:29', '2025-04-07 04:37:29'),
(4, 'Pérdida de peso', '2025-04-07 04:37:29', '2025-04-07 04:37:29'),
(5, 'Sin equipo', '2025-04-07 04:37:29', '2025-04-07 04:37:29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registros`
--

CREATE TABLE `registros` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `programa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `registros`
--

INSERT INTO `registros` (`id`, `name`, `email`, `programa`, `created_at`, `updated_at`) VALUES
(3, 'Maria', 'mq451180@gmail.com', 'Entrenamiento avanzado', '2025-04-07 04:52:46', '2025-04-07 04:52:46'),
(4, 'julian', 'julianportillogutierrezz@gmail.com', 'Pérdida de peso', NULL, NULL),
(5, 'maria', 'mariacamiladuranquintero1@gmail.com', 'Ayuda para principiantes', NULL, NULL),
(6, 'samuel', 'samuelnavarroch@gmail.com', 'Ayuda para principiantes', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'administrador', 'web', '2025-01-07 05:41:18', '2025-01-07 05:41:18'),
(2, 'recepcionista', 'web', '2025-01-07 07:58:23', '2025-01-07 07:58:23'),
(3, 'instructor', 'web', '2025-01-07 08:06:57', '2025-01-07 08:06:57'),
(4, 'cliente', 'web', '2025-01-07 08:06:57', '2025-01-07 08:06:57');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(16, 1),
(17, 1),
(2, 2),
(3, 2),
(4, 2),
(5, 2),
(7, 2),
(8, 2),
(16, 2),
(17, 2),
(9, 3),
(10, 3),
(11, 3),
(12, 3),
(12, 4),
(13, 4),
(14, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `role_user`
--

CREATE TABLE `role_user` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `role_user`
--

INSERT INTO `role_user` (`id`, `user_id`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 5, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('0LyIy9S6stDnKHNmZ4eZnqk9sERYbrlRl6dAbQks', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36 Edg/135.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiV0tGUFVmcU93aURzMVgyU2tVdExvMDlLN1J0Q29jSmtFQjBTUk9jOSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9hcGkvcHJvZHVjdG9zIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1744237186),
('25Q46murJHeAUHhlEK3kZNd3r8w0rtxjU0ljcrz4', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36 Edg/135.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiU1g5b005NTVOcEN5OURXaWo4NDN0ZlAzNVdoUGFEbmtZdEtWS1FFdSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9hcGkvcHJvZHVjdG9zIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1744239065),
('4hNUnkElDylOweSSjQAeA4CcFUOzP6NnTJjV8F6W', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36 Edg/135.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMk1ZeWQ5MDg1N0ZEYW5UeUMyaUJ2RGVKSFJQZ1JHNFFaYjI2RHlydyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9hcGkvcHJvZHVjdG9zIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1744239276),
('5R0qu0yM2rPLvZH7MNkqKKcV3M2erq93irISEZAn', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36 Edg/135.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiM1cwNkxBY1lkVVR5QWxNaUJWMjJCUUxOaUMyOUFYVFlLOWR4UlFKayI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9hcGkvcHJvZHVjdG9zIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1744238689),
('9A4Y4tQMplJL3eyV5nhllKYj0xXcPyKEY3PKU7zo', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36 Edg/135.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZ0Q3SmtKTzJlUGd1QUFEQWhTNzJCNnBZbHhpUzN5UGdJQjBkN25tNyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9hcGkvcHJvZHVjdG9zIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1744236216),
('9sLRM7rE8tz2WOEM8MyAI4wUMlrzFlfOFNuTqwmJ', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36 Edg/135.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUVo0MlZoUVFzcXRoVVpYM0Q2M2NwTExDdFpDNHo1TlJtYVc1MmdNSyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9hcGkvcHJvZHVjdG9zIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1744239065),
('AxFiQZSzFShSFmW6c8yV9jJDYlGBuiqpSisiPImf', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36 Edg/135.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiY2lqZUI0YTFDc2xqOWVuVGE0a0t3aWVPWDdzanJZYW9PMzFwVk1xZSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9hcGkvcHJvZHVjdG9zIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1744236219),
('b16iVWLSjp4CddD4Z4T8MT8hYlRprXadodKZKkHl', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36 Edg/135.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiT1NMemh6SDZmVTJGUGNoY094ekphM1YxTnBNdVd1cDFhaTlMYUpZUiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fX0=', 1744239624),
('bfjliMmZ6P6Pw3gD7wNfUFdcSEqMXGIbT3RBm7EO', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36 Edg/135.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiamp2RXZLNlh2clVwR3oyWXc1eGxzbGh5WDdkQnVPcEswNmYySzdzZCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9hcGkvcHJvZHVjdG9zIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1744237190),
('Cq1oqhwowzm7TI07Ja0lbJwIVAA1GUlCuSsaGuur', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36 Edg/135.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiN05yS0xnS3NTNkJnalM3WlVrV3lNZXJnelh3SlZPbVdoQlBSb1RUQSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9hcGkvcHJvZHVjdG9zIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1744237136),
('EsSl6kZEyabj4vetm7MwjNkYwrqmUOIzUV0eNh0n', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36 Edg/135.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoick11VzkwN0NxYTl3Q2dxd3JSRVZXMFhVQno5QjdBSVRoV1pyV0VUcCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9hcGkvcHJvZHVjdG9zIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1744238689),
('fh8hOyWdtywTUk56i2khKTs4YnCxWmHqAHcA7CrC', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36 Edg/135.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoic1pWRmpzV3ZBTGhySDAyZ1JEckFJU3VJSWw5eE01T1lKRDBJTkRYdyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9hcGkvcHJvZHVjdG9zIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1744236442),
('FMT4QyfwWi6oJMsa7hVsH27ikv4kWyNN49ezLARR', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36 Edg/135.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiakRWZ2p4UmtMUTJXandESVlwYjRBWmZieXQyNlVVQ0hqbWI4NmlSWCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9hcGkvcHJvZHVjdG9zIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1744238852),
('fNlhpA545zvRx4VWSUGOe0EaaJmeuSaeymUaRZR3', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36 Edg/135.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiM2xZeUdQZk9vQUNUdHdlOERPa0owSUs1WU5nZG1LanpQb0p0NVBKSyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9hcGkvcHJvZHVjdG9zIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1744239322),
('gGmGAqLIy3GtcmhjTDcFFPUUw3ZBoMRXu0UTY1BR', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36 Edg/135.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSGRsaFp0d0RZODY3dEwyNWNQY09YaW9mZGFhRkhFdkJPRFhHbFl2TSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9hcGkvcHJvZHVjdG9zIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1744237185),
('gmBQSdeKEEV9PiZZoHHI8jLVoUPnAZIpCM48rpI6', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36 Edg/135.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiS2NFRWJFd1BISkF3TW85VjlZeHdGOFgzcG9CV3Q3VjlFN0xISlR0VyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9hcGkvcHJvZHVjdG9zIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1744238866),
('kZUGvzHjcHQcX8QnBHGcGRM6vZlDV0ohsDK7njdk', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36 Edg/135.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMEFpNTUwbGJwR0FkYTBMWjdacFZBU21YMFFIcGNWQlNSU2lKT1d6OCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9hcGkvcHJvZHVjdG9zIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1744237135),
('LRW7ahbiveSto00lSS9nbx8uwOg10oyzYfalBV1o', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36 Edg/135.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidnlvTzhnMjhLb2JaZVVrTTNFZ2FuWFdnSVJnd0lOdXhwZjdra0NpWSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbiI7fX0=', 1744225673),
('mAUnP8bTlbIs5l5gZgMdbyqDRYpfqEvHFhRJkG2u', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36 Edg/135.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiV3A4STJrckpzZkxvNDdkZjRnNUIxUnBqNnllREh3b015alQxNUVwaCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9hcGkvcHJvZHVjdG9zIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1744238663),
('NdVYiFq9AKS98dGLeOJUQ7GbJNqkZmDkIrKwECLZ', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36 Edg/135.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiS1pOdTdMN0xFNGhxRXB3dXZXVHFlWjczTDA5aHJUVGYwY2dxZGVyTCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9hcGkvcHJvZHVjdG9zIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1744238662),
('OG2GZtUgY6Mt5KD7QYCMb8rn2v37WKvQ1spEDKle', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36 Edg/135.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiOWdOWXR3M2NJNnZjc1ZxcUNyaGtxd3prR3NEWmh0ajdpRmIwWmk1WSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9hcGkvcHJvZHVjdG9zIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1744237238),
('RYPpLiBDDeNQaf9IiTnV2KTIEjkWCYm4JuNh1UJV', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36 Edg/135.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiYTFnVW52ZVk0TVc1NkJSYUxQYWthN2xLMFFxU0VRRFQzQVBBRWNtNiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9hcGkvcHJvZHVjdG9zIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1744239322),
('Sn2fcVv3rRgO8glT1F7pyF2Ki6KzOZ07mbv2mMbG', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36 Edg/135.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWHpWNEhNOVBnRDN1eHRhUmh4bDR2YlRWRWFESU0zb3FZZWpkYkNOWiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9hcGkvcHJvZHVjdG9zIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1744236441),
('SUEL4VmjNYGFN76Mx6LDneEVWQvW9HMLFT7FHLl6', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36 Edg/135.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoielB6T09FYlJVeXE2SHA5OWdQdUxmZ0R2dGgyOHFXbTFTMVo5ckczeSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9hcGkvcHJvZHVjdG9zIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1744238960),
('t5zB5IQ6DRomoTd4YS7Eoq1DG8itvOvavILceIPZ', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36 Edg/135.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZnlMaEZHYnVTdEJLbk1FbEhEQWhsUmQyVktSOVgzaDFYeDZYMTVaQSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9hcGkvcHJvZHVjdG9zIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1744238865),
('uDlUc1ox9uxEmPKkdtcwxxXmiZZ3G7U9XkBU4vAe', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36 Edg/135.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNFJVOURwTDFPZzJ0bW9GYVBGQk5SbVR0S3gxa3pnNzJhMzdRSmduTyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9hcGkvcHJvZHVjdG9zIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1744238852),
('vKShbX4MWgQmzFbNDIeMLZOecapM02sadpqxKBo9', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36 Edg/135.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMnhPSjdRa1VlWFU5eTM5RmVtRzIzak1iMXNnSExuOXhlWGpPb3ZJUyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9hcGkvcHJvZHVjdG9zIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1744239275),
('xBre9v3ws2H0NEOlImWr98aWEhi4VvRdAPcpCmpN', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36 Edg/135.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMWcxYWNWODRxazdYeUpPZDFQZnBGYXExbFl6ekt4VXY2NnNhak12WiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9hcGkvcHJvZHVjdG9zIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1744238960),
('xjAHAYjEsJp0Hyo1lnhkjRgGkfDYBNZHN88w2TlS', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36 Edg/135.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMHJGRkhsa251QldpUGJNWWIyTzNuSmJQblluS2czemdBY3o3eVVwdiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9hcGkvcHJvZHVjdG9zIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1744237237),
('zvweaKMLOzRJ9KMwQ0MXQC4IlqFAJBXPEmvxsPII', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36 Edg/135.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiYUNqaVpodUNNV1JWY2pRSzVNdmpmdGlWU3hMbmtpY1N2R0M0N2QyUSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9hcGkvcHJvZHVjdG9zIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1744237190);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_de_membresia`
--

CREATE TABLE `tipos_de_membresia` (
  `id` bigint UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tipos_de_membresia`
--

INSERT INTO `tipos_de_membresia` (`id`, `nombre`, `created_at`, `updated_at`) VALUES
(0, 'Corriente', NULL, NULL),
(1, 'Plan Básico', NULL, NULL),
(2, 'Plan medio', NULL, NULL),
(3, 'Plan Premium', NULL, NULL),
(4, 'VIP', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL DEFAULT '2',
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role_id`, `foto`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Test User', 'test@example.com', '2025-04-04 00:01:48', '$2y$12$WXY6tepL4Ve2o1Pt0vR7BOqNCkZ1F9MxJRxbfJZbf9ZLDtj.XqrRy', 2, NULL, '6y66qEoZ1r', '2025-04-04 00:01:48', '2025-04-04 00:01:48'),
(2, 'Administrador', 'admin@example.com', NULL, '$2y$12$8CAl3ZEIGxbj06LYZc52NeQaZ30e4o..tg17mUJ2KafppeSSbJvk6', 1, NULL, NULL, '2025-04-04 00:01:49', '2025-04-04 00:01:49'),
(3, 'Recepcionista', 'recepcionista@example.com', NULL, '$2y$12$MwhI7lo7ELc.tDsthPfrZ.YreTu5t9MzaLk56fP/6.XDposljrhsK', 2, NULL, NULL, '2025-04-04 00:01:49', '2025-04-04 00:01:49'),
(4, 'naren', 'alfonsonavarroch@gmail.com', NULL, '$2b$10$6NfBIpG8AH.6Lc9rA5QS1.PKG3tzIkrEjyJR8/zkgapbmvU7TdyKK', 4, '/uploads/1743710217367.jpeg', NULL, NULL, NULL),
(5, 'julian portillo', 'julianportillogutierrezz@gmail.com', NULL, '$2b$10$Ns1wpK6mwTUK.QNLALzjyeW4Wlv9phmbUTMcOemm5LY6Sho5V7FMC', 4, '/uploads/1743719827796.jpg', NULL, NULL, NULL),
(7, 'maria', 'mariacamiladuranquintero1@gmail.com', NULL, '$2b$10$BNKZSqv9txIFZIxGoG.JreinNXl2tI0.E..njFLZToidfYgN7EvCO', 4, '/uploads/1744214138254.jpeg', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id` bigint UNSIGNED NOT NULL,
  `producto_id` bigint UNSIGNED NOT NULL,
  `cliente_id` bigint UNSIGNED DEFAULT NULL,
  `cantidad` int NOT NULL,
  `precio_total` decimal(10,2) NOT NULL,
  `fecha_venta` date NOT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indices de la tabla `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indices de la tabla `caja_dia`
--
ALTER TABLE `caja_dia`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `categorias_productos`
--
ALTER TABLE `categorias_productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `categoria_flujos_i_es`
--
ALTER TABLE `categoria_flujos_i_es`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `clientes_email_unique` (`email`);

--
-- Indices de la tabla `clientes_registrados`
--
ALTER TABLE `clientes_registrados`
  ADD PRIMARY KEY (`id`),
  ADD KEY `clientes_registrados_tipo_membresia_id_foreign` (`tipo_membresia_id`),
  ADD KEY `clientes_registrados_asistencia_foreign` (`asistencia`),
  ADD KEY `clientes_registrados_membresia_id_foreign` (`membresia_id`),
  ADD KEY `cliente_id` (`cliente_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indices de la tabla `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `configuracions`
--
ALTER TABLE `configuracions`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `estados_membresia`
--
ALTER TABLE `estados_membresia`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `exercises`
--
ALTER TABLE `exercises`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `flujos_i_es`
--
ALTER TABLE `flujos_i_es`
  ADD PRIMARY KEY (`id`),
  ADD KEY `flujos_i_es_categoria_id_foreign` (`categoria_id`),
  ADD KEY `flujos_i_es_user_id_foreign` (`usuario_id`);

--
-- Indices de la tabla `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indices de la tabla `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `membresias`
--
ALTER TABLE `membresias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `membresias_tipo_membresia_id_foreign` (`tipo_membresia_id`);

--
-- Indices de la tabla `membresia_acceso`
--
ALTER TABLE `membresia_acceso`
  ADD PRIMARY KEY (`id`),
  ADD KEY `membresia_acceso_membresia_id_foreign` (`membresia_id`),
  ADD KEY `membresia_acceso_acceso_id_foreign` (`acceso_id`);

--
-- Indices de la tabla `membresia_opcion_acceso`
--
ALTER TABLE `membresia_opcion_acceso`
  ADD PRIMARY KEY (`id`),
  ADD KEY `membresia_opcion_acceso_membresia_id_foreign` (`membresia_id`),
  ADD KEY `membresia_opcion_acceso_opcion_acceso_id_foreign` (`opcion_acceso_id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indices de la tabla `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indices de la tabla `opciones_de_acceso`
--
ALTER TABLE `opciones_de_acceso`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indices de la tabla `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indices de la tabla `personals`
--
ALTER TABLE `personals`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personals_email_unique` (`email`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `productos_categoria_id_foreign` (`categoria_id`);

--
-- Indices de la tabla `programas`
--
ALTER TABLE `programas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `registros`
--
ALTER TABLE `registros`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_programas_email_unique` (`email`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indices de la tabla `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indices de la tabla `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_user_user_id_foreign` (`user_id`),
  ADD KEY `role_user_role_id_foreign` (`role_id`);

--
-- Indices de la tabla `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indices de la tabla `tipos_de_membresia`
--
ALTER TABLE `tipos_de_membresia`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ventas_producto_id_foreign` (`producto_id`),
  ADD KEY `ventas_cliente_id_foreign` (`cliente_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `caja_dia`
--
ALTER TABLE `caja_dia`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `categorias_productos`
--
ALTER TABLE `categorias_productos`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `categoria_flujos_i_es`
--
ALTER TABLE `categoria_flujos_i_es`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `clientes_registrados`
--
ALTER TABLE `clientes_registrados`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `configuracions`
--
ALTER TABLE `configuracions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `estados_membresia`
--
ALTER TABLE `estados_membresia`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `exercises`
--
ALTER TABLE `exercises`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `flujos_i_es`
--
ALTER TABLE `flujos_i_es`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `membresias`
--
ALTER TABLE `membresias`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `membresia_acceso`
--
ALTER TABLE `membresia_acceso`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `membresia_opcion_acceso`
--
ALTER TABLE `membresia_opcion_acceso`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT de la tabla `opciones_de_acceso`
--
ALTER TABLE `opciones_de_acceso`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `personals`
--
ALTER TABLE `personals`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `programas`
--
ALTER TABLE `programas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `registros`
--
ALTER TABLE `registros`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tipos_de_membresia`
--
ALTER TABLE `tipos_de_membresia`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `clientes_registrados`
--
ALTER TABLE `clientes_registrados`
  ADD CONSTRAINT `clientes_registrados_asistencia_foreign` FOREIGN KEY (`asistencia`) REFERENCES `membresias` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `clientes_registrados_ibfk_1` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `clientes_registrados_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `clientes_registrados_membresia_id_foreign` FOREIGN KEY (`membresia_id`) REFERENCES `estados_membresia` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `clientes_registrados_tipo_membresia_id_foreign` FOREIGN KEY (`tipo_membresia_id`) REFERENCES `tipos_de_membresia` (`id`);

--
-- Filtros para la tabla `flujos_i_es`
--
ALTER TABLE `flujos_i_es`
  ADD CONSTRAINT `flujos_i_es_categoria_id_foreign` FOREIGN KEY (`categoria_id`) REFERENCES `categoria_flujos_i_es` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `flujos_i_es_user_id_foreign` FOREIGN KEY (`usuario_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `membresias`
--
ALTER TABLE `membresias`
  ADD CONSTRAINT `membresias_tipo_membresia_id_foreign` FOREIGN KEY (`tipo_membresia_id`) REFERENCES `tipos_de_membresia` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `membresia_acceso`
--
ALTER TABLE `membresia_acceso`
  ADD CONSTRAINT `membresia_acceso_acceso_id_foreign` FOREIGN KEY (`acceso_id`) REFERENCES `opciones_de_acceso` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `membresia_acceso_membresia_id_foreign` FOREIGN KEY (`membresia_id`) REFERENCES `membresias` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `membresia_opcion_acceso`
--
ALTER TABLE `membresia_opcion_acceso`
  ADD CONSTRAINT `membresia_opcion_acceso_membresia_id_foreign` FOREIGN KEY (`membresia_id`) REFERENCES `tipos_de_membresia` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `membresia_opcion_acceso_opcion_acceso_id_foreign` FOREIGN KEY (`opcion_acceso_id`) REFERENCES `opciones_de_acceso` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_ibfk_1` FOREIGN KEY (`model_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_ibfk_1` FOREIGN KEY (`model_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_categoria_id_foreign` FOREIGN KEY (`categoria_id`) REFERENCES `categorias_productos` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `ventas_cliente_id_foreign` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `ventas_producto_id_foreign` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
