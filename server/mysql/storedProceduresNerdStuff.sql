use nerdstuff;

/*TABLA USUARIO*/

/*SP para agregar Usuarios*/
delimiter $$
create procedure agregarUsuario(in nombreU nvarchar(50), in primerNom nvarchar (50), in segundoNom nvarchar(50), in apellidoPat nvarchar (50),
	in apellidoMat nvarchar (50), in correo nvarchar(50), in contra nvarchar(20), in sexo enum('Masculino', 'Femenino'), in urlFoto nvarchar(50),
    in metodoPago enum('DepositoBancario', 'Tarjeta'), in idPat smallint unsigned)
    begin 
		insert into usuario(nombreUsuario, primerNombre, segundoNombre, apellidoPaterno, apellidoMaterno, email, contrasena,
		genero, fotoUrl, formaPago, fechaRegistro, idPatrocinador) 
		values (nombreU, primerNom, segundoNom, apellidoPat, apellidoMat, correo, contra, sexo, urlFoto, metodoPago, curdate(), idPat);
	end
$$

/*SP para traer los datos del Usuario*/
delimiter $$
create procedure datosPersonales(in nombreU nvarchar(50))
	begin
		select idUsuario, nombreUsuario, primerNombre, segundoNombre, apellidoPaterno, apellidoMaterno, email, contrasena,
        genero, fotoUrl, formaPago, fechaRegistro, idPatrocinador
        from usuario
        where nombreU = nombreUsuario;
	end
$$

/*SP para modificar los datos del Usuario, contraseña y nombre de usuario no se modifican*/
delimiter $$
create procedure modificarDatosPersonales(in nombreU nvarchar(50), in primerNom nvarchar (50), in segundoNom nvarchar(50),
	in apellidoPat nvarchar (50), in apellidoMat nvarchar (50), in correo nvarchar(50), in contra nvarchar(20),
    in sexo enum('Masculino', 'Femenino'), in urlFoto nvarchar(50), in metodoPago enum('DepositoBancario', 'Tarjeta'), in idPat smallint unsigned)
    begin
		update usuario
        set primerNombre = primerNom,
			segundoNombre = segundoNom,
            apellidoPaterno = apellidoPat,
            apellidoMaterno = apellidoMat,
            email = correo,
            genero = sexo,
            fotoUrl = urlFoto,
            formaPago = metodoPago,
            idPatrocinador = idPat
		where nombreUsuario = nombreU and contrasena = contra;
    end
$$

/*SP para modificar contraseña*/
delimiter $$
create procedure modificarContrasena(in nombreU nvarchar(50), in contraOriginal nvarchar(20), in contraNueva nvarchar(20))
	begin
		update usuario
        set contrasena = contraNueva
        where nombreUsuario = nombreU and contrasena = contraOriginal;
	end
$$

/*SP para traer al usuario que me invitó*/
delimiter $$
create procedure miPatrocinador(in idU smallint unsigned)
	begin
		select U1.idUsuario, U1.nombreUsuario, concat(U1.primerNombre, ' ', U1.segundoNombre, ' ', U1.apellidoPaterno, ' ', U1.apellidoMaterno) as nombre, U1.fotoUrl
        from usuario U1
        inner join usuario U2
		on U2.idPatrocinador = U1.idUsuario
		where U2.idUsuario = idU;
    end
$$

/*SP para traer mi lista de invitados*/
delimiter $$
create procedure misInvitados(in idP smallint unsigned)
	begin
		select idPatrocinador, idUsuario, nombreUsuario, concat(primerNombre, ' ', segundoNombre, ' ', apellidoPaterno, ' ', apellidoMaterno) as nombre, fotoUrl
        from usuario
        where idPatrocinador = idP;
	end
$$

/*SP para cambiar forma de pago*/
delimiter $$
create procedure cambiarFormaPago(in nombreU nvarchar(50), in metodoPago enum('DepositoBancario', 'Tarjeta'))
	begin
		update usuario
        set formaPago = metodoPago
        where nombreUsuario = nombreU;
	end
$$

/*SP para calcular los puntos restantes en el mes*/
delimiter $$
create procedure diasRestantes(in idU smallint unsigned)
	begin
		select 30 - mod(datediff(curdate(), fechaRegistro), 30) as diasRestantes
        from usuario
        where idUsuario = idU;
    end
$$

/*SP para hacer login con el email o el nombre de usuario y la contraseña*/
delimiter $$
create procedure login(in _usuario nvarchar(50), in _contrasena nvarchar(20))
	begin
		select idUsuario, nombreUsuario, primerNombre, segundoNombre, apellidoPaterno, apellidoMaterno, email, contrasena,
        genero, formaPago, fechaRegistro, idPatrocinador, fotoUrl
        from usuario
        where nombreUsuario = _usuario or email = _usuario and contrasena = _contrasena;
	end
$$


/*TABLA DOMICILIO_ENTREGA*/

/*SP para agregar un domicilio*/
delimiter $$
create procedure agregarDomicilio(in tituloDom nvarchar(50), in nombreCalle nvarchar(255), in numeroDom nvarchar(10),
	in nombreColonia nvarchar(255), in nombreCiudad nvarchar(255), in nombreEstado nvarchar(50), in codigoP smallint unsigned, in nombrePais nvarchar(50), in idU smallint unsigned)
	begin
		insert into domicilioEntrega(tituloDomicilio, calle, numeroDomicilio, colonia, ciudad, estado, codigoPostal, pais, idUsuario)
        values (tituloDom , nombreCalle, numeroDom, nombreColonia, nombreCiudad, nombreEstado, codigoP, nombrePais, idU);
    end
$$

/*SP para traer la lista de domicilios de un usuario*/
delimiter $$
create procedure mostrarDomicilios(in idU smallint unsigned)
	begin
		select idDomicilio, tituloDomicilio
        from domicilioEntrega
        where idUsuario = idU;
	end
$$

/*SP para traer la información del domicilio seleccionado*/
delimiter $$
create procedure obtenerDomicilio(in idD smallint unsigned, in idU smallint unsigned)
	begin
		select tituloDomicilio, concat(calle, ' ', numeroDomicilio, ', ', colonia, ', ', ciudad, ', ', estado, ', ', codigoPosta, ', ', pais) as domicilio
        from domicilioEntrega
        where idDomicilio = idD and idUsuario = idU;
	end
$$

/*SP para modificar un domicilio*/
delimiter $$
create procedure modificarDomicilio(in idD smallint unsigned, in tituloDom nvarchar(50), in nombreCalle nvarchar(255), in numeroDom nvarchar(10),
	in nombreColonia nvarchar(255), in nombreCiudad nvarchar(255), in nombreEstado nvarchar(50), in codigoP smallint unsigned, in nombrePais nvarchar(50), in idU smallint unsigned)
    begin
		update domicilioEntrega
		set tituloDomicilio = tituloDom,
			calle = nombreCalle,
			numeroDomicilio = numeroDom,
			colonia = nombreColonia,
			ciudad = nombreCiudad,
            estado = nombreEstado,
            codigoPostal = codigoP,
			pais = nombrePais
		where idDomicilio = idD and idUsuario = idU;
    end
$$


/*TABLA PRODUCTO*/

/*SP para traer los productos de una categoría*/
delimiter $$
create procedure productosCategoria(in cat nvarchar(50))
	begin
		select idProducto, nombreProducto, costo, puntaje, descripcion, direccionFoto
        from producto
        where idCategoria = cat;
	end
$$

/*SP para traer la información de un producto en específico*/
delimiter $$
create procedure mostrarProducto(in idP smallint unsigned)
	begin
		select nombreProducto, costo, puntaje, descripcion, direccionFoto
        from producto
        where idProducto = idP;
    end
$$


/*TABLA DESCUENTO*/

/*SP para traer los productos que tienen descuento y su porcentaje de descuento*/
delimiter $$
create procedure ofertas()
	begin
		select P.nombreProducto, P.costo, P.puntaje, P.direccionFoto, D.porcentajeDescuento
        from producto P
        inner join descuento D on P.idProducto = D.idProducto
        where fechaInicio < curdate() and fechaFinal > curdate();
    end
$$

/*SP para traer los descuentos de los productos comprados en un rango de fechas*/
delimiter $$
create procedure descontarProducto(in fechaCom date, in idP smallint unsigned)
	begin
		select idDescuento, porcentajeDescuento
        from descuento
        where idProducto = idP and fechaCom between fechaInicio and fechaFinal;
    end
$$


/*TABLA FAVORITOS*/

/*SP para traer los productos favoritos de un usuario*/
delimiter $$
create procedure mostrarFavoritos(in idU smallint unsigned)
	begin
		select P.nombreProducto, P.costo, P.puntaje, P.descripcion, P.direccionFoto
        from favoritos F
        inner join producto P on F.idProducto = P.idProducto
        where F.idUsuario = idU;
    end
$$

/*SP para agregar un producto a favoritos de un usuario*/
delimiter $$
create procedure agregarFavoritos(in idU smallint unsigned, in idP smallint unsigned)
	begin
		insert into favoritos(idUsuario, idProducto)
        values (idU, idP);
    end
$$


/*TABLA COMPRA*/

/*SP para generar una compra*/
delimiter $$
create procedure agregarCompra(in idU smallint unsigned)
	begin
		insert into compra(idUsuario, fechaCompra)
        values (idU, now());
    end
$$

/*SP para sacar los puntos que lleva el usuario en el mes*/
delimiter $$
create procedure puntosMes(in idU smallint unsigned)
	begin
		select P.idProducto, P.puntaje, C.fechaCompra
        from compra C
        inner join productoCompra PC on C.idCompra = PC.idCompra
        inner join producto P on PC.idProducto = P.idProducto
        inner join usuario U on C.idUsuario = U.idUsuario
        where C.idUsuario = idU and datediff(curdate(), C.fechaCompra) < (mod(datediff(curdate(), U.fechaRegistro), 30));
    end
$$


/*TABLA PRODUCTO_COMPRA*/

/*SP para generar un registro de cada producto en cada compra*/
delimiter $$
create procedure productoComprado(in idC smallint unsigned, in idP smallint unsigned)
	begin
		insert into productoCompra(idCompra, idProducto)
        values(idC, idP);
    end
$$

/*SP para traer todas las compras que ha hecho un usuario*/
delimiter $$
create procedure comprasPorUsuario(in idU smallint unsigned)
	begin
		select C.idCompra, C.fechaCompra, P.idProducto, P.nombreProducto, P.costo, P.puntaje, P.descripcion, P.direccionFoto, count(idProducto) as cantidad
        from compra C
        inner join productoCompra PC on C.idCompra = PC.idCompra
        inner join producto P on P.idProducto = PC.idProducto
        where C.idUsuario = idU
        group by P.idProducto, C.idCompra
        order by C.idCompra, C.fechaCompra desc;
    end
$$

/*SP para traer las compras por mes*/ /*Hay que traer los descuentos aparte, ver tabla DESCUENTO*/
delimiter $$
create procedure comprasPorMes(in idU smallint unsigned, in fechaReporte date)
	begin
		select C.idCompra, C.fechaCompra, P.idProducto, P.nombreProducto, P.costo, P.puntaje, P.descripcion, P.direccionFoto, count(idProducto) as cantidad
        from compra C
        inner join productoCompra PC on C.idCompra = PC.idCompra
        inner join producto P on P.idProducto = PC.idProducto
        where C.idUsuario = idU and fechaCompra.year = fechaReporte.year and fechaCompra.month = fechaReporte.month
        group by P.idProducto, C.idCompra
        order by C.idCompra, C.fechaCompra desc;
    end
$$

/*SP para traer las compras entre un rango de fechas*/ /*Hay que traer los descuentos aparte, ver tabla DESCUENTO*/
delimiter $$
create procedure comprasRangoFechas(in idU smallint unsigned, in fechaInicio date, in fechaFinal date)
	begin
		select C.idCompra, C.fechaCompra, P.idProducto, P.nombreProducto, P.costo, P.puntaje, P.descripcion, P.direccionFoto, count(idProducto) as cantidad
        from compra C
        inner join productoCompra PC on C.idCompra = PC.idCompra
        inner join producto P on P.idProducto = PC.idProducto
        where C.idUsuario = idU and fechaCompra between fechaInicio and fechaFinal
        group by P.idProducto, C.idCompra
        order by C.idCompra, C.fechaCompra desc;
    end
$$

/*SP para traer los 10 productos más comprados*/
delimiter $$
create procedure masComprados()
	begin
		select P.nombreProducto, P.costo, P.puntaje, P.descripcion, P.direccionFoto, CA.nombreCategoria, count(P.idProducto) as ventas
        from productoCompra C
        inner join producto P on P.idProducto = C.idProducto
        inner join categoria CA on P.idCategoria = CA.idCategoria
        order by ventas
        limit 10;
    end
$$

/*SP para traer los 10 productos más comprados por categoría*/
delimiter $$
create procedure masCompradosCategoria(in idC smallint unsigned)
	begin
		select P.nombreProducto, P.costo, P.puntaje, P.descripcion, P.direccionFoto, CA.nombreCategoria, count(P.idProducto) as ventas
        from productoCompra C
        inner join producto P on P.idProducto = C.idProducto
        inner join categoria CA on P.idCategoria = CA.idCategoria
        where P.idCategoria = idC
        order by ventas
        limit 10;
    end
$$

/*SP para traer los últimos 10 productos comprados por el usuario*/
delimiter $$
create procedure ultimasCompras(in idU smallint unsigned)
	begin
		select P.nombreProducto, P.costo, P.puntaje, P.descripcion, P.direccionFoto
        from productoCompra PC
        inner join producto P on P.idProducto = PC.idProducto
        inner join compra C on C.idCompra = PC.idCompra
        where C.idUsuario = idU
        order by C.fechaCompra
        limit 10;
	end
$$


/*TABLA TARJETA*/

/*SP para agregar una tarjera*/
delimiter $$
create procedure agregarTarjeta(in tipoT enum('Visa', 'Master Card', 'American Express'), in numeroT smallint unsigned, in fechaV date, in numeroSeg smallint unsigned, in idU smallint unsigned)
	begin
		insert into tarjetacredito(tipoTarjeta, numeroTarjeta, fechaVencimiento, numeroSeguridad, idUsuario)
        values(tipoT, numeroT, fechaV, numeroSeg, idU);
	end
$$

/*SP para modificar una tarjeta*/
delimiter $$
create procedure modificarTarjeta(in tipoT enum('Visa', 'Master Card', 'American Express'), in numeroT smallint unsigned, in fechaV date, in numeroSeg smallint unsigned, in idU smallint unsigned)
	begin
		update tarjetacredito
        set tipoTarjeta = tipoT,
			numeroTarjeta = numeroT,
            fechaVencimiento = fechaV,
            numeroSeguridad = numeroSeg
		where idUsuario = idU;
	end
$$

/*SP para eliminar una tarjeta*/
delimiter $$
create procedure eliminarTarjeta(in idT smallint unsigned, in idU smallint unsigned)
	begin
		delete from tarjetacredito
        where idTarjeta = idT and idUsuario = idU;
    end
$$

/*SP para mostrar la información de las tarjetas de un usuario*/
delimiter $$
create procedure mostrarTarjetas(in idU smallint unsigned)
	begin
		select idTarjeta, numeroTarjeta, concat(year(fechaVencimiento), '-', month(fechaVencimiento)) as vigencia, numeroSeguridad
        from tarjetacredito
        where idUsuario = idU;
	end
$$

/*TABLA CATEGORIA*/

/*SP para traerte todas las categorias*/
delimiter $$
create procedure categorias()
	begin
		select idCategoria, nombreCategoria from categoria;
	end
$$