--Cadastro de usuários
insert into usuarios (nome, sobrenome, foto, email, senha, privilegio, dataplano) values ('Marcos Vinicius', 'Cruz Lima', 'null', 'marcosvinicius@outlook.com', '12345678', '1', '11/12/2017');
insert into usuarios (nome, sobrenome, foto, email, senha, privilegio, dataplano) values ('Itamar', 'Oliveira Maximo', 'null', 'itamar@gmail.com', '12345678', '1', '07/11/2017');
insert into usuarios (nome, sobrenome, foto, email, senha, privilegio, dataplano) values ('Giovana', 'Forninho da Silva', 'null', 'giovana@outlook.com', '12345678', '1', '10/12/2017');
insert into usuarios (nome, sobrenome, foto, email, senha, privilegio, dataplano) values ('Lucas', 'Fada Cardoso', 'null', 'lucas@yahoo.com', '12345678', '1', '11/07/2017');

--Cadastro de simulado
insert into simulado (idsimulado, idusuario, data, tempo, pontuacao, tipo) values ('1','4', '12/11/2017', '03:14:38', '734', '');
insert into simulado (idsimulado, idusuario, data, tempo, pontuacao, tipo) values ('2','3', '11/06/2017', '02:59:32', '653', '');
insert into simulado (idsimulado, idusuario, data, tempo, pontuacao, tipo) values ('3','2', '12/12/2017', '03:31:53', '832', '');
insert into simulado (idsimulado, idusuario, data, tempo, pontuacao, tipo) values ('4','1', '15/12/2017', '03:46:24', '767', '');
insert into simulado (idsimulado, idusuario, data, tempo, pontuacao, tipo) values ('5','3', '16/12/2017', '01:12:46', '322', '');
		
--Cadastro de prova
insert into prova (idprova, qtdquestoes, ano) values ('1','90', '2016');

--Cadastro de Área de Conhecimento
insert into areadeconhecimento (idarea, nome) values ('1', 'Ciências Humanas e suas Tecnologias');
insert into areadeconhecimento (idarea, nome) values ('2', 'Ciências da Natureza e suas Tecnologias');
insert into areadeconhecimento (idarea, nome) values ('3', 'Linguagens');
insert into areadeconhecimento (idarea, nome) values ('4', 'Códigos e suas Tecnologias');
insert into areadeconhecimento (idarea, nome) values ('5', 'Matemática e suas Tecnologias');