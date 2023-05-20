# Health Facility Employee Status Tracking System (HFESTS)

The HFESTS system help health care facilitites to keep track of their employees' health status during COVID-19 pandemic.

## Table of contents

- [Requirements](#requirements)
- [Technologies](#technologies)
- [Project layout](#project-layout)
- [Features](#features)

## Requirements

- [XAMPP](https://www.apachefriends.org/)

  - PHP (Back-End)
  - MySQL (DB server)
  - Apache (Web Server)

- Main project folder should be located in .../XAMPP/htdocs

## Technologies

Project is created with:

- HTML5
- CSS
- JavaScript
- PHP
- SQL
- MySQL

## Project Layout

    COMP353_Project
    ├── css/
    │   └── style.css       # Common style
    ├── js/
    │   └── script.js       # JavaScript file
    ├── utilities/
    │   ├── config.php      # DB connection credentials
    │   └── helpers.php     # Common helper/utility functions
    ├── views/              # HTML contents
    │   ├── footer.php      # Common footer for all pages
    │   ├── header.php      # Common header for all pages
    │   ├── ...
    │   └── index_body.php  # Body of index page
    ├── ...                 # Controller to handle user request and return response
    └── README.md

## Features

- CRUD operations on Facilities, Employees, Vaccinations and Infections pages
- Display result of queries
  - Directly
  - Based on chosen attribute
