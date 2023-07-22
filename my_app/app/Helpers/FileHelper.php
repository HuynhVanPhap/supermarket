<?php

namespace App\Helpers;

use Exception;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Log;

abstract class FileHelper
{
    /**
     * @var Illuminate\Http\UploadedFile
     */
    protected $file;

    /**
     * @var String
     */
    protected $name;

    /**
     * @var String
     */
    protected $path;

    public function setFile(UploadedFile $file)
    {
        $this->file = $file;
    }

    public function getFile()
    {
        return $this->file;
    }

    public function setName(string $name)
    {
        $this->name = $name.'.'.$this->file->extension();
    }

    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Set path to put file
     *
     * @param String $path
     *
     * @return void
     */
    public function setPath(string $path)
    {
        $this->path = $path;
    }

    /**
     * Set path to put file
     *
     * @return String
     */
    public function getPath(): string
    {
        return $this->path;
    }

    /**
     * Upload file
     *
     * @param string $disk
     *
     * @return void
     */
    public function upload(string $disk = 'local')
    {
        try {
            return $this->file->storeAs($this->getPath(), $this->name, $disk);
        } catch (Exception $e) {
            Log::error('Upload file fail : '.$e->getMessage().' name file : '.$this->name);
        }
    }
}
