CREATE TABLE shoppingcart (
    shoppingcartid int not null auto_increment,
    primary key (`shoppingcartid`)
);

CREATE TABLE shoppingcart_line (
    shoppingcartlineid int not null auto_increment,
    shoppingcartid int not null,
    primary key (`shoppingcartlineid`),
    foreign key shoppingcart(`shoppingcartid`) references shoppingcart(`shoppingcartid`)
);

CREATE TABLE shoppingcart_item (
    shoppingcartitemid int not null auto_increment,
    shoppingcartlineid int not null,
    quantity int not null,
    unitprice int not null,
    productname varchar(255) not null,
    productclass varchar(255) not null,
    primary key (`shoppingcartitemid`),
    foreign key shoppingcartitem(`shoppingcartlineid`) references shoppingcart_line(`shoppingcartlineid`)
);

INSERT INTO shoppingcart (shoppingcartid) VALUES(1);

INSERT INTO shoppingcart_line (shoppingcartlineid, shoppingcartid) VALUES (1, 1);
INSERT INTO shoppingcart_line (shoppingcartlineid, shoppingcartid) VALUES (2, 1);
INSERT INTO shoppingcart_line (shoppingcartlineid, shoppingcartid) VALUES (3, 1);

INSERT INTO shoppingcart_item (shoppingcartitemid, shoppingcartlineid, quantity, unitprice, productname, productclass) VALUES (1, 1, 1, 89500, 'Apple MacBook Air 13,3" (2017) MQD32N/A', 'physical');
INSERT INTO shoppingcart_item (shoppingcartitemid, shoppingcartlineid, quantity, unitprice, productname, productclass) VALUES (2, 1, 1, 7990, '2-year Backup Plan Complete', 'insurance');
INSERT INTO shoppingcart_item (shoppingcartitemid, shoppingcartlineid, quantity, unitprice, productname, productclass) VALUES (3, 2, 1, 64900, 'AEG FSE72710P', 'physical');
INSERT INTO shoppingcart_item (shoppingcartitemid, shoppingcartlineid, quantity, unitprice, productname, productclass) VALUES (4, 2, 1, 0, 'Take old product with us', 'service');
INSERT INTO shoppingcart_item (shoppingcartitemid, shoppingcartlineid, quantity, unitprice, productname, productclass) VALUES (5, 2, 1, 0, 'Place and unpack', 'service');
INSERT INTO shoppingcart_item (shoppingcartitemid, shoppingcartlineid, quantity, unitprice, productname, productclass) VALUES (6, 2, 1, 9999, 'Have your product built-in', 'service');
INSERT INTO shoppingcart_item (shoppingcartitemid, shoppingcartlineid, quantity, unitprice, productname, productclass) VALUES (7, 3, 2, 2249, 'Case Logic Sleeve 13.3" LAPS-113 Black', 'physical');
