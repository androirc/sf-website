<?php

function androGenerateThumbnail($data, $tag = 'thumbnail="true"')
{
    preg_match_all('/<img[^>]+>/', $data, $img_tags);
    
    for ($i = 0 ; $i < count($img_tags[0]) ; $i++)
    {
        $img_tag = $img_tags[0][$i];
        
        $pos = strpos($img_tag, $tag);
        
        if (false === $pos) {
            continue;
        }
        
        $new_tag = str_replace($tag, '', $img_tag);
        $new_tag = preg_replace('/src="([^"]+)"/', 'src="/image/thumbnail/$1"', $new_tag);
        
        $data = str_replace($img_tag, $new_tag, $data);
    }
    
    return $data;
}