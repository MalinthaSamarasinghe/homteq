-- SQL Script to create and populate tables

-- Drop the tables in case they already exist
DROP TABLE IF EXISTS w1832133_0;

-- Create the w1832133_0 table
CREATE DATABASE IF NOT EXISTS w1832133_0;

-- Create the Product table
CREATE TABLE IF NOT EXISTS Product 
(
  prodId 			INT(4) 			NOT NULL AUTO_INCREMENT,
  prodName 			VARCHAR(30) 	NOT NULL,
  prodPicNameSmall 	VARCHAR(100) 	NOT NULL,
  prodPicNameLarge 	VARCHAR(100) 	NOT NULL,
  prodDescripShort 	VARCHAR(1000) 	NULL,
  prodDescripLong 	VARCHAR(3000) 	NULL,
  prodPrice 		DECIMAL(6, 2) 	NOT NULL,
  prodQuantity 		INT(4) 			NOT NULL,
  CONSTRAINT proid_product_pk PRIMARY KEY (prodId),
  CONSTRAINT prodname_product_unique UNIQUE (prodName)
);


-- Populate the w1832133_Studio table
INSERT INTO 
Product (prodId, prodName, prodPicNameSmall, prodPicNameLarge, prodDescripShort, prodDescripLong, prodPrice, prodQuantity)
VALUES
  (
    1
	'ASUS ROG SCAR 15 RYZEN 9 + RTX',
    'ASUS_01.JPG',
    'ASUS_01.1.JPG',
    'Compete at the highest level of Windows 10 Pro gaming with the ROG Strix SCAR 15. Take on any challenge with the powerful AMD Ryzen™ 9 5900HX CPU and GeForce RTX™ 3080 GPU. Go all-in on esports speed with an ultrafast panel 165hz. Input every strike with precision on a responsive optical-mechanical keyboard. With a competitive edge this sharp, you can dominate any arena.',
    'ROG SCAR 15 RYZEN 9 + RTX 3080 AMD Ryzen™ 9 5900HX (8 Core 16 Treads, up to 4.6 GHz) DDR4 3200MHz 32GB 1TB M.2 NVME SSD WQHD (2560 x 1440) 2K DCI-P3:100.00% 165Hz NVIDIA® GeForce RTX 3080 16GB GDDR6 Optical Mech Keyboard Per-Key RGB 2.5 kg, 90WHrs FREE ROG Backpack, ROG Impact Gaming Mouse 2 Years warranty Genuine Windows 10 Home 64Bit Pre-installed FREE 1080P@60FPS external camera',
    '8350.00',
    5
  ),
  (
	2
    'ROG Zephyrus Duo 15 SE GX551QM',
    'ROG_02.JPG',
    'ROG_02.1.JPG',
    'TWO SCREENS. ZERO LIMITS. With its innovative ROG ScreenPad Plus secondary display, the Zephyrus Duo 15 SE takes Windows 10 gaming to new dimensions. Cutting-edge cooling empowers the latest AMD Ryzen™ 9 5900HX  CPU and NVIDIA® GeForce RTX 3080 16GB GDDR6 GPU. An ultrafast 300Hz/3ms gaming panel lets you tailor your system for pro-level esports or content creation. Elevate your entire experience with premium audio delivered by quad speakers and immersive Dolby Atmos surround sound.',
    'ROG Zephyrus Duo 15 SE GX551QM Ryzen 7 RTX 3060 AMD Ryzen™ 7 5800H (20M Cache, up to 4.40Ghz) 32GB DDR4 3200MHZ 1000GB NVME M.2 SSD 300Hz 3ms 15.6” FHD IPS-Type PANTONE Validated Display 100% SRGB NVIDIA® GeForce RTX 3060 6GB GDDR6 14.1" 3840x1100 32:9 Touch Screen 2.50 kg, 90WHrs Plamrest, Per key RGB Keyboard 2 Years warranty Genuine Windows 10 Home 64Bit Pre-installed FREE ROG ranger backpack,1080P@60FPS external camera, ROG CHAKRAM CORE Mouse',
    '6750.00',
    3
  ),
  (
	3
    'MSI Delta 15 AMD Advantage',
    'MSI_03.JPG',
    'MSI_03.1.JPG',
    'Unexpected, unseen before; an ultra-thin, lightweight one with high performance. Delta 15, AMD Advantage™ Edition is equipped with the latest AMD Ryzen™ 9 5800H Mobile Processors and AMD Radeon™ RX 6700M Mobile Graphics, with 1.9kg, 19mm, amazingly thin and lightweight. Support SmartShift, Smart Access Memory and Wi-Fi 6E, Delta 15 contains all the advantages and powerful performance in premium design. Delta 15 will lead changes, breaking through the framework and setting off a new transformation in the game world.',
    'MSI Delta 15 AMD Advantage Edition A5EFK Ryzen 7 AMD RYZEN 7 5800H (16M Cache, up to 4.40 GHz, 8 Cores 16 Threads) 16GB DDR4 3200MHZ 512GB M.2 NVME SSD 15.6" FHD, IPS Level Close to 100 % SRGB, 240Hz AMD RX6700M GDDR6 10GB RGB Backlight Keyboard 1.9 kg, 82WHrs MSI Stealth Trooper II Backpack 2 Years warranty Genuine Windows 10 Home 64Bit Pre-installed',
    '4440.00',
    6
  ),
  (
	4
    'DELL INSPIRON 5515 AMD RYZEN 7',
    'DELL_04.JPG',
    'DELL_04.1.JPG',
    'Available Colour: Mist Blue',
    'DELL INSPIRON 5515 AMD RYZEN 7 AMD Ryzen™ 7 5700U (8 Core, 16 Threads- Up to 4.3GHz) 8GB 3200 Ram NVME 512GB M.2 NVMe SSD 15.6-inch FHD Anti-Glare 1920X1080 AMD Radeon Graphics Chiclet keyboard 1.80 kg, 42 WHr Dell Essential Backpack 2 Years warranty Genuine Windows 10 Home 64Bit Pre-installed, Office home and student included',
    '2170.00',
    3
  );


-- Create the Users table
CREATE TABLE IF NOT EXISTS Users 
  (
    userId 			INT(4) 			NOT NULL AUTO_INCREMENT,
    userType 		VARCHAR(1) 		NOT NULL,
    userFName 		VARCHAR(100) 	NOT NULL,
    userSName 		VARCHAR(100) 	NOT NULL,
    userAddress 	VARCHAR(200) 	NOT NULL,
    userPostCode 	VARCHAR(20) 	NOT NULL,
    userTelNo 		VARCHAR(20) 	NOT NULL,
    userEmail 		VARCHAR(100) 	NOT NULL,
    userPasscode 	VARCHAR(100) 	NOT NULL,
    CONSTRAINT userid_users_pk PRIMARY KEY (userId),
    CONSTRAINT useremail_users_unique UNIQUE (userEmail)
  );


-- Populate the Users table
INSERT INTO users (userId, userType, userFName, userSName, userAddress, userPostCode, userTelNo, userEmail, userPasscode)
VALUES
  (
    1
	'C',
    'Shiromi',
    'Basil',
    'Colombo, Sri Lanka',
    '01500',
    '0112345678',
    'shiro@gmail.com',
    'qwe'
  ),
  (
    2
	'C',
    'John',
    'Doe',
    'Colombo, Sri Lanka',
    '01500',
    '1234567891',
    'john@doe.com',
    'asd'
  ),
  (
    3
	'A',
    'Jane',
    'Doe',
    'Colombo, Sri Lanka',
    '01500',
    '9876543210',
    'jane@gmail.com',
    'wer'
  );


-- Create the Orders table
CREATE TABLE IF NOT EXISTS Orders 
  (
	orderNo 		INT 			AUTO_INCREMENT,
	userId 			INT 			NOT NULL,
	orderDateTime 	DATETIME 		NOT NULL,
	orderTotal 		DECIMAL(8,2) 	NOT NULL DEFAULT '0.00',
	orderStatus 	VARCHAR(50) 	DEFAULT NULL,
	shippingDate 	DATE 			DEFAULT NULL,
	CONSTRAINT o_ordno_pk PRIMARY KEY (orderNo),
	CONSTRAINT o_uid_fk FOREIGN KEY (userId) REFERENCES Users(userId) ON DELETE CASCADE
  );


-- Create the order_line table
CREATE TABLE IF NOT EXISTS order_line 
  (
    oderLineId 			INT 			AUTO_INCREMENT,
	orderNo 			INT 			NOT NULL,
	prodId 				INT 			NOT NULL,
	quantityOrdered 	INT 			NOT NULL,
	subTotal 			DECIMAL(8,2) 	NOT NULL DEFAULT '0.00',
	CONSTRAINT ol_olno_pk PRIMARY KEY (oderLineId),
	CONSTRAINT ol_ordno_fk FOREIGN KEY (orderNo) REFERENCES Orders(orderNo) ON DELETE CASCADE,
	CONSTRAINT ol_prid_fk FOREIGN KEY (prodId) REFERENCES Product(prodId) ON DELETE CASCADE
  );