<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: log.proto

namespace Codectrl\Data\Log;


use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Main log message for use when sending to a CodeCtrl gRPC server.
 *
 * Generated from protobuf message <code>codectrl.data.log.Log</code>
 */
class Log extends \Google\Protobuf\Internal\Message
{
    /**
     * NOTE: This field should be generated by CodeCtrl gRPC servers, any value
     * assigned to it by loggers will be overwritten. Therefore, leave it as a
     * blank.
     *
     * Generated from protobuf field <code>string uuid = 1;</code>
     */
    protected $uuid = '';
    /**
     * Generated from protobuf field <code>repeated .codectrl.data.backtrace_data.BacktraceData stack = 2;</code>
     */
    private $stack;
    /**
     * Generated from protobuf field <code>uint32 lineNumber = 3;</code>
     */
    protected $lineNumber = 0;
    /**
     * Generated from protobuf field <code>map<uint32, string> codeSnippet = 4;</code>
     */
    private $codeSnippet;
    /**
     * Generated from protobuf field <code>string message = 5;</code>
     */
    protected $message = '';
    /**
     * Generated from protobuf field <code>string messageType = 6;</code>
     */
    protected $messageType = '';
    /**
     * Generated from protobuf field <code>string fileName = 7;</code>
     */
    protected $fileName = '';
    /**
     * NOTE: This field should be generated by CodeCtrl gRPC servers, any value
     * assigned to it by loggers will be overwritten. Therefore, leave it as a
     * blank.
     *
     * Generated from protobuf field <code>string address = 8;</code>
     */
    protected $address = '';
    /**
     * Generated from protobuf field <code>string language = 9;</code>
     */
    protected $language = '';
    /**
     * Generated from protobuf field <code>repeated string warnings = 10;</code>
     */
    private $warnings;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $uuid
     *           NOTE: This field should be generated by CodeCtrl gRPC servers, any value
     *           assigned to it by loggers will be overwritten. Therefore, leave it as a
     *           blank.
     *     @type array<\Codectrl\Data\Backtrace_data\BacktraceData>|\Google\Protobuf\Internal\RepeatedField $stack
     *     @type int $lineNumber
     *     @type array|\Google\Protobuf\Internal\MapField $codeSnippet
     *     @type string $message
     *     @type string $messageType
     *     @type string $fileName
     *     @type string $address
     *           NOTE: This field should be generated by CodeCtrl gRPC servers, any value
     *           assigned to it by loggers will be overwritten. Therefore, leave it as a
     *           blank.
     *     @type string $language
     *     @type array<string>|\Google\Protobuf\Internal\RepeatedField $warnings
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Log::initOnce();
        parent::__construct($data);
    }

    /**
     * NOTE: This field should be generated by CodeCtrl gRPC servers, any value
     * assigned to it by loggers will be overwritten. Therefore, leave it as a
     * blank.
     *
     * Generated from protobuf field <code>string uuid = 1;</code>
     * @return string
     */
    public function getUuid()
    {
        return $this->uuid;
    }

    /**
     * NOTE: This field should be generated by CodeCtrl gRPC servers, any value
     * assigned to it by loggers will be overwritten. Therefore, leave it as a
     * blank.
     *
     * Generated from protobuf field <code>string uuid = 1;</code>
     * @param string $var
     * @return $this
     */
    public function setUuid($var)
    {
        GPBUtil::checkString($var, True);
        $this->uuid = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>repeated .codectrl.data.backtrace_data.BacktraceData stack = 2;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getStack()
    {
        return $this->stack;
    }

    /**
     * Generated from protobuf field <code>repeated .codectrl.data.backtrace_data.BacktraceData stack = 2;</code>
     * @param array<\Codectrl\Data\Backtrace_data\BacktraceData>|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setStack($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::MESSAGE, \Codectrl\Data\Backtrace_data\BacktraceData::class);
        $this->stack = $arr;

        return $this;
    }

    /**
     * Generated from protobuf field <code>uint32 lineNumber = 3;</code>
     * @return int
     */
    public function getLineNumber()
    {
        return $this->lineNumber;
    }

    /**
     * Generated from protobuf field <code>uint32 lineNumber = 3;</code>
     * @param int $var
     * @return $this
     */
    public function setLineNumber($var)
    {
        GPBUtil::checkUint32($var);
        $this->lineNumber = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>map<uint32, string> codeSnippet = 4;</code>
     * @return \Google\Protobuf\Internal\MapField
     */
    public function getCodeSnippet()
    {
        return $this->codeSnippet;
    }

    /**
     * Generated from protobuf field <code>map<uint32, string> codeSnippet = 4;</code>
     * @param array|\Google\Protobuf\Internal\MapField $var
     * @return $this
     */
    public function setCodeSnippet($var)
    {
        $arr = GPBUtil::checkMapField($var, \Google\Protobuf\Internal\GPBType::UINT32, \Google\Protobuf\Internal\GPBType::STRING);
        $this->codeSnippet = $arr;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string message = 5;</code>
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Generated from protobuf field <code>string message = 5;</code>
     * @param string $var
     * @return $this
     */
    public function setMessage($var)
    {
        GPBUtil::checkString($var, True);
        $this->message = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string messageType = 6;</code>
     * @return string
     */
    public function getMessageType()
    {
        return $this->messageType;
    }

    /**
     * Generated from protobuf field <code>string messageType = 6;</code>
     * @param string $var
     * @return $this
     */
    public function setMessageType($var)
    {
        GPBUtil::checkString($var, True);
        $this->messageType = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string fileName = 7;</code>
     * @return string
     */
    public function getFileName()
    {
        return $this->fileName;
    }

    /**
     * Generated from protobuf field <code>string fileName = 7;</code>
     * @param string $var
     * @return $this
     */
    public function setFileName($var)
    {
        GPBUtil::checkString($var, True);
        $this->fileName = $var;

        return $this;
    }

    /**
     * NOTE: This field should be generated by CodeCtrl gRPC servers, any value
     * assigned to it by loggers will be overwritten. Therefore, leave it as a
     * blank.
     *
     * Generated from protobuf field <code>string address = 8;</code>
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * NOTE: This field should be generated by CodeCtrl gRPC servers, any value
     * assigned to it by loggers will be overwritten. Therefore, leave it as a
     * blank.
     *
     * Generated from protobuf field <code>string address = 8;</code>
     * @param string $var
     * @return $this
     */
    public function setAddress($var)
    {
        GPBUtil::checkString($var, True);
        $this->address = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string language = 9;</code>
     * @return string
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * Generated from protobuf field <code>string language = 9;</code>
     * @param string $var
     * @return $this
     */
    public function setLanguage($var)
    {
        GPBUtil::checkString($var, True);
        $this->language = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>repeated string warnings = 10;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getWarnings()
    {
        return $this->warnings;
    }

    /**
     * Generated from protobuf field <code>repeated string warnings = 10;</code>
     * @param array<string>|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setWarnings($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::STRING);
        $this->warnings = $arr;

        return $this;
    }

}

