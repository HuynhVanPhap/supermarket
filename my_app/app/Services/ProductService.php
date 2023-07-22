<?php

namespace App\Services;

use App\Helpers\ImageHelper;
use App\Traits\Numeric;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;

class ProductService implements ServiceInterface
{
    use Numeric;

    /**
     * @inheritdoc
     */
    public function processing(Request $request): array
    {
        $params = $request->only([
            'name', 'category_id', 'price', 'stock', 'discount_percent', 'description'
        ]);
        $params['slug'] = Str::slug($params['name']).'-'.strtotime(date('d-m-y H:i:s'));
        $params['price'] = $this->covertToBackEndFormat($params['price']);

        if ($request->hasFile('image')) {
            $params['image'] = $this->handleImage($request->file('image'), $params['slug'], config('constraint.path.image.products'));
        } else {
            $params['image'] = $params['slug'];
        }

        return $params;
    }

    /**
     * Handlle product's image resize processing
     *
     * @param \Illuminate\Http\UploadedFile $file
     * @param string $name
     * @param array $path
     *
     * @return string
     */
    public function handleImage(UploadedFile $file, string $name, $path): string
    {
        $imageHelper = new ImageHelper($file);

        $imageHelper->setName($name);

        foreach($path as $item) {
            $imageHelper->setWidth($item['width']);
            $imageHelper->setHeight($item['height']);
            $imageHelper->setPath(storage_path('app/'.$item['path']));
            $imageHelper->resize();
        }

        return $imageHelper->getName();
    }
}
