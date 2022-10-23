<?php namespace App\Models;
use CodeIgniter\Model;
class DetalleModel extends Model {
    public function Listar(){
        $Detalle = $this->db->query("select * from tb_detalle");
         return $Detalle->getResult();
    }
    public function Listarbyid(){
        $Detalle = $this->db->query("select * from tb_detalle");
         return $Detalle->getResult();
    }
    public function resultado($cliente){
        $Detalle = $this->db->query("select * from tb_caja_temp inner JOIN tb_categoria on tb_categoria.id_categoria=tb_caja_temp.id_categoria where id_cliente=$cliente");
         return $Detalle->getResult();
    }
    public function insertar($datos){
        $Detalle = $this->db->table('tb_detalle');
        $Detalle->insert($datos);
        return $this->db->InsertId();
    }
    public function ObtenerbyId($data) {
        $Detalle =  $this->db->table('tb_detalle');
        $Detalle->where($data);
        return $Detalle->get()->getResultArray();
    }
    public function actualizar($data, $id) {
        $Detalle = $this->db->table('tb_detalle');
        $Detalle->set($data);
        $Detalle->where('id_caja', $id);
        return $Detalle->update();
    }
    public function eliminar($data) {
        $Detalle = $this->db->table('tb_detalle');
        $Detalle->where($data);
        return $Detalle->delete();
    }
    
    
}

?>