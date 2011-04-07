<?php
class AndroIRC
{
    public static function getLastTweet()
    {
        $username = 'androirc';    
        $format='xml';
        $tweet = simplexml_load_file("http://api.twitter.com/1/statuses/user_timeline/{$username}.{$format}");

        return $tweet->status[0]->text;
    }
}

?>
