<?php

class DB_driver
{
    private $conn;

    public function connect()
    {
        $user = 'root';
        $pass = '';
        if (!$this->conn) {
            try {

                $this->conn = new PDO('mysql:host=localhost;dbname=land_manager;charset=utf8', $user, $pass);

            } catch (PDOException $e) {

                throw new Exception('No connect to database!');

            }
        }

    }

    public function dis_connect()
    {
        if ($this->conn) {
            $this->conn = null;
        }
    }

    public function insert($table, $data)
    {
        if (is_array($data)) {
            $this->connect();

            $table_col = '';
            $table_col_values = '';

            foreach ($data as $key => $values) {
                $table_col .= ",$key";
                $table_col_values .= ",'" . $values . "'";
            }

            $stmt = $this->conn->prepare('INSERT INTO ' . $table . ' (' . trim($table_col, ",") . ') VALUES (' . trim($table_col_values, ",") . ')');

            if ($stmt->execute()) {
                return true;
            } else return false;
        } else {
            return false;
        }
    }

    public function update($table, $data, $where)
    {
        if (is_array($data)) {
            $this->connect();

            $sql_temp = '';

            foreach ($data as $key => $valuse) {
                $sql_temp .= "$key = '" . $valuse . "',";
            }

            $stmt = $this->conn->prepare('UPDATE ' . $table . ' SET ' . trim($sql_temp, ",") . ' WHERE ' . $where);

            if ($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function delete($table, $where)
    {
        $this->connect();

        $stmt = $this->conn->prepare('DELETE FROM ' . $table . ' WHERE ' . $where);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }

    }

    public function get_data($table)
    {
        $this->connect();

        $stmt = $this->conn->prepare('SELECT * FROM ' . $table);

        $stmt->setFetchMode(PDO::FETCH_ASSOC);

        $stmt->execute();

        $return = array();

        while ($row = $stmt->fetch()) {
            $return[] = $row;
        }

        if (count($return) != 0)
            return $return;
        else
            return null;

    }
    public function get_row($table, $where)
    {
        $this->connect();

        $stmt = $this->conn->prepare('SELECT * FROM ' . $table . ' WHERE ' . $where);

        $stmt->setFetchMode(PDO::FETCH_ASSOC);

        $stmt->execute();

        $return = array();

        while ($row = $stmt->fetch()) {
            $return[] = $row;
        }
        if (sizeof($return) == 0) {
            return null;
        } else {
            return $return;
        }
    }

    public function get_row2($table, $where)
    {
        $this->connect();

        $stmt = $this->conn->prepare('SELECT * FROM ' . $table . ' ' . $where);

        $stmt->setFetchMode(PDO::FETCH_ASSOC);

        $stmt->execute();

        while ($row = $stmt->fetch()) {
            $return[] = $row;
        }
        if (sizeof($return) == 0) {
            return null;
        } else {
            return $return;
        }
    }

    public function count($table)
    {
        $this->connect();

        $stmt = $this->conn->prepare('SELECT COUNT(*) FROM ' . $table);

        $stmt->execute();

        $num_rows = $stmt->fetchColumn();
        return $num_rows;
    }

    public function count2($table, $where)
    {
        $this->connect();

        $stmt = $this->conn->prepare('SELECT COUNT(*) FROM ' . $table . ' WHERE ' . $where);

        if ($stmt->execute()) {
            $num_rows = $stmt->fetchColumn();
        } else {
            $num_rows = 0;
        }
        return $num_rows;
    }

    public function get_laster($table, $col)
    {
        $this->connect();

        $stmt = $this->conn->prepare('SELECT MAX(' . $col . ') FROM ' . $table);

        $stmt->execute();

        $laster = $stmt->fetchColumn();

        if($laster == null){
            return null;
        } else {
            return $laster;
        }
    }

    public function get_avg($table, $col, $where)
    {
        $this->connect();
        $stmt = $this->conn->prepare('SELECT AVG(' . $col . ') as average FROM ' . $table . ' WHERE ' . $where);
        $stmt->execute();
        $output = 0;
        $result = $stmt->fetchAll();
        $total_row = $stmt->rowCount();
        if ($total_row > 0) {
            foreach ($result as $row) {
                $output = round($row["average"]);
            }
        }
        return $output;
    }
}

?>