CREATE TABLE assunto
(
    id       SERIAL,
    assunto  VARCHAR(150)          NOT NULL,
    pai_id   BIGINT UNSIGNED,
    excluido BOOLEAN DEFAULT FALSE NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (pai_id)
        REFERENCES assunto (id)
        ON DELETE RESTRICT
) ENGINE = InnoDB;

INSERT INTO assunto (assunto)
VALUES ('Português'),
       ('Matemática'),
       ('Noções de Informática')
;

INSERT INTO assunto (assunto, pai_id) SELECT 'Ortografia', id FROM assunto WHERE assunto = 'Português';
INSERT INTO assunto (assunto, pai_id) SELECT 'Grafia e Emprego de Iniciais Maiúsculas', id FROM assunto WHERE assunto = 'Ortografia';
INSERT INTO assunto (assunto, pai_id) SELECT 'Parônimos e Homônimos', id FROM assunto WHERE assunto = 'Ortografia';
INSERT INTO assunto (assunto, pai_id) SELECT 'Morfologia', id FROM assunto WHERE assunto = 'Português';
INSERT INTO assunto (assunto, pai_id) SELECT 'Estrutura das Palavras: Radical, Desinência, Prefixo e Sufixo', id FROM assunto WHERE assunto = 'Morfologia';
INSERT INTO assunto (assunto, pai_id) SELECT 'Formação das Palavras: Composição, Derivação, Hibridismo, Onomatopeia e Abreviação', id FROM assunto WHERE assunto = 'Morfologia';
INSERT INTO assunto (assunto, pai_id) SELECT 'Artigos', id FROM assunto WHERE assunto = 'Morfologia';

INSERT INTO assunto (assunto, pai_id) SELECT 'Aritmética e Problemas', id FROM assunto WHERE assunto = 'Matemática';
INSERT INTO assunto (assunto, pai_id) SELECT 'Sistemas de Numeração  e  Operações Fundamentais', id FROM assunto WHERE assunto = 'Aritmética e Problemas';
INSERT INTO assunto (assunto, pai_id) SELECT 'Números Primos e Divisibilidade', id FROM assunto WHERE assunto = 'Aritmética e Problemas';
INSERT INTO assunto (assunto, pai_id) SELECT 'MMC e MDC', id FROM assunto WHERE assunto = 'Aritmética e Problemas';
INSERT INTO assunto (assunto, pai_id) SELECT 'Álgebra', id FROM assunto WHERE assunto = 'Matemática';
INSERT INTO assunto (assunto, pai_id) SELECT 'Potência', id FROM assunto WHERE assunto = 'Álgebra';
INSERT INTO assunto (assunto, pai_id) SELECT 'Radical', id FROM assunto WHERE assunto = 'Álgebra';
INSERT INTO assunto (assunto, pai_id) SELECT 'Problemas', id FROM assunto WHERE assunto = 'Álgebra';

INSERT INTO assunto (assunto, pai_id) SELECT 'Hardware - Dispositivos de Armazenamento, Memórias e Periféricos', id FROM assunto WHERE assunto = 'Noções de Informática';
INSERT INTO assunto (assunto, pai_id) SELECT 'Sistema Operacional', id FROM assunto WHERE assunto = 'Noções de Informática';
INSERT INTO assunto (assunto, pai_id) SELECT 'Windows', id FROM assunto WHERE assunto = 'Sistema Operacional';
INSERT INTO assunto (assunto, pai_id) SELECT 'Windows 98', id FROM assunto WHERE assunto = 'Sistema Operacional';
INSERT INTO assunto (assunto, pai_id) SELECT 'Windows 2000', id FROM assunto WHERE assunto = 'Sistema Operacional';
INSERT INTO assunto (assunto, pai_id) SELECT 'Windows Server 2003', id FROM assunto WHERE assunto = 'Sistema Operacional';
INSERT INTO assunto (assunto, pai_id) SELECT 'Windows Explorer - conceitos de organização de pastas e arquivos', id FROM assunto WHERE assunto = 'Noções de Informática';
INSERT INTO assunto (assunto, pai_id) SELECT 'Pacote de Aplicativos: Microsoft Office, BrOffice, OpenOffice e LibreOffice', id FROM assunto WHERE assunto = 'Noções de Informática';