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
                    <label class="form-label" for="simpleinput" style="color:black" require maxlength = '50'> 
                        Tên Sản Phẩm <span class="text-danger">*</span>
                    </label>
                    <input placeholder = "nhập tên sản phâm" type="text" name="name" id="name" class="form-control" style= 'border: 1px solid black;color:black'>
                </div>
                
                <div class="form-group">
                    <label class="form-label" for="simpleinput" style="color:black">
                        Phân Loại <span class="text-danger">*</span>
                    </label>
                    <select class="form-control" name="category">    
                        @foreach($category as $value)
                            <option value="{{$value->id}}">{{$value->category_name}}</option>
                        @endforeach                 
                    </select>
                </div>
                <div class="form-group">
                    <label class="form-label" for="simpleinput" style="color:black">
                        Tên Thương Hiệu <span class="text-danger">*</span>
                    </label>
                    <select class="form-control" name="brand">    
                        @foreach($brand as $value)
                            <option value="{{$value->id}}">{{$value->brand_name}}</option>
                        @endforeach                 
                    </select>
                </div>
                <div class="form-group">
                    <label class="form-label" for="simpleinput" style="color:black">
                     Shop <span class="text-danger">*</span>
                    </label>
                    <select class="form-control" name="seller">    
                        @foreach($seller as $value)
                            <option value="{{$value->id}}">{{$value->shop_info}}</option>
                        @endforeach                 
                    </select>
                </div>

                <div class="form-group">
                    <label class="form-label" for="simpleinput" style="color:black">
                        Giá <span class="text-danger">*</span>
                    </label>
                    <input placeholder = "nhập giá sản phâm" type="text" required maxlength="100"
                        name="price" id="price" class="form-control" style= 'border: 1px solid black;color:black'>
                </div>

                <div class="form-group">
                    <label class="form-label" for="simpleinput" style="color:black">
                        Giảm Giá <span class="text-danger">*</span>
                    </label>
                    <input placeholder = "nhập giảm sản phâm" type="text" required maxlength="10"
                        name="count" id="count" class="form-control" style= 'border: 1px solid black;color:black'>
                </div>
                <div class="form-group">
                    <label class="form-label" for="simpleinput" style="color:black">
                        Content <span class="text-danger">*</span>
                    </label>
                    <input placeholder = "nhập content sản phâm" type="text" required maxlength="100"
                        name="content" id="content" class="form-control" style= 'border: 1px solid black;color:black'>
                </div>
                <div class="form-group">
                    <label class="form-label" for="simpleinput" style="color:black">
                        Status <span class="text-danger">*</span>
                    </label>
                    <select class="form-control" name="category">    
                        <option value="0">Ẩn</option>
                        <option value="1">Hiển Thị</option>
                    </select>
                </div>

                <div class="form-group">
                    <label class="form-label" for="simpleinput" style="color:black">
                        Ảnh 1 <span class="text-danger">*</span>
                    </label>
                    <input type="file" required accept="image/*"name="image1" id="image1" onchange="loadFile1(event)">
                    <img id="output1" width="100px" height="100px" src="{{ asset('assets/images/shiper.png') }}"/>
                </div>
                <div class="form-group">
                    <label class="form-label" for="simpleinput" style="color:black">
                        Ảnh 2 <span class="text-danger">*</span>
                    </label>
                    <input type="file" required accept="image/*"name="image2" id="image2" onchange="loadFile2(event)">
                    <img id="output1" width="100px" height="100px" src="{{ asset('assets/images/shiper.png') }}"/>
                </div>
                <div class="form-group">
                    <label class="form-label" for="simpleinput" style="color:black">
                        Ảnh 3 <span class="text-danger">*</span>
                    </label>
                    <input type="file" required accept="image/*"name="image3" id="image3" onchange="loadFile3(event)">
                    <img id="output3" width="100px" height="100px" src="{{ asset('assets/images/shiper.png') }}"/>
                </div>

                <div class="form-group">
                    <label class="form-label" for="simpleinput" style="color:black">
                        Ảnh 4 <span class="text-danger">*</span>
                    </label>
                    <input type="file" required accept="image/*"name="image4" id="image4" onchange="loadFile4(event)">
                    <img id="output4" width="100px" height="100px" src="{{ asset('assets/images/shiper.png') }}"/>
                </div>

                <div class="modal-footer">
                    <button type="submit"
                        class="btn btn-primary">Thêm mới</button>
                </div>
                
            </form>
        </div>
    </div>
</div>

@push('script')
<script>
    var loadFile1 = function(event) {
        var lenght = document.getElementById('image1').files.length;
        var output = document.getElementById('output1');
        if(lenght != 0){
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
                URL.revokeObjectURL(output.src) 
            }
        }else{
            output.src = "{{ asset('assets/images/shiper.png') }}";
        }
    };
    var loadFile2 = function(event) {
        var lenght = document.getElementById('image2').files.length;
        var output = document.getElementById('output2');
        if(lenght != 0){
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
                URL.revokeObjectURL(output.src) 
            }
        }else{
            output.src = "{{ asset('assets/images/shiper.png') }}";
        }
    };
    var loadFile3 = function(event) {
        var lenght = document.getElementById('image3').files.length;
        var output = document.getElementById('output3');
        if(lenght != 0){
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
                URL.revokeObjectURL(output.src) 
            }
        }else{
            output.src = "{{ asset('assets/images/shiper.png') }}";
        }
    };
    var loadFile4 = function(event) {
        var lenght = document.getElementById('image4').files.length;
        var output = document.getElementById('output4');
        if(lenght != 0){
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
                URL.revokeObjectURL(output.src) 
            }
        }else{
            output.src = "{{ asset('assets/images/shiper.png') }}";
        }
    };
</script>

@endpush

@endsection