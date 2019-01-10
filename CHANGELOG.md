# Changelog

All notable changes to this extension will be documented in this file.

The extension is licensed under [AGPL-3.0](LICENSE.txt).

## 1.0.0 - 2019-01-10

### Added

* Can now send ecommerce transaction _and_ event data, or just one or the other
* Can now set a custom Event Category value, defaults to "Transaction"
* Debug mode - send data to Google Analytics hit validation service. Logs return data to Civi's ConfigAndLog

### Changed

* Simpler language for settings page field labels
* Standard event label and value now use Civi form ID and whole dollar amount of the transaction respectively

### Fixed

* Typo in variable name
* Syntax error in category conditional check

## 0.1.0 - 2018-11-06

### Added

* CHANGELOG.md
* Push ecommerce event or standard event to Google Analytics

### Changed

* Rendering of admin form (from @seamuslee001)

## 0.0.6 - 2018-11-05

### Added

* Admin form for extension settings (incomplete)
* Menu item for admin form
