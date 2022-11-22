<?php

namespace model;

use core\database\Model;

class User extends Model
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

    public function validar($args = [])
    {
        $erreres = [];
        if(!$args["email"]){
            $erreres["email"] = "El email es obligatorio"; 
        }
        if(!$args["password"]){
            $erreres["password"] = "La contraseña es obligatoria"; 
        }
        if(!$args["nombres"]){
            $erreres["nombres"] = "Los nombres son obligatorios"; 
        }
        if(!$args["apellidos"]){
            $erreres["apellidos"] = "Los apellidos son obligatorios"; 
        }
        if(!$args["fecha_nacimiento"]){
            $erreres["email"] = "La Fecha de Nacimiento es obligatoria"; 
        }
        if(!$args["email"]){
            $erreres["email"] = "El email es obligatorio"; 
        }
        if(!$args["email"]){
            $erreres["email"] = "El email es obligatorio"; 
        }
    }
}
