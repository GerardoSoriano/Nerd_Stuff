use nerdstuff;

insert into usuario (nombreUsuario, primerNombre, segundoNombre, apellidoPaterno, apellidoMaterno, email, contrasena, fechaNacimiento,
		fotoUrl, formaPago, fechaRegistro)
        values('Malex1', 'Mario', 'Alejandro', 'Aguirre', 'López', 'malexal@gmail.com', 'malex1', '1986-10-25', '0.jpg', 1, curdate());

call agregarUsuario('Stacey35',		'Stacey',		'Muriel',		'Neal',			'',				'staceyneal@premiant.com',			'Travis',		'2.jpg',	2,	1	);
call agregarUsuario('Natalia35',	'Natalia',		'Melissa',		'Burton',		'',				'melissaburton@premiant.com',		'Thornton',		'4.jpg',	2,	1	);
call agregarUsuario('Ruthie37',		'Ruth',			'Collin',		'Carney',		'',				'ruthcarney@premiant.com',			'Chandra',		'6.jpg',	2,	2	);
call agregarUsuario('Paty81',		'Elvia',		'Patricia',		'Acosta',		'Moreno',		'patyam81@premiant.com',			'Elvia',		'8.jpg',	1,	3	);
call agregarUsuario('JennaW29',		'Jenna',		'',				'Waver',		'',				'jennaweaver@premiant.com',			'Peter',		'10.jpg',	2,	3	);
call agregarUsuario('Hayden24',		'Hayden',		'Miranda',		'Hammond',		'Rodgers',		'mirandarodgers@premiant.com',		'Joseph',		'12.jpg',	2,	4	);
call agregarUsuario('Penny12',		'Penelope',		'',				'Reed',			'Odom',			'pennyodom84@premiant.com',			'Kathy',		'14.jpg',	2,	2	);
call agregarUsuario('Callie32',		'Callie',		'Crystal',		'Davidson',		'',				'crystaldavidson@premiant.com',		'Freida',		'16.jpg',	1,	6	);
call agregarUsuario('Randy38',		'Randall',		'Laurence',		'Hayden',		'',				'randyhayden@premiant.com',			'Paty81',		'1.jpg',	1,	5	);
call agregarUsuario('Ochoa82',		'Erika',		'Joanna',		'Ochoa',		'Poole',		'kikaochoa@premiant.com',			'Randy',		'18.jpg',	1,	5	);
call agregarUsuario('Evelyn28',		'Kate',			'Evelyn',		'Wolf',			'Turner',		'evelynturner@premiant.com',		'Bobbi',		'20.jpg',	1,	4	);
call agregarUsuario('Luz27',		'Mullen',		'Chaney',		'Everett',		'Gillespie',	'chaneygillespie@premiant.com',		'Julie',		'22.jpg',	1,	8	);
call agregarUsuario('Conrad71',		'Michael',		'Conrad',		'Dickerson',	'',				'conraddickerson@premiant.com',		'Dickers',		'3.jpg',	2,	7	);
call agregarUsuario('Carissa37',	'Katelyn',		'Mcclure',		'Houston',		'Herman',		'mcclureherman@premiant.com',		'Aurora',		'24.jpg',	2,	6	);
call agregarUsuario('Agnes26',		'Blair',		'Barbara',		'Beck',			'Atkins',		'barbaraatkins@premiant.com',		'Roberson',		'26.jpg',	1,	9	);
call agregarUsuario('Horton22',		'Mitchell',		'Annie',		'Jacobson',		'Murphy',		'anniemurphy@premiant.com',			'Morse',		'28.jpg',	2,	10	);
call agregarUsuario('Vaughn27',		'Mcintosh',		'Conley',		'Gallagher',	'Duran',		'conleyduran@premiant.com',			'Evans',		'5.jpg',	1,	11	);
call agregarUsuario('Estes33',		'Jeannie',		'Julia',		'Mendoza',		'David',		'juarezdavid@premiant.com',			'Jennie',		'30.jpg',	2,	10	);
call agregarUsuario('Della37',		'Axel',			'Angel',		'Garza',		'Flores',		'annmarievalencia@premiant.com',	'Charity', 		'7.jpg',	1,	17	);
call agregarUsuario('SamWit07',		'Sergio',		'Fernando',		'Vazquez',		'Felix',		'samwitshia07@gmail.com',			'Sammy', 		'9.jpg',	2,	19	);
call agregarUsuario('Genzar01',		'Gerardo',		'Nicolas',		'Zaragoza',		'Orozco',		'genjishimada01@gmail.com',			'Genji', 		'11.jpg',	1,	19	);
call agregarUsuario('McKree73',		'Jesse',		'Marty',		'McCree',		'Jonhson',		'mccree73@gmail.com',				'McCree', 		'13.jpg',	2,	7	);
call agregarUsuario('Phara32',		'José',			'José',			'Amari',		'Barbosa',		'pharahamari32@gmail.com',			'Pharah', 		'15.jpg',	1,	8	);
call agregarUsuario('CarlRey47',	'Gabriel',		'Carlos',		'Reyes',		'Hernandez',	'gabrielreyes47@gmail.com',			'Reaper', 		'17.jpg',	2,	11	);
call agregarUsuario('JackMore48',	'Jack',			'David',		'Morrison',		'Soles',		'jackmorrison76@gmail.com',			'Soilder76', 	'19.jpg',	1,	12	);
call agregarUsuario('AleShad30',	'Alejandro',	'Pedro',		'Espinoza',		'Garza',		'alejandrasombra707@gmail.com',		'Sombra', 		'21.jpg',	2,	9	);
call agregarUsuario('Lenox26',		'Leonardo',		'Eliezer',		'Oxton',		'Pearce',		'lenaoxton26@gmail.com',			'Tracer', 		'23.jpg',	1,	13	);
call agregarUsuario('Hanzar38',		'Hansel',		'Manuel',		'Zaragoza',		'Smith',		'hanzoshimada38@gmail.com',			'Hanzo', 		'25.jpg',	2,	12	);
call agregarUsuario('jamfox25',		'Jamison',		'Javier',		'Fawkes',		'Fernandez',	'jaminsonfox25@gmail.com',			'Junkrat', 		'27.jpg',	1,	15	);
call agregarUsuario('melizhu31',	'Jonathan',		'Eduardo',		'Sumitomo',		'Zapata',		'meilingzhou31@gmail.com',			'Mei', 			'29.jpg',	2,	14	);
call agregarUsuario('thorlind57',	'Thomas',		'Tadeo',		'Lindholm',		'Lara',			'thorlindholm57@gmail.com',			'torbjorn', 	'31.jpg',	1,	21	);
call agregarUsuario('AmelieWid33',	'Amelie',		'Amanda',		'Lacroix',		'Widons',		'amelielacroix33@gmail.com',		'Widow', 		'32.jpg',	2,	16	);
call agregarUsuario('hanadiva19',	'Hannah',		'Deborah',		'Song',			'Lovewood',		'dvahannah19@gmail.com',			'dva', 			'34.jpg',	1,	15	);
call agregarUsuario('reinwill61',	'Rein',			'Harold',		'Wildheim',		'Stronghold',	'reinhardtwill61@gmail.com',		'Reinhardt', 	'33.jpg',	2,	18	);
call agregarUsuario('marey48',		'Mario',		'Manuel',		'Reynoza',		'Ruthless',		'marioreinoza48@gmail.com',			'Roadhog', 		'35.jpg',	2,	20	);