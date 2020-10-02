CREATE database tienda_master;
use tienda_master;

CREATE table usuarios(
    id          int(255) auto_increment not null,
    nombre      varchar(100) not null, 
    apellidos   varchar(255),   
    email       varchar(255) not null,
    password    varchar (255) not null,
    rol         varchar (20),
    image       varchar (255),
CONSTRAINT pk_usuarios PRIMARY KEY (id),
CONSTRAINT uq_email UNIQUE(email)
)ENGINE=InnoDB;
INSERT INTO usuarios VALUES(null, 'admin', 'admin', 'admin@admin', 'contraseña', 'admin', null);

CREATE TABLE categorias(
    id         int(255) auto_increment not null,
    nombre     varchar(100) not null,
    CONSTRAINT pk_categorias PRIMARY KEY (id)
)ENGINE=InnoDB;
INSERT INTO categorias VALUES (null, 'Manga corta');
INSERT INTO categorias VALUES (null, 'Tirantes');
INSERT INTO categorias VALUES (null, 'Sudaderas');

CREATE TABLE productos(
    id                      int(255) auto_increment not null,
    categoria_id            int(255) not null,
    nombre_prenda           varchar(100) not null,
    descripcion_producto    TEXT, 
    precio_producto         float(100,2) not null,
    stock_producto          int(255) not null,
    oferta_producto         varchar(2),
    fecha_producto          date not null,
    image                   varchar (255), 
    CONSTRAINT pk_productos PRIMARY KEY (id),
    CONSTRAINT fk_productos_categoria FOREIGN KEY (categoria_id) REFERENCES categorias(id)
)ENGINE=InnoDB;

INSERT INTO productos VALUES (NULL, 2, 'Tirantes', 'color azul', 500.00, 5, 'si', CURDATE(), '' );

CREATE TABLE pedidos(
    id                      int(255) auto_increment not null,
    usuario_id              int(255) not null,
    nombre_prenda           varchar(100) not null,
    provincia               varchar(100) not null,
    localidad               varchar(100) not null,
    direccion               varchar(100) not null,
    coste_pedido            float(200,2) not null,
    estado_de_pedido        varchar(20) not null,
    fecha_pedido            date ,
    hora_pedido             time,
    CONSTRAINT pk_pedidos PRIMARY KEY (id),
    CONSTRAINT fk_pedidos_usuario FOREIGN KEY (usuario_id) REFERENCES usuarios(id)
)ENGINE=InnoDB;

CREATE TABLE lineas_pedidos(
    id                      int(255) auto_increment not null,
    pedido_id               int(255) not null,
    producto_id             int(255) not null,
    unidades                int(100) not null,
    CONSTRAINT pk_lineas_pedidos PRIMARY KEY (id),
    CONSTRAINT fk_linea_pedido FOREIGN KEY (pedido_id) REFERENCES pedidos(id),
    CONSTRAINT fk_linea_producto FOREIGN KEY (producto_id) REFERENCES productos(id)
)ENGINE=InnoDB;