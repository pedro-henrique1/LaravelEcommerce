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
                        <form class="form-horizontal" enctype="multipart/form-data" wire:submit.prevent="addSlide">
                            @csrf
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
                                    <label for="formFile" class="form-label"></label>
                                    <input type="file" class="input-file form-control" id="formFile" wire:model='image'>
                                    @if ($image)
                                        <img
                                            src="{{ asset('assets/images/livewire-tmp/' . $image->getClientOriginalName())}}"
                                            class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,w-"
                                            alt="" style="height: 140px;width:auto;margin: 1.3rem 0 0 0rem;">
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Status</label>
                                <div class="col-md-4">
                                    <select class="form-control input-md" wire:model='status'>
                                        <option>Select</option>
                                        <option value='0'>Inactive</option>
                                        <option value='1'>Active</option>
                                    </select>
                                </div>
                            </div>
                            <h1 style="text-align: center; margin: 3rem 0 5rem 0;">Colors</h1>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Title Color</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control input-md" name="" id=""
                                           placeholder="Cor do titulo" wire:model='colortitle'>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Subtitle color</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control input-md" name="" id=""
                                           placeholder="Cor do subtitulo" wire:model='colorsubtitle'>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Information Color</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control input-md" name="" id=""
                                           placeholder="Cor do subtitulo" wire:model='colorsaleinfo'>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Price color</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control input-md" name="" id=""
                                           placeholder="Cor do subtitulo" wire:model='colorsale'>
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
