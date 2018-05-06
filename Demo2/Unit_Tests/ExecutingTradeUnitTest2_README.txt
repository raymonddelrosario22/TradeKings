Executing Trade Unit Test 2 requires 2 files: 1) CallUnitTest2.php and 2)ExecuteStockTrade_UnitTest2_Invalid Sell.php

These files must be run using XAMPP (Control Panel) and the files must be saved in the folder called "htdocs", which is automatically 
downloaded when you download XAMPP.

To run the program: 
Open your browser and type in "localhost/CallUnitTest2.php" into the address bar (again XAMPP must be on and running). Type in any valid 
stock ticker and click on one of the leagues. From here, the actual execute trade page will load. Regardless of the ticker entered, the stock 
will show data for Alphabet Inc. Then enter an integer number of shares and click on the "Sell Shares" button. 


The purpose of this Unit Test is to confirm that if an input is entered such that the user is attempting to sell more shares than they actually own
in his/her portfolio, then the system will catch this and report the error. To confirm that the proper test is being run, the following 
variables are being hardcoded: the ticker is set to "googl", the user's balance is $1000, the share price is $2000, the amount (of shares of "googl" that 
the user owns) is 0, and the number of shares being sold is 3. These values will all hold regardless of what is entered by the user. Once the user clicks 
"Sell Shares", the program should correctly compute that the user wants to sell more shares than they own and will accordingly output an error message. 