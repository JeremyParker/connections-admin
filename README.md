# Connections Admin

This is a content management system for a game like the New York Times game Connections.

# To Deploy

A push to `main` branch should trigger the Github workflow in .github/workflows and deploy to fly.

# Working with the deployed instance

To get a shell on the container, run `fly ssh console --config fly.toml`

To access the database with a tool like dbeaver or pgadmin
Proxy a local port to the remote db host with `fly proxy 15432:5432 -a connections-admin-db`

Then set up a connection to localhost:15432 in the UI of your database tool (e.g. dbeaver).
To get the db password:

-   get a shell on the remote machine with `fly ssh console -a connections-admin-db`
-   run `env` and look for "OPERATOR_PASSWORD=" and grab the password from there
-   set up your connection with host = `localhost:15432`, user=`postgres`, password=[the password you just copied].

For some reason the remote db is called `connections-admin`. I think maybe I didn't have the DB_DATABASE set
when I ran `php artisan migrate`?

# how to run locally

Run `sail up`
Open a browser to localhost

# how to connect and manage to the local database

You can use the adminer service that's configured in docker-compose to interact with the docker pgsql instance.

-   Open http://localhost:8080/ in your browser.
-   Select `PostgreSQL` as the "System"
-   Server should be `database:5432`
-   username is `root`
-   password should be `password`

Then you should be able to see all the data and the structure of the db.

# how I set up the deployment (incomplete list of steps)

-   fly launch # select yes to the database option
-   `fly secrets set DB_CONNECTION=pgsql`
-   `fly secrets set DB_DATABASE=words`
-   get a shell on the remote app container and run `php artisan migrate`

# how to clear caches

Sometimes the app gets confused, and you need to clear the caches. Execute these commands:

```
php artisan config:clear
php artisan cache:clear
php artisan view:clear
php artisan route:clear
```

To check the phpinfo for debugging, go to http://localhost/phpinfo-secret.php
TODO: this is a security issue.
