UPDATE ft_table
SET birthday = birthday + INTERVAL 20 YEAR
WHERE id > 5;
