<?php print_r($uiData); ?>
<div class="surveys lectviewcoursegroup">
    
    <?php 
        if(!empty($datas))
        {
            echo $datas[0]['c']['code']." - ".$datas[0]['c']['name']."<br/><br/>";
        }
        else
        {
            echo "No Groups Found <br/><br/>";
        }
    ?>
    <table cellpadding="0" cellspacing="0">
	<tr>
            <th>Course Group</th>
            <th>Semesters</th>
            <th>A</th>
            <th>B</th>
            <th>C</th>
            <th>D</th>
	</tr>
	<?php foreach ($uiData as $data): ?>
	<tr>
            
            <td><?php echo $this->HTML->link($data['grpName'], array('controller'=> 'Surveys', 'action'=> 'lectViewGroupScore', $data['cID'], $data['grpID'], $data['semID'])) ;?></td>
            <td><?php echo $data['semStartMon']." ".$data['semStartYear']." - ".$data['semEndMon']." ".$data['semEndYear']; ?></td>
            <td><?php echo $data['avgPartA']; ?></td>
            <td><?php echo $data['avgPartB']; ?></td>
            <td><?php echo $data['avgPartC']; ?></td>
            <td><?php echo $data['avgPartD']; ?></td>
	</tr>
        
        <?php endforeach; ?>
	</table>
    
</div>