<?php
return [
    'connections' => [
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
    ],
];
