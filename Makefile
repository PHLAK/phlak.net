dev development: # Install development dependencies
	@composer install --no-interaction
	@npm install && npm run dev

prod production: # Install production dependencies
	@composer install --no-dev --no-interaction --prefer-dist --optimize-autoloader
	@npm install --no-save && npm run production && npm prune --production

update upgrade: # Update application dependencies
	@composer update && npm update && npm install && npm audit fix

outdated: # Show outdated dependencies
	@composer show --direct --outdated && npm outdated

