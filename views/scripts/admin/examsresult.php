<script language="javascript">
    $(document).ready(function(){
        $("#range_from").datepicker({dateFormat: 'yy-mm-dd'});
        $("#range_to").datepicker({dateFormat: 'yy-mm-dd'});
        $('#range_from').change(function(){
            //alert($(this).val());
            if ( $('#range_to').val().length > 1 ) {
                $.post('index.php?admin/examsresult',{ 'from' : $('#range_from').val(), 'to' : $('#range_to').val() },
                function( data ){
                    $('#result').html( data );
                })
            }
        });
        $('#range_to').change(function(){
            if ( $('#range_from').val().length > 1 ) {
                $.post('index.php?admin/examsresult',{ 'from' : $('#range_from').val(), 'to' : $('#range_to').val() },
                function( data ){
                    $('#result').html( data );
                })
            }
        });
    });
</script>

<style>
    .table-new {border:1px solid #00688B;text-align: center; margin-left:50px; margin-bottom:15px;}
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

<div style="width: 90%; height: auto;">
    <table width="100%">
        <tr>
            <td class="mcstyle" align="right"> 
                Exam From 
                <input maxlength="10" id="range_from" name="range_from" class="user_input" type="text" value="2013-04-03">
                &nbsp;&nbsp;&nbsp;
                Exam To 
                <input maxlength="10" id="range_to" name="range_to" class="user_input" type="text">
            </td>
        </tr>
    </table>
    <div id="result" style="width: 100%; margin: 0 auto;">
        <table width="100%" class="table-new" border="0" cellspacing="0" cellpadding="5">
            <tr class="tr-head">
                <td widt="100" align="center" class="line2">  Examinees Name </td>
                <td width="300" align="center" class="line2">Exam Name </td>
                <td width="10" align="center" class="line2">Scores </td>
                <td width="50" align="center" class="line2">Exam </br>Remarks </td>
                <td width="60" align="center" class="line2">Check </br> Status  </td>
                <td align="center" class="">  View </td>
            </tr>

            <?php
            //print_r($data);
            if (is_array($data['exam'])) {
                foreach ($data['exam'] as $row) {
                    ?>
                    <tr>
                        <td align="center" class="line"> <?php echo $row['user_lname'] . ', ' . $row['user_fname']; ?></td>
                        <td align="center" class="line"> <?php echo $row['exam_name']; ?></td>
                        <td align="center" class="line"> <?php echo ( $data[$row['user_id']][$row['exam_id']][0]['score'] == $row['passing_score'] ) ? 'PERFECT' : $data[$row['user_id']][$row['exam_id']][0]['score'] . ' over '. $row['passing_score']; ?> </td>
                        <td align="center" class="line">
                            <?php
                           // echo $data[$row['user_id']][$row['exam_id']][0]['score'];
                            
                            if ((($data[$row['user_id']][$row['exam_id']][0]['score'] / $row['passing_score']) * 100 ) >= $row['passing_grade']) {
                                echo "<span style='color: green;'><b>Passed</b></span>";
                            } else {
                                echo "<span style='color: red;'><b>Failed</b></span>";
                               //echo  ($data[$row['user_id']][0]['score'] / $row['passing_score']) * 100;
                                //echo $data[$row['user_id']][0]['score'];
                            }
                            
                            ?> 
                        </td>
                        <td align="center" class="line"> <?php echo ($row['check_status'] == 1 ) ? '<b>Checked</b>' : "<span style='color: red;'><b><i>Not Yet</i></b></span>";?> </td>
                        <td align="center" class="line1"> <a href="javascript:loadPage('index.php?admin/checkresult&exam_id=<?php echo $row['exam_id']; ?>' + '&user_id=<?php echo $row['user_id']; ?>');"> Check Results</a></td>

                    </tr>
                    <?php
                }
            }
            ?>

        </table>
    </div>
</div>