micayael/php-extras
===================

[![Build Status](https://travis-ci.org/micayael/php-extras.svg?branch=master)](https://travis-ci.org/micayael/php-extras)
![PHP Version](https://img.shields.io/packagist/php-v/symfony/symfony.svg)
[![Downloads](https://img.shields.io/packagist/dt/micayael/php-extras.svg)](https://packagist.org/packages/micayael/php-extras)
![License](https://img.shields.io/packagist/l/micayael/php-extras.svg)
[![Packagist](https://img.shields.io/packagist/v/micayael/php-extras.svg)](https://packagist.org/packages/micayael/php-extras)


### Array Functions and Static Methods

- array_filter_recursive: ArrayFunctions::ArrayFilterRecursive

### Date Functions and Static Methods

- getSanitizedDate: DateFunctions::getSanitizedDate
- getSanitizedTime: DateFunctions::getSanitizedTime
- getSanitizedDateTime: DateFunctions::getSanitizedDateTime
- getNextEndOfMonth: DateFunctions::getNextEndOfMonth
- getNextEndOfMonth: DateFunctions::getNextEndOfMonth, DateFunctions::getNextEndOfMonthQuiet
- getNextSaturday: DateFunctions::getNextSaturday
- getEndOfYear: DateFunctions::getEndOfYear
- getRemainingDays: DateFunctions::getRemainingDays, DateFunctions::getRemainingDaysQuiet
- isFutureDate: DateFunctions::isFutureDate, DateFunctions::isFutureDateQuiet
- isPastDate: DateFunctions::isPastDate, DateFunctions::isPastDateQuiet

### Html Functions and Static Methods

- createTable: HtmlFunctions::createTable
- nl2p: HtmlFunctions::nl2p

### String Functions and Static Methods

- highlight: StringFunctions::highlight
- lipsum: StringFunctions::lipsum
- slugify: StringFunctions::slugify
- sanitizeFilename: StringFunctions::sanitizeFilename
- hideEmail: StringFunctions::hideEmail, StringFunctions::hideEmailQuiet
- stringFormat: StringFunctions::stringFormat
- formatUrl: StringFunctions::formatUrl


Unit Tests
----------

    vendor/bin/simple-phpunit
