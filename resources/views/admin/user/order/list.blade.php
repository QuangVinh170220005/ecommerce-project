@extends('admin.layouts.app')
@section('content')
<div class="col-12">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Danh sách các đơn hàng</h4>
        </div>

        <div class="table-responsive">
            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th class="text-nowrap">Mã đơn hàng</th>
                        <th class="text-nowrap">ID Member</th>
                        <th class="text-nowrap">Tên người mua</th>
                        <th class="text-nowrap">Email</th>
                        <th class="text-nowrap">Số điện thoại</th>
                        <th class="text-nowrap">Địa chỉ giao hàng</th>
                        <th class="text-nowrap">Tổng tiền</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $item)
                    <tr>
                        <td class="text-nowrap">
                            {{ $item->id }}
                        </td>

                        <td class="text-nowrap">
                            {{ $item->id_user }}
                        </td>

                        <td class="text-nowrap">
                            {{ $item->name }}
                        </td>

                        <td class="text-nowrap">
                            {{ $item->email }}
                        </td>

                        <td class="text-nowrap">
                            {{ $item->phone }}
                        </td>

                        <td class="text-nowrap">
                            {{ $item->address }}
                        </td>

                        <td class="text-nowrap">
                            {{ number_format($item->price, 0, ',', '.') }}đ
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection