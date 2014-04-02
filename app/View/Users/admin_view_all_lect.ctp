<?php echo 'Welcome, '.$this->Session->read('User.fname'); ?> <br/><br/>

<?php //print_r($datas); ?>

<form name="search" method="POST" action="/sufo/users/adminSearchUserResult">
    <table>
        <tr>
            <td colspan="2">Search User</td>
        </tr>
        <tr>
            <td>Keyword</td>
            <td><input type="text" name="keyword" /> </td>
        </tr>
        <tr>
            <td>Search Field</td>
            <td>
                <select name="srchField">
                    <option value="NULL">--- Please Select ---</option>
                    <option value="userID">User ID</option>
                    <option value="fname">User Name</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>Faculty</td>
            <td>
                <select name="faculty">
                    <option value="NULL" >--- Please Select ---</option>
                    <?php foreach($facDatas as $facData): ?>
                        <?php echo "<option value='".$facData['faculties']['id']."'>".$facData['faculties']['name']."</option>"; ?>
                    <?php endforeach; ?>
                </select>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <center>
                    <button type="submit" name="submit"> Search </button>
                    <button type="reset" name="reset"> Cancel </button>
                </center>
            </td>
        </tr>
    </table>
</form>

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
        <th> </th>
    </tr>
    <?php $no = 1; ?>
    <?php foreach($datas as $data): ?>
    
    <tr>
        <td> <?php echo $no; ?> </td>
        <td> <?php echo $data['fName']; ?> </td>
        <td> <?php echo $data['cCode']." - ".$data['cName']; ?> </td>
        <td> <?php echo $data['grpName']; ?> </td>
        <td> <?php echo $data['avgPartA']; ?> </td>
        <td> <?php echo $data['avgPartB']; ?> </td>
        <td> <?php echo $data['avgPartC']; ?> </td>
        <td> <?php echo $data['avgPartD']; ?> </td>
        <td> </td>
        <td> <?php echo $this->Html->link('View Details', array('controller'=> 'Surveys', 'action'=> 'adminViewGroupScore', $data['cID'], $data['grpID'], $data['semID'])); ?> </td>
    </tr>
    
    <?php $no++; ?>
    <?php endforeach; ?>
</table>

