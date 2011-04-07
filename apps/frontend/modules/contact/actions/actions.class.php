<?php

/**
 * contact actions.
 *
 * @package    androirc
 * @subpackage contact
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class contactActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
    public function executeIndex(sfWebRequest $request)
    {
        $this->form = new ContactForm();
    
        if ($request->isMethod('post'))
        {
            $this->form->bind($request->getParameter('contact'));
            
            if ($this->form->isValid())
            {
                $user_ip = $this->getRequest()->getHttpHeader ('addr','remote');
                $user_host = gethostbyaddr($user_ip);
                $datas = $request->getParameter('contact');
                
                // Envoie de l'email à contact@androirc.com
                
                $message = $this->getMailer()->compose(
                    array('noreply@androirc.com' => 'AndroIRC'),
                    'contact@androirc.com',
                    '[Contact] Nouveau message du site web',
                    <<<EOF
{$datas['name']} vient d'utiliser le formulaire du site web. Voici son message :
 
{$datas['message']}
 
Ses informations : Adresse IP : {$user_ip} - Host : {$user_host}
--
AndroIRC
EOF
                );
                
                $message->setReplyTo($datas['email']);
                
                $this->getMailer()->send($message);
                
                $this->getUser()->setFlash('notice', 'Your message has been sent!');
                
                $this->form = new ContactForm();
            }
        }
    }
}
