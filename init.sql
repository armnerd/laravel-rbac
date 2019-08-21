-- MySQL dump 10.13  Distrib 8.0.16, for macos10.14 (x86_64)
--
-- Host: 127.0.0.1    Database: superl
-- ------------------------------------------------------
-- Server version	8.0.12

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
 SET NAMES utf8 ;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `backend_menu`
--

DROP TABLE IF EXISTS `backend_menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `backend_menu` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键id',
  `belong` int(11) NOT NULL DEFAULT '0' COMMENT '上层id，0为首层菜单',
  `title` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '菜单名称',
  `icon` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '菜单的图标样式',
  `url` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '对应页面路由',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '更新时间',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC COMMENT='商家管理后台菜单配置表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `backend_menu`
--

LOCK TABLES `backend_menu` WRITE;
/*!40000 ALTER TABLE `backend_menu` DISABLE KEYS */;
/*!40000 ALTER TABLE `backend_menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `backend_permissions`
--

DROP TABLE IF EXISTS `backend_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `backend_permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键id',
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '权限名称',
  `http_path` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci COMMENT '请求路由',
  `menu` int(11) DEFAULT '0' COMMENT '需要打开的顶级菜单',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '更新时间',
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `admin_permissions_name_unique` (`name`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC COMMENT='权限表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `backend_permissions`
--

LOCK TABLES `backend_permissions` WRITE;
/*!40000 ALTER TABLE `backend_permissions` DISABLE KEYS */;
INSERT INTO `backend_permissions` VALUES (1,'权限管理','/permission/list;/api/permission/one;/api/permission/save;/api/permission/change;/api/permission/delete',999999999,'2018-11-28 19:45:56','2018-12-15 13:20:17'),(2,'角色管理','/role/list;/api/role/save;/api/role/one;/api/role/change;/api/role/delete',999999999,'2018-12-02 23:34:56','2018-12-15 13:20:20'),(3,'菜单管理','/menu/list;/menu/add;/menu/edit;/api/menu/save;/api/menu/change;/api/menu/delete',999999999,'2018-12-02 23:36:16','2018-12-15 13:20:21'),(4,'后台用户','/user/list;/user/add;/user/edit;/api/user/save;/api/user/change;/api/user/delete',999999999,'2018-12-02 23:38:20','2018-12-15 13:20:22');
/*!40000 ALTER TABLE `backend_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `backend_role_menu`
--

DROP TABLE IF EXISTS `backend_role_menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `backend_role_menu` (
  `role_id` int(11) NOT NULL DEFAULT '0' COMMENT '角色id',
  `menu_id` int(11) NOT NULL DEFAULT '0' COMMENT '菜单id',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '更新时间',
  KEY `admin_role_menu_role_id_menu_id_index` (`role_id`,`menu_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC COMMENT='角色菜单表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `backend_role_menu`
--

LOCK TABLES `backend_role_menu` WRITE;
/*!40000 ALTER TABLE `backend_role_menu` DISABLE KEYS */;
/*!40000 ALTER TABLE `backend_role_menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `backend_role_permissions`
--

DROP TABLE IF EXISTS `backend_role_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `backend_role_permissions` (
  `role_id` int(11) NOT NULL DEFAULT '0' COMMENT '角色id',
  `permission_id` int(11) NOT NULL DEFAULT '0' COMMENT '权限id',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '更新时间',
  KEY `admin_role_permissions_role_id_permission_id_index` (`role_id`,`permission_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC COMMENT='角色权限表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `backend_role_permissions`
--

LOCK TABLES `backend_role_permissions` WRITE;
/*!40000 ALTER TABLE `backend_role_permissions` DISABLE KEYS */;
INSERT INTO `backend_role_permissions` VALUES (1,1,'2018-12-03 00:29:39','2018-12-03 00:29:48'),(1,3,'2018-12-03 00:29:39','2018-12-03 00:29:49'),(1,4,'2018-12-03 00:29:40','2018-12-03 00:29:50'),(1,5,'2018-12-03 00:29:40','2018-12-03 00:29:50');
/*!40000 ALTER TABLE `backend_role_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `backend_role_users`
--

DROP TABLE IF EXISTS `backend_role_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `backend_role_users` (
  `role_id` int(11) NOT NULL DEFAULT '0' COMMENT '角色id',
  `user_id` int(11) NOT NULL DEFAULT '0' COMMENT '用户id',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '更新时间',
  KEY `admin_role_users_role_id_user_id_index` (`role_id`,`user_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC COMMENT='用户角色关系';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `backend_role_users`
--

LOCK TABLES `backend_role_users` WRITE;
/*!40000 ALTER TABLE `backend_role_users` DISABLE KEYS */;
INSERT INTO `backend_role_users` VALUES (1,1,'2018-12-13 21:02:46','2018-12-13 21:02:46'),(2,1,'2018-12-13 21:02:46','2018-12-13 21:02:46');
/*!40000 ALTER TABLE `backend_role_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `backend_roles`
--

DROP TABLE IF EXISTS `backend_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `backend_roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键id',
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '角色名称',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '更新时间',
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `admin_roles_name_unique` (`name`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC COMMENT='角色表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `backend_roles`
--

LOCK TABLES `backend_roles` WRITE;
/*!40000 ALTER TABLE `backend_roles` DISABLE KEYS */;
INSERT INTO `backend_roles` VALUES (1,'管理员','2018-12-03 00:29:39','2018-12-03 00:29:55'),(2,'开发者','2018-12-04 12:06:15','2019-08-21 09:56:25');
/*!40000 ALTER TABLE `backend_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `backend_users`
--

DROP TABLE IF EXISTS `backend_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `backend_users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键id',
  `phone` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '手机',
  `password` char(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '密码',
  `name` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '昵称',
  `avatar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '头像',
  `email` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '邮箱',
  `position` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT '员工' COMMENT '职位',
  `openid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '公众号openid',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '更新时间',
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `unique_index_phone` (`phone`),
  UNIQUE KEY `unique_index_email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC COMMENT='总后台管理员表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `backend_users`
--

LOCK TABLES `backend_users` WRITE;
/*!40000 ALTER TABLE `backend_users` DISABLE KEYS */;
INSERT INTO `backend_users` VALUES (1,'18513417479','e10adc3949ba59abbe56e057f20f883e','zane','/avatars/admin.jpg','912504432@qq.com','sre','','2018-11-28 13:58:37','2019-08-21 10:18:44');
/*!40000 ALTER TABLE `backend_users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-08-21 10:19:39
