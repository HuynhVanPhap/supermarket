<?php

namespace App\Helpers;

use Illuminate\Http\UploadedFile;
use App\Helpers\FileHelper;
use Intervention\Image\Facades\Image;

class ImageHelper extends FileHelper
{
    /**
     * @var int
     */
    protected $width;

    /**
     * @var int
     */
    protected $height;

    /**
     * Set width for image
     *
     * @return void
     */
    public function setWidth(int $width)
    {
        $this->width = $width;
    }

    /**
     * Get width for image
     *
     * @return int
     */
    public function getWidth(): int
    {
        return $this->width;
    }

    /**
     * Set height for image
     *
     * @return void
     */
    public function setHeight(int $height)
    {
        $this->height = $height;
    }

    /**
     * Get height for image
     *
     * @return int
     */
    public function getHeight(): int
    {
        return $this->height;
    }

    public function __construct(UploadedFile $file)
    {
        $this->file = $file;
    }

    /**
     * Rezise image before upload
     *
     * @return void
     */
    public function resize()
    {
        $img = Image::make($this->file->path());

        return $img->resize($this->getWidth(), $this->getHeight(), function ($const) {
            $const->aspectRatio();
        })->save($this->getPath().$this->name);
    }
}
