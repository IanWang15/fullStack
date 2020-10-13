<?php
include('lib/common.php');
include('lib/common_function.php');
// written by GTusername4
check_login();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = $_POST;
    $breed = $data['breed'];
    unset($data['breed']);
    $data['username'] = $_SESSION['username'];
    $auth = $sqlhelp->insert_by_arr($data, 'animal');
    //breed
    $breed_data = ['pet_ID'=>$auth];
    foreach ($breed as $key=>$item){
        if(!empty($item)){
            $breed_data['breed_type'.($key + 1)] = $item;
        }else{
            unset($breed[$key]);
        }

    }
    if(!empty($breed)){
        sort($breed);
        $breed_str = implode(' / ', $breed);
    }else{
        $breed_str = "Unknown";
    }
    $breed_data['breed_type_combination'] = $breed_str;
    $auth_breed = $sqlhelp->insert_by_arr($breed_data, 'animal_is_breed');
    header("Location: animal_detail.php?pet_ID=".$auth);
}

$sex_arr = ['Unknown', 'F', 'M'];
$alteration_arr = ['', 'neutered', 'spayed'];
$animal_control_arr = ['No', 'Yes'];
$species_arr = $sqlhelp->get_rows("SELECT * from species");
$breed_arr = $sqlhelp->get_rows("SELECT * from breed");
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
                    <th width="200px">name</th>
                    <td><input type="text" name="name" required class="i-input"></td>
                </tr>
                <tr>
                    <th>species</th>
                    <td>
                        <select name="species_type" required class="i-input">
                            <?php foreach ($species_arr as $species): ?>
                                <option value="<?= $species['species_type'] ?>"><?= $species['species_type'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th>breed</th>
                    <td>
                        <select name="breed[]" class="i-input">
                            <?php foreach ($breed_arr as $breed): ?>
                                <option value="<?= $breed['breed_type'] ?>"><?= $breed['breed_type'] ?></option>
                            <?php endforeach; ?>
                        </select>
                        <select name="breed[]" class="i-input">
                            <option value=""></option>
                            <?php foreach ($breed_arr as $breed): ?>
                                <option value="<?= $breed['breed_type'] ?>"><?= $breed['breed_type'] ?></option>
                            <?php endforeach; ?>
                        </select>
                        <select name="breed[]" class="i-input">
                            <option value=""></option>
                            <?php foreach ($breed_arr as $breed): ?>
                                <option value="<?= $breed['breed_type'] ?>"><?= $breed['breed_type'] ?></option>
                            <?php endforeach; ?>
                        </select>
                        <select name="breed[]" class="i-input">
                            <option value=""></option>
                            <?php foreach ($breed_arr as $breed): ?>
                                <option value="<?= $breed['breed_type'] ?>"><?= $breed['breed_type'] ?></option>
                            <?php endforeach; ?>
                        </select>
                        <select name="breed[]" class="i-input">
                            <option value=""></option>
                            <?php foreach ($breed_arr as $breed): ?>
                                <option value="<?= $breed['breed_type'] ?>"><?= $breed['breed_type'] ?></option>
                            <?php endforeach; ?>
                        </select>
                        <select name="breed[]" class="i-input">
                            <option value=""></option>
                            <?php foreach ($breed_arr as $breed): ?>
                                <option value="<?= $breed['breed_type'] ?>"><?= $breed['breed_type'] ?></option>
                            <?php endforeach; ?>
                        </select>
                        <select name="breed[]" class="i-input">
                            <option value=""></option>
                            <?php foreach ($breed_arr as $breed): ?>
                                <option value="<?= $breed['breed_type'] ?>"><?= $breed['breed_type'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th>sex</th>
                    <td>
                        <select name="sex" required class="i-input">
                            <?php foreach ($sex_arr as $sex): ?>
                                <option value="<?= $sex ?>"><?= $sex ?></option>
                            <?php endforeach; ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th>alteration status</th>
                    <td>
                        <select name="alteration_status" class="i-input">
                            <?php foreach ($alteration_arr as $alteration): ?>
                                <option value="<?= $alteration ?>"><?= $alteration ?></option>
                            <?php endforeach; ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th>age</th>
                    <td><input type="text" name="age" class="i-input"></td>
                </tr>
                <tr>
                    <th>description</th>
                    <td><input type="text" name="description" class="i-input"></td>
                </tr>
                <tr>
                    <th>surrender date</th>
                    <td><input type="date" name="surrender_date" class="i-input"></td>
                </tr>
                <tr>
                    <th>reason</th>
                    <td><input type="text" name="reason" class="i-input"></td>
                </tr>
                <tr>
                    <th>microchip ID</th>
                    <td><input type="text" name="microchip_ID" class="i-input"></td>
                </tr>
                <tr>
                    <th>by animal control</th>
                    <td><select name="by_animal_control" class="i-input">
                            <?php foreach ($animal_control_arr as $animal_control): ?>
                                <option value="<?= $animal_control ?>"><?= $animal_control ?></option>
                            <?php endforeach; ?>
                        </select>

                    </td>
                </tr>
                <tr>
                    <th></th>
                    <td><button type="submit">submit</button></td>
                </tr>
            </table>

        </form>
    </div>

    <?php include("lib/footer.php"); ?>

</div>
</body>
</html>
