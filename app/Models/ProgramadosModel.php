<?php namespace App\Models;
use CodeIgniter\Model;
class ProgramadosModel extends Model {
    public function Listar(){
        $Programados = $this->db->query("select * from tb_programados");
         return $Programados->getResult();
    }
    public function Listare($id){
        $Programados = $this->db->query("select * from tb_programados where id_subcategoria=$id");
         return $Programados->getResult();
    }
    public function resultado($cliente){
        $Programados = $this->db->query("select * from tb_programados inner JOIN tb_categoria on tb_categoria.id_categoria=tb_programados.id_categoria where tb_programados.movimiento<>'Pagado' and id_cliente=$cliente");
         return $Programados->getResult();
    }
    public function insertar($datos){
        $Programados = $this->db->table('tb_programados');
        $Programados->insert($datos);
        return $this->db->InsertId();
    }
    public function ObtenerbyId($data) {
        $Programados =  $this->db->table('tb_programados');
        $Programados->where($data);
        return $Programados->get()->getResultArray();
    }
    public function actualizar($data, $id) {
        $Programados = $this->db->table('tb_programados');
        $Programados->set($data);
        $Programados->where('id_programado', $id);
        return $Programados->update();
    }
    
    
}

?>