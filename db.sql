create table users(
    idusers int AUTO_INCREMENT PRIMARY key,
    usuario varchar(200),
    senha varchar(200),
    tipo varchar(30),
    idcliente int,
    constraint usersfk_idcliente FOREIGN key (idcliente) REFERENCES clientes(idcliente)
);
create table servicos(
    idservicos int AUTO_INCREMENT primary key,
    data varchar(200),
    cliente varchar(200),
    cpf varchar(200),
    endereco varchar(200),
    plano varchar(200),
    idcliente int not null,
    constraint servicosfk_idcliente FOREIGN key (idcliente) REFERENCES clientes(idcliente)
);
create table clientes(
    idcliente int AUTO_INCREMENT primary key,
    nome varchar(100),
    cpf varchar(100),
    nasc varchar(100),
    endereco varchar(100),
    plano varchar(50),
    instalacao varchar(100)
);
create table chat1(
    nome varchar(100),
    mensagem varchar(253)
);
create table chat2(
    nome varchar(100),
    mensagem varchar(253)
)