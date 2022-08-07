@extends('layout.master_user')
@section('title')
Point User
@endsection
@section('css')
<link rel="stylesheet" href="{{asset('dist/css/print.css')}}" type="text/css" media="print">
<style>
    .btn-secondary {
        color: #fff;
        background-color: #0062cc;
        border-color: #0062cc;
        box-shadow: none;
        margin: 2px;
        margin-top: -1px;
    }

    .btn-secondary:hover {
        color: #fff;
        background-color: #0270e8;
        border-color: #0270e8;
    }

    .btn-secondary:focus,
    .btn-secondary.focus {
        color: #fff;
        background-color: #0270e8;
        border-color: #0270e8;
        box-shadow: 0 0 0 0 rgba(130, 138, 145, 0.5);
    }

    .btn-secondary.disabled,
    .btn-secondary:disabled {
        color: #fff;
        background-color: #0270e8;
        border-color: #0270e8;
    }


    .btn.btn-secondary.print.drop {
        margin-left: 950px;
        margin-top: -50px;
    }

    .table.table-striped.table-bordered.center {
        margin-top: -10px;
    }
</style>
@endsection
@section('content')
<?php

?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data Poin</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Data Poin</li>
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
                    <h3 class="card-title">Data Poin</h3>

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
                    <table>
                        <tr>
                            <td id="jumlahpoin"></td>
                        </tr>
                        <tr>
                            <td id="digunakan"></td>
                        </tr>
                        <tr>
                            <td id="sisa"></td>
                        </tr>
                    </table>
                    <button class="btn btn-secondary print drop" onclick="window.print();return false;">Print</button>

                    <div class="card-header">
                        <table class="table table-striped table-bordered center">
                            <thead>
                                <tr class="text-center">

                                    <th>Kode Transaksi</th>
                                    <th>Nama Member</th>
                                    <th>Tanggal</th>
                                    <th>Nominal</th>
                                    <th>Jml Poin</th>
                                    <th class="drop">Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="listPoin">
                            </tbody>
                        </table>
                    </div>
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
        gettable();

        function gettable() {
            fetch("{{url('user/get-table-poin')}}", {
                method: 'GET'
            }).then(res => res.json()).then(data => {
                var let_ = '';
                for (let key of data.getpoin.data) {
                    let_ += `<tr class="text-center">
                   
                                        <td>` + key.id_transaksi + `</td>
                    <td>` + key.id_user + `</td>
                    <td>` + key.tanggal_poin + `</td>
                    <td>` + key.nominal + `</td>
                    <td>` + key.jumlah_poin + `</td> 
                    <td data-id_poin="` + key.id_poin + `" 
                    ><d class="btn btn-warning Detail">Detail</a></td>
                                       </tr>`

                }
                $('#jumlahpoin').html('Total poin: ' + data.jumlah_poin);
                $('#digunakan').html('Total poin digunakan: ' + data.digunakan);
                $('#sisa').html('total sisa :' + parseInt(data.jumlah_poin) - parseInt(data.digunakan));


                $('#listPoin').html(let_);
            });
        }
        $('body').delegate('.Detail', 'click', function(e) {
            e.preventDefault();
            window.location.href = "{{url('user/get-table-poin')}}/" + $(this).closest('td').data('id_poin');
        });
    })
</script>
@endsection