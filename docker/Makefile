NS ?= frexin
VERSION ?= latest

IMAGE_NAME ?= mx-fs
CONTAINER_NAME ?= mx-fs
CONTAINER_INSTANCE ?= default

.PHONY: build start dtop rm

build:
	docker-compose build

start:
	docker-compose up -d

stop:
	docker-compose stop

rm:
	docker-compose rm -f

default: start
