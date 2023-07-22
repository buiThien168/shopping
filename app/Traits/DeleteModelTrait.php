<?php

namespace App\Traits;

use Exception;
use Illuminate\Support\Facades\LOG;

trait DeleteModelTrait
{
    public function DeleteModelTrait($id, $models)
    {
        try {
            $models->find($id)->delete();
            return response()->json([
                'code' => 200,
                'message' => 'Delete success'
            ], 200);
        } catch (Exception $exception) {
            Log::error('Message' . $exception->getMessage());
            return response()->json([
                'code' => 500,
                'message' => 'Delete fail'
            ], 500);
        }
    }
}