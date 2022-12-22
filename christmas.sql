CREATE TABLE tblFriend (
    idFriend INT AUTO_INCREMENT PRIMARY KEY,
    dtName VARCHAR(50) NOT NULL,
    fiPresent INT
);

CREATE TABLE tblPresent (
    idPresent INT AUTO_INCREMENT PRIMARY KEY,
    dtName VARCHAR(50) NOT NULL,
    dtPrice DOUBLE NOT NULL
);

ALTER TABLE tblFriend
ADD CONSTRAINT FK_FriendPresent FOREIGN KEY (fiPresent) REFERENCES tblPresent(idPresent) ON UPDATE CASCADE;

INSERT INTO tblPresent
VALUES (NULL,'Pralinen',15),
       (NULL,'Krawatte',40),
       (NULL,'Socken',10),
       (NULL,'Videospiel',50),
       (NULL,'Brettspiel',25),
       (NULL,'Buch',10);

INSERT INTO tblFriend
VALUES (NULL,'Steven',4),
       (NULL,'Georges',4),
       (NULL,'Tim',3),
       (NULL,'Tom',2),
       (NULL,'Ben',5),
       (NULL,'Bill',6),
       (NULL,'Ana',1),
       (NULL,'Liz',5)