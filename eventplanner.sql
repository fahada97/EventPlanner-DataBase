create table tbluser
(userid int primary key auto_increment,
firstname varchar(10),
lastname varchar(10),
email varchar(50),
phone varchar(15),
password varchar(20),
type varchar(5)
);

create table tblfood
(foodid varchar(10) primary key,
fooddesc varchar (20),
foodprice double,
foodvendor varchar(20)
);

create table tblvenue
(venueid varchar(10) primary key,
venuedesc varchar (20),
venueprice double,
venuevendor varchar(20)
);

create table tbldecoration
(decorationid varchar(10) primary key,
decorationdesc varchar (20),
decorationprice double,
decorationvendor varchar(20)
);

create table tblevent
(eventid int primary key auto_increment,
datee varchar(10),
phone varchar(15),
guests int,
eventtype varchar(20),
venuetype varchar(20),
venueid varchar(10),
foodtype varchar(20),
foodid varchar(10), 
decorationtype varchar(20),
decorationid varchar(10),
userid int,
customerprice double,
adminprice double,
foreign key (venueid) references tblvenue(venueid),
foreign key (foodid) references tblfood(foodid),
foreign key (decorationid) references tbldecoration(decorationid),
foreign key (userid) references tbluser(userid)
);

INSERT INTO `tbluser`(`userid`, `firstname`, `lastname`, `email`, `phone`, `password`, `type`) VALUES (1,'Chon','Lintakoon','admin','201-454-5454','admin','admin');

INSERT INTO `tblfood`(`foodid`, `fooddesc`, `foodprice`, `foodvendor`) VALUES (111,'KOSHER FOOD',15,'Kosher People');
INSERT INTO `tblfood`(`foodid`, `fooddesc`, `foodprice`, `foodvendor`) VALUES (222,'CHINESE FOOD',20,'Chinatown special');
INSERT INTO `tblfood`(`foodid`, `fooddesc`, `foodprice`, `foodvendor`) VALUES (333,'ITALIAN FOOD',25,'Italian People');
INSERT INTO `tblfood`(`foodid`, `fooddesc`, `foodprice`, `foodvendor`) VALUES (444,'VEGETARIAN FOOD',10,'Vegetarian People');

INSERT INTO `tblvenue`(`venueid`, `venuedesc`, `venueprice`, `venuevendor`) VALUES (555,'LUXURY HOUSE',2000,'Royal Venues');
INSERT INTO `tblvenue`(`venueid`, `venuedesc`, `venueprice`, `venuevendor`) VALUES (666,'AFFORDABLE HOUSE',1500,'Affordable Venues');
INSERT INTO `tblvenue`(`venueid`, `venuedesc`, `venueprice`, `venuevendor`) VALUES (777,'CHEAP HOUSE',1000,'Cheap Venues');

INSERT INTO `tbldecoration`(`decorationid`, `decorationdesc`, `decorationprice`, `decorationvendor`) VALUES (888,'EXTRA DECORATION',500,'Royal Decorations');
INSERT INTO `tbldecoration`(`decorationid`, `decorationdesc`, `decorationprice`, `decorationvendor`) VALUES (999,'DECENT DECORATION',250,'Decent Decorations');
INSERT INTO `tbldecoration`(`decorationid`, `decorationdesc`, `decorationprice`, `decorationvendor`) VALUES (121,'LITTLE DECORATION',100,'Little Decorations');
