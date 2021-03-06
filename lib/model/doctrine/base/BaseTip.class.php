<?php

/**
 * BaseTip
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property enum $language
 * @property clob $content
 * 
 * @method integer getId()       Returns the current record's "id" value
 * @method enum    getLanguage() Returns the current record's "language" value
 * @method clob    getContent()  Returns the current record's "content" value
 * @method Tip     setId()       Sets the current record's "id" value
 * @method Tip     setLanguage() Sets the current record's "language" value
 * @method Tip     setContent()  Sets the current record's "content" value
 * 
 * @package    androirc
 * @subpackage model
 * @author     MewT
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseTip extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('androirc_tip');
        $this->hasColumn('id', 'integer', null, array(
             'type' => 'integer',
             'primary' => true,
             'autoincrement' => true,
             ));
        $this->hasColumn('language', 'enum', null, array(
             'type' => 'enum',
             'values' => 
             array(
              0 => 'fr',
              1 => 'en',
             ),
             ));
        $this->hasColumn('content', 'clob', null, array(
             'type' => 'clob',
             'notnull' => true,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        
    }
}