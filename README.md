Kubernetes Symfony Example
--------------------------

A simple Symfony app that has been containerized and runs within kubernetes as a `Deployment` backed by a `Service`. 

This service presupposes the existence of a kubernetes cluster running in the cloud that supports `LoadBalancer` and `kubectl` installed and configured on your local machine. 


### Run app locally
`composer install`

`./bin/console server:run`

Then visit [http://localhost:8000](http://localhost:8000)


### Build image

`docker build -t sameg14/kubernetes-example-php-app:latest .` 

### Push newly built image 
`docker push sameg14/kubernetes-example-php-app:latest`

### Deploy kubernetes app
`kubectl apply -f kubernetes/app.yaml`

### Delete kubernetes app 
`kubectl delete -f kubernetes/app.yaml`
