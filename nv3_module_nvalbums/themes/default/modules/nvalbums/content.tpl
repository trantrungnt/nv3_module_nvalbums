<!-- BEGIN: main -->
{ERROR}
<form action="" method="post" enctype="multipart/form-data">
    <table class="tab1">
        <tbody>
            <tr>
                <td>{LANG.title}</td>
                <td>
                    <input type="text" name="title" maxlength="100" />
                </td>
            </tr>
        </tbody>
        <tbody class="second">
            <tr>
                <td>{LANG.description}</td>
                <td>
                    <textarea name="description" cols="30" rows="5"></textarea>
                </td>
            </tr>
        </tbody>
        <tbody>
            <tr>
                <td>{LANG.slectimages}</td>
                <td>
                    <input type="file" name="images" />
                </td>
            </tr>
        </tbody>
        <tbody class="second">
            <tr>
                <td></td>
                <td>
                    <input type="submit" value="Submit" />
                </td>
            </tr>
        </tbody>
    </table>
</form>
<!-- END: main -->