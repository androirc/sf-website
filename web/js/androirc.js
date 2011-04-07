
    
$(document).ready(function()
{
    var url='http://api.twitter.com/1/statuses/user_timeline/androirc.json?callback=?';
    var regexp = /((ftp|http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?)/gi;
    
    $.getJSON(url,function(tweet)
    {
        
		$("#last_tweet").html(tweet[0].text)    ;
	});
});