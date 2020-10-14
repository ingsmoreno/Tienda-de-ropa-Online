<?php 

class Producto{
    private $id;
    private $categoria_id;
    private $nombre;
    private $descripcion;
    private $precio; 
    private $stock;
    private $oferta;
    private $fecha;
    private $imagen;
    private $db;

    public function __construct(){
        $this->db = Database::connect();
    }
   
    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    public function getCategoria_id()
    {
        return $this->categoria_id;
    }

    public function setCategoria_id($categoria_id)
    {
        $this->categoria_id = $categoria_id;

        return $this;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $this->db->real_escape_string($nombre);

        return $this;
    }

    public function getDescripcion()
    {
        return $this->descripcion;
    }

    public function setDescripcion($descripcion)
    {
        $this->descripcion = $this->db->real_escape_string($descripcion);

        return $this;
    }

    public function getPrecio()
    {
        return $this->precio;
    }

    public function setPrecio($precio)
    {
        $this->precio = $this->db->real_escape_string($precio);

        return $this;
    }

    public function getStock()
    {
        return $this->stock;
    }
 
    public function setStock($stock)
    {
        $this->stock = $this->db->real_escape_string($stock);

        return $this;
    }

    public function getOferta()
    {
        return $this->oferta;
    }


    public function setOferta($oferta)
    {
        $this->oferta = $this->db->real_escape_string($oferta);

        return $this;
    }

    public function getFecha()
    {
        return $this->fecha;
    }

    public function setFecha($fecha)
    {
        $this->fecha = $this->db->real_escape_string($fecha);

        return $this;
    }

    public function getImagen()
    {
        return $this->imagen;
    }

 
    public function setImagen($imagen)
    {
        $this->imagen = $imagen;

        return $this;
    }

    //--OBTENER TODAS LOS PRODUCTOS--//

    public function getAll(){
        $producto = $this->db->query("SELECT * FROM productos ORDER BY id DESC ");
        return $producto;
    }

    public function getAllCategorias(){
        $sql = "SELECT p.*, c.nombre AS 'catnombre' FROM productos p"
                ." INNER JOIN categorias c ON c.id = p.categoria_id"
                ." WHERE p.categoria_id = {$this->getCategoria_id()}"
                ." ORDER BY id DESC";
        $producto = $this->db->query($sql);
        return $producto;
    }

    public function getRandom($limit){
        $productos = $this->db->query("SELECT * FROM productos ORDER BY RAND() LIMIT $limit");
        return $productos;
    }

    public function getOne(){
        $producto = $this->db->query("SELECT * FROM productos WHERE id = {$this->getId()}") ;

        return $producto->fetch_object();
    }

    public function save(){
        $sql = "INSERT INTO productos VALUES (NULL, {$this->getCategoria_id()}, '{$this->getNombre()}', '{$this->getDescripcion()}', {$this->getPrecio()}, {$this->getStock()}, Null, CURDATE(), '{$this->getImagen()}')";
        $save = $this->db->query($sql);

        
        $result = false;
            if ($save) {
                $result = true;
            } 
        return $result;
    }



    public function edit(){
    $sql = "UPDATE productos SET nombre_prenda='{$this->getNombre()}', descripcion_producto='{$this->getDescripcion()}', precio_producto={$this->getPrecio()}, stock_producto ={$this->getStock()}, categoria_id = {$this->getCategoria_id()}";

       if ($this->getImagen() != null) {
            $sql .= ", imagen = '{$this->getImagen()}'";
        }

        $sql .=" WHERE id = {$this->id};";

        $save = $this->db->query($sql);

        /*echo $sql;
        echo $this->db->error;
        die();*/

        $result = false;
            if ($save) {
                $result = true;
            } 
        return $result;

    }


    public function delete(){
        $sql = "DELETE FROM productos WHERE id = {$this->id}";
    
        $delete = $this->db->query($sql);
    
        $result = false;
        if ($delete) {
            $result = true;
        }
    
        return $result;
    }

}