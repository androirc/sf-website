<?php

function admob_request(sfWebRequest $request, sfWebResponse $response)
{
    $admob = new AdMob();
    
    $admob->setCookie($response, $request);
    
    return $admob->request($request);
}