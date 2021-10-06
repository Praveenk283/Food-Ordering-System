<!DOCTYPE html>
<html lang="en">


<?php require("1_metatags.php"); ?>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

<?php require("2_header.php"); ?>
<?php require("3_sidebar.php"); ?>

    <form action="admin_insert.php" enctype="multipart/form-data" method="post">
        <table  align="center" height="200">
            <tr>
                <td colspan="2">Enter Admin Details</td>
            </tr>

            <tr>
                <td>ID</td>
                <td> <input type="text" name="ad_id" id="ad_id"></td>
			</tr>
            <tr>
                <td>Name</td>
                <td><input type="text" name="ad_name" id="ad_name"></td>
            </tr>
            <tr>
                <td>Contact</td>
                <td> <input type="text" name="ad_contact" id="ad_contact"></td>
            </tr>
             <tr>
                <td>Email</td>
                <td> <input type="text" name="ad_email" id="ad_email"></td>
            </tr>
             <tr>
                <td>Address</td>
                 <td> <textarea type="text" name="ad_address" id="ad_address"></textarea></td>
            </tr>
             <tr>
                <td>Username</td>
                <td> <input type="text" name="ad_username" id="ad_username"></td>
            </tr>
            <tr>
                <td>Password</td>
                <td> <input type="text" name="ad_password" id="ad_password"></td>
            </tr>
            <tr>
                <td>Date</td>
                <td> <input type="text" name="ad_date" id="ad_date" readonly value="<?php echo date('d-m-Y');?>"></td>
            </tr>
            <tr align="center">
                <td colspan="2">
                    <input type="submit" value="Submit">
                    &ensp;
                    <input type="button" value="Cancel">
                </td>
            </tr>

        </table>
    </form>

    <?php require("4_footer_name.php"); ?>
<?php require("5_footerscripts.php"); ?>


</html>