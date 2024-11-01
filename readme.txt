=== ThreatPoint Email Validator ===
Contributors: threatpointuk
Donate link: https://threatpoint.co.uk/donate/
Tags: contact form, spambots, stop spam, email validation, email checker 
Requires at least: 3.5.2
Tested up to: 6.3 
Requires PHP: 5.4
Stable tag: 1.4
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

== Description == 
This plugin validates email in realtime using live connections and aggregated data, by leveraging the ThreatPoint email verification API service. One use of this is to prevent spam bots inputting content into comments, easily and effectively

== External Service == 
This plugin allows administrators include email validation using a real time verification service provided by the ThreatPoint email verification API. 
The Plugin uses existing is_email functionality and passes manually entered email addresses to the restAPI service at ThreatPoint. 
The response back from the ThreatPoint API provides information related to the email validity(valid email, valid domain, disposable, free, role, risk score). Automatically stop spam bots from entering comments onto your posts by verifying the email address first.

The plugin calls the rest API (requires an API KEY) at [this ThreatPoint api endpoint](https://verify.threatpoint.co.uk/api/v1/resources/)
The rest API is only passed the email address from the contact form via the is_email function.
This external service is called whenever a form using is_email is used. By default the Contact Form 7 is supported. You can include any form field name (email address field) in the plugin to override the default.
An API key is required to utilise the service, although the plugin will operate without one it will not be able to pass the email address or call any data from the API. 
Your email addresses will not be validated without a valid API key. 

== Privacy Policy ==
The privacy policy for the api services is viewable here [privacy policy](https://threatpoint.co.uk/privacy-policy)
This plugin only passes the email address information - no other PII is transferred. The email address is analysed across the aggregated data within the ThreatPoint email verification reputation service and a risk score with email properties (valid, free, role, disposable) to the plugin. Simple rules within the plugin dictate whether the email address is considered valid(set through the plugin settings). The email address is stored in the email address aggregated data and used as part of email address consortium for all customers. No other data such as originating website is stored. Only the email address  is held, with date, time and risk scores associated with the request.
 
== Plugin Features ==
* Validates email addresses in real time including:
* Valid email
* Valid domain
* Disposable Addresses (One time Use)
* Role/Group Addresses
* Free Email Addresses
* Breached Email Addresses
* Email Addresses known to be high risk (spam)
* API Documentation is available here: [documentation](https://threatpoint.co.uk/documentation)
* Video is here [youtube https://youtu.be/YD9CAx4f3FM]
 
== Special Features ==
* Provide real time email validation and decisions through configuration to allow an administrator the correct flow for their site.

== Configuration Items ==
* API Key - An API key is required to access the email address validation service as explained above - (api@threatpoint.co.uk)
* Blacklisted domains - a list of domains that you would not wish to have entered into your forms
* Email Field Name - the field name to pick the email address values from. Defaults to 'your-email' which is the contact form 7 default
* Allow Free Email addresses?  - Option to allow or deny free email addresses (gmail, yahoo, hotmail etc.)
* Allow disposable Email addresses? - Option to allow or deny one time use email addresses
* Allows Role/Group Email Addresses? - Option to allow role and group email addresses (sales@company.com) for example
 
== Localization ==
* English (default) - only language currently supported
 
== Feedback ==
* Many thanks for taking the time to look at the plugin
* Drop the ThreatPoint team a line [@threatuk](http://twitter.com/#!/threatuk) on Twitter
* Email questions or suggestions via (info@threatpoint.co.uk)
* Api key requests via info@threatpoint.co.uk
 
== Installation ==
1. Download plugin from WordPress! or manually upload the entire 'ThreatPoint-email' folder to the '/wp-content/plugins/' directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. The ThreatPoint-Email settings menu will appear
4. Fill in the API Key and other options
5. Save the settings
6. Save the page
 
== Frequently Asked Questions ==
 
= Does this plugin work with newest WP versions and also older versions? =
Yes, this plugin works with 3.5.2 and above.
We tested on versions 3.5.2, 4.9.5 up to 5.3.2. As the plugin is simply a way of calling the api and consuming the response the plugin should function in most versions, although we tested mainly on the two versions listed.
 
= We have new feature suggestions for the configuration page, how do we contact you? =
Please send the ThreatPoint team an email at [info@threatpoint.co.uk]. We know that the risk decision process can vary - we are interested to hear feedback.
 
= Can I access the API documentation? =
Yes, please use the following link to the ThreatPoint API documentation: [documentation](https://threatpoint.co.uk/documentation)
 
== Screenshots ==
1. Plugin Settings Page
 
== Changelog ==
= 1.4 =
added admin url input to stop event firing on admin functions
= 1.3 =
* Top 10 Email stats added
= 1.2 =
* fixed broken image url
= 1.1 =
* Removed issue where plugin is active during admin user creation
= 1.0 =
* Initial release
 
== Upgrade Notice ==
= 1.2 = 
Nothing to see here
= 1.1 =
Removed issue where plugin is active during admin user creation
= 1.0 =
First release
 
== Translations ==
 
* English - default, currently the only language supported
 
== Contributors & Developers ==
* The ThreatPoint team are often asked to investigate attacks on web sites and other services. More often than not these attacks begin from IP addresses that should be considered before access is granted.
* ThreatPoint UK provide IP reputation, email verification, device reputation, dark web monitoring and password monitoring services as part of the API service layer. Please contact info@threatpoint.co.uk to find out more about these additional services.
* The ThreatPoint IP Reputation WordPress plugin is also available from the WordPress official site.
 
== Credits ==
* Many credits go to the fraud and analytics team at ThreatPoint UK and the team behind the API services
* Credits to numerous wordpress tutorials used to understand the plugin creation process. notably this article https://www.sitepoint.com/real-world-example-wordpress-plugin-development/
