# Job Tracker

## About

Job Application Tracker is a simple web app that helps you track your job applications. You can add job applications, update their status (Pending, Accepted, Rejected), and keep everything organized. The app is built using **PHP (MVC method)** for the backend and **Vue.js (CDN)** for a dynamic frontend.

## Features

- Add new job applications with company name, position, and date applied.
- Update the job status (Pending, Accepted, Rejected).
- View all your job applications in a table.
- Simple and easy-to-use interface.

## Installation

### 1. Clone the Project

```sh
git clone https://github.com/Rachad-Alabi-ADEKAMBI/job_tracker
cd job_tracker
```

### 2. Setup the Database

- Open **phpMyAdmin** or any SQL tool.
- Create a new database (e.g., `job_tracker`).
- Import the SQL file located in the **sql** folder:
  ```sh
  import sql/job_tracker.sql
  ```

### 3. Configure Database Connection

- Open **config/database.php**.
- Update database settings:
  ```php
  define('DB_HOST', 'localhost');
  define('DB_NAME', 'job_tracker');
  define('DB_USER', 'root');
  define('DB_PASS', 'yourpassword');
  ```

### 4. Start the Server

If you are using XAMPP or LAMP:

- Move the project to htdocs (for XAMPP) or var/www/html (for LAMP)
- Start Apache and MySQL in XAMPP/LAMP
- Open your browser and go to: http://localhost/job_tracker

If you are using XAMPP or LAMP:

    - Move the project to C:\laragon\www\job_tracker

    - Start Laragon and ensure Apache & MySQL are running

    - Open your browser and go to: http://job_tracker.test (if Virtual Hosts are enabled)

## Technologies Used

- **PHP (MVC Pattern)** – Backend logic
- **Vue.js (CDN)** – Dynamic frontend
- **MySQL** – Database
- **Bootstrap (CDN)** – UI styling

## Folder Structure

```
job_tracker/
├── src/          # PHP MVC files (Models, Views, Controllers)
├── public/       # Public assets (CSS, JS, Index file)
├── sql/          # SQL file to create the database
├── index.php     # Main entry point
└── README.md     # Project details
```

## Usage

- Open the app in your browser.
- Add new job applications.
- Update job statuses.
- Manage your applications easily!

## Contributing

Feel free to improve the project and submit pull requests.

## License

This project is open-source. You can use and modify it as you like.

---

Enjoy tracking your job applications! 🚀
