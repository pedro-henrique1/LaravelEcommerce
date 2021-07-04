<div>
    <div class="container" style="padding: 30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Sale Setting
                    </div>
                    <div class="panel-body border border-secondary rounded-1">
                        @if (Session::has('message'))
                            <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                        @endif
                        <form class="form-horizontal" wire:submit.prevent='updateSale'>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Status</label>
                                <div class="col-md-4">
                                    <select class="form-control" wire:model="status">
                                        <option value="0">Inactive</option>
                                        <option value="1">Active</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Sale Date</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control input-md" id="sale-date"
                                           placeholder="YYYY/MM/DD H:M:S" wire:model="sale_date"/>

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
        @push('scripts')
            <script>
                // let date  = new Date().getHours();
                // let dateMin  = new Date().getMinutes();
                // let dateSec  = new Date().getSeconds();
                // console.log(date,dateMin,dateSec);
                $(function () {
                    $('#sale-date').datepicker({
                        dateFormat: "Y-MM-DD",
                    })
                        .on('dp.change', function () {
                            const data = $('#sale-date').val();
                        @this.set('sale_date', data);
                        });
                })
            </script>
@endpush
