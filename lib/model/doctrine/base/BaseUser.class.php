<?php

/**
 * BaseUser
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property Doctrine_Collection $Articles
 * 
 * @method integer             getId()       Returns the current record's "id" value
 * @method string              getUsername() Returns the current record's "username" value
 * @method string              getPassword() Returns the current record's "password" value
 * @method Doctrine_Collection getArticles() Returns the current record's "Articles" collection
 * @method User                setId()       Sets the current record's "id" value
 * @method User                setUsername() Sets the current record's "username" value
 * @method User                setPassword() Sets the current record's "password" value
 * @method User                setArticles() Sets the current record's "Articles" collection
 * 
 * @package    androirc
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseUser extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('user');
        $this->hasColumn('id', 'integer', null, array(
             'type' => 'integer',
             'primary' => true,
             'autoincrement' => true,
             ));
        $this->hasColumn('username', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
        $this->hasColumn('password', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('Article as Articles', array(
             'local' => 'id',
             'foreign' => 'user_id'));

        $timestampable0 = new Doctrine_Template_Timestampable(array(
             ));
        $this->actAs($timestampable0);
    }
}