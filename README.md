micayael/php-extras
===================

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

    vendor/bin/phpunit

Reformat Code
-------------

    vendor/bin/php-cs-fixer fix