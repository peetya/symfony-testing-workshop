# Testing Workshop

## Requirements
```bash
composer install
```

## Run tests
```bash
composer run test                      # run all tests 
composer run test:coverage             # run all tests with coverage report
composer run test:unit                 # run unit tests
composer run test:unit:coverage        # run unit tests with coverage report
composer run test:integration          # run integration tests
composer run test:integration:coverage # run integration tests with coverage report
composer run test:functional           # run functional tests
composer run test:functional:coverage  # run functional tests with coverage report
```

Coverage report is available in `./var/coverage` directory.

## Run CLI
```bash
bin/console  app:combat:simulate
```

## Run Endpoint
```bash
php -S 0.0.0.0:8888 -t public
curl http://localhost:8888/combat/simulate
```
