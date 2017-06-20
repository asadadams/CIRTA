![CIRTA](https://github.com/asadadams/CIRTA/blob/master/logo.png)

# CIRTA 
CIRTA (Chat In Real Time Application) is an open source chat project. This application uses Websockets over a TCP protocol. This concept is implemented using PHP WebSocket library Ratchet. I hope to add more features in the future and might,host it.

## Getting Started

The project is built in PHP and also uses javascript and css. Bootstrap is used in the frontend. Jquery library is also used. 

### Prerequisites
**You will need to install Ratchet using composer and extract it into your root folder. You must also have an Apache server with PHP installed** In the root folder run in your terminal or Command Prompt

```
   composer install 

```

## Usage
To start server move to app folder and run 

```
   cd app
   php server.php

```

## Project Structure
 * **root directory(./)** - containing composer.json,composer.lock and application files
 * **app directory** - containing the css/includes/js/libs directories,classes(message.class - for messages , users.class - for client, chat.class - for Ratchet class) and server
 *  The *css directory* contains the bootstrap css and main.css
 *  The *js directory* contains the socket.js file which is used in connecting client to server and the main.js file which contains ajax calls for registering and logging user in
 *  The *libs directory* contains scripts for which ajax calls are made to(login & signup) and a script for retreiving chat history

## To do
* Get username of client posting and attach it to the message they are trying to post


## Developers
If you are a developer feel free to contribute to the project by providing bug fixes, new ideas and suggestions. 
**Was bored again, so tried learning a new thing and started researching on WebSockets. **

##Me
Want to say hi? Will be happy to hear from you
* [Twitter](http:///www.twitter.com/asadadams)
* [Facebbok](http://www.facebook.com/asad.adams)
* [Instagram](http://www.instagram.com/asadadams)
* [Linkedin](http://www.linkedin.com/in/asad-adams-7548a4104/)
* [Mail](clarkpeace.adams@gmail.com)