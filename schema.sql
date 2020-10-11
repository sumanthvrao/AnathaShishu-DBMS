-- \i 'C:/Users/suraj/Desktop/orphanage_project/code.sql'
drop database anathashishu;
create database anathashishu;
\c anathashishu;
drop table Child;

SELECT * FROM Child;
CREATE TABLE Child(id varchar(5) PRIMARY KEY , name varchar(30), gender varchar(6) , dob date, aadhar_id varchar(12) UNIQUE, date_of_joining date);

insert into Child values('AB001','abhay','male','04-02-2004','222238741123','10-10-2010');
insert into Child values('AB002','suraj','male','05-04-2005','243200872333','02-09-2012');
insert into Child values('AB003','raj','male','01-04-2003','481223452266','01-02-2015');
insert into Child values('AB004','raj','male','01-04-2003','481223452269','01-02-2015');
insert into Child values('AB005','sneha','female','02-06-2002','828349912222','03-1-2007');
insert into Child values('AB006','megha','female','06-05-2005','345812342332','08-10-2016');
insert into Child values('AB007','pratiksha','female','03-2-2004','654899992322','02-12-2012');
insert into Child values('AB008','gautam','male','02-1-2005','076883452537','07-02-2010');
insert into Child values('AB009','akash','male','06-10-2003','857313697524','04-12-2008');
insert into Child values('AB010','guru','male','05-1-2002','760882543543','04-2-2007');


-- SELECT * FROM Child;

-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
drop table Child_Background_Details;
CREATE TABLE Child_Background_Details(b_id varchar(5) PRIMARY KEY, phno varchar(12) , email_id varchar(30), type varchar(1), address varchar(40), FOREIGN KEY (b_id) REFERENCES Child ON DELETE CASCADE ON UPDATE CASCADE);

insert into Child_Background_Details values('AB001','8727737474','abcd@gmail.com','S','mulhotti,darwad,karnataka');
insert into Child_Background_Details values('AB002','8727737475','abc@gmail.com','S','Jayanagar,bangalore,karnataka');
insert into Child_Background_Details values('AB003','8727737476','defg@gmail.com','D','mulhotti,darwad,karnataka');-- insert into Child_Background_Details values('AB004','8727737477','abcd@gmail.com','S','mulhotti,darwad,karnataka');
insert into Child_Background_Details values('AB005','8727737478','abd@gmail.com','S','kanakadasa badavane,bijapur,karnataka');
insert into Child_Background_Details values('AB006','8727737479','abd@gmail.com','D','kuvempu nagar,sirsi,karnataka');
insert into Child_Background_Details values('AB007','8727737470','myz@gmail.com','S','malle,yercaud,karnataka');
insert into Child_Background_Details values('AB008','87277374741','abczd@gmail.com','D','mulhotti,darwad,karnataka');
-----------------------------------------------------------------------------------------------------------------------------------------------
drop table Adoption;
CREATE TABLE Adoption(orphan_id varchar(5) PRIMARY KEY, new_guardian varchar(20), email_id varchar(30), address varchar(40),  phno varchar(12), date_of_adoption date, FOREIGN KEY (orphan_id) REFERENCES Child);


Insert into Adoption values('AB001','rahika','xxyx@gmail.com','basavanagudi','9932332234','2-05-2008');
Insert into Adoption values('AB002','sharath','mmni@gmail.com','#21,jayanagar','8821272334','2-03-2012');
Insert into Adoption values('AB003','raghu','rrm@gmail.com','#21,hiteshnagar','8776722363','2-05-2013');
Insert into Adoption values('AB004','raghu','rrm@gmail.com','#21,hiteshnagar','8776722363','2-05-2016');


SELECT * from Adoption;


-----------------------------------------------------------------------------------------------------------------------------------------
drop table Adoption_Document_Details;
CREATE TABLE Adoption_Document_Details(child_id varchar(5) PRIMARY KEY,aadhar_id varchar(12) UNIQUE,pan_no varchar(10), income_proof varchar(3), photo_obtained varchar(3), witness varchar(3), FOREIGN KEY (child_id) REFERENCES Child);

Insert into Adoption_Document_Details values('AB001','888822223333','CGGPA12345','yes','yes','no');
Insert into Adoption_Document_Details values('AB002','223811221111','MGPPA76765','yes','yes','yes');

SELECT * from Adoption_Document_Details;

-----------------------------------------------------------------------------------------------------------
drop table Transaction;

CREATE TABLE Transaction(receipt_no varchar(14) PRIMARY KEY,  phno varchar(12) NOT NULL, name varchar(20),email_id varchar(30),dateis date);

Insert into Transaction values('2017-18/007493','9876543213','jaganath','jagath@gmail.com','05-01-2016');
Insert into Transaction values('2017-18/002212','9997543542','abcdf','addd@gmail.com','02-10-2010');
Insert into Transaction values('2017-18/002324','7687543542','abcdf','siid@gmail.com','12-01-2016');
Insert into Transaction values('2017-18/007491','7643542','manojrath','abcd@gmail.com','05-12-2016');
Insert into Transaction values('2017-18/007543','9876543213','jaganath','jagath@gmail.com','05-09-2016');
Insert into Transaction values('2017-18/007545','9876543213','jaganath','jagath@gmail.com','05-08-2016');

SELECT * from Transaction;

---------------------------------------------------------------------------------------------------------------------------------
CREATE TABLE Donation_Kind(receipt_no varchar(14), item varchar(15), quantity int, PRIMARY KEY (receipt_no, item), FOREIGN KEY (receipt_no) REFERENCES Transaction);

Insert into Donation_kind values('2017-18/007493','biscuits',2);
Insert into Donation_kind values('2017-18/007543','daal',1);
Insert into Donation_kind values('2017-18/007545','rice',1);


SELECT * from Donation_kind;

------------------------------------------------------------------------------------------------------------
drop table Stock;
CREATE TABLE Stock(item varchar(15) PRIMARY KEY, item_value int, quantity int);

Insert into Stock values('rice','60','2');
Insert into Stock values('biscuits','100','2');
Insert into Stock values('salt','35','5');
Insert into Stock values('dried chilli','250','1');
Insert into Stock values('rave','30','1');
Insert into Stock values('jaggery','60','5');
Insert into Stock values('avalakki','50','4');
Insert into Stock values('daal','90','2');


SELECT * from Stock;

--------------------------------------------------------------------------------------

drop table Organization;
CREATE TABLE Organization(name varchar(20), item varchar(15), date date, quantity int, PRIMARY KEY(name, item, date), FOREIGN KEY (item) REFERENCES Stock);

Insert into organization values('anantha shayana','rave','03-9-2018',1.0);
Insert into organization values('aroghya dhama','jaggery','01-04-2018',1.5);
Insert into organization values('abalashrama','jaggery','01-04-2018',3.5);
Insert into organization values('mobility india','rice','02-04-2018',0.5);
Insert into organization values('donate to charity','biscuits','04-04-2018',0.5);
Insert into organization values('shishu vihara','rice','05-04-2018',1.0);

SELECT * from Organization;

-----------------------------------------------------------------------------------------

drop table Fund;
CREATE TABLE Fund(sub_division varchar(20) PRIMARY KEY, fund_money int);
insert into Fund values('general',1000);
insert into Fund values('education',0);
insert into Fund values('health',0);
insert into Fund values('food',0);
insert into Fund values('clothes',0);

SELECT * from Fund;

--------------------------------------------------------------------------------------------
drop table Donation_Money;

CREATE TABLE Donation_Money(receipt_id varchar(14) PRIMARY KEY, donation_cause varchar(20), amount 	bigint, occasion varchar(30), occasion_date date, FOREIGN KEY (receipt_id) REFERENCES Transaction ,FOREIGN KEY (donation_cause) REFERENCES Fund );
insert into Donation_Money values('2017-18/007543','general',1000,'birhtday','7-12-2016');
insert into Donation_Money values('2017-18/002212','education',1500,'Krishna Janmashtmi','7-12-2017');
insert into Donation_Money values('2017-18/002324','health',20000,'Marriage Anniversary','7-12-2018');


SELECT * from Donation_Money;

-- -------------------------------------------------------------------------------------------------------------------


-- SELECT * FROM Child,Child_Background_Details WHERE id=b_id and id='AB001';

-- SELECT * FROM Child,Adoption WHERE orphan_id=id and phno=1234567890;

-- SELECT t.receipt_no,t.name,t.ph_no,t.email_id,d.donation_cause,d.amount FROM Transaction as t,DonationMoney as d WHERE t.date='12-01-2018' and t.receipt_no=d.receipt_id;

-- SELECT t.receipt_no,t.name,t.ph_no,t.email_id,d.item,d.quantity FROM Transaction as t,DonationKind as d WHERE t.date='12-01-2018' and t.receipt_no=d.receipt_no;

-- SELECT t.name,t.ph_no,t.email_id,d.amount,d.donation_cause FROM Transaction as t , DonationMoney as d WHERE d.occasion_date='16-12-1998' and t.receipt_no=d.receipt_id;

-- SELECT * from Stock where item='Rice';

-- SELECT * FROM Organisation WHERE date in between '01-12-2012' and '31-12,2012';

-- SELECT * FROM Fund where sub_division='education';

-- SELECT * FROM AdoptionDocumentDetails as a , Child as c WHERE c.id=a.child_id and c.name="pratiksha";

-- UPDATE stock SET quantity=quantity+ X where item=Y;
















