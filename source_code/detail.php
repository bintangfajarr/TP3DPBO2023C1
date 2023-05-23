<?php

include('config/db.php');
include('classes/DB.php');
include('classes/RoleAgent.php');
include('classes/Senjata.php');
include('classes/Agent.php');
include('classes/Template.php');

$agent = new Agent($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);
$agent->open();

$data = nulL;
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if ($id > 0) {
        $agent->getAgentById($id);
        $row = $agent->getResult();

        $data .= '<div class="card-header text-center">
        <h3 class="my-0">Detail ' . $row['nama_agent'] . '</h3>
        </div>
        <div class="card-body text-end">
            <div class="row mb-5">
                <div class="col-3">
                    <div class="row justify-content-center">
                        <img src="assets/images/' . $row['foto_agent'] . '" class="img-thumbnail" alt="' . $row['foto_agent'] . '" >
                        </div>
                    </div>
                    <div class="col-9">
                        <div class="card px-3">
                            <table border="0" class="text-start">
                                <tr>
                                    <td>Nama Agent</td>
                                    <td>:</td>
                                    <td>' . $row['nama_agent'] . '</td>
                                </tr>
                                <tr>
                                    <td>Role Agent</td>
                                    <td>:</td>
                                    <td>' . $row['nama_role'] . '</td>
                                </tr>
                                <tr>
                                    <td>Senjata</td>
                                    <td>:</td>
                                    <td>' . $row['nama_senjata'] . '</td>
                                </tr>
                                  <tr>
                                    <td>Biografi</td>
                                    <td>:</td>
                                    <td>' . $row['biografi'] . '</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer text-end">
                <a href="form.php?edit=' . $row['id_agent'] . '"><button type="button" class="btn btn-danger text-white">Ubah Data</button></a>
                <a href="detail.php?del=' . $row['id_agent'] . '"><button type="button" class="btn btn-danger">Hapus Data</button></a>
            </div>';
    }
}

if (isset($_GET['del'])) {
    $id = $_GET['del'];
    if ($id > 0) {
        if ($agent->deleteAgent($id) > 0) {
            echo
            "
            <script>
                alert('Data berhasil dihapus!');
                document.location.href = 'index.php';
            </script>
            ";
        } else {
            echo
            "
            <script>
                alert('Data gagal dihapus!');
                document.location.href = 'index.php';
            </script>
            ";
        }
    }
}

$agent->close();
$detail = new Template('templates/skindetail.html');
$detail->replace('DATA_DETAIL_AGENT', $data);
$detail->write();
