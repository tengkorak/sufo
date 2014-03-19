<?php echo 'Welcome, '.$this->Session->read('User.fname'); ?> <br/><br/>

<div class="coursesusers lectviewcourse">
    
    <?php //print_r($datas); ?>
    <table cellpadding="0" cellspacing="0">
	<tr>
            <th>Course Code/Name</th>
	</tr>
	<?php foreach ($datas as $data): ?>
	<tr>
            
            <td><?php echo $this->HTML->link($data['c']['code']." - ".$data['c']['name'], array('controller'=> 'Surveys', 'action'=> 'lectViewCourseGroup', $data['c']['code'])) ;?></td>
            
	</tr>
        
   <?php endforeach; ?>
    </table>
    
</div>