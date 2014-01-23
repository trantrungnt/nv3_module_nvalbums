<?php

/**
 * @Project NUKEVIET 3.x
 * @Author VINADES.,JSC (contact@vinades.vn)
 * @Copyright (C) 2013 VINADES.,JSC. All rights reserved
 * @Createdate Sun, 29 Dec 2013 03:14:44 GMT
 */

if ( ! defined( 'NV_MAINFILE' ) ) die( 'Stop!!!' );

$module_version = array( //
		"name" => "Nvalbums", //
		"modfuncs" => "main,detail,content", //
		"submenu" => "main,detail,content", //
		"is_sysmod" => 0, //
		"virtual" => 1, //
		"version" => "1.0.1", //
		"date" => "Sun, 29 Dec 2013 03:14:44 GMT", //
		"author" => "VINADES (contact@vinades.vn)", //
		"uploads_dir" => array($module_name,$module_name."/images",$module_name."/thumb"), //
		"note" => "" //
	);

?>