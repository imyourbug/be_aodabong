<?php

declare(strict_types=1);

namespace App\UseCases\Slides;

use App\Const\GlobalConst;
use App\Models\Slide;

class UpdateSlideUseCase
{
    public function __invoke($params): array
    {
        $slide = Slide::firstWhere('id', $params['id']) ?? '';
        if (!$slide) {
            return [
                'status' => GlobalConst::STATUS_ERROR,
                'error' => [
                    'code' => GlobalConst::IS_EMPTY,
                    'message' => 'Slide không tồn tại!'
                ]
            ];
        }
        $update_slide = $slide->update($params);
        if (!$update_slide) {
            return [
                'status' => GlobalConst::STATUS_ERROR,
                'error' => [
                    'code' => GlobalConst::UPDATE_FAILED,
                    'message' => 'Cập nhật không thành công!'
                ]
            ];
        }

        return [
            'status' => GlobalConst::STATUS_OK
        ];
    }
}
