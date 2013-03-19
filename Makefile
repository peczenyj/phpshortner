PHPUNIT=php ./vendor/bin/phpunit
COMPOSER_FLAGS=--dev

all: composer-install test

composer-install: composer.phar
	php composer.phar $(COMPOSER_FLAGS) install
	php composer.phar $(COMPOSER_FLAGS) update

composer.phar:
	curl -s -z composer.phar -o composer.phar http://getcomposer.org/composer.phar
  
test:
	$(PHPUNIT) --strict ./test

reset:
	./db/resetDB.sh
  
coverage:
	$(PHPUNIT) --strict --coverage-html=./coverage test

clean:
	rm -f composer.phar
	rm -Rf vendor/
	rm -Rf coverage/

.PHONY: all test coverage deploy