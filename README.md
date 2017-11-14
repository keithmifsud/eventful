# Eventful - PHP CQRS & ES Framework

The aim of this project is to facilitate the development of PHP application using the Command, Query Responsibility Segregation and Event Sourcing Architecture. Together with Domain Driven Design Helpers.

It is not meant to be a one size fit all system and will possibly only be useful for developers wishing a quick start in learning these architectures.

[![Build Status](https://travis-ci.org/swellphp/eventful.svg?branch=master}.png?branch=master)](https://travis-ci.org/swellphp/eventful.svg?branch=master) [![Coverage Status](https://coveralls.io/repos/github/swellphp/eventful/badge.svg?branch=master)](https://coveralls.io/github/swellphp/eventful?branch=master)

## Under Development

This project is under initial development and should definitely not be used in any production systems.

## Problems I'm trying to solve using this framework based on what I didn't like using other similar frameworks and helpers.

1) I want that my models are completely independent from the framework.
The framework should not be intrusive because most projects require custom implementations and structures.

2) I want to easily be able to apply a TDD approach when developing any application.
3) I want it to integrate to Laravel.


## Components and features required for the initial release.

- [x] Installation via Composer. #GH-2

- [x] Command and Command Handling. #GH-3

- [ ] Event Bus, fire and subscribe. #GH-4

- [ ] Event Store. #GH-5

- [ ] Event Sourced Infrastructure Abstractions. #GH-6

- [ ] Read Model. # GH-7

- [ ] Domain Driven Design Helpers such as VOs, Aggregate and Entities. #GH-8

- [ ] Extraction of extensible classes within the custom Model to be used as adaptors for the ability of swapping such dependencies and also adding custom code on a per project basis. #GH-9

- [ ] Online Documentation using github projects. # GH-11

- [ ] Other features to be planned as we go along developing this release.

## Installation

Via composer:

`composer require swellphp/eventful`

## Documentation

- [Command Handling Documentation](https://github.com/swellphp/eventful/blob/master/src/Eventful/Command/README.md)

Other components are in progress of being developed.

## Contributing

In progress. However, feel free to fork this repository and submit pull requests.

All contributions must include tests for the code added, ability for developers to test their code by proving testing helpers when appropriate.

All contributions must also include an example and in case of full components (in their own directory) a Readme file documenting it's usage.

Issues must be created in advance of the development work and commit messages must mention the issue key in this format "GH-X".

## License

Open Source under the MIT Licence. https://opensource.org/licenses/MIT

