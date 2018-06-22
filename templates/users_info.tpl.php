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
            <tr>
                <td style="display:none;"><?php echo $row['id'];?></td>
                <td><?php echo $row['name'];?></td>
                <td><?php echo $row['surname'];?></td>
                <td><a href="/user/info">details</a></td>
                <td><a href="/user/editform">edit</a></td>
                <td><a href="/user/deleteUser">delete</a></td>
            </tr>
            <?php } // end foreach?>
        </tbody>
        </table>
