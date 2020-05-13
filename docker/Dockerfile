FROM ubuntu:18.04
RUN set -eux;
RUN apt-get update -y
RUN ln -fs /usr/share/zoneinfo/America/Sao_Paulo /etc/localtime
RUN apt-get install -y tzdata
RUN dpkg-reconfigure --frontend noninteractive tzdata
RUN apt-get install php -y
RUN apt-get install php-mysql -y
RUN apt-get install apache2 -y
RUN apt-get install apache2-utils -y
RUN service apache2 start
RUN mkdir -p /run/php && \
    chown -R www-data:www-data /var/www/html && \
    chown -R www-data:www-data /run/php
RUN apt-get clean
RUN rm -rf /var/lib/apt/lists/*
# Volume configuration
VOLUME ["/var/www/html"]
EXPOSE 80 443
CMD ["apache2ctl", "-D", "FOREGROUND"]