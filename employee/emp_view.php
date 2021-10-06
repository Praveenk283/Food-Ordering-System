<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<center>

    <body>
        <table border="1">
            <tr>
                <th colspan="9">employee details</th>
                <th><a href="emp_form.php"> ADD NEW RECORD</a></th>
            </tr>
            <tr>
                <th>ID</th>
                <th>NAME</th>
                <th>CONTACT</th>
                <th>EMAIL</th>
                <th>ADDRESS</th>
                <th>USERNAME</th>
                <th>PASSWORD</th>
                <th>DATE</th>
                <th>EDIT</th>
                <th>DELETE</th>
            </tr>
            <?php
      require("database_connectivity.php");
      $sql=$conn->prepare("SELECT * FROM employee");
      $sql->execute();
      $result=$sql->get_result();
      $sno=1;
      while($row=$result->fetch_assoc())
      {
       ?>
                <tr>
                    <td>
                      <?php echo $sno++;?>
                    </td>
                    <td>
                      <?php echo $row["e_name"];?>
                    </td>
                    <td>
                      <?php echo $row["e_contact"];?>
                    </td>
                    <td>
                      <?php echo $row["e_email"];?>
                    </td>
                    <td>
                       <?php echo $row["e_address"];?>
                    </td>
                    <td>
                       <?php echo $row["e_username"];?>
                    </td>
                    <td>
                       <?php echo $row["e_password"];?>
                    </td>
                    <td>
                        <?php echo $row["e_date"];?>
                    </td>
                    <td>
                        <form method="post" action="emp_edit_form.php" enctype="multipart/form-data">
                            <input type="hidden" name="e_id" id="e_id" value="<?php echo $row["e_id"];?>">
                            <input type="submit" value="EDIT">
                        </form>

                    </td>
                    <td>
                        <form method="post" action="emp_delete.php" enctype="multipart/form-data">
                            <input type="hidden" name="e_id" id="e_id" value="<?php echo $row["e_id"];?>">
                            <input type="submit" value="DELETE">
                        </form>
                    </td>
                </tr>
                <?php
     }
      ?>
        </table>
    </body>
</center>

</html>
