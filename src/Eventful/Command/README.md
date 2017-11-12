# Eventful = Command Component

The command component of the Eventful DDD, CQRS & ES framework.

## Features

- [ ] Command Bus
- [ ] Command Handling
- [ ] Command Testing Helpers



## Usage

1) Create a command class which must implement the Command Interface.

2) Create a command handler class which must implement the CommandHandler interface.

3) When booting the application, instantiate the CommandSubscriber with an array of commands and handlers.

4) When dispatching a command from an application service class, instantiate the CommandBus by passing the CommandSubscriber and call the dispatch method by passing a new instance of the Command to dispatch.

### Examples