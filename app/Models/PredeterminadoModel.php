<?php namespace App\Models;
use CodeIgniter\Model;
class PredeterminadoModel extends Model {
    public function Listar(){
        $Categoria = $this->db->query("select * from tb_prederterminado");
         return $Categoria->getResult();
    }
    public function Listare($id){
        $Programados = $this->db->query("select * from tb_prederterminado where id_subcategoria=$id");
         return $Programados->getResult();
    }
    public function Listarbypre($id_subcat){
        $Categoria = $this->db->query("select * from tb_prederterminado where id_categoria=$id_cat");
         return $Categoria->getResult();
    }
    public function consultadevalor($id_categoria){
        $Categoria = $this->db->query("SELECT * FROM `tb_prederterminado` where nombre = (SELECT nombre from tb_categoria where id_categoria=$id_categoria) and tipo='Ingreso'");
         return $Categoria->getResult();
    }
    public function insertar($datos){
        $Categoria = $this->db->table('tb_prederterminado');
        $Categoria->insert($datos);
        return $this->db->InsertId();
    }
    public function ObtenerbyId($data) {
        $Categoria =  $this->db->table('tb_prederterminado');
        $Categoria->where($data);
        return $Categoria->get()->getResultArray();
    }
    public function actualizar($data, $id) {
        $Categoria = $this->db->table('tb_prederterminado');
        $Categoria->set($data);
        $Categoria->where('id_prederterminado', $id);
        return $Categoria->update();
    }
    
    
}

?>