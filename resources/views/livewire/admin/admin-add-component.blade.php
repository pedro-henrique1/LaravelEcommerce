<div>
    <div class="container" style="padding: 30px 0;">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-6">
                            Add New Category
                        </div>
                        <div class="col-md-6">
                            <a href="{{route('admin.categories')}}" class="btn btn-success pull-right">All
                                Categories</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel-body">
                @if (Session::has('message'))
                    <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                @endif
                <form class="form-horizontal g-3" wire:submit.prevent="storeCategory">
                    <div class="form-group">
                        <label class="col-md-4 control-label">Catgeory Name</label>
                        <div class="col-md-4">
                            <input name="" id="" class="form-control input-md" type="text" placeholder="Category Name"
                                   wire:model="name">
                            @error('name') <p class="text-danger">{{$message}}</p> @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">Catgeory slug</label>
                        <div class="col-md-4">
                            <input name="" id="" class="form-control input-md" type="text" placeholder="Category Slug"
                                   wire:model="slug" wire:keyup="generateSlug">
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
