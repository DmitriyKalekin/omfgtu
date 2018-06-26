<h1>Details</h1>
<table>
  <tbody>
    <tr>
      <td>
        Name
      </td>
      <td>
        Surname
      </td>
    </tr>
    <tr id=<?php echo $result[0]["id"];?>>
      <td>
        <?php echo $result[0]["Name"];?>
      </td>
      <td>
        <?php echo $result[0]["Surname"];?>
      </td>
      <td>
        <a href="/users/details/<?php echo $result[0]["id"];?>">Details</a>
      </td>
      <td>
        <a href="/users/update/<?php echo $result[0]["id"];?>">Update</a>
      </td>
      <td>
        <a href="/users/delete/<?php echo $result[0]["id"];?>">Delete</a>
      </td>
    </tr>
  </tbody>
</table>
