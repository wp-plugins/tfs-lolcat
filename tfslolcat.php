<?php
/*
 * Plugin Name: TFS LOLcat
 * Version: 0.1
 * Plugin URI: 
 * Description: Based on Dougal Campbell's Pirate filter. (Requires <a href="http://dougal.gunters.org/blog/2004/08/30/text-filter-suite">TFS Core</a>)
 * Author: Dougal Campbell, Ben M
 * Author URI: http://ben.momillett.org/
 *
 * History:
 * 0.1 Initial LOLcats version
 * Use lolcat as the value for post_filter and comment_filter in the custom fields on the write page.
 */

// If you don't want this filter to automatically engage every year
// on July 7, set this to false:
$talk_like_a_lolcat = true;

function lolcat($content) {
	return filter_cdata_content($content,'lolcat_filter');
}

function lolcat_filter($content) {
	$content = $content[1];

	$patterns = array( 
			'/s\b/' => 'z',
			'%\bhas\b%' => 'haz',
			'%\bHas\b%' => 'Haz',
			'%\bhave\b%' => 'haz',
			'%\bHave\b%' => 'Haz',
			'%\bgot\b%' => 'gotz',
			'%\bGot\b%' => 'Gotz',
			'%\bof\b%' => 'ov',
			'%\bOf\b%' => 'Ov',
			'%\byou\b%' => 'u',
			'%\bYou\b%' => 'U',
			'%\byour\b%' => 'ur',
			'%\bYour\b%' => 'Ur',
			'%\bvia\b%' => 'thx 2',
			'%\bVia\b%' => 'thx 2',
			'%\bthankz\b%' => 'thx',
			'%\bThankz\b%' => 'Thx',
			'%\bthank you\b%' => 'thx',
			'%\bThank [Yy]ou\b%' => 'Thx',
			'%\bfrom\b%' => 'frum',
			'%\bFrom\b%' => 'Frum',
			'%\bthat\b%' => 'dat',
			'%\bThat\b%' => 'Dat',
			'%\bthis\b%' => 'dis',
			'%\bThis\b%' => 'Dis',
			'%\bthose\b%' => 'dose',
			'%\bThose\b%' => 'Dose',
			'%\bthen\b%' => 'den',
			'%\bThen\b%' => 'Den',
			'%\bSaturday\b%' => 'Caturday',
			'%\bthe\b%' => 'teh',
			'%\bThe\b%' => 'Teh',
			'%\binvisible\b%' => 'invizbl',
			'%\bInvisible\b%' => 'Invizbl',
			'%\bcould\b%' => 'cud',
			'%\bCould\b%' => 'Cud',
			'%\bwould\b%' => 'wud',
			'%\bWould\b%' => 'Wud',
			'%\buntil\b%' => 'til',
			'%\bUntil\b%' => 'Til',
			'%\bate\b%' => 'eated',
			'%\bAte\b%' => 'Eated',
			'%\breally\b%' => 'rly',
			'%\bReally\b%' => 'Rly',
			'%\bflavor\b%' => 'flavur',
			'%\bFlavor\b%' => 'Flavur',
			'%\btaste\b%' => 'flavur',
			'%\bTaste\b%' => 'Flavur',
			'%\bhiccups\b%' => 'hikkups',
			'%\bHiccups\b%' => 'Hikkups',
			'%\bbefore\b%' => 'b4',
			'%\bBefore\b%' => 'B4',
			'%\bam\b%' => 'iz',
			'%\bAm\b%' => 'Iz',
			'%\bis\b%' => 'iz',
			'%\bIs\b%' => 'Iz',
			'%\bwas\b%' => 'wuz',
			'%\bWas\b%' => 'Wuz',
			"%\bit'z\b%" => 'iz',
			"%\bIt'z\b%" => 'Iz',
			"%\bit&#8217;z\b%" =>'iz',
			"%\bIt&#8217;z\b%" =>'Iz',
			"%\bI'm\b%" => "I'z",
			"%\bI&#8217;m\b%" => "I&#8217;z",
			'%\bwith\b%' => 'wit',
			'%\bWith\b%' => 'Wit',
			'%\bwithout\b%' => 'witout',
			'%\bWithout\b%' => 'Witout',
			'%\bwill say\b%' => 'sez',
			'%\bsay\b%' => 'sez',
			'%\bSay\b%' => 'Sez',
			'%\bsays\b%' => 'sez',
			'%\bSays\b%' => 'Sez',
			'%\bsaid\b%' => 'sez',
			'%\bSaid\b%' => 'Sez',
			'%\bpicture\b%' => 'piktur',
			'%\bPicture\b%' => 'Piktur',
			'%\bthese\b%' => 'thees',
			'%\bThese\b%' => 'Thees',
			'%\bcat\b%' => 'kitteh',
			'%\bCat\b%' => 'Kitteh',
			'%\bkitten\b%' => 'kitteh',
			'%\bKitten\b%' => 'Kitteh',
			'%\babout\b%' => 'about',
			'%\bAbout\b%' => 'About',
			'%\bactually\b%' => 'akshully',
			'%\bActually\b%' => 'Akshully',
			'%\blove\b%' => 'luv',
			'%\bLove\b%' => 'Luv',
			'%\bloves\b%' => 'luvs',
			'%\bLoves\b%' => 'Luvs',
			'%\bhelp\b%' => 'halp',
			'%\bHelp\b%' => 'Halp',
			'%\blike\b%' => 'liek',
			'%\bLike\b%' => 'Liek',
			'%\bknow\b%' => 'noes',
			'%\bKnow\b%' => 'Noes',
			'%\bno\b%' => 'noes',
			'%\bNo\b%' => 'Noes',
			'%\bhave\b%' => 'haz',
			'%\bHave\b%' => 'Haz',
			'%\bplease\b%' => 'pleez',
			'%\bPlease\b%' => 'Pleez',
			'%\bhi\b%' => 'o hai',
			'%\bHi\b%' => 'O Hai',
			'%\bhello\b%' => 'o hai',
			'%\bHello\b%' => 'O Hai',
			'%\bgreetings\b%' => 'o hai',
			'%\bGreetings\b%' => 'O Hai',
			'%\bdo\b%' => 'does',
			'%\bDo\b%' => 'Does',
			'%\bwill be\b%' => 'be',
			'%\bsomeday\b%' => 'sumdayz',
			'%\bSomeday\b%' => 'Sumdayz',
			'%\bsure\b%' => 'shur',
			'%\bSure\b%' => 'Shur',
			'%\bmy\b%' => 'mah',
			'%\bMy\b%' => 'Mah',
			'%\bdone\b%' => 'dun',
			'%\bDone\b%' => 'Dun',
			'%\b[Tt]onight\b%' => '2nite',
			'%\bnothing\b%' => 'nuffin',
			'%\bNothing\b%' => 'Nuffin',
			'%\bsorry\b%' => 'sry',
			'%\bSorry\b%' => 'Sry',
			'%\bbucket\b%' => 'bukkit',
			'%\bBucket\b%' => 'Bukkit',
			'%\bfood\b%' => 'fud',
			'%\bFood\b%' => 'Fud',
			'%\byum\b%' => 'nom',
			'%\bYum\b%' => 'Nom',
			'%\bgood\b%' => 'gud',
			'%\bGood\b%' => 'Gud',
			'%\bthrough\b%' => 'thru',
			'%\bThrough\b%' => 'Thru',
			'%\bfriend\b%' => 'peep',
			'%\bFriend\b%' => 'Peep',
			'%\bfriendz\b%' => 'peeps',
			'%\bFriendz\b%' => 'Peeps',
			'%\bco[-]?worker\b%' => 'peep',
			'%\bCo[-]?worker\b%' => 'peep',
			'%\bco[-]?workers\b%' => 'peeps',
			'%\bCo[-]?workers\b%' => 'peeps',
			'%\bperson\b%' => 'peep',
			'%\bPerson\b%' => 'Peep',
			'%\bpersonz\b%' => 'peeps',
			'%\bPersonz\b%' => 'Peeps',
			'%\bpeople\b%' => 'peeps',
			'%\bPeople\b%' => 'Peeps',
			'%\bmore\b%' => 'moar',
			'%\bMore\b%' => 'Moar',
			'/ket\b/' => 'kit',
			'/ketz\b/' => 'kitz',
			'/ing\b/' => 'in',
			'/ingz\b/' => 'inz',
			'/ed\b/' => 'd',
			'/tiol\b/' => 'shul',
			'/tiolz\b/' => 'shulz',
			'/tial\b/' => 'shul',
			'/tialz\b/' => 'shulz',
			'/cial\b/' => 'shul',
			'/cialz\b/' => 'shulz',
			'/tion\b/' => 'shun',
			'/tionz\b/' => 'shunz',
			'/ction\b/' => 'kshun',
			'/ctionz\b/' => 'kshunz',
	
			'/er\b/' => 'r',
			'%\bhr\b%' => 'her',
		/*	'/ers\b%' => 'rz',
			"/'s\b%" => 'z',
			"/&#8217;s\b%" => 'z',
		*/	
			'%\baz\b%' => 'as',
			'%\bAz\b%' => 'As',
			'%\bhiz\b%' => 'his',
			'%\bHiz\b%' => 'His',
			'/ph/' => 'f',
			// These next two do cool random substitutions
			'/(\.\s)/e' => 'lolavast("$0",3)',
			'/([!\?]\s)/e' => 'lolavast("$0",2)', // Greater chance after exclamation
			);

	// Replace the words:
	$content = array_apply_regexp($patterns,$content);
	
	return $content;
}

// support function for pirate()
// this could probably be refactored to make it more generic, allowing
// different filters to pass their own patterns in.
function lolavast($ctub = '',$chance2 = 5) {
	$cheezits = array(
				", LOL$ctub",
				"$ctub LOL!!!1!",
				"$ctub Awwww!!!1!",
				"!!!1!",
				", ftw$ctub",
				);
				
	shuffle($cheezits);
	
	return (((1 == rand(1,$chance2))?array_shift($cheezits):$ctub) . ' ');
}

// Use the lolcat filter on July 7.
if ($talk_like_a_lolcat && '0707' == date('md') && !$_GET['filter']) {
	add_filter('the_content','lolcat');
	add_filter('comment_text','lolcat');
}

?>
