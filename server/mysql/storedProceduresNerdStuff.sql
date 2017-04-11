/*TABLA USUARIO*/

/*SP para agregar Usuarios*/
delimiter $$
create procedure agregarUsuario(in nombreU nvarchar(50), in primerNom nvarchar (50), in segundoNom nvarchar(50), in apellidoPat nvarchar (50),
	in apellidoMat nvarchar (50), in correo nvarchar(50), in contra nvarchar(255), in fechaNac date, in sexo enum('Masculino', 'Femenino'),
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
		select nombreUsuario, primerNombre, segundoNombre, apellidoPaterno, apellidoMaterno, email, contrasena, fechaNacimiento,
        genero, formaPago, fechaRegistro, idPatrocinador
        from usuario
        where nombU = nombreUsuario;
	end
$$

/*SP para modificar los datos del Usuario*/
delimiter $$
create procedure modificarDatosPersonales(in nombreU nvarchar(50), in primerNom nvarchar (50), in segundoNom nvarchar(50),
	in apellidoPat nvarchar (50), in apellidoMat nvarchar (50), in correo nvarchar(50), in contra nvarchar(255), in fechaNac date,
    in sexo enum('Masculino', 'Femenino'), in metodoPago enum('DepositoBancario', 'Tarjeta'), in fechaReg date, idPat smallint unsigned)
    begin
		update usuario
        set primerNombre = primerNom,
			segundoNombre = segundoNom,
            apellidoPaterno = apellidoPat,
            apellidoMaterno = apellidoMat,
            email = correo,
            contrasena = contra,
            fechaNacimiento = fechaNac,
            genero = sexo,
            formaPago = metodoPago,
            fechaRegistro = fechaReg,
            idPatrocinador = idPat
		where nombreUsuario = nombreU;
    end
$$