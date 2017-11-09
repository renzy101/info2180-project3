create database cheapoMail;
use cheapoMail;
create table usrs(
	userid int auto_increment not null,
	userfname varchar(20),
	userlname varchar(20),
	username varchar(50),
	userpassword varchar(100),
	primary key(userid) 
);
create table messages(
	msgid int auto_increment not null,
	recipient_ids varchar(20),
	sender_id varchar(20),
	subject varchar(50),
	body varchar(50),
    date_sent datetime,
	primary key(msgid) 
);
create table messages_read(
	msg_rid int auto_increment not null,
	msgid int not null,
    reader_id int,
    date_read datetime,
	primary key(msg_rid) 
);
create trigger datetime_on_message_sent before insert on messages for each row set new.date_sent = (UTC_TIMESTAMP());
create trigger datetime_on_messages_read before insert on messages_read for each row set new.date_read = (UTC_TIMESTAMP());

insert into usrs (username,userpassword) values ('admin','$2y$10$QnnoiPlmVddeHvnurqFz7.AHERNp7SpE6FvidskykWmBrYYtBSZe.');