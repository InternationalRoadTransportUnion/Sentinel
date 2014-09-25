Sentinel application for the [Elefant CMS](http://www.elefantcms.com/).

Syntax:
=======

[site url]/sentinel/validate?ip=[ip_address]&email=[email]&username=[username]

You need to provide at least one of these parameters: ip, email, username

Optional parameters:

&format=[json|text]&apikey=[apikey]&debug=1

The following checkers are used:
================================

* Local (IP)
* abuse.ch (Drone, DNSBL) (IP) - http://www.dnsbl.info/
* abuse.ch (HTTPBL) (IP) - http://www.dnsbl.info/
* abuse.ch (Spam) (IP) - http://www.dnsbl.info/
* abuse.ch (Zeustracker) (IP) - http://www.dnsbl.info/
* Abusive Hosts Blocking List (IP) - http://ahbl.org/
* Blocklist.de (IP) - http://www.blocklist.de/
* BotScout (IP, email, username) - http://botscout.com/
* DroneBL (IP) - http://dronebl.org/
* EFnet RBL (IP) - http://efnetrbl.org/
* FSpamlist (IP, email, username) - http://fspamlist.com/
* ProjectHoneyPot (IP) - http://www.projecthoneypot.org/
* Sorbs (Problems) (IP) - http://dnsbl.sorbs.net/
* Sorbs (Spew) (IP) - http://dnsbl.sorbs.net/
* SpamCop (IP) - http://www.spamcop.net/
* Spamhaus (IP) - http://www.spamhaus.org/
* StopForumSpam (IP, email, username) - http://www.stopforumspam.com/
* Tornevall (IP) - https://dnsbl.tornevall.org/