use nerdstuff;

insert into usuario (nombreUsuario, primerNombre, segundoNombre, apellidoPaterno, apellidoMaterno, email, contrasena, fechaNacimiento,
		genero, formaPago, fechaRegistro)
        values('Malex1', 'Mario', 'Alejandro', 'Aguirre', 'López', 'malexal@gmail.com', 'malex1', '1986-10-25', 1, 1, curdate());

call agregarUsuario('Stacey35',		'Stacey',		'Muriel',		'Neal',			'',				'staceyneal@premiant.com',			'Travis',		'1976-11-19',	2,	2,	1	);
call agregarUsuario('Natalia35',	'Natalia',		'Melissa',		'Burton',		'',				'melissaburton@premiant.com',		'Thornton',		'1992-10-02',	2,	2,	1	);
call agregarUsuario('Ruthie37',		'Ruth',			'Collin',		'Carney',		'',				'ruthcarney@premiant.com',			'Chandra',		'1983-12-01',	2,	2,	2	);
call agregarUsuario('Paty81',		'Elvia',		'Patricia',		'Acosta',		'Moreno',		'patyam81@premiant.com',			'Elvia',		'1981-09-11',	2,	1,	3	);
call agregarUsuario('JennaW29',		'Jenna',		'',				'Waver',		'',				'jennaweaver@premiant.com',			'Peter',		'1973-12-29',	2,	2,	3	);
call agregarUsuario('Hayden24',		'Hayden',		'Miranda',		'Hammond',		'Rodgers',		'mirandarodgers@premiant.com',		'Joseph',		'1981-05-20',	2,	2,	4	);
call agregarUsuario('Penny12',		'Penelope',		'',				'Reed',			'Odom',			'pennyodom84@premiant.com',			'Kathy',		'1984-08-12',	2,	2,	2	);
call agregarUsuario('Callie32',		'Callie',		'Crystal',		'Davidson',		'',				'crystaldavidson@premiant.com',		'Freida',		'1978-02-07',	2,	1,	6	);
call agregarUsuario('Randy38',		'Randall',		'Laurence',		'Hayden',		'',				'randyhayden@premiant.com',			'Paty81',		'1980-10-24',	1,	1,	5	);
call agregarUsuario('Ochoa82',		'Erika',		'Joanna',		'Ochoa',		'Poole',		'kikaochoa@premiant.com',			'Randy',		'1982-02-15',	2,	1,	5	);
call agregarUsuario('Evelyn28',		'Kate',			'Evelyn',		'Wolf',			'Turner',		'evelynturner@premiant.com',		'Bobbi',		'1973-09-26',	2,	1,	4	);
call agregarUsuario('Luz27',		'Mullen',		'Chaney',		'Everett',		'Gillespie',	'chaneygillespie@premiant.com',		'Julie',		'1984-04-19',	1,	1,	8	);
call agregarUsuario('Conrad71',		'Michael',		'Conrad',		'Dickerson',	'',				'conraddickerson@premiant.com',		'Dickers',		'1971-12-30',	1,	2,	7	);
call agregarUsuario('Carissa37',	'Katelyn',		'Mcclure',		'Houston',		'Herman',		'mcclureherman@premiant.com',		'Aurora',		'1984-05-16',	1,	2,	6	);
call agregarUsuario('Agnes26',		'Blair',		'Barbara',		'Beck',			'Atkins',		'barbaraatkins@premiant.com',		'Roberson',		'1971-01-14',	1,	1,	9	);
call agregarUsuario('Horton22',		'Mitchell',		'Annie',		'Jacobson',		'Murphy',		'anniemurphy@premiant.com',			'Morse',		'1988-01-19',	1,	2,	10	);
call agregarUsuario('Vaughn27',		'Mcintosh',		'Conley',		'Gallagher',	'Duran',		'conleyduran@premiant.com',			'Evans',		'1984-05-12',	1,	1,	11	);
call agregarUsuario('Estes33',		'Jeannie',		'Julia',		'Mendoza',		'David',		'juarezdavid@premiant.com',			'Jennie',		'1978-07-05',	1,	2,	10	);
call agregarUsuario('Della37',		'Blake',		'Annmarie',		'Barker',		'Valencia',		'annmarievalencia@premiant.com',	'Charity',		'1994-06-25',	2,	1,	17	);
call agregarUsuario('SamWit07',		'Samuel',		'Shia',			'Witwiki',		'Smith',		'samwitshia07@gmail.com',			'Sammy',		'1982-06-05',	1,	2,	19	);
call agregarUsuario('Genzar01',		'Gerardo',		'Nicolas',		'Zaragoza',		'Orozco',		'genjishimada01@gmail.com',			'Genji',		'1985-04-05',	1,	1,	19	);
call agregarUsuario('McKree73',		'Jesse',		'Marty',		'McCree',		'Jonhson',		'mccree73@gmail.com',				'McCree',		'1983-03-04',	1,	2,	7	);
call agregarUsuario('Phara32',		'Fareeha',		'Lizeth',		'Amari',		'Barbosa',		'pharahamari32@gmail.com',			'Pharah',		'1987-01-03',	2,	1,	8	);
call agregarUsuario('CarlRey47',	'Gabriel',		'Carlos',		'Reyes',		'Hernandez',	'gabrielreyes47@gmail.com',			'Reaper',		'1977-02-04',	1,	2,	11	);
call agregarUsuario('JackMore48',	'Jack',			'David',		'Morrison',		'Soles',		'jackmorrison76@gmail.com',			'Soilder76',	'1976-01-05',	1,	1,	12	);
call agregarUsuario('AleShad30',	'Alejandra',	'Petra',		'Espinoza',		'Garza',		'alejandrasombra707@gmail.com',		'Sombra',		'1990-01-04',	2,	2,	9	);
call agregarUsuario('Lenox26',		'Lena',			'Elizabeth',	'Oxton',		'Pearce',		'lenaoxton26@gmail.com',			'Tracer',		'1994-01-04',	2,	1,	13	);
call agregarUsuario('Hanzar38',		'Hansel',		'Manuel',		'Zaragoza',		'Smith',		'hanzoshimada38@gmail.com',			'Hanzo',		'1983-03-03',	1,	2,	12	);
call agregarUsuario('jamfox25',		'Jamison',		'Javier',		'Fawkes',		'Fernandez',	'jaminsonfox25@gmail.com',			'Junkrat',		'1995-01-04',	1,	1,	15	);
call agregarUsuario('melizhu31',	'Melisa',		'Linda',		'Sumitomo',		'Zapata',		'meilingzhou31@gmail.com',			'Mei',			'1952-12-03',	2,	2,	14	);
call agregarUsuario('thorlind57',	'Thomas',		'Tadeo',		'Lindholm',		'Lara',			'thorlindholm57@gmail.com',			'torbjorn',		'1962-01-03',	1,	1,	21	);
call agregarUsuario('AmelieWid33',	'Amelie',		'Amanda',		'Lacroix',		'Widons',		'amelielacroix33@gmail.com',		'Widow',		'1983-02-04',	2,	2,	16	);
call agregarUsuario('hanadiva19',	'Hannah',		'Deborah',		'Song',			'Lovewood',		'dvahannah19@gmail.com',			'dva',			'1999-01-03',	2,	1,	15	);
call agregarUsuario('reinwill61',	'Rein',			'Harold',		'Wildheim',		'Stronghold',	'reinhardtwill61@gmail.com',		'Reinhardt',	'1948-01-03',	1,	2,	18	);
call agregarUsuario('marey48',		'Mario',		'Manuel',		'Reynoza',		'Ruthless',		'marioreinoza48@gmail.com',			'Roadhog',		'1956-06-07',	1,	2,	20	);