# How to start

1. Create .env file by example
1. `composer install`
2. `cd docker`
3. `make`
4. Go inside container: `docker exec -it taxsure bash`
5. Run migrations: `vendor/bin/doctrine-migrations migrate`
6. Ready to test

# How to make Requests

**Endpoint**: http://localhost:8080

## Resources

### Create customer

Resource: _/customers_  
Method: POST  
Payload: `{"firstName":"John", "secondName": "Smith", "dob": "1989-02-15", "taxClass": 1, "ssn": "123"}`


### Update customer

Resource: _/customers/1_  
Method: PUT  
Payload: `{"firstName":"Adam"}`


### Get customers

Resource: _/customers_  
Method: GET  

### Find specific customer

Resource: _/customers/1_  
Method: GET  
