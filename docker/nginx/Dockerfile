FROM nginx:1.20

# drop symlinks
RUN unlink /var/log/nginx/access.log
RUN unlink /var/log/nginx/error.log

ADD default.conf /etc/nginx/conf.d/default.conf