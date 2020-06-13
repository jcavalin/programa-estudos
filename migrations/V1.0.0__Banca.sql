CREATE TABLE banca
(
    id       SERIAL,
    nome     VARCHAR(150)          NOT NULL,
    excluido BOOLEAN DEFAULT FALSE NOT NULL,
    PRIMARY KEY (id)
) ENGINE = InnoDB;

INSERT INTO banca (nome)
VALUES ('CESPE'),
       ('Cebraspe'),
       ('Idecan'),
       ('FCC'),
       ('Iades'),
       ('Cesgranrio'),
       ('Fundação Universa'),
       ('FUNRIO'),
       ('FUNTEF-PR'),
       ('Inaz do Pará'),
       ('Cetro'),
       ('CIEE'),
       ('UFRRJ'),
       ('Instituto Quadrix'),
       ('UNIVERSA')
;