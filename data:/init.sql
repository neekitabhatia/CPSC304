create database main;

use main;
/*
COMMENTS: 1. We need to add null or not null to all variables
2. We need to look at whether tables need to delete on cascade etc.
3. insert into
*/


create table recreation_center
(name varchar(20) unique not null,
address varchar(100) unique not null,
primary key (name));

grant select on recreation_center to public;

create table event_booking
(event_id char(10) not null,
name varchar(20) not null,
event_type varchar(100) not null,
cost integer not null,
time_in datetime not null,
time_out datetime not null,
room_id integer not null,
primary key (event_id, time_in, time_out, room_id),
foreign key (room_id) references facilities ON DELETE CASCADE);

grant select on event_booking to public;

create table facilities_contains
(room_id integer not null,
capacity integer null,
rec_center_name varchar(20) not null,
primary key (room_id),
foreign key (rec_center_name) references recreation_center ON DELETE CASCADE);

grant select on facilities_contains to public;

create table transaction_purchase
(transaction_id integer not null,
card_number integer not null,
amount integer not null,
date datetime not null,
account_id integer not null,
event_id char(10) not null,
primary key (transaction_id),
foreign key (account_id) references account ON DELETE CASCADE,
foreign key event_id references event_booking ON DELETE CASCADE);

grant select on transaction_purchase to public;

create table account
(account_id integer not null,
name char(20) not null,
address char(100) null,
phone_number integer not null,
primary key (account_id));

grant select on account to public;

create table membership
(membership_id integer not null,
status boolean not null, /*status changed to boolean as it shouldnt be a 20 char: either active or inactive */
account_id integer not null
primary key (membership_id, account_id),
foreign key (account_id) references account ON DELETE CASCADE);

grant select on membership to public;
