<?php

include('config/db.php');

class Agent extends DB
{
    function getAgentJoin()
    {
        $query = "SELECT * FROM agent JOIN senjata ON agent.id_senjata=senjata.id_senjata JOIN roleagent ON agent.id_role=roleagent.id_role ORDER BY agent.id_agent";

        return $this->execute($query);
    }

    function getAgent()
    {
        $query = "SELECT * FROM agent";
        return $this->execute($query);
    }

    function getAgentById($id)
    {
        $query = "SELECT * FROM agent JOIN senjata ON agent.id_senjata=senjata.id_senjata JOIN roleagent ON agent.id_role=roleagent.id_role WHERE agent.id_agent=$id";
        return $this->execute($query);
    }

    function searchAgent($keyword)
    {
        $query = "SELECT * FROM agent JOIN senjata ON agent.id_senjata=senjata.id_senjata JOIN roleagent ON agent.id_role=roleagent.id_role WHERE nama_agent LIKE '%" . $keyword . "%'";
        return $this->execute($query);
    }
    function filterAgent($keyword)
    {
        if ($keyword == "ascending") {
            $query = "SELECT * FROM agent join senjata ON agent.id_senjata=senjata.id_senjata JOIN roleagent ON agent.id_role=roleAgent.id_role ORDER BY agent.nama_agent";
            return $this->execute($query);
        } else if ($keyword == "descending") {
            $query = "SELECT * FROM agent join senjata ON agent.id_senjata=senjata.id_senjata JOIN roleagent ON agent.id_role=roleAgent.id_role ORDER BY agent.nama_agent DESC";
            return $this->execute($query);
        }
    }

    function addAgent($data, $file)
    {
        $tmp_file = $file['file_image']['tmp_name'];
        $pengurus_foto = $file['file_image']['name'];

        $dir = "assets/images/$pengurus_foto";
        move_uploaded_file($tmp_file, $dir);

        $nama_agent = $data['nama_agent'];
        $biografi = $data['biografi'];
        $id_senjata = $data['id_senjata'];
        $id_role = $data['id_role'];

        $query = "INSERT INTO agent VALUES('','$nama_agent', '$pengurus_foto','$biografi' ,'$id_role', '$id_senjata')";

        return $this->executeAffected($query);
    }

    function updateAgent($id, $data, $file, $img)
    {


        $tmp_file = $file['file_image']['tmp_name'];
        $pengurus_foto = $file['file_image']['name'];

        if ($pengurus_foto == "") {
            $pengurus_foto = $img;
        }

        $dir = "assets/images/$pengurus_foto";
        move_uploaded_file($tmp_file, $dir);

        $nama_agent = $data['nama_agent'];
        $id_role = $data['id_role'];
        $id_senjata = $data['id_senjata'];
        $biografi = $data['biografi'];

        // $temp_data = new Pengurus("localhost", "root", "", "db_ormawa");
        // $temp_data->open();
        // $temp_data->getPengurus();
        // $temp_data->getPengurusById($id);
        // $temp_fix = $temp_data->getResult();
        // $temp_img = $temp_fix['pengurus_foto'];
        // if ()
        // var_dump($img, $pengurus_foto);
        // die();

        // $temp_data->close();

        $query = "UPDATE agent SET foto_agent = '$pengurus_foto', nama_agent = '$nama_agent',biografi='$biografi' ,id_role = '$id_role', id_senjata = '$id_senjata' WHERE id_agent = '$id'";

        return $this->executeAffected($query);
    }

    function deleteAgent($id)
    {
        $query = "DELETE FROM agent WHERE id_agent = $id";
        return $this->executeAffected($query);
    }
}
