<?php namespace App\Models;
use CodeIgniter\Model;
class ClienteModel extends Model {
    public function Listar(){
        $Cliente = $this->db->query("select * from tb_cliente");
         return $Cliente->getResult();
    }
    public function insertar($datos){
        $Cliente = $this->db->table('tb_cliente');
        $Cliente->insert($datos);
        return $this->db->InsertId();
    }
    public function ObtenerbyId($data) {
        $Cliente =  $this->db->table('tb_cliente');
        $Cliente->where($data);
        return $Cliente->get()->getResultArray();
    }
    public function actualizar($data, $id) {
        $Cliente = $this->db->table('tb_cliente');
        $Cliente->set($data);
        $Cliente->where('id_cliente', $id);
        return $Cliente->update();
    }
    
    
}

?>