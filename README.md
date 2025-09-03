BookMARKER
BookMARKER is a web-based application built with PHP and MySQL for managing a book catalog and personal reading lists. It features separate sections for general users and administrators, each with a tailored set of functionalities.

Features
User Functionality
User Authentication: Secure login and registration.

Personalized Reading List: Add, edit, and delete books from a personal reading list.

Book Browsing: View a read-only list of all books in the catalog.

Administrator Functionality
Comprehensive Management: Manage the entire book catalog and user accounts.

Book Management: Add, edit, and delete books from the main catalog.

User Management: View, edit, and delete user accounts.

Core Files
db.php: Establishes the connection to the MySQL database.

initialize.php: Sets up the database and initial tables (users, books, reading_list).

home.html: The application's landing page.

login.php: The login interface.

register.php: The user registration page.

authenticate-user.php: Validates user credentials and redirects to the correct dashboard.

Installation and Setup
Database Connection: Ensure your MySQL database credentials are correctly configured in db.php.

Initialization: Navigate to home.html and click the link to run initialize.php. This will set up the necessary tables and populate them with sample data.

Access: Once initialized, you can use the provided sample credentials on the login page to test both the user and administrator functionalities.

Sample Credentials
Admin Username: admin

User Username: user
