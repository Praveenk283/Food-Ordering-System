<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>

<body>
    <form action="emp_insert.php" enctype="multipart/form-data" method="post">
        <table  align="center" height="200">
            <tr>
                <td colspan="2">Enter Employee Details</td>
            </tr>

            <tr>
                <td>e_id</td>
                <td> <input type="text" name="e_id" id="e_id"></td>
			</tr>
            <tr>
                <td>Name</td>
                <td><input type="text" name="e_name" id="e_name"></td>
            </tr>
            <tr>
                <td>Contact</td>
                <td> <input type="text" name="e_contact" id="e_contact"></td>
            </tr>
             <tr>
                <td>Email ID</td>
                <td> <input type="text" name="e_email" id="e_email"></td>
            </tr>
             <tr>
                <td>Address</td>
                 <td> <textarea type="text" name="e_address" id="e_address"></textarea></td>
            </tr>
             <tr>
                <td>Username</td>
                <td> <input type="text" name="e_username" id="e_username"></td>
            </tr>
            <tr>
                <td>Password</td>
                <td> <input type="text" name="e_password" id="e_password"></td>
            </tr>
            <tr>
                <td>Date</td>
                <td> <input type="date" name="e_date" id="e_date"></td>
            </tr>
            <tr align="center">
                <td colspan="2">
                    <input type="submit" value="ADD">&nbsp;
                    <input type="button" value="CANCEL">
                </td>
            </tr>

        </table>
    </form>
</body>

</html>