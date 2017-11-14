# Eventful - Event Sourcing Component

The Event Sourcing component of the Eventful DDD, CQRS & ES framework.

## Features

- [ ] Automatically dispatch events to listeners when an event is published by an Aggregate or an Entity.

- [ ] Automatically handle the listeners tasks when events are dispatched.

- [ ] Reconstitute Aggregate / Entity from past events.

- [ ] Scenario based testing helpers

when a command is called, handler is dispatched, event is published and state is changed.

when a command is called, handler is dispatched, event is published and listeners are handled.

when an existing aggregate or entity is initiated, events are applied and state should be as the last commit.

## Usage Examples


## Testing