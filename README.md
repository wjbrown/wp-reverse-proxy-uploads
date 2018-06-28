# wp-reverse-proxy-uploads

Allows you to specify a reverse proxy (like AWS cloudfront) to serve attachment files.

## Requirements

You need to have a reverse-proxy setup to use this plugin. 

[Here's a guide for setting up cloudfront on AWS](https://atenea.marfeel.com/atn/marfeel-press/systems-requirements/set-up-a-reverse-proxy-configuration/create-a-reverse-proxy-and-cache-using-amazon-cloudfront)

The general idea behind a reverse proxy is that instead of outputting an image tag like this:

    <img src="http://yoursite.com/uploads/logo.png">

You will ouput something like this:

    <img src="http://12345678.cloudfront.net/uploads/logo.png">

Behind the scenes, the cloudfront.net server will serve the logo up from its cache.  If the logo isn't in its cache, it will fetch a copy from yoursite.com, cache it and serve it.

## Installation

1. Download the plugin and add it to the `plugins` directory.  
2. Activate the plugin through the admin.
3. Open wp-config.php and add the following

    ```
    define('REVERSE_PROXY_BASE_URL', 'YOUR-URL-HERE');
    // do NOT include the scheme (http:// or https://)
    // Just the hostname, something like '12345678.cloudfront.net'.
    ```

## Why bother with this?

It's an optimization.
