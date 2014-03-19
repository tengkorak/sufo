<div class="surveys lectviewGroupScore">
    
    <?php echo "Course: ".$otherInfo['cCodeName'];?> <br/>
    <?php echo "Group: ".$otherInfo['gName'];?> <br/>
    <?php echo "Semesters: ".$otherInfo['semFName'];?> <br/><br/>
    
    <table>
        <tr>
            <th>Part</th>
            <th>Average</th>
        </tr>
        <tr>
            <td>A</td>
            <td><?php echo $averagePart['avgPartA']; ?></td>
        </tr>
        <tr>
            <td>B</td>
            <td><?php echo $averagePart['avgPartB']; ?></td>
        </tr>
        <tr>
            <td>C</td>
            <td><?php echo $averagePart['avgPartC']; ?></td>
        </tr>
        <tr>
            <td>D</td>
            <td><?php echo $averagePart['avgPartD']; ?></td>
        </tr>
    </table>
    
    <table>
	<tr>
            <th>No.</th>
            <th><center>Question</center></th>
            <th><center>Strongly Disagree <br/> 1</center></th>
            <th><center>Disagree <br/> 2</center></th>
            <th><center>Agree <br/> 3</center></th>
            <th><center>Strongly Agree <br/> 4</center></th>
            <th><center>Average</center></th>
	</tr>
        <?php //print_r($scoresArray); ?>
	<?php foreach ($scoresArray as $markah): ?>
	<tr>
            <td><center><?php echo $markah['qNum'];?></center></td>
            <td><?php echo $markah['qDesc']; ?></td>
            <td><center><?php echo $markah['totalVal1']; ?></center></td>
            <td><center><?php echo $markah['totalVal2']; ?></center></td>
            <td><center><?php echo $markah['totalVal3']; ?></center></td>
            <td><center><?php echo $markah['totalVal4']; ?></center></td>
            <td><center><?php echo $markah['average']; ?></center></td>
	</tr>
        <?php endforeach; ?>
	</table>
    <br/>
    
    
    
</div>