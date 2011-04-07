<?php

/**
 * sfGuardUser
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    androirc
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class sfGuardUser extends PluginsfGuardUser
{
    public function __toString()
    {
        return ($this->getUsername() != null) ? $this->getUsername() : "Unknown";
        
    }
    
    public function getContactLink()
    {
        return "<a href='mailto:" . $this->getEmailAddress() . "'>" . $this->getUsername() . "</a>";
    }
}