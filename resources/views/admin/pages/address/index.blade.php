@extends('admin.layouts.master')

@section('content')
<style>
  .text {
   overflow: hidden;
   text-overflow: ellipsis;
   display: -webkit-box;
   -webkit-line-clamp: 2; /* number of lines to show */
   -webkit-box-orient: vertical;
   overflow-wrap: normal;
   max-width:250px;
}
</style>

<div class="content-wrapper">

   @include('admin.pages.address.tinhthanhpho')

   @include('admin.pages.address.quanhuyen')

   @include('admin.pages.address.xaphuong')

</div>

@push('script')
<script>
  $(document).ready(function() {

    $(document).on('click', '#delete-item-xa', function () {
        $(this).addClass('delete-item-trigger-clicked');
        var options = {
            'backdrop': 'static'
        };
        $('#delete-xa-modal').modal(options)
    })

    $('#delete-xa-modal').on('show.bs.modal', function () {
        var el = $(".delete-item-trigger-clicked");
        var id = el.data('item-id');
        $("#id_xa").val(id);
    })

    $('#delete-xa-modal').on('hide.bs.modal', function () {
        $('.delete-item-trigger-clicked').removeClass('delete-item-trigger-clicked')
        $("#id_xa").trigger("reset");
    })

    $(document).on('click', '#edit-item-xa', function () {
        $(this).addClass('edit-item-trigger-clicked');
        var options = {
            'backdrop': 'static'
        };
        $('#edit-xa-modal').modal(options)
    })

    $('#edit-xa-modal').on('show.bs.modal', function () {
        var el = $(".edit-item-trigger-clicked");
        var id = el.data('item-id');
        var row = el.closest(".data-row");
        var name = row.children("#nameq").text();
        var type = row.children("#typeq").text();

        $("#id").val(id);
        $("#namesss").val(name);
        $("#typesss").val(type);
    })

    $('#edit-xa-modal').on('hide.bs.modal', function () {
        $('.edit-item-trigger-clicked').removeClass('edit-item-trigger-clicked')
        $("#id_xa").trigger("reset");
    })

    $(document).on('click', '#edit-item-huyen', function () {
        $(this).addClass('edit-item-trigger-clicked');
        var options = {
            'backdrop': 'static'
        };
        $('#edit-huyen-modal').modal(options)
    })

    $('#edit-huyen-modal').on('show.bs.modal', function () {
        var el = $(".edit-item-trigger-clicked");
        var id = el.data('item-id');
        var row = el.closest(".data-row");
        var name = row.children("#namek").text();
        var type = row.children("#typek").text();

        $("#id").val(id);
        $("#namess").val(name);
        $("#typess").val(type);
    })

    $('#edit-huyen-modal').on('hide.bs.modal', function () {
        $('.edit-item-trigger-clicked').removeClass('edit-item-trigger-clicked')
        $("#id_huyen").trigger("reset");
    })

    $(document).on('click', '#delete-item-huyen', function () {
        $(this).addClass('delete-item-trigger-clicked');
        var options = {
            'backdrop': 'static'
        };
        $('#delete-huyen-modal').modal(options)
    })

    $('#delete-huyen-modal').on('show.bs.modal', function () {
        var el = $(".delete-item-trigger-clicked");
        var id = el.data('item-id');
        $("#id_huyen").val(id);
    })

    $('#delete-huyen-modal').on('hide.bs.modal', function () {
        $('.delete-item-trigger-clicked').removeClass('delete-item-trigger-clicked')
        $("#id_huyen").trigger("reset");
    })

    $(document).on('click', '#delete-item-tinh', function () {
        $(this).addClass('delete-item-trigger-clicked');
        var options = {
            'backdrop': 'static'
        };
        $('#delete-tinh-modal').modal(options)
    })

    $('#delete-tinh-modal').on('show.bs.modal', function () {
        var el = $(".delete-item-trigger-clicked");
        var id = el.data('item-id');
        $("#id_tinh").val(id);
    })

    $('#delete-tinh-modal').on('hide.bs.modal', function () {
        $('.delete-item-trigger-clicked').removeClass('delete-item-trigger-clicked')
        $("#id_tinh").trigger("reset");
    })

    $(document).on('click', '#edit-item-tinh', function () {
        $(this).addClass('edit-item-trigger-clicked');
        var options = {
            'backdrop': 'static'
        };
        $('#edit-tinh-modal').modal(options)
    })

    $('#edit-tinh-modal').on('show.bs.modal', function () {
        var el = $(".edit-item-trigger-clicked");
        var id = el.data('item-id');
        var row = el.closest(".data-row");
        var name = row.children("#name").text();
        var type = row.children("#type").text();

        $("#id").val(id);
        $("#names").val(name);
        $("#types").val(type);
    })

    $('#edit-tinh-modal').on('hide.bs.modal', function () {
        $('.edit-item-trigger-clicked').removeClass('edit-item-trigger-clicked')
        $("#id_category").trigger("reset");
    })
    
  })
</script>
@endpush
@endsection