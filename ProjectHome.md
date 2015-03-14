## Script Name: ##
> # YTsaver 0.5.1 #

## Function: ##
To download FLV files located at Youtube.com

## Coded By: ##
James Weston (support@meamod.com, http://meamod.com)

## Original Creator: ##
Yeni Setiawan (yeni.setiawan@yahoo.com, http://sandalian.com)

## Change Log: ##
  * _April 5, 2007 (0.1) - read HTML and parse the string_
  * _March 3, 2008 (0.3) - shot the SWF and read the header_
  * _April 15, 2008 (0.4) - shot the SWF and read the header and let the T string remain_
  * April 16, 2008 (0.5) - provided download for YouTube videos via HTTP GET or Form Submit
  * **April 16, 2008 (0.5.1) - fixed spelling error**

## Requirement: ##
PHP with CURL

## Note: ##
This is a basic functions used to download FLV files at youtube.com so we can play it offline.

## Disclaimer: ##
You use it at your own risk. You can ask me question about this script but you shouldn't ask me about any damaged computer caused by this script.

## Demo: ##
http://anomisurf.com/ytsaver/

## Sample Usage: ##
### More Sample\_Usage ###

```
<form method="get" action="ytsaver.inc.php">
<input type="text" name="youtube" style="width: 323px" />
<input type="submit" value="Download Video" />
</form>
```