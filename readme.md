# apimonitor

![apimonitor Preview](https://goo.gl/5OJcwC)

### Requirements

* PHP >= 5.5.9

### Install

1. Download/clone and run `composer install`
2. Setup and run as a website (Either run `docker-compose up -d` to run as a Docker container or setup manually using something like MAMP)
4. Rename `.env.example` to `.env` and fill in the required information

### Usage

Under controller apicontroller.php calling Util/HelpMonitor which has array for configuration of API with their paths and endpoints. You can add your public api there and check it out. OAuth mechanism is there but not yet implemented, you can add as per your own choice. Also you can create other helper functions.

React does all magic behind so no worries you just need to check controller only ;)
