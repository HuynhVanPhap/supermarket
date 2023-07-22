<?php

namespace App\Services;

use Illuminate\Http\Request;

interface ServiceInterface
{
    /**
     * Process input's data
     *
     * @param Illuminate\Http\Request $request
     *
     * @return array
     */
    public function processing(Request $request): array;
}
