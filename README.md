# WorkHuman Technical Assessment
Create a small web application using your own choice of Frontend and
Backend technologies.
This application should display a list of countries, including a text input field for searching. You should be able to provide a string in this input field, run a search on the list of countries, and return those which match your input. 
For example, searching for "eden" should return "Sweden" in the new list, and searching "united" should return "United States of America" & "United Kingdom" in the new list. The search functionality should be case insensitive (e.g "ireland" should return "Ireland" in the new list).
Your application Frontend and Backend must interact, in a typical Request-Response model.
The list of countries is provided below - and should be stored in some persistent layer that the Backend can access (e.g SQLite database, some appropriate data structure, etc.).
On the day of the interview, we will ask you to do the following:
    • Run the application locally, showcasing its functionality and your implementation.
    • Explain some of the technical choices you made (choice of Frontend/Backend technologies, how you persisted list of countries and why, etc.)
    • Discuss some potential areas of improvement (design, performance, etc.)
There is no limitation on the use of Google, Stack Overflow, etc. to research and develop this application.

##What I used
To make the application have those features, I used PHP (backend server-side) and AJAX (data fetching) to interact with the database and ensure the frontend is updated dynamically without reloading the page. I also used MySQL to store the country data, allowing me to efficiently manage and retrieve information for the search functionality. Additionally, I implemented some parts in JavaScript (client-side for interaction), especially to handle the case-insensitive search and dynamically update the list of countries displayed.

For the user interface and structure, I used HTML/CSS (frontend) to create a clean, user-friendly layout that makes the search experience seamless and visually appealing.


## Database

I used XAMPP is a local server enviorment that includes mysql,php and phpmyadmin. I have used XAMPP, because it makes it very easy to set up a local enviorment for a website, and to connect it to phpmyadmin for databse management. In this case the name of the countries.
I had already used XAMPP for a different project and I though it was a good fit for this Assessment. Since I was using phpmyadmin for the database, I used PHP files to interact with the data (searcing for the countries) between Frontendand Backend; as it supports sql which i used to manage the data in the database. It is also useful to integrate it with HTML.

The sql I wrote in phpmyadmin to make the table 
```sql
CREATE TABLE countries (
    id INT AUTO_INCREMENT PRIMARY KEY,
    country_name VARCHAR(100) NOT NULL
);

INSERT INTO countries (country_name) VALUES
('Albania'),
('Andorra'),
('Australia'),
('Brazil'),
('Belgium'),
('Canada'),
('China'),
('France'),
('Germany'),
('India'),
('Indonesia'),
('Ireland'),
('Italy'),
('Japan'),
('Kenya'),
('Luxembourg'),
('Mexico'),
('New Zealand'),
('Nigeria'),
('Portugal'),
('Russia'),
('South Africa'),
('South Korea'),
('Spain'),
('Sweden'),
('Thailand'),
('Ukraine'),
('United Kingdom'),
('United States of America'),
('Vietnam'),
('Zambia');
```

##Files structure
Main page is index.php, what the user will see and search their country. 
Search.php is the file I made to fetch the data from the database. 
Connection.php, has the setup for the files to connect to the database. 
Search.js, handles the search operations:
-   to make sure the table is updated according to the input on the search bar.
-   make the searchg case insensitive
-   make the returned countries  match the input 
-   handle the AJAX requests(fetcing the countries)
style.css, the file used for styling the website.

##how does it work?
The list of countries is retrieved from the MySQL database via a PHP query. JavaScript listens to user input and dynamically filters the country list. AJAX is used to asynchronously fetch data from search.php without reloading the page. Input is converted to lowercase to match country names regardless of case.
