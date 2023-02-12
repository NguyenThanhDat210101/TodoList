/*
 Navicat Premium Data Transfer

 Source Server         : gmo
 Source Server Type    : MySQL
 Source Server Version : 100425
 Source Host           : localhost:3306
 Source Schema         : todo-list

 Target Server Type    : MySQL
 Target Server Version : 100425
 File Encoding         : 65001

 Date: 12/02/2023 21:09:56
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for works
-- ----------------------------
DROP TABLE IF EXISTS `works`;
CREATE TABLE `works`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 47 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of works
-- ----------------------------
INSERT INTO `works` VALUES (40, 'Giao Hang lan 3', '2023-02-06 14:20:00', '2023-02-06 15:20:00', 1);
INSERT INTO `works` VALUES (41, 'Code task test todo list', '2023-02-06 14:21:00', '2023-02-12 12:21:00', 0);
INSERT INTO `works` VALUES (43, 'Metting', '2023-01-31 14:20:00', '2023-02-01 15:20:00', 2);
INSERT INTO `works` VALUES (45, 'checkin', '2023-02-01 19:27:00', '2023-02-01 20:27:00', 2);

SET FOREIGN_KEY_CHECKS = 1;
