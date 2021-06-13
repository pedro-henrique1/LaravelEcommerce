<div>
    <div class="container" style="padding: 30px 0;">
        <div class="row">
            <div class='col-md-12'>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                Add new slider
                            </div>
                            <div class="col-md-6">
                                <a href="{{route('admin.slider')}}" class="btn btn-success pull-right">All Slider</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        @if (Session::has('message'))
                        <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                        @endif
                        <form class="form-horizontal" enctype="multipart/form-data" wire:submit.prevent="updateSlide">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label class="col-md-4 control-label">Title</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control input-md" name="" id="" placeholder="Title"
                                        wire:model='title'>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Subtitle</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control input-md" name="" id=""
                                        placeholder="Subtitle" wire:model='subtitle'>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Price</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control input-md" name="" id="" placeholder="Price"
                                        wire:model='price'>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Link</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control input-md" name="" id="" placeholder="Link"
                                        wire:model='link'>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Image</label>
                                <div class="col-md-4">
                                    <input type="file" class="input-file" wire:model='newimage'>
                                    @if ($newimage)
                                    <img src="{{ asset('assets/images/livewire-tmp/' . $newimage->getfilename())}}"
                                        alt="" style="height: 140px;width:auto;margin: 1.3rem 0 0 0;">
                                    @else
                                    <img src='{{ asset('assets/images/sliders') }}/{{ $image }}' alt='image slide'
                                        style="height: 140px;width:auto;margin: 1.3rem 0 0 0rem;">
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Status</label>
                                <div class="col-md-4">
                                    <select class="form-control" wire:model='status'>
                                        <option>Select</option>
                                        <option value='0'>Inactive</option>
                                        <option value='1'>Active</option>
                                    </select>
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
    </div>
</div>
