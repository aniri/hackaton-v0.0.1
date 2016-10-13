# Running the project
## Prerequisites
After trying and not managing to get it running on a vagrant virtual machine running both Ubuntu\Trusty64 and Ubuntu\Trusty32, I ran it on a Windows machine so this guide assumes Windows 7+.
### Node
You'll first need to install Node and NPM
https://nodejs.org/en/
6.7.0 Current.

### Cordova
You'll need to install Cordova 
> npm install -g cordova

as well as Ionic
> npm install -g ionic

## Installing npm dependencies
Go to the ciapp directory and run
> npm install

This will install the required npm dependencies as well as structure a www root for your application. You should get an error otherwise that there is no www/index or something like that.

## Serving the web app
Before we add support for Android, we use the web app to test. In order to run that, go into the ciapp directory and run
> ionic serve

This will have you use an ethernet adapter of your choice, I suggest for now you go with **localhost**. 

Once that is done, a nice running app should be available on http://localhost:8100.