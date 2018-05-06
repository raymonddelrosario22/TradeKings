Executing Trade Integration 
TEST NUMBER 1 requires 1 file:
database&API_check2.php

These files must be run using XAMPP (Control Panel) and the files must be saved in the folder called "htdocs", which is automatically 
downloaded when you download XAMPP.

To run the program: 
Open your browser and type in "localhost/search.php" into the address bar (again XAMPP must be on and running). Type in any valid 
cryptocurrency ticker, for example 'btc' or 'eth'. Remark: The API used for this code is very slow, sometimes it will take long for the 
information to appear and sometimes it might not even print. So please just search for the ticker again.

Purpose of this Integration Test:
This program test the integration between couple things. Firstly, this program uses API's and databases, so in this test, we will see if 
those two things are functioning or not. This code will test whether the code is connecting with the database or not and checks if the code 
is able to pull few values from the database or not. This code will try to print all the leagues a user is in. User's email is hardcoded. And 
secondly it checks if the code is properly connecting to the API(Alphavantage) or not. If successful, information will be pulled from the API and shown on the screen.
In reality, this test will pass. After the user inputs a cryptocurrency name, the API results should appear and the leagues a user is in should appear on the 
right side of the screen.



TEST NUMBER 2 requires 2 files:
 1) search2.php and 2)BUYit2.php

These files must be run using XAMPP (Control Panel) and the files must be saved in the folder called "htdocs", which is automatically 
downloaded when you download XAMPP.

To run the program: 
Open your browser and type in "localhost/search.php" into the address bar (again XAMPP must be on and running). Type in any valid 
cryptocurrency ticker, for example 'btc' or 'eth'. Remark: The API used for this code is very slow, sometimes it will take long for the 
information to appear and sometimes it might not even print. So please just search for the ticker again.

Purpose of this Integration Test:
The purpose of this test to check and see if this program can be run using two files. In the first file, the user searches for a equity by name
and selects a league name. Then the program will try to go to the next page. Along with moving to another page, the url will pass two variables 
with it, one is the league name and second is the cryptocurrency name the user searches for. If this test completes, and if this test is succesfull then
the second file will open which will show the users equity's information on the page and also on the right, the user will be able to see the 
current balance which was pulled from the database.
