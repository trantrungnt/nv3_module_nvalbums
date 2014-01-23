<?php

/**
 * @Project NUKEVIET 3.x
 * @Author VINADES.,JSC (contact@vinades.vn)
 * @Copyright (C) 2013 VINADES.,JSC. All rights reserved
 * @Createdate Sun, 29 Dec 2013 03:14:44 GMT
 */

if ( ! defined( 'NV_IS_MOD_NVALBUMS' ) ) die( 'Stop!!!' );

$page_title = $module_info['custom_title'];
$key_words = $module_info['keywords'];

$array_data = array();

$sql = "SELECT * FROM `" . NV_PREFIXLANG . "_" . $module_data . "_picture` WHERE `stauts`=1";
$result = $db->sql_query( $sql );
if( $db->sql_numrows( $result) == 0 ){
    $contents = "chua co ban ghi nao ca";
}else{
    while( $row = $db->sql_fetchrow( $result) ){
        $array_data[$row['id']] = array(
            "title" => $row['title'],
            "description" => $row['description'],
            "image" => NV_BASE_SITEURL . NV_UPLOADS_DIR . "/" . $row['image'],
            "thumb" => NV_BASE_SITEURL . NV_UPLOADS_DIR . "/" . $row['thumb'],
        );
    }
}
$contents = nv_theme_nvalbums_main( $array_data );

include ( NV_ROOTDIR . "/includes/header.php" );
echo nv_site_theme( $contents );
include ( NV_ROOTDIR . "/includes/footer.php" );

?>