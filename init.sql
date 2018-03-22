drop table trans_purchase;
drop table event_booking;
drop table facilities_contains;
drop table membership;
drop table account;
drop table recreation_center;


/*
COMMENTS 1. We need to add null or not null to all variables [x]
2. We need to look at whether tables need to delete on cascade etc. [x]
3. insert into
*/


create table recreation_center
(rc_name varchar(50) not null, /*got rid of unique as it is a primary key (already assumes unique)*/
rc_address varchar(100) unique not null,
primary key (rc_name));

grant select on recreation_center to public;

create table facilities_contains
(fc_room_id integer not null,
fc_capacity integer null,
rc_name varchar(40) not null,
primary key (fc_room_id),
foreign key (rc_name) references recreation_center ON DELETE CASCADE);

grant select on facilities_contains to public;

create table event_booking
(eb_id char(10) not null,
eb_name varchar(30) not null,
eb_type varchar(100) not null,
eb_cost integer not null,
eb_date integer not null,        /* added to provide date*/
eb_time_in integer not null, /*cannot be datetime as it is not a datatype in oracle */
eb_time_out integer not null, /*cannot be .. ^ */
fc_room_id integer not null,
primary key (eb_id, eb_time_in, eb_time_out, fc_room_id),
foreign key (fc_room_id) references facilities_contains ON DELETE CASCADE);

grant select on event_booking to public;

create table account
(account_id integer not null,
ac_name char(30) not null,
ac_address char(100) null,
ac_phone_number integer not null,
primary key (account_id));

grant select on account to public;


create table trans_purchase
(tp_transaction_id integer not null,
tp_card_number integer not null,
tp_amount integer not null,
tp_date integer not null,
account_id integer not null,
eb_id char(10) not null,
eb_time_in integer not null, /*cannot be datetime as it is not a datatype in oracle */
eb_time_out integer not null, /*cannot be .. ^ */
fc_room_id integer not null,
primary key (tp_transaction_id),
foreign key (account_id) references account ON DELETE CASCADE,
foreign key (eb_id,eb_time_in,eb_time_out,fc_room_id) references event_booking ON DELETE CASCADE);

grant select on trans_purchase to public;


create table membership
(membership_id integer not null,
status number(1) not null, /*status changed to number(1) where 0 is inactive and 1 is active */
account_id integer not null,
primary key (membership_id, account_id),
foreign key (account_id) references account ON DELETE CASCADE);

grant select on membership to public;

insert into recreation_center 
values ('west point grey recreation', ' 3123 west broadway ');

insert into recreation_center
values ('kitsilano recreation', ' 2112 union blvd ');

insert into recreation_center
values ('kerrisdale recreation', ' 342 west blvd ');

insert into recreation_center 
values ('douglas park recreation', ' 34234 maple st ');

insert into recreation_center
values ('Marpole Recreation', ' 2421 Oak St ');


insert into facilities_contains
values('214', '40', 'west point grey recreation');

insert into facilities_contains
values('153', '50', 'kitsilano recreation');

insert into facilities_contains
values('315', '40', 'kerrisdale recreation');

insert into facilities_contains
values('521', '60', 'west point grey recreation');

insert into facilities_contains
values('531', '120', 'kitsilano recreation');


insert into event_booking
values('12345', 'swimming dropin', 'aquatics', '2', '20180210', '120000', '150000', '214' );

insert into event_booking
values('12352', 'swim class level 1', 'aquatics', '12', '20180212', '130000', '140000', '153' );

insert into event_booking
values('76435', 'hip hop', 'dance', '12', '20180214', '110000', '120000', '315');

insert into event_booking
values('23462', 'boxing', 'martial arts', '11','20180221','130000', '140000', '521');

insert into event_booking
values('63451', 'barre fitness', 'fitness', '12', '20180224', '120000', '130000', '531');




insert into account 
values('3231', 'gloria chan', '129 granville st', '6043473247');

insert into account 
values('7345', 'steve brown', '3571 4th ave', '6041230792');

insert into account
values('2385', 'chris evans', '391 hollywood ave', '6043481237');

insert into account
values('7451', 'cole sprouse', '3947 disney st', '6043842870');

insert into account 
values('8234', 'zac efron', '247 high st', '6041082384');


insert into membership 
values( '0012', '1', '3231');

insert into membership 
values( '0013', '0', '7345');

insert into membership 
values( '0014', '1', '2385');

insert into membership 
values( '0015', '1', '7451');

insert into membership 
values( '0016', '1', '8234');




insert into trans_purchase
values( '235', '8364293423943909', '2', '20180210113214', '3231', '12345','120000', '150000', '214');

insert into trans_purchase
values('643', '2398010912093940', '12', '20180212122314', '7345', '12352','130000', '140000', '153');

insert into trans_purchase
values('963', '3904098123043481', '12', '20180214101312', '2385', '76435','110000', '120000', '315');

insert into trans_purchase
values('345', '5623634523453451', '11', '20180221121546', '7451', '23462', '130000', '140000', '521');

insert into trans_purchase
values('864', '3514244523519094', '12', '20180224112325', '8234', '63451','120000', '130000', '531');