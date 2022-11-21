# Kinsta - Hello World - Email Sending With PHP
An example of how to set your PHP application to send emails via SendGrid from Kinsta App Hosting services.

---
Kinsta is a developer-centric cloud host / PaaS. We’re striving to make it easier for you to share your web projects with your users. Focus on coding and building, and we’ll take care of deployment and provide fast, scalable hosting. + 24/7 expert-only support.

Get started for free, the first $20 is on us!

[Application Hosting](https://kinsta.com/application-hosting)

[Database Hosting](https://kinsta.com/database-hosting)

## Email Support At Kinsta
Kinsta does not natively support outbound email from servers. Sending emails through specialized outbound providers such as [SendGrid](https://sendgrid.com/) or [Mailchimp](https://mailchimp.com/) offers more flexibility and higher success rates for transactional and campaign emails.

> While Kinsta doesn't limit or control the outbound mail you send using a third-party SMTP service provider, we maintain a strict anti-spam policy. That policy covers email sent via an application or site hosted at Kinsta, even if we are not the SMTP provider.

## Environment Variables
Once you've created your application in MyKinsta you will need to set environment variables. You can do so through the Settings section of your application in Environment variables section by pressing the Add environment variable button. You'll need to set three variables:

* `SENDGRID_API_KEY`: The API key created on SendGrid
* `TEST_EMAIL_TO_ADDRESS`: The address you'd like to send the test email to
* `TEST_EMAIL_FROM_ADDRESS`: The address you'd like to send the test email from
* `TEST_ENDPOINT`: The endpoint you'd like to use as a trigger to send the test email. Please use a random string of at least 8 characters.

## Triggering an email
Through a very simple `index.php` entrypoint two endpoints are exposed, all others will return a 404:
* `/`: A simple page that returns the Hello World message
* `/${TEST_ENDPOINT}` A page that - when visited - will trigger the sending of a test email.

To trigger the sending of an email you'll need to find the URL of your deployment on the Deployments page. Append your test endpoint to this URL and visit that page to trigger the email.

For example, if your `TEST_ENDPOINT` is set to `o34nifnodhni4of` and your latest deployment is at `example.kinsta.app` you can trigger a test email by visiting `https://example.kinsta.app/o34nifnodhni4of`
