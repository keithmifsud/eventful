# Eventful = Command Component

The command component of the Eventful DDD, CQRS & ES framework.

## Features

- [x] Command Subscriber
- [x] Command Bus
- [x] Command Handling
- [ ] Command Testing Helpers - ? In progress as events are needed to test.


## Bootstraping


## Usage



1) Create a command class which must implement the Command Interface.

2) Create a command handler class which must implement the CommandHandler interface.

3) When booting the application, instantiate the CommandSubscriber with an array of commands and handlers.

4) When dispatching a command from an application service class, instantiate the CommandBus by passing the CommandSubscriber and call the dispatch method by passing a new instance of the Command to dispatch.

### Examples

A simple "ToDo" model is included in this package to outline how to:

__Create a command__

___Similar to:___

[PostToDo Command](https://github.com/swellphp/eventful/blob/master/src/Eventful/Example/Model/ToDo/Command/PostTodo.php)

You can place your command anywhere an name whatever you wish. The only requirements is that you implement the `Eventful\Command\Command` interface.

__Create a command handler__

___Similar to:___

[PostToDoCommandHandler](https://github.com/swellphp/eventful/blob/master/src/Eventful/Example/Model/ToDo/Handler/PostToDoCommandHandler.php)

Same as with the command, you can place this handler anywhere you prefer. You only need to implement the `\Eventful\Command\CommandHandler` interface.


__Dispatch the command__

Depending on your application structure / framework, instantiate the `\Eventful\Command\CommandSubscriber` with an array of commands and handlers.

___Similar to:___

[Array of commands with handlers](https://github.com/swellphp/eventful/blob/master/src/Eventful/Example/config/eventful-commands.php_

Then instantiate the `\Eventful\Command\CommandBus` by passing the `\Eventful\Command\CommandSubscriber` to it.

___Similar to:___



Simply call the `dispatch` method on the `\Eventful\Command\CommandBus` and pass it the command you wish to dispatch.

