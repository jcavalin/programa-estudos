CREATE VIEW vw_arvore_assunto AS (
     WITH RECURSIVE cte (id, assunto, pai_id, grupo) AS (
         SELECT
             pai.id,
             pai.assunto,
             pai.pai_id,
             CAST(LPAD(pai.id, 3, "0") AS CHAR(1000)) AS grupo
         FROM
             assunto pai
         WHERE
             pai.excluido IS FALSE
           AND
             pai.pai_id IS NULL
         UNION ALL
         SELECT
             filho.id,
             filho.assunto,
             filho.pai_id,
             CAST(CONCAT(cte.grupo, LPAD(filho.id, 3, "0")) AS CHAR(1000)) AS grupo
         FROM
             assunto filho
         INNER JOIN
             cte ON filho.pai_id = cte.id
         WHERE
             filho.excluido IS FALSE
     )
     SELECT
         id,
         assunto,
         pai_id,
         grupo,
         FORMAT(FLOOR(CAST(LENGTH(grupo) AS UNSIGNED)), 0) / 3 AS nivel
     FROM
         cte
     ORDER BY
         grupo
);