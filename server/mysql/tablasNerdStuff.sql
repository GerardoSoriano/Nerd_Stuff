drop database if exists nerdstuff;

create database nerdstuff;

use nerdstuff;

create table usuario(
idUsuario smallint unsigned not null auto_increment,
nombreUsuario nvarchar(50) not null,
primerNombre nvarchar(50) not null,
segundoNombre nvarchar(50),
apellidoPaterno nvarchar(50) not null,
apellidoMaterno nvarchar(50),
email nvarchar(50) not null,
contrasena nvarchar(20) not null,
fechaNacimiento date not null,
genero enum('Masculino', 'Femenino') not null,
formaPago enum('DepositoBancario', 'Tarjeta') not null,
fechaRegistro date not null,
idPatrocinador smallint unsigned not null,
primary key(idUsuario),
foreign key(idPatrocinador) references usuario(idUsuario),
unique (nombreUsuario)
);

create table domicilioentrega(
idDomicilio smallint unsigned not null auto_increment,
tituloDomicilio nvarchar(50) not null,
calle nvarchar(255) not null,
numeroDomicilio nvarchar(10) not null,
colonia nvarchar(255) not null,
ciudad nvarchar(255) not null,
estado nvarchar(50) not null,
codigoPostal smallint unsigned not null,
pais nvarchar(50) not null,
idUsuario smallint unsigned not null,
primary key(idDomicilio),
foreign key(idUsuario) references usuario(idUsuario)
);

create table categoria(
idCategoria smallint unsigned not null auto_increment,
nombreCategoria nvarchar(50) not null,
primary key(idCategoria)
);

create table producto(
idProducto smallint unsigned not null auto_increment,
nombreProducto nvarchar(50) not null,
costo smallint unsigned not null,
puntaje smallint unsigned not null,
descripcion nvarchar(255) not null,
idCategoria smallint unsigned not null,
direccionFoto nvarchar(255) not null,
primary key(idProducto),
foreign key(idCategoria) references categoria(idCategoria)
);

create table descuento(
idDescuento smallint unsigned not null auto_increment,
fechaInicio date not null,
fechaFinal date not null,
porcentajeDescuento smallint unsigned not null,
idProducto smallint unsigned not null,
primary key(idDescuento),
foreign key(idProducto) references producto(idProducto)
);

create table compra(
idCompra smallint unsigned not null auto_increment,
fechaCompra datetime not null,
idUsuario smallint unsigned not null,
primary key(idCompra),
foreign key(idUsuario) references usuario(idUsuario)
);

create table productocompra(
idCompra smallint unsigned not null,
idProducto smallint unsigned not null,
foreign key(idCompra) references compra(idCompra),
foreign key(idProducto) references producto(idProducto)
);

create table favoritos(
idUsuario smallint unsigned not null,
idProducto smallint unsigned not null,
foreign key(idUsuario) references usuario(idUsuario),
foreign key(idProducto) references producto(idProducto)
);

create table tarjetacredito(
idTarjeta smallint unsigned not null auto_increment,
tipoTarjeta enum('Visa', 'Master Card', 'American Express') not null,
numeroTarjeta smallint unsigned not null,
fechaVencimiento date not null,
numeroSeguridad smallint unsigned not null,
idUsuario smallint unsigned not null,
primary key(idTarjeta),
foreign key(idUsuario) references usuario(idUsuario)
)
