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

class imageActions extends sfActions
{
    public function executeGet(sfWebRequest $request)
    {
        $image = $request->getParameter('image');
        
        $this->forward404Unless($image);
        
        $path = sfConfig::get('sf_upload_dir') . '/' .$image;
        
        if (! file_exists($path))
            $this->forward404();

        $is_mobile = $request->getRequestFormat() != null;
        if ($is_mobile)
            $max_size = sfConfig::get('app_max_thumbnail_size', 200);
        else
            $max_size = sfConfig::get('app_max_thumbnail_size', 400);

        try {
            $im = new Imagick($path);
            $im->thumbnailImage($max_size, $max_size, true);

            $response = $this->getResponse();
            $response->setHttpHeader('Content-Type', $im->getImageMimeType(), true);
            $response->sendHttpHeaders();
    
            echo $im;

        } catch(ImagickException $e) {
            $this->forward404();
        }
        
        return sfView::NONE;
    }
}
