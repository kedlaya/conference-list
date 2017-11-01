<?php
$site_url = Configure::read('site.home');
$site_name = Configure::read('site.name');

//$this->set('documentData', array('xmlns:atom' => 'http://www.w3.org/2005/Atom'));
/*
$this->set('channelData', array(
    'title' => __(Configure::read('site.name')." Announcements"),
    'link' => $this->Html->url('/', true),
    'description' => __("Upcoming meetings."),
    'language' => 'en-us',
    'atom:link' => array(
    		'attrib' => array(
			    'href' => Configure::read('site.home')."/conferences/index.rss",
	 		    'rel' => 'self',
			    'type' => 'application/rss+xml'
			    )
			 ),
));

echo "\n\n";
*/

echo $this->Ical->vcal_begin();
foreach ($conferences as $conference) {
  echo $this->Ical->vcal_event($conference['id'], 
                               $conference['start_date'], 
                               $conference['end_date'],
                               $conference['title'],
                               $conference['city'],
                               $conference['country'],
                               $conference['homepage'],
			       $site_url,
			       $site_name
                               );
}
echo $this->Ical->vcal_end();

?>