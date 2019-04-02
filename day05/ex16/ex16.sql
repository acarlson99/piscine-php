SELECT COUNT(*) AS movies
FROM member_history
WHERE (date < '2007-27-07'
AND date > '2006-30-10')
OR DATE_FORMAT(date,'%m-%d') = '12-24';
