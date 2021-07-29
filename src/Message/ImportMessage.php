<?php

namespace App\Message;

class ImportMessage {

    /**
     * StartIndexImport
     *
     * @var int $startIndex
     */
    private $startIndex;

    /**
     * Length
     *
     * @var int $length
     */
    private $length;

    /**
     * File to import
     *
     * @var string $filename
     */
    private $filename;
    /**
     * Content of message
     *
     * @var string $content
     */
    private $content;

    public function __construct(string $filename, int $startIndex, int $length, string $content)
    {
        $this->filename = $filename;
        $this->startIndex = $startIndex;
        $this->length = $length;
        $this->content = $content;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * Set $content
     *
     * @param  string  $content  $content
     *
     * @return  self
     */
    public function setContent(string $content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get the value of startIndex
     */ 
    public function getStartIndex()
    {
        return $this->startIndex;
    }

    /**
     * Set the value of startIndex
     *
     * @return  self
     */ 
    public function setStartIndex($startIndex)
    {
        $this->startIndex = $startIndex;

        return $this;
    }

    /**
     * Get $length
     *
     * @return  int
     */ 
    public function getLength()
    {
        return $this->length;
    }

    /**
     * Set $length
     *
     * @param  int  $length  $length
     *
     * @return  self
     */ 
    public function setLength(int $length)
    {
        $this->length = $length;

        return $this;
    }

    /**
     * Get $filename
     *
     * @return  string
     */ 
    public function getFilename()
    {
        return $this->filename;
    }

    /**
     * Set $filename
     *
     * @param  string  $filename  $filename
     *
     * @return  self
     */
    public function setFilename(string $filename)
    {
        $this->filename = $filename;

        return $this;
    }
}