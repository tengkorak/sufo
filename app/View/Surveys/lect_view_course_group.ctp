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
	</tr>
	<?php foreach ($datas as $data): ?>
	<tr>
            
            <td><?php echo $this->HTML->link($data['grp']['name'], array('controller'=> 'Surveys', 'action'=> 'lectViewGroupScore', $data['c']['id'], $data['grp']['id'], $data['sem']['id'])) ;?></td>
            <td><?php echo $data['sem']['startmonth']." ".$data['sem']['startyear']." - ".$data['sem']['endmonth']." ".$data['sem']['endyear']; ?></td>
            
	</tr>
        
        <?php endforeach; ?>
	</table>
    
</div>