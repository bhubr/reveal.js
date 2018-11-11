create user 'phpsqltest'@'localhost' identified by 'phpsqltest';
grant all privileges on sqlquests.* to 'phpsqltest'@'localhost';
flush privileges;