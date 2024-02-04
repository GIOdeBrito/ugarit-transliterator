#!/bin/sh

PROJECT='UGARIT TRANSLITERATOR'

echo "\nStarting project $PROJECT"

echo "\nBuilding docker image"
docker build -t php .

echo "\nRunning $PROJECT"
docker run -p 8080:80 php


