docker-compose up
docker-compose exec check composer install

http://0.0.0.0:8000/ - main application
http://0.0.0.0:8080/ - adminer



server: db-mysql
username: root
password: root
db: check

