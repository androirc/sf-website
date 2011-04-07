<?php

/**
 * article actions.
 *
 * @package    androirc
 * @subpackage article
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class articleActions extends sfActions
{
    public function executeIndex(sfWebRequest $request)
    {
        $this->articles = Doctrine::getTable('Article')->getLastArticles();
    }

  public function executeShow(sfWebRequest $request)
  {
    $this->a = Doctrine_Core::getTable('Article')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->a);
    
    sfProjectConfiguration::getActive()->loadHelpers(array('Text'));
    
    $content = strip_tags($this->a->getContent());
    
    $content = str_replace("\n", " ", $content);
    $content = str_replace("\r", " ", $content);
    
    $this->getResponse()->addMeta('description', truncate_text($content, 200));
    
    $this->getResponse()->addMeta('title', $this->a->getTitle() . " - AndroIRC (Android IRC Client)");
  }
}
