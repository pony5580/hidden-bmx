## Movable Type Configuration File
##
## This file defines system-wide
## settings for Movable Type. In 
## total, there are over a hundred 
## options, but only those 
## critical for everyone are listed 
## below.
##
## Information on all others can be 
## found at:
##  http://www.movabletype.jp/documentation/config

#======== REQUIRED SETTINGS ==========

CGIPath        /CMS/MT/
StaticWebPath  /CMS/MT/mt-static/
StaticFilePath /Users/pony/proj/local/hidden-bmx/htdocs/CMS/MT/mt-static

#======== DATABASE SETTINGS ==========

ObjectDriver DBI::mysql
Database hidden_bmx_mt
DBUser pony
DBPassword hommage5580
DBHost localhost

#======== MAIL =======================
EmailAddressMain masa@s2factory.co.jp
MailTransfer sendmail
SendMailPath /usr/sbin/sendmail
    
DefaultLanguage ja

ImageDriver ImageMagick

PluginPath plugins
PluginPath /Users/pony/proj/local/hidden-bmx/htdocs/CMS/plugins
