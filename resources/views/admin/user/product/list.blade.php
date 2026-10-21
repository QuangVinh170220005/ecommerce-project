@extends('admin.layouts.app')
@section('content')
<div class="col-12">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Danh sách sản phẩm</h4>
            <div style="width: 300px;">
                <input type="text" id="keyword" class="form-control" placeholder="Tìm kiếm sản phẩm...">
            </div>
        </div>

        <div class="table-responsive">
            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th class="text-nowrap">ID</th>
                        <th class="text-nowrap">Ảnh</th>
                        <th class="text-nowrap">Tên sản phẩm</th>
                        <th class="text-nowrap">Giá</th>
                        <th class="text-nowrap">Danh mục</th>
                        <th class="text-nowrap">Thương hiệu</th>
                        <th class="text-nowrap">Trạng thái</th>
                        <th class="text-nowrap">Giảm giá</th>
                        <th class="text-nowrap">Hành động</th>
                    </tr>
                </thead>

                <tbody id="product-list">
                    @foreach ($products as $product )
                    <tr>
                        <td class="text-nowrap">
                            {{ $product->id }}
                        </td>
                        <td class="text-nowrap">
                            @php
                            $images = json_decode($product->image, true);
                            @endphp
                            <img src="{{ asset('user/images/product-details/' . $images[0]) }}"
                                alt="{{ $product->name }}" width="70" height="70" style="object-fit: cover;">
                        </td>
                        <td class="text-nowrap">
                            {{ $product->name }}
                        </td>
                        <td class="text-nowrap">
                            {{ number_format($product->price, 0, ',', '.') }}
                        </td>
                        <td class="text-nowrap">
                            @foreach ($category as $cate )
                            @if($cate->id == $product->id_category)
                            {{ $cate -> name }}
                            @endif
                            @endforeach
                        </td>
                        <td class="text-nowrap">
                            @foreach ($brands as $brand )
                            @if($brand->id == $product->id_brand)
                            {{ $brand -> name }}
                            @endif
                            @endforeach
                        </td>


                        <td class="text-nowrap">
                            @if ($product->status == 1)
                            <span class="badge badge-success">Sale</span>
                            @else
                            <span class="badge badge-warning">New</span>
                            @endif
                        </td>

                        <td class="text-nowrap">
                            @if ($product->status == 1 && $product->sale > 0)
                            {{ $product->sale }}%
                            @else
                            —
                            @endif
                        </td>
                        <td>
                            <a href="/admin/product/edit/{{ $product -> id }}" class="btn btn-primary btn-xs">
                                <i class="fa fa-pencil"></i> Sửa
                            </a>
                            <button type="button" class="btn btn-dark btn-xs btn-delete" data-id="{{ $product -> id }}">
                                <i class="fa fa-trash"></i> Xóa
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#keyword').keydown(function(e) {
            if (e.key == 'Enter') {
                e.preventDefault();
                let keyword = $(this).val();
                $.ajax({
                    type: 'POST',
                    url: "{{ url('/admin/product/search') }}",
                    data: {
                        key: keyword,
                        _token: $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(res) {
                        console.log(res)
                        let html = '';

                        $.each(res.products, function(i, p) {
                            let images = JSON.parse(p.image || '[]');
                            html += `
                                <tr>
                                    <td>${p.id}</td>
                                    <td>
                                        ${images.length ? `<img src="{{ asset('user/images/product-details') }}/${images[0]}" width="70" height="70" style="object-fit:cover">` : ''}
                                    </td>
                                    <td>${p.name}</td>
                                    <td>${Number(p.price)}</td>
                                    <td>${p.id_category}</td>
                                    <td>${p.id_brand}</td>
                                    <td>
                                        ${Number(p.status) === 1
                                            ? '<span class="badge badge-success">Sale</span>'
                                            : '<span class="badge badge-warning">New</span>'}
                                    </td>
                                    <td>${Number(p.status) === 1 && Number(p.sale) > 0 ? p.sale + '%' : '—'}</td>
                                    <td>
                                        <a href="/admin/product/edit/${p.id}" class="btn btn-primary btn-xs">
                                            <i class="fa fa-pencil"></i> Sửa
                                        </a>
                                        <button type="button" class="btn btn-dark btn-xs btn-delete" data-id="${p.id}">
                                            <i class="fa fa-trash"></i> Xóa
                                        </button>
                                    </td>
                                </tr>
                            `;
                        });

                        $('#product-list').html(html);
                    }



                })
            }
        })
    })

    $(document).ready(function() {
        $('.btn-delete').on('click', function(e) {
            e.preventDefault();
            let button = $(this)
            let id = button.data('id');

            if (confirm('Bạn có chắc chắn muốn xóa sản phẩm này không?')) {
                $.ajax({
                    type: 'POST',
                    url: "{{ url('/admin/product/delete') }}",
                    data: {
                        id: id,
                        _token: $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(res) {
                        console.log(res);
                        button.closest('tr').remove();
                    }
                })
            }

        })
    })
</script>
@endsection