<?php

/*
 * This file is part of the AndroIRC website.
 *
 * (c) 2010-2011 Julien Brochet <mewt@androirc.com>
 * (c) 2010-2011 Sébastien Brochet <blinkseb@androirc.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

class contactActions extends sfActions
{
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
