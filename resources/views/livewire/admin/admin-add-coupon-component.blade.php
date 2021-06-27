<div>
    <div class="container" style="padding: 30px 0;">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-6">
                            Add New Coupon
                        </div>
                        <div class="col-md-6">
                            <a href="{{route('admin.coupons')}}" class="btn btn-success pull-right">All
                                Coupons</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel-body">
                @if (Session::has('message'))
                    <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                @endif
                <form class="form-horizontal g-3" wire:submit.prevent="addCoupon">
                    <div class="form-group">
                        <label class="col-md-4 control-label">Coupon Name</label>
                        <div class="col-md-4">
                            <input name="" id="" class="form-control input-md" type="text" placeholder="Coupon Name"
                                   wire:model="code">
                            @error('name') <p class="text-danger">{{$message}}</p> @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">Coupon Type</label>
                        <div class="col-md-4">
                            <select class="form-control" wire:model="type">
                                <option value="">Select</option>
                                <option value="fixed">fixed</option>
                                <option value="percent">percent</option>

                            </select>

                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">Coupon Value</label>
                        <div class="col-md-4">
                            <input name="" id="" class="form-control input-md" type="text" placeholder="Coupon Value"
                                   wire:model="value">
                            @error('slug') <p class="text-danger">{{$message}}</p> @enderror

                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">Cart Value</label>
                        <div class="col-md-4">
                            <input name="" id="" class="form-control input-md" type="text" placeholder="Cart Value"
                                   wire:model="cart_value">
                            @error('slug') <p class="text-danger">{{$message}}</p> @enderror

                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label"></label>
                        <div class="col-md-4">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
