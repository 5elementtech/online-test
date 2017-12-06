<style>
    .table-new {border:1px solid #00688B;text-align: center; margin-left:50px; margin-bottom:15px;}
    .table-new tbody{border: 1px solid #00688B;}
    .line {border-right: 1px solid #00688B;padding-right: 2px;margin-right: 5px;border-top: 1px solid #00688B;font-family: 'Lucida Grande',Helvetica,Arial,Verdana,sans-serif; font-size: 0.9em; color: #535353!important;}
    .line1{border-top: 1px solid #00688B;font-family: 'Lucida Grande',Helvetica,Arial,Verdana,sans-serif; font-size: 0.9em; color: #535353!important;}
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

<div style="width: 90%; height: auto;">

    <table width="100%" class="table-new" border="0" cellspacing="0" cellpadding="5">
        <tr class="tr-head">
            <td width="270" class="line2"><b> Exam Name </b></td>
            <td width="120" class="line2"> <b>Exam Period </b></td>
            <td width="30" class="line2"> <b>Department </b></td>
            <td widt="150" class="">Action</td>
        </tr>
        <?php
        if (is_array($data)) {
            foreach ($data as $row) {
                // index.php?admin/examedit&exam_id=23
                //$link = "javascript:loadPage('index.php?admin/examedit&exam_id=".$row['exam_id']."')";
                $link = "javascript:loadPage('index.php?admin/questionlist&exam_id=" . $row['exam_id'] . "')";
                ?>
                <tr>
                    <td class="line"> <?php echo $row['exam_name']; ?> </td>
                    <td class="line"> <?php echo date('m-d-Y', strtotime($row['exam_from'])) . ' - ' . date('m-d-Y', strtotime($row['exam_to'])); ?> </td>
                    <td class="line"> <?php echo $row['department_name'];?></td>
                    <td width="100" align="center" class="line1">
                        <a href="javascript:loadPage('index.php?staff/examsresult&exam_id=<?php echo $row['exam_id'] ?>');"> View Result</a>
                    </td>
                </tr>
                <?php
            }
        }
        ?>
    </table>
</div>