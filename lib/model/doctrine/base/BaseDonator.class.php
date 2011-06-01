<?php

/**
 * BaseDonator
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $name
 * @property float $amount
 * 
 * @method integer getId()     Returns the current record's "id" value
 * @method string  getName()   Returns the current record's "name" value
 * @method float   getAmount() Returns the current record's "amount" value
 * @method Donator setId()     Sets the current record's "id" value
 * @method Donator setName()   Sets the current record's "name" value
 * @method Donator setAmount() Sets the current record's "amount" value
 * 
 * @package    androirc
 * @subpackage model
 * @author     MewT
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseDonator extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('androirc_donator');
        $this->hasColumn('id', 'integer', null, array(
             'type' => 'integer',
             'primary' => true,
             'autoincrement' => true,
             ));
        $this->hasColumn('name', 'string', 200, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 200,
             ));
        $this->hasColumn('amount', 'float', null, array(
             'type' => 'float',
             'notnull' => true,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}