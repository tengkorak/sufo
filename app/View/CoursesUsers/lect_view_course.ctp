<?php include '/navbar/lectNavBar.php'; ?>

<div class="container-fluid">
  <div class="row-fluid">
    <div class="span2">
      <!--Sidebar content-->
      <?php echo 'Welcome, '.$this->Session->read('User.fname'); ?> <br/><br/>
      
      <?php include '/navbar/lectSideBar.php'; ?>
      sidebar nih
    </div>
    <div class="span10">
      <!--Body content-->
      
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
      
    </div>
  </div>
</div>