/*
Navicat MySQL Data Transfer

Source Server         : Lee
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : blog

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2017-07-04 19:02:04
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for blog_admin
-- ----------------------------
DROP TABLE IF EXISTS `blog_admin`;
CREATE TABLE `blog_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(40) NOT NULL DEFAULT '',
  `user_pwd` varchar(255) NOT NULL DEFAULT '',
  `user_ip` int(11) NOT NULL,
  `login_time` datetime NOT NULL,
  `create_time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of blog_admin
-- ----------------------------
INSERT INTO `blog_admin` VALUES ('1', 'admin', 'eyJpdiI6IllYcGVMTzJnVTdNYks3TDZGdEgybEE9PSIsInZhbHVlIjoiSnVHMzJNYml1UStcL096YmI2eEpCQ3F0OGRmYnhvbXV3elFBSU5YaWEwdjA9IiwibWFjIjoiYzdmZWM1NzQwYTZiZTZjOWE1OTMxMjYwOTVjYWZiY2U3Mjg2MmI3OWIzYzdhOGQ0YTQ2MDVjZGFhNzEzMjM3MSJ9', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- ----------------------------
-- Table structure for blog_article
-- ----------------------------
DROP TABLE IF EXISTS `blog_article`;
CREATE TABLE `blog_article` (
  `art_id` int(11) NOT NULL AUTO_INCREMENT,
  `art_title` varchar(100) DEFAULT '',
  `art_keywords` varchar(100) DEFAULT '',
  `art_discription` varchar(100) DEFAULT '',
  `art_view` int(11) DEFAULT NULL,
  `art_time` datetime DEFAULT NULL,
  `art_image` varchar(255) DEFAULT '',
  `art_editor` varchar(100) DEFAULT '',
  `art_content` text,
  `cate_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`art_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of blog_article
-- ----------------------------

-- ----------------------------
-- Table structure for blog_cate
-- ----------------------------
DROP TABLE IF EXISTS `blog_cate`;
CREATE TABLE `blog_cate` (
  `cate_id` int(11) NOT NULL AUTO_INCREMENT,
  `cate_name` varchar(50) NOT NULL DEFAULT '',
  `cate_title` varchar(255) DEFAULT NULL,
  `cate_keywords` varchar(255) DEFAULT '',
  `cate_discription` varchar(255) DEFAULT '',
  `cate_view` int(10) DEFAULT '0',
  `cate_order` int(10) DEFAULT NULL,
  `cate_pid` int(11) DEFAULT '0',
  PRIMARY KEY (`cate_id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of blog_cate
-- ----------------------------
INSERT INTO `blog_cate` VALUES ('1', '体育', '体育很哈啊', '体育，乒乓球', '描述还是不错的', '0', '1', '0');
INSERT INTO `blog_cate` VALUES ('2', '娱乐', '娱乐大家来玩啊 ', '大保健', '描述还是不错的', '0', '1', '0');
INSERT INTO `blog_cate` VALUES ('3', 'PHP', '世界上最好的语言', 'PHP,MYSQL,AJAX', '描述还是不错的', '0', '2', '0');
INSERT INTO `blog_cate` VALUES ('5', '体育1', '体育1体育1体育1体育1', '体育1体育1体育1', '体育1体育1体育1', '0', '2', '1');
INSERT INTO `blog_cate` VALUES ('6', '体育2', '体育2体育2体育2体育2', '体育2体育2体育2体育2', '体育2体育2体育2体育2体育2', '0', '1', '1');
INSERT INTO `blog_cate` VALUES ('7', '娱乐1', '娱乐1娱乐1娱乐1娱乐1', '娱乐1娱乐1娱乐1', '娱乐1娱乐1娱乐1', '0', '2', '2');
INSERT INTO `blog_cate` VALUES ('8', '娱乐2', '娱乐2娱乐2娱乐2娱乐2', '娱乐2娱乐2娱乐2娱乐2', '娱乐2娱乐2娱乐2娱乐2', '0', '1', '2');
INSERT INTO `blog_cate` VALUES ('9', 'PHP1', 'PHP1PHP1PHP1PHP1', 'PHP1PHP1PHP1PHP1', 'PHP1PHP1PHP1PHP1', '0', '2', '3');
INSERT INTO `blog_cate` VALUES ('10', 'PHP2', 'PHP2PHP2PHP2PHP2', 'PHP2PHP2PHP2PHP2', 'PHP2PHP2PHP2', '0', '1', '3');
INSERT INTO `blog_cate` VALUES ('16', 'CCTV5', '中国最大的体育频道', '体育，新闻，杜兰特，NBA', '好好好', '0', '1', '1');
