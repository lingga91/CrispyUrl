# Crispy Url
This is a url shortening system build using php 8 and laravel 11.
The .env file already commited here to ease up the setup.

# Prerequisites
- install docker and docker compose in your computer

## Setup
- After clone this repo, use the terminal and navigate to the project directory
- run 'docker compose build' to build the cripy url app image
- run 'docker compose up -d' to start up the containers
- then remote into the running container using 'docker exec -it webapp bash'
- then run 'php artisan migrate' to migrate all the db tables
- then you may access the application using port 8000 localhost (http://localhost:8000/)

## Info
- The url expiry interval is set to 10 days by default. You may edit this in .env file by
  setting the EXPIRY_INTERVAL_IN_DAYS value.
- Every routes is applied rate limiter with max of 100 request per minute.
- lock mechanism is applied for both creating url and loading url function 
  to avoid race conditions.
- you may access the analytics page using this url http://localhost:8000/analytics