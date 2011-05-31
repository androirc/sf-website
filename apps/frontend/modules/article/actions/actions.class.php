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

class articleActions extends sfActions
{
    public function executeIndex(sfWebRequest $request)
    {
        $this->articles = Doctrine::getTable('Article')->getLastArticles();
    }

    public function executeShow(sfWebRequest $request)
    {
        $this->article = Doctrine_Core::getTable('Article')->find(array($request->getParameter('id')));
        
        $this->forward404Unless($this->article);

        sfProjectConfiguration::getActive()->loadHelpers(array('Text'));

        $content = strip_tags($this->article->getContent());

        $content = str_replace("\n", " ", $content);
        $content = str_replace("\r", " ", $content);

        $this->getResponse()->addMeta('description', truncate_text($content, 200));

        $this->getResponse()->addMeta('title', $this->article->getTitle() . " - AndroIRC (Android IRC Client)");
    }
}
