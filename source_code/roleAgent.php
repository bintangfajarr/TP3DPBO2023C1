<?php

include('config/db.php');
include('classes/DB.php');
include('classes/RoleAgent.php');
include('classes/Template.php');

$roleAgent = new RoleAgent($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);
$roleAgent->open();
if (isset($_POST['btn-cari'])) {
    $roleAgent->searchRoleAgent($_POST['cari']);
} else if (isset($_POST['btn-filter'])) {
    $roleAgent->filterRoleAgent($_POST['filter']);
} else {
    $roleAgent->getRoleAgent();
}

if (!isset($_GET['id'])) {
    if (isset($_POST['submit'])) {
        if ($roleAgent->addRoleAgent($_POST) > 0) {
            echo "<script>
                alert('Data berhasil ditambah!');
                document.location.href = 'roleAgent.php';
            </script>";
        } else {
            echo "<script>
                alert('Data gagal ditambah!');
                document.location.href = 'roleAgent.php';
            </script>";
        }
    }

    $btn = 'Tambah';
    $title = 'Tambah';
}

$view = new Template('templates/skintabel.html');

$mainTitle = 'Role';
$header = '<tr>
<th scope="row">No.</th>
<th scope="row">Nama Role</th>
<th scope="row">Aksi</th>
</tr>';
$data = null;
$no = 1;
$formLabel = 'Role Agent';

while ($div = $roleAgent->getResult()) {
    $data .= '<tr>
    <th scope="row">' . $no . '</th>
    <td>' . $div['nama_role'] . '</td>
    <td style="font-size: 22px;">
        <a style = "text-decoration:none;"href="roleAgent.php?id=' . $div['id_role'] . '" title="Edit Data">
        <i class="bi bi-pencil-square text-warning"></i>
        </a>&nbsp;
        <a href="roleAgent.php?hapus=' . $div['id_role'] . '" title="Delete Data"><i class="bi bi-trash-fill text-danger"></i></a>
        </td>
    </tr>';
    $no++;
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if ($id > 0) {
        if (isset($_POST['submit'])) {
            if ($roleAgent->updateRoleAgent($id, $_POST) > 0) {
                echo "<script>
                alert('Data berhasil diubah!');
                document.location.href = 'roleAgent.php';
            </script>";
            } else {
                echo "<script>
                alert('Data gagal diubah!');
                document.location.href = 'roleAgent.php';
            </script>";
            }
        }

        $roleAgent->getRoleAgentById($id);
        $row = $roleAgent->getResult();

        $dataUpdate = $row['nama_role'];
        $btn = 'Simpan';
        $title = 'Ubah';

        $view->replace('DATA_VAL_UPDATE', $dataUpdate);
    }
}

if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    if ($id > 0) {
        if ($roleAgent->deleteRoleAgent($id) > 0) {
            echo "<script>
                alert('Data berhasil dihapus!');
                document.location.href = 'roleAgent.php';
            </script>";
        } else {
            echo "<script>
                alert('Data gagal dihapus!');
                document.location.href = 'roleAgent.php';
            </script>";
        }
    }
}

$roleAgent->close();

$view->replace('LINK', 'roleAgent.php');
$view->replace('DATA_MAIN_TITLE', $mainTitle);
$view->replace('DATA_TABEL_HEADER', $header);
$view->replace('DATA_TITLE', $title);
$view->replace('DATA_BUTTON', $btn);
$view->replace('DATA_FORM_LABEL', $formLabel);
$view->replace('DATA_TABEL', $data);
$view->write();
