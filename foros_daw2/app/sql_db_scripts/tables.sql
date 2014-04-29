create table daw2_foros
( id integer unsigned auto_increment not null
, nombre varchar(255) not null 
, descripcion varchar(500) null 
, fecha_creacion date not null
, usuario_id integer unsigned not null

, primary key (id)
, unique (nombre)
, foreign key (usuario_id) references usuarios(id)
)
engine=innodb
character set utf8 collate utf8_general_ci
;

create table daw2_temas
( id integer unsigned auto_increment not null
, nombre varchar(255) not null 
, descripcion varchar(500) null
, fecha_creacion date not null 
, imagen varchar(500) null
, foro_id integer unsigned not null
, usuario_id integer unsigned not null

, primary key (id)
, unique (foro_id, nombre)
, foreign key (foro_id) references foros(id) on delete cascade
, foreign key (usuario_id) references usuarios(id)
)
engine=innodb
character set utf8 collate utf8_general_ci
;


create table daw2_mensajes
( id integer unsigned auto_increment not null
, texto varchar(255) not null 
, fecha_creacion date not null
, imagen varchar(500) null
, video varchar(500) null 
, tema_id integer unsigned not null
, usuario_id integer unsigned not null

, primary key (id)
, foreign key (tema_id) references temas(id) on delete cascade
, foreign key (usuario_id) references usuarios(id)
)
engine=innodb
character set utf8 collate utf8_general_ci
;
