init: docker-up app-init
start: docker-up queue-work
down: docker-down
test: app-tests
migrate: app-migrate


docker-up:
	docker-compose up -d

app-init:
	docker-compose exec php-fpm composer install
	docker-compose exec php-fpm php artisan key:generate
	docker-compose exec php-fpm php artisan cache:clear
	docker-compose exec php-fpm php artisan migrate
	docker-compose restart

queue-work:
	docker-compose exec php-fpm php artisan queue:work

docker-down:
	docker-compose down --remove-orphans

app-migrate:
	docker-compose exec php-fpm php artisan migrate --force

app-tests:
	docker-compose exec php-fpm php artisan test --stop-on-failure

permissions:
	sudo chown -R $$USER:www-data storage
	sudo chown -R $$USER:www-data bootstrap/cache
	chmod -R 775 storage
	chmod -R 775 bootstrap/cache
	chmod -R 777 storage/logs/
