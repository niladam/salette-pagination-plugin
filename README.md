# Pagination Plugin for Salette  (PHP 7.4)

This is a **translated and adapted** version of the official [Saloon Pagination Plugin](https://github.com/saloonphp/pagination-plugin), made compatible with **PHP 7.4**.

The original plugin requires PHP 8+, but this version was backported to support older projects still running on PHP 7.4. It retains all core functionality, including:

- Easy iteration over paginated API responses
- Mapping to custom DTOs
- Conversion to LazyCollections
- Asynchronous requests and pooling support

> ⚠️ **Note:** This is a **forked and translated version** of the official `saloonphp/pagination-plugin`. All credits for the original design and implementation go to the original authors. This package only aims to provide PHP 7.4 compatibility.

---

## Installation

You can install this plugin via Composer:

```bash
composer require nidalam/salette-pagination-plugin
