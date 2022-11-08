<?php namespace App\Models;
use CodeIgniter\Model;
class HistorialModel extends Model {
    public function Listar($id){
        $Historial = $this->db->query("SELECT * FROM `tb_caja` WHERE id_cliente = $id");
         return $Historial->getResult();
    }
    public function login($dni, $des){
        $Historial = $this->db->query("select * from tb_Historial where dni=$dni and descripcion=md5($des)");
         return $Historial->getResult();
    }
    public function insertar($datos){
        $Historial = $this->db->table('tb_Historial');
        $Historial->insert($datos);
        return $this->db->InsertId();
    }
    public function ObtenerbyId($data) {
        $Historial =  $this->db->table('tb_Historial');
        $Historial->where($data);
        return $Historial->get()->getResultArray();
    }
    public function actualizar($data, $id) {
        $Historial = $this->db->table('tb_Historial');
        $Historial->set($data);
        $Historial->where('id_Historial', $id);
        return $Historial->update();
    }
    
    
}

?>