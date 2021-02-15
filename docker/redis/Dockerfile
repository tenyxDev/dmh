FROM redis:5.0.3-alpine

# Set timezone
#RUN rm /etc/localtime \
#    && ln -s /usr/share/zoneinfo/UTC /etc/localtime

# Redis conf
COPY redis.conf /usr/local/etc/redis/redis.conf

# Run redis-server with conf
CMD [ "redis-server", "/usr/local/etc/redis/redis.conf" ]
