/*
Navicat SQLite Data Transfer

Source Server         : joomla-platform-mvc-example
Source Server Version : 30706
Source Host           : :0

Target Server Type    : SQLite
Target Server Version : 30706
File Encoding         : 65001

Date: 2012-07-24 10:07:16
*/

PRAGMA foreign_keys = OFF;

-- ----------------------------
-- Table structure for "main"."lh_user"
-- ----------------------------
DROP TABLE "main"."lh_user";
CREATE TABLE "lh_user" (
"id"  INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
"name"  TEXT NOT NULL
);

-- ----------------------------
-- Records of lh_user
-- ----------------------------
INSERT INTO "main"."lh_user" VALUES (1, 'Alice');
INSERT INTO "main"."lh_user" VALUES (2, 'Bob');
INSERT INTO "main"."lh_user" VALUES (3, 'Rock');
INSERT INTO "main"."lh_user" VALUES (4, 'Paper');
INSERT INTO "main"."lh_user" VALUES (5, 'Scissors');
INSERT INTO "main"."lh_user" VALUES (6, 'Lizard');
INSERT INTO "main"."lh_user" VALUES (7, 'Spock');

-- ----------------------------
-- Table structure for "main"."sqlite_sequence"
-- ----------------------------
DROP TABLE "main"."sqlite_sequence";
CREATE TABLE sqlite_sequence(name,seq);

-- ----------------------------
-- Records of sqlite_sequence
-- ----------------------------
INSERT INTO "main"."sqlite_sequence" VALUES ('lh_user', 7);
