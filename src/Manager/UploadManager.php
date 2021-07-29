<?php 

namespace App\Manager;

use Exception;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class UploadManager {
    /**
     * Params
     *
     * @var ParameterBagInterface $params
     */
    private $params;

    /**
     * Constructor
     *
     * @param ParameterBagInterface $params
     */
    public function __construct(ParameterBagInterface $params)
    {
        $this->params = $params;
    }
    /**
     * Upload file
     *
     * @param UploadedFile $file
     * @return void
     */
    public function uploadFile(UploadedFile $file) :string{

        $filename = md5(uniqid()).'.'.$file->guessClientExtension();
        $file->move(
            $this->params->get('upload_directory'),
            $filename
        );
        return $filename;
    }
}