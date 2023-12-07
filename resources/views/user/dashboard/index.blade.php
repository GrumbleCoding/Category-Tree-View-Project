@extends('layout.app_with_login')
@section('title','Dashboard')
@section('content')
@include('errors.index')
<section id="responsive-datatable">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header border-bottom">
                    <h4 class="card-title">Product</h4>
                    <a href="{{ route('user.product.create') }}" class="btn btn-primary waves-effect waves-float waves-light">Add Product</a>
                </div>
                
                <div class="card-datatable table-responsive table-striped mx-2 mt-2 activated">
                    <table class="dt-responsive table">
                        <thead>
                            <tr>
                                <th class="col-1">SR.NO</th>
                                <th>Product Name</th>
                                <th>Category</th>
                                <th>Price</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
@push('custom-scripts')
<script>

    var ajax_datatable = '{{route('user.product.ajax')}}';

</script>
<script>
    var dTable = $('.dt-responsive').dataTable({
    processing: true,
    serverSide: true,
    searching: true,
    "bLengthChange": true,
    "bInfo" : false,
    "bSort" : true,
    "dom": "<'row'<'col-sm-6'l><'col-sm-6'f>>" +
        "<'row'<'col-sm-12'tr>>" +
        "<'row'<'col-sm-6'i><'col-sm-6'p>>"+
        '<"clear">',
    scrollX:true,
    "lengthMenu": [[10, 25, 50,100 ,-1], [10, 25, 50,100,"All"]],
    oLanguage: {
    },
    "initComplete": function (settings, json) {
        $(".checkall").closest("th").removeClass("sorting_asc");
    },
    ajax: {
        url: ajax_datatable,
        type: 'post',
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        data: function (d) {
        }
    },
    columns: [
        {data: 'id', name: 'id'},
        {data: 'product_name', name: 'product_name'},
        {data: 'category', name: 'category'},
        {data: 'price', name: 'price'},
        {data: 'action', name: 'action'},
    ],
    "fnRowCallback" : function(nRow, aData, iDisplayIndex){
        var oSettings = dTable.fnSettings();
        $("td:first", nRow).html(oSettings._iDisplayStart+iDisplayIndex +1);
        return nRow;
    },
});


$(document).on("click", ".deleteproduct", function (e) {

    var url = $(this).attr('data-href');
    swal({
        text: "Are You Sure You Want To Delete Product?",
        type: 'info',
        showCancelButton: true,
        confirmButtonClass: 'btn btn-success alert_btn mr-40',
        cancelButtonClass: 'btn btn-danger alert_btn',
        confirmButtonText: 'Yes'
    }).then(function (isConfirm) {
        if (isConfirm.value == true) {
            $.ajax({
                type: "GET",
                url: url,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (data, textStatus, xhr) {
                    toastr.success(data.message);
                    dTable.fnDraw();
                }
                , error: function (error) {
                    toastr.error(error);
                }
            });
        }
    });
});
$('select').removeClass('form-select-sm').addClass('form-select');
</script>
@endpush
