Not Working. Do not use.

[![Latest Stable Version](https://poser.pugx.org/fisharebest/webtrees/v/stable.svg)](https://packagist.org/packages/fisharebest/webtrees)
[![Latest Unstable Version](https://poser.pugx.org/fisharebest/webtrees/v/unstable.svg)](https://packagist.org/packages/fisharebest/webtrees)
[![License](https://poser.pugx.org/fisharebest/webtrees/license)](https://packagist.org/packages/fisharebest/webtrees)
[![Build Status](https://travis-ci.org/fisharebest/webtrees.svg?branch=master)](https://travis-ci.org/fisharebest/webtrees)
[![Coverage Status](https://coveralls.io/repos/github/fisharebest/webtrees/badge.svg?branch=master)](https://coveralls.io/github/fisharebest/webtrees?branch=master)
[![Translation status](https://weblate.iet.open.ac.uk/widgets/webtrees/-/shields-badge.svg)](https://weblate.iet.open.ac.uk/engage/webtrees/?utm_source=widget)
[![SensioLabsInsight](https://insight.sensiolabs.com/projects/78a5ba19-7ddf-4a58-8262-1c8a149f38de/mini.png)](https://insight.sensiolabs.com/projects/78a5ba19-7ddf-4a58-8262-1c8a149f38de)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/fisharebest/webtrees/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/fisharebest/webtrees/?branch=master)
[![Code Climate](https://codeclimate.com/github/fisharebest/webtrees/badges/gpa.svg)](https://codeclimate.com/github/fisharebest/webtrees)
[![StyleCI](https://github.styleci.io/repos/11836349/shield?branch=master)](https://github.styleci.io/repos/11836349)

# webtrees - online collaborative genealogy

The project’s website is [www.webtrees.net](https://www.webtrees.net).
Further documentation is available at [wiki.webtrees.net](https://wiki.webtrees.net) and [webtrees.github.io](https://webtrees.github.io).

## Contents

* [License](#license)
* [Coding styles and standards](#coding-styles-and-standards)
* [Introduction](#introduction)
* [System requirements](#system-requirements)
* [Internet browser compatibility](#internet-browser-compatibility)
* [Installation](#installation)
* [Upgrading](#upgrading)
* [Building and developing](#building-and-developing)
* [Gedcom (family tree) files](#gedcom-family-tree-files)
* [Security](#security)
* [Backup](#backup)


## License

* **webtrees: online genealogy**
* Copyright 2019 webtrees development team

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program. If not, see <http://www.gnu.org/licenses/>.

## Coding styles and standards

webtrees follows the [PHP Standards Recommendations](https://www.php-fig.org/psr).

* [PSR-1](https://www.php-fig.org/psr/psr-1) - Basic Coding Standard
* [PSR-2](https://www.php-fig.org/psr/psr-2) - Coding Style Guide
* [PSR-4](https://www.php-fig.org/psr/psr-4) - Autoloading Stardard
* [PSR-7](https://www.php-fig.org/psr/psr-7) - HTTP Message Interface
* [PSR-11](https://www.php-fig.org/psr/psr-11) - Container Interface
* [PSR-12](https://github.com/php-fig/fig-standards/blob/master/proposed/extended-coding-style-guide.md) - Extended Coding Style Guide
* [PSR-15](https://www.php-fig.org/psr/psr-15) - HTTP Handlers
* [PSR-17](https://www.php-fig.org/psr/psr-17) - HTTP Factories

We do not currently use [PSR-3 (logging)](https://www.php-fig.org/psr/psr-3) or [PSR-6 (caching)](https://www.php-fig.org/psr/psr-6) - but we plan to do so in the future.

## Introduction

**webtrees** is the web's leading online collaborative genealogy application.

* It works from standard GEDCOM files, and is therefore compatible with every
major desktop application.
* It aims to to be efficient and effective by using the right combination of
third-party tools, design techniques and open standards.

**webtrees** allows you to view and edit your genealogy on your website. It has
full editing capabilities, full privacy functions, and supports imedia such as
photos and document images. As an online program, it fosters extended family
participation and good ancestral recording habits, as it simplifies the process
of collaborating with others working on your family lines. Your latest information
is always on your web site and available for others to see, defined by viewing
rules you set. For more information and to see working demos, visit
[webtrees.net](https://webtrees.net/).

**webtrees** is Open Source software that has been produced by people from many
countries freely donating their time and talents to the project. All service,
support, and future development is dependent on the time developers are willing
to donate to the project, often at the expense of work, recreation, and family.
Beyond the few donations received from users, developers receive no compensation
for the time they spend working on the project. There is also no outside source
of revenue to support the project. Please consider these circumstances when
making support requests and consider volunteering your own time and skills to make
the project even stronger and better.


## System requirements

To install **webtrees**, you need:

* A webserver. Apache, NGINX and IIS are the most common types. There are no
 requirements to use a specific type or version.
* Approximately 65MB of disk space for the application files, plus whatever is
  needed for your media files, GEDCOM files and database.
* PHP 7.0 or later.  Servers with PHP 5.3 - 5.6 should use **webtrees** 1.7.
  Servers with PHP 5.2 should use **webtrees** 1.4.
   * PHP should be configured with the following libraries:
     * PDO and pdo_mysql to enable access to MySQL. These are enabled by default
     on most hosts. See [http://php.net/pdo](http://php.net/pdo),
     * php\_gd(2) for images
     * PHP_XML for reports.
   * PHP should be configured to allow sufficient server resources (memory and
     execution time) for the size of your system. Typical requirements are:
      * Small systems (500 individuals): 16–32 MB, 10–20 seconds
      * Medium systems (5,000 individuals): 32–64 MB, 20–40 seconds
      * Large systems (50,000 individuals): 64–128 MB, 40–80 seconds
* MySQL or MariaDB. Note that **webtrees** can share a single database
  with other applications, by choosing a unique table prefix during setup.
  If the number of databases is not restricted, you can set up a database purely
  for use by **webtrees** and create a separate user and password for only
  your genealogy.


  ## Internet browser compatibility
  
  **webtrees** supports the use of most current browsers such as Edge, Firefox,
  Chrome, and Safari. We will do our best to support the current versions of others
  such as Opera and Internet Explorer, however note that versions of Internet Explorer
  prior to IE11 do not work with **webtrees**. We strongly recommend anyone using an
  obsolete browser to upgrade as soon as possible. We are also aware that Internet
  Explorer provides poor RTL language support generally, so cannot recommend it for
  sites requiring RTL languages.
* To view sites that contain both left-to-right and right-to-left text (e.g.
  English data on Hebrew pages), you will need to use a browser that provides
  support for the HTML5 **dir="auto"** attribute. At present, neither Edge
  nor Internet Explorer support this.


## Installation

Once the system requirements are met, perform the following steps

1. Download the latest stable version from [webtrees.net](https://webtrees.net/)
2. Unzip the files and upload them to an empty folder on your web server.
3. Open your web browser and type the URL for your **webtrees** site (for example,
   ``http://www.yourserver.com/webtrees`` into the address bar.
4. The **webtrees** setup wizard will start automatically. Simply follow the steps,
   answering each question as you proceed.

That's it!

However, before you can use **webtrees**, you need at least one GEDCOM
(family tree) file. If you have been doing your research using a desktop program
such as Family Tree Maker, you can use it's “save as GEDCOM” function to create
a GEDCOM file. If you are starting from scratch, then **webtrees** can create a
GEDCOM file for you.

On successful installation you will be taken to the
 ``Control panel`` -> ``Manage family trees``  page where you can:
 * UPLOAD a GEDCOM file from your local machine
 * ADD a GEDCOM file from your server, (if your GEDCOM file is too large to upload,
   you can copy it to the webtrees/data folder, and load it from there)
 * CREATE a new, empty GEDCOM file

There are *lots* of configuration options. You'll probably want to review the
privacy settings first. Don't worry too much about all the other options - the
defaults are good for most people. If you get stuck, there's lots of built-in
help and you can get friendly advice from the [help](https://webtrees.net/forums)
forum.


## Upgrading

Upgrading **webtrees** is quick and easy. It is strongly recommended that you
upgrade your installation whenever a new version is made available. Even minor
**webtrees** version updates usually contain a significant number of bug fixes
as well as interface improvements and program enhancements.

* **Automatic upgrade**

  **webtrees** has an automatic upgrade facility. An administrator upon logging in
will receive notification when a new version is available and an option to start
the automatic upgrade. If for some reason the automatic upgrade should fail
then a manual upgrade should be performed.

* **Manual upgrade**

  1. Now would be a good time to make a [backup](#backup).
  2. Download the latest version of **webtrees** available from
   [webtrees.net](https://webtrees.net/)
  3. While you are in the middle of uploading the new files,
   a visitor to your site would encounter a mixture of new and old files.  This
   could cause unpredictable behaviour or errors.  To prevent this, create the
   file **data/offline.txt**.  While this file exists, visitors will see a
   “site unavailable - come back later” message.
  4. Unzip the .ZIP file, and upload the files to your web server, overwriting the existing files.
  5. Delete the file **data/offline.txt**


### Note for Macintosh users

Step 4 assumes you are using a copy tool that **merges** directories rather than
replaces them. (**Merge** is standard behaviour on Windows and Linux.) If you use
the Macintosh Finder or other similar tool to perform step 3, it will **replace**
your configuration, media and other directories with the empty/default ones from
the installation. This would be very bad (but you did take a backup in step 1,
didn't you!). Further details and recommendations for suitable tools can be found
by searching [google.com](http://google.com).


### Note for anyone using custom code (modules, themes, etc.).

It is **very likely** that your custom code will not work when you upgrade
**webtrees**.

**We recommend that you disable all custom code before you apply the upgrade.**

Disable custom modules, switch over to a standard theme, and remove any code “hacks”.
Once the upgrade is complete and you are satisfied that your site is fully operational contact
the source of those modules or themes for a new version.


### General note

Depending on the changes in the new files, your browser configuration
and possibly other factors, it is always wise to clear both the **webtrees** cache
and your browser cache immediately after the upgrade is completed. The **webtrees**
cache can be cleared simply by going to ``Control Panel`` -> ``Family Trees`` ->
``Clean-up data folder`` and deleting the cache.

If you have any problems or questions, help is available on the
[webtrees forum](https://www.webtrees.net/index.php/en/forum).

## Building and developing

If you want to build webtrees from source, or modify the code, you'll need to install
a couple of tools first.

You will need [composer](https://getcomposer.org/) to install the PHP dependencies.
Then run this command::

* php composer.phar install

You will need [npm](https://www.npmjs.com/get-npm) to install the Javascript dependencies.
Then run the commands:

* npm install
* npm run production

You will need to re-run the second of these any time you modify the file `webtrees.js`.

## Gedcom (family tree) files

When you ADD or IMPORT a family tree (GEDCOM) file in **webtrees** the
data from the file is transferred to the database tables. The file itself 
remains in the **webtrees/data** folder and is no longer used or required
by **webtrees**. Any subsequent editing of the **webtrees** data
will not change this file

When or if you change your genealogy data outside of **webtrees**, it is not
necessary to delete your GEDCOM file or database from **webtrees** and start
over. Follow these steps to update a GEDCOM that has already been imported:

* Go to ``Control panel`` -> ``Manage family trees`` On the line relating to this particular family tree (GEDCOM)
  file (or a new one) select IMPORT.
* Take careful note of the media items option (_“If you have created media objects
  in **webtrees**, and have edited your data off-line using software that
  deletes media objects, then tick this box to merge the current media objects
  with the new GEDCOM.”_) In most cases you should leave this box **UNCHECKED**.
* Click “SAVE”. **webtrees** will validate the GEDCOM again before importing.
  During this process, **webtrees** copies your entire family tree (GEDCOM file)
  to a 'chunk' table within your database. Depending on the coding of your file,
  its file size and the capabilities of your server and the supporting software,
  this may take some time. **No progress bar will show while the data is being
  copied** and should you navigate away from this page, the process is suspended.
  It will start again when you return to the Family Tree management page.


### Gedcom file Formats

Every Family History program has its own method of creating GEDCOM files, and
differing output format options to select from. **webtrees'** import routines
can read many different formats, but not necessarily all. If your software has
a “UTF8” option you should always use that. However, **webtrees** has been
tested with these alternative formats:

* ANSI
   * imports OK, but is slow due to the translation into UTF8 as part
     of the import process.
* MAC
   * imports OK, but is slow due to the translation into UTF8 as part
     of the import process.
* DOS
   * imports OK, but is slow due to the translation into UTF8 as part
     of the import process.
* ANSEL
   * currently will not import. Gives warning *Error: cannot convert
     GEDCOM file from ANSEL encoding to UTF-8 encoding*. Later releases
     of **webtrees** may include the facility to translate from ANSEL to UTF8,
     but for now a standalone utility [is available here](https://dev.webtrees.net/ansel/)
     and should be used to convert the format to UTF-8 prior to importing.


## Security

**Security** in _webtrees_ means ensuring your site is safe from unwanted
intrusions, hacking, or access to data and configuration files. The developers
of _webtrees_ regard security as an extremely important part of its development
and have made every attempt to ensure your data is safe.

The area most at risk of intrusion would be the **/data** folder that contains your
config.ini.php file, and various temporary files. If you are concerned there
may be a risk there is a very simple test you can do: try to fetch the file 
config.ini.php by typing **``url_to_your_server/data/config.ini.php``** in your web
browser.

The most likely result is an “access denied” message like this:

    Forbidden

    You don't have permission to access /data/config.ini.php on this server.

This indicates that the protection built into **webtrees** is working, and no
further action is required.

In the unlikely event you do fetch the file (you will just see a semicolon),
then that protection is not working on your site and you should take some further
action.

If your server runs PHP in CGI mode, then change the permission of the **/data**
folder to 700 instead of 777. This will block access to the httpd process,
while still allowing access to PHP scripts.

This will work for perhaps 99% of all users. Only the remaining 1% should consider
the most complex solution, moving the **/data** folder out of accessible web
space. (**_Note:_** In many shared hosting environments this is not an option anyway.)

If you do find it necessary, following is an example of the process required:

If your home folder is something like **/home/username**,
and the root folder for your web site is **/home/username/public_html**,
and you have installed **webtrees** in the **public_html/webtrees** folder,
then you would create a new **data** folder in your home folder at the same
level as your public_html folder, such as **/home/username/private/data**,
and place your GEDCOM (family tree) file there.

Then change the **Data folder** setting on the ``Control panel`` ->
``Website`` -> ``Website preferences`` page from the default **data/** to the new
location **/home/username/private/data**

You will have **two** data directories:

* [path to webtrees]/data - just needs to contain config.ini.php
* /home/username/private/data - contains everything else


## Backup

Backups are good. Whatever problem you have, it can always be fixed from a good
backup.

To make a backup of **webtrees**, you need to make a copy of the following

1. The files in the *webtrees/data* folder.
2. The files in the *webtrees/media* folder.
3. The tables in the database. Freely available tools such as
   [phpMyAdmin](http://www.phpmyadmin.net) allow you to do this in one click.

Remember that most web hosting services do NOT backup your data, and this is
your responsibility.
