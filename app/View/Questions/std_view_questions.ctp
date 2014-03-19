<form name="sv" id="survey" method="POST" action="/sufo2/Surveys/submitSurvey"> 
    <table>
        <tr>
            <th>No.</th>
            <th>Question</th>
            <th>SD</th>
            <th>D</th>
            <th>A</th>
            <th>SA</th>
        </tr>
        
        <?php foreach ($qA1 as $ques1): ?>
        <?php
            $rname1 = "<input type='radio' name='survey[qA1][".$ques1['questions']['id']."]' value='1' />";
            $rname2 = "<input type='radio' name='survey[qA1][".$ques1['questions']['id']."]' value='2' />";
            $rname3 = "<input type='radio' name='survey[qA1][".$ques1['questions']['id']."]' value='3' />";
            $rname4 = "<input type='radio' name='survey[qA1][".$ques1['questions']['id']."]' value='4' />";
        ?>
        <tr>
            <td> <?php echo $ques1['questions']['id']?> </td>
            <td> <?php echo $ques1['questions']['ques']?> </td>
            <td> <?php echo $rname1; ?></td>
            <td> <?php echo $rname2; ?></td>
            <td> <?php echo $rname3; ?></td>
            <td> <?php echo $rname4; ?></td>
        </tr>
        <?php endforeach; ?>
        
        <?php foreach ($qA2 as $ques2): ?>
        <?php
            $tf = "<input type='text' name='survey[qA2][".$ques2['questions']['id']."]' />";
        ?>
        <tr>
            <td> <?php echo $ques2['questions']['id']; ?> </td>
            <td colspan='5'>
                 <?php echo $ques2['questions']['ques']; ?> <br/>
                 <?php echo $tf; ?>
            </td>
        </tr>
        <?php endforeach; ?>
        <tr>
            <td colspan='6'> <center><input type='submit' value='Submit' /></center></td>
        </tr>
    </table>
</form>