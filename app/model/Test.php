<?php

namespace model;

use core\database\Model;

class Test extends Model
{
    public function insert()
    {
        $sql = "INSERT INTO table_name(field1, field2, field3) VALUES('value1', 'value2', 'value3');";
        return $this->query($sql)->result();
    }

    public function update()
    {
        $sql = "UPDATE table_name SET field1 = 'value1 mod' WHERE field1 = 'value1';";
        return $this->query($sql)->result();
    }

    public function select_row()
    {
        $sql = "SELECT * FROM table_name WHERE field1 = 'value1';";
        return $this->query($sql)->row();
    }

    public function select_all()
    {
        $sql = "SELECT * FROM table_name WHERE 1;";
        return $this->query($sql)->all();
    }

    public function delete()
    {
        $sql = "DELETE FROM table_name WHERE field1 = 'value1';";
        return $this->query($sql)->result();
    }
}
