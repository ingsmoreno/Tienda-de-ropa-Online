<?php 

class Producto{
    private $id;
    private $categoria_id;
    private $nombre;
    private $descripcion;
    private $precio; 
    private $stock;
    private $ofert;
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
        $this->descripcion_ = $this->db->real_escape_string($descripcion);

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

    public function setFecha_producto($fecha_producto)
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
        $this->image = $imagen;

        return $this;
    }

    public function getAll(){
        $sql = "SELECT * FROM productos ";
        $producto = $this->db->query($sql);


        return $producto;
    }

    public function save(){
        $sql = "INSERT INTO productos VALUES (NULL, '{$this->categoria_id}', '{$this->nombre}', '{$this->descripcion}', '{$this->precio}', '{$this->stock}', '{$this->oferta}', '{$this->fecha}', '{$this->imagen}')";

        $producto = $this->db->query($sql);

        $result = false;
        if ($producto) {
            $result = true;
        } 
        return $result;
        
    }

}