<?php
interface Command
{
    public function redact(): void;
}

class CommandCopy implements Command {
    public function redact(): void
    {
        // copySelection();
    }
}

class CommandCut implements Command {
    public function redact(): void
    {
       // cutSelection();
    }
}

class CommandPaste implements Command {
    public function redact(): void
    {
        // pasteSelection();
    }
}

interface Receiver
{
    public function execute();
}

class Editor implements Receiver {
    /**
     * @var Command
     */
    private $command;

    public function __construct(Command $command)
    {
        $this->command = $command;
    }

    public function execute()
    {
        $this->command->redact();
    }
}

class Controller {
    public function submit (Receiver $receiver) {
        $receiver->execute();
    }
}

$commandCopy = new CommandCopy();
$copyEditor = new Editor($commandCopy);
$command = new Controller();
$command->submit($copyEditor);