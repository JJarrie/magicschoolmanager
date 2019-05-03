FROM node:current-alpine

RUN apk add --no-cache su-exec && \
    addgroup bar && \
    adduser -D -h /home -s /bin/sh -G bar foo

COPY entrypoint.sh /entrypoint

ENTRYPOINT ["/entrypoint"]
