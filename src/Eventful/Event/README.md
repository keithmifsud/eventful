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

[WhenToDoIsPosted](https://github.com/swellphp/eventful/blob/master/src/Eventful/Example/Projection/Tasks/Listener/WhenToDoIsPosted.php)

and

[WhenToDoDescriptionIsChanged](https://github.com/swellphp/eventful/blob/master/src/Eventful/Example/Projection/Tasks/Listener/WhenToDoDescriptionIsChanged.php)

and

[WhenToDoIsPosted](https://github.com/swellphp/eventful/blob/master/src/Eventful/Example/Projection/Calendar/Listener/WhenToDoIsPosted.php)








## Testing
