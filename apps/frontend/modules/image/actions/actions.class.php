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
    public function executeThumbnail(sfWebRequest $request)
    {
        $sizes = array(
            'web' => 400,
            'mobile' => 200
        );

        $image = $request->getParameter('image');

        $this->forward404Unless($image);

        $path = sfConfig::get('sf_upload_dir') . '/images/' .$image;

        if (! file_exists($path))
            $this->forward404();

        $format = (null === $request->getRequestFormat()) ? 'web' : $request->getRequestFormat();

        $max_size = sfConfig::get('app_max_thumbnail_size_' . $format, $sizes[$format]);

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
