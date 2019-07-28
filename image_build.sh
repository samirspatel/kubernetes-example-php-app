#!/usr/bin/env bash

SHA=$(git rev-parse --verify HEAD --short)

# Build container with tag (-t) and push to dockerhub registry
docker build -t sameg14/kubernetes-example-php-app:${SHA} .


