# cadviewer-script-library

Use this version with global DOM scope with back-end conversion scripts and CAD converters for PHP, .NET, .NET Core, Servlets, Laravel and NodeJS.  

Install the content of this repository under /cadviewer/. So for example, if on xampp, then /xampp/htdocs/cadviewer/, if on apache Linux then /var/www/html/cadviewer/.

Pull the library from your install location, for example: /var/www/html/ (linux) or /xampp/htdocs/ (windows) , it will expand into cadviewer-script-library, rename or copy this folder to cadviewer, or use git to rename at install: 

```
 sudo git clone https://github.com/CADViewer/cadviewer-script-library.git ./cadviewer
```
For front-end frameworks ReactJS, Angular and VueJS, insted use npm installer: **npm i cadviewer**.  In that case, the htmnl sample folder 4: is not used. 

The back-end converters can be used on Windows and Linux. 

***NOTE:*** Your end-point to access the CADViewer script library from an external source will be: ***http://myapacheserver/cadviewer/***, where ***myapacheserver** is the url of the Apache server. 

## This package contains

1: CADViewer script library  - in its preferred folder structure

2: AutoXchange AX2024 Converter , Linklist 2024 Extractor and DWG Merge 2024 Converter, in their preferred folder structure.  **NOTE:** Each converter will have two subfolders /windows/ and /linux/ where the executable for the corresponding platform is located. 

3: All structures for file-conversion, sample drawings, redlines, print folders etc. 

4: A number of HTML files with CADViewer samples.


## This package does not contains

5: The folder structure for script handlers for communication between CADViewer and the back-end AutoXchange 2024. Install these separately!

**NOTE:** With this download, the **PHP handlers** will work as-is, download the PHP handlers from: https://github.com/CADViewer/cadviewer-php-scripts, install under /cadviewer/php/.


## How to Use

6: If on Linux ensure the following: 

6A: The executable /cadviewer/ax2024/linux/ax2023_L64__xx_yy_zz has full read, write and execute permissions for the owner  (chmod 755 or chmod 777)

6B: The executable /cadviewer/ax2024/linux/ has full read, write permissions for the owner  (chmod 777)

6C: The php scripts in /cadviewer/php/ has full rights  (chmod 755)

6D: Ensure the /cadviewer/converters/files/ folder for temporary files has full write permission (chmod 766)

6E: Make sure the /cadviewer/ folder has the right owner structure, for example, 
```
sudo chown -R www-data:www-data /var/www/html/cadviewer
```

6G: If installing on a clean VM, such as Google Cloud or other providers, ensure that in addition to Apache, PHP is installed: 
```
sudo apt install php
```

6H: If installing on a clean VM, such as Google Cloud or other providers, for CAD conversion, ensure that fontconfig is installed: 
```
sudo apt -y install fontconfig
```


Once the 5: script handler is installed and 6: permissions settings are done, the HTML samples under /cadviewer/html/ can be run from a web-browser. 

Use **http://localhost/cadviewer/html/CADViewer_fileloader_80.html** as a starting point (assuming that your have installed under http://localhost).

See please see troubleshooting in: https://github.com/CADViewer/cadviewer-php-scripts , when using ***PHP***. 



## Documentation 

-   [CADViewer Techdocs and Installation Guide](https://cadviewer.com/cadviewertechdocs/download)


## How To Install CADViewer Handlers

Please refer to the general Documentation above, for the back-end handlers, there is more information on:  


- [NodeJS](https://cadviewer.com/cadviewertechdocs/handlers/nodejs/)
- [PHP](https://cadviewer.com/cadviewertechdocs/handlers/php/)
- [.NET](https://cadviewer.com/cadviewertechdocs/handlers/asp.net/)
- [Servlets](https://cadviewer.com/cadviewertechdocs/handlers/servlets/)
- [Angular](https://cadviewer.com/cadviewertechdocs/handlers/angular/)
- [ReactJS](https://cadviewer.com/cadviewertechdocs/handlers/reactjs/)
- [VueJS](https://cadviewer.com/cadviewertechdocs/handlers/vuejs/)


## Updating CAD Converters

This repository should contain the latest converters, but in case you need to update any of the back-end converters please follow: 

* [Download **AutoXchange**](/download/) (and other converters), install (unzip) AX2024 in **cadviewer/converters/ax2024/windows** or **cadviewer/converters/ax2024/linux** or in the designated folder structure.
* Read the sections on installing and handling [Fonts](https://tailormade.com/ax2020techdocs/installation/fonts/) in [AutoXchange 2024 TechDocs](https://tailormade.com/ax2020techdocs/) and [TroubleShooting](https://tailormade.com/ax2020techdocs/troubleshooting/).

* Try out the samples and build your own application!
 
 

 
 ## Troubleshooting

1: One issue that often appears in installations is that interface icons do not display properly:

![Icons](https://cadviewer.com/cadviewertechdocs/images/missing_icons.png "Icons missing")

Typically the variables *ServerUrl*, *ServerLocation* or *ServerBackEndUrl* in the controlling **HTML**  document in ***/cadviewer/html/*** are not set to reflect the front-end server url or port.

<pre style="line-height: 110%">


    var ServerBackEndUrl = "http://localhost/cadviewer/";  // or what is appropriate for my server; used for NodeJS server only
    var ServerUrl = "http://localhost/cadviewer/";   // or what is appropriate for my server
    var ServerLocation = ""; // or what is appropriate for my server
</pre>
 
 
 
**Have Fun!**  - and get in [touch](mailto:developer@tailormade.com)  with us!
