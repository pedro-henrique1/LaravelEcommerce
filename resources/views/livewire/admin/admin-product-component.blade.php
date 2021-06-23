<div>
    <style>
        nav svg {
            height: 20px;
        }

        nav .hidden {
            display: block !important;
        }

    </style>
    <div class="container" style="padding: 30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="row " style="padding: 20px 20px 0 20px ">
                        <div class="col-md-6">
                            All Products
                        </div>
                        <div class="col-md-6">
                            <a href="{{route('admin.products.add')}}" class="btn btn-success pull-right">Add New
                                Product</a>
                        </div>
                    </div>
                    <div class="panel-body">
                        <table class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>Image</th>
                                <th>Category Name</th>
                                <th>Name</th>
                                <th>SKU</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Sale Price</th>
                                <th>Status</th>
                                <th style="width: 77px">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $product)

                                <tr>
                                    <td>
                                        <img src="{{asset('assets/images/products')}}/{{$product->image}}"
                                             alt="{{$product->name}}" width="60"/>
                                    </td>
                                    <td>{{ $product->slug }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->SKU }}</td>
                                    <td>{{ $product->quantify }}</td>
                                    <td>{{ $product->regular_price }}</td>
                                    <td>{{ $product->sale_price }}</td>
                                    <td class="stock">{{ $product->stock_status }}</td>
                                    <td>
                                        <a href="{{route('admin.products.edit', ['product_slug' => $product->slug])}}"><i
                                                class="fa fa-edit fa-2x"></i></a>
                                        <a href="#"
                                           onclick="confirm('Are you sure, You wnt to delete this product?') || event.stopImmediatePropagation()"
                                           wire:click.prevent="deleteProduct({{$product->id}})"><i
                                                class="fa fa-times fa-2x text-danger" style="margin-left: 10px"></i></a>
                                    </td>
                                </tr>

                            @endforeach
                            </tbody>
                        </table>
                        {{$products->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
