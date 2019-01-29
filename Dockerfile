FROM alpine:3.6
COPY . /var/www/autores
RUN chmod -R 777 /var/www/autores/storage && \
	chmod -R 777 /var/www/autores/bootstrap/cache
WORKDIR /var/www
