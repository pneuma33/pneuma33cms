#cabbagecms

Customizes WordPress for More Cabbage clients. Features are:

  * Email obfuscation shortcode
  * Social sharing and connect bars
  * Adds more contact methods to user profile
  * Adds shortcut to Gravity Forms entries
  * Provides user friendly interface for Google (WT and Analytics), Bing and Pinterest verification

##Usage  / Instructions

Upload to wp-content/plugins and activate. Edit Settings/CabbageCMS with site info as needed.

**Email:**
Wrap an email address in the [email] shortcode ex:
```
[email]user@example.com[/email]
```

**Sharing:**
```php
if ( function_exists( 'cabbagecms_share_bar')) :
  cabbagecms_share_bar();
endif;
```
If you want a horizontal share bar...
```css
.cabbagecms-share li {
    float: left;
    margin-right: 10px;
}

.cabbagecms-share .fb-share {
    margin: -4px 20px 0 0 !important;
}

.cabbagecms-share .g-share {
    width: 70px;
}

.cabbagecms-share .twitter-share {
    width: 90px;
}

.cabbagecms-share .pinterest-share-button {
    margin-right: 30px !important;
}
```

**Connect:**
```php
if ( function_exists( 'cabbagecms_connect')) :
  cabbagecms_connect();
endif;
```
or in an existing social connect bar...
```php
global $cabbagecms_SERVICENAME;
echo $cabbagecms_SERVICENAME;
```
where SERVICENAME is one of the following: facebook, twitter, youtube, pinterest, googleplus, linkedin, company_name or instagram

**Display author info:**
before loop...
```php
$curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));
```
Then:
```php
echo $curauth->linkedinurl;
echo $curauth->linkedinid;
echo $curauth->twitterurl;
echo $curauth->twitterid;
echo $curauth->title;
echo $curauth->cabbagecms_role;
echo $curauth->photo;
echo $curauth->cabbagecms_caption;
echo $curauth->facebookurl;
echo $curauth->googleplusurl;
```

##Credits

Thanks to [@jkudish](https://github.com/jkudish/WordPress-GitHub-Plugin-Updater) for the Git updater class

Thanks to [@serbanghita](https://github.com/serbanghita/Mobile-Detect) for the Mobile_Detect class

##Change Log
**1.0.8** Move Google Analytics to head

**1.0.7** Add version number to stylesheets

**1.0.6** Fixed bug that prevented option from being changed

**1.0.5** Fixed issue where Chrome was getting safari class, made Pinterest and Google+ js inclusion an option

**1.0.4** Added usage info, helper functions, some refactoring, added browser body class, mobile detect class

**1.0.3** Bug fixes and change user entry from ID to URL for more flexibilty

**1.0.2** Cleaned up the Pinterest meta tag

**1.0.1** Removed usage instructions from settings page

**1.0** Initial Release
