<?php

declare(strict_types=1);

namespace App\UseCases\Clients;

use App\Const\GlobalConst;
use Exception;

class CheckOutUseCase
{
    public function __invoke(array $params): array
    {
        try {
            // trả về trang thanh toán
            $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
            // thanh toán thành công sẽ trả về url này
            $vnp_ReturnUrl = "http://localhost:8000/api/clients/check_out/callback";
            $vnp_TmnCode = "S9C9IWLW"; //Mã website tại VNPAY 
            $vnp_HashSecret = "WLQUGAPVNAWGPOPETIHVZWFHJRAXLDVQ"; //Chuỗi bí mật

            $vnp_TxnRef = '2356'; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
            $vnp_OrderInfo = 'Thanh toán đơn hàng';
            $vnp_OrderType = 'billpayment';
            $vnp_Amount = 20000 * 100;
            $vnp_Locale = 'vn';
            $vnp_BankCode = 'NCB';
            $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];

            $inputData = array(
                "vnp_Version" => "2.1.0", //
                "vnp_TmnCode" => $vnp_TmnCode, //
                "vnp_Amount" => $vnp_Amount, //
                "vnp_Command" => "pay", //
                "vnp_CreateDate" => date('YmdHis'), //
                "vnp_CurrCode" => "VND", //
                "vnp_IpAddr" => $vnp_IpAddr, //
                "vnp_Locale" => $vnp_Locale, //
                "vnp_OrderInfo" => $vnp_OrderInfo, //
                "vnp_OrderType" => $vnp_OrderType,
                "vnp_ReturnUrl" => $vnp_ReturnUrl,
                "vnp_TxnRef" => $vnp_TxnRef,
            );

            if (isset($vnp_BankCode) && $vnp_BankCode != "") {
                $inputData['vnp_BankCode'] = $vnp_BankCode;
            }
            if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
                $inputData['vnp_Bill_State'] = $vnp_Bill_State;
            }

            //var_dump($inputData);
            ksort($inputData);
            $query = "";
            $i = 0;
            $hashdata = "";
            foreach ($inputData as $key => $value) {
                if ($i == 1) {
                    $hashdata .= '&' . urlencode((string)$key) . "=" . urlencode((string)$value);
                } else {
                    $hashdata .= urlencode((string)$key) . "=" . urlencode((string)$value);
                    $i = 1;
                }
                $query .= urlencode((string)$key) . "=" . urlencode((string)$value) . '&';
            }

            $vnp_Url = $vnp_Url . "?" . $query;
            if (isset($vnp_HashSecret)) {
                $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret); //  
                $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
            }
            $returnData = array(
                'code' => '00', 'message' => 'success', 'data' => $vnp_Url
            );
            // if (isset($_POST['redirect'])) {
            //     header('Location: ' . $vnp_Url);
            //     die();
            // } else {
            //     echo json_encode($returnData);
            // }
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
