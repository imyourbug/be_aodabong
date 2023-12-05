<?php

declare(strict_types=1);

namespace App\UseCases\Clients\Checkouts;

use App\Const\GlobalConst;
use Exception;

class CheckOutVnpayUseCase
{
    public function __invoke(array $params): array
    {
        try {
            $vnp_Url = 'https://sandbox.vnpayment.vn/paymentv2/vpcpay.html';
            $vnp_ReturnUrl = env('DOMAIN_FE', 'http://localhost:8080') . '/vnp_callback.html';
            $vnp_TmnCode = env('VNPAY_WEB_CODE', '2A1WV5LI');
            $vnp_HashSecret = env('VNPAY_HASH_SECRET', 'JDHYSONCQOQNWUKTQFPJUURCJHHIUKKN');

            $vnp_TxnRef = time() . '';
            $vnp_OrderInfo = 'Thanh toán đơn hàng';
            $vnp_OrderType = 'billpayment';
            $vnp_Amount = intval($params['total']) * 100;
            $vnp_Locale = 'vn';
            $vnp_BankCode = 'NCB';
            $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];

            $inputData = [
                'vnp_Version' => '2.1.0', //
                'vnp_TmnCode' => $vnp_TmnCode, //
                'vnp_Amount' => $vnp_Amount, //
                'vnp_Command' => 'pay', //
                'vnp_CreateDate' => date('YmdHis'), //
                'vnp_CurrCode' => 'VND', //
                'vnp_IpAddr' => $vnp_IpAddr, //
                'vnp_Locale' => $vnp_Locale, //
                'vnp_OrderInfo' => $vnp_OrderInfo, //
                'vnp_OrderType' => $vnp_OrderType,
                'vnp_ReturnUrl' => $vnp_ReturnUrl,
                'vnp_TxnRef' => $vnp_TxnRef,
            ];

            if (isset($vnp_BankCode) && $vnp_BankCode != '') {
                $inputData['vnp_BankCode'] = $vnp_BankCode;
            }
            if (isset($vnp_Bill_State) && $vnp_Bill_State != '') {
                $inputData['vnp_Bill_State'] = $vnp_Bill_State;
            }

            //var_dump($inputData);
            ksort($inputData);
            $query = '';
            $i = 0;
            $hashdata = '';
            foreach ($inputData as $key => $value) {
                if ($i == 1) {
                    $hashdata .= '&' . urlencode((string)$key) . '=' . urlencode((string)$value);
                } else {
                    $hashdata .= urlencode((string)$key) . '=' . urlencode((string)$value);
                    $i = 1;
                }
                $query .= urlencode((string)$key) . '=' . urlencode((string)$value) . '&';
            }

            $vnp_Url = $vnp_Url . '?' . $query;
            if (isset($vnp_HashSecret)) {
                $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret); //
                $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
            }

            return [
                'status' => GlobalConst::STATUS_OK,
                'url' => $vnp_Url
            ];
        } catch (Exception $e) {
            return [
                'status' => GlobalConst::STATUS_ERROR,
                'error' => [
                    'code' => GlobalConst::CHECKOUT_FAILED,
                    'message' => $e->getMessage()
                ]
            ];
        }
    }
}
