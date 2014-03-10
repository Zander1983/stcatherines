<?php


    $context = $_GET['context'];
    $feed_domain = $_GET['feed_domain'];
    $photoset_id = $_GET['photoset_id'];
    $flickr_api_key = $_GET['flickr_api_key'];
    $flickr_user_id = $_GET['flickr_user_id'];   
    $gmail = $_GET['gmail'];

    $feeds["home"]  = '/index.php?option=com_ninjarsssyndicator&feed_id=3&format=raw';
    $feeds["news"]  = '/index.php?option=com_ninjarsssyndicator&feed_id=3&format=raw';
    $feeds['events'] = 'https://www.google.com/calendar/feeds/'.$gmail.'/public/full?orderby=starttime&sortorder=ascending&max-results=10&futureevents=true';
    $feeds["about-us"]  = '/index.php?option=com_ninjarsssyndicator&feed_id=9&format=raw';
    $feeds["courses"]  = '/index.php?option=com_ninjarsssyndicator&feed_id=5&format=raw';
    $feeds["sport"]  = '/index.php?option=com_ninjarsssyndicator&feed_id=6&format=raw';
    $feeds["music"]  = '/index.php?option=com_ninjarsssyndicator&feed_id=8&format=raw';
    $feeds["1st-yr-science"]  = '/index.php?option=com_ninjarsssyndicator&feed_id=10&format=raw';
    $feeds["2nd-yr-science"]  = '/index.php?option=com_ninjarsssyndicator&feed_id=11&format=raw';
    $feeds["3rd-yr-science"]  = '/index.php?option=com_ninjarsssyndicator&feed_id=12&format=raw';
    $feeds["transition-yr-physics"]  = '/index.php?option=com_ninjarsssyndicator&feed_id=13&format=raw';
    $feeds["4th-yr-physics"]  = '/index.php?option=com_ninjarsssyndicator&feed_id=15&format=raw';
    $feeds["5th-yr-physics"]  = '/index.php?option=com_ninjarsssyndicator&feed_id=16&format=raw';
    
    
    $feeds['albums']= 'http://api.flickr.com/services/rest/?method=flickr.photosets.getList&api_key='.$flickr_api_key.'&user_id='.$flickr_user_id;
    $feeds['photos'] = 'http://api.flickr.com/services/rest/?&method=flickr.photosets.getPhotos&api_key='.$flickr_api_key.'&user_id='.$flickr_user_id.'&extras=url_sq,url_t,url_s,url_m,url_o&photoset_id='.$photoset_id;
 
    if(!$context) $context = "home";
    
    $xml = file_get_contents($feed_domain.$feeds[$context]);    
    
    /*
    file_put_contents('/var/www/my_logs/xml.log', $xml);
    file_put_contents('/var/www/my_logs/link.log', $feed_domain.$feeds[$context]);
    file_put_contents('/var/www/my_logs/context.log', $context);
    */
    
    echo $xml;
    
    
    

