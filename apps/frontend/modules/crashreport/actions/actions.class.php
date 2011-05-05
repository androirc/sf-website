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

class crashreportActions extends sfActions
{
    public function executeIndex(sfWebRequest $request)
    {        
        $phoneModel = $request->getParameter('phone_model');
        $androidVersion = $request->getParameter('android_version');
        $threadName = $request->getParameter('thread_name');
        $errorMessage = $request->getParameter('error_message');
        $callstack = $request->getParameter('callstack');
        $androircVersion = $request->getParameter('version', 'Unknown');
           
        if (preg_match('#sdk#', $phoneModel)) {
            return sfView::NONE;
        }
        
        $cr = new CrashReport();
        
        $cr->setPhoneModel($phoneModel);
        $cr->setAndroidVersion($androidVersion);
        $cr->setThreadName($threadName);
        $cr->setErrorMessage($errorMessage);
        $cr->setCallstack($callstack);
        $cr->setAndroircVersion($androircVersion);
        
        $crt = CrashReportTable::getInstance();
        
        $tmp = $crt->alreadyExist($cr);
        
        if (false !== $tmp) {
            $tmp->incCount();
            $tmp->save();
            return sfView::NONE;
        }
        
        $cr->save();
        
        $text = <<<EOF
Nouveau rapport de crash :
    
    Phone model :        {$cr->getPhoneModel()}
    Android version :    {$cr->getAndroidVersion()}
    Thread name :        {$cr->getThreadName()}
    Error Message :      {$cr->getErrorMessage()}
    AndroIRC version :   {$cr->getAndroircVersion()}
    Callstack :
    
    {$cr->getCallstack()}
        
Vous pouvez supprimer simplement ce rapport dans le backend du site, rubrique "Crashreport"
--
AndroIRC

EOF;
    
        $message = $this->getMailer()->compose(
            array('noreply@androirc.com' => 'AndroIRC'),
            'crash@androirc.com',
            '[Crash] Rapport de crash #' . $cr->getId()  . ' (' . $cr->getAndroircVersion() . ')',
            $text
        );
        
        $this->getMailer()->send($message);
        
        return sfView::NONE;
    }
}
