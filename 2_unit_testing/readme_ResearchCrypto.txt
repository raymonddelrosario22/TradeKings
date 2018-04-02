Checkpoint for Cryptocurrency Page

Goals:
	Firstly, we wanted to write a piece of code which would fetch data from the AlphaVantage API, and show it 
to the user. We wanted the user to see close, open, high, and low values along with the date of when data were measured.
Secondly, we wanted to provide some sort of a chart which would make it easier for the user to see the data. Finally,
we wanted to create a page with all the details and graph that was neat and organized. These goals are preliminary which
means they are the opening steps, or the beginning goals, which will help us create a much fuller page.
	
Current Code:
	At this point, this page allows the user to enter a cryptocurrency ticker, for example, BTC for bitcoin, 
and it provides the user with some details regarding the currency. After the user enters a ticker and presses search,
data will be fetched from the AlphaVantage API and shown to the user. Data includes the past day's close value, 24 hr 
percentage change,Open values, High value, Low Value, as well as the Market Capitalization value. Along with these 
details is an interactive graph. It is a line graph that shows the close values for the past 200 days and the user is 
able to move the mouse on the graph to see the exact close value on a particular day. Looking back to the goals, it is
fair to say that these three minor goals were accomplished.

How to Use:
	The user must input a proper cryptocurrency ticker in order for the page to load. Lets say a user wants to 
search for Bitcoin details, then the user will enter "BTC" in the search bar and press the search button which is 
on the right of the bar. After this, the data will be fetched from the API and shown to the user.