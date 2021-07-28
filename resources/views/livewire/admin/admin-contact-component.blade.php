<div>
    <div class="container-fluid" style="margin: 1.5rem 0 1rem 0;">
        <style>
            nav svg {
                height: 20px;
            }

            nav.hidden {
                display: block !important;
            }
        </style>
        <div class="row">
            <div class='col-md-12'>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                Contact Messages
                            </div>
                        </div>
                    </div>
                    <div class='panel-body'>
                        @if(Session::has('order_message'))
                            <div class="alert alert-success">{{Session::get('order_message')}}</div>
                        @endif
                        <table class="table table-striped  table-bordered">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Comment</th>
                                <th>Created At</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($contacts as $contact)
                                <tr>
                                    <td>{{ $contact->id }}</td>
                                    <td>{{ $contact->name }}</td>
                                    <td>{{ $contact->phone }}</td>
                                    <td>{{ $contact->comment }}</td>
                                    <td>{{ $contact->created_at }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{$contact->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
