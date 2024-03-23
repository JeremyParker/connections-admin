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
