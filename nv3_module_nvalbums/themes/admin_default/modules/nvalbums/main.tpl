<!-- BEGIN: main -->
	<form action="{NV_BASE_ADMINURL}index.php?{NV_NAME_VARIABLE}={MODULE_NAME}&{NV_OP_VARIABLE}={OP}" method="post">
		<table class="tab1">
        <thead>
            <tr>
                <td>{LANG.title}</td>
                <td>{LANG.description}</td>
                <td>{LANG.images}</td>
                <td>{LANG.thumb}</td>
                <td>{LANG.active}</td>
                <td>{LANG.funcs}</td>
            </tr>
        </thead>
        <!-- BEGIN: loop -->    
        <tr>
            <td>{DATA.title}</td>
            <td>{DATA.description}</td>
            <td><img src="{DATA.image}" width="120" /></td>
            <td><img src="{DATA.thumb}" width="60" /></td>
            <td><input onclick="change_staus({DATA.id})" type="checkbox"{DATA.ck} name="active" value="{DATA.id}" /></td>
            <td>
                <a href="javascript:void(0);" onclick="nv_del_img({DATA.id});" >{LANG.delete}</a>
            </td>
        </tr>
        <!-- END: loop -->
    </table>
	</form>
<!-- END: main -->
