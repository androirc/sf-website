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
                $datas = $request->getParameter('contact');
                
                $text = <<<EOF
{$datas['name']} used the web form to contact us :

{$datas['message']}    
--
AndroIRC
    
EOF;
                
                $message = $this->getMailer()->compose(
                    array('noreply@androirc.com' => 'AndroIRC'),
                    'contact@androirc.com',
                    "[AndroIRC] {$datas['name']} used the web form to contact us",
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
