drop table membership;
drop table transaction_purchase;
drop table account;
drop table event_booking;
drop table facilities_contains;
drop table recreation_center;

/*
COMMENTS: 1. We need to add null or not null to all variables [x]
2. We need to look at whether tables need to delete on cascade etc. [x]
3. insert into
*/


create table recreation_center
(rc_name varchar(20) not null, /*got rid of unique as it is a primary key (already assumes unique)*/
rc_address varchar(100) unique not null,
primary key (rc_name));

grant select on recreation_center to public;

create table facilities_contains
(fc_room_id integer not null,
fc_capacity integer null,
rc_name varchar(20) not null,
primary key (fc_room_id),
foreign key (rc_name) references recreation_center ON DELETE CASCADE);

grant select on facilities_contains to public;

create table event_booking
(eb_id char(10) not null,
eb_name varchar(20) not null,
eb_type varchar(100) not null,
eb_cost integer not null,
eb_time_in integer not null, /*cannot be datetime as it is not a datatype in oracle */
eb_time_out integer not null, /*cannot be .. ^ */
fc_room_id integer not null,
primary key (eb_id, eb_time_in, eb_time_out, fc_room_id),
foreign key (fc_room_id) references facilities_contains ON DELETE CASCADE);

grant select on event_booking to public;

create table account
(account_id integer not null,
ac_name char(20) not null,
ac_address char(100) null,
ac_phone_number integer not null,
primary key (account_id));

grant select on account to public;


create table transaction_purchase
(tp_transaction_id integer not null,
tp_card_number integer not null,
tp_amount integer not null,
tp_date date not null,
account_id integer not null,
eb_id char(10) not null,
primary key (tp_transaction_id),
foreign key (account_id) references account ON DELETE CASCADE,
foreign key (eb_id) references event_booking ON DELETE CASCADE);

grant select on transaction_purchase to public;


create table membership
(membership_id integer not null,
status number(1) not null, /*status changed to number(1) where 0 is inactive and 1 is active */
account_id integer not null,
primary key (membership_id, account_id),
foreign key (account_id) references account ON DELETE CASCADE);

grant select on membership to public;

insert into recreation_centre (name, address)
values (‘west point grey recreation’, ‘ 3123 west broadway ’);

insert into recreation_centre (name, address)
values (‘kitsilano recreation’, ‘ 2112 union blvd ’);

insert into recreation_centre (name, address)
values (‘kerrisdale recreation’, ‘ 342 west blvd ’);

insert into recreation_centre (name, address)
values (‘douglas park recreation’, ‘ 34234 maple st ’);

insert into recreation_centre (name, address)
values (‘Marpole Recreation’, ‘ 2421 Oak St ’);


insert into event_booking(event_id,name,event_type,cost,time_in,time_out,room_id)
values(‘12345’, ‘swimming drop in’, ‘aquatics’, ‘2’, ‘2018-02-10 12:00:00’, ‘2018-02-10 15:00:00’, ‘214’ );

insert into event_booking(event_id,name,event_type,cost,time_in,time_out,room_id)
values(‘12352’, ‘swim class level 1’, ‘aquatics’, ‘12’, ‘2018-02- 12 13:00:00’, ‘2018-02- 12 14:00:00’, ‘153’ );

insert into event_booking(event_id,name,event_type,cost,time_in,time_out,room_id)
values(‘76435’, ‘hip hop’, ‘dance’, ‘12’, ‘2018-02-14 11:00:00’, ‘2018-02-14 12:00:00’, ‘315’);

insert into event_booking(event_id,name,event_type,cost,time_in,time_out,room_id)
values(‘23462’, ‘boxing’, ‘martial arts’, ‘11’,’2018-02-21 13:00:00’, ‘2018-02-21 14:00:00’, ‘521’);

insert into event_booking(event_id,name,event_type,cost,time_in,time_out,room_id)
values(‘63451’, ‘barre fitness’, ‘fitness’, ‘12’, ‘2018-02-24 12:00:00’, ‘2018-02-24 13:00:00’, ‘531’);


insert into facitlities_contains(room_id, capacity, rec_name)
values(‘214’, ‘40’, ‘west point grey recreation’);

insert into facitlities_contains(room_id, capacity, rec_name)
values(‘153’, ‘50’, ‘kitsilano recreation’);

insert into facitlities_contains(room_id, capacity, rec_name)
values(‘315’, ‘40’, ‘kerrisdale recreation’);

insert into facitlities_contains(room_id, capacity, rec_name)
values(‘521’, ‘60’, ‘west point grey recreation’);

insert into facitlities_contains(room_id, capacity, rec_name)
values(‘531’, ‘120’, ‘kitsilano recreation’);


insert into transaction_purchase(transaction_id, card_number, amount, date, account_id, event_id)
values( ‘235’, ‘8364 2934 2394 3909’, ‘2’, ‘2018-02-10 11:32:14’, ‘3231’, ‘12345’);

insert into transaction_purchase(transaction_id, card_number, amount, date, account_id, event_id)
values(‘643’, ‘2398 0109 1209 3940’, ‘12’, ‘2018-02-12 12:23:14’, ‘7345’, ‘12352’);

insert into transaction_purchase(transaction_id, card_number, amount, date, account_id, event_id)
values(‘963’, ‘3904 0981 2304 3481’, ‘12’, ‘2018-02-14 10:13:12’, ‘2385’, ‘76435’);

insert into transaction_purchase(transaction_id, card_number, amount, date, account_id, event_id)
values(‘345’, ‘5623 6345 2345 3451’, ‘11’, ‘2018-02-21 12:15:46’, ‘7451’, ‘23462’);

insert into transaction_purchase(transaction_id, card_number, amount, date, account_id, event_id)
values(‘864’, ‘3514 2445 2351 9094’, ‘12’, ‘2018-02-24 11:23:25’, ‘8234’, ‘63451’);


insert into account (account_id, name, address, phone_number)
values(‘3231’, ‘gloria chan’, ‘129 granville st’, ‘604 347 3247’);

insert into account (account_id, name, address, phone_number)
values(‘7345’, ‘steve brown’, ‘3571 4th ave’, ‘604 123 0792’);

insert into account (account_id, name, address, phone_number)
values(‘2385’, ‘chris evans’, ‘391 hollywood ave’, ‘604 348 1237’);

insert into account (account_id, name, address, phone_number)
values(‘7451’, ‘cole sprouse’, ‘3947 disney st’, ‘604 384 2870’);

insert into account (account_id, name, address, phone_number)
values(‘8234’, ‘zac efron’, ‘247 high st’, ‘604 108 2384’);


insert into membership (membership_id, status, account_id)
values( ‘0012’, ‘1’, ‘3231’);

insert into membership (membership_id, status, account_id)
values( ‘0013’, ‘0’, ‘7345’);

insert into membership (membership_id, status, account_id)
values( ‘0014’, ‘1’, ‘2385’);

insert into membership (membership_id, status, account_id)
values( ‘0015’, ‘1’, ‘7451’);

insert into membership (membership_id, status, account_id)
values( ‘0016’, ‘1’, ‘8234’);


