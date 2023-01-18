CREATE TABLE Presents(
  id_present int primary key auto_increment,
  present char(50) NOT NULL ,
  price double NOT NULL
);
CREATE TABLE Friends(
                         id_friend int primary key auto_increment,
                         friend char(50) NOT NULL ,
                         fi_present int NOT NULL,
                foreign key (fi_present) references Presents(id_present)
);

INSERT INTO Presents(present, price) VALUES ('Pralinen',15),
                                            ('Krawatte',40),
                                            ('Socken',10),
                                            ('Videospiel',50),
                                            ('Brettspiel',25),
                                            ('Buch',10);

INSERT INTO Friends(friend, fi_present) VALUES  ('Steven',4),
                                                ('Georges',4),
                                                ('Tim',3),
                                                ('Tom',2),
                                                ('Ben',5),
                                                ('Bill',6),
                                                ('Ana',1),
                                                ('Liz',5);

