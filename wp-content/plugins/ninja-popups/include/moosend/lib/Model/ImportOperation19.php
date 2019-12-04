<?php
/**
 * ImportOperation19
 *
 * PHP version 5
 *
 * @category Class
 * @package  Swagger\Client
 * @author   Swaagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */

/**
 * Moosend API
 *
 * TODO: Add a description
 *
 * OpenAPI spec version: 1.0
 * 
 * Generated by: https://github.com/swagger-api/swagger-codegen.git
 *
 */

/**
 * NOTE: This class is auto generated by the swagger code generator program.
 * https://github.com/swagger-api/swagger-codegen
 * Do not edit the class manually.
 */

namespace Swagger\Client\Model;

use \ArrayAccess;

/**
 * ImportOperation19 Class Doc Comment
 *
 * @category    Class
 * @package     Swagger\Client
 * @author      Swagger Codegen team
 * @link        https://github.com/swagger-api/swagger-codegen
 */
class ImportOperation19 implements ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      * @var string
      */
    protected static $swaggerModelName = 'ImportOperation19';

    /**
      * Array of property to type mappings. Used for (de)serialization
      * @var string[]
      */
    protected static $swaggerTypes = [
        'completed_on' => 'string',
        'created_on' => 'string',
        'data_hash' => 'string',
        'email_notify' => 'string',
        'id' => 'double',
        'mappings' => 'string',
        'message' => 'string',
        'skip_new_members' => 'bool',
        'started_on' => 'string',
        'success' => 'bool',
        'total_duplicate' => 'double',
        'total_ignored' => 'double',
        'total_inserted' => 'double',
        'total_invalid' => 'double',
        'total_members' => 'double',
        'total_unsubscribed' => 'double',
        'total_updated' => 'double'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      * @var string[]
      */
    protected static $swaggerFormats = [
        'completed_on' => null,
        'created_on' => null,
        'data_hash' => null,
        'email_notify' => null,
        'id' => 'double',
        'mappings' => null,
        'message' => null,
        'skip_new_members' => null,
        'started_on' => null,
        'success' => null,
        'total_duplicate' => 'double',
        'total_ignored' => 'double',
        'total_inserted' => 'double',
        'total_invalid' => 'double',
        'total_members' => 'double',
        'total_unsubscribed' => 'double',
        'total_updated' => 'double'
    ];

    public static function swaggerTypes()
    {
        return self::$swaggerTypes;
    }

    public static function swaggerFormats()
    {
        return self::$swaggerFormats;
    }

    /**
     * Array of attributes where the key is the local name, and the value is the original name
     * @var string[]
     */
    protected static $attributeMap = [
        'completed_on' => 'CompletedOn',
        'created_on' => 'CreatedOn',
        'data_hash' => 'DataHash',
        'email_notify' => 'EmailNotify',
        'id' => 'ID',
        'mappings' => 'Mappings',
        'message' => 'Message',
        'skip_new_members' => 'SkipNewMembers',
        'started_on' => 'StartedOn',
        'success' => 'Success',
        'total_duplicate' => 'TotalDuplicate',
        'total_ignored' => 'TotalIgnored',
        'total_inserted' => 'TotalInserted',
        'total_invalid' => 'TotalInvalid',
        'total_members' => 'TotalMembers',
        'total_unsubscribed' => 'TotalUnsubscribed',
        'total_updated' => 'TotalUpdated'
    ];


    /**
     * Array of attributes to setter functions (for deserialization of responses)
     * @var string[]
     */
    protected static $setters = [
        'completed_on' => 'setCompletedOn',
        'created_on' => 'setCreatedOn',
        'data_hash' => 'setDataHash',
        'email_notify' => 'setEmailNotify',
        'id' => 'setId',
        'mappings' => 'setMappings',
        'message' => 'setMessage',
        'skip_new_members' => 'setSkipNewMembers',
        'started_on' => 'setStartedOn',
        'success' => 'setSuccess',
        'total_duplicate' => 'setTotalDuplicate',
        'total_ignored' => 'setTotalIgnored',
        'total_inserted' => 'setTotalInserted',
        'total_invalid' => 'setTotalInvalid',
        'total_members' => 'setTotalMembers',
        'total_unsubscribed' => 'setTotalUnsubscribed',
        'total_updated' => 'setTotalUpdated'
    ];


    /**
     * Array of attributes to getter functions (for serialization of requests)
     * @var string[]
     */
    protected static $getters = [
        'completed_on' => 'getCompletedOn',
        'created_on' => 'getCreatedOn',
        'data_hash' => 'getDataHash',
        'email_notify' => 'getEmailNotify',
        'id' => 'getId',
        'mappings' => 'getMappings',
        'message' => 'getMessage',
        'skip_new_members' => 'getSkipNewMembers',
        'started_on' => 'getStartedOn',
        'success' => 'getSuccess',
        'total_duplicate' => 'getTotalDuplicate',
        'total_ignored' => 'getTotalIgnored',
        'total_inserted' => 'getTotalInserted',
        'total_invalid' => 'getTotalInvalid',
        'total_members' => 'getTotalMembers',
        'total_unsubscribed' => 'getTotalUnsubscribed',
        'total_updated' => 'getTotalUpdated'
    ];

    public static function attributeMap()
    {
        return self::$attributeMap;
    }

    public static function setters()
    {
        return self::$setters;
    }

    public static function getters()
    {
        return self::$getters;
    }

    

    

    /**
     * Associative array for storing property values
     * @var mixed[]
     */
    protected $container = [];

    /**
     * Constructor
     * @param mixed[] $data Associated array of property values initializing the model
     */
    public function __construct(array $data = null)
    {
        $this->container['completed_on'] = isset($data['completed_on']) ? $data['completed_on'] : null;
        $this->container['created_on'] = isset($data['created_on']) ? $data['created_on'] : null;
        $this->container['data_hash'] = isset($data['data_hash']) ? $data['data_hash'] : null;
        $this->container['email_notify'] = isset($data['email_notify']) ? $data['email_notify'] : null;
        $this->container['id'] = isset($data['id']) ? $data['id'] : null;
        $this->container['mappings'] = isset($data['mappings']) ? $data['mappings'] : null;
        $this->container['message'] = isset($data['message']) ? $data['message'] : null;
        $this->container['skip_new_members'] = isset($data['skip_new_members']) ? $data['skip_new_members'] : null;
        $this->container['started_on'] = isset($data['started_on']) ? $data['started_on'] : null;
        $this->container['success'] = isset($data['success']) ? $data['success'] : null;
        $this->container['total_duplicate'] = isset($data['total_duplicate']) ? $data['total_duplicate'] : null;
        $this->container['total_ignored'] = isset($data['total_ignored']) ? $data['total_ignored'] : null;
        $this->container['total_inserted'] = isset($data['total_inserted']) ? $data['total_inserted'] : null;
        $this->container['total_invalid'] = isset($data['total_invalid']) ? $data['total_invalid'] : null;
        $this->container['total_members'] = isset($data['total_members']) ? $data['total_members'] : null;
        $this->container['total_unsubscribed'] = isset($data['total_unsubscribed']) ? $data['total_unsubscribed'] : null;
        $this->container['total_updated'] = isset($data['total_updated']) ? $data['total_updated'] : null;
    }

    /**
     * show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalid_properties = [];

        return $invalid_properties;
    }

    /**
     * validate all the properties in the model
     * return true if all passed
     *
     * @return bool True if all properties are valid
     */
    public function valid()
    {

        return true;
    }


    /**
     * Gets completed_on
     * @return string
     */
    public function getCompletedOn()
    {
        return $this->container['completed_on'];
    }

    /**
     * Sets completed_on
     * @param string $completed_on 
     * @return $this
     */
    public function setCompletedOn($completed_on)
    {
        $this->container['completed_on'] = $completed_on;

        return $this;
    }

    /**
     * Gets created_on
     * @return string
     */
    public function getCreatedOn()
    {
        return $this->container['created_on'];
    }

    /**
     * Sets created_on
     * @param string $created_on 
     * @return $this
     */
    public function setCreatedOn($created_on)
    {
        $this->container['created_on'] = $created_on;

        return $this;
    }

    /**
     * Gets data_hash
     * @return string
     */
    public function getDataHash()
    {
        return $this->container['data_hash'];
    }

    /**
     * Sets data_hash
     * @param string $data_hash 
     * @return $this
     */
    public function setDataHash($data_hash)
    {
        $this->container['data_hash'] = $data_hash;

        return $this;
    }

    /**
     * Gets email_notify
     * @return string
     */
    public function getEmailNotify()
    {
        return $this->container['email_notify'];
    }

    /**
     * Sets email_notify
     * @param string $email_notify 
     * @return $this
     */
    public function setEmailNotify($email_notify)
    {
        $this->container['email_notify'] = $email_notify;

        return $this;
    }

    /**
     * Gets id
     * @return double
     */
    public function getId()
    {
        return $this->container['id'];
    }

    /**
     * Sets id
     * @param double $id 
     * @return $this
     */
    public function setId($id)
    {
        $this->container['id'] = $id;

        return $this;
    }

    /**
     * Gets mappings
     * @return string
     */
    public function getMappings()
    {
        return $this->container['mappings'];
    }

    /**
     * Sets mappings
     * @param string $mappings 
     * @return $this
     */
    public function setMappings($mappings)
    {
        $this->container['mappings'] = $mappings;

        return $this;
    }

    /**
     * Gets message
     * @return string
     */
    public function getMessage()
    {
        return $this->container['message'];
    }

    /**
     * Sets message
     * @param string $message 
     * @return $this
     */
    public function setMessage($message)
    {
        $this->container['message'] = $message;

        return $this;
    }

    /**
     * Gets skip_new_members
     * @return bool
     */
    public function getSkipNewMembers()
    {
        return $this->container['skip_new_members'];
    }

    /**
     * Sets skip_new_members
     * @param bool $skip_new_members 
     * @return $this
     */
    public function setSkipNewMembers($skip_new_members)
    {
        $this->container['skip_new_members'] = $skip_new_members;

        return $this;
    }

    /**
     * Gets started_on
     * @return string
     */
    public function getStartedOn()
    {
        return $this->container['started_on'];
    }

    /**
     * Sets started_on
     * @param string $started_on 
     * @return $this
     */
    public function setStartedOn($started_on)
    {
        $this->container['started_on'] = $started_on;

        return $this;
    }

    /**
     * Gets success
     * @return bool
     */
    public function getSuccess()
    {
        return $this->container['success'];
    }

    /**
     * Sets success
     * @param bool $success 
     * @return $this
     */
    public function setSuccess($success)
    {
        $this->container['success'] = $success;

        return $this;
    }

    /**
     * Gets total_duplicate
     * @return double
     */
    public function getTotalDuplicate()
    {
        return $this->container['total_duplicate'];
    }

    /**
     * Sets total_duplicate
     * @param double $total_duplicate 
     * @return $this
     */
    public function setTotalDuplicate($total_duplicate)
    {
        $this->container['total_duplicate'] = $total_duplicate;

        return $this;
    }

    /**
     * Gets total_ignored
     * @return double
     */
    public function getTotalIgnored()
    {
        return $this->container['total_ignored'];
    }

    /**
     * Sets total_ignored
     * @param double $total_ignored 
     * @return $this
     */
    public function setTotalIgnored($total_ignored)
    {
        $this->container['total_ignored'] = $total_ignored;

        return $this;
    }

    /**
     * Gets total_inserted
     * @return double
     */
    public function getTotalInserted()
    {
        return $this->container['total_inserted'];
    }

    /**
     * Sets total_inserted
     * @param double $total_inserted 
     * @return $this
     */
    public function setTotalInserted($total_inserted)
    {
        $this->container['total_inserted'] = $total_inserted;

        return $this;
    }

    /**
     * Gets total_invalid
     * @return double
     */
    public function getTotalInvalid()
    {
        return $this->container['total_invalid'];
    }

    /**
     * Sets total_invalid
     * @param double $total_invalid 
     * @return $this
     */
    public function setTotalInvalid($total_invalid)
    {
        $this->container['total_invalid'] = $total_invalid;

        return $this;
    }

    /**
     * Gets total_members
     * @return double
     */
    public function getTotalMembers()
    {
        return $this->container['total_members'];
    }

    /**
     * Sets total_members
     * @param double $total_members 
     * @return $this
     */
    public function setTotalMembers($total_members)
    {
        $this->container['total_members'] = $total_members;

        return $this;
    }

    /**
     * Gets total_unsubscribed
     * @return double
     */
    public function getTotalUnsubscribed()
    {
        return $this->container['total_unsubscribed'];
    }

    /**
     * Sets total_unsubscribed
     * @param double $total_unsubscribed 
     * @return $this
     */
    public function setTotalUnsubscribed($total_unsubscribed)
    {
        $this->container['total_unsubscribed'] = $total_unsubscribed;

        return $this;
    }

    /**
     * Gets total_updated
     * @return double
     */
    public function getTotalUpdated()
    {
        return $this->container['total_updated'];
    }

    /**
     * Sets total_updated
     * @param double $total_updated 
     * @return $this
     */
    public function setTotalUpdated($total_updated)
    {
        $this->container['total_updated'] = $total_updated;

        return $this;
    }
    /**
     * Returns true if offset exists. False otherwise.
     * @param  integer $offset Offset
     * @return boolean
     */
    public function offsetExists($offset)
    {
        return isset($this->container[$offset]);
    }

    /**
     * Gets offset.
     * @param  integer $offset Offset
     * @return mixed
     */
    public function offsetGet($offset)
    {
        return isset($this->container[$offset]) ? $this->container[$offset] : null;
    }

    /**
     * Sets value based on offset.
     * @param  integer $offset Offset
     * @param  mixed   $value  Value to be set
     * @return void
     */
    public function offsetSet($offset, $value)
    {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    /**
     * Unsets offset.
     * @param  integer $offset Offset
     * @return void
     */
    public function offsetUnset($offset)
    {
        unset($this->container[$offset]);
    }

    /**
     * Gets the string presentation of the object
     * @return string
     */
    public function __toString()
    {
        if (defined('JSON_PRETTY_PRINT')) { // use JSON pretty print
            return json_encode(\Swagger\Client\ObjectSerializer::sanitizeForSerialization($this), JSON_PRETTY_PRINT);
        }

        return json_encode(\Swagger\Client\ObjectSerializer::sanitizeForSerialization($this));
    }
}


