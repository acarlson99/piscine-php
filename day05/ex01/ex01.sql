create table ft_table(
id int PRIMARY_KEY AUTO_INCREMENT,
login varchar(8) NOT NULL,
group ENUM('staff', 'student', 'other'),
creation_date DATE);
