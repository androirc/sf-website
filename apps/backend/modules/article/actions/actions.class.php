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

require_once dirname(__FILE__).'/../lib/articleGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/articleGeneratorHelper.class.php';

class articleActions extends autoArticleActions
{
    protected function processForm(sfWebRequest $request, sfForm $form)
    {
        $formParam = $request->getParameter($form->getName());

        if ($form->isNew()) {
            $formParam['sf_guard_user_id'] = $this->getUser()->getGuardUser()->getId();
            $request->setParameter($form->getName(), $formParam);
        }

        return parent::processForm($request, $form);
    }
}
