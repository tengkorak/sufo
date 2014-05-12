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
                    <th> Course Group </th>
                    <th> Semesters </th>
                    <th><center> A </center></th>
                    <th><center> B </center></th>
                    <th><center> C </center></th>
                    <th><center> D </center></th>
                </tr>
                <?php foreach ($uiData as $data): ?>
                <tr>

                    <td><?php echo $this->HTML->link($data['grpName'], array('controller'=> 'Surveys', 'action'=> 'lectViewGroupScore', $data['cID'], $data['grpID'], $data['semID'])) ;?></td>
                    <td><?php echo $data['semStartMon']." ".$data['semStartYear']." - ".$data['semEndMon']." ".$data['semEndYear']; ?></td>
                    <td><center> <?php echo $data['avgPartA']; ?> </center></td>
                    <td><center> <?php echo $data['avgPartB']; ?> </center></td>
                    <td><center> <?php echo $data['avgPartC']; ?> </center></td>
                    <td><center> <?php echo $data['avgPartD']; ?> </center></td>
                </tr>

                <?php endforeach; ?>
                </table>

        </div>
      
    </div>
  </div>
</div>