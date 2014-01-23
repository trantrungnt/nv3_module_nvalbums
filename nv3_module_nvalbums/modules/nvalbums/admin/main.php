<?php

/**
 * @Project NUKEVIET 3.x
 * @Author VINADES.,JSC (contact@vinades.vn)
 * @Copyright (C) 2013 VINADES.,JSC. All rights reserved
 * @Createdate Sun, 29 Dec 2013 03:14:44 GMT
 */

if ( ! defined( 'NV_IS_FILE_ADMIN' ) ) die( 'Stop!!!' );

$xtpl = new XTemplate( $op . ".tpl", NV_ROOTDIR . "/themes/" . $global_config['module_theme'] . "/modules/" . $module_file );
$xtpl->assign( 'LANG', $lang_module );
$xtpl->assign( 'NV_BASE_ADMINURL', NV_BASE_ADMINURL );
$xtpl->assign( 'NV_NAME_VARIABLE', NV_NAME_VARIABLE );
$xtpl->assign( 'NV_OP_VARIABLE', NV_OP_VARIABLE );
$xtpl->assign( 'MODULE_NAME', $module_name );
$xtpl->assign( 'OP', $op );

$sql = "SELECT * FROM `" . NV_PREFIXLANG . "_" . $module_data . "_picture` ORDER BY `id` DESC";
$result = $db->sql_query( $sql );
if( $db->sql_numrows( $result) == 0 ){
    $contents = "chua co ban ghi nao ca";
}else{
    while( $row = $db->sql_fetchrow( $result) ){
        
        $xtpl->assign( 'DATA', array(
            "id" => $row['id'],
            "title" => $row['title'],
            "ck" => ( $row['stauts'] == 1) ? " checked='checked'" : "",
            "description" => $row['description'],
            "image" => NV_BASE_SITEURL . NV_UPLOADS_DIR . "/" . $row['image'],
            "thumb" => NV_BASE_SITEURL . NV_UPLOADS_DIR . "/" . $row['thumb'],
        ) );
        $xtpl->parse( 'main.loop' );
    }
}

$xtpl->parse( 'main' );
$contents = $xtpl->text( 'main' );

$page_title = $lang_module['main'];

include ( NV_ROOTDIR . "/includes/header.php" );
echo nv_admin_theme( $contents );
include ( NV_ROOTDIR . "/includes/footer.php" );

?>