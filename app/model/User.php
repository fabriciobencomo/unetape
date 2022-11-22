<?php

namespace model;

use core\database\Model;

class User extends Model
{
    public function insert($columns, $values)
    {
        $sql = "INSERT INTO tbl_usuarios($columns) VALUES($values);";
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
            $erreres["fecha_nacimiento"] = "La Fecha de Nacimiento es obligatoria"; 
        }
        if(!$args["foto_perfil"]){
            $erreres["foto_perfil"] = "La Foto Perfil es obligatoria"; 
        }
        if(!$args["num_hijos"]){
            $erreres["num_hijos"] = "El Numero de Hijos es obligatorio"; 
        }
        if(!$args["sexo"]){
            $erreres["sexo"] = "El Sexo es obligatorio"; 
        }

        if(!$args["id_estado"]){
            $erreres["id_estado"] = "El Estado es obligatorio"; 
        }

        if(!$args["id_estado_civil"]){
            $erreres["id_estado_civil"] = "El Estado Civil es Obligatorio"; 
        }
        
        return $erreres;
    }
}
