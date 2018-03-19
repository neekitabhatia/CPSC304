create database main;

use main;

create table recreation_center {
name char[20] primary key,
address char[100] unique,
}

create table event_booking{
event_id char[10]
name char[20],
event_type char[100],
cost integer,
time_in datetime,
time_out datetime,
room_id integer not null,
primary key: (event_id, time_in, time_out, room_id)
foreign key: room_id references facilities
}

create table facilities_contains{
room_id integer,
capacity integer,
rec_center_name char[20] not null,
primary key: room_id,
foreign key: rec_center_name references recreation_center
}

create table transaction_purchase{
transaction_id integer,
card_number integer not null,
amount integer,
date datetime,
account_id integer not null,
event_id char[10] not null,
primary key: transaction_id,
foreign key: account_id references account, event_id references event_booking
}

create table account{
account_id integer,
name char[20],
address char[100],
phone_number integer,
primary key: account_id
}

create table membership{
membership_id integer,
status char[20],
account_id integer not null
primary key: (membership_id, account_id),
foreign key: account_id references account
}
