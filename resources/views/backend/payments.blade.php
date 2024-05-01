@extends('backend.app')

@section('content')
    <div class="row" style="margin:10px;">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">All Payments</h4>
                    <div class="bg-white p-3   align-items-center">

                <div class="card-body">
                    <div class="table-responsive">
                        <table id="basic-datatables" class="display table table-striped table-hover" >
                            <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Payment Type</th>
                                    <th>Amount</th>
                                    <th>Reference</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                            <?php $i = 1; ?>
                             @foreach($all_payments as $pay)
                             <tr>

                             <td>{{$i++;}}</td>
                             <td>{{$pay->full_name}}</td>
                             <td>{{$pay->email}}</td>
                             <td>{{$pay->payment_type}}</td>
                             <td>{{$pay->amount}}</td>
                             <td>{{$pay->reference}}</td>
                             <td><span class="badge bg-success">{{$pay->status}}</span></td>
                             @endforeach
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
