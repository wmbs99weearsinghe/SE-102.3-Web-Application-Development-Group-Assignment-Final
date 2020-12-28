- -------------------------------------------------------- -- -- Table structure for table `credentials` -- CREATE TABLE `credentials` ( `email` varchar(150) NOT NULL, `password` varchar(300) NOT NULL, `status` varchar(10) NOT NULL ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci



-- -------------------------------------------------------- -- -- Table structure for table `users` -- CREATE TABLE `users` ( `email` varchar(150) NOT NULL, `title` varchar(10) NOT NULL, `f_name` varchar(50) NOT NULL, `l_name` varchar(50) NOT NULL, `add_line_1` varchar(100) NOT NULL, `add_line_2` varchar(100) NOT NULL, `city` varchar(50) NOT NULL, `zipcode` varchar(10) NOT NULL, `country` varchar(25) NOT NULL, `phone` varchar(15) NOT NULL ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci



