FROM phusion/baseimage
CMD ["/sbin/my_init"]

# install php
RUN add-apt-repository ppa:ondrej/php && apt-get update
RUN apt-get install -y --allow-unauthenticated php7.1 php7.1-common php7.1-curl php7.1-xml php7.1-zip php7.1-gd php7.1-mysql php7.1-intl  \
php7.1-mbstring php7.1-fpm

# install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# install nginx
RUN apt-get install -y nginx && echo "\ndaemon off;" >> /etc/nginx/nginx.conf && unlink /etc/nginx/sites-enabled/default

RUN apt-get clean && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

ADD run/php-fpm.sh /etc/my_init.d/php-fpm.sh
ADD run/nginx.sh /etc/service/nginx/run

EXPOSE 80