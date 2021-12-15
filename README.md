# cadviewer-script-library

Use this version with global DOM scope with back-end conversion scripts and CAD converters for PHP, .NET, .NET Core, Servlets, Laravel and NodeJS.  

Install the content of this repository under /cadviewer/. So for example, if on xampp, then /xampp/htdocs/cadviewer/, if on apache Linux then /var/www/html/cadviewer/.


For front-end frameworks ReactJS, Angular and VueJS, insted use npm installer: **npm i cadviewer**.  In that case only the structures under 2:, 3: and 4: is of interest. 


## This package contains

1: CADViewer script library  - in its preferred folder structure

2: AutoXchange AX2022 Converter and DWG Merge 2022 Converter - in their preferred folder structure

3: All structures for file-conversion, sample drawings, redlines, etc. 

4: A number of HTML files with CADViewer samples.


## This package does not contains

5: The folder structure for script handlers for communication between CADViewer and the back-end AutoXchange 2022. Install these separately!

**NOTE:** With this download, the PHP handlers will work as-is, download the PHP handlers from: https://github.com/CADViewer/cadviewer-php-scripts , install under /cadviewer/php/.


## How to Use

Once the 5: script handler is installed, the HTML samples under /cadviewer/html/ can be run from a web-browser. Use http://localhost/cadviewer/html/CADViewer_fileloader_670.html as a starting point (assuming that your have installed under http://localhost).




## Documentation 

-   [CADViewer Techdocs and Installation Guide](https://cadviewer.com/cadviewertechdocs/download)



## How To Install CADViewer Handlers

Please refer to the general Documentation above, for the back-end handlers, there is more information on:  


- [NodeJS](https://cadviewer.com/cadviewertechdocs/handlers/nodejs/)
- [PHP](https://cadviewer.com/cadviewertechdocs/handlers/php/)
	* [.NET](https://cadviewer.com/cadviewertechdocs/handlers/asp.net/)
	* [Servlets](https://cadviewer.com/cadviewertechdocs/handlers/servlets/)
	* [Angular](https://cadviewer.com/cadviewertechdocs/handlers/angular/)
	* [ReactJS](https://cadviewer.com/cadviewertechdocs/handlers/reactjs/)



## Updating CAD Converters

This repository should contain the latest converters, but in case you need to update any of the back-end converters please follow: 

* [Download **AutoXchange**](/download/) (and other converters), install (unzip) AX2020 in **cadviewer/converters/ax2020/windows** or **cadviewer/converters/ax2020/linux** or in the designated folder structure.
* Read the sections on installing and handling [Fonts](https://tailormade.com/ax2020techdocs/installation/fonts/) in [AutoXchange 2020 TechDocs](https://tailormade.com/ax2020techdocs/) and [TroubleShooting](https://tailormade.com/ax2020techdocs/troubleshooting/).

* Try out the samples and build your own application!
 
 

 
 ## Troubleshooting

One issue that often appears in installations is that interface icons do not display properly:

![Icons](https://cadviewer.com/cadviewertechdocs/images/missing_icons.png "Icons missing")

Typically the variables *ServerUrl*, *ServerLocation* or *ServerBackEndUrl* in the controlling **HTML**  document in ***/cadviewer/html/*** are not set to reflect the front-end server url or port.

<pre style="line-height: 110%">


    var ServerBackEndUrl = "";  // or what is appropriate for my server; used for NodeJS server only
    var ServerUrl = "http://localhost/cadviewer/";   // or what is appropriate for my server
    var ServerLocation = ""; // or what is appropriate for my server
</pre>

 
 
**Have Fun!**  - and get in [touch](mailto:developer@tailormade.com)  with us!
