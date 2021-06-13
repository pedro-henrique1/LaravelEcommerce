<div>
    <div class="container" style="padding: 30px 0;">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-6">
                            Edit Category
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
                <form class="form-horizontal g-3" wire:submit.prevent="updateCategory">
                    <div class="form-group">
                        <label class="col-md-4 control-label">Edit Category</label>
                        <div class="col-md-4">
                            <input name="" id="" class="form-control input-md" type="text" placeholder="Category Name"
                                   wire:model="name">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">Category slug</label>
                        <div class="col-md-4">
                            <input name="" id="" class="form-control input-md" type="text" placeholder="Category Slug"
                                   wire:model="slug" wire:keyup="generateSlug">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label"></label>
                        <div class="col-md-4">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
