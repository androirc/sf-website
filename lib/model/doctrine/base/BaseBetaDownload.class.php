<?php

/**
 * BaseBetaDownload
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $beta_release_id
 * @property string $location
 * @property BetaRelease $BetaRelease
 * 
 * @method integer      getId()              Returns the current record's "id" value
 * @method integer      getBetaReleaseId()   Returns the current record's "beta_release_id" value
 * @method string       getLocation()        Returns the current record's "location" value
 * @method BetaRelease  getBetaRelease()     Returns the current record's "BetaRelease" value
 * @method BetaDownload setId()              Sets the current record's "id" value
 * @method BetaDownload setBetaReleaseId()   Sets the current record's "beta_release_id" value
 * @method BetaDownload setLocation()        Sets the current record's "location" value
 * @method BetaDownload setBetaRelease()     Sets the current record's "BetaRelease" value
 * 
 * @package    androirc
 * @subpackage model
 * @author     MewT
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseBetaDownload extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('androirc_beta_download');
        $this->hasColumn('id', 'integer', null, array(
             'type' => 'integer',
             'primary' => true,
             'autoincrement' => true,
             ));
        $this->hasColumn('beta_release_id', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('location', 'string', 50, array(
             'type' => 'string',
             'length' => 50,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('BetaRelease', array(
             'local' => 'beta_release_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE',
             'onUpdate' => 'CASCADE'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}