@extends('layouts.app')
@section('content')

	<div class="row">
		<div class="col-md-12">
			<ul class="breadcrumb">
				<li><a href="{{ url('/home') }}">Home</a></li>
				<li class="active">Setting Akun</li>
			</ul>

			<div class="panel panel-default">
 				<div class="panel-body">  
 				 <ul class="nav nav-tabs">
					<li><a href="#data_item" id="data_item">Data Item</a></li>
					<li><a href="#akun_pembelian" id="akun_pembelian">Akun Pembelian</a></li>
					<li><a href="#akun_retur_pembelian" id="akun_retur_pembelian">Akun Retur Pembelian</a></li>
					<li><a href="#akun_penjualan" id="akun_penjualan">Akun Penjualan</a></li>
					<li><a href="#akun_akun_retur_penjualan" id="akun_akun_retur_penjualan">Akun Retur Penjualan</a></li>
					<li><a href="#akun_hutang_piutang" id="akun_hutang_piutang">Akun Hutang Piutang</a></li>
					<li><a href="#modal_dan_laba" id="modal_dan_laba">Modal dan Laba</a> </li>
				  </ul>
				</div>
			</div>

			<div class="panel panel-default">
				<div class="panel-heading">
					
				</div>

				<div class="panel-body"> 


                        <div class="table-responsive" style="display:none" id="tampil_table_data_item">
                                 <table class="table table-bordered" id="table_data_item">
                                    <thead>
                                        <tr>
                                            <th>Data Item</th>
                                            <th>Akun</th> 
                                            <th></th>
                                        </tr>
                                    </thead>
                                </table>
                        </div>


                        <div class="table-responsive" style="display:none" id="tampil_table_akun_pembelian">
                                 <table class="table table-bordered" id="table_akun_pembelian">
                                    <thead>
                                        <tr>
                                            <th>Akun Pembelian</th>
                                            <th>Akun</th> 
                                            <th></th>
                                        </tr>
                                    </thead>
                                </table>
                        </div>


                        <div class="table-responsive" style="display:none" id="tampil_table_akun_retur_pembelian">
                                 <table class="table table-bordered" id="table_akun_retur_pembelian">
                                    <thead>
                                        <tr>
                                            <th>Akun Retur Pembelian</th>
                                            <th>Akun</th> 
                                            <th></th>
                                        </tr>
                                    </thead>
                                </table>
                        </div>


                        <div class="table-responsive" style="display:none" id="tampil_table_akun_penjualan">
                                 <table class="table table-bordered" id="table_akun_penjualan">
                                    <thead>
                                        <tr>
                                            <th>Akun Penjualan</th>
                                            <th>Akun</th> 
                                            <th></th>
                                        </tr>
                                    </thead>
                                </table>
                        </div>


                        <div class="table-responsive" style="display:none" id="tampil_table_akun_retur_penjualan">
                                 <table class="table table-bordered" id="table_akun_retur_penjualan">
                                    <thead>
                                        <tr>
                                            <th>Akun Retur Penjualan</th>
                                            <th>Akun</th> 
                                            <th></th>
                                        </tr>
                                    </thead>
                                </table>
                        </div>


                        <div class="table-responsive" style="display:none" id="tampil_table_akun_hutang_piutang">
                                 <table class="table table-bordered" id="table_akun_hutang_piutang">
                                    <thead>
                                        <tr>
                                            <th>Akun Hutang Piutang</th>
                                            <th>Akun</th> 
                                            <th></th>
                                        </tr>
                                    </thead>
                                </table>
                        </div>


                        <div class="table-responsive" style="display:none" id="tampil_table_modal_dan_laba">
                                 <table class="table table-bordered" id="table_modal_dan_laba">
                                    <thead>
                                        <tr>
                                            <th>Modal dan Laba</th>
                                            <th>Akun</th> 
                                            <th></th>
                                        </tr>
                                    </thead>
                                </table>
                        </div>


				</div>
			</div>
		</div>
	</div>

@endsection

@section('scripts') 
<script type="text/javascript">
	
$(function() {

    $(document).on('click','#data_item',function(){

        $("#tampil_table_data_item").show();
        $("#tampil_table_akun_pembelian").hide(); 
        $("#tampil_table_akun_retur_pembelian").hide(); 
        $("#tampil_table_akun_penjualan").hide(); 
        $("#tampil_table_akun_retur_penjualan").hide(); 
        $("#tampil_table_akun_hutang_piutang").hide(); 
        $("#tampil_table_modal_dan_laba").hide(); 
 	
        $('#table_data_item').DataTable().destroy();
         $('#table_data_item').DataTable({
                processing: true,
                serverSide: true,
                      "ajax": {
                    url: '{{ route("table.data_item")}}', 
                    type:'POST',
                      'headers': {
                          'X-CSRF-TOKEN': '{{ csrf_token() }}'
                      },
                  },
                columns: [ 
                    { data: 'display_nama_setting_akun', name: 'display_nama_setting_akun' }, 
                    { data: 'akun', name: 'akun' }, 
                    { data: 'action', name: 'action' }, 
                ]
        }); 
    });
});


$(function() {

    $(document).on('click','#akun_pembelian',function(){

        $("#tampil_table_data_item").hide();
        $("#tampil_table_akun_pembelian").show(); 
        $("#tampil_table_akun_retur_pembelian").hide(); 
        $("#tampil_table_akun_penjualan").hide(); 
        $("#tampil_table_akun_retur_penjualan").hide(); 
        $("#tampil_table_akun_hutang_piutang").hide(); 
        $("#tampil_table_modal_dan_laba").hide(); 
 
        $('#table_akun_pembelian').DataTable().destroy();
         $('#table_akun_pembelian').DataTable({
                processing: true,
                serverSide: true,
                      "ajax": {
                    url: '{{ route("table.akun_pembelian")}}', 
                    type:'POST',
                      'headers': {
                          'X-CSRF-TOKEN': '{{ csrf_token() }}'
                      },
                  },
                columns: [ 
                    { data: 'display_nama_setting_akun', name: 'display_nama_setting_akun' }, 
                    { data: 'akun', name: 'akun' }, 
                    { data: 'action', name: 'action' }, 
                ]
        });
    });
});


$(function() {

    $(document).on('click','#akun_retur_pembelian',function(){

        $("#tampil_table_data_item").hide();
        $("#tampil_table_akun_pembelian").hide(); 
        $("#tampil_table_akun_retur_pembelian").show(); 
        $("#tampil_table_akun_penjualan").hide(); 
        $("#tampil_table_akun_retur_penjualan").hide(); 
        $("#tampil_table_akun_hutang_piutang").hide(); 
        $("#tampil_table_modal_dan_laba").hide(); 
 
        $('#table_akun_retur_pembelian').DataTable().destroy();
         $('#table_akun_retur_pembelian').DataTable({
                processing: true,
                serverSide: true,
                      "ajax": {
                    url: '{{ route("table.akun_retur_pembelian")}}', 
                    type:'POST',
                      'headers': {
                          'X-CSRF-TOKEN': '{{ csrf_token() }}'
                      },
                  },
                columns: [ 
                    { data: 'display_nama_setting_akun', name: 'display_nama_setting_akun' }, 
                    { data: 'akun', name: 'akun' }, 
                    { data: 'action', name: 'action' }, 
                ]
        });
    });
});

$(function() {

    $(document).on('click','#akun_penjualan',function(){

        $("#tampil_table_data_item").hide();
        $("#tampil_table_akun_pembelian").hide(); 
        $("#tampil_table_akun_retur_pembelian").hide(); 
        $("#tampil_table_akun_penjualan").show(); 
        $("#tampil_table_akun_retur_penjualan").hide(); 
        $("#tampil_table_akun_hutang_piutang").hide(); 
        $("#tampil_table_modal_dan_laba").hide(); 
 
        $('#table_akun_penjualan').DataTable().destroy();
         $('#table_akun_penjualan').DataTable({
                processing: true,
                serverSide: true,
                      "ajax": {
                    url: '{{ route("table.akun_penjualan")}}', 
                    type:'POST',
                      'headers': {
                          'X-CSRF-TOKEN': '{{ csrf_token() }}'
                      },
                  },
                columns: [ 
                    { data: 'display_nama_setting_akun', name: 'display_nama_setting_akun' }, 
                    { data: 'akun', name: 'akun' }, 
                    { data: 'action', name: 'action' }, 
                ]
        });
    });
});

$(function() {

    $(document).on('click','#akun_akun_retur_penjualan',function(){

        $("#tampil_table_data_item").hide();
        $("#tampil_table_akun_pembelian").hide(); 
        $("#tampil_table_akun_retur_pembelian").hide(); 
        $("#tampil_table_akun_penjualan").hide(); 
        $("#tampil_table_akun_retur_penjualan").show(); 
        $("#tampil_table_akun_hutang_piutang").hide(); 
        $("#tampil_table_modal_dan_laba").hide(); 
 
        $('#table_akun_retur_penjualan').DataTable().destroy();
         $('#table_akun_retur_penjualan').DataTable({
                processing: true,
                serverSide: true,
                      "ajax": {
                    url: '{{ route("table.akun_retur_penjualan")}}', 
                    type:'POST',
                      'headers': {
                          'X-CSRF-TOKEN': '{{ csrf_token() }}'
                      },
                  },
                columns: [ 
                    { data: 'display_nama_setting_akun', name: 'display_nama_setting_akun' }, 
                    { data: 'akun', name: 'akun' }, 
                    { data: 'action', name: 'action' }, 
                ]
        });
    });
});

$(function() {

    $(document).on('click','#akun_hutang_piutang',function(){

        $("#tampil_table_data_item").hide();
        $("#tampil_table_akun_pembelian").hide(); 
        $("#tampil_table_akun_retur_pembelian").hide(); 
        $("#tampil_table_akun_penjualan").hide(); 
        $("#tampil_table_akun_retur_penjualan").hide(); 
        $("#tampil_table_akun_hutang_piutang").show(); 
        $("#tampil_table_modal_dan_laba").hide(); 
 
        $('#table_akun_hutang_piutang').DataTable().destroy();
         $('#table_akun_hutang_piutang').DataTable({
                processing: true,
                serverSide: true,
                      "ajax": {
                    url: '{{ route("table.akun_hutang_piutang")}}', 
                    type:'POST',
                      'headers': {
                          'X-CSRF-TOKEN': '{{ csrf_token() }}'
                      },
                  },
                columns: [ 
                    { data: 'display_nama_setting_akun', name: 'display_nama_setting_akun' }, 
                    { data: 'akun', name: 'akun' }, 
                    { data: 'action', name: 'action' }, 
                ]
        });
    });
});

$(function() {

    $(document).on('click','#modal_dan_laba',function(){

        $("#tampil_table_data_item").hide();
        $("#tampil_table_akun_pembelian").hide(); 
        $("#tampil_table_akun_retur_pembelian").hide(); 
        $("#tampil_table_akun_penjualan").hide(); 
        $("#tampil_table_akun_retur_penjualan").hide(); 
        $("#tampil_table_akun_hutang_piutang").hide(); 
        $("#tampil_table_modal_dan_laba").show(); 
 
        $('#table_modal_dan_laba').DataTable().destroy();
         $('#table_modal_dan_laba').DataTable({
                processing: true,
                serverSide: true,
                      "ajax": {
                    url: '{{ route("table.modal_dan_laba")}}', 
                    type:'POST',
                      'headers': {
                          'X-CSRF-TOKEN': '{{ csrf_token() }}'
                      },
                  },
                columns: [ 
                    { data: 'display_nama_setting_akun', name: 'display_nama_setting_akun' }, 
                    { data: 'akun', name: 'akun' }, 
                    { data: 'action', name: 'action' }, 
                ]
        });
    });
});
</script>
@endsection
