CREATE TABLE programa_estudos
(
    id         SERIAL,
    orgao_id   BIGINT UNSIGNED       NOT NULL,
    banca_id   BIGINT UNSIGNED       NOT NULL,
    excluido   BOOLEAN DEFAULT FALSE NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (orgao_id)
        REFERENCES orgao (id)
        ON DELETE RESTRICT,
    FOREIGN KEY (banca_id)
        REFERENCES banca (id)
        ON DELETE RESTRICT
) ENGINE = InnoDB;

INSERT INTO programa_estudos (orgao_id, banca_id)  SELECT FLOOR(RAND() * (MAX(o.id) - MIN(o.id) + 1) + MIN(o.id)) AS orgao_id, FLOOR(RAND() * (MAX(b.id) - MIN(b.id) + 1) + MIN(b.id)) AS banca_id FROM orgao o INNER JOIN banca b;
INSERT INTO programa_estudos (orgao_id, banca_id)  SELECT FLOOR(RAND() * (MAX(o.id) - MIN(o.id) + 1) + MIN(o.id)) AS orgao_id, FLOOR(RAND() * (MAX(b.id) - MIN(b.id) + 1) + MIN(b.id)) AS banca_id FROM orgao o INNER JOIN banca b;
INSERT INTO programa_estudos (orgao_id, banca_id)  SELECT FLOOR(RAND() * (MAX(o.id) - MIN(o.id) + 1) + MIN(o.id)) AS orgao_id, FLOOR(RAND() * (MAX(b.id) - MIN(b.id) + 1) + MIN(b.id)) AS banca_id FROM orgao o INNER JOIN banca b;