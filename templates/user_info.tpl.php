<table id="example" class="display" cellspacing="10"> 
        <thead> 
            <tr>
                <th>name</th>
                <th>surname</th>
            </tr>
        </thead>
        <tbody> 
            <tr>
                <td><?php echo $result[0]['name'];?></td>
                <td><?php echo $result[0]['surname'];?></td>
            </tr>
        </tbody>
        </table>
        <td><a href="/user/show">back</a></td>