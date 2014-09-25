<?php
// **************************************************************
// File: config.php
// Purpose: Contains configuration information
// Author: MysteryFCM
// Support: http://mysteryfcm.co.uk/?mode=Contact
//	    http://forum.hosts-file.net/viewforum.php?f=68
//	    http://www.temerc.com/forums/viewforum.php?f=71
// Last modified: 22-02-2011
// **************************************************************

// Modified from the script found at:
//	http://www.stopforumspam.com/forum/t37-Spambot-detector-%28with-this-API%29
//
// Modified by: MysteryFCM
//
//	For history, see history.txt

error_reporting(E_ALL ^ E_NOTICE);

// Set our timezone (PHP apparently cries if you've got E_STRICT or E_ALL set)
date_default_timezone_set('Europe/Zurich');

// Check which databases?
//
//	No need to add BotScout here as you can just remove your API key to disable the checking of BS :o)
//
//	The DNSBL blacklists aren't listed here as these can be disabled dynamically by modifying the
//	querystring you send to check_spammers_plain.php. For example, to check everything EXCEPT SpamHaus,
//	your querystring would be;
//
//		check_spammers_plain.php?sh=no
//
//	DNSBL vars (what you need to add to the querystring to disable each DNSBL)
//
//		&sh=no = Disable SpamHaus
//		&sc=no = Disable SpamCop
//		&sb=no = Disable Sorbs
//		&ph=no = Disable Project Honey Pot
//		&drone=no = Disable DroneBL
//		&ahbl=no = Disable AHBL

$bCheckFSL = TRUE; // fSpamlist.com
$bCheckSFS = TRUE; // stopforumspam.com
$blnSubmitToFSL = FALSE; // Not currently permitted for public use, here as a place holder for when it returns.

// Should we fail and return true, if an invalid e-mail address is detected?
// 
// Notes:
//
//	Only used by check_spammers_plain.php
//	Only checks if the domain (everything after the @) is valid, it can't check if the e-mail address exists
//	on the server (e.g. fakeaddress@gmail.com would not return true as there's no way of knowing if this is valid or not).
//
$bFailOnInvalidEmail = FALSE;

// Do you want it to create a text file with the results?
$bln_SaveToFile = TRUE;

// Do you want it to log results to a database?
$bln_SaveToDB	= FALSE;

// Insert database/host details here
//
//	Note: The default MySQLport is 3306. If your MySQL server is NOT running on this port, you will need to change it.
//	      If you are using a hosting companies remote server, they will be able to clarify the details you need.

$dbShost	= 'localhost:3306';
$dbSname	= 'sbst';
$dbSusername	= '';
$dbSpassword	= '';

// Where do you want it saved?
//
//	Default = PATH_TO_SBST/spambots/
//
$sSaveTo = dirname(__FILE__).'/spambots/';
$savetofolder=$sSaveTo;

// What should we base a match on? (APPLIES TO CHECK_SPAMMERS_PLAIN.PHP ONLY)
//
//	1 = Name
//	2 = IP
//	3 = Email
//
//	****************
//	SUPPORTED VALUES
//	****************
//
//	2,3 = Only return true if both IP and e-mail are listed
//	1,2 = Only return true if both Username and IP are listed
//	1,3 = Only return true if both Username and e-mail are listed
//	1,2|1,3 = Only return true if both Username and IP are listed OR username and Email are listed
//	1,2|1,3|2,3 = Only return true if both Username and IP are listed OR username and Email are listed OR IP and Email are listed
//	1,2|2,3 = Only return true if both Username and IP are listed OR IP and Email are listed
//	1,3|2,3 = Only return true if both Username and Email are listed OR IP and Email are listed
//	1,2,3 = Only return true if all 3 are listed
//
//	IMPORTANT: This should NEVER be set to match based on username only
//		   As this leaves it wide open to false positives.
//
//	You can of course, ask it to match on multiple cases, for example;
//
//	$BaseMatch = "1,2|2,3";
//
//	If doing this, you MUST ensure they are listed in order of the case
//	switches (see check_spammers_plain.php), for example;
//
//	$BaseMatch = "1,2|1,3"; (match Username and IP OR username and Email)
//
//	If $BaseMatch = "", it will match any one of the 3 variables (just as it did before selective matching was added)
//

$BaseMatch = "";

// Project Honey Pot API Key
//
// Note: This key is required if you wish to query Projecthoneypot.org
$sPHPAPI='jdkjbalmcazn';

// fSpamlist API Key
//
// Note: This key is required if you wish to submit data to fspamlist.com
$sFSLAPI='';

// StopForumSpam API Key
//
// Note: This key is required if you wish to submit data to stopforumspam.com
$sSFSAPI='';

// BotScout API Key
//
// Note: This key is required if you wish to query botscout.com (they allow limited queries without it)
$sBSAPI='M0vCcqetszjJId7';

// E-mail
//
// Note: This is only required if you want to view reports sent to you via e-mail
//
$sMail='';
$sMailPW='';
$sMailServer='{imap.gmail.com:993/imap/ssl/novalidate-cert}INBOX';

// Borders
$border='#000000 solid 1px';
$formborder='#000000 solid 0px';
$tdborder='#000000 solid 0px';
$menu_border='#000000 solid 1px';
$menu_tdborder='#000000 solid 0px';

// hpHosts Logo
$header_title_image='images/title_image.gif';

// Background colours
$header_title_bg='#E7E9EB';
$footer_title_bg='#E7E9EB';
$menu_bg='#FFFFFF';
$reshead_bg='#006699';
$main_bg='#EFEFEF';
$res_bg='#ffffff';
$body_bg='#EEEEEE';

// Menu link colours
$menu_link='#3333FF';
$menu_hover_link='#006699';

// Text colours
$header_title_text='#000000';
$footer_title_text='#006699';
$main_title_text='#000000';
$reshead_text='#ffffff';
$error_text='#ff0000';

// Font sizes and family
$font_size='11px';
$font_fsize='9px'; // Footer font size
$font_hsize='17px'; // Header font size
$font='Verdana, Arial, Helvetica, sans-serif';

// Calculate years to put for copyright notice
$Year = date('Y');
if ($Year > 2008) {
	$CopyrightYear = "2008 - $Year";
} else {
	$CopyrightYear = $Year;
}

$proxyUrl = '';