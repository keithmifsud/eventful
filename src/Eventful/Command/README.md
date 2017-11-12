# Eventful Command Component

The command component of the Eventful DDD, CQRS & ES framework.

## Features

- [x] Command Subscriber
- [x] Command Bus
- [x] Command Handling
- [ ] Command Testing Helpers  (In progress as events are needed to test)


## Usage Examples

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

[Array of commands with handlers](https://github.com/swellphp/eventful/blob/master/src/Eventful/Example/config/eventful-commands.php)

Then instantiate the `\Eventful\Command\CommandBus` by passing the `\Eventful\Command\CommandSubscriber` to it.

___Similar to:___

[Bootstrap](https://github.com/swellphp/eventful/blob/master/src/Eventful/Example/app/bootstrap.php)

and dispatch the command from your application service or controller.

__Similar to:__

[Application service](https://github.com/swellphp/eventful/blob/master/src/Eventful/Example/app/Services/ToDo/PostNewToDo.php)

Simply call the `dispatch` method on the `\Eventful\Command\CommandBus` and pass it the command you wish to dispatch.

## Testing

Testing helpers will be included soon so that we can test that a command has triggered and recorded an event.

