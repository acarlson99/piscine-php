SELECT title AS 'Title', summary AS 'Summary', prod_year
FROM film
WHERE id_genre = 'erotic'
ORDER BY prod_year DESC;
