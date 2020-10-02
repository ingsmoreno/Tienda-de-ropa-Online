<?php

class Usuario{
    private $id;
    private $nombre;
    private $apellidos;
    private $email;
    private $password; 
    private $rol;
    private $image;
    private $db;

    public function __construct(){
        $this->db = Database::connect();
    }
    
    function getId()
    {
        return $this->id;
    }

    function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    function getNombre()
    {
        return $this->nombre;
    }

    function setNombre($nombre)
    {
        $this->nombre = $this->db->real_escape_string($nombre);

        return $this;
    }

    function getApellidos()
    {
        return $this->apellidos;
    }

    function setApellidos($apellidos)
    {
        $this->apellidos = $this->db->real_escape_string($apellidos);

        return $this;
    }

     function getEmail()
    {
        return $this->email;
    }

     function setEmail($email)
    {
        $this->email = $this->db->real_escape_string($email);

        return $this;
    }

     function getPassword()
    {
        return password_hash($this->db->real_escape_string($this->password), PASSWORD_BCRYPT,['cost'=> 4]);
    }

     function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }
 
     function getRol()
    {
        return $this->rol;
    }

     function setRol($rol)
    {
        $this->rol = $rol;

        return $this;
    }
 
     function getImage()
    {
        return $this->image;
    }


     function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    public function save(){
        $sql = "INSERT INTO usuarios VALUES (Null, '{$this->getNombre()}', '{$this->getApellidos()}' , 
        '{$this->getEmail()}', '{$this->getPassword()}', 'user', null)";
        
        $save = $this->db->query($sql);  
    

        $result = false;
        if ($save) {
            $result = true;
        }
        
        return $result;
    }

    public function login(){
        $resultado = false;
        $email = $this->email;
        $password = $this->password;

        $sql = "SELECT * FROM usuarios WHERE email = '$email'";
        $login = $this->db->query($sql);


        if ($login && $login->num_rows == 1){
            $usuario = $login->fetch_object();
           
            //verificar la contraseña
            $verify = password_verify($password, $usuario->password);

            
            if ($verify) {
                $resultado = $usuario;
            }
        }

        return $resultado;
       
    }
        
    

    
}