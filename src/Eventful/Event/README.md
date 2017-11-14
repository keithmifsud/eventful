# Eventful - Event Components

The Event Component of the Eventful DDD, CQRS & ES framework.

## Features

- [x] Event Subscriber

Subscribes the events and their listeners.

where to put event listeners?

- [x] Event Bus

Handles the publishing of events to it's listeners and calls the handle method.

- [ ] Testing helpers using scenarios. In progress #GH-16

## Usage Examples

A simple "ToDo" model is included in this package to outline how to:

__Create an Event__

_Similar to:_

[ToDoWasPosted](https://github.com/swellphp/eventful/blob/master/src/Eventful/Example/Model/ToDo/Event/ToDoWasPosted.php)

and

[ToDoWasDescriptionWasChanged](https://github.com/swellphp/eventful/blob/master/src/Eventful/Example/Model/ToDo/Event/ToDoDescriptionWasChanged.php)

__Create an Event Listener__

_Similar to:_

[WhenToDoWasPosted](https://github.com/swellphp/eventful/blob/master/src/Eventful/Example/Projection/Tasks/Listener/WhenToDoWasPosted.php)

and

[WhenToDoDescriptionWasChanged](https://github.com/swellphp/eventful/blob/master/src/Eventful/Example/Projection/Tasks/Listener/WhenToDoDescriptionWasChanged.php)

and

[WhenToDoWasPosted](https://github.com/swellphp/eventful/blob/master/src/Eventful/Example/Projection/Calendar/Listener/WhenToDoWasPosted.php)

__Dispatch the event__

Depending on your application structure / framework, instantiate the `\Eventful\Event\EventSubscriber` with an array of events and listeners.

_Similar to:_

[Array of events with listeners](https://github.com/swellphp/eventful/blob/master/src/Eventful/Example/config/eventful-events.php)

Then instantiate the `\Eventful\Event\EventBus` by passing the `\Eventful\Event\EventSubscriber` to it.

_Similar to:_

[Bootstrap](https://github.com/swellphp/eventful/blob/master/src/Eventful/Example/app/bootstrap.php)

### Usage from model's Aggregates and Entities

In progress.

## Testing

Testing helpers will be included soon.

