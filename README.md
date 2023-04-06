# Health Facility Employee Status Tracking System (HFESTS)

The HFESTS system help health care facilitites to keep track of their employees' health status during COVID-19 pandemic.

## Requirements

- [XAMPP](https://www.apachefriends.org/)

  - PHP (Back-End)
  - MySQL (DB server)
  - Apache (Web Server)

- Main project folder should be located in .../XAMPP/htdocs

## Project Layout

    COMP353_Project
    ├── css/
    │   └── style.css       # Common style
    ├── js/
    │   └── script.js       # JavaScript files
    ├── views/
    │   ├── footer.php      # Common footer for all pages
    │   ├── header.php      # Common header for all pages
    │   └── index_body.php  # Body of index page
    ├── config.php          # DB connection credentials
    ├── helpers.php         # Common helper/utility functions
    └── index.php           # Controller to handle user request and return response
