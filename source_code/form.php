<?php

include('config/db.php');
include('classes/DB.php');
include('classes/Template.php');
include('classes/Agent.php');
include('classes/RoleAgent.php');
include('classes/Senjata.php');

$senjata = new Senjata($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);
$roleAgent = new RoleAgent($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);
$agent = new Agent($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);
$tmp_image = new Agent($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);
$biografi = new Agent($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);
$senjata->open();
$roleAgent->open();
$agent->open();
$tmp_image->open();
$biografi->open();


$senjata_options = null;
$roleAgent_options = null;

$img_edit = "";
$biografi_edit = "";
$nama_edit = "";
$senjata_edit = "";
$roleAgent_edit = "";
$btn_edit = "";

$view_form = new Template('templates/skintambah.html');
if (!isset($_GET['edit'])) {

    if (isset($_POST['submit'])) {
        if ($agent->addAgent($_POST, $_FILES) > 0) {
            echo "
                <script>
                    alert('Data berhasil ditambahkan!');
                    document.location.href = 'index.php';
                </script>
                ";
        } else {
            echo "
                <script>
                    alert('Data berhasil ditambahkan!');
                    document.location.href = 'form.php';
                </script>
                ";
        }
    }


    $btn_edit = "Tambah";
    $senjata->getSenjata();

    // Looping for Shows the data 
    while ($row = $senjata->getResult()) {
        $senjata_options .= "<option value=" . $row['id_senjata'] . ">" . $row['nama_senjata'] . "</option>";
    }



    $roleAgent->getRoleAgent();

    // Looping for shows the data
    while ($row = $roleAgent->getResult()) {
        $roleAgent_options .= "<option value=" . $row['id_role'] . ">" . $row['nama_role'] . "</option>";
    }
} else if (isset($_GET['edit'])) {
    $_ID = $_GET['edit'];
    $tmp_image->getAgent();
    $tmp_image->getAgentById($_ID);
    $biografi->getAgentById($_ID);
    $temp_fix = $tmp_image->getResult();
    $temp_img = $temp_fix['foto_agent'];
    $btn_edit = "Ubah";

    if (isset($_POST['submit'])) {
        if ($agent->updateAgent($_ID, $_POST, $_FILES, $temp_img) > 0) {
            echo "
                <script>
                    alert('Data berhasil diubah!');
                    document.location.href = 'index.php';
                </script>
                ";
        } else {
            echo "
                <script>
                    alert('Data berhasil diubah!');
                    document.location.href = 'index.php';
                </script>
                ";
        }
    }
    // var_dump($_ID);
    // die();
    $agent->getAgentById($_ID);

    $row = $agent->getResult();
    $img_edit = $row['foto_agent'];
    $nama_edit = $row['nama_agent'];
    $senjata_edit = $row['id_senjata'];
    $roleAgent_edit = $row['id_role'];
    $biografi_edit = $row['biografi'];




    $senjata->getSenjata();

    // Looping for Shows the data 
    while ($row = $senjata->getResult()) {
        $select = ($row['id_senjata'] == $senjata_edit) ? 'selected' : "";
        $senjata_options .= "<option value=" . $row['id_senjata'] . " . $select . >" . $row['nama_senjata'] . "</option>";
    }


    // Connect to Tabel Jabatan

    $roleAgent->getRoleAgent();

    // Looping for shows the data
    while ($row = $roleAgent->getResult()) {
        $select = ($row['id_role'] == $roleAgent_edit) ? 'selected' : "";
        $roleAgent_options .= "<option value=" . $row['id_role'] . " . $select . >" . $row['nama_role'] . "</option>";
    }
}

$view_form->replace('IMAGE_DATA', $img_edit);
$view_form->replace('NAMA_DATA', $nama_edit);
$view_form->replace('DESKRIPSI_DATA', $biografi_edit);
$view_form->replace('SENJATA_DATA', $senjata_edit);
$view_form->replace('ROLEAGENT_DATA', $roleAgent_edit);
$view_form->replace('SENJATA_OPTIONS', $senjata_options);
$view_form->replace('ROLEAGENT_OPTIONS', $roleAgent_options);
$view_form->replace('DATA_BUTTON', $btn_edit);
$view_form->write();


$agent->close();
$senjata->close();
$roleAgent->close();
