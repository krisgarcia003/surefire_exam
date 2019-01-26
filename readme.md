## Surefire Examination Setup Guide ##
## Kristhoper Garcia ##


After cloning the repository

Run the migration command php artisan migrate

# Create User by Factory or using API
Now we will use Tinker to create our default User using factory
	- run command php artisan tinker
	- and paste factory(App\User::class, 1)->create();

We can register a User also through API
target the "http://yourdomain/api/register" in my case "http://surefire.test/api/register" and use POST Request in your REST Client
name:
email:
password:
After regsitration reponse will return authenticated user and token

# I use Laravel Passport for API Authentication
Now we will run command passport:install to install needed for laravel passport and it will create a default Oauth Client
another optional command php artisan passport:client

# I fetch only single data at a time from https://jsonplaceholder.typicode.com/, API server did not response correctly when I fetch all of 100 posts data
# just run command php artisan getdata many times to add more data to database
# customize artisan command is located at routes/console.php
Data that fetch from API "https://jsonplaceholder.typicode.com/" will be inserted to database using Eloquent


Next we need to login to our app for us to get the token so that we can communicate to our Backend API
Let use Postman or any other REST Client in my case I used Insomnia
target the "http://yourdomain/api/login" in my case "http://surefire.test/api/login" and use POST Request in your REST Client
email: defaultemail@gmail.com // the email of user that inserted into database from factory
password: secret // default password you create user from factory

After successfully login we will have a response data include token and user data
We will use the token to retrieve and show all the posts data from database 
target the "http://yourdomain/api/posts" in my case "http://surefire.test/api/posts" and use GET Request
Response will display all the posts


Note: if API did not work from http://localhost:8000 please considering to use custom domain for the application


---------Open Routes-----------
	/login
	/register

---------Protected by API Authentication Route---------
	/posts


