# PHP Task Manager

[Summary of project here]

## Development

To work on this project you need to have Docker (and Docker Compose), and composer installed.

- Make sure you have a `.env` file in the root of the project (use a copy of the `.env.example` if you don't);
- Run `composer -d src/ install` to install PHP packages;
- Run `docker compose up -d` to run the various services.

You should now be able to navigate to http://localhost:8080 and view your site.

To stop the containers, run `docker compose down`.

## Libraries

Database access is abstracted using the Doctrine project's [Database Abstraction Layer](https://www.doctrine-project.org/projects/doctrine-dbal/en/current/reference/introduction.html#introduction).

Routing is provided by Nikic's [FastRoute](https://github.com/nikic/FastRoute).

The dependency injection container is provided by PHP DI's [php-di](https://php-di.org/doc/getting-started.html)
   lklkl