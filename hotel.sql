CREATE DATABASE hotel;
use hotel;
CREATE table room_type (typeID INT NOT NULL AUTO_INCREMENT,name VARCHAR(40),totalRooms INT NOT NULL,available INT NOT NULL, rate INT NOT NULL ,primary key(typeID));