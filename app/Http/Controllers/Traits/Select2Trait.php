<?php

namespace App\Http\Controllers\Traits;

trait Select2Trait
{
    /**
     * @param array  $data
     * @param string $id
     * @param string $text
     *
     * @return array
     */
    public function mapForSelect2(array $data = [], string $id = 'id', string $text = 'name'): array
    {
        return array_map(static function ($line) use ($id, $text) {
            return [
                'id'   => $line[$id],
                'text' => $line[$text],
            ];
        }, $data);
    }
}