<?php
include('lib/common.php');
include('lib/common_function.php');
// written by GTusername4
check_login();
$pet_ID = get_arg('pet_ID');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = $_POST;
    $data['username'] = $_SESSION['username'];
    $auth = $sqlhelp->insert_by_arr($data, 'vaccination');
    header("Location: animal_detail.php?pet_ID=".$pet_ID);
}

$vaccine_arr = $sqlhelp->get_rows("SELECT * from vaccine");
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
                    <th>vaccine type</th>
                    <td>
                        <select name="vaccine_type" required class="i-input">
                            <?php foreach ($vaccine_arr as $vaccine): ?>
                                <option value="<?= $vaccine['vaccine_type'] ?>"><?= $vaccine['vaccine_type'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th>expiration date</th>
                    <td><input type="date" name="expiration_date" class="i-input"></td>
                </tr>
                <tr>
                    <th>vaccination number</th>
                    <td><input type="text" name="vaccination_number" class="i-input"></td>
                </tr>
                <tr>
                    <th>date admin</th>
                    <td><input type="date" name="date_admin" class="i-input"></td>
                </tr>
                <tr>
                    <th></th>
                    <td>
                        <input type="hidden" name="pet_ID" value="<?=$pet_ID?>">
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
