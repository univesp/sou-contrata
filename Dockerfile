FROM alpine:3.6
COPY . /var/www
RUN chmod -R 777 /var/www/storage && \
	chmod -R 777 /var/www/bootstrap/cache
WORKDIR /var/www
