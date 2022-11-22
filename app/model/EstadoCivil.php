<?php

namespace model;

use core\database\Model;

class EStadoCivil extends Model
{
    public function select_row()
    {
        $sql = "SELECT * FROM table_name WHERE field1 = 'value1';";
        return $this->query($sql)->row();
    }

    public function select_all()
    {
        $sql = "SELECT estado FROM tbl_estados_civiles;";
        return $this->query($sql)->all();
    }

}
