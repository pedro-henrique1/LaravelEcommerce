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
                <form class="form-horizontal g-3" method="POST" enctype="multipart/form-data"
                    wire:submit.prevent="addProduct">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label class="col-md-4 control-label">Product Name</label>
                        <div class="col-md-4">
                            <input name="productName" id="" class="form-control input-md" type="text"
                                placeholder="Product Name" wire:model="name" wire:keyup="generateSlug">
                            @error('name') <span class='text-danger'>{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">Product slug</label>
                        <div class="col-md-4">
                            <input name="productSlug" id="productSlug" class="form-control input-md" type="text"
                                placeholder="Slug" wire:model="slug">
                            @error('slug') <span class='text-danger'>{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="" class="col-md-4 control-label">Short Description</label>
                        <div class="col-md-4">
                            <textarea class="form-control" name="shortDescription" id="shortDescription"
                                placeholder="Short Description" rows="5" wire:model="short_description"></textarea>
                            @error('short_description') <span class='text-danger'>{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="" class="col-md-4 control-label">Description</label>
                        <div class="col-md-4">
                            <textarea class="form-control" name="description" id="description" placeholder="Description"
                                rows="5" wire:model="description">
                            </textarea>
                            @error('description') <span class='text-danger'>{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">Regular Price</label>
                        <div class="col-md-4">
                            <input name="regularPrice" id="regularPrice" class="form-control input-md" type="text"
                                placeholder="Regular Price" wire:model="regular_price">
                            @error('regular_price') <span class='text-danger'>{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">Sale Price</label>
                        <div class="col-md-4">
                            <input name="salePrice" id="" class="form-control input-md" type="text"
                                placeholder="Sale Price" wire:model="sale_price">
                            @error('sale_price') <span class='text-danger'>{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="" class="col-md-4 control-label">SKU</label>
                        <div class="col-md-4">
                            <input type="text" name="sku" id="sku" class="form-control input-md" placeholder="SKU"
                                wire:model="SKU">
                            @error('SKU') <span class='text-danger'>{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="" class="col-md-4 control-label">Stock</label>
                        <div class="col-md-4">
                            <select class="form-control" name="stock" id="stock" wire:model="stock_status">
                                <option value="instock">InStock</option>
                                <option value="outofstock">Out of Stock</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="" class="col-md-4 control-label">Featured</label>
                        <div class="col-md-4">
                            <select class="form-control" name="featured" id="featured" wire:model="featured">
                                <option value="0">Yes</option>
                                <option value="1">No</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="" class="col-md-4 control-label">Quantity</label>
                        <div class="col-md-4">
                            <input type="text" name="quantity" id="quantity" class="form-control input-md"
                                placeholder="Quantity" wire:model="quantity">
                            @error('quantity') <span class='text-danger'>{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">Product Image</label>
                        <div class="col-md-4">
                            <input type="file" name="image" id="image" class="input-file" wire:model="image">
                            @error('image') <span class='text-danger'>{{ $message }}</span>
                            @enderror
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
                            <select class="form-control" name="category" id="category" wire:model="category_id">
                                <option value="">Select Category</option>
                                @foreach ($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                            @error('category_id') <span class='text-danger'>{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="" class="col-md-4 control-label"></label>
                        <div class="col-md-4">
                            <button type="submit" id="form-submit" class="btn btn-primary col-md-4">Submit</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>



@push('scripts')
<script>
    $(document).ready(function () {
        $('#form-submit').valid({
            errorPlacement: function (error, element) {
                element.parent("input").next("input").html(error);
            },
            success: function (label) {
                label.removeClass("error").addClass("ok");
            },
            rules: {
                productName: {
                    required: true,
                },

                productSlug: {
                    required: true,
                },

                shortDescription: {
                    required: true,
                },

                description: {
                    required: true,
                },

                regularPrice: {
                    required: true,
                },

                sku: {
                    required: true,
                },

                stock: {
                    required: true,
                },

                featured: {
                    required: true,
                },

                quantity: {
                    required: true,
                },

                image: {
                    required: true,
                },

                category: {
                    required: true,
                }
            },
            // messages: {
            // productName: {
            // required: 'You need to type the title',
            // },
            // },
            // submitHandler: function (form) {
            //     form.submit();
            // }
        });
        $(`#form-submit`).click(() => {
            const Toast = Swal.mixin({
                toast: true,
                customClass: 'swal-height',
                position: 'top-end',
                showConfirmButton: false,
                timer: 4000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }

            })
            Toast.fire({
                icon: 'success',
                title: 'Product has bee created successfully'
            })
        });
    });

</script>
@endpush
