<?php

/**
 * @Project NUKEVIET 3.x
 * @Author VINADES.,JSC (contact@vinades.vn)
 * @Copyright (C) 2013 VINADES.,JSC. All rights reserved
 * @Createdate Sun, 29 Dec 2013 03:14:44 GMT
 */

if ( ! defined( 'NV_MAINFILE' ) ) die( 'Stop!!!' );

$sql_drop_module = array();
$sql_drop_module[] = "DROP TABLE IF EXISTS `".$db_config['prefix']."_".$lang."_".$module_data."_picture`";


$sql_create_module = $sql_drop_module;
$sql_create_module[] = "CREATE TABLE `".$db_config['prefix']."_".$lang."_".$module_data."_picture` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `thumb` varchar(255) NOT NULL,
  `stauts` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `stauts` (`stauts`)
) ENGINE=MyISAM;";

?>