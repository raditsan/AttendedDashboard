/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 100136
 Source Host           : localhost:3306
 Source Schema         : suksesjaya

 Target Server Type    : MySQL
 Target Server Version : 100136
 File Encoding         : 65001

 Date: 25/12/2018 19:19:27
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for attended
-- ----------------------------
DROP TABLE IF EXISTS `attended`;
CREATE TABLE `attended`  (
  `attended_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `login_year` int(11) NULL DEFAULT NULL,
  `login_month` int(11) NULL DEFAULT NULL,
  `login_date` int(11) NULL DEFAULT NULL,
  `login_time` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `login_lat` double NULL DEFAULT NULL,
  `login_lng` double NULL DEFAULT NULL,
  `signout_year` int(11) NULL DEFAULT NULL,
  `signout_month` int(11) NULL DEFAULT NULL,
  `signout_date` int(11) NULL DEFAULT NULL,
  `signout_time` timestamp(0) NULL DEFAULT NULL,
  `signout_lat` double NULL DEFAULT NULL,
  `signout_lng` double NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`attended_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 17 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of attended
-- ----------------------------
INSERT INTO `attended` VALUES (1, 7, 2018, 12, 19, '2018-12-20 20:05:08', -6.233024899999999, 106.8119497, 2018, 12, 19, '2018-12-20 20:05:22', -6.233024899999999, 106.8119497, '2018-12-20 20:05:08', '2018-12-20 20:05:22');
INSERT INTO `attended` VALUES (2, 7, 2018, 12, 20, '2018-12-20 20:07:11', -6.233024899999999, 106.8119497, 2018, 12, 20, '2018-12-20 20:07:22', -6.233024899999999, 106.8119497, '2018-12-20 20:07:11', '2018-12-20 20:07:22');
INSERT INTO `attended` VALUES (3, 1, 2018, 12, 20, '2018-12-20 20:10:45', -6.233024899999999, 106.8119497, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-20 20:10:45', '2018-12-20 20:10:45');
INSERT INTO `attended` VALUES (4, 7, 2018, 12, 21, '2018-12-21 09:13:18', -6.233024899999999, 106.8119497, 2018, 12, 21, '2018-12-21 11:17:26', -6.233024899999999, 106.8119497, '2018-12-21 09:13:18', '2018-12-21 11:17:26');
INSERT INTO `attended` VALUES (5, 7, 2018, 12, 22, '2018-12-22 10:02:38', -6.2087634, 106.84559899999999, 2018, 12, 22, '2018-12-22 13:45:46', -6.2087634, 106.84559899999999, '2018-12-22 10:02:38', '2018-12-22 13:45:46');
INSERT INTO `attended` VALUES (6, 19, 2018, 12, 22, '2018-12-22 09:17:40', -6.2087634, 106.84559899999999, 2018, 12, 22, '2018-12-22 09:18:08', -6.2087634, 106.84559899999999, '2018-12-22 09:17:40', '2018-12-22 09:18:08');
INSERT INTO `attended` VALUES (13, 7, 2018, 12, 23, '2018-12-23 08:38:34', -6.2087634, 106.84559899999999, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-23 08:38:34', '2018-12-23 08:38:34');
INSERT INTO `attended` VALUES (14, 7, 2018, 12, 24, '2018-12-24 17:01:36', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-24 17:01:36', '2018-12-24 17:01:36');
INSERT INTO `attended` VALUES (16, 7, 2018, 12, 25, '2018-12-25 00:23:19', 0, 0, 2018, 12, 25, '2018-12-25 00:43:05', 0, 0, '2018-12-25 00:23:19', '2018-12-25 00:43:05');

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (2, '2014_10_12_100000_create_password_resets_table', 1);
INSERT INTO `migrations` VALUES (3, '2018_12_19_125503_create_attended_table', 2);

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets`  (
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  INDEX `password_resets_email_index`(`email`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `rule` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `img_profile` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 20 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'radits', 'raditsan2@gmail.com', '$2y$10$cevFQ.9ig3pIuN6b0yYZseYTVYBlQqHmTN50c/f6Ok81zqcosLYey', 'admin', 'avatar5.png', 'aJZpZkG6dcOoYxlaqXHixmv2RvSx6hg3Xe7amlKbjZNcj2j77SfhvM7rObB5', '2018-12-19 11:27:59', '2018-12-19 11:27:59');
INSERT INTO `users` VALUES (2, 'krisna pc', 'krisnapc@gmail.com', 'krisnapc@gmail.com', 'employee', 'avatar5.png', NULL, '2018-12-19 15:16:00', '2018-12-19 15:16:00');
INSERT INTO `users` VALUES (7, 'Krisna', 'krisnasan@gmail.com', '$2y$10$EmKj4x.M596oa2pBFE/RlOOed9pOLVGQu.8xJ5cIoW4xoT8FIK8wm', 'employee', 'avatar5.png', 'kq3D63PO5HbbCvaBtQCmlo6c09IQWgEj3wTJrQ6qKAxzts6fedKBHILDMq6u', '2018-12-20 02:16:02', '2018-12-20 02:16:02');
INSERT INTO `users` VALUES (8, 'Krisnakal', 'krisnakal@gmail.com', '$2y$10$HlPTEfG.BomJSoXNWinuFeMll70LFvWv7kJRQ6ozbJm5RcdpvFexO', 'employee', 'avatar5.png', NULL, '2018-12-21 10:14:34', '2018-12-21 10:14:34');
INSERT INTO `users` VALUES (9, 'Admin', 'me@admin.com', '$2y$10$hxbOJw1YejLPbiOmkbNkFODRRuzNPGX6Ka/H18CWZENJPUPYKz1RS', 'admin', 'avatar5.png', 'w1EOoJaDxcHvF0XBnfr7f3oXIux1FcFYGz60CzRdMI9EcIzebD0m43FoYsOK', '2018-12-21 10:17:21', '2018-12-21 10:17:21');
INSERT INTO `users` VALUES (10, 'rizky', 'rizky@gmail.com', '$2y$10$m9CxtNuBAEDZx/SyFIOP4uZ48tey/obcx2FsDkYUc4TPvKTctpfWG', 'employee', 'avatar5.png', NULL, '2018-12-21 10:50:16', '2018-12-21 10:50:16');
INSERT INTO `users` VALUES (17, 'rizky', 'aaa', '$2y$10$JQALoa1z85WQQacg0Cv4sepyiN83yHLn3RuwYFo.dH87AQiXoLkye', '', 'avatar5.png', NULL, '2018-12-21 10:55:03', '2018-12-21 10:55:03');
INSERT INTO `users` VALUES (18, 'Sukron', 'sukron@makmun.com', '$2y$10$.VrXe.Dgh3gmMVUmF.RNYuqgYPI6sUxnlytQ1ea0c6d0kajts7O.C', 'admin', 'avatar5.png', NULL, '2018-12-22 09:17:01', '2018-12-22 09:17:01');
INSERT INTO `users` VALUES (19, 'inu', 'inu@dola.com', '$2y$10$7NKNq4Un0ZE2lrDqdagq7.5LYv.OhR6eVO6JCwr7pcF78BgHJZ4lO', 'employee', 'avatar5.png', 'DeduvYvI368xzj3o2zh7YtblYKvpxqCxVRcTPk0c5upDA0z1b8l2VExauhvu', '2018-12-22 09:17:20', '2018-12-22 09:17:20');

SET FOREIGN_KEY_CHECKS = 1;
