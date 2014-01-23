<!-- BEGIN: main -->
<table class="tab1">
    <thead>
        <tr>
            <td>{LANG.title}</td>
            <td>{LANG.description}</td>
            <td>{LANG.images}</td>
            <td>{LANG.thumb}</td>
        </tr>
    </thead>
    <!-- BEGIN: loop -->    
    <tr>
        <td>{DATA.title}</td>
        <td>{DATA.description}</td>
        <td><img src="{DATA.image}" width="120" /></td>
        <td><img src="{DATA.thumb}" width="60" /></td>
    </tr>
    <!-- END: loop -->
</table>

<!-- END: main -->