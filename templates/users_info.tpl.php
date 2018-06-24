	<table id="example" class="display" cellspacing="10"> 
        <thead> 
            <tr>
                <th>name</th>
                <th>surname</th>
            </tr>
        </thead>
        <tbody>
        <a href="/user/createform">create</a>
            <?php 
		foreach ($result as $row) {?>
            <tr id = <?php echo $row['id']?>>
                <td><?php echo $row['name'];?></td>
                <td><?php echo $row['surname'];?></td>
                <td><a href="/user/info/<?php echo $row['id'];?>">details</a></td>
                <td><a href="/user/updateForm/<?php echo $row['id'];?>">edit</a></td>
                <td><a href="/user/deleteUser/<?php echo $row['id'];?>">delete</a></td>
            </tr>
            <?php } // end foreach?>
        </tbody>
        </table>
