# Laravel Events and Listeners Demonstration

This project offers a practical demonstration of Laravel's event-driven programming capabilities, particularly focusing on events and listeners. Through a hands-on approach, it elaborates on how to send emails using events and the intricacies of logging data with listeners.

---



## Introduction

Laravel's event-driven model provides an expressive, intuitive interface for various parts of your application. Events serve as a great way to decouple various aspects of your application, allowing a single action to affect multiple parts of your system without tying them closely together.

In this demonstration:
- **Emailing with Events**: Understand the step-by-step process of triggering emails through specific events in Laravel.
- **Logging with Listeners**: Explore how to capture and log  data when certain events are fired.

---

## Setup & Installation

1. Clone the repository:
   
   git clone https://github.com/sydney-commits/LaravelEvents.git



2. Navigate to the project directory and install dependencies:


cd [project-directory]

composer install

Set up your .env file, ensuring you configure mail and database settings appropriately.

Migrate the database :

Serve the application:
php artisan serve


Usage
Triggering the Email Event:
Register or Login: Navigate to the registration or login page. Upon successful registration or login, an email event will be fired.

Confirmation Email: Once registered or logged in, the system triggers an email event. This event will dispatch a confirmation email to the user's registered email address.

Viewing the Email: Check the provided email address's inbox. If successful, you should receive a confirmation email. If it's not in the inbox, consider checking the spam folder.
