CREATE TABLE `responsi`.`staff` ( 
    `username` VARCHAR(30) NOT NULL , 
    `password` VARCHAR(30) NOT NULL , 
    `full_name` VARCHAR(50) NOT NULL , 
    `email` VARCHAR(30) NOT NULL , 
    `phone_num` VARCHAR(15) NOT NULL , 
    PRIMARY KEY (`username`(30))
    ) ENGINE = InnoDB;

CREATE TABLE `responsi`.`inventory` ( 
    `item_id` VARCHAR(10) NOT NULL , 
    `item_name` VARCHAR(30) NOT NULL , 
    `amount` INT(11) NOT NULL , 
    `unit` VARCHAR(15) NOT NULL , 
    `arrival_date` DATE NOT NULL , 
    `category` VARCHAR(20) NOT NULL , 
    `item_status` VARCHAR(20) NOT NULL , 
    `price` INT(20) NOT NULL , 
    PRIMARY KEY (`item_id`(10))
    ) ENGINE = InnoDB;

INSERT INTO `staff`(`username`, `password`, `full_name`, `email`, `phone_num`) VALUES ('rowang','123456','Rowang Pramudito','rowang@mail.com','0817382463');
INSERT INTO `staff`(`username`, `password`, `full_name`, `email`, `phone_num`) VALUES ('myadmin','123456','My Admin','myadmin@mail.com','0817382463');