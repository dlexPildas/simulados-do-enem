--drop role administrador;

--create role administrador with login password 'sosenemadmin' superuser createdb;

--create database mi with owner = administrador encoding = 'utf8' connection limit = -1;


CREATE TABLE  usuarios (
  idusuario SERIAL NOT NULL,
  nome VARCHAR(100) NOT NULL,
  sobrenome VARCHAR(100),
  foto VARCHAR(100),
  email VARCHAR(100) NOT NULL,
  senha VARCHAR(32),
  privilegio VARCHAR(1) NOT NULL,
  dataplano DATE,
  PRIMARY KEY(idusuario)
) ;

CREATE TABLE simulado (
  idsimulado SERIAL,
  idusuario INTEGER NOT NULL,
  data DATE NOT NULL,
  tempo VARCHAR(8) NOT NULL,
  pontuacao INTEGER NOT NULL,
  tipo VARCHAR(1) NOT NULL,
  CONSTRAINT simulado_pkey PRIMARY KEY(idsimulado),
  CONSTRAINT simulado_fk FOREIGN KEY (idusuario)
    REFERENCES  usuarios(idusuario)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
    NOT DEFERRABLE
);

CREATE TABLE prova (
  idprova SERIAL,
  qtdquestoes INTEGER NOT NULL,
  ano INTEGER NOT NULL,
  CONSTRAINT prova_pkey PRIMARY KEY(idprova)
) ;

CREATE TABLE areadeconhecimento (
  idarea SERIAL,
  nome VARCHAR(30) NOT NULL,
  CONSTRAINT areadeconhecimento_pkey PRIMARY KEY(idarea)
) ;

CREATE TABLE questao (
  idquestao SERIAL,
  idusuario INTEGER,
  idprova INTEGER NOT NULL,
  idareaconhecimento INTEGER,
  enunciado VARCHAR(100) NOT NULL,
  questaooficial VARCHAR(1) NOT NULL,
  respostaa VARCHAR(30),
  respostab VARCHAR(30),
  respostac VARCHAR(30),
  respostad VARCHAR(30),
  respostae VARCHAR(30),
  respostacorreta VARCHAR(1),
  CONSTRAINT questao_pkey PRIMARY KEY(idquestao),
  CONSTRAINT questao_fk FOREIGN KEY (idusuario)
    REFERENCES  usuarios(idusuario)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
    NOT DEFERRABLE,
  CONSTRAINT questao_fk1 FOREIGN KEY (idprova)
    REFERENCES  prova(idprova)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
    NOT DEFERRABLE,
  CONSTRAINT questao_fk2 FOREIGN KEY (idareaconhecimento)
    REFERENCES  areadeconhecimento(idarea)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
    NOT DEFERRABLE
) ;

CREATE TABLE  tablesimuladoquestao (
  idsimulado INTEGER NOT NULL,
  idquestao INTEGER NOT NULL,
  CONSTRAINT tablesimuladoquestao_fk FOREIGN KEY (idsimulado)
    REFERENCES  simulado(idsimulado)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
    NOT DEFERRABLE,
  CONSTRAINT tablesimuladoquestao_fk1 FOREIGN KEY (idquestao)
    REFERENCES  questao(idquestao)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
    NOT DEFERRABLE
) ;

CREATE TABLE  denunciaquestao (
  iddencuncia SERIAL,
  idusuario INTEGER NOT NULL,
  idquestao INTEGER NOT NULL,
  observacao VARCHAR(400),
  data DATE DEFAULT 'now'::text::date NOT NULL,
  CONSTRAINT denunciaquestao_pkey PRIMARY KEY(iddencuncia)
) ;

CREATE TABLE  relatorio (
  idrelatorio SERIAL,
  quantidadecadastrados INTEGER,
  quantidadeacessos INTEGER,
  quantidadedestivados INTEGER,
  quantidadeplanoscancelados INTEGER,
  data DATE DEFAULT 'now'::text::date,
  quantidadeplanosnovos INTEGER,
  CONSTRAINT relatorio_pkey PRIMARY KEY(idrelatorio)
);
 
CREATE TABLE  logSistema (
  idhistorico SERIAL,
  idusuario INTEGER NOT NULL,
  descricao VARCHAR(400) NOT NULL,
  tipoacao VARCHAR(30) NOT NULL,
  data DATE DEFAULT 'now'::text::date NOT NULL,
  CONSTRAINT historico_pkey PRIMARY KEY(idhistorico),
  CONSTRAINT historico_fk FOREIGN KEY (idusuario)
    REFERENCES  usuarios(idusuario)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
    NOT DEFERRABLE
) ;

CREATE TABLE  usuariorelatorio (
  idusuario INTEGER NOT NULL,
  idrelatorio INTEGER NOT NULL,
  CONSTRAINT usuariorelatorio_fk FOREIGN KEY (idusuario)
    REFERENCES  usuarios(idusuario)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
    NOT DEFERRABLE,
  CONSTRAINT usuariorelatorio_fk1 FOREIGN KEY (idrelatorio)
    REFERENCES  relatorio(idrelatorio)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
    NOT DEFERRABLE
);

