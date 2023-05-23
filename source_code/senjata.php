<?php

include('config/db.php');
include('classes/DB.php');
include('classes/Senjata.php');
include('classes/Template.php');

$senjata = new Senjata($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);
$senjata->open();
if (isset($_POST['btn-cari'])) {
    $senjata->searchSenjata($_POST['cari']);
} else if (isset($_POST['btn-filter'])) {
    $senjata->filterSenjata($_POST['filter']);
} else {
    $senjata->getSenjata();
}

if (!isset($_GET['id'])) {
    if (isset($_POST['submit'])) {
        if ($senjata->addSenjata($_POST) > 0) {
            echo "<script>
                alert('Data berhasil ditambah!');
                document.location.href = 'senjata.php';
            </script>";
        } else {
            echo "<script>
                alert('Data gagal ditambah!');
                document.location.href = 'senjata.php';
            </script>";
        }
    }

    $btn = 'Tambah';
    $title = 'Tambah';
}

$view = new Template('templates/skintabel.html');

$mainTitle = 'Senjata';
$header = '<tr>
<th scope="row">No.</th>
<th scope="row">Nama Senjata</th>
<th scope="row">Aksi</th>
</tr>';
$data = null;
$no = 1;
$formLabel = 'senjata';

while ($div = $senjata->getResult()) {
    $data .= '<tr>
    <th scope="row">' . $no . '</th>
    <td>' . $div['nama_senjata'] . '</td>
    <td style="font-size: 22px;">
        <a style = "text-decoration:none;" href="senjata.php?id=' . $div['id_senjata'] . '" title="Edit Data">
        <i class="bi bi-pencil-square text-warning"></i>
        </a>&nbsp;
        <a href="senjata.php?hapus=' . $div['id_senjata'] . '" title="Delete Data"><i class="bi bi-trash-fill text-danger"></i></a>
        </td>
    </tr>';
    $no++;
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if ($id > 0) {
        if (isset($_POST['submit'])) {
            if ($senjata->updateSenjata($id, $_POST) > 0) {
                echo "<script>
                alert('Data berhasil diubah!');
                document.location.href = 'senjata.php';
            </script>";
            } else {
                echo "<script>
                alert('Data gagal diubah!');
                document.location.href = 'senjata.php';
            </script>";
            }
        }

        $senjata->getSenjataById($id);
        $row = $senjata->getResult();

        $dataUpdate = $row['nama_senjata'];
        $btn = 'Simpan';
        $title = 'Ubah';

        $view->replace('DATA_VAL_UPDATE', $dataUpdate);
    }
}

if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    if ($id > 0) {
        if ($senjata->deleteSenjata($id) > 0) {
            echo "<script>
                alert('Data berhasil dihapus!');
                document.location.href = 'senjata.php';
            </script>";
        } else {
            echo "<script>
                alert('Data gagal dihapus!');
                document.location.href = 'senjata.php';
            </script>";
        }
    }
}

$senjata->close();

$view->replace('LINK', 'senjata.php');
$view->replace('DATA_MAIN_TITLE', $mainTitle);
$view->replace('DATA_TABEL_HEADER', $header);
$view->replace('DATA_TITLE', $title);
$view->replace('DATA_BUTTON', $btn);
$view->replace('DATA_FORM_LABEL', $formLabel);
$view->replace('DATA_TABEL', $data);
$view->write();
