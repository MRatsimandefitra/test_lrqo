<?php

namespace App\Controller;

use App\Manager\ImportManager;
use App\Manager\UploadManager;
use App\Message\ImportMessage;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Messenger\MessageBusInterface;

class UploadController extends AbstractController
{
    /**
     * @Route("/api/upload", name="upload", methods={"POST"})
     */
    public function upload(Request $request, UploadManager $uploadManager, MessageBusInterface $bus, ImportManager $importManager): Response
    {
        $file = $request->files->get('files');
        $filename = $uploadManager->uploadFile($file);
        $rows = $importManager->getCsvToArray($filename);
        $starIndex = 0;
        $length = 10;
        do {
            $importMessage  = new ImportMessage($filename, $starIndex, $length, 'import');
            $starIndex += $length;
            $bus->dispatch($importMessage);
        } while($starIndex < count($rows));

        return $this->json([
            'message' => 'File uploaded'
        ]);
    }
}
