<?php

/**
 * @Project NUKEVIET 3.x
 * @Author VINADES.,JSC (contact@vinades.vn)
 * @Copyright (C) 2013 VINADES.,JSC. All rights reserved
 * @Createdate Sun, 29 Dec 2013 03:14:44 GMT
 */

if ( ! defined( 'NV_IS_MOD_NVALBUMS' ) ) die( 'Stop!!!' );

/**
 * nv_theme_nvalbums_main()
 * 
 * @param mixed $array_data
 * @return
 */
function nv_theme_nvalbums_main ( $array_data )
{
    global $global_config, $module_name, $module_file, $lang_module, $module_config, $module_info, $op;

    $xtpl = new XTemplate( $op . ".tpl", NV_ROOTDIR . "/themes/" . $module_info['template'] . "/modules/" . $module_file );
    $xtpl->assign( 'LANG', $lang_module );

    if( !empty( $array_data )){
        foreach( $array_data as $data ){
            $xtpl->assign( 'DATA', $data );
            $xtpl->parse( 'main.loop' );        
        }
    }
    $xtpl->parse( 'main' );
    return $xtpl->text( 'main' );
}

/**
 * nv_theme_nvalbums_detail()
 * 
 * @param mixed $array_data
 * @return
 */
function nv_theme_nvalbums_detail ( $array_data )
{
    global $global_config, $module_name, $module_file, $lang_module, $module_config, $module_info, $op;

    $xtpl = new XTemplate( $op . ".tpl", NV_ROOTDIR . "/themes/" . $module_info['template'] . "/modules/" . $module_file );
    $xtpl->assign( 'LANG', $lang_module );

    

    $xtpl->parse( 'main' );
    return $xtpl->text( 'main' );
}

/**
 * nv_theme_nvalbums_content()
 * 
 * @param mixed $array_data
 * @return
 */
function nv_theme_nvalbums_content ( $array_data, $error )
{
    global $global_config, $module_name, $module_file, $lang_module, $module_config, $module_info, $op;

    $xtpl = new XTemplate( $op . ".tpl", NV_ROOTDIR . "/themes/" . $module_info['template'] . "/modules/" . $module_file );
    $xtpl->assign( 'LANG', $lang_module );
    if( $error != '' ){
        $xtpl->assign( 'ERROR', $error );    
    }
    

    $xtpl->parse( 'main' );
    return $xtpl->text( 'main' );
}

?>