<?php
include('lib/common.php');
include('lib/common_function.php');
// written by GTusername4
check_login();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = $_POST;
    $data['date_app'] = date("Y-m-d");
    $data['adopt_status'] = "pending";
    $auth = $sqlhelp->insert_by_arr($data, 'adoption_application');
    header("Location: Adoption_ApplicationResult.php?application_ID=".$auth);
}

?>

<?php include("lib/header.php"); ?>
<title>GTOnline Profile</title>
</head>

<body>
<style>
    .table > tbody > tr > td, .table > tbody > tr > th, .table > tfoot > tr > td, .table > tfoot > tr > th, .table > thead > tr > td, .table > thead > tr > th {
        padding: 8px;
        line-height: 1.42857143;
        vertical-align: top;
        border-top: 1px solid #ddd;
    }

    .table th {
        text-align: right;
    }

    .i-input {
        width: 300px;
        border-radius: 5px;
        padding: 3px 5px;
    }
</style>
<div id="main_container">
    <?php include("lib/menu.php"); ?>

    <div class="center_content">
        <form method="post">
            <table class="table">
                <tr>
                    <th>last name</th>
                    <td><input type="text" name="last_name" class="i-input"></td>
                </tr>
                <tr>
                    <th>email</th>
                    <td><input type="email" name="email" class="i-input"></td>
                </tr>
                <tr>
                    <th></th>
                    <td>
                        <button type="submit">submit</button>
                    </td>
                </tr>
            </table>

        </form>
    </div>

    <?php include("lib/footer.php"); ?>

</div>
</body>
</html>
