<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width">
    <title></title>
    <style></style>
</head>

<body>
    <div class="tbl-hd">
        <table cellspacing="0">
            <tbody>
                @php
                    $dateTime = new DateTime($content['customer']['created_at']);
                    $formattedDate = $dateTime->format('Y-m-d H:i:s');
                @endphp
                <caption>ĐƠN ĐẶT HÀNG</caption>
                <tr>
                    <td colspan="3">Ngày: {{ $formattedDate }}</td>
                    <td colspan="3">Mã đơn hàng: {{ $content['order']['id'] }}</td>
                </tr>
                <tr>
                    <td colspan="6">Tên người nhận: {{ $content['customer']['name'] }}</td>
                </tr>
                <tr>
                    <td colspan="6">Email: {{ $content['customer']['email'] }}</td>
                </tr>
                <tr>
                    <td colspan="6">Địa chỉ: {{ $content['customer']['address'] }}</td>
                </tr>
                <tr>
                    <td colspan="6">Số điện thoại: {{ $content['customer']['phone'] }}</td>
                </tr>

                <tr class="row-txt">
                    <td class="col-txt">Mã sản phẩm</td>
                    <td class="col-txt">Tên sản phẩm</td>
                    <td class="col-txt">Số lượng</td>
                    <td class="col-txt">Đơn giá</td>
                    <td class="col-txt">Thành tiền</td>
                </tr>
                @php
                    $total = 0;
                @endphp
                @foreach ($content['carts'] as $key => $product)
                    <tr>
                        <td class="col-infor">{{ $product['detail']['product_id'] }}</td>
                        <td class="col-infor1">{{ $product['detail']['product']['name'] }}</td>
                        <td class="col-infor">{{ $product['quantity'] }}</td>
                        <td class="col-infor2">
                            {{ number_format($product['unit_price'], 0, ',', '.') }}<sup>đ</sup>
                        </td>
                        <td class="col-infor2">
                            {{ number_format($product['unit_price'] * $product['quantity'], 0, ',', '.') }}<sup>đ</sup>
                        </td>
                    </tr>
                @endforeach
                <tr>
                    <td colspan="4"></td>
                    <td style="float: right;">--</td>
                </tr>
                <tr>
                    <td colspan="3" rowspan="5">Ghi chú:......................</td>
                </tr>
                <tr>
                    <td>Tổng thanh toán: </td>
                    <td class="col-infor2">
                        {{ number_format($content['order']['total_money'], 0, ',', '.') }}<sup>đ</sup>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
