<?php

declare(strict_types=1);

namespace App\UseCases\Statistics;

use App\Const\GlobalConst;
use Illuminate\Support\Facades\DB;

class GetRevenueByMonthUseCase
{
    public function __invoke(?string $from, ?string $to): array
    {
        $data = DB::table('orders')
            ->selectRaw('sum(total_money) as revenue, month(created_at) as month, year(created_at) as year')
            ->where('status', 5)
            ->when($from, function ($query) use ($from, $to) {
                return $query->when($to, function ($query) use ($from, $to) {
                    return $query->whereBetween('created_at', [$from, $to]);
                }, function ($query) use ($from) {
                    return $query->where('created_at', '>=', $from);
                });
            }, function ($query) use ($to) {
                return !empty($to) ? $query->where('created_at', '<=', $to) : $query;
            })
            ->orderBy('year')
            ->orderBy('month')
            ->groupBy('month', 'year')->get();

        return [
            'status' => GlobalConst::STATUS_OK,
            'data' => $data
        ];
    }
}
