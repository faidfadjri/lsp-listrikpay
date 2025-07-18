seed:
	php artisan db:seed --force
	@echo "Database seeded successfully."

migrate:
	php artisan migrate --seed --force
	@echo "Database migrated successfully."

test:
	php artisan test
	@echo "Tests executed successfully."

migrate-refresh:
	php artisan migrate:refresh --seed --force
	@echo "Database refreshed successfully."