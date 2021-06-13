<div>
    <div class="container-fluid"style="margin: 1.5rem 0 1rem 0;" >
        <div class="row">
            <div class='col-md-12'>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                All Slides
                            </div>
                            <div class="col-md-6">
                                <a href="{{route('admin.slider.add')}}" class="btn btn-success pull-right">Add New
                                    Slider</a>
                            </div>
                        </div>
                    </div>
                    <div class='panel-body'>
                        <table class="table table-striped  table-bordered">
                            <thead>
                            <tr>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Subtite</th>
                                <th>Price</th>
                                <th>Link</th>
                                <th>Status</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($sliders as $slider)
                                <tr>
                                    <td scope="row">
                                        <img src="{{ asset('assets/images/sliders') }}/{{ $slider->image}}"
                                             style="width: 120px;"/>
                                    </td>
                                    <td>{{ $slider->title }}</td>
                                    <td>{{ $slider->subtitle }}</td>
                                    <td>{{ $slider->price }}</td>
                                    <td>{{ $slider->link }}</td>
                                    <td>{{ $slider->status == 1 ? 'Active' : 'Inactive' }}</td>
                                    <td>{{ $slider->created_at }}</td>
                                    <td>
                                        <a href="{{route('admin.slider.edit', ['slide_id' => $slider->id])}}"><i
                                                class="fa fa-edit fa-2x"></i></a>
                                        <a href="#" wire:click.prevent="deleteSlide({{$slider->id}})"><i
                                                class="fa fa-times fa-2x text-danger" style="margin-left: 10px"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
