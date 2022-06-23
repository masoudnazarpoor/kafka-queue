# kafka-queue
laravel kafka queue driver

## Install
* First need to install [edenhill/librdkafka](https://github.com/edenhill/librdkafka.git)
```bash
    composer require m74asoud/kafka-queue
```
* add below to your .env file
```php
    KAFKA_QUEUE=###
    KAFKA_BOOTSTRAP_SERVERS=###
    KAFKA_SECURITY_PROTOCOL=###
    KAFKA_SASL_MECHANISMS=###
    KAFKA_SASL_USERNAME=###
    KAFKA_SASL_PASSWORD=###
    KAFKA_GROUP_ID=###
```
* then update QUEUE_CONNECTION to kafka in .env file
```php
    QUEUE_CONNECTION=kafka
```
