INSERT INTO ft_table (login, `group`, creation_date)
SELECT login, 'other', birthday
FROM user_card
WHERE last_name LIKE "%a%"
AND LENGTH(login) < 9
ORDER BY last_name LIMIT 10;
