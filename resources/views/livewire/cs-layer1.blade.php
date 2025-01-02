<div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Responsive Hover Table</h3>
                    <div class="card-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="table_search" class="form-control float-right"
                                placeholder="Search">

                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body table-responsive px-2 py-0" style="height: 600px;">
                    <table class="table table-sm table-bordered table-hover table-head-fixed p-3 text-sm">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>User Id</th>
                                <th>Status</th>
                                <th>Payment</th>
                                <th>Grand total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($get_list_order as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $item->user_id }}</td>
                                    <td>{{ $item->status }}</td>
                                    <td>
                                        @if ($item->payment)
                                            {{ $item->payment->payment_proof }}
                                        @endif
                                    </td>
                                    <td>Rp. {{ number_format($item->grand_total, 0, ',', '.') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
