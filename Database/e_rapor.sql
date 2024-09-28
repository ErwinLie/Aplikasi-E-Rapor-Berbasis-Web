/*
 Navicat Premium Data Transfer

 Source Server         : Local
 Source Server Type    : MySQL
 Source Server Version : 100422 (10.4.22-MariaDB)
 Source Host           : localhost:3306
 Source Schema         : e_rapor

 Target Server Type    : MySQL
 Target Server Version : 100422 (10.4.22-MariaDB)
 File Encoding         : 65001

 Date: 28/09/2024 18:01:23
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for tb_activity
-- ----------------------------
DROP TABLE IF EXISTS `tb_activity`;
CREATE TABLE `tb_activity`  (
  `id_activity` int NOT NULL AUTO_INCREMENT,
  `id_user` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `activity` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `timestamp` datetime NULL DEFAULT NULL,
  `delete_at` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id_activity`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 107 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of tb_activity
-- ----------------------------
INSERT INTO `tb_activity` VALUES (3, '1', 'User Membuka Dashboard', '2024-09-28 01:53:43', '0000-00-00 00:00:00');
INSERT INTO `tb_activity` VALUES (4, '1', 'User membuka Log Activity', '2024-09-28 01:55:38', '0000-00-00 00:00:00');
INSERT INTO `tb_activity` VALUES (5, '1', 'User Membuka Dashboard', '2024-09-28 01:57:33', '0000-00-00 00:00:00');
INSERT INTO `tb_activity` VALUES (6, '1', 'User Melakukan Log Out', '2024-09-28 01:57:41', '0000-00-00 00:00:00');
INSERT INTO `tb_activity` VALUES (9, '1', 'User Membuka Dashboard', '2024-09-28 01:59:05', '0000-00-00 00:00:00');
INSERT INTO `tb_activity` VALUES (10, '1', 'User Membuka Menu Tahun Ajaran', '2024-09-28 01:59:51', '0000-00-00 00:00:00');
INSERT INTO `tb_activity` VALUES (11, '1', 'User Melakukan Tambah Tahun Ajaran', '2024-09-28 02:00:08', '0000-00-00 00:00:00');
INSERT INTO `tb_activity` VALUES (12, '1', 'User Membuka Menu Tahun Ajaran', '2024-09-28 02:00:09', '0000-00-00 00:00:00');
INSERT INTO `tb_activity` VALUES (13, '1', 'User Membuka Menu Semester', '2024-09-28 02:00:18', '0000-00-00 00:00:00');
INSERT INTO `tb_activity` VALUES (14, '1', 'User Melakukan Tambah Semester', '2024-09-28 02:00:35', '0000-00-00 00:00:00');
INSERT INTO `tb_activity` VALUES (15, '1', 'User Membuka Menu Semester', '2024-09-28 02:00:36', '0000-00-00 00:00:00');
INSERT INTO `tb_activity` VALUES (16, '1', 'User Melakukan Edit Semster', '2024-09-28 02:00:47', '0000-00-00 00:00:00');
INSERT INTO `tb_activity` VALUES (17, '1', 'User Membuka Menu Semester', '2024-09-28 02:00:48', '0000-00-00 00:00:00');
INSERT INTO `tb_activity` VALUES (18, '1', 'User Membuka Menu Blok', '2024-09-28 02:01:01', '0000-00-00 00:00:00');
INSERT INTO `tb_activity` VALUES (19, '1', 'User Membuka Menu Jurusan', '2024-09-28 02:01:12', '0000-00-00 00:00:00');
INSERT INTO `tb_activity` VALUES (20, '1', 'User Membuka Menu Kelas', '2024-09-28 02:01:22', '0000-00-00 00:00:00');
INSERT INTO `tb_activity` VALUES (21, '1', 'User Membuka Menu Mapel', '2024-09-28 02:01:32', '0000-00-00 00:00:00');
INSERT INTO `tb_activity` VALUES (22, '1', 'User Membuka Menu Rombek', '2024-09-28 02:01:42', '0000-00-00 00:00:00');
INSERT INTO `tb_activity` VALUES (23, '1', 'User Membuka Menu Siswa', '2024-09-28 02:01:53', '0000-00-00 00:00:00');
INSERT INTO `tb_activity` VALUES (24, '1', 'User Membuka Menu Guru', '2024-09-28 02:02:02', '0000-00-00 00:00:00');
INSERT INTO `tb_activity` VALUES (25, '1', 'User Membuka Menu Jadwal', '2024-09-28 02:02:13', '0000-00-00 00:00:00');
INSERT INTO `tb_activity` VALUES (26, '1', 'User Membuka Tambah Jadwal', '2024-09-28 02:02:46', '0000-00-00 00:00:00');
INSERT INTO `tb_activity` VALUES (27, '1', 'User Melakukan Tambah Jadwal', '2024-09-28 02:03:30', '0000-00-00 00:00:00');
INSERT INTO `tb_activity` VALUES (28, '1', 'User Membuka Menu Jadwal', '2024-09-28 02:03:32', '0000-00-00 00:00:00');
INSERT INTO `tb_activity` VALUES (29, '1', 'User Melakukan Edit Jadwal', '2024-09-28 02:04:02', '0000-00-00 00:00:00');
INSERT INTO `tb_activity` VALUES (30, '1', 'User Membuka Menu Jadwal', '2024-09-28 02:04:04', '0000-00-00 00:00:00');
INSERT INTO `tb_activity` VALUES (31, '1', 'User Membuka Penilaian', '2024-09-28 02:04:38', '0000-00-00 00:00:00');
INSERT INTO `tb_activity` VALUES (32, '1', 'User Membuka Tambah Penilaian', '2024-09-28 02:04:52', '0000-00-00 00:00:00');
INSERT INTO `tb_activity` VALUES (33, '1', 'User Membuka Penilaian', '2024-09-28 02:05:27', '0000-00-00 00:00:00');
INSERT INTO `tb_activity` VALUES (34, '1', 'User Membuka Penilaian', '2024-09-28 02:05:50', '0000-00-00 00:00:00');
INSERT INTO `tb_activity` VALUES (35, '1', 'User Menghapus Penilaian', '2024-09-28 02:06:05', '0000-00-00 00:00:00');
INSERT INTO `tb_activity` VALUES (36, '1', 'User Membuka Penilaian', '2024-09-28 02:06:06', '0000-00-00 00:00:00');
INSERT INTO `tb_activity` VALUES (37, '1', 'User Membuka Raport', '2024-09-28 02:06:16', '0000-00-00 00:00:00');
INSERT INTO `tb_activity` VALUES (38, '1', 'User Membuka Penilaian', '2024-09-28 02:06:43', '0000-00-00 00:00:00');
INSERT INTO `tb_activity` VALUES (39, '1', 'User Membuka Raport', '2024-09-28 02:06:55', '0000-00-00 00:00:00');
INSERT INTO `tb_activity` VALUES (40, '1', 'User membuka Log Activity', '2024-09-28 02:07:27', '0000-00-00 00:00:00');
INSERT INTO `tb_activity` VALUES (41, '1', 'User Membuka Menu Setting', '2024-09-28 02:07:50', '0000-00-00 00:00:00');
INSERT INTO `tb_activity` VALUES (42, '1', 'User Melakukan Edit Setting', '2024-09-28 02:08:06', '0000-00-00 00:00:00');
INSERT INTO `tb_activity` VALUES (43, '1', 'User Membuka Menu Setting', '2024-09-28 02:08:08', '0000-00-00 00:00:00');
INSERT INTO `tb_activity` VALUES (44, '1', 'User Melakukan Edit Setting', '2024-09-28 02:08:25', '0000-00-00 00:00:00');
INSERT INTO `tb_activity` VALUES (45, '1', 'User Membuka Menu Setting', '2024-09-28 02:08:26', '0000-00-00 00:00:00');
INSERT INTO `tb_activity` VALUES (46, '1', 'User Membuka Menu Profile', '2024-09-28 02:08:40', '0000-00-00 00:00:00');
INSERT INTO `tb_activity` VALUES (47, '1', 'User Mengedit Foto Profile', '2024-09-28 02:08:56', '0000-00-00 00:00:00');
INSERT INTO `tb_activity` VALUES (48, '1', 'User Membuka Menu Profile', '2024-09-28 02:08:58', '0000-00-00 00:00:00');
INSERT INTO `tb_activity` VALUES (49, '1', 'User Melakukan Edit Profile', '2024-09-28 02:09:16', '0000-00-00 00:00:00');
INSERT INTO `tb_activity` VALUES (50, '1', 'User Membuka Menu Profile', '2024-09-28 02:09:18', '0000-00-00 00:00:00');
INSERT INTO `tb_activity` VALUES (51, '1', 'User Mengganti Password Lama ke Baru', '2024-09-28 02:09:36', '0000-00-00 00:00:00');
INSERT INTO `tb_activity` VALUES (52, '1', 'User Membuka Menu Profile', '2024-09-28 02:09:38', '0000-00-00 00:00:00');
INSERT INTO `tb_activity` VALUES (53, '1', 'User Melakukan Log Out', '2024-09-28 02:09:45', '0000-00-00 00:00:00');
INSERT INTO `tb_activity` VALUES (54, NULL, 'User ke Halaman Login', '2024-09-28 02:09:47', '0000-00-00 00:00:00');
INSERT INTO `tb_activity` VALUES (55, NULL, 'User melakukan Login', '2024-09-28 02:09:58', '0000-00-00 00:00:00');
INSERT INTO `tb_activity` VALUES (56, '1', 'User Membuka Dashboard', '2024-09-28 02:10:00', '0000-00-00 00:00:00');
INSERT INTO `tb_activity` VALUES (57, '1', 'User Melakukan Log Out', '2024-09-28 02:10:08', '0000-00-00 00:00:00');
INSERT INTO `tb_activity` VALUES (58, NULL, 'User ke Halaman Login', '2024-09-28 02:10:10', '0000-00-00 00:00:00');
INSERT INTO `tb_activity` VALUES (59, NULL, 'User melakukan Login', '2024-09-28 02:10:18', '0000-00-00 00:00:00');
INSERT INTO `tb_activity` VALUES (60, '2', 'User Membuka Dashboard', '2024-09-28 02:10:20', '0000-00-00 00:00:00');
INSERT INTO `tb_activity` VALUES (61, '2', 'User Melakukan Log Out', '2024-09-28 02:10:47', '0000-00-00 00:00:00');
INSERT INTO `tb_activity` VALUES (62, NULL, 'User ke Halaman Login', '2024-09-28 02:10:49', '0000-00-00 00:00:00');
INSERT INTO `tb_activity` VALUES (63, NULL, 'User melakukan Login', '2024-09-28 02:10:56', '0000-00-00 00:00:00');
INSERT INTO `tb_activity` VALUES (64, '3', 'User melakukan Login', '2024-09-28 02:10:58', '0000-00-00 00:00:00');
INSERT INTO `tb_activity` VALUES (65, '3', 'User Membuka Dashboard', '2024-09-28 02:10:59', '0000-00-00 00:00:00');
INSERT INTO `tb_activity` VALUES (66, '3', 'User Melakukan Log Out', '2024-09-28 02:11:20', '0000-00-00 00:00:00');
INSERT INTO `tb_activity` VALUES (67, NULL, 'User ke Halaman Login', '2024-09-28 02:11:22', '0000-00-00 00:00:00');
INSERT INTO `tb_activity` VALUES (68, NULL, 'User melakukan Login', '2024-09-28 02:11:38', '0000-00-00 00:00:00');
INSERT INTO `tb_activity` VALUES (69, '4', 'User Membuka Dashboard', '2024-09-28 02:11:40', '0000-00-00 00:00:00');
INSERT INTO `tb_activity` VALUES (70, '4', 'User Melakukan Log Out', '2024-09-28 02:26:10', '0000-00-00 00:00:00');
INSERT INTO `tb_activity` VALUES (71, NULL, 'User ke Halaman Login', '2024-09-28 02:26:11', '0000-00-00 00:00:00');
INSERT INTO `tb_activity` VALUES (72, NULL, 'User melakukan Login', '2024-09-28 02:33:34', '0000-00-00 00:00:00');
INSERT INTO `tb_activity` VALUES (73, NULL, 'User ke Halaman Login', '2024-09-28 02:33:35', '0000-00-00 00:00:00');
INSERT INTO `tb_activity` VALUES (74, NULL, 'User melakukan Login', '2024-09-28 02:33:53', '0000-00-00 00:00:00');
INSERT INTO `tb_activity` VALUES (75, '1', 'User Membuka Dashboard', '2024-09-28 02:33:54', '0000-00-00 00:00:00');
INSERT INTO `tb_activity` VALUES (76, '1', 'User Membuka Menu Tahun Ajaran', '2024-09-28 02:36:58', '0000-00-00 00:00:00');
INSERT INTO `tb_activity` VALUES (77, '1', 'User Membuka Menu Tahun Ajaran', '2024-09-28 02:37:53', '0000-00-00 00:00:00');
INSERT INTO `tb_activity` VALUES (78, '1', 'User Membuka Menu Semester', '2024-09-28 02:45:18', '0000-00-00 00:00:00');
INSERT INTO `tb_activity` VALUES (79, '1', 'User Membuka Menu Semester', '2024-09-28 02:45:45', '0000-00-00 00:00:00');
INSERT INTO `tb_activity` VALUES (80, '1', 'User Membuka Menu Blok', '2024-09-28 02:54:52', '0000-00-00 00:00:00');
INSERT INTO `tb_activity` VALUES (81, '1', 'User Membuka Menu Jurusan', '2024-09-28 02:59:38', '0000-00-00 00:00:00');
INSERT INTO `tb_activity` VALUES (82, '1', 'User Membuka Menu Kelas', '2024-09-28 03:03:06', '0000-00-00 00:00:00');
INSERT INTO `tb_activity` VALUES (83, '1', 'User Membuka Menu Mapel', '2024-09-28 03:04:51', '0000-00-00 00:00:00');
INSERT INTO `tb_activity` VALUES (84, '1', 'User Membuka Menu Rombek', '2024-09-28 03:06:52', '0000-00-00 00:00:00');
INSERT INTO `tb_activity` VALUES (85, '1', 'User Membuka Menu Siswa', '2024-09-28 03:12:37', '0000-00-00 00:00:00');
INSERT INTO `tb_activity` VALUES (86, '1', 'User Membuka Menu Guru', '2024-09-28 03:16:35', '0000-00-00 00:00:00');
INSERT INTO `tb_activity` VALUES (87, '1', 'User Membuka Menu Jadwal', '2024-09-28 03:19:41', '0000-00-00 00:00:00');
INSERT INTO `tb_activity` VALUES (88, '1', 'User Membuka Tambah Jadwal', '2024-09-28 03:21:36', '0000-00-00 00:00:00');
INSERT INTO `tb_activity` VALUES (89, '1', 'User Membuka Penilaian', '2024-09-28 03:22:51', '0000-00-00 00:00:00');
INSERT INTO `tb_activity` VALUES (90, '1', 'User Membuka Tambah Penilaian', '2024-09-28 03:24:47', '0000-00-00 00:00:00');
INSERT INTO `tb_activity` VALUES (91, '1', 'User Membuka Raport', '2024-09-28 03:25:42', '0000-00-00 00:00:00');
INSERT INTO `tb_activity` VALUES (92, '1', 'User Membuka Tambah Penilaian', '2024-09-28 03:26:56', '0000-00-00 00:00:00');
INSERT INTO `tb_activity` VALUES (93, '1', 'User Membuka Penilaian', '2024-09-28 03:26:59', '0000-00-00 00:00:00');
INSERT INTO `tb_activity` VALUES (94, '1', 'User Membuka Penilaian', '2024-09-28 03:27:58', '0000-00-00 00:00:00');
INSERT INTO `tb_activity` VALUES (95, '1', 'User Membuka Penilaian', '2024-09-28 03:29:04', '0000-00-00 00:00:00');
INSERT INTO `tb_activity` VALUES (96, '1', 'User Membuka Menu Blok', '2024-09-28 05:00:49', '0000-00-00 00:00:00');
INSERT INTO `tb_activity` VALUES (97, '1', 'User Membuka Menu Jurusan', '2024-09-28 05:00:57', '0000-00-00 00:00:00');
INSERT INTO `tb_activity` VALUES (98, '1', 'User Membuka Menu Kelas', '2024-09-28 05:01:05', '0000-00-00 00:00:00');
INSERT INTO `tb_activity` VALUES (99, '1', 'User Membuka Menu Mapel', '2024-09-28 05:01:12', '0000-00-00 00:00:00');
INSERT INTO `tb_activity` VALUES (100, '1', 'User Membuka Menu Jadwal', '2024-09-28 05:06:14', '0000-00-00 00:00:00');
INSERT INTO `tb_activity` VALUES (101, '1', 'User Membuka Tambah Jadwal', '2024-09-28 05:08:58', '0000-00-00 00:00:00');
INSERT INTO `tb_activity` VALUES (102, '1', 'User Membuka Raport', '2024-09-28 05:21:14', '0000-00-00 00:00:00');
INSERT INTO `tb_activity` VALUES (103, '1', 'User membuka Log Activity', '2024-09-28 05:23:10', '0000-00-00 00:00:00');
INSERT INTO `tb_activity` VALUES (104, '1', 'User membuka Log Activity', '2024-09-28 05:23:31', '0000-00-00 00:00:00');
INSERT INTO `tb_activity` VALUES (105, '1', 'User Membuka Menu Setting', '2024-09-28 05:25:53', '0000-00-00 00:00:00');
INSERT INTO `tb_activity` VALUES (106, '1', 'User Membuka Menu Profile', '2024-09-28 05:26:41', '0000-00-00 00:00:00');

-- ----------------------------
-- Table structure for tb_blok
-- ----------------------------
DROP TABLE IF EXISTS `tb_blok`;
CREATE TABLE `tb_blok`  (
  `id_blok` int NOT NULL AUTO_INCREMENT,
  `nama_blok` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `id_tahun_ajaran` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_blok`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_blok
-- ----------------------------
INSERT INTO `tb_blok` VALUES (1, 'Blok 1', '1');
INSERT INTO `tb_blok` VALUES (2, 'Blok 2', '1');
INSERT INTO `tb_blok` VALUES (3, 'Blok 4', NULL);

-- ----------------------------
-- Table structure for tb_guru
-- ----------------------------
DROP TABLE IF EXISTS `tb_guru`;
CREATE TABLE `tb_guru`  (
  `id_guru` int NOT NULL AUTO_INCREMENT,
  `nik` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `nama_guru` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `jk` enum('L','P') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_guru`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_guru
-- ----------------------------
INSERT INTO `tb_guru` VALUES (1, '123456', 'Ahmad', 'L');
INSERT INTO `tb_guru` VALUES (2, '123', 'Agung', 'L');
INSERT INTO `tb_guru` VALUES (3, '12', 'Desi', 'P');
INSERT INTO `tb_guru` VALUES (4, '1234', 'Rahmi', 'L');
INSERT INTO `tb_guru` VALUES (5, '890', 'Corgacor', 'L');
INSERT INTO `tb_guru` VALUES (6, '679', 'Gasss', 'L');
INSERT INTO `tb_guru` VALUES (7, '77', 'rona', 'P');

-- ----------------------------
-- Table structure for tb_jadwal
-- ----------------------------
DROP TABLE IF EXISTS `tb_jadwal`;
CREATE TABLE `tb_jadwal`  (
  `id_jadwal` int NOT NULL AUTO_INCREMENT,
  `id_mapel` int NULL DEFAULT NULL,
  `id_rombel` int NULL DEFAULT NULL,
  `id_guru` int NULL DEFAULT NULL,
  `sesi` enum('SESI 1','SESI 2','SESI 3','SESI 4','SESI 5','ISTIRAHAT') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `id_blok` int NULL DEFAULT NULL,
  `id_tahun_ajaran` int NULL DEFAULT NULL,
  PRIMARY KEY (`id_jadwal`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 22 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_jadwal
-- ----------------------------
INSERT INTO `tb_jadwal` VALUES (12, 6, 2, 6, 'SESI 1', 3, 2);
INSERT INTO `tb_jadwal` VALUES (13, 2, 2, 2, 'SESI 2', 3, 2);
INSERT INTO `tb_jadwal` VALUES (14, 3, 2, 3, 'SESI 3', 3, 2);
INSERT INTO `tb_jadwal` VALUES (15, 4, 2, 4, 'SESI 4', 3, 2);
INSERT INTO `tb_jadwal` VALUES (16, 5, 2, 5, 'SESI 5', 3, 2);

-- ----------------------------
-- Table structure for tb_jurusan
-- ----------------------------
DROP TABLE IF EXISTS `tb_jurusan`;
CREATE TABLE `tb_jurusan`  (
  `id_jurusan` int NOT NULL AUTO_INCREMENT,
  `nama_jurusan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_jurusan`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_jurusan
-- ----------------------------
INSERT INTO `tb_jurusan` VALUES (1, 'RPL');
INSERT INTO `tb_jurusan` VALUES (2, 'AKL');

-- ----------------------------
-- Table structure for tb_kelas
-- ----------------------------
DROP TABLE IF EXISTS `tb_kelas`;
CREATE TABLE `tb_kelas`  (
  `id_kelas` int NOT NULL AUTO_INCREMENT,
  `nama_kelas` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_kelas`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_kelas
-- ----------------------------
INSERT INTO `tb_kelas` VALUES (1, 'X');
INSERT INTO `tb_kelas` VALUES (2, 'XI');
INSERT INTO `tb_kelas` VALUES (3, 'XII');

-- ----------------------------
-- Table structure for tb_mapel
-- ----------------------------
DROP TABLE IF EXISTS `tb_mapel`;
CREATE TABLE `tb_mapel`  (
  `id_mapel` int NOT NULL AUTO_INCREMENT,
  `nama_mapel` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `kkm` int NULL DEFAULT NULL,
  PRIMARY KEY (`id_mapel`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_mapel
-- ----------------------------
INSERT INTO `tb_mapel` VALUES (1, 'Bahasa Indonesia', 75);
INSERT INTO `tb_mapel` VALUES (2, 'Bahasa English', 75);
INSERT INTO `tb_mapel` VALUES (3, 'PBWEB', 75);
INSERT INTO `tb_mapel` VALUES (4, 'PBO', 75);
INSERT INTO `tb_mapel` VALUES (5, 'Basis Data', 75);
INSERT INTO `tb_mapel` VALUES (6, 'PPKN', 75);

-- ----------------------------
-- Table structure for tb_penilaian
-- ----------------------------
DROP TABLE IF EXISTS `tb_penilaian`;
CREATE TABLE `tb_penilaian`  (
  `id_penilaian` int NOT NULL AUTO_INCREMENT,
  `id_siswa` int NULL DEFAULT NULL,
  `id_blok` int NULL DEFAULT NULL,
  `id_mapel` int NULL DEFAULT NULL,
  `nilai_tugas` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `nilai_midblok` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `nilai_finalblok` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `total_nilai` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `id_semester` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `id_tahun_ajaran` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `id_user` int NULL DEFAULT NULL,
  `predikat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_penilaian`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_penilaian
-- ----------------------------
INSERT INTO `tb_penilaian` VALUES (3, 1, 1, 1, '80', '75', '90', '81.666666666667', '1', '1', 1, 'C');

-- ----------------------------
-- Table structure for tb_rapor
-- ----------------------------
DROP TABLE IF EXISTS `tb_rapor`;
CREATE TABLE `tb_rapor`  (
  `id_rapor` int NOT NULL AUTO_INCREMENT,
  `id_penilaian` int NULL DEFAULT NULL,
  `tanggal` date NULL DEFAULT NULL,
  PRIMARY KEY (`id_rapor`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_rapor
-- ----------------------------

-- ----------------------------
-- Table structure for tb_rombel
-- ----------------------------
DROP TABLE IF EXISTS `tb_rombel`;
CREATE TABLE `tb_rombel`  (
  `id_rombel` int NOT NULL AUTO_INCREMENT,
  `id_kelas` int NULL DEFAULT NULL,
  `id_jurusan` int NULL DEFAULT NULL,
  `nama_rombel` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_rombel`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of tb_rombel
-- ----------------------------
INSERT INTO `tb_rombel` VALUES (1, 1, 1, 'RPL X');
INSERT INTO `tb_rombel` VALUES (2, 3, 2, 'AKL XII');

-- ----------------------------
-- Table structure for tb_semester
-- ----------------------------
DROP TABLE IF EXISTS `tb_semester`;
CREATE TABLE `tb_semester`  (
  `id_semester` int NOT NULL AUTO_INCREMENT,
  `nama_semester` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_semester`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_semester
-- ----------------------------
INSERT INTO `tb_semester` VALUES (1, 'Semester 1');
INSERT INTO `tb_semester` VALUES (2, 'Semester 2');

-- ----------------------------
-- Table structure for tb_setting
-- ----------------------------
DROP TABLE IF EXISTS `tb_setting`;
CREATE TABLE `tb_setting`  (
  `id_setting` int NOT NULL AUTO_INCREMENT,
  `nama_web` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `logo_dashboard` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `logo_tab` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `logo_login` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_setting`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of tb_setting
-- ----------------------------
INSERT INTO `tb_setting` VALUES (1, 'E-Rapor', 'logo-sph_1.png', '1727273532_305a1fa7eb3601901a70_1.jpeg', 'logo-sph.png');

-- ----------------------------
-- Table structure for tb_siswa
-- ----------------------------
DROP TABLE IF EXISTS `tb_siswa`;
CREATE TABLE `tb_siswa`  (
  `id_siswa` int NOT NULL AUTO_INCREMENT,
  `id_rombel` int NULL DEFAULT NULL,
  `nama_siswa` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `nis` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `tgl_lahir` date NULL DEFAULT NULL,
  PRIMARY KEY (`id_siswa`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_siswa
-- ----------------------------
INSERT INTO `tb_siswa` VALUES (1, 1, 'Oke', '8234003', '2024-09-24');
INSERT INTO `tb_siswa` VALUES (2, 2, 'NGE', '98', '2024-09-24');

-- ----------------------------
-- Table structure for tb_tahun_ajaran
-- ----------------------------
DROP TABLE IF EXISTS `tb_tahun_ajaran`;
CREATE TABLE `tb_tahun_ajaran`  (
  `id_tahun_ajaran` int NOT NULL AUTO_INCREMENT,
  `tahun_ajaran` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_tahun_ajaran`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_tahun_ajaran
-- ----------------------------
INSERT INTO `tb_tahun_ajaran` VALUES (1, '2024/2025');
INSERT INTO `tb_tahun_ajaran` VALUES (2, '2025/2026');

-- ----------------------------
-- Table structure for tb_user
-- ----------------------------
DROP TABLE IF EXISTS `tb_user`;
CREATE TABLE `tb_user`  (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `foto` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `id_level` enum('1','2','3','4','5') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `update_at` datetime NULL DEFAULT NULL,
  `update_by` int NULL DEFAULT NULL,
  PRIMARY KEY (`id_user`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of tb_user
-- ----------------------------
INSERT INTO `tb_user` VALUES (1, 'adminn', '6512bd43d9caa6e02c990b0a82652dca', 'adminn@gmail.com', '1727507337_c18e6ce7db0903742362.png', '1', '2024-09-28 02:09:37', 1);
INSERT INTO `tb_user` VALUES (2, 'wali', 'c4ca4238a0b923820dcc509a6f75849b', 'wali@gmail.com', '1727273532_305a1fa7eb3601901a70.jpeg', '2', NULL, NULL);
INSERT INTO `tb_user` VALUES (3, 'guru', 'c4ca4238a0b923820dcc509a6f75849b', 'guru@gmail.com', '1727273532_305a1fa7eb3601901a70.jpeg', '3', NULL, NULL);
INSERT INTO `tb_user` VALUES (4, 'siswa', 'c4ca4238a0b923820dcc509a6f75849b', 'siswa@gmail.com', '1727273532_305a1fa7eb3601901a70.jpeg', '4', NULL, NULL);

SET FOREIGN_KEY_CHECKS = 1;
