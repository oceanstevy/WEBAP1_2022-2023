CREATE TABLE tblPresent(
                           idPresent INT AUTO_INCREMENT PRIMARY KEY,
                           dtPresent VARCHAR(255) NOT NULL,
                           dtPrice DOUBLE
);

CREATE TABLE tblFriend(
                          idFriend INT AUTO_INCREMENT PRIMARY KEY,
                          dtFriend VARCHAR(255) NOT NULL ,
                          fiPresent INT,
                          CONSTRAINT FK_FriendPresent
                              FOREIGN KEY (fiPresent) REFERENCES tblPresent (idPresent)
);

INSERT INTO tblPresent(dtPresent, dtPrice)
VALUES ('Pralinen',15),
       ('Krawatte',40),
       ('Socken',10),
       ('Videospiel',50),
       ('Brettspiel',25),
       ('Buch',10);

INSERT INTO tblFriend(dtFriend, fiPresent)
VALUES ('Steven',4),
       ('Georges',4),
       ('Tim',3),
       ('Tom',2),
       ('Ben',5),
       ('Bill',6),
       ('Ana',1),
       ('Liz',5);