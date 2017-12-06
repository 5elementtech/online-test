<style>
    .table-new {border:1px solid #00688B;text-align: center; margin-left:50px;}
    .table-new tbody{border: 1px solid #00688B;}
    .line {border-right: 1px solid #00688B;padding-right: 2px;margin-right: 5px;border-top: 1px solid #00688B;font-family: 'Lucida Grande',Helvetica,Arial,Verdana,sans-serif; font-size: 0.8em; color: #535353!important;}
    .line1{border-top: 1px solid #00688B;font-family: 'Lucida Grande',Helvetica,Arial,Verdana,sans-serif; font-size: 0.8em; color: #535353!important;}
    .line2{border-right: 1px solid #00688B;font-family: 'Lucida Grande',Helvetica,Arial,Verdana,sans-serif; font-size: 0.8em; color: #535353!important; font-weight:bold;}


    .error-msg{
        overflow:hidden;
        width:900px; 
    }
    .error-msg h5{
        overflow:hidden;
        color:#F00;
        text-transform:uppercase;
        background: white;
    }
    .mcstyle{
        font-family: 'Lucida Grande',Helvetica,Arial,Verdana,sans-serif; font-size: 0.8em; color: #535353!important;
    }
</style>
<div style="width: 100%; height: auto;">
    <table width="90%" class="table-new" border="0" cellspacing="0" cellpadding="5">
        <tr class="tr-head">
            <td width="300" class="line2"> Department Name </td>
            <td widt="100" class="" > Action </td>
        </tr>
        <?php
        if (is_array($data)) {
            foreach ($data as $row) {
                ?>
                <tr>
                    <td class="line"> <?php echo $row['department_name']; ?> </td>
                    <td width="100" align="center" class="line1">
                        <a href="javascript:loadPage('index.php?admin/departmentedit&department_id=<?php echo $row['department_id']; ?>');"> Edit</a>&nbsp;|
                        <a href="javascript:deleteData('index.php?admin/departmentdelete&department_id=<?php echo $row['department_id']; ?>','index.php?admin/departments');"> Delete</a>
                        <!--
                        <input type="button" id="edit" name="edit" value="Edit" style="width:50px; height: 25px;"/>
                        <input type="button" id="delete" name="delete" value="Delete" style="width: 50px; height: 25px;"/>
                        -->
                    </td>
                </tr>
                <?php
            }
        }
        ?>
    </table>
</div>