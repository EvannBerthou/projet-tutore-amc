SET FOREIGN_KEY_CHECKS=0; 
drop table users;
drop table qcm; 
drop table question; 
drop table reponse; 


SET FOREIGN_KEY_CHECKS=1;  
create table users (
  id INT NOT NULL AUTO_INCREMENT,
  nom varchar(20),
  prenom varchar(20),
  identifiant varchar(20) unique, 
  mdp varchar(20),
  mail varchar(50), 
  PRIMARY KEY(id)
); 


create table qcm (
  id INT NOT NULL AUTO_INCREMENT,
  titre varchar (50),
  datee varchar(10),
  matiere varchar(20),
  idprof int,
  PRIMARY KEY(id), 
  Foreign Key (idprof) References users(id)
); 

create table question (
  id INT NOT NULL AUTO_INCREMENT,
  idqcm int ,
  question varchar(50),
  PRIMARY KEY(id),
  Foreign Key (idqcm) references qcm(id)
); 
  
create table reponse (
  id INT NOT NULL AUTO_INCREMENT,
  idquestion int,
  reponse varchar (50),
  vrais int,
  PRIMARY KEY(id),
  foreign key (idquestion) references question(id)
); 

--insert users 
insert into users(nom,prenom,identifiant,mdp,mail) values ("BERTHOU","Evann","EB","admin","evann.berhou@bob.com");
insert into users(nom,prenom,identifiant,mdp,mail) values ('Marsant','Laurent','ML','C','laurent.marsant@bob.com');
insert into users(nom,prenom,identifiant,mdp,mail) values ('DIACONESCO','Thomas ','TD','sql','thomas.diaconesco@bob.com');
insert into users(nom,prenom,identifiant,mdp,mail) values ('bob','bob','bob','bob','bob@bob.com');

--insert qcm
insert into qcm(titre,datee,matiere,idprof) values ("test","10/09/2001","Droit",2);
insert into qcm(titre,datee,matiere,idprof) values ("test connaissance","09/10/2001","Droit",3);
insert into qcm(titre,datee,matiere,idprof) values ("test de memoire","09/11/2001","Economie" ,3);
insert into qcm(titre,datee,matiere,idprof) values ("test de competance","09/10/2001","Economie",3);
insert into qcm(titre,datee,matiere,idprof) values ("test resistance","10/10/2001","Droit",3);



--insert question
insert into question(idqcm,question) values (2,"qui est le plus fort?");
insert into question(idqcm,question) values (2,"qui est le plus beau des garçons?");
insert into question(idqcm,question) values (2,"qui est la plus belle des filles?");
insert into question(idqcm,question) values (2,"qui est le plus mignion des animeaux?");

-- insert reponse
insert into reponse(idquestion,reponse,vrais) values (1,"Evann",1);
insert into reponse(idquestion,reponse,vrais) values (1,"Benjamin",0);
insert into reponse(idquestion,reponse,vrais) values (1,"Thomas",0);
insert into reponse(idquestion,reponse,vrais) values (1,"Alicia",0);

insert into reponse(idquestion,reponse,vrais) values (2,"Evann",1);
insert into reponse(idquestion,reponse,vrais) values (2,"Benjamin",0);
insert into reponse(idquestion,reponse,vrais) values (2,"Thomas",0);
insert into reponse(idquestion,reponse,vrais) values (2,"bob",0);

insert into reponse(idquestion,reponse,vrais) values (3,"Emilie",1);
insert into reponse(idquestion,reponse,vrais) values (3,"Esther",1);

insert into reponse(idquestion,reponse,vrais) values (4,"Chat",1);
insert into reponse(idquestion,reponse,vrais) values (4,"Cheval",0);
insert into reponse(idquestion,reponse,vrais) values (4,"Chien",0);
insert into reponse(idquestion,reponse,vrais) values (4,"Tortue",0);


--affichage
select * from users;
select * from qcm;
select * from question; 
select * from reponse;
