# XAMPP Project - 'Find your parking lots'

### Theme
Analysis of Traffic Data

### Environment settings
* All implementation documents should be located in htdocs
* CSV files are recommended to be located in mysql>data (or you need to change file path in insertion.sql)

### Requirements
(1) Database creation scripts and data insert scripts should be created (SQL scripts)

- The database should be created beforehand with a database script (file containing USE DATABASE and CREATE TABLE, INSERT, etc. SQL statements for initializing the sample database). 

- (1-1) The database creation script should not only create tables but also have primary keys, foreign keys, and index creation statements. 

- (1-2) The database insert script should include insert statements into the database to initialize the sample database

- Caution: Make sure that the script will work before submission, so that these will also work in the evaluation system

(2) INSERT, DELETE, UPDATE, SELECT related functions should be implemented in the Web site.

-   Some of them should take USER INPUT to generate DYNAMIC QUERIES to run on the database

(3) Some SELECT queries should include SUM, AVG, etc (aggregation operations) and also GROUP BY statements

(4) Provide at least 3 kinds of advanced analysis functions to users for the data that is stored in the database

- Examples of advanced analysis functions are :

   providing aggregates (sum, average, max, min, etc.) based on complex groupings, OLAP, window, ranking, data mining or deep learning tasks, etc.

-  caution: providing same function on different data does not count as additional function

   (such as calculating complex average on data A, and then using similar complex average on data B will be counted as 1 kind of analysis function)

(5) User input should include various types of controls such as text box, buttons, etc. (Not just a single text box and single submit button!)

(6) Use PHP sessions to store and retrieve information needed between some pages displayed

(7) Use at least one transaction in the database for some part of the project.