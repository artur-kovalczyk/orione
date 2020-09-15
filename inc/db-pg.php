<?php

class PgSql
{
    private $db;       //The db handle
    public  $num_rows; //Number of rows
    public  $last_id;  //Last insert id
    public  $aff_rows; //Affected rows

    public function __construct()
    {
        $this->db = pg_connect("host=localhost port=5432 dbname=postgres user=postgres password=password");
        if (!$this->db) exit();
    }

    public function close()
    {
        pg_close($this->db);
    }

    public function getRow($sql)
    {
        $result = pg_query($this->db, $sql);
        $row = pg_fetch_object($result);
        if (pg_last_error()) exit(pg_last_error());
        return $row;
    }

    public function getRows($sql)
    {
        $result = pg_query($this->db, $sql);
        if (pg_last_error()) exit(pg_last_error());
        $this->num_rows = pg_num_rows($result);
        $rows = array();
        while ($item = pg_fetch_object($result)) {
            $rows[] = $item;
        }
        return $rows;
    }

    public function getCol($sql)
    {
        $result = pg_query($this->db, $sql);
        $col = pg_fetch_result($result, 0);
        if (pg_last_error()) exit(pg_last_error());
        return $col;
    }

    public function getColValues($sql)
    {
        $result = pg_query($this->db, $sql);
        $arr = pg_fetch_all_columns($result);
        if (pg_last_error()) exit(pg_last_error());
        return $arr;
    }
}
?>