FROM alpine:3.6
COPY . /var/www/autores
RUN chmod -R 777 /var/www/autores/storage && \
	chmod -R 777 /var/www/autores/bootstrap/cache && \
    ln -s /var/www/autores/storage/app/public /var/www/autores/public/storage
WORKDIR /var/www
