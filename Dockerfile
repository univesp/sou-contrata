FROM alpine:3.6
COPY . /var/www/autores
RUN chmod -R 777 /var/www/autores/storage && \
	chmod -R 777 /var/www/autores/bootstrap/cache
WORKDIR /var/www
RUN chown -R www-data:www-data /var/www
