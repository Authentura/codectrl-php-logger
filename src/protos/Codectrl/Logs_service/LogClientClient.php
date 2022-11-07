<?php
// GENERATED CODE -- DO NOT EDIT!

namespace Codectrl\Logs_service;

/**
 * LogClient is the service that needs to be implemented by log servers so they
 * can determine how the logs are stored when they are received by the server.
 * Loggers must only use this service as a client.
 */
class LogClientClient extends \Grpc\BaseStub {

    /**
     * @param string $hostname hostname
     * @param array $opts channel options
     * @param \Grpc\Channel $channel (optional) re-use channel object
     */
    public function __construct($hostname, $opts, $channel = null) {
        parent::__construct($hostname, $opts, $channel);
    }

    /**
     * Sends a single log. Should only be used in cases where log batching is not
     * possible or not determinable.
     * @param \Codectrl\Data\Log\Log $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function SendLog(\Codectrl\Data\Log\Log $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/codectrl.logs_service.LogClient/SendLog',
        $argument,
        ['\Codectrl\Logs_service\RequestResult', 'decode'],
        $metadata, $options);
    }

    /**
     * Sends a stream of logs. Should generally be preferred over `SendLog` as it
     * allows for batch sending of `Log`s and _should_ be more efficient on
     * resources.
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\ClientStreamingCall
     */
    public function SendLogs($metadata = [], $options = []) {
        return $this->_clientStreamRequest('/codectrl.logs_service.LogClient/SendLogs',
        ['\Codectrl\Logs_service\RequestResult','decode'],
        $metadata, $options);
    }

}
