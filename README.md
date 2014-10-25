cheezcap-example
================

This is the WordPress theme I created for the demo I gave at the WordPress NYC Meetup, [Managing your sites the CHEEZburger way](http://www.meetup.com/WordPressNYC/events/210724832). It demonstrates how to use the [Cheezburger Custom Administration Panel](https://github.com/tmtrademark/cheezcap) to run multiple sites off of the same theme.

Here are the [slides from the presentation](http://www.slideshare.net/BrianCohn1/cheezcap-presentation?qid=2fd65bad-47c8-4ee8-89d8-ced6516d3384&v=qf1&b=&from_search=3).

#Installation
1. Download the [Fieldmanager plugin](https://github.com/alleyinteractive/wordpress-fieldmanager) and move it into your site's "plugins" directory. Then activate it from within your site's admin area.

2. Either download or clone this repo, and move it to your site's "themes" directory. Then activate it from within your site's admin area. 

3. There will now be a "CheezCap Settings" menu item in your site's admin area. Clicking on it will bring up the admin panel.

#Instructions
* The configuration file for CheezCap is named cheezcap-config and is located in the "cheezcap" directory within the theme. Update this file to make changes to the fields that are displayed.
* The functions that handle enqueueing the css and javascript files that are entered in CheezCap are located in the "inc/helpers.php" file.
* The function that utilizes the Fieldmanager plugin to add the left and right sidebar selections to each page is located in the "inc/enhancements.php" file.

#Notes
* The code that allows you to automatically commit CheezCap changes is located here:  [cheezcap-auto-git-commit](https://github.com/shawcohn/cheezcap-auto-git-commit).
