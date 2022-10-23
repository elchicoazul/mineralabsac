<?php namespace App\Models;
use CodeIgniter\Model;
class TipoclienteModel extends Model {
    public function Listar(){
        $TipoCliente = $this->db->query("select * from tb_tipocliente");
         return $TipoCliente->getResult();
    }
    public function insertar($datos){
        $TipoCliente = $this->db->table('tb_tipocliente');
        $TipoCliente->insert($datos);
        return $this->db->InsertId();
    }
    public function ObtenerbyId($data) {
        $TipoCliente =  $this->db->table('tb_tipocliente');
        $TipoCliente->where($data);
        return $TipoCliente->get()->getResultArray();
    }
    public function actualizar($data, $id) {
        $TipoCliente = $this->db->table('tb_tipocliente');
        $TipoCliente->set($data);
        $TipoCliente->where('id_tipocliente', $id);
        return $TipoCliente->update();
    }
    
    
}

?>