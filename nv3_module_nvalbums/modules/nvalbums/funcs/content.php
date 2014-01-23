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


if( isset( $_FILES['images'] ) and is_uploaded_file( $_FILES['images']['tmp_name'] ) )
{
    $title = $nv_Request->get_string('title', 'post', 'no title');
    $description = $nv_Request->get_string('description', 'post', '');
    
	@require_once ( NV_ROOTDIR . "/includes/class/upload.class.php" );

	$upload = new upload( array( 'images' ), $global_config['forbid_extensions'], $global_config['forbid_mimes'], NV_UPLOAD_MAX_FILESIZE, NV_MAX_WIDTH, NV_MAX_HEIGHT );
	$upload_info = $upload->save_file( $_FILES['images'], NV_UPLOADS_REAL_DIR . '/' . $module_name. "/images", false );
	@unlink( $_FILES['images']['tmp_name'] );
	if( empty( $upload_info['error'] ) )
	{
		@chmod( $upload_info['name'], 0644 );

		$image = $upload_info['name'];
		$basename = $basename_file = $upload_info['basename'];

		$imginfo = nv_is_image( $image );
        
        $weight = 150;
        $height = 150;
        
		$basename = preg_replace( '/(.*)(\.[a-zA-Z]+)$/', '\1-' . $weight . '-' . $height . '\2', $basename );
        
        @require_once ( NV_ROOTDIR . "/includes/class/image.class.php" );
        
		$_image = new image( $image, $weight, $height );
		$_image->resizeXY( $weight, $height );
		$_image->save( NV_UPLOADS_REAL_DIR . '/' . $module_name . "/thumb", $basename );
        
		if( file_exists( NV_UPLOADS_REAL_DIR . '/' . $module_name . '/thumb/' . $basename ) )
		{
			$imgthumb = NV_UPLOADS_REAL_DIR . '/' . $module_name . '/thumb/' . $basename;
			//@chmod($file_name, 0644);
			$imgthumb = str_replace( NV_ROOTDIR . "/" . NV_UPLOADS_DIR . "/", "", $imgthumb );
			//@nv_deletefile( $upload_info['name'] );
		}

		$sql = "INSERT INTO `" . NV_PREFIXLANG . "_" . $module_name .  "_picture` 
        (`id`, `title`, `description`, `image`, `thumb`, `stauts`) VALUES (
        NULL, " . $db->dbescape_string( $title ) . ", " . $db->dbescape_string( $description ) . ", " . $db->dbescape_string( $module_name . "/images/" . $basename_file ) . ", " . $db->dbescape_string( $imgthumb ) . ",0)";
        if( $db->sql_query_insert_id( $sql ) > 0 ){
            
            Header( "Location: " . NV_BASE_SITEURL . "index.php?" . NV_NAME_VARIABLE . "=" . $module_name . "&" . NV_OP_VARIABLE . "=main" );
             
        }else{
            $error = $lang_module['upload_error']; 
        }
        
	}
	else
	{
		$error = $upload_info['error'];
	}
}


$array_data = array();



$contents = nv_theme_nvalbums_content( $array_data, $error );

include ( NV_ROOTDIR . "/includes/header.php" );
echo nv_site_theme( $contents );
include ( NV_ROOTDIR . "/includes/footer.php" );

?>