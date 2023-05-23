<?php

class Senjata extends DB
{
    function getSenjata()
    {
        $query = "SELECT * FROM senjata";
        return $this->execute($query);
    }

    function searchSenjata($keyword)
    {
        $query = "SELECT * FROM senjata WHERE nama_senjata LIKE '%" . $keyword . "%'";
        return $this->execute($query);
    }

    function getSenjataById($id)
    {
        $query = "SELECT * FROM senjata WHERE id_senjata=$id";
        return $this->execute($query);
    }
    function filterSenjata($keyword)
    {
        if ($keyword == "ascending") {
            $query = "SELECT * FROM senjata ORDER BY nama_senjata";
        } else if ($keyword == "descending") {
            $query = "SELECT * FROM senjata ORDER BY nama_senjata DESC";
        } else {
            $query = "SELECT * FROM senjata";
        }
        return $this->execute($query);
    }
    function addSenjata($data)
    {
        $nama_senjata = $data['nama'];
        $query = "INSERT INTO senjata VALUES('', '$nama_senjata')";
        return $this->executeAffected($query);
    }

    function updateSenjata($id, $data)
    {
        $nama_senjata = $data['nama'];
        $query = "UPDATE senjata SET nama_senjata = '$nama_senjata' WHERE id_senjata = '$id'";
        return $this->executeAffected($query);
    }

    function deleteSenjata($id)
    {
        $query = "DELETE FROM senjata WHERE id_senjata = $id";
        return $this->executeAffected($query);
    }
}
