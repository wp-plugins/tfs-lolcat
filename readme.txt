=== TFS LOLcat ===
Contributors: benmillett
Donate link: 
Tags: tfs, lolcat
Requires at least: 2.1
Tested up to: 2.5
Stable tag: trunk

A text filter that will convert your posts and comments to LOLcat-style language.

== Description ==
This is an extension of Dougal Campbell's <a href="http://dougal.gunters.org/blog/2004/08/30/text-filter-suite">Text Filter Suite</a>, which is required for TFSLOLcat to work.  Posts and comments can be changed to LOLcat-style language.  By default, all posts and comments will be switched on the official LOLcat Day of 07 July (7-07 is LOL upside-down).

Visit the <a href="http://ben-kt.momillett.org/tfslolcat/">plugin homepage</a> for additional information.

== Installation ==

0.  Change the value of variable `$talk_like_a_lolcat` to false if you do not want your posts automatically converted to LOLcat-ese on the Official LOLcat Day of 07 July (7-07 = LOL upside down).
1.  Download Dougal Campbell’s <a href="http://dougal.gunters.org/blog/2004/08/30/text-filter-suite">Text Filter Suite</a>.
2.  Add tfslolcat.php to the Text Filter Suite folder and upload to your /wordpress/wp-content/plugins/ folder.
3.  Activate the TFS-Core and TFSLOLcat plugins from the Plugins page in the Wordpress admin panel.
4.  If you want individual posts to use the filter, add `lolcat` as the value to the key `post_filter` for filtered post content and `comment_filter` for filtered comment content.


== Frequently Asked Questions ==

= Do you have an example? =

Visit <a href="http://ben-kt.momillett.org/2008/03/lolcat-speak/">this post</a> for a demonstration.

== Version History ==

0.2 (2007-03-15) - Updated with words from <a href="http://speaklolspeak.com/>LOLspeak</a>.
0.1 (2008-03-11) - Initial release.