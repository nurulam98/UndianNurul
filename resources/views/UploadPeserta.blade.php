@extends('home')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="col-md-12">
                <div class="card">
                    @if ($sukses = Session::get('sukses'))
                        <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{{ $sukses }}</strong>
                        </div>
                    @endif
                    <div class="card-header bg-light">
                        Data Coupon
                    </div>
                    <div class="card-body">
                        <div class="container">
                            <a class="btn btn-primary" id="uploadCsv" style="margin-bottom: 10px" data-target="#importCsv" data-toggle="modal"> Import Coupon</a>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="importCsv" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modelHeading">Upload Csv</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="{{ route('importPesertaPost') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <div class="row">
                                <label for="name" class="col-sm-4 control-label">Pilih File Excel</label>
                                <div class="col-sm-auto">
                                    <input type="file" accept=".xlsx" name="file" class="form-control" required="required">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" value="create">Upload File</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


@push('scripts')
    <script type="text/javascript">
        $(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            let table =  $('#coupon-table').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                paging: true,
                scroller: {
                    loadingIndicator: true
                },
                ajax: 'couponJson',
                columns: [
                    { data: 'coupon', name: 'coupon'},
                    { data: 'status', name: 'status'},
                    { data: 'user_id', name: 'user_id'},
                    { data: 'tanggal', name: 'tanggal'},
                ]
            }).columns.adjust()
                .responsive.recalc();

        });
    </script>
@endsection
