<?php

namespace M74asoud\KafkaQueue;

use Illuminate\Queue\Queue;
use Illuminate\Contracts\Queue\Queue as QueueContract;


class KafkaQueue extends Queue implements QueueContract
{

    public function __construct(
        protected \RdKafka\Producer      $producer,
        protected \RdKafka\KafkaConsumer $consumer,
        protected array                  $config = []
    )
    {
    }

    public function size($queue = null)
    {
    }

    public function push($job, $data = '', $queue = null)
    {
        $topic = $this->producer->newTopic($queue ?? $this->config['queue']);
        $topic->produce(RD_KAFKA_PARTITION_UA, 0, serialize($job));
        $this->producer->flush($this->config['produce_flush_time']);
    }

    public function pushOn($queue, $job, $data = '')
    {
    }

    public function pushRaw($payload, $queue = null, array $options = [])
    {
    }

    public function later($delay, $job, $data = '', $queue = null)
    {
    }


    public function pop($queue = null)
    {
        $this->consumer->subscribe([$queue]);
        $message = $this->consumer->consume($this->config['consume_time']);

        try {
            switch ($message->err) {
                case RD_KAFKA_RESP_ERR_NO_ERROR:
                    $job = unserialize($message->payload);
                    $job->handle();
                    break;
                case RD_KAFKA_RESP_ERR__PARTITION_EOF:
                    var_dump("No more messages; will wait for more\n");
                    break;
                case RD_KAFKA_RESP_ERR__TIMED_OUT:
                    var_dump("Timed out\n");
                    break;
                default:
                    var_dump('error' . $message->err . "\n");
                    throw new \Exception($message->errstr(), $message->err);
                    break;
            }
        } catch (\Exception $err) {
            var_dump($err->getMessage());
        }
    }

}
