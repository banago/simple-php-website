# Simple PHP Website

I put together this project while introducing a friend of mine to PHP. I decided to clean it up a bit and put it on GitHub so anyone new to PHP can have a taste of a **very simple and minimal** website built with PHP.

This project is meant for beginners. I've intentionally kept it minimal while introducing some [separation of concerns](https://en.wikipedia.org/wiki/Separation_of_concerns).

## Installation

The site requires **PHP 8+**. There are only two steps to run it:

1. Download the project (or `git clone https://github.com/banago/simple-php-website.git`) to the desired directory on your computer
2. Run  `php -S localhost:8080` on your terminal and navigate to http://localhost:8080 to see the site.

By default, the page URLs use query strings (*?page=about*). You need to have Apache installed for pretty URLs (*/about*) to work. To activate pretty urls, update the config value of `pretty_uri` to `true`.

## Concepts

The project covers these programming concepts:

* Variables
* Arrays
* Functions
* Pretty links *(/about) with fallback to query string (?page=about)*
* Basic example of separation of concerns *(functionality, template, content)

If you have any questions or recommendations for the project, please [create an issue](https://github.com/banago/simple-php-website/issues/new) or hit me up on X [@banago](https://x.com/banago).

> To take your PHP further, two free resources I'd recommend:
> - **Read** [PHP Explained](https://stitcher.io/php) — a modern, in-depth written guide.
> - **Watch** [Learn PHP The Right Way](https://youtube.com/playlist?list=PLr3d3QYzkw2xabQRUpcZ_IBk9W50M9pe-) — a full beginner-to-advanced video course.

## License

MIT
