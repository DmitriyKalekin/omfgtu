<table id="example" class="display" cellspacing="10"> 
        <thead> 
            <tr>
                <th>name</th>
                <th>surname</th>
            </tr>
        </thead>
        <tbody>
            <?php 
		foreach ($result as $row) {?>
            <tr>
                <td><?php echo $row['name'];?></td>
                <td><?php echo $row['surname'];?></td>
            </tr>
            <?php } // end foreach?>
        </tbody>
        </table>
        <td><a href="/user/show">back</a></td>