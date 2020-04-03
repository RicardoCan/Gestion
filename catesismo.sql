/*
Navicat MySQL Data Transfer

Source Server         : Wamp
Source Server Version : 50721
Source Host           : 127.0.0.1:3306
Source Database       : catesismo

Target Server Type    : MYSQL
Target Server Version : 50721
File Encoding         : 65001

Date: 2020-04-02 21:27:10
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for alumnos
-- ----------------------------
DROP TABLE IF EXISTS `alumnos`;
CREATE TABLE `alumnos` (
  `id_nombres` varchar(20) NOT NULL,
  `apellidos` varchar(15) DEFAULT NULL,
  `edad` varchar(10) DEFAULT NULL,
  `grupo` varchar(1) DEFAULT NULL,
  `encargado` varchar(30) DEFAULT NULL,
  `activo` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id_nombres`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of alumnos
-- ----------------------------
INSERT INTO `alumnos` VALUES ('JOSE ALBERTO', 'CHIN CHIN', '20 Años', 'A', 'RICARDO ANTONIO CAN MATEY', 'ACTIVO');

-- ----------------------------
-- Table structure for asignaciones
-- ----------------------------
DROP TABLE IF EXISTS `asignaciones`;
CREATE TABLE `asignaciones` (
  `id_nombre` varchar(20) NOT NULL,
  `apellidos` varchar(15) DEFAULT NULL,
  `edad` varchar(10) DEFAULT NULL,
  `cargo` varchar(30) DEFAULT NULL,
  `activo` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id_nombre`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of asignaciones
-- ----------------------------
INSERT INTO `asignaciones` VALUES ('JOSE ALBERTO', 'CHIN CHIN', '20 Años', 'PADRE', 'ACTIVO');

-- ----------------------------
-- Table structure for calificaciones
-- ----------------------------
DROP TABLE IF EXISTS `calificaciones`;
CREATE TABLE `calificaciones` (
  `id_nombre` varchar(20) NOT NULL,
  `apellidos` varchar(15) DEFAULT NULL,
  `tareas_completas` int(11) DEFAULT NULL,
  `tareas_estandar` int(11) DEFAULT NULL,
  `tareas_atrasadas` int(11) DEFAULT NULL,
  `aprobado` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id_nombre`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of calificaciones
-- ----------------------------
INSERT INTO `calificaciones` VALUES ('JOSE ALEJANDRO', 'CHIN CHIN', '5', '12', '7', 'REPROVADO');

-- ----------------------------
-- Table structure for clases
-- ----------------------------
DROP TABLE IF EXISTS `clases`;
CREATE TABLE `clases` (
  `id_nombre` varchar(20) NOT NULL,
  `apellidos` varchar(15) DEFAULT NULL,
  `dia_clase` varchar(10) DEFAULT NULL,
  `nombre_lugar` varchar(15) DEFAULT NULL,
  `hora` time DEFAULT NULL,
  PRIMARY KEY (`id_nombre`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of clases
-- ----------------------------
INSERT INTO `clases` VALUES ('JOSE ALBERTO', 'CHIN CHIN ', 'SABADO', 'PASILLO', '18:30:15');

-- ----------------------------
-- Table structure for compromisos
-- ----------------------------
DROP TABLE IF EXISTS `compromisos`;
CREATE TABLE `compromisos` (
  `id_nombre` varchar(20) NOT NULL,
  `apellidos` varchar(15) DEFAULT NULL,
  `fecha_programada` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `accion` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_nombre`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of compromisos
-- ----------------------------
INSERT INTO `compromisos` VALUES ('JOSE ALBERTO', 'CHIN CHIN', '2020-03-15', '18:38:00', 'PRIMERA COMUNION');

-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `id_rol` int(11) NOT NULL,
  `rol` varchar(120) COLLATE utf8_spanish2_ci DEFAULT NULL,
  PRIMARY KEY (`id_rol`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO `roles` VALUES ('1', 'Administrador');
INSERT INTO `roles` VALUES ('2', 'Usuario');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `nick` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `password` varchar(200) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `nombre` varchar(120) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `apellidos` varchar(120) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `id_rol` int(11) DEFAULT NULL,
  `active` varchar(20) COLLATE utf8_spanish2_ci DEFAULT NULL,
  PRIMARY KEY (`nick`),
  KEY `fk` (`id_rol`),
  KEY `active` (`active`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('admin', '1234', 'Ricardo Antonio', 'Can Matey', '1', 'Administrador');
INSERT INTO `users` VALUES ('rodrigo', '1234', 'Rodrigo Orlando', 'Kantun Chan', '1', 'Administrador');
INSERT INTO `users` VALUES ('carlos', '1234', 'Carlos Emanuel', 'May Bacab', '1', 'Administrador');
INSERT INTO `users` VALUES ('gerardo', '1234', 'Gerardo Enrique', 'Chim Can', '1', 'Administrador');
INSERT INTO `users` VALUES ('rufino', '1234', 'Rufino', 'Pech Chin', '2', 'Usuario');
