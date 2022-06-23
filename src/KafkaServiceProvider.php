<?php

namespace M74asoud\KafkaQueue;

use Illuminate\Support\ServiceProvider;

class KafkaServiceProvider extends ServiceProvider
{

    public function register()
    {

        $this->mergeConfigFrom(
            __DIR__.'/queue.php', 'queue'
        );
    }


    public function boot()
    {
        $manager = $this->app['queue'];
        $manager->addConnector('kafka',function(){
            return new KafkaConnector;
        });
    }
}
