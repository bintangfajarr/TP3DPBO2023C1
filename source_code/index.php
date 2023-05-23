<?php

include('config/db.php');
include('classes/DB.php');
include('classes/Senjata.php');
include('classes/RoleAgent.php');
include('classes/Agent.php');
include('classes/Template.php');

$listAgent = new Agent($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);
$listAgent->open();
$listAgent->getAgentJoin();

if (isset($_POST['btn-cari'])) {
    $listAgent->searchAgent($_POST['cari']);
} else if (isset($_POST['btn-filter'])) {
    $listAgent->filterAgent($_POST['filter']);
} else {
    $listAgent->getAgentJoin();
}

$data = null;

while ($row = $listAgent->getResult()) {
    $data .= '<div class="col gx-2 gy-3 justify-content-center">' .
        '<div class="card pt-4 px-2 pengurus-thumbnail">
        <a href="detail.php?id=' . $row['id_agent'] . '">
            <div class="row justify-content-center">
                <img src="assets/images/' . $row['foto_agent'] . '" alt="' . $row['foto_agent'] . '" >
            </div>
            <div class="card-body">
                <p class="card-text pengurus-nama my-0">' . $row['nama_agent'] . '</p>
                <p class="card-text jabatan-nama my-0">' . $row['nama_role'] . '</p>
                <p class="card-text divisi-nama">' . $row['nama_senjata'] . '</p>
            </div>
        </a>
    </div>    
    </div>';
}

$listAgent->close();
$home = new Template('templates/skin.html');
$home->replace('DATA_AGENT', $data);
$home->write();
