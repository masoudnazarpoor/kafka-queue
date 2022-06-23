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
* update QUEUE_CONNECTION to kafka in .env file
```php
    QUEUE_CONNECTION=kafka
```
* then add below config to config/queue.php connections
```php
    'kafka' => [
        'driver' => 'kafka',
        'queue' => env('KAFKA_QUEUE', 'default'),
        'bootstrap_servers' => env('KAFKA_BOOTSTRAP_SERVERS'),
        'security_protocol' => env('KAFKA_SECURITY_PROTOCOL'),
        'sasl_mechanisms' => env('KAFKA_SASL_MECHANISMS'),
        'sasl_username' => env('KAFKA_SASL_USERNAME'),
        'sasl_password' => env('KAFKA_SASL_PASSWORD'),
        'group_id' => env('KAFKA_GROUP_ID'),
        'produce_flush_time' => env('KAFKA_PRODUCER_FLUSH_TIME', 120 * 1000),
        'consume_time' => env('KAFKA_CONSUMER_TIME', 120 * 1000),
    ],
```
