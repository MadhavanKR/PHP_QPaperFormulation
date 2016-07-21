Create table subject(sid varchar(10),sname varchar(40),
	Constraint subject_pk primary key(sid,sname));

Create table faculty(fid int,fname varchar(40),password varchar(40),email varchar(50),write1 int(1) DEFAULT 0,first int(1) DEFAULT 1,
      	Constraint faculty_pk_fid primary key(fid));

Create table teaching(fid int, sid varchar(10), 
	constraint teaching_pk primary key(fid,sid),
	constraint teaching_fk_sid foreign key(sid) references subject(sid),
	constraint teaching_fk_fid  foreign key(fid) references faculty(fid));

create table admin(password varchar(40));
insert into admin values('qwerty');


create table 4M(qno int AUTO_INCREMENT,question varchar(400),image varchar(200),unit int(2),sid varchar(10),include int(1) DEFAULT '0',
                constraint 4M_pk primary key(qno,unit,sid));
-----****--------
//ALTER TABLE 4M AUTO_INCREMENT=1;   thi statement is used to set an initial value,whose value will be Auto-incremented on every insert statement !!!!!  Yeah,i know,that's a good feature... :P
ALTER TABLE 6M AUTO_INCREMENT=1;
ALTER TABLE 7M AUTO_INCREMENT=1;
ALTER TABLE 8M AUTO_INCREMENT=1;
ALTER TABLE 10M AUTO_INCREMENT=1;

-----****--------

create table 6M(qno int AUTO_INCREMENT,question varchar(400),image varchar(200),unit int(2),sid varchar(10),include int(1) DEFAULT '0',
                constraint 6M_pk primary key(qno,unit,sid));

create table 7M(qno int AUTO_INCREMENT,question varchar(400),image varchar(200),unit int(2),sid varchar(10),include int(1) DEFAULT '0',
                constraint 7M_pk primary key(qno,unit,sid));

create table 8M(qno int AUTO_INCREMENT,question varchar(400),image varchar(200),unit int(2),sid varchar(10),include int(1) DEFAULT '0',
                constraint 8M_pk primary key(qno,unit,sid));


create table 10M(qno int AUTO_INCREMENT,question varchar(400),image varchar(200),unit int(2),sid varchar(10),include int(1) DEFAULT '0',
                constraint 10M_pk primary key(qno,unit,sid));         


-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------   
								INSERT STATEMENTS !!!!!!!!!!

>
insert into subject values("10cs51","Software Engineering");
insert into subject values("10cs52","System Software");
insert into faculty values(500,'Girija','123456','girija@gmail.com');
insert into teaching values(500,"10cs51");
insert into teaching values(500,"10cs52");

insert into 4M values(1,"what is your name unit 1","nothing",1,"10cs51",1);
insert into 4M values(2,"who are you? unit 1","nothing",1,"10cs51",1);
insert into 4M values(3,"who am i? unit 1","nothing",1,"10cs51",1);

insert into 4M values(1,"what is your name unit 2","nothing",2,"10cs51",1);
insert into 4M values(2,"who are you? unit 2","nothing",2,"10cs51",1);
insert into 4M values(3,"who am i? unit 2","nothing",2,"10cs51",1);

insert into 4M values(1,"what is your name unit 3","nothing",3,"10cs51",1);
insert into 4M values(2,"who are you? unit 3","nothing",3,"10cs51",1);
insert into 4M values(3,"who am i? unit 3","nothing",3,"10cs51",1);

insert into 4M values(1,"what is your name unit 4","nothing",4,"10cs51",1);
insert into 4M values(2,"who are you? unit 4","nothing",4,"10cs51",1);
insert into 4M values(3,"who am i? unit 4","nothing",4,"10cs51",1);

insert into 4M values(1,"what is your name unit 5","nothing",5,"10cs51",1);
insert into 4M values(2,"who are you? unit 5","nothing",5,"10cs51",1);
insert into 4M values(3,"who am i? unit 5","nothing",5,"10cs51",1);

insert into 4M values(1,"what is your name unit 6","nothing",6,"10cs51",1);
insert into 4M values(2,"who are you? unit 6","nothing",6,"10cs51",1);
insert into 4M values(3,"who am i? unit 6","nothing",6,"10cs51",1);

insert into 4M values(1,"what is your name unit 7","nothing",7,"10cs51",1);
insert into 4M values(2,"who are you? unit 7","nothing",7,"10cs51",1);
insert into 4M values(3,"who am i? unit 7","nothing",7,"10cs51",1);

insert into 4M values(1,"what is your name unit 8","nothing",8,"10cs51",1);
insert into 4M values(2,"who are you? unit 8","nothing",8,"10cs51",1);
insert into 4M values(3,"who am i? unit 8","nothing",8,"10cs51",1);

-----------------------------------------------------------------------------------------

insert into 6M values(1,"This is the first question unit 1","nothing",1,"10cs51",1);
insert into 6M values(2,"This is the second unit 1","nothing",1,"10cs51",1);
insert into 6M values(3,"This is the third unit 1","nothing",1,"10cs51",1);

insert into 6M values(1,"This is the first question unit 2","nothing",2,"10cs51",1);
insert into 6M values(2,"This is the second unit 2","nothing",2,"10cs51",1);
insert into 6M values(3,"This is the third unit 2","nothing",2,"10cs51",1);

insert into 6M values(1,"This is the first question unit 3","nothing",3,"10cs51",1);
insert into 6M values(2,"This is the second unit 3","nothing",3,"10cs51",1);
insert into 6M values(3,"This is the third unit 3","nothing",3,"10cs51",1);

insert into 6M values(1,"This is the first question unit 4","nothing",4,"10cs51",1);
insert into 6M values(2,"This is the second unit 4","nothing",4,"10cs51",1);
insert into 6M values(3,"This is the third unit 4","nothing",4,"10cs51",1);

insert into 6M values(1,"This is the first question unit 5","nothing",5,"10cs51",1);
insert into 6M values(2,"This is the second unit 5","nothing",5,"10cs51",1);
insert into 6M values(3,"This is the third unit 5","nothing",5,"10cs51",1);

insert into 6M values(1,"This is the first question unit 6","nothing",6,"10cs51",1);
insert into 6M values(2,"This is the second unit 6","nothing",6,"10cs51",1);
insert into 6M values(3,"This is the third unit 6","nothing",6,"10cs51",1);

insert into 6M values(1,"This is the first question unit 7","nothing",7,"10cs51",1);
insert into 6M values(2,"This is the second unit 7","nothing",7,"10cs51",1);
insert into 6M values(3,"This is the third unit 7","nothing",7,"10cs51",1);

insert into 6M values(1,"This is the first question unit 8","nothing",8,"10cs51",1);
insert into 6M values(2,"This is the second unit 8","nothing",8,"10cs51",1);
insert into 6M values(3,"This is the third unit 8","nothing",8,"10cs51",1);

-------------------------------------------------------------------------------------------
insert into 8M values(1,"This is the first in 8 marksquestion unit 1","nothing",1,"10cs51",1);
insert into 8M values(2,"This is the second in 8 marks unit 1","nothing",1,"10cs51",1);
insert into 8M values(3,"This is the third in 8 marks unit 1","nothing",1,"10cs51",1);

insert into 8M values(1,"This is the first in 8 marksquestion unit 2","nothing",2,"10cs51",1);
insert into 8M values(2,"This is the second in 8 marks unit 2","nothing",2,"10cs51",1);
insert into 8M values(3,"This is the third in 8 marks unit 2","nothing",2,"10cs51",1);

insert into 8M values(1,"This is the first in 8 marksquestion unit 3","nothing",3,"10cs51",1);
insert into 8M values(2,"This is the second in 8 marks unit 3","nothing",3,"10cs51",1);
insert into 8M values(3,"This is the third in 8 marks unit 3","nothing",3,"10cs51",1);

insert into 8M values(1,"This is the first in 8 marksquestion unit 4","nothing",4,"10cs51",1);
insert into 8M values(2,"This is the second in 8 marks unit 4","nothing",4,"10cs51",1);
insert into 8M values(3,"This is the third in 8 marks unit 4","nothing",4,"10cs51",1);

insert into 8M values(1,"This is the first in 8 marksquestion unit 5","nothing",5,"10cs51",1);
insert into 8M values(2,"This is the second in 8 marks unit 5","nothing",5,"10cs51",1);
insert into 8M values(3,"This is the third in 8 marks unit 5","nothing",5,"10cs51",1);

insert into 8M values(1,"This is the first in 8 marksquestion unit 6","nothing",6,"10cs51",1);
insert into 8M values(2,"This is the second in 8 marks unit 6","nothing",6,"10cs51",1);
insert into 8M values(3,"This is the third in 8 marks unit 6","nothing",6,"10cs51",1);

insert into 8M values(1,"This is the first in 8 marksquestion unit 7","nothing",7,"10cs51",1);
insert into 8M values(2,"This is the second in 8 marks unit 7","nothing",7,"10cs51",1);
insert into 8M values(3,"This is the third in 8 marks unit 7","nothing",7,"10cs51",1);

insert into 8M values(1,"This is the first in 8 marksquestion unit 8","nothing",8,"10cs51",1);
insert into 8M values(2,"This is the second in 8 marks unit 8","nothing",8,"10cs51",1);
insert into 8M values(3,"This is the third in 8 marks unit 8","nothing",8,"10cs51",1);

--------------------------------------------------------------------------------------------------------------
insert into 7M values(1,"This is the first in 7 marksquestion unit 1","nothing",1,"10cs51",1);
insert into 7M values(2,"This is the second in 7 marks unit 1","nothing",1,"10cs51",1);
insert into 7M values(3,"This is the third in 7 marks unit 1","nothing",1,"10cs51",1);

insert into 7M values(1,"This is the first in 7 marksquestion unit 2","nothing",2,"10cs51",1);
insert into 7M values(2,"This is the second in 7 marks unit 2","nothing",2,"10cs51",1);
insert into 7M values(3,"This is the third in 7 marks unit 2","nothing",2,"10cs51",1);

insert into 7M values(1,"This is the first in 7 marksquestion unit 3","nothing",3,"10cs51",1);
insert into 7M values(2,"This is the second in 7 marks unit 3","nothing",3,"10cs51",1);
insert into 7M values(3,"This is the third in 7 marks unit 3","nothing",3,"10cs51",1);

insert into 7M values(1,"This is the first in 7 marksquestion unit 4","nothing",4,"10cs51",1);
insert into 7M values(2,"This is the second in 7 marks unit 4","nothing",4,"10cs51",1);
insert into 7M values(3,"This is the third in 7 marks unit 4","nothing",4,"10cs51",1);

insert into 7M values(1,"This is the first in 7 marksquestion unit 5","nothing",5,"10cs51",1);
insert into 7M values(2,"This is the second in 7 marks unit 5","nothing",5,"10cs51",1);
insert into 7M values(3,"This is the third in 7 marks unit 5","nothing",5,"10cs51",1);

insert into 7M values(1,"This is the first in 7 marksquestion unit 6","nothing",6,"10cs51",1);
insert into 7M values(2,"This is the second in 7 marks unit 6","nothing",6,"10cs51",1);
insert into 7M values(3,"This is the third in 7 marks unit 6","nothing",6,"10cs51",1);

insert into 7M values(1,"This is the first in 7 marksquestion unit 7","nothing",7,"10cs51",1);
insert into 7M values(2,"This is the second in 7 marks unit 7","nothing",7,"10cs51",1);
insert into 7M values(3,"This is the third in 7 marks unit 7","nothing",7,"10cs51",1);

insert into 7M values(1,"This is the first in 7 marksquestion unit 8","nothing",8,"10cs51",1);
insert into 7M values(2,"This is the second in 7 marks unit 8","nothing",8,"10cs51",1);
insert into 7M values(3,"This is the third in 7 marks unit 8","nothing",8,"10cs51",1);

--------------------------------------------------------------------------------------------------------------
insert into 10M values(1,"This is the first in 10 marksquestion unit 1","nothing",1,"10cs51",1);
insert into 10M values(2,"This is the second in 10 marks unit 1","nothing",1,"10cs51",1);
insert into 10M values(3,"This is the third in 10 marks unit 1","nothing",1,"10cs51",1);

insert into 10M values(1,"This is the first in 10 marksquestion unit 2","nothing",2,"10cs51",1);
insert into 10M values(2,"This is the second in 10 marks unit 2","nothing",2,"10cs51",1);
insert into 10M values(3,"This is the third in 10 marks unit 2","nothing",2,"10cs51",1);

insert into 10M values(1,"This is the first in 10 marksquestion unit 3","nothing",3,"10cs51",1);
insert into 10M values(2,"This is the second in 10 marks unit 3","nothing",3,"10cs51",1);
insert into 10M values(3,"This is the third in 10 marks unit 3","nothing",3,"10cs51",1);

insert into 10M values(1,"This is the first in 10 marksquestion unit 4","nothing",4,"10cs51",1);
insert into 10M values(2,"This is the second in 10 marks unit 4","nothing",4,"10cs51",1);
insert into 10M values(3,"This is the third in 10 marks unit 4","nothing",4,"10cs51",1);

insert into 10M values(1,"This is the first in 10 marksquestion unit 5","nothing",5,"10cs51",1);
insert into 10M values(2,"This is the second in 10 marks unit 5","nothing",5,"10cs51",1);
insert into 10M values(3,"This is the third in 10 marks unit 5","nothing",5,"10cs51",1);

insert into 10M values(1,"This is the first in 10 marksquestion unit 6","nothing",6,"10cs51",1);
insert into 10M values(2,"This is the second in 10 marks unit 6","nothing",6,"10cs51",1);
insert into 10M values(3,"This is the third in 10 marks unit 6","nothing",6,"10cs51",1);

insert into 10M values(1,"This is the first in 10 marksquestion unit 7","nothing",7,"10cs51",1);
insert into 10M values(2,"This is the second in 10 marks unit 7","nothing",7,"10cs51",1);
insert into 10M values(3,"This is the third in 10 marks unit 7","nothing",7,"10cs51",1);

insert into 10M values(1,"This is the first in 10 marksquestion unit 8","nothing",8,"10cs51",1);
insert into 10M values(2,"This is the second in 10 marks unit 8","nothing",8,"10cs51",1);
insert into 10M values(3,"This is the third in 10 marks unit 8","nothing",8,"10cs51",1);

