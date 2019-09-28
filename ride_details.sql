CREATE TABLE `ride_details` (
  `rid` int(11) NOT NULL AUTO_INCREMENT,
  `cid` int(11) NOT NULL,
  `dname` varchar(255) NOT NULL,
  `source` varchar(255) NOT NULL,
  `destination` varchar(255) NOT NULL,
  `p_mode` varchar (255) NOT NULL,
  `c_type` varchar (255) NOT NULL,
  `fare` int(20) NOT NULL,
  `ride_time` TIMESTAMP NOT NULL,
  PRIMARY KEY (`rid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `ride_details` 
ADD CONSTRAINT `FK_ride` FOREIGN KEY (`cid`) REFERENCES `customer` (`cid`) ON UPDATE CASCADE;