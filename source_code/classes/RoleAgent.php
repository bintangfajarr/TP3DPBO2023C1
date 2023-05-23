<?php

class roleAgent extends DB
{
    function getRoleAgent()
    {
        $query = "SELECT * FROM roleagent";
        return $this->execute($query);
    }

    function searchRoleAgent($keyword)
    {
        $query = "SELECT * FROM roleagent WHERE nama_role LIKE '%" . $keyword . "%'";
        return $this->execute($query);
    }

    function getRoleAgentById($id)
    {
        $query = "SELECT * FROM roleagent WHERE id_role=$id";
        return $this->execute($query);
    }
    function filterRoleAgent($keyword)
    {
        if ($keyword == "ascending") {
            $query = "SELECT * FROM roleagent ORDER BY nama_role";
        } else if ($keyword == "descending") {
            $query = "SELECT * FROM roleagent ORDER BY nama_role DESC";
        } else {
            $query = "SELECT * FROM roleagent";
        }
        return $this->execute($query);
    }

    function addRoleAgent($data)
    {
        $nama_role = $data['nama'];
        $query = "INSERT INTO roleagent VALUES('', '$nama_role')";
        return $this->executeAffected($query);
    }

    function updateRoleAgent($id, $data)
    {
        $nama_role = $data['nama'];
        $query = "UPDATE roleagent SET nama_role = '$nama_role' WHERE id_role = '$id'";
        return $this->executeAffected($query);
    }

    function deleteRoleAgent($id)
    {
        $query = "DELETE FROM roleagent WHERE id_role = $id";
        return $this->executeAffected($query);
    }
}
