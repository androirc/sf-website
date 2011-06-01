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

require_once dirname(__FILE__).'/../lib/imageGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/imageGeneratorHelper.class.php';

class imageActions extends autoImageActions
{
    protected function processForm(sfWebRequest $request, sfForm $form)
    {
        $params = $request->getParameter($form->getName());

        if ($form->isNew()) {
            $params['sf_guard_user_id'] = $this->getUser()->getGuardUser()->getId();
            $request->setParameter($form->getName(), $params);
        }

        return parent::processForm($request, $form);
    }
}
