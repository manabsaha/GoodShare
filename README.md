# GoodShare
In campus goods sharing platform - Tezpur University

## Introduction
> This project is an online portal where the students and the staffs of the campus can list goods for sale/rent. It is an online market within the campus for local second-hand goods such as vehicles, furniture, appliances, books and electronics. It will help the respective people to borrow and lend the required goods without hassle in a safe, reliable and efficient way. The goods are easily accessible within the campus.

## Objectives
1.	Connect the sellers to their target buyers.
2.	Ensure hassle free and ease of service to buyers.
3.	Enable quick transactions and save time of the consumers.
4.	Provide a high quality of service to consumers.
5.	Mediate on problems which may arise between the seller and the buyer.
6.	Provide easy and quick resolution to problems because of a highly efficient hierarchical model.

## Project
* PHP
* MySQL
* HTML CSS

## Walkthrough
1. Login as user
2. View/Post Ads
3. View your listed products
4. Bookmark products
5. Message the seller
6. Purchase product
7. View your bought products

This project doesn't have any admin side.

## Setup
* Clone the project inside of htdocs folder of xampp. <br/>
* Import the mysql from /inc by creating a 'goodshare' database. <br/>
Also you can change the password, if it's different for your mysql server in the inc/config.php <br/>
```
$db=mysqli_connect("localhost","root","root","goodshare");
````
* Run the apache server and the mysql server in xampp. <br/>
Go to http://localhost/goodshare/



## Snapshots
First Column | Second Column
------------ | -------------
![login](https://user-images.githubusercontent.com/46393531/125201841-791b5580-e28e-11eb-842e-4d864672b1ef.jpg) | ![home](https://user-images.githubusercontent.com/46393531/125201844-80dafa00-e28e-11eb-83a6-14188d55ffb0.jpg)
Login | Home
![image](https://user-images.githubusercontent.com/46393531/125202048-8be25a00-e28f-11eb-908a-dd7dd4d53e12.png) | ![image](https://user-images.githubusercontent.com/46393531/125202069-9e5c9380-e28f-11eb-98a1-af6d0c5c5f5f.png)
Sell | Purchase/Bookmark
![image](https://user-images.githubusercontent.com/46393531/125202093-b2a09080-e28f-11eb-8452-48f6a0c32dc1.png) | ![image](https://user-images.githubusercontent.com/46393531/125202114-c5b36080-e28f-11eb-873d-dcfb0ec1ca33.png)
Message | My Products
![image](https://user-images.githubusercontent.com/46393531/125202130-d5cb4000-e28f-11eb-9f5f-73e088fe1e68.png) | ![image](https://user-images.githubusercontent.com/46393531/125202156-ebd90080-e28f-11eb-8fc3-82f6c3559e1f.png)
Set Buyer | Registration



