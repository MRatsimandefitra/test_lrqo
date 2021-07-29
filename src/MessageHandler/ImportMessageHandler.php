<?php

namespace App\MessageHandler;

use App\Message\Message;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;
use App\Manager\ImportManager;
use App\Message\ImportMessage;

class ImportMessageHandler implements MessageHandlerInterface {

    private $importManager; 

    public function __construct(ImportManager $importManager)
    {
        $this->importManager = $importManager;
    }
    public function __invoke(ImportMessage $message)
    {
        if ($message instanceof ImportMessage) {
            $this->importManager->stepImport($message->getFilename(), $message->getStartIndex(),$message->getLength());
        }
    }
}