<?php namespace App\Models;
use CodeIgniter\Model;
class SubCategoriaModel extends Model {
    public function Listar(){
        $Categoria = $this->db->query("select * from tb_subcategoria");
         return $Categoria->getResult();
    }
    public function ListarbyCat($id_cat){
        $Categoria = $this->db->query("select * from tb_subcategoria where id_categoria=$id_cat");
         return $Categoria->getResult();
    }
    public function consultadevalor($id_categoria){
        $Categoria = $this->db->query("SELECT * FROM `tb_subcategoria` where nombre = (SELECT nombre from tb_categoria where id_categoria=$id_categoria) and tipo='Ingreso'");
         return $Categoria->getResult();
    }
    public function insertar($datos){
        $Categoria = $this->db->table('tb_subcategoria');
        $Categoria->insert($datos);
        return $this->db->InsertId();
    }
    public function ObtenerbyId($data) {
        $Categoria =  $this->db->table('tb_subcategoria');
        $Categoria->where($data);
        return $Categoria->get()->getResultArray();
    }
    public function actualizar($data, $id) {
        $Categoria = $this->db->table('tb_subcategoria');
        $Categoria->set($data);
        $Categoria->where('id_subcategoria', $id);
        return $Categoria->update();
    }
    
    
}

?>