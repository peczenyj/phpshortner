=My First Url Shortner=

This is a small rest url shortner, build on top Slim framework, NotORM and MySQL.

==Verbs==

PUT /add/url

add a new resource, return a json with id and long url, example

	bash $ curl -X PUT http://127.0.0.1/add/www.php.net

	{"id":"2","url":"www.php.net"}

GET /id

redirect to the long url, example:

	bash$ curl -vs http://127.0.0.1/2

	< HTTP/1.1 302 Found
	< Date: Tue, 19 Mar 2013 00:59:49 GMT
	< Server: Apache/2.2.22 (Unix) DAV/2 PHP/5.3.15 mod_jk/1.2.37 mod_ssl/2.2.22 OpenSSL/0.9.8r
	< X-Powered-By: PHP/5.3.15
	< Location: www.php.net
	< Content-Length: 0
	< Content-Type: text/html

==Dependencies

* Slim Framework (for rest support)
* NotORM (for database support)
* PHPUnit (for tests)

==Makefile==

This project has a small Makefile to run tests and reset the database

===Install Dependecies===

bash$ make composer-install

===Reset Database===

bash$ make reset

will run create and init tables scripts, in db/ directory

===Run Tests===

bash$ make test

run all tests in test/ directory

==TODO==

- administration panel
- DELETE id
- security token
- change id from integer to base64
- add memcached to cache results / NotORM_Cache_Memcache
