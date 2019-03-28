DROP TABLE if exists REVISION cascade;
DROP TABLE if exists NETTOYAGE cascade;
DROP TABLE if exists SITUATION cascade;
DROP TABLE if exists VOITURE cascade;
DROP TABLE if exists EMPLACEMENT cascade;
DROP TABLE if exists CATEGORIE;
DROP TABLE if exists CONDUCTEUR;
DROP TABLE if exists LOCATION;
DROP TABLE if exists VILLE;
DROP TABLE if exists MARQUE;
DROP TABLE if exists RESERVATION;




--
-- Structure de la table CATEGORIE
--
CREATE TABLE CATEGORIE (
numCat VARCHAR(5) NOT NULL,
libelle VARCHAR(20) NOT NULL,
classe VARCHAR(30) NOT NULL,
prixKm FLOAT NOT NULL,
CHECK (prixKm>0),
PRIMARY KEY (numCat)
);
--
-- Contenu de la table CATEGORIE
--
insert into CATEGORIE values ('CAT1', 'Minibus','Classe1',1.29);
insert into CATEGORIE values ('CAT2', 'Monospace/SUV','Classe2',0.87);
insert into CATEGORIE values ('CAT3', 'Berline','Classe3',0.76);
insert into CATEGORIE values ('CAT4', 'Citadine','Classe4',0.58);



--
-- Structure de la table EMPLACEMENT
--
CREATE TABLE EMPLACEMENT (
numEmp VARCHAR (5) NOT NULL,
vide BOOLEAN NOT NULL,
PRIMARY KEY (numEmp)
);
--
-- Contenu de la table EMPLACEMENT
--
insert into EMPLACEMENT values ('E01', '0');
insert into EMPLACEMENT values ('E02', '1');
insert into EMPLACEMENT values ('E03', '0');
insert into EMPLACEMENT values ('E04', '0');
insert into EMPLACEMENT values ('E05', '0');
insert into EMPLACEMENT values ('E06', '1');
insert into EMPLACEMENT values ('E07', '0');
insert into EMPLACEMENT values ('E08', '0');
insert into EMPLACEMENT values ('E09', '0');
insert into EMPLACEMENT values ('E10', '0');
insert into EMPLACEMENT values ('E11', '1');
insert into EMPLACEMENT values ('E12', '1');
insert into EMPLACEMENT values ('E13', '1');
insert into EMPLACEMENT values ('E14', '1');



--
-- Structure de la table MARQUE
--
CREATE TABLE MARQUE (
numM VARCHAR NOT NULL,
nomM VARCHAR (30)NOT NULL,
PRIMARY KEY (numM)
);
--
-- Contenu de la table MARQUE
--
insert into MARQUE values ('M1', 'Peugeot');
insert into MARQUE values ('M2', 'Renault');
insert into MARQUE values ('M3', 'Citroen');
insert into MARQUE values ('M4', 'Fiat');
insert into MARQUE values ('M5', 'BMW');



--
-- Structure de la table VOITURE
--
CREATE TABLE VOITURE (
numIm VARCHAR (10) NOT NULL,
nbKm INTEGER NOT NULL,
nbPlaces INTEGER NOT NULL,
numCat VARCHAR constraint numCat references CATEGORIE(numCat) on delete cascade,
numM VARCHAR constraint numM references MARQUE(numM) on delete cascade,
PRIMARY KEY (numIm)
);
--
-- Contenu de la table VOITURE
--
insert into VOITURE values ('AA-316-BN', 14600,4,'CAT1','M1');
insert into VOITURE values ('BV-528-XR', 11000,5,'CAT2','M2');
insert into VOITURE values ('PR-622-VC', 15000,5,'CAT1','M3');
insert into VOITURE values ('OL-824-PC', 3300,7,'CAT3','M5');
insert into VOITURE values ('MK-928-TA', 9800,7,'CAT2','M3');
insert into VOITURE values ('SX-026-PK', 10000,9,'CAT4','M4');
insert into VOITURE values ('UY-864-PL', 15000,9,'CAT3','M1');
insert into VOITURE values ('HV-432-RX', 6400,9,'CAT4','M4');



--
-- Structure de la table SITUATION
--
CREATE TABLE SITUATION (
numIm VARCHAR constraint numIm references VOITURE(numIm) on delete cascade,
numEmp VARCHAR constraint numEmp references EMPLACEMENT(numEmp) on delete cascade,
PRIMARY KEY (numIm,numEmp) );
--
-- Contenu de la table SITUATION
--
insert into SITUATION values ('AA-316-BN','E01');
insert into SITUATION values ('BV-528-XR','E03');
insert into SITUATION values ('PR-622-VC','E04');
insert into SITUATION values ('OL-824-PC','E05');
insert into SITUATION values ('MK-928-TA','E07');
insert into SITUATION values ('SX-026-PK','E09');
insert into SITUATION values ('UY-864-PL','E08');
insert into SITUATION values ('HV-432-RX','E10');



--
-- Structure de la table NETTOYAGE
--
CREATE TABLE NETTOYAGE (
numN VARCHAR NOT NULL,
dateN DATE,
comN VARCHAR (300),
numIm VARCHAR constraint numIm references VOITURE(numIm) on delete cascade,
PRIMARY KEY (numN,numIm)
);
--
-- Contenu de la table NETTOYAGE
--
insert into NETTOYAGE values ('N001',TO_DATE('02/02/2018','DD/MM/YYYY'),NULL,'HV-432-RX');
insert into NETTOYAGE values ('N002',TO_DATE('21/04/2018','DD/MM/YYYY'),NULL,'MK-928-TA');
insert into NETTOYAGE values ('N003',TO_DATE('06/04/2018','DD/MM/YYYY'),NULL,'PR-622-VC');
insert into NETTOYAGE values ('N004',TO_DATE('13/09/2018','DD/MM/YYYY'),NULL,'BV-528-XR');
insert into NETTOYAGE values ('N005',TO_DATE('15/06/2018','DD/MM/YYYY'),NULL,'UY-864-PL');



--
-- Structure de la table REVISION
--
CREATE TABLE REVISION (
numR VARCHAR NOT NULL,
dateR DATE,
comR VARCHAR (300),
numIm VARCHAR constraint numIm references VOITURE(numIm) on delete cascade,
PRIMARY KEY (numR,numIm)
);
--
-- Contenu de la table REVISION
--
insert into REVISION values ('R1',TO_DATE('28/08/2018','DD/MM/YYYY'),NULL,'AA-316-BN');
insert into REVISION values ('R2',TO_DATE('15/06/2018','DD/MM/YYYY'),NULL,'SX-026-PK');
insert into REVISION values ('R3',TO_DATE('03/04/2018','DD/MM/YYYY'),NULL,'UY-864-PL');
insert into REVISION values ('R4',TO_DATE('05/02/2018','DD/MM/YYYY'),NULL,'SX-026-PK');
insert into REVISION values ('R5',TO_DATE('13/09/2018','DD/MM/YYYY'),NULL,'OL-824-PC');



--
-- Structure de la table VILLE
--
CREATE TABLE VILLE (
cp VARCHAR (10) NOT NULL,
commune VARCHAR (50) NOT NULL,
PRIMARY KEY (cp)
);
--
-- Contenu de la table VILLE
--
insert into VILLE values ('33000','Bordeaux');
insert into VILLE values ('31000','Toulouse');
insert into VILLE values ('59000','Lille');
insert into VILLE values ('69000','Lyon');
insert into VILLE values ('13000','Marseille');
insert into VILLE values ('64000','Pau');
insert into VILLE values ('35000','Rennes');



--
-- Structure de la table CONDUCTEUR
--
CREATE TABLE CONDUCTEUR (
numPermis VARCHAR (20) NOT NULL,
nom VARCHAR (50) NOT NULL,
prenom VARCHAR (30) NOT NULL,
dateNais DATE NOT NULL,
adresse VARCHAR (50) NOT NULL,
mail VARCHAR (30) NOT NULL,
portable VARCHAR (12) NOT NULL,
fixe VARCHAR (12),
numId VARCHAR (30) NOT NULL,
cp VARCHAR constraint cp references VILLE(cp) on delete cascade,
PRIMARY KEY (numPermis)
);
--
-- Contenu de la table CONDUCTEUR
--
insert into CONDUCTEUR values ('C1','Robert','Albert',TO_DATE('06/05/1968','DD/MM/YYYY'),'11 rue Fouchet','robert.albert@gmail.com','0612345678',NULL,'01','33000');
insert into CONDUCTEUR values ('C2','Henri','Berry',TO_DATE('13/09/1988','DD/MM/YYYY'),'46 rue Mout','henry.berry@gmail.com','0612345699',NULL,'02','59000');
insert into CONDUCTEUR values ('C3','Carla','Amstrong',TO_DATE('24/12/1978','DD/MM/YYYY'),'37 rue André','carla.amstrong@gmail.com','0600345699',NULL,'03','69000');



--
-- Structure de la table LOCATION
--
CREATE TABLE LOCATION (
dateDebut DATE NOT NULL,
dateretourPrev DATE NOT NULL,
dateretourEff DATE NOT NULL,
nbKmPrev INTEGER NOT NULL,
nbKmEff INTEGER NOT NULL,
acompte FLOAT,
numPermis VARCHAR constraint numPermis references CONDUCTEUR(numPermis) on delete cascade,
numIm VARCHAR constraint numIm references VOITURE(numIm) on delete cascade,
PRIMARY KEY (numPermis,numIm)
);
--
-- Contenu de la table LOCATION
--
insert into LOCATION values (TO_DATE('12/05/2018','DD/MM/YYYY'),TO_DATE('15/09/2018','DD/MM/YYYY'),TO_DATE('15/09/2018','DD/MM/YYYY'),2000,2150,NULL,'C2','AA-316-BN');
insert into LOCATION values (TO_DATE('12/02/2018','DD/MM/YYYY'),TO_DATE('15/03/2018','DD/MM/YYYY'),TO_DATE('15/04/2018','DD/MM/YYYY'),200,200,NULL,'C3','OL-824-PC');
insert into LOCATION values (TO_DATE('01/01/2018','DD/MM/YYYY'),TO_DATE('01/12/2018','DD/MM/YYYY'),TO_DATE('11/12/2018','DD/MM/YYYY'),100000,100300,NULL,'C1','PR-622-VC');



--
-- Structure de la table RESERVATION
--
CREATE TABLE RESERVATION (
dateDebut DATE NOT NULL,
dateretourPrev DATE NOT NULL,
nbKmPrev INTEGER NOT NULL,
acompte FLOAT,
numPermis VARCHAR constraint numPermis references CONDUCTEUR(numPermis) on delete cascade,
numCat VARCHAR constraint numCat references CATEGORIE(numCat) on delete cascade,
CHECK (nbKmPrev>0),
PRIMARY KEY (numPermis,numCat)
);
--
-- Contenu de la table RESERVATION
--
insert into RESERVATION values (TO_DATE('12/05/2019','DD/MM/YYYY'),TO_DATE('15/09/2019','DD/MM/YYYY'),2000,NULL,'C2','CAT1');
insert into RESERVATION values (TO_DATE('12/05/2020','DD/MM/YYYY'),TO_DATE('15/09/2020','DD/MM/YYYY'),2000,NULL,'C1','CAT1');
