/* base infonete */

DROP SCHEMA IF EXISTS  Infonete;
CREATE SCHEMA IF NOT EXISTS Infonete;
USE Infonete;


CREATE TABLE Tipo_doc
(
Cod_doc int NOT NULL,
Descripcion varchar(20),
CONSTRAINT PK_Tipo_doc PRIMARY KEY (Cod_doc)
);

insert into Tipo_doc (Cod_doc,Descripcion) value
	(1,"DNI"),
	(2,"DNI ext");

CREATE TABLE Producto     
(
Cod_producto int NOT NULL,
Descripcion varchar(50),
CONSTRAINT PK_Producto PRIMARY KEY (Cod_producto)
);

insert into Producto (Cod_producto,Descripcion) value
	(1,"Diario"),
	(2,"Revista");


CREATE TABLE Suscripcion      
(
Cod_suscripcion int NOT NULL,
Descripcion varchar(50),
Cod_producto int NOT NULL,
CONSTRAINT PK_Suscripcion PRIMARY KEY (Cod_suscripcion),
CONSTRAINT FK_Suscripcion_Producto FOREIGN KEY (Cod_producto) REFERENCES Producto (Cod_producto)
);

insert into Suscripcion (Cod_suscripcion,Descripcion,Cod_producto) value
	(0,"ilimitada",1),
	(1,"Semanal",1),
	(2,"Mensual",2),
	(3,"Anual",1),
	(4,"restringido",1);


CREATE TABLE Provincia     
(
Cod_provincia int NOT NULL,
Descripcion varchar(50),
CONSTRAINT PK_Provincia PRIMARY KEY (Cod_Provincia)
);

insert into Provincia (Cod_provincia,Descripcion) value 
	(1,"CABA"),
    (2,"BsAs");

CREATE TABLE Localidad 
(
Cod_Localidad int,
Descripcion varchar(50),
Cod_Provincia int,
CONSTRAINT PK_Localidad PRIMARY KEY (Cod_Localidad),
CONSTRAINT FK_LocalidadProvincia FOREIGN KEY (Cod_Provincia) REFERENCES Provincia (Cod_provincia)	
);

insert into Localidad (Cod_Localidad,Descripcion,Cod_Provincia) value 
	(1,"Ramos Mejía",2),
    (2,"Villa Luzuriaga",2),
    (3,"San justo",2),
    (4,"Caballito",1);

/* Rol como entidad aparte, relacionada con usuario*/
CREATE TABLE Rol     
(
Cod_rol int NOT NULL,
Descripcion_rol varchar(20),
CONSTRAINT PK_Rol PRIMARY KEY (Cod_Rol)
);

insert into Rol (Cod_Rol,Descripcion_rol) value
	(1,"ADMIN"),
	(2,"CONTENIDISTA"),
	(3,"LECTOR");

CREATE TABLE Usuario    				
(
Id_usuario int NOT NULL auto_increment,
Nro_doc int NOT NULL,
Cod_doc int NOT NULL,
Nombre varchar(50),
Mail varchar(64),
Telefono int,
Cod_Localidad int NOT NULL,										
Cod_Usuario int NOT NULL,										 
Pass varchar(50),																						
Cod_Suscripcion int,
CONSTRAINT PK_Usuario PRIMARY KEY (Id_usuario),
CONSTRAINT FK_Usuario_Documento FOREIGN KEY (Cod_doc) REFERENCES Tipo_doc (Cod_doc),
CONSTRAINT FK_Usuario_Suscripcion FOREIGN KEY (Cod_Suscripcion) REFERENCES Suscripcion (Cod_Suscripcion),
CONSTRAINT FK_Usuario_Localidad FOREIGN KEY (Cod_Localidad) REFERENCES Localidad (Cod_Localidad),
CONSTRAINT FK_Usuario_Rol FOREIGN KEY (Cod_Usuario) REFERENCES Rol (Cod_Rol) 
);

insert into Usuario (Nro_doc,Cod_doc,Nombre,Mail,Telefono,Cod_Localidad,Cod_Usuario,Pass,Cod_Suscripcion) value
	(32222333,1,"Alejandro","ale@gmail.com",1144446666,1,1,"1234",0),
	(40111222,1,"Agustin","agus@gmail.com",1122223333,2,3,"1234",1),
	(30555000,1,"Walter","walter@gmail.com",1133445566,3,1,"1234",0),
	(40987654,1,"Lucas","lucas@gmail.com",11444555,4,3,"1234",2),
	(32000000,1,"Diego","diego@gmail.com",113333888,1,3,"1234",1),
	(20456789,1,"Pepe I","pepe1@gmail.com",1598765432,2,3,"1234",3),
	(35123456,1,"Pepe II","pepe2@gmail.com",1533445566,3,2,"1234",0),
	(94000111,2,"Pepe III","pepe3@gmail.com",44448888,4,2,"1234",0);


CREATE TABLE Diario_Revista
(
Id int NOT NULL auto_increment,
Id_Admin int NOT NULL,
Titulo  varchar(50),
Numero int NOT NULL,
Descripcion varchar(100),
CONSTRAINT PK_Revista PRIMARY KEY (Id),
CONSTRAINT FK_Revista_Usuario FOREIGN KEY (Id_Admin) REFERENCES Usuario(Id_usuario)
);


/* Usuario conectado por red social - FALTARIA RESOLVER para integrar API´s*/
CREATE TABLE UsuarioRedSocial    				
(
alias varchar(50),
Mail varchar(64),
Cod_Usuario int,							 
Pass varchar(50)									
);

CREATE TABLE Seccion     
(
Cod_seccion int NOT NULL,
Descripcion varchar(50),
Cod_producto int NOT NULL,
Cod_contenidista int NOT NULL,
CONSTRAINT PK_Descripcion PRIMARY KEY (Cod_seccion),
CONSTRAINT FK_Seccion_Producto FOREIGN KEY (Cod_producto) REFERENCES Producto (Cod_producto),
CONSTRAINT FK_Seccion_Usuario FOREIGN KEY (Cod_contenidista) REFERENCES Usuario (Id_usuario)   
);
insert into Seccion (Cod_seccion,Descripcion,Cod_producto,Cod_contenidista) value
	(1,"POLITICA",1,1),
	(2,"SOCIEDAD",1,2),
	(3,"DEPORTES",2,3),
	(4,"TECNOLOGIA",2,4);


CREATE TABLE Cuota     
(
Cod_cuota int NOT NULL,
Detalle varchar(50),
Id_usuario int NOT NULL,
CONSTRAINT PK_cuota PRIMARY KEY (Cod_cuota),
CONSTRAINT FK_Cuota_Usuario FOREIGN KEY (Id_usuario) REFERENCES Usuario (Id_usuario)
);

insert into Cuota (Cod_cuota,Detalle,Id_usuario) value 
	(1,"Pago Semanal",1),
	(2,"Pago Mensual",2),
	(3,"Pago Anual",3);


CREATE TABLE Lector_Suscripcion
(
Id_usuario int NOT NULL,
Cod_suscripcion int NOT NULL,
CONSTRAINT PK_Lector_Suscripcion PRIMARY KEY (Id_usuario,Cod_suscripcion),
CONSTRAINT FK_Cod_Usuario FOREIGN KEY (Id_usuario) REFERENCES Usuario (Id_usuario),
CONSTRAINT FK_Cod_Suscripcion FOREIGN KEY (Cod_suscripcion) REFERENCES Suscripcion (Cod_suscripcion)
);

insert into Lector_Suscripcion (Id_usuario,Cod_suscripcion) value
	(1,1),
	(2,2),
	(3,3);


/* La GEOREFERENCIA puede ser bueno usarlo como: Grados decimales (DD): 41.40338, 2.17403  (LATITUD-LONGITUD)*/
/* EJ: Buenos aires tiene Latitud: -34.60842 , Longitud: -58.37210 -  o la UNLaM -34.669254, -58.564420 */

CREATE TABLE Georeferencia
(
Cod_georef int NOT NULL,
Latitud real NOT NULL,
Longitud real NOT NULL,
CONSTRAINT PK_Georeferecia PRIMARY KEY (Cod_georef)
);

insert into Georeferencia (Cod_georef,Latitud,Longitud) value
	(1,-34.60842,-58.37210),
	(2,-34.669254,-58.564420);

CREATE TABLE Noticia
(
Cod_noticia int NOT NULL,
Titulo varchar(200) NOT NULL, 
Subtitulo varchar(500) NOT NULL, /* Hace referencia al COPETE */
informe_noticia varchar(10000) NOT NULL,
link_noticia varchar(300),									 	
Cod_georef int NOT NULL,									
imagen_noticia varchar(200),									
Cod_seccion int NOT NULL,
Cod_contenidista int NOT NULL,
Estado bool,
CONSTRAINT PK_Noticia PRIMARY KEY (Cod_noticia),
CONSTRAINT FK_Seccion_Noticia FOREIGN KEY (Cod_seccion) REFERENCES Seccion (Cod_seccion),
CONSTRAINT FK_Noticia_Usuario FOREIGN KEY (Cod_contenidista) REFERENCES Usuario (Id_usuario),   /* ver id usuario/autor de la noticia */	
CONSTRAINT FK_Noticia_Georeferencia FOREIGN KEY (Cod_georef) REFERENCES Georeferencia (Cod_georef)
);

insert into Noticia (Cod_noticia,Titulo,Subtitulo,informe_noticia,link_noticia,Cod_georef,imagen_noticia,Cod_seccion,Cod_contenidista) value
	(1,
	"CÓMO SE CONMOMERÓ EL 24 DE MARZO SIN MARCHA A PLAZA DE MAYO",
	"Las agrupaciones de Derechos Humanos conmemoran el 24 de marzo el Día de la Memoria por la Verdad y la Justiciasin las tradicionales movilizaciones a raíz del brote de coronavirus que impide que puedan realizarse reuniones en el espacio público ",
	"Los organismos de derechos humanos convocaron para el martes 24 a un <<pañuelazo blanco>>, una original iniciativa para que a través de redes sociales y desde los frentes de los domicilios particulares se compartan pañuelos, para conmemorar el Día Nacional de la Memoria por la Verdad y la Justicia, ante la imposibilidad de realizar la tradicional marcha por el aislamiento social, preventivo y obligatorio decretado por el gobierno nacional a raíz del coronavirus.
	Las entidades trabajaron en los últimos días para buscar la forma de conmemorar el 44 aniversario del último golpe militar, ocurrido el 24 de marzo de 1976, ante la imposibilidad de poder realizar la marcha a Plaza de Mayo.
	El 24 de marzo compartí en redes sociales fotos con pañuelos blancos. Ponelo en tu balcón, puerta o ventana. Sin marcha, pero con memoria, dice la convocatoria de los organismos, como Abuelas de Plaza de Mayo, Madres de Plaza de Mayo Línea Fundadora, Familiares de Desaparecidos, HIJOS y el CELS, entre otros.
	En las redes sociales, se propone utilizar las etiquetas #PañuelosConMemoria #24M #44AñosDelGolpe #Son30000 #MemoriaVerdadYJusticia, entre otros.
	Las acciones concluirán el martes a las 19.30 con una transmisión para seguir en la web o en los canales de TV que tomen la señal, que incluirá la lectura de un documento de los organismos de derechos humanos leída por representantes de las organizaciones convocantes.
	El pañuelo blanco es el emblema tradicional de la Madres de Plaza de Mayo, que las integrantes de esta Asociación comenzaron a utilizar a mediados de 1977, como una forma de identificarse grupalmente en una peregrinación a la Basílica de Luján que se llevó a cabo en ese año.
	En un principio, las Madres portaban en sus cabezas el primer pañal que habían usado sus hijos desaparecidos, y luego comenzaron a lucir pañuelos con los nombres de los desaparecidos en las marchas que se realizan todos los jueves, desde hace 43 años.
	Desde Abuelas de Plaza de Mayo, también invitaron a los usuarios de las redes sociales a publicar hasta el 24 de marzo fotos, dibujos, canciones o poemas, entre otras expresiones.
	A 44 años del golpe genocida, y ante la imposibilidad de marchar como todos los años por motivos de público conocimiento, las Abuelas llamamos a la sociedad a poblar las redes de posteos que nos ayuden a visibilizar que la Memoria sigue viva, que continuamos con la búsqueda de los nietos y nietas, manifestó la organización en un comunicado difundido esta semana.
	Los posteos deberán incluir una breve leyenda en la que cuenten por qué es importante recordar, utilizando los hashtags #ConstruimosMemoria y #MesDeLaMemoria.
	Un día antes, Abuelas lanzará una página web colaborativa en la que se podrán leer los documentos desclasificados sobre la represión de los años 70 que el gobierno de los Estados Unidos le entregó a la Argentina el año pasado.",
	"https://www.telam.com.ar/notas/202003/443259-coronavirus-panuelazo-blanco-reemplazara-marcha-24-de-marzo.html",
	1,
	"https://www.telam.com.ar/advf/imagenes/2019/03/5c97fcfd962ab_1004x565.jpg",
	1,
	2
	 ),

	(2,
	"LA UNLaM entregó mascarillas para prevenir el COVID-19 en ocho hospitales y centros de salud ",
	"La Universidad Nacional de La Matanza distribuyó máscarillas en impresión 3D para prevenir la transmisión del COVID-19 al Hospital Paroissien, al Hospital Balestrini, al Policlínico Central y al Hospital del Niño, entre otros centros de salud pública con asiento en el Partido. En total, sumará entregas a 20 instituciones en los próximos días.",
	
	"A partir de un proyecto conjunto entre el Departamento de Ciencias de la Salud y el Departamento de Ingeniería e Investigaciones Tecnológicas de la Universidad Nacional de La Matanza (UNLaM), ya se produjeron 720 mascarillas. Completan la lista de nosocomios que han recibido entregas, el Hospital Municipal Eva Perón, el UPA 18 de Virrey del Pino, el Centro de Salud 7 de Ciudad Celina, el CeSAC 14 y la Unidad Sanitaria Don Juan de Gregorio de Laferrere.
	La doctora Fabiana Lartigue, decana del Departamento de Salud de la UNLaM, comentó: <<En los próximos días, se continuará con la entrega a más centros de salud y ya hay 20 instituciones que nos han solicitado mascarillas>>. <<La producción de mascarillas tiene como prioridad a los hospitales y centros de salud públicos, que son los que consideramos que tienen más necesidad>>, manifestó Lartigue. Y agregó: <<Según la capacidad de producción de mascarillas, se intenta realizar las entregas de forma equitativa; en ocasiones, se puede entregar el pedido completo y, en ocasiones, entregamos una parte de la cantidad que nos han requerido, porque la intención es que todos los centros puedan recibir una cantidad mínimamente>>.
	Los hospitales y centros de salud pueden solicitar estas mascarillas a través de la página https://unlamcovid19.azurewebsites.net/. En dicho sitio, también se pueden contactar instituciones con la posibilidad de donar materiales para dar sustento a la producción en impresión 3D.
	El vicedecano del Departamento de Ingeniería e Investigaciones Tecnológicas de la UNLaM, Gabriel Blanco, indicó: Hasta ahora, tenemos producidas más de 700 mascarillas y la intención es fabricar entre 1.500 y 2.000; estamos en ese proceso, aunque hay escasez de materiales, por lo que también estamos tratando de buscar proveedores junto a la Secretaría de Ciencia y Técnica de la UNLaM.
	<<Para la realización de estos elementos de prevención, la UNLaM puso a disposición recursos económicos y también está participando de otras iniciativas para hacer frente a esta pandemia>>, aseveró Blanco. Y detalló: Los departamentos de Salud e Ingeniería, a instancias del Rector Daniel Martínez, participan del Comité de Crisis sanitaria del municipio de La Matanza; estamos desarrollando nuestra propuesta de trabajo y, en caso de que la pandemia siga creciendo, dispondremos de un espacio para albergar camas, por lo que la UNLaM está abierta a cualquier colaboración que se necesite.
	Mascarillas validadas para hacer frente al COVID-19
	La decana Lartigue destacó que <<se está trabajando muy bien, en un gran equipo, entre ambos departamentos de Salud e Ingeniería, como así también con la empresa Circo Studio, que forma parte del Polo Tecnológico de la UNLaM, y del Centro de Estudiantes, que se encarga de la entrega de las mascarillas a los hospitales. Respecto a las mascarillas, Lartigue contó que, “antes de iniciar la producción y entrega a los centros de salud, estos productos fueron validos por el Hospital Italiano de San Justo y por el Hospital de Haedo>>.",
	"http://www.el1digital.com.ar/articulo/view/90379/la-unlam-ya-entrego-mascarillas-para-prevenir-el-covid-19-en-ocho-hospitales-y-centros-de-salud",
	2,
	"http://www.el1digital.com.ar/multimedia/imagen/90379_mascabas-unlam-el1.jpg",
	2,
	3
	 );
     
insert into Diario_Revista(Id_Admin,Titulo,Numero,Descripcion) value (1,"aaa",1,"bb");

select * from Diario_Revista;


