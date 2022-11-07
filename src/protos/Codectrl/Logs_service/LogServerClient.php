<?php
// GENERATED CODE -- DO NOT EDIT!

namespace Codectrl\Logs_service;

/**
 * LogServer is the service that should only be implemented by log servers that
 * can be connected to by a CodeCtrl front-end. Language loggers should not
 * implement this service or use it as a client for that matter. Ways of
 * enforcing that only servers can receive logs iS TBD but will be worked on in
 * the future.
 */
class LogServerClient extends \Grpc\BaseStub {

    /**
     * @param string $hostname hostname
     * @param array $opts channel options
     * @param \Grpc\Channel $channel (optional) re-use channel object
     */
    public function __construct($hostname, $opts, $channel = null) {
        parent::__construct($hostname, $opts, $channel);
    }

    /**
     * Gets the latest log from the server, generally not used but is here for
     * compatibiliy's sake in the case where a front-end cannot use a stream.
     * @param \Codectrl\Logs_service\Connection $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function GetLog(\Codectrl\Logs_service\Connection $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/codectrl.logs_service.LogServer/GetLog',
        $argument,
        ['\Codectrl\Data\Log\Log', 'decode'],
        $metadata, $options);
    }

    /**
     * Gets a stream of the available logs, this should be preferred over
     * `GetLog` when possible.
     * @param \Codectrl\Logs_service\Connection $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\ServerStreamingCall
     */
    public function GetLogs(\Codectrl\Logs_service\Connection $argument,
      $metadata = [], $options = []) {
        return $this->_serverStreamRequest('/codectrl.logs_service.LogServer/GetLogs',
        $argument,
        ['\Codectrl\Data\Log\Log', 'decode'],
        $metadata, $options);
    }

    /**
     * Gets the current details about the server.
     * @param \Google\Protobuf\GPBEmpty $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function GetServerDetails(\Google\Protobuf\GPBEmpty $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/codectrl.logs_service.LogServer/GetServerDetails',
        $argument,
        ['\Codectrl\Logs_service\ServerDetails', 'decode'],
        $metadata, $options);
    }

    /**
     * Registers a new front-end connection to a server instance and returns the
     * `Connection` message with a `uuid`.
     * @param \Google\Protobuf\GPBEmpty $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function RegisterClient(\Google\Protobuf\GPBEmpty $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/codectrl.logs_service.LogServer/RegisterClient',
        $argument,
        ['\Codectrl\Logs_service\Connection', 'decode'],
        $metadata, $options);
    }

    /**
     * Registers an already pre-existing connection to a server instance using an
     * already generated `uuid` supplied in the `Connection`. Servers should
     * verify that the supplied `uuid` is, in fact, a valid hyphenated v4 UUID.
     * Returns a boolean whether or not the registration was succesful.
     * @param \Codectrl\Logs_service\Connection $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function RegisterExistingClient(\Codectrl\Logs_service\Connection $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/codectrl.logs_service.LogServer/RegisterExistingClient',
        $argument,
        ['\Codectrl\Logs_service\RequestResult', 'decode'],
        $metadata, $options);
    }

}
