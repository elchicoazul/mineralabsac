<?php namespace App\Models;
use CodeIgniter\Model;
class CategoriaModel extends Model {
    public function Listar(){
        $Categoria = $this->db->query("select * from tb_categoria");
         return $Categoria->getResult();
    }
    public function consultadevalor($id_categoria){
        $Categoria = $this->db->query("SELECT * FROM `tb_categoria` where nombre = (SELECT nombre from tb_categoria where id_categoria=$id_categoria) and tipo='Ingreso'");
         return $Categoria->getResult();
    }
    public function insertar($datos){
        $Categoria = $this->db->table('tb_categoria');
        $Categoria->insert($datos);
        return $this->db->InsertId();
    }
    public function ObtenerbyId($data) {
        $Categoria =  $this->db->table('tb_categoria');
        $Categoria->where($data);
        return $Categoria->get()->getResultArray();
    }
    public function actualizar($data, $id) {
        $Categoria = $this->db->table('tb_categoria');
        $Categoria->set($data);
        $Categoria->where('id_categoria', $id);
        return $Categoria->update();
    }
    
    
}

?>