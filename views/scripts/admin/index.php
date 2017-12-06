
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
<div style="width: 100%; /*height: auto*/; overflow: hidden;">
    <table width="90%" class="table-new" border="0" cellspacing="0" cellpadding="5">
        <tr class="tr-head">
            <td width="150" align="center" class="line2"> Firstname </td>
            <td width="100" align="center" class="line2"> Lastname </td>
            <td width="100" align="center" class="line2"> Username </td>
            <td width="100" align="center" class="line2"> Department </td>
            <td width="100" align="center" class="line2"> Role </td>
            <td width="100" align="center" class="line2"> Date Registered </td>
            <td width="100" align="center" class=""> Action</td>
        </tr>

        <?php
        if (is_array($data)) {
            foreach ($data as $row) {
                ?>
                <?php
                if ($row['user_enabled'] == 1) {
                    if ($row['exam_checker'] == 1) {
                        $color = '#ffe1e1';
                    } else {
                        $color = '';
                    }
                } else {
                    $color = '#E5E5E5';
                }
                ?>
                <tr style="background: <?php echo $color; ?>">
                    <td align="center" class="line"> <?php echo $row['user_fname']; ?> </td>
                    <td align="center" class="line"> <?php echo $row['user_lname']; ?> </td>
                    <td align="center" class="line"> <?php echo $row['user_name']; ?> </td>
                    <td align="center" width="210" class="line"> <?php echo $row['department_name']; ?> </td>
                    <td align="center" width="210" class="line"> <?php echo $row['role_name']; ?> </td>
                    <td align="center" class="line"> <?php echo date('m-d-Y', strtotime($row['user_createdon'])); //$row['user_createdon'];                     ?> </td>
                    <td align="center" class="line1">
                        <a href="javascript:loadPage('index.php?admin/useredit&user_id=<?php echo $row['user_id']; ?>');"> Edit </a>&nbsp;|
                        <a href="javascript:deleteData('index.php?admin/userdelete&user_id=<?php echo $row['user_id']; ?>','index.php?admin/users');"> Delete </a>
                    </td>
                </tr>
                <?php
            }
        }
        ?>
    </table>
</div>