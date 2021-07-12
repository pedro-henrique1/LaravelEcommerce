<div>
    <div class="container" style="padding: 30px 0;">
        <div class="row">
            <div class="col-md-12">
            <div class="panel panel-default">
            <div class="panel-heading">
                Manager Home Categories
            </div>
            <div class="panel-body border border-secondary rounded-1">
                @if (Session::has('message'))
                <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                @endif
                <form class="form-horizontal" wire:submit.prevent='updateHomeCategory'>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Choose Categories</label>
                        <div class="col-md-4" wire:ignore>
                            <select multiple class="form-control sel_categories" name="categories[]" id=""
                                wire:model="selected_categories">
                                @foreach ($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">No Of Products</label>
                        <div class="col-md-4">
                            <input type="text" class="form-control input-md" wire:model='numberofproducts' />

                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label"></label>
                        <div class="col-md-4">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
    integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('.sel_categories').select2();
        $(`.sel_categories`).on('change', function (e) {
            let data = $('.sel_categories').select2("val");
            @this.set('selected_categories', data);
        });
    });

</script>
