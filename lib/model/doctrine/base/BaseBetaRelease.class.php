<?php

/**
 * BaseBetaRelease
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $version
 * @property boolean $is_downloadable
 * @property string $path
 * @property Doctrine_Collection $Downloads
 * 
 * @method integer             getId()              Returns the current record's "id" value
 * @method string              getVersion()         Returns the current record's "version" value
 * @method boolean             getIsDownloadable()  Returns the current record's "is_downloadable" value
 * @method string              getPath()            Returns the current record's "path" value
 * @method Doctrine_Collection getDownloads()       Returns the current record's "Downloads" collection
 * @method BetaRelease         setId()              Sets the current record's "id" value
 * @method BetaRelease         setVersion()         Sets the current record's "version" value
 * @method BetaRelease         setIsDownloadable()  Sets the current record's "is_downloadable" value
 * @method BetaRelease         setPath()            Sets the current record's "path" value
 * @method BetaRelease         setDownloads()       Sets the current record's "Downloads" collection
 * 
 * @package    androirc
 * @subpackage model
 * @author     MewT
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseBetaRelease extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('androirc_beta_release');
        $this->hasColumn('id', 'integer', null, array(
             'type' => 'integer',
             'primary' => true,
             'autoincrement' => true,
             ));
        $this->hasColumn('version', 'string', 100, array(
             'type' => 'string',
             'length' => 100,
             ));
        $this->hasColumn('is_downloadable', 'boolean', null, array(
             'type' => 'boolean',
             'default' => true,
             ));
        $this->hasColumn('path', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('BetaDownload as Downloads', array(
             'local' => 'id',
             'foreign' => 'beta_release_id'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}