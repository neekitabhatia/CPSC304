CREATE DATABASE main;

use main;

CREATE TABLE RECREATION_CENTER{
NAME CHAR[20],
ADDRESS CHAR[100] UNIQUE,
PRIMARY KEY: NAME
}

CREATE TABLE EVENT_BOOKING{
EVENT_ID CHAR[10]
NAME CHAR[20],
EVENT_TYPE CHAR[100],
COST INTEGER,
TIME_IN DATETIME,
TIME_OUT DATETIME,
ROOM_ID INTEGER NOT NULL,
PRIMARY KEY: (EVENT_ID, TIME_IN, TIME_OUT, ROOM_ID)
FOREIGN KEY: ROOM_ID REFERENCES FACILITIES
}

CREATE TABLE FACILITIES_CONTAINS{
ROOM_ID INTEGER,
CAPACITY INTEGER,
REC_CENTER_NAME CHAR[20] NOT NULL,
PRIMARY KEY: ROOM_ID,
FOREIGN KEY: REC_CENTER_NAME REFERENCES RECREATION_CENTER
}

CREATE TABLE TRANSACTION_PURCHASE{
TRANSACTION_ID INTEGER,
CARD_NUMBER INTEGER NOT NULL,
AMOUNT INTEGER,
DATE DATETIME,
ACCOUNT_ID INTEGER NOT NULL,
EVENT_ID CHAR[10] NOT NULL,
PRIMARY KEY: TRANSACTION_ID,
FOREIGN KEY: ACCOUNT_ID REFERENCES ACCOUNT, EVENT_ID REFERENCES EVENT_BOOKING
}

CREATE TABLE ACCOUNT{
ACCOUNT_ID INTEGER,
NAME CHAR[20],
ADDRESS CHAR[100],
PHONE_NUMBER INTEGER,
PRIMARY KEY: ACCOUNT_ID
}

CREATE TABLE MEMBERSHIP{
MEMBERSHIP_ID INTEGER,
STATUS CHAR[20],
ACCOUNT_ID INTEGER NOT NULL
PRIMARY KEY: (MEMBERSHIP_ID, ACCOUNT_ID),
FOREIGN KEY: ACCOUNT_ID REFERENCES ACCOUNT
}