<?php

declare(strict_types=1);

namespace App\UseCases\Slides;

use App\Const\GlobalConst;
use App\Models\Slide;

class DeleteSlideUseCase
{
    public function __invoke($id): array
    {
        $Slide = Slide::firstWhere('id', $id) ?? '';
        if (!$Slide) {
            return [
                'status' => GlobalConst::STATUS_ERROR,
                'error' => [
                    'code' => GlobalConst::IS_EMPTY,
                    'message' => 'Slide không tồn tại!'
                ]
            ];
        }
        $delete_Slide = $Slide->delete();
        if (!$delete_Slide) {
            return [
                'status' => GlobalConst::STATUS_ERROR,
                'error' => [
                    'code' => GlobalConst::DELETE_FAILED,
                    'message' => 'Xóa slide không thành công!'
                ]
            ];
        }

        return [
            'status' => GlobalConst::STATUS_OK
        ];
    }
}
