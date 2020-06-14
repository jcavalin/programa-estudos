CREATE TABLE orgao
(
    id       SERIAL,
    nome     VARCHAR(150)          NOT NULL,
    excluido BOOLEAN DEFAULT FALSE NOT NULL,
    PRIMARY KEY (id)
) ENGINE = InnoDB;

INSERT INTO orgao (nome)
VALUES ('SEDF - Secretaria de Educação do DF'),
       ('Senado Federal'),
       ('PCDF - Polícia Civil do DF'),
       ('PF - Polícia Federal'),
       ('PGDF - Procuradoria-Geral do Distrito Federal'),
       ('TCDF - Tribunal de Contas do Distrito Federal'),
       ('BB - Banco do Brasil')
;