#!/usr/bin/env bash

SHA=$(git rev-parse --verify HEAD --short)

# Push container to dockerhub registry
docker push sameg14/kubernetes-example-php-app:${SHA}