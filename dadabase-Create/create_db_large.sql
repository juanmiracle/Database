/**
Hi Susan, I made some modification on the table, now:
1. I change the attribute of OrderID into orderID in the Orders table. 
2. I add the product quantity in the table Buy and Contain, so the users can choose the quantity the want to buy the product or add it to cart.
**/

DROP TABLE IF EXISTS Customer;
CREATE TABLE Customer (
         userID varchar(50) PRIMARY KEY,
         username varchar(50),
         passwd varchar(50),
		 historyScan text,
         address varchar(100),
         telephone varchar(11)
             );
              
DROP TABLE IF EXISTS Product;               
CREATE TABLE Product(
         productID varchar(50) PRIMARY KEY,
         productName varchar(50),
         productPrice real,
         productDescription text,
         productStock Integer
             );   

DROP TABLE IF EXISTS Orders;
CREATE TABLE Orders(
         orderID varchar(50) PRIMARY KEY,
		 address varchar(100),
		 totalPrice real,
         state varchar(50)
           );
  
DROP TABLE IF EXISTS Buy;             
CREATE TABLE Buy(
        userID varchar(50), 
        OrderID varchar(50),
        productID varchar(50),
        quantity integer,
        PRIMARY KEY(userID,OrderID,productID)
             );            
      
DROP TABLE IF EXISTS ReviewInfo;            
CREATE TABLE ReviewInfo(
         reviewID varchar(50),
         productID varchar(50),
         userID varchar(50),
          PRIMARY KEY(reviewID,productID,userID)
             ); 

 DROP TABLE IF EXISTS Review;            
 CREATE TABLE Review(
         reviewID varchar(50) PRIMARY KEY,
         reviewDate date,
         content text,
         score  integer
             );    
             
           
 DROP TABLE IF EXISTS Manager;          
 CREATE TABLE Manager(
         managerID varchar(50) PRIMARY KEY,
         managerName varchar(50),
         paawd varchar(50)
             ); 
 
 DROP TABLE IF EXISTS Cart; 
CREATE TABLE Cart  (
         CartID varchar(50) PRIMARY KEY,
         Cartdate Date,
         subtotal Real
             );
             
             
DROP TABLE IF EXISTS Contain;
  CREATE TABLE Contain(
        userID varchar(50), 
        productID varchar(50),
        productQuantity   integer,
        PRIMARY KEY(userID,productID)
             ); 