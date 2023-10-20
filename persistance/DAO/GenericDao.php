<?php

require_once(dirname(__FILE__) . '/../conf/PersistentManager.php');
/**
 * Description of GenericDao
 *
 * @author danul
 */
abstract class GenericDao {
 protected $conn = null;
  //Constructor de la clase
  public function __construct() {
  $this->conn = PersistentManager::getInstance()->get_connection();}
  
    abstract protected function todosEquipos();
    abstract protected function todosResultados();
    abstract protected function buscarPorId($id);
}


