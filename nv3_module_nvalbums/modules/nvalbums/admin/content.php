<?php

/**
 * @Project NUKEVIET 3.x
 * @Author VINADES.,JSC (contact@vinades.vn)
 * @Copyright (C) 2013 VINADES.,JSC. All rights reserved
 * @Createdate Sun, 29 Dec 2013 03:14:44 GMT
 */

if( ! defined( 'NV_IS_FILE_ADMIN' ) ) die( 'Stop!!!' );

if( $nv_Request->get_int('change', 'post', 0 ) == 1){
    $id = $nv_Request->get_int( 'id', 'post', 0 );
	$sql = "SELECT * FROM `" . NV_PREFIXLANG . "_" . $module_data . "_picture` WHERE id=" . $id;
	$result = $db->sql_query( $sql );
    if( $db->sql_numrows( $result ) == 1 )
	{
       $row = $db->sql_fetchrow( $result );
       $status_chang = ( $row['stauts'] == 1 ) ? 0 : 1;
       $sql = "UPDATE `" . NV_PREFIXLANG . "_" . $module_data . "_picture` SET stauts= ". $status_chang ." WHERE id=" . $id;
	   if( $db->sql_query( $sql ) ){
	       die("OK_thay doi thanh cong");
	   }else die("ERRPR_thay doi khong thanh cong");
    }else die("ERRPR_khong tim thay du lieu");
}
if( $nv_Request->get_int( 'id', 'post', 0 ) > 0 )
{
	$id = $nv_Request->get_int( 'id', 'post', 0 );
	$sql = "SELECT * FROM `" . NV_PREFIXLANG . "_" . $module_data . "_picture` WHERE id=" . $id;
	$result = $db->sql_query( $sql );
	if( $db->sql_numrows( $result ) == 1 )
	{
		$row = $db->sql_fetchrow( $result );
		if( $row['image'] != '' && file_exists( NV_UPLOADS_REAL_DIR . "/" . $row['image'] ) )
		{
			//xoa anh goc
			if( @unlink( NV_UPLOADS_REAL_DIR . "/" . $row['image'] ) )
			{
				//xoa anh thum
				if( $row['thumb'] != '' && file_exists( NV_UPLOADS_REAL_DIR . "/" . $row['thumb'] ) )
				{
					@unlink( NV_UPLOADS_REAL_DIR . "/" . $row['thumb'] );
				}
				//xoa du lieu trong DB
				$sql = "DELETE FROM `" . NV_PREFIXLANG . "_" . $module_data . "_picture` WHERE id=" . $id;
				if( $db->sql_query( $sql ) ){
				    die('OK_Da xoa anh va du lieu');
				}
			}
			else  die( 'ERROR_he thong khong the xoa anh' );
		}else  die( 'ERROR_he thong khong thay anh goc' );
	}
	else
	{
		die( 'ERROR_khong tim thay anh' );
	}
}
else
{
	die( 'ERROR_khong tim thay id nao' );
}

$xtpl = new XTemplate( $op . ".tpl", NV_ROOTDIR . "/themes/" . $global_config['module_theme'] . "/modules/" . $module_file );
$xtpl->assign( 'LANG', $lang_module );
$xtpl->assign( 'NV_BASE_ADMINURL', NV_BASE_ADMINURL );
$xtpl->assign( 'NV_NAME_VARIABLE', NV_NAME_VARIABLE );
$xtpl->assign( 'NV_OP_VARIABLE', NV_OP_VARIABLE );
$xtpl->assign( 'MODULE_NAME', $module_name );
$xtpl->assign( 'OP', $op );

$xtpl->parse( 'main' );
$contents = $xtpl->text( 'main' );

$page_title = $lang_module['content'];

include ( NV_ROOTDIR . "/includes/header.php" );
echo nv_admin_theme( $contents );
include ( NV_ROOTDIR . "/includes/footer.php" );

?>