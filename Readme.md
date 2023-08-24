# Vehicle Parking Management System

Welcome to the **Vehicle Parking Management System** repository! This system is designed to manage vehicle parking spaces. This README file will guide you through setting up and running the system.

## Features

- User-friendly interface for vehicle owners and administrators.
- Real-time parking space availability updates.
- Admin panel for managing users, parking spaces, and transactions.

## Prerequisites

Before you begin, ensure you have the following installed:

- Web server (e.g., Apache, Nginx) with PHP support.
- PHP installed on your system.
- MySQL database (or another database of your choice).

## Getting Started

1. **Clone the repository:**
    ```sh
    git clone https://github.com/your-username/parking-management.git
    cd vpms
    ```

2. **Database Setup:**

    - Create a MySQL database and import the SQL dump file provided in the `database` directory.


3. **Run the Web App:**

    - Start your web server and make sure PHP is configured correctly in  `http://localhost/xampp/vpms`.
    - Access the web app by opening `index.html` in your browser.

4. **Using the Application:**

    - Vehicle Owners:
        - View available parking spaces and select one.
        - Book a parking space
        - Receive a booking confirmation.
    
    - Administrators:
        - Access the admin panel using `admin.php`.
        - Login using the provided admin credentials.
        - Manage users, parking spaces, and view transactions.

