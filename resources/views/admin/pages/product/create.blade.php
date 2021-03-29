@extends('admin.layouts.master')

@section('content')

<div class="content-wrapper">
    <div>   
        <div class="modal-header">
            <h5 class="modal-title" style="color:black">
                Thêm mới Sản Phẩm
            </h5>
        </div>
        <div class="modal-body">
            <form action="{{ url('customer/product/add') }}" method="POST">
                @csrf
                <input type="hidden" value="" id="id" name="id">
                <div class="form-group">
                    <label class="form-label" for="simpleinput" style="color:black">
                        Tên Sản Phẩm <span class="text-danger">*</span>
                    </label>
                    <input type="text" name="name" id="name" class="form-control" style= 'border: 1px solid black;color:black'>
                </div>
                
                <div class="form-group">
                    <label class="form-label" for="simpleinput" style="color:black">
                        Phân Loại <span class="text-danger">*</span>
                    </label>
                    <input type="text" 
                        name="maqh" id="quanhuyen" class="form-control" style= 'border: 1px solid black;color:black'>
                </div>
                <div class="form-group">
                    <label class="form-label" for="simpleinput" style="color:black">
                        Tên Thương Hiệu <span class="text-danger">*</span>
                    </label>
                    <input type="text" 
                        name="maxptr" id="xaphuong" class="form-control" style= 'border: 1px solid black;color:black'>
                </div>
                <div class="form-group">
                    <label class="form-label" for="simpleinput" style="color:black">
                        tên Shop <span class="text-danger">*</span>
                    </label>
                    <input type="text" required maxlength="10"
                        name="feeship" id="feeships" class="form-control" style= 'border: 1px solid black;color:black'>
                </div>

                <div class="modal-footer">
                    <button type="submit"
                        class="btn btn-primary">Thêm mới</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection