@extends('layout.master_user')
@section('title')
Pembayaran Sukarela
@endsection
@section('css')
@endsection
@section('content')
<!-- user 12345678 -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data Pembayaran Sukarela</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Data Pembayaran Sukarela</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Data Pembayaran</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <h3 class="pb-3 text-bold">Total : {{$ttl}}</h3>
                    <table class="table center table-bordered table-striped text-center">
                        <thead>
                            <tr class="text-center">
                                <!-- <th>No.</th> -->
                                <th>Bulan Ke</th>
                                <th>Tanggal</th>
                                <th>Nominal</th>
                                <th>Tahun Pembayaran</th>
                            </tr>
                        </thead>
                        @php
                        $i=1;
                        @endphp
                        @foreach(@$main_peyment as $keu)
                        <tr class="text-center">
                            <!-- <td class="pl-3">{{$i}}</td> -->
                            <td>{{@$keu->payment_month}}</td>
                            <td>{{@$keu->paid_at}}</td>
                            <td>{{@$keu->amount}}</td>
                            <td>{{@$keu->payment_year}}</td>

                        </tr>
                        @php
                        $i++;
                        @endphp
                        @endforeach
                    </table>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

<!-- /.content-wrapper -->
@endsection

@section('script')
<script>
    $(document).ready(function() {

    })
</script>
@endsection