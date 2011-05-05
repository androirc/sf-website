<?php

/**
 * BaseCrashReport
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $phone_model
 * @property string $android_version
 * @property string $thread_name
 * @property clob $error_message
 * @property clob $callstack
 * @property boolean $is_resolved
 * @property string $androirc_version
 * @property integer $count
 * 
 * @method integer     getId()               Returns the current record's "id" value
 * @method string      getPhoneModel()       Returns the current record's "phone_model" value
 * @method string      getAndroidVersion()   Returns the current record's "android_version" value
 * @method string      getThreadName()       Returns the current record's "thread_name" value
 * @method clob        getErrorMessage()     Returns the current record's "error_message" value
 * @method clob        getCallstack()        Returns the current record's "callstack" value
 * @method boolean     getIsResolved()       Returns the current record's "is_resolved" value
 * @method string      getAndroircVersion()  Returns the current record's "androirc_version" value
 * @method integer     getCount()            Returns the current record's "count" value
 * @method CrashReport setId()               Sets the current record's "id" value
 * @method CrashReport setPhoneModel()       Sets the current record's "phone_model" value
 * @method CrashReport setAndroidVersion()   Sets the current record's "android_version" value
 * @method CrashReport setThreadName()       Sets the current record's "thread_name" value
 * @method CrashReport setErrorMessage()     Sets the current record's "error_message" value
 * @method CrashReport setCallstack()        Sets the current record's "callstack" value
 * @method CrashReport setIsResolved()       Sets the current record's "is_resolved" value
 * @method CrashReport setAndroircVersion()  Sets the current record's "androirc_version" value
 * @method CrashReport setCount()            Sets the current record's "count" value
 * 
 * @package    androirc
 * @subpackage model
 * @author     MewT
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseCrashReport extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('androirc_crash_report');
        $this->hasColumn('id', 'integer', null, array(
             'type' => 'integer',
             'primary' => true,
             'autoincrement' => true,
             ));
        $this->hasColumn('phone_model', 'string', 200, array(
             'type' => 'string',
             'length' => 200,
             ));
        $this->hasColumn('android_version', 'string', 200, array(
             'type' => 'string',
             'length' => 200,
             ));
        $this->hasColumn('thread_name', 'string', 200, array(
             'type' => 'string',
             'length' => 200,
             ));
        $this->hasColumn('error_message', 'clob', null, array(
             'type' => 'clob',
             ));
        $this->hasColumn('callstack', 'clob', null, array(
             'type' => 'clob',
             ));
        $this->hasColumn('is_resolved', 'boolean', null, array(
             'type' => 'boolean',
             'default' => false,
             ));
        $this->hasColumn('androirc_version', 'string', 200, array(
             'type' => 'string',
             'length' => 200,
             ));
        $this->hasColumn('count', 'integer', null, array(
             'type' => 'integer',
             'default' => 1,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}