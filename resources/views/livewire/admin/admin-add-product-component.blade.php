<div>
    <div class="container" style="padding: 30px 0;">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-6">
                            Add New Product
                        </div>
                        <div class="col-md-6">
                            <a href="{{route('admin.products')}}" class="btn btn-success pull-right">All
                                Products</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel-body" style="border: 2px solid #ccc">
                @if (Session::has('message'))
                <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                @endif

                <form class="form-horizontal g-3" method="POST" enctype="multipart/form-data"
                    wire:submit.prevent="addProduct">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label class="col-md-4 control-label">Product Name</label>
                        <div class="col-md-4">
                            <input name="" id="" class="form-control input-md" type="text" placeholder="Product Name"
                                wire:model="name" wire:keyup="generateSlug">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">Product slug</label>
                        <div class="col-md-4">
                            <input name="" id="" class="form-control input-md" type="text" placeholder="Slug"
                                wire:model="slug">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="" class="col-md-4 control-label">Short Description</label>
                        <div class="col-md-4">
                            <textarea class="form-control" name="" id="" placeholder="Short Description" rows="5"
                                wire:model="short_description"></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="" class="col-md-4 control-label">Description</label>
                        <div class="col-md-4">
                            <textarea class="form-control" name="" id="" placeholder="Description" rows="5"
                                wire:model="description">
                        </textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">Regular Price</label>
                        <div class="col-md-4">
                            <input name="" id="" class="form-control input-md" type="text" placeholder="Regular Price"
                                wire:model="regular_price">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">Sale Price</label>
                        <div class="col-md-4">
                            <input name="" id="" class="form-control input-md" type="text" placeholder="Sale Price"
                                wire:model="sale_price">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="" class="col-md-4 control-label">SKU</label>
                        <div class="col-md-4">
                            <input type="text" name="" id="" class="form-control input-md" placeholder="SKU"
                                wire:model="SKU">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="" class="col-md-4 control-label">Stock</label>
                        <div class="col-md-4">
                            <select class="form-control" name="" id="" wire:model="stock_status">
                                <option value="instock">InStock</option>
                                <option value="outofstock">Out of Stock</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="" class="col-md-4 control-label">Featured</label>
                        <div class="col-md-4">
                            <select class="form-control" name="" id="" wire:model="featured">
                                <option value="0">Yes</option>
                                <option value="1">No</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="" class="col-md-4 control-label">Quantity</label>
                        <div class="col-md-4">
                            <input type="text" name="" id="" class="form-control input-md" placeholder="Quantity"
                                wire:model="quantity">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">Product Image</label>
                        <div class="col-md-4">
                            <input type="file" class="input-file" wire:model="image">
                            @if ($image)
                            <img src="{{ asset('assets/images/livewire-tmp/' . $image->getfilename())}}"
                                class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,w-"
                                alt="" style="height: 140px;width:auto;margin: 1.3rem 0 0 0rem;">
                            @else
                            <div class="image-preview">
                                <span>Preview Image</span>
                            </div>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="" class="col-md-4 control-label">Category</label>
                        <div class="col-md-4">
                            <select class="form-control" name="" id="" wire:model="category_id">
                                <option value="">Select Category</option>
                                @foreach ($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="" class="col-md-4 control-label"></label>
                        <div class="col-md-4">
                            <button type="submit" class="btn btn-primary col-md-4">Submit</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
