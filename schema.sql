create database cheapoMail;
use cheapoMail;
create table usrs(
	userid int auto_increment not null,
	userfname varchar(20),
	userlname varchar(20),
	username varchar(50),
	userpassword varchar(50),
	primary key(userid) 
);
create table messages(
	msgid int auto_increment not null,
	recipient_ids varchar(20),
	sender_id varchar(20),
	subject varchar(50),
	body varchar(50),
    date_sent date,
	primary key(msgid) 
);
create table messages_read(
	msg_rid int auto_increment not null,
	msgid int not null,
    reader_id int,
    date_read date,
	primary key(msg_rid) 
);

insert into usrs (username,userpassword) values ('admin','password123');