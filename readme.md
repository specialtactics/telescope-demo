## Laravel Telescope Demo
This is a demo of Laravel Telescope built for the presentation on the same topic (https://blog.maxsnow.me/presentations/)

This project is based on the [Laravel API Boilerplate](https://github.com/specialtactics/l5-api-boilerplate)

## Presentation Notes

#### Demo Request
An example request 

**Telescope Features Shown**
 - Request
 
#### Create new Post
An example request which creates a new resource in the system

**Telescope Features Shown**
 - Request
 - Model
 - Queries
 
#### Cache Example
An example request which demonstrates cache monitoring
 
**Telescope Features Shown**
  - Request
  - Cache
  
#### Create User 
An example request which demonstrates several features;

**Telescope Features Shown**
 - Request
 - Queries
 - Models
 - Events
 - Mail
 - Jobs

**Things to note**
 - In order for telescope to record your emails, you will need to change your mail driver to "log"

#### Exceptional Request
An example of exception handling and dumping

**Telescope Features Shown**
 - Dumps
 - Exceptions
 
**Things to note**
 - You must have the Telescope dump screen open in order for it to log dumps
 - Exceptions are not logged if you throw them directly
 
#### At the end
Show schedule & do an example of a command