<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of dataDAO
 *
 * @author danul
 */
 
require_once 'GenericDao.php';

class dataDAO extends GenericDao {
    

    const EQUIPO_TABLE = 'equipos';
    const RESULTADO_TABLE = 'partidos';

    public function todosEquipos() {
        $query = "Select * from " . dataDAO::EQUIPO_TABLE;
        $result = mysqli_query($this->conn, $query);
        $equipos = array();
        while ($equiposBD = mysqli_fetch_array($result)) {
            $equipo = array(
                'ID' => $equiposBD["ID"],
                'NombreEquipo' => $equiposBD["NombreEquipo"],
                'Estadio' => $equiposBD["Estadio"],
            );
            array_push($equipos, $equipo);
        }
        return $equipos;
    }

    public function todosResultados() {
        $query = "Select * from " . dataDAO::RESULTADO_TABLE;
        $result = mysqli_query($this->conn, $query);
        $resultados = array();
        while ($resultadoBD = mysqli_fetch_array($result)) {
            $resultado = array(
                'ID' => $resultadoBD["ID"],
                'EquipoLocalID' => $this->buscarPorId($resultadoBD["EquipoLocalID"]) ,
                'EquipoVisitanteID' => $this->buscarPorId($resultadoBD["EquipoVisitanteID"]) ,
                 'Resultado' => $resultadoBD["Resultado"],
            );
            array_push($resultados , $resultado);
        }
        return $resultados;
    }
    
    public function buscarPorId($id) {
        $query = "SELECT NombreEquipo FROM " . dataDAO::EQUIPO_TABLE . " WHERE ID=?";
        $stmt = mysqli_prepare($this->conn, $query);
    mysqli_stmt_bind_param($stmt, 'i', $id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $nombreEquipo);
    while (mysqli_stmt_fetch($stmt)) {
      $result = $nombreEquipo;
       }
       return $result;
    }
}
