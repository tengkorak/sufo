<?php echo 'Welcome, '.$this->Session->read('User.fname'); ?> <br/><br/>

<?php print_r($datas); ?>

<table>
    <tr>
        <th>No.</th>
        <th>Name</th>
        <th>Course</th>
        <th>Group</th>
        <th>A</th>
        <th>B</th>
        <th>C</th>
        <th>D</th>
        <th>AVG</th>
        <th>Action</th>
    </tr>
    <?php $no = 1;?>
    <?php foreach($datas as $data): ?>
    
    <tr>
        <td> <?php echo $no; ?> </td>
        <td> <?php echo $data['usr']['fname']; ?> </td>
        <td> <?php echo $data['c']['courseCode']." - ".$data['c']['courseName']; ?> </td>
        <td> <?php echo $data['grp']['grpName']; ?> </td>
        <td> </td>
        <td> </td>
        <td> </td>
        <td> </td>
        <td> </td>
        <td> <?php echo "View Details"; ?> </td>
    </tr>
    
    <?php $no++; ?>
    <?php endforeach; ?>
</table>

