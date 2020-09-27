FROM webdevops/php-nginx-dev:7.4

ENV WEB_DOCUMENT_ROOT=/var/www/html/public
ENV XDEBUG_REMOTE_AUTOSTART=1
ENV XDEBUG_REMOTE_CONNECT_BACK=1
ENV XDEBUG_REMOTE_PORT=9000

COPY .docker/conf/supervisor/* /opt/docker/etc/supervisor.d/

COPY .docker/conf/nginx/vhost.conf /opt/docker/etc/nginx/vhost.conf
COPY .docker/conf/nginx/10-location-root.conf /opt/docker/etc/nginx/vhost.common.d/10-location-root.conf

WORKDIR /var/www/html

COPY --chown=www-data:www-data . .

RUN composer install
RUN usermod -a -G www-data application
RUN find . -type f -exec chmod 664 {} \;
RUN find . -type d -exec chmod 775 {} \;