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

class betaActions extends androWebActions
{
    public function executeIndex(sfWebRequest $request)
    {
        $bt = BetaReleaseTable::getInstance();
        
        $this->beta = $bt->getLastBeta();
    }
    
    public function executeDownload(sfWebRequest $request)
    {
        $bt = BetaReleaseTable::getInstance();
        
        $beta = $bt->getLastBeta();
        $ip = $request->getHttpHeader('addr', 'remote');
        
        $this->forward404Unless($beta);
        
        $download = new BetaDownload();
        $location = new Location($ip);
        
        $download->setBetaRelease($beta);
        $download->setLocation($location->getLocation());
        
        $download->save();
        
        $file = sfConfig::get('sf_upload_dir') . '/betas/' . $beta->getFile();
        
        session_write_close();
        
        $this->getResponse()->setContentType('application/force-download');
        $this->getResponse()->setHttpHeader('Content-Disposition', 'attachment; filename="' . basename($file).'"');
        $this->getResponse()->setHttpHeader('Content-Transfer-Encoding', 'binary');
        $this->getResponse()->setHttpHeader('Content-Length', filesize($file));
        $this->getResponse()->setHttpHeader('Connection', 'close');
        
        $this->getResponse()->sendHttpHeaders();
        
        @readfile($file);
        
        throw new sfStopException();
    }
}
