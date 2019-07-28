#!/bin/sh

SHA=$(git rev-parse --verify HEAD --short)
IMAGE="docker.io/sameg14/kubernetes-example-php-app:${SHA}"

docker build -t ${IMAGE} .
docker push ${IMAGE}
kubectl -n stag set image deployment/kube-php kube-php="${IMAGE}"
kubectl -n stag rollout status deployment.v1.apps/kube-php --watch