<?php

/**
 * BaseChangeLog
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $version
 * @property string $file
 * 
 * @method integer   getId()      Returns the current record's "id" value
 * @method string    getVersion() Returns the current record's "version" value
 * @method string    getFile()    Returns the current record's "file" value
 * @method ChangeLog setId()      Sets the current record's "id" value
 * @method ChangeLog setVersion() Sets the current record's "version" value
 * @method ChangeLog setFile()    Sets the current record's "file" value
 * 
 * @package    androirc
 * @subpackage model
 * @author     MewT
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseChangeLog extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('androirc_changelog');
        $this->hasColumn('id', 'integer', null, array(
             'type' => 'integer',
             'primary' => true,
             'autoincrement' => true,
             ));
        $this->hasColumn('version', 'string', 50, array(
             'type' => 'string',
             'length' => 50,
             ));
        $this->hasColumn('file', 'string', 75, array(
             'type' => 'string',
             'length' => 75,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}