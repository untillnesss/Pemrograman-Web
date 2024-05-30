main:
	git pull
	docker compose up --build -d --force-recreate --remove-orphans
	# docker exec pemrograman_web-php bash -c "composer i"
	# docker exec pemrograman_web-php bash -c "php artisan storage:link"
	# docker exec pemrograman_web-php bash -c "php artisan migrate --seed"
	# docker exec pemrograman_web-php bash -c "php artisan optimize"
	# docker exec pemrograman_web-php bash -c "php artisan view:cache"

run-app-with-setup:
	cp ./src/.env.example ./src/.env
	docker compose build
	docker compose up -d
	docker exec php /bin/sh -c "composer install && chmod -R 777 storage && php artisan key:generate"

run-app-with-setup-db:
	cp ./src/.env.example ./src/.env
	docker compose build
	docker compose up -d
	docker exec php /bin/sh -c "composer install && chmod -R 777 storage && php artisan key:generate && php artisan migrate:fresh --seed"

run-app:
	docker compose up -d

kill-app:
	docker compose down

enter-nginx-container:
	docker exec -it nginx /bin/sh

enter-php-container:
	docker exec -it php /bin/sh

enter-mysql-container:
	docker exec -it mysql /bin/sh

flush-db:
	docker exec php /bin/sh -c "php artisan migrate:fresh"

flush-db-with-seeding:
	docker exec php /bin/sh -c "php artisan migrate:fresh --seed"