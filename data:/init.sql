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
