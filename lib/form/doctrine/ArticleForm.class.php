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

class ArticleForm extends BaseArticleForm
{
    public function configure()
    {
        $this->widgetSchema['sf_guard_user_id'] = new sfWidgetFormInputHidden();
  
        unset($this['created_at'], $this['updated_at']);
    }
}
