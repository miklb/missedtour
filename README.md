
# MissedTour

WordPress child theme for the Storefront WooCommerce theme.

## Installation

The project is self-contained to allow you to spin up a local development enviornment, retaining your work and keeping a persistent database until no-longer needed.

First you will need to install [Docker for Mac](https://docs.docker.com/docker-for-mac/install/). If you are new to using Docker, we recommend getting familiar with their Docker for Mac [documentation] basics. Worry not, to get up and running you need a couple of basic commands provided here.

You'll also want to make sure Node is [installed](https://www.npmjs.com/get-npm)

## Docker

### Configuration

Edit the `.env` file to change the default IP address, MySQL root password and WordPress database name if necessary.

### Installation

Open a terminal and `cd` to the folder in which `docker-compose.yml` is saved and run:

```bash
docker-compose up
```

This creates two new folders next to your `docker-compose.yml` file.

* `wp-data` – used to store and restore database dumps
* `wp-app` – the location of your WordPress application

The containers are now built and running. You should be able to access the WordPress installation with the configured IP in the browser address. By default `http://127.0.0.1`.

For convenience you may add a new entry into your hosts file.

```bash
sudo nano /etc/hosts
```

and then add `127.0.0.1 missedtour.local` to the end of the file where `missedtour` is the local project directory you are working on. You can change the URL in the database or add to the `wp-app/wp-config.php`

```php
define('WP_HOME','http://missedtour.local');
define('WP_SITEURL','http://missedtour.local');
```

## Usage

### Starting containers

You can start the containers with the `up` command in daemon mode (by adding `-d` as an argument) or by using the `start` command:

```
docker-compose start
```

### Stopping containers

```
docker-compose stop
```

### Removing containers

To stop and remove all the containers use the`down` command:

```
docker-compose down
```

Use `-v` if you need to remove the database volume which is used to persist the database:

```
docker-compose down -v
```
### WP CLI

The docker compose configuration also provides a service for using the [WordPress CLI](https://developer.wordpress.org/cli/commands/).

Sample command to install WordPress:

```
docker-compose run --rm wpcli core install --url=http://localhost --title=test --admin_user=admin --admin_email=test@example.com
```

Or to list installed plugins:

```
docker-compose run --rm wpcli plugin list
```

For an easier usage you may consider adding an alias for the CLI:

```
alias wp="docker-compose run --rm wpcli"
```

This way you can use the CLI command above as follows:

```
wp plugin list
```

### phpMyAdmin

You can also visit `http://127.0.0.1:8080` to access phpMyAdmin after starting the containers.

The default username is `root`, and the password is the same as supplied in the `.env` file.

## Development

## Contributing
Want to contribute? Great, thanks! If you haven't already, please open an [issue](https://github.com/miklb/missedtour/issues) first. I'm using a general gitflow, but if you have any questions, please direct them in your PR or issue. Again, thank you for considering contributing.


## Credits

* Sane [Docker starting point](https://github.com/nezhar/wordpress-docker-compose) and documentation.

## Changelog

0.0.1 Initial checkin