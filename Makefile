dev development: # Install development dependencies
	@composer install --no-interaction
	@npm install && npm run dev

prod production: # Install production dependencies
	@composer install --no-dev --no-interaction --prefer-dist --optimize-autoloader
	@npm install --no-save && npm run production && npm prune --production

update upgrade: # Update dependencies
	@composer update && npm update && npm install
