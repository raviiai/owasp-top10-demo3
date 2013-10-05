# OWASP Bank Demo
This is not a real banking application. Seriously. The purpose of this application is to demonstrate some common security vulnerabilities that exist on the web.

This demo is developed in PHP and based on the Laravel framework.

## Current vulnerabilities
A (partial?) list of vulnerabilities in this application. References in parentheses are to OWASP Top 10 2013.

- Encryption key has not been changed from the framework default, so all encrypted data can easily be decrypted (*A5 - Security Misconfiguration*)
- Passwords are stored as vanilla SHA1 hashes (*A6 - Sensitive Data Exposure*)
- Transaction comments are open to XSS attacks (*A3 - Cross-Site Scripting*)
- No validation that the current user owns the account from which money is sent (*A4 - Insecure Direct Object References / A7 - Missing Function Level Access Control*)
- CSRF tokens are never validated (*A8 - Cross-Site Request Forgery*)

## Get started
Download repository and run ```composer update```. Once all dependencies have been downloaded, run ```artisan migrate --seed``` to set up the database and create some sample data.
