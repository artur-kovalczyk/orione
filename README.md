# Recruitment Task

[![N|Solid](https://cldup.com/dTxpPi9lDf.thumb.png)](https://nodesource.com/products/nsolid)

[![Build Status](https://travis-ci.org/joemccann/dillinger.svg?branch=master)](https://travis-ci.org/joemccann/dillinger)

Task was to create databse .

  - Type some Markdown on the left
  - See HTML in the right
  - Magic

# Task description

The task was to create a movie database with movie data and actors, and a user interface where you are able to search on both actors and movie titles.When you click on an actor you should get all the information about this actor, and below this you should see a list of movies that the actor have participated in. And the opposite when you click on a movie.

### Instalation
#### NOTE: Script requires to have Postgres database enviroment installed on the server. 

 - Upload all files to your server in desired catalog.
 - Open and execute "orione.sql" file in the psql shell or in pgAdmin to create necessary tables and fill them with sample data.
 - To connect to database: in the file: "inc/db-pg.php" change line 12 to: $this->db = pg_connect("host=YOUR_HOST port=YOUR_PORT dbname=_DB_NAME user=_USER password=_PASSWORD");
- now you go to http://YOUR_SITE/YOUR_DESIRED_FOLDER_NAME/ to see the Recrutment Task features
