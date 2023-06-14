# Uservice-ubranclpaps


####HARDWARE REQUIREMENTS:


The hardware requirements for using Android Studio, PHP, and XAMPP on Windows can vary depending on the specific versions and configurations you are using. However, generally speaking, the following are the minimum recommended hardware requirements:
For Android Studio:
8 GB of RAM or higher
2.5 GHz processor or faster
4 GB of available disk space
1280 x 800 minimum screen resolution
For PHP and XAMPP:
2 GB of RAM or higher
1.5 GHz processor or faster
500 MB of available disk space
Note that these are just minimum recommended requirements, and for optimal performance, you may want to consider using more powerful hardware. Additionally, keep in mind that other factors such as the size and complexity of your projects can also affect performance





#### SOFTWARE REQUIREMENTS:

⦁	Here are the software requirements for using Android Studio Electric Eel with Kotlin, PHP for backend, and XAMPP version 7.4 for the database on Windows:
⦁	Android Studio Electric Eel:
⦁	Windows 7/8/10 (64-bit) operating system
⦁	4 GB RAM minimum, 8 GB RAM recommended
⦁	2.5 GB of available disk space, 4 GB recommended
⦁	1280 x 800 minimum screen resolution
⦁	JDK 8 or higher (pre-installed with Android Studio)
⦁	Kotlin Programming Language:
⦁	Kotlin 1.3.50 or higher
⦁	IntelliJ IDEA or Android Studio with Kotlin plugin installed
⦁	PHP for Backend:
⦁	PHP version 7.4 or higher
⦁	Apache web server or any web server that supports PHP
⦁	MySQL, MariaDB, or any database that supports PHP
⦁	XAMPP version 7.4 for the Database:
⦁	Windows 7/8/10 (64-bit) operating system
⦁	2 GB RAM minimum, 4 GB RAM recommended
⦁	1.5 GB of available disk space
⦁	PHP version 7.4 or higher
⦁	Apache web server
⦁	MySQL or MariaDB database
⦁	Composer setup
Note that these are just minimum requirements, and for optimal performance, you may want to consider using more powerful hardware or software. Additionally, keep in mind that other factors such as the size and complexity of your projects can also affect performance.

The software requirements for developing an Android application using Android Studio with Kotlin, and a PHP backend with XAMPP version 7.4 for the database are as follows:
Android Studio - You will need to download and install the latest version of Android Studio, which can be found at https://developer.android.com/studio. Make sure to choose the version that is compatible with your operating system.
Kotlin - Kotlin is the recommended programming language for Android app development. You can download and install the Kotlin plugin for Android Studio from the plugin manager within Android Studio.
PHP - You will need to install PHP on your system in order to develop the backend. You can download PHP from the official website at http://www.php.net/downloads.php.
XAMPP - XAMPP is a popular development environment that includes PHP, Apache, MySQL, and other components necessary for developing a PHP-based backend. You will need to download and install XAMPP version 7.4, which can be found at https://www.apachefriends.org/download.html.
Composer setup - Composer is a dependency manager for PHP. It allows you to declare the libraries, packages, and dependencies that your PHP project needs and manages the installation and updating of these dependencies automatically.
Note that you may also need to install additional software depending on the specific requirements of your project. For example, if you plan to use a specific PHP framework, you will need to install it as well. Additionally, you may need to install a database management tool such as phpMyAdmin to manage your MySQL databases within XAMPP.





Backend:



Start XAMPP:  To start the Apache server and the MySQL database, you can open the XAMPP control panel and click on the "Start" button for Apache and MySQL.
Create database and tables: Using phpMyAdmin, you can create a database for your app and define the necessary tables for storing user data, driver data, ride requests, and ride history. You can also define the relationships between these tables using foreign keys.
Implement PHP API: Using PHP, you can implement the necessary APIs for your app, such as user registration and login, driver registration and login, ride request, ride acceptance and rejection, ride cancellation, and ride completion. You can use the Laravel framework to make the development process easier. You can start the server using the command "php artisan serve --host [ip address]".

Frontend:




Use Android Studio: You can use Android Studio to develop the frontend of your app. You can create activities and layouts for user registration and login order registration and login, order request, order acceptance and rejection, order cancellation, and order completion. You can also implement the necessary APIs to communicate with the backend.

===========<--------------------------STEPS------------------------------------>===========================
Start XAMPP: Launch XAMPP and start the MySQL and Apache servers.

Open Command Prompt: Open the Command Prompt and retrieve the IPv4 address of your system using the command ipconfig.

Open the Project File: Navigate to the project folder in your file system.

Enter the Project Header Command: In the Command Prompt, navigate to the project folder using the cd command.

Start the Backend Server: Enter the command php artisan serve --host <IPv4_address> to start the backend server. Replace <IPv4_address> with the actual IPv4 address obtained in step 2.

Copy the URL: After the server starts, copy the URL provided in the Command Prompt.

Open the URL in Chrome: Paste the copied URL into the address bar of Google Chrome.

Enter Username:"admin@admin.com" and Password: "password" Provide the required username and password credentials.

Access the Dashboard: After successful login, you will be directed to a new page, which is the app's dashboard.

Add Category: Navigate to the category section and add a new category.

Add Subcategory: Within the chosen category, add a subcategory.

Add Product Listings: Populate the subcategory with product listings, including details like product name, description, and price.

Front-end Screenshots: Capture screenshots of the landing page, available categories, subcategories, and the process of buying a product.

Buying Product in the App: Demonstrate the process of selecting and purchasing a product from the app.

Add to Cart: After selecting a product, show the product added to the cart.

User Details: Display user details, such as name, email, and shipping address.

OTP Verification: Showcase the process of OTP verification sent to the provided email address.

OTP Received: Display the OTP received in the given email address.

Enter OTP Verification: Enter the received OTP for verification.

Order Placement: After successful OTP verification, show a confirmation message stating that the order has been placed successfully.

Dealer Receives Order: Explain that the dealer receives the order details in the backend service.




