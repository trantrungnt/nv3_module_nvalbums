/**
 * @Project NUKEVIET 3.x
 * @Author VINADES.,JSC (contact@vinades.vn)
 * @Copyright (C) 2013 VINADES.,JSC. All rights reserved
 * @Createdate Sun, 29 Dec 2013 03:14:44 GMT
 */
 
 function nv_del_img( id ){
    if( confirm('Ban co chac muon xoa anh nay khong?')){
        nv_ajax("post", script_name, nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '=content&id=' + id + '&num=' + nv_randomPassword(8), '', 'nv_del_result');
    }
    else alert("no");
 }
 function nv_del_result( res ){
    res = res.split("_");
    if( res[0] == "OK" )
    {
        alert(res[1]);
        window.location.href = window.location.href; 
    }
    else alert(res[1] );
 }
 function change_staus( id ){
    if( confirm('Ban co chac muon thay doi trang thai anh khong?')){
        nv_ajax("post", script_name, nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '=content&change=1&id=' + id + '&num=' + nv_randomPassword(8), '', 'nv_del_result');
    }
    else alert("no");
 }