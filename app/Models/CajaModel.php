<?php namespace App\Models;
use CodeIgniter\Model;
class CajaModel extends Model {
    public function Listar(){
        $Caja = $this->db->query("select * from tb_caja order by id_caja desc");
         return $Caja->getResult();
    }
    public function Listare(){
        $Caja = $this->db->query("select *, tb_cliente.nombre as suti, tb_subcategoria.nombre as sub,tb_categoria.nombre as cat from tb_caja inner join tb_cliente on tb_cliente.id_cliente=tb_caja.id_cliente  inner join tb_categoria on tb_categoria.id_categoria=tb_caja.id_categoria inner join tb_subcategoria on tb_subcategoria.id_subcategoria=tb_caja.id_subcategoria order by tb_caja.id_caja desc");
         return $Caja->getResult();
    }
    public function kardex(){
        $Caja = $this->db->query("SELECT *,tb_caja.descripcion as descr, tb_categoria.nombre as Catego, tb_cliente.nombre as nombrecliente FROM tb_caja inner join tb_categoria on tb_categoria.id_categoria=tb_caja.id_categoria inner join tb_cliente on tb_cliente.id_cliente=tb_caja.id_cliente order by tb_caja.fecha asc");
         return $Caja->getResult();
    }
    
    public function max(){
        $Caja = $this->db->query("select max(id_caja) as id_caja from tb_caja");
         return $Caja->getResult();
    }
    public function insertar($datos){
        $Caja = $this->db->table('tb_caja');
        $Caja->insert($datos);
        return $this->db->InsertId();
    }
    public function ObtenerbyId($data) {
        $Caja =  $this->db->table('tb_caja');
        $Caja->where($data);
        return $Caja->get()->getResultArray();
    }
    public function actualizar($data, $id) {
        $Caja = $this->db->table('tb_caja');
        $Caja->set($data);
        $Caja->where('id_caja', $id);
        return $Caja->update();
    }
    
    
}

?>