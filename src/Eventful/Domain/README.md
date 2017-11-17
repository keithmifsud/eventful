# Eventful - Domain Helper Component

Provides extensible domain driven design classes.

## Usage

### Value Objects

Simply extend them.

__Example__

We need a Description string value object for the `\Eventful\Example\Model\ToDo\ToDo`.

Simply create a new Description value object and extend the `\Eventful\Domain\ValueObject\StringValueObject`

_Similar to_

[ToDo Description](https://github.com/swellphp/eventful/blob/master/src/Eventful/Example/Model/ToDo/Description.php)

In the above example, we added a custom condition to enforce that the description cannot either be empty or containing only whitespace.