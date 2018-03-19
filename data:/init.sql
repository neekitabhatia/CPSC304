create database main;

use main;
/*
COMMENTS: 1. We need to add null or not null to all variables
2. We need to look at whether tables need to delete on cascade etc.
3. insert into
*/


create table recreation_center
(name varchar(20),
address varchar(100) unique,
primary key (name));

grant select on recreation_center to public;

create table event_booking
(event_id char(10)
name varchar(20),
event_type varchar(100),
cost integer,
time_in datetime,
time_out datetime,
room_id integer not null,
primary key (event_id, time_in, time_out, room_id),
foreign key (room_id) references facilities);

grant select on event_booking to public;

create table facilities_contains
(room_id integer,
capacity integer,
rec_center_name varchar(20) not null,
primary key (room_id),
foreign key (rec_center_name) references recreation_center);

grant select on facilities_contains to public;

create table transaction_purchase
(transaction_id integer,
card_number integer not null,
amount integer,
date datetime,
account_id integer not null,
event_id char(10) not null,
primary key (transaction_id),
foreign key (account_id) references account, event_id references event_booking);

grant select on transaction_purchase to public;

create table account
(account_id integer,
name varchar(20),
address varchar(100),
phone_number integer,
primary key (account_id));

grant select on account to public;

create table membership
(membership_id integer,
status varchar(20),
account_id integer not null
primary key (membership_id, account_id),
foreign key (account_id) references account);

grant select on membership to public;
