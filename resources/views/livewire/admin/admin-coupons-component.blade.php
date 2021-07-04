<div class="container" style="padding:30px 0;">
    <style>
        nav svg {
            height: 20px;
        }

        nav .hidden {
            display: block !important;
        }
    </style>
    <div class="row">
        <div class='col-md-12'>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-6">
                            All coupons
                        </div>
                        <div class="col-md-6">
                            <a href="{{route('admin.coupons.add')}}" class="btn btn-success pull-right">Add New
                                Coupons</a>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    @if (Session::has('message'))
                        <div class="alert alert-success alert-dismissible" role="alert">{{Session::get('message')}}
                        </div>
                    @endif
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Coupon Code</th>
                            <th>Coupon Type</th>
                            <th>Coupon Value</th>
                            <th>Cart Value</th>
                            <th>Expiry Date</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($coupons as $coupon)
                            <tr>
                                <td>{{$coupon->id}}</td>
                                <td>{{$coupon->code}}</td>
                                <td>{{$coupon->type}}</td>
                                @if($coupon->type == 'fixed')
                                    <td>{{$coupon->value}}</td>
                                @else
                                    <td>{{$coupon->value}} %</td>
                                @endif
                                <td>{{$coupon->cart_value}}</td>
                                <td>{{$coupon->expired_date}}</td>
                                <td>
                                    <a href="{{route('admin.coupons.edit', ['coupon_id' => $coupon->id])}}"><i
                                            class="fa fa-edit fa-2x"></i></a>
                                    <a href="#"
                                       onclick="confirm('Are you sure, You wnt to delete tis category?') || event.stopImmediatePropagation() "
                                       wire:click.prevent="deleteCoupon({{$coupon->id}})"><i
                                            class="fa fa-times fa-2x text-danger" style="margin-left: 10px"></i></a>

                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{--                    {{$categories->links()}}--}}
                </div>
            </div>
        </div>
    </div>
</div>
