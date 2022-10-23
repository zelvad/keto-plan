analyse:
	./vendor/bin/phpstan analyse

fix:
	composer lint

fix-view:
	composer sniff

up:
	./vendor/bin/sail up

bash:
	./vendor/bin/sail bash

build-frontend:
	yarn install
	yarn prod

deploy-prod-local:
	composer install
	composer dump-autoload
	php artisan clear-compiled
	php artisan config:clear
	php artisan route:clear
	php artisan view:clear
	php artisan migrate

deploy-prod-backend:
	composer install --prefer-dist --no-scripts --no-dev -q -o
	composer dump-autoload
	php artisan clear-compiled
	php artisan config:cache
	php artisan route:cache
	php artisan view:cache
	php artisan storage:link
	php artisan queue:restart
	php artisan migrate --force
	php artisan nova:publish
	php artisan cache:clear
	php artisan responsecache:clear

deploy-prod:
	${MAKE} pull
	${MAKE} deploy-prod-backend
	${MAKE} build-frontend
