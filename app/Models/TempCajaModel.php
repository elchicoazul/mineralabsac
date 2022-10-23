<?php namespace App\Models;
use CodeIgniter\Model;
class TempCajaModel extends Model {
    public function Listar(){
        $TipoCliente = $this->db->query("select * from tb_caja_temp");
         return $TipoCliente->getResult();
    }
    public function Listarbyid(){
        $TipoCliente = $this->db->query("select * from tb_caja_temp");
         return $TipoCliente->getResult();
    }
    public function max($cliente){
        $Caja = $this->db->query("select max(id_caja) as id_transaccion from tb_caja_temp where id_cliente=$cliente ");
         return $Caja->getResult();
    }
    public function resultado($cliente){
        $Programados = $this->db->query("select * from tb_caja_temp inner JOIN tb_categoria on tb_categoria.id_categoria=tb_caja_temp.id_categoria where id_cliente=$cliente");
         return $Programados->getResult();
    }
    public function insertar($datos){
        $TipoCliente = $this->db->table('tb_caja_temp');
        $TipoCliente->insert($datos);
        return $this->db->InsertId();
    }
    public function ObtenerbyId($data) {
        $TipoCliente =  $this->db->table('tb_caja_temp');
        $TipoCliente->where($data);
        return $TipoCliente->get()->getResultArray();
    }
    public function actualizar($data, $id) {
        $TipoCliente = $this->db->table('tb_caja_temp');
        $TipoCliente->set($data);
        $TipoCliente->where('id_caja', $id);
        return $TipoCliente->update();
    }
    public function eliminar($data) {
        $cliente = $this->db->table('tb_caja_temp');
        $cliente->where($data);
        return $cliente->delete();
    }
    
    
}

?>