<?php

function admob_request(sfWebRequest $request, sfWebResponse $response)
{
    $admob = new AdMob($request, $response);
    
    $admob->setCookie();
    
    return $admob->request();
}