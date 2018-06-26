<h1>Users</h1>
<table>
  <tbody>
    <a href="/users/create">Create</a>
    <tr>
      <td>
        Name
      </td>
      <td>
        Surname
      </td>
    </tr>
    <?php foreach ($result as $row) {?>
    <tr id=<?php echo $row["id"];?>>
      <td>
        <?php echo $row["Name"];?>
      </td>
      <td>
        <?php echo $row["Surname"];?>
      </td>
      <td>
        <a href="/users/details/<?php echo $row["id"];?>">Details</a>
      </td>
      <td>
        <a href="/users/update/<?php echo $row["id"];?>">Update</a>
      </td>
      <td>
        <a href="/users/delete/<?php echo $row["id"];?>">Delete</a>
      </td>
    </tr>
    <?php }?>
  </tbody>
</table>
