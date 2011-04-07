<?php

require_once dirname(__FILE__).'/../lib/articleGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/articleGeneratorHelper.class.php';

/**
 * article actions.
 *
 * @package    androirc
 * @subpackage article
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class articleActions extends autoArticleActions
{
    protected function processForm(sfWebRequest $request, sfForm $form)
    {
        $formParam = $request->getParameter($form->getName());
        
        
        if ($form->isNew())
        {
        
            $formParam['sf_guard_user_id'] = $this->getUser()->getGuardUser()->getId();
            $request->setParameter($form->getName(), $formParam);
            /*
            // FB
            $facebook = new Facebook('eaf95f47f17d718b80b119d31a595701', '1ad5dd25d45a1ad85620d50d725ae433');
            
           // $facebook->api_client->stream_publish("test", NULL, NULL, 120342511371853);
            
            $facebook->api ( array(
    'method' => 'users.setStatus'
  , 'status' => 'salut'
  , 'uid'    => 120342511371853
) );*/
        }
            
        return parent::processForm($request, $form);
    }
}
