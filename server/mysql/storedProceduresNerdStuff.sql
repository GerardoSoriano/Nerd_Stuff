/*TABLA USUARIO*/

/*SP para agregar Usuarios*/
delimiter $$
create procedure agregarUsuario(in nombreU nvarchar(50), in primerNom nvarchar (50), in segundoNom nvarchar(50), in apellidoPat nvarchar (50),
	in apellidoMat nvarchar (50), in correo nvarchar(50), in contra nvarchar(20), in fechaNac date, in sexo enum('Masculino', 'Femenino'),
    in metodoPago enum('DepositoBancario', 'Tarjeta'),	in fechaReg date, idPat smallint unsigned)
    begin 
		insert into usuario(nombreUsuario, primerNombre, segundoNombre, apellidoPaterno, apellidoMaterno, email, contrasena, fechaNacimiento,
		genero, formaPago, fechaRegistro, idPatrocinador) 
		values (nombreU, primerNom, segundoNom, apellidoPat, apellidoMat, correo, contra, fechaNac, sexo, metodoPago, fechaReg, idPat);
	end
$$

/*SP para traer los datos del Usuario*/
delimiter $$
create procedure datosPersonales(in nombreU nvarchar(50))
	begin
		select idUsuario, nombreUsuario, primerNombre, segundoNombre, apellidoPaterno, apellidoMaterno, email, contrasena, fechaNacimiento,
        genero, formaPago, fechaRegistro, idPatrocinador
        from usuario
        where nombU = nombreUsuario;
	end
$$

/*SP para modificar los datos del Usuario, contraseña y nombre de usuario no se modifican*/
delimiter $$
create procedure modificarDatosPersonales(in nombreU nvarchar(50), in primerNom nvarchar (50), in segundoNom nvarchar(50),
	in apellidoPat nvarchar (50), in apellidoMat nvarchar (50), in correo nvarchar(50), in contra nvarchar(20), in fechaNac date,
    in sexo enum('Masculino', 'Femenino'), in metodoPago enum('DepositoBancario', 'Tarjeta'), in fechaReg date, idPat smallint unsigned)
    begin
		update usuario
        set primerNombre = primerNom,
			segundoNombre = segundoNom,
            apellidoPaterno = apellidoPat,
            apellidoMaterno = apellidoMat,
            email = correo,
            fechaNacimiento = fechaNac,
            genero = sexo,
            formaPago = metodoPago,
            fechaRegistro = fechaReg,
            idPatrocinador = idPat
		where nombreUsuario = nombreU and contrasena = contra;
    end
$$

/*SP para modificar contraseña*/
delimiter $$
create procedure modificarContrasena(in nombreU nvarchar(50), in contraOriginal nvarchar(20), in contraNueva(20))
	begin
		update usuario
        set contrasena = contraNueva
        where nombreUsuario = nombreU and contrasena = contraOriginal;
	end
$$

/*SP para traer mi lista de invitados*/
delimiter $$
create procedure misInvitados(in idU nvarchar(50))
	begin
		select idUsuario, nombreUsuario, concat(primerNombre, ' ', segundoNombre, ' ', apellidoPaterno, ' ', apellidoMaterno) as nombre, idPatrocinador
        from usuario
        where idPatrocinador = idU;
	end
$$












