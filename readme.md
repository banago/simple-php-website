# Simple PHP Website

I am introducing this project after being motivated with one of my friend's words about PhP. I decided to clean it up a bit and put it on Github so any ew PhP developer can have a taste of a **very simple and minimal** website built with PhP.

This project is meant for beginners. I've intentionally kept it minimal while introducing some [separation of concerns](https://en.wikipedia.org/wiki/Separation_of_concerns).

## Installation

There are only two steps to run this website:

1. Download the project to the desired directory on your computer
2. Run  `php -S localhost:8080` on your terminal. Navigate to http://localhost:8080 to see the site.

By default, the page URLs use query strings (*?page=about*). You need to have Apache installed for pretly URLs (*/about*) to work. To activate pretty urls, update config value of `pretty_uri` to `true`.

## Concepts

The project covers these programming concepts:

 * Variables
 * Arrays
 * Functions
 * Pretty links *(/about) with fallback to query string (?page=about)*
 * Basic example of separation of concerns *(functionality, template, content)*

If you have any questions or recommendations for the project, please [create an issue](https://github.com/banago/simple-php-website/issues/new) or hit me up on Twitter [@banago](https://twitter.com/banago).

> To help you take your knowledge of PHP to the next level, I've personally hunt down what I deem to be the best introductory course on PHP out there. I wish this course existed when I started learing PHP. Check it out on Udemy: [PHP for Beginners Course](https://click.linksynergy.com/link?id=jTy10g8O/M8&offerid=507388.1576856&type=2&murl=https%3A%2F%2Fwww.udemy.com%2Fphp-for-beginners-%2F).

## License

MIT
