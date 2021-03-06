/**
* load data, and  reference these files in the populate_db_large.sql script by relative paths.
*  I gather all the data on the website:  http://www.generatedata.com, 
*  I don't use the real data and these data are generated by ramdom, so some of the data value maybe meaningless.
*  all the file are placed in a directory  named data
*/ 
LOAD DATA
    LOCAL INFILE  "/Users/apple/Desktop/data/Customer.txt"
    REPLACE INTO TABLE Customer
    FIELDS TERMINATED BY '|';
    
LOAD DATA
    LOCAL INFILE  "/Users/apple/Desktop/data/Product.txt"
    REPLACE INTO TABLE Product
    FIELDS TERMINATED BY '|';
     
LOAD DATA
    LOCAL INFILE  "/Users/apple/Desktop/data/Buy.txt"
    REPLACE INTO TABLE Buy
    FIELDS TERMINATED BY ',';
    
LOAD DATA
    LOCAL INFILE  "/Users/apple/Desktop/data/Orders.txt"
    REPLACE INTO TABLE Orders
    FIELDS TERMINATED BY '|';

LOAD DATA
    LOCAL INFILE  "/Users/apple/Desktop/data/Review.txt"
    REPLACE INTO TABLE Review
    FIELDS TERMINATED BY '|';
	
LOAD DATA
    LOCAL INFILE  "/Users/apple/Desktop/data/ReviewInfo.txt"
    REPLACE INTO TABLE ReviewInfo
    FIELDS TERMINATED BY ',';
    
LOAD DATA
    LOCAL INFILE  "/Users/apple/Desktop/data/Contain.txt"
    REPLACE INTO TABLE Contain
    FIELDS TERMINATED BY ',';
    
LOAD DATA
    LOCAL INFILE  "/Users/apple/Desktop/data/Manager.txt"
    REPLACE INTO TABLE Manager
    FIELDS TERMINATED BY ',';	

LOAD DATA
    LOCAL INFILE  "/Users/apple/Desktop/data/Cart.txt"
    REPLACE INTO TABLE Cart
    FIELDS TERMINATED BY ',';
	