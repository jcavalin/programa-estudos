CREATE TABLE banca
(
    id       SERIAL,
    nome     VARCHAR(150)          NOT NULL,
    excluido BOOLEAN DEFAULT FALSE NOT NULL,
    PRIMARY KEY (id)
) ENGINE = InnoDB;

INSERT INTO banca (nome)
VALUES ('Cebraspe'),
       ('FCC'),
       ('Iades'),
       ('Cesgranrio'),
       ('Instituto Quadrix')
;