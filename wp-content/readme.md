#Spire Digital Wordpress Starter Theme
*By: Dan Luchs, c/o [Spire Digital](http://www.spiredigital.com)*

#TLDR;
## Requirements
- Wordpress
- Node/NPM
	+ Gulp
	+ Gulp CLI

## Steps
- Download Wordpress
- Download Spire Wordpress Starter
- Replace the default "wp-content" folder with the "wp-content" folder from the Spire Wordpress Starter.
	+ REPLACE THE ENTIRE FOLDER, NOT JUST THE CONTENTS!
	+ .gitignore, .gitattributes, .editorconfig, and .eslitrc files are all included in the Starter "wp-content" folder
	+ DELETE the "Spire Wordpress Starter" folder
- Set up **wp-config-spire.php**, MOVE it to the root Wordpress directory
- Change the name to **wp-config.php**, delete the **wp-config-sample.php** file
- **cd** into wp-content
- Set up Git repo (**git init**, etc.)
- **cd** into themes/spire and run **npm install**
- Run **gulp build**, check for errors. Make sure that a "public" folder now exists
- Change the name of the "spire" theme folder to something more client-centric
- Develop your heart out


# Requirements and Instructions

## Wordpress
- Download and install the latest version of [Wordpress](https://wordpress.org/download/)

## Starter Theme
- Download/clone the Spire Wordpress Starter Theme
- Replace the default "wp-content" folder with the "wp-content" folder from the Spire Wordpress Starter.
	+ REPLACE THE ENTIRE FOLDER, NOT JUST THE CONTENTS!
	+ .gitignore, .gitattributes, .editorconfig, and .eslitrc files are all included in the Starter "wp-content" folder
	+ DELETE the now empty "Spire Wordpress Starter" folder
- Set up **wp-config-spire.php**, MOVE it to the root Wordpress directory
- Change the name to **wp-config.php**, delete the **wp-config-sample.php** file

## NPM and NodeJS
- If not already installed, install [NodeJS](https://nodejs.org/en/download/)
- Once Node/NPM is installed, install Gulp and Gulp CLI globally with: **npm install gulp gulp-cli -g**

## Repo and Development
- **cd** into wp-content
- Set up Git repo (**git init**, etc.), connect to the appropriate Spire repo in Bitbucket
- **cd** into themes/spire and run **npm install**
- Run **gulp build**, check for errors. Make sure that a "public" folder now exists
- Change the name of the "spire" theme folder to something more client-centric
- Start developing


# Setup
The repository is tracking the entire wp-content folder. This allows themes, plugins and mu-plugins to be tracked. The uploads, upgrade and any .log files are being ignored Any other folders/files that are added to wp-content will need to be added to the .gitignore file if tracking is not desired.

## Database
- The development database should be hosted on Spire Digital's AWS service, to allow access for all developers.
- Staging could also be on Spire's AWS or the client's server
- Production will be on the client's server
- A sample config file (wp-config-spire.php) is included with the starter.
	+ Rename this file to "wp-config.php"
	+ Fill in the configuration settings (database, salt, etc.)
	+ **Move this file to the Wordpress root folder**
	+ Delete the default "wp-config-sample.php" file


# Development and Compiling
All fonts, images, SVGs, and Javascript are compiled from the "src" folder to the "public" folder.
The SCSS is compiled into the default Wordpress "style.css" file.
**ALWAYS make changes to the src files, NEVER to the style.css file or the files in the public folder**

## Initial Setup and Commands
- **npm install**: install any packages in package.json (may to to run with sudo)

## Development Build/Compiler Commands
- **gulp fonts**: copy fonts from source to build directory
- **gulp scss**: compile SCSS to CSS with maps from source to build directory
- **gulp js**: compile javascript with maps from source to build directory
- **gulp img**: copy and compress images from source to build directory
- **gulp svg**: copy SVG files from source to build directory
- **gulp build**: runs all previous commands once
- **gulp watch**: watch specific directories and perform tasks on change
- Typical use: **gulp build; gulp watch**


# Development Dependencies

## CSS/SCSS
Using [Neat](http://neat.bourbon.io/) lightweight flexible sass grid.

## Javascript
Uses/references the version of [jQuery](http://jquery.com) used by Wordpress
Includes [VueJS](https://vuejs.org), in case a Javascript MVC is needed
Other frameworks/modules/plugins can be added as needed, either through the package.json file, or directly in the **vendors** folder


# Plugins
There are some plugins that come with the Starter

## [Advanced Custom Fields Pro](https://www.advancedcustomfields.com/pro/)
- Premium plugin, requires activation key

## [WP Migrate DB Pro](https://deliciousbrains.com/wp-migrate-db-pro/)
- Premium plugin, requires activation key

## [WP Migrate DB Pro Media Files](https://deliciousbrains.com/wp-migrate-db-pro/#addons)
- Premium plugin, add-on for WP Migrate DB Pro

## [Simple Backup](http://MyWebsiteAdvisor.com/plugins/simple-backup/)
- Useful for database dumps and file backups

## [Webriti SMTP Email](http://webriti.com/)
- Used instead of the default (unreliable) WP system for sending email.

## Custom Post-Types and Taxonomies
- Custom plugin, located in mu-plugins (mu-plugins > site-cpt-settings > site-cpt-settings.php)
- Creating the CPTs and Taxonomies here makes them available across all themes
- See the plugin's readme file for more information

## ACF Flexible Layout Output
- Custom plugin, located in mu-plugins (mu-plugins > acf-flexible-layout-output > acf-flexible-layout-output.php)
- Allows dynamic integration of ACF Flexible Content Field layouts into the templates
- Using this eliminates the need to create page templates and custom logic
- See the plugin's readme file for more information


# MU-Plugins:
The "Must-Use" plugins folder (mu-plugins) forces the installation to use those plugin files.
- Theme Custom Post-Types and Taxonomies are included in a plugin. This allows them to be accessed regardless of which theme is used.
- Any plugins added or removed in this folder **must** be reflected in the load.php file

## Advantages:
- Any plugins included in the mu-plugins folder will always be activated, client cannot disable them.
- Any theme that is loaded will have to use those plugins. By setting up Post Types and Taxonomies as a plugin, their data will be available regardless of which theme is used.

## Disadvantages:
- Plugins must be loaded through the load.php file.
- Plugins must be updated manually, they will not display in the admin plugins list
