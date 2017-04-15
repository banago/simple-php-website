CONNECT MAB_TRACK;


CREATE TABLE aca_mab_customer (
  Aca_ID INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  ACA_Name CHAR(50) NOT NULL,
  ACA_Bname CHAR(50) NOT NULL
);
CREATE TABLE aca_mab_user (
  User_ID INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  Aca_ID INT UNSIGNED NOT NULL,
  FOREIGN KEY (Aca_ID) REFERENCES aca_mab_customer (Aca_ID),
  C_Fname CHAR(50) NOT NULL,
  C_Lname CHAR(50) NOT NULL
);
CREATE TABLE aca_mab (
  Mac_ID BIGINT UNSIGNED NOT NULL PRIMARY KEY,
  Aca_ID INT UNSIGNED NOT NULL,
  FOREIGN KEY (Aca_ID) REFERENCES aca_mab_customer (Aca_ID)
);
CREATE TABLE aca_mab_admin (
  Admin_ID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  Aca_ID INT UNSIGNED NOT NULL,                            
  FOREIGN KEY (Aca_ID) REFERENCES aca_mab_customer (Aca_ID),                            
  A_Fname CHAR(50) NOT NULL,
  A_Lname CHAR(50) NOT NULL
);
CREATE TABLE aca_mab_metadata (
  Mac_ID BIGINT UNSIGNED NOT NULL,
  PRIMARY KEY (Mac_ID),
  FOREIGN KEY (Mac_ID) REFERENCES aca_mab (Mac_ID),
  First_Seen DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  Status CHAR NOT NULL,
  Count INT UNSIGNED NOT NULL,
  CHECK (Status ="Active"  ||  Status ="Passive")
);
CREATE TABLE aca_mab_datestamp (
  Mac_ID BIGINT UNSIGNED NOT NULL,
  Last_Seen DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP, 
  PRIMARY KEY (Mac_ID),
  FOREIGN KEY (Mac_ID) REFERENCES aca_mab (Mac_ID)  
);
CREATE TABLE aca_mab_note (
  Note_ID INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  Mac_ID BIGINT UNSIGNED NOT NULL,
  Note VARCHAR (1000) NOT NULL,
  FOREIGN KEY (Mac_ID) REFERENCES aca_mab (Mac_ID)
);
