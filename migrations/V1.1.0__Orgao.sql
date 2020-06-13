CREATE TABLE orgao
(
    id       SERIAL,
    nome     VARCHAR(150)          NOT NULL,
    excluido BOOLEAN DEFAULT FALSE NOT NULL,
    PRIMARY KEY (id)
) ENGINE = InnoDB;

INSERT INTO orgao (nome)
VALUES ('TJ RJ - Tribunal de Justiça do Estado do Rio de Janeiro'),
       ('SEDF - Secretaria de Educação do DF'),
       ('Senado Federal'),
       ('Receita Federal'),
       ('PC PR - Polícia Civil do Estado do Paraná'),
       ('PCDF - Polícia Civil do DF'),
       ('PF - Polícia Federal'),
       ('DEPEN - Departamento Penitenciário Nacional'),
       ('Polícia Penal MG'),
       ('PGDF - Procuradoria-Geral do Distrito Federal'),
       ('TCDF - Tribunal de Contas do Distrito Federal'),
       ('IME - Instituto Militar de Engenharia - Exército Brasileiro'),
       ('AL CE - Assembleia Legislativa do Estado do Ceará'),
       ('TJM MG - Tribunal de Justiça Militar do Estado de Minas Gerais'),
       ('ADASA - Agência Reguladora de Águas, Energia e Saneamento do Distrito Federal'),
       ('TCM/SP - Tribunal de Contas do Município de São Paulo'),
       ('OAB - Exame de Ordem'),
       ('Exército ESA - Escola de Sargento das Armas'),
       ('AGEPEN/DF - Agente Penitenciário do Distrito Federal - DF'),
       ('TCE RJ - Tribunal de Contas do Estado do Rio de Janeiro'),
       ('CFC - Conselho Federal de Contabilidade'),
       ('BB - Banco do Brasil'),
       ('EPCAR - Escola Preparatória de Cadetes do AR'),
       ('PGM Canoas/RS'),
       ('Câmara de Aracaju/SE')
;