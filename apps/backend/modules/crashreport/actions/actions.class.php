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

require_once dirname(__FILE__).'/../lib/crashreportGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/crashreportGeneratorHelper.class.php';

class crashreportActions extends autoCrashreportActions
{    
    public function executeNew(sfWebRequest $request)
    {
        $this->redirect('crashreport/index');
    }
    
    public function executeListResolved(sfWebRequest $request)
    {
        $crashreport = $this->getRoute()->getObject();
        
        $crashreport->setIsResolved(true);
        $crashreport->save();
        
        $this->getUser()->setFlash('notice', 'The selected crashreport has been resolved successfully.');
        
        $this->redirect('crashreport/index');
    }
    
    public function executeListDeleteAll(sfWebRequest $request)
    {
        $crt = CrashReportTable::getInstance();
        
        $nb = $crt->deleteAll();
        
        if ($nb)
        {
            $this->getUser()->setFlash('notice', sprintf('%d crashs have been deleted successfully.', $nb));
        }
        else
        {
            $this->getUser()->setFlash('notice', 'No crash to delete.');
        }
        
        $this->redirect('crashreport/index');
    }
}
