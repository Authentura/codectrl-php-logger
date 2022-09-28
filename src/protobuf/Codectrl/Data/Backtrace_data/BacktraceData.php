<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: backtrace_data.proto

namespace Codectrl\Data\Backtrace_data;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Generalised message containing information regarding a single stacktrace
 * item.
 *
 * Generated from protobuf message <code>codectrl.data.backtrace_data.BacktraceData</code>
 */
class BacktraceData extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>string name = 1;</code>
     */
    protected $name = '';
    /**
     * Generated from protobuf field <code>string filePath = 2;</code>
     */
    protected $filePath = '';
    /**
     * Generated from protobuf field <code>uint32 lineNumber = 3;</code>
     */
    protected $lineNumber = 0;
    /**
     * Generated from protobuf field <code>uint32 columnNumber = 4;</code>
     */
    protected $columnNumber = 0;
    /**
     * Generated from protobuf field <code>string code = 5;</code>
     */
    protected $code = '';

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $name
     *     @type string $filePath
     *     @type int $lineNumber
     *     @type int $columnNumber
     *     @type string $code
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\BacktraceData::initOnce();
        parent::__construct($data);
    }

    /**
     * Generated from protobuf field <code>string name = 1;</code>
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Generated from protobuf field <code>string name = 1;</code>
     * @param string $var
     * @return $this
     */
    public function setName($var)
    {
        GPBUtil::checkString($var, True);
        $this->name = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string filePath = 2;</code>
     * @return string
     */
    public function getFilePath()
    {
        return $this->filePath;
    }

    /**
     * Generated from protobuf field <code>string filePath = 2;</code>
     * @param string $var
     * @return $this
     */
    public function setFilePath($var)
    {
        GPBUtil::checkString($var, True);
        $this->filePath = $var;

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
     * Generated from protobuf field <code>uint32 columnNumber = 4;</code>
     * @return int
     */
    public function getColumnNumber()
    {
        return $this->columnNumber;
    }

    /**
     * Generated from protobuf field <code>uint32 columnNumber = 4;</code>
     * @param int $var
     * @return $this
     */
    public function setColumnNumber($var)
    {
        GPBUtil::checkUint32($var);
        $this->columnNumber = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string code = 5;</code>
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Generated from protobuf field <code>string code = 5;</code>
     * @param string $var
     * @return $this
     */
    public function setCode($var)
    {
        GPBUtil::checkString($var, True);
        $this->code = $var;

        return $this;
    }

}
