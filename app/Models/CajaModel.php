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
        $Caja = $this->db->query("SELECT *,tb_caja.descripcion as descr, tb_categoria.nombre as Catego, tb_cliente.nombre as nombrecliente FROM tb_caja inner join tb_categoria on tb_categoria.id_categoria=tb_caja.id_categoria inner join tb_cliente on tb_cliente.id_cliente=tb_caja.id_cliente where reporte=0 order by tb_caja.fecha asc");
         return $Caja->getResult();
    }
    public function kardexnada($reporte){
        $Caja = $this->db->query("SELECT *,tb_caja.descripcion as descr, tb_categoria.nombre as Catego, tb_cliente.nombre as nombrecliente FROM tb_caja inner join tb_categoria on tb_categoria.id_categoria=tb_caja.id_categoria inner join tb_cliente on tb_cliente.id_cliente=tb_caja.id_cliente where reporte=$reporte order by tb_caja.fecha asc");
         return $Caja->getResult();
    }
    //todo registro  sin  saldo  anterior
    public function kardexCaja($id){
        $Caja = $this->db->query("SELECT *,tb_caja.descripcion as descr, tb_categoria.nombre as Catego, tb_cliente.nombre as nombrecliente FROM tb_caja inner join tb_categoria on tb_categoria.id_categoria=tb_caja.id_categoria inner join tb_cliente on tb_cliente.id_cliente=tb_caja.id_cliente where reporte<>0 and reporte=$id and tb_caja.descripcion<>'Saldo Anterior'  order by tb_caja.fecha asc");
         return $Caja->getResult();
    }
    //Saldo  anterior 
    public function kardexCajas($id){
        $Caja = $this->db->query("SELECT *,tb_caja.descripcion as descr, tb_categoria.nombre as Catego, tb_cliente.nombre as nombrecliente FROM tb_caja inner join tb_categoria on tb_categoria.id_categoria=tb_caja.id_categoria inner join tb_cliente on tb_cliente.id_cliente=tb_caja.id_cliente where reporte<>0 and reporte=$id and tb_caja.descripcion='Saldo Anterior'  order by tb_caja.fecha asc");
         return $Caja->getResult();
    }
    // empezar nueva  caja.....
    public function NuevoKardex($id){
        $Caja = $this->db->query("SELECT sum(CASE when tb_categoria.tipo='Ingreso' then importes else 0 end)-sum(CASE when tb_categoria.tipo='Egreso' then importes else 0 end) as Soles, sum(CASE when tb_categoria.tipo='Ingreso' then imported else 0 end)-sum(CASE when tb_categoria.tipo='Egreso' then imported else 0 end) as Dolares from  tb_caja inner join tb_categoria on tb_categoria.id_categoria=tb_caja.id_categoria where reporte=$id;");
         return $Caja->getResult();
    }
    // maximo  id  reporte
    public function maximo(){
        $Caja = $this->db->query("select max(reporte) as reporte from tb_caja");
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