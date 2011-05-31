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

class contactActions extends androWebActions
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
                
                $text = <<<EOF
Bonjour,
{$datas['name']} vient d'utiliser le formulaire du site web.
                
    Son adresse IP :   {$user_ip}
    Son host :         {$user_host}
    
Voici son message :
    
    {$datas['message']}
    
--
AndroIRC
    
EOF;
                
                $message = $this->getMailer()->compose(
                    array('noreply@androirc.com' => 'AndroIRC'),
                    'contact@androirc.com',
                    '[Contact] Nouveau message du site web',
                    $text
                );
                
                $message->setReplyTo($datas['email']);
                
                $this->getMailer()->send($message);
                
                $this->getUser()->setFlash('notice', 'Your message has been sent!');
                
                $this->form = new ContactForm();
            }
        }
    }
}
