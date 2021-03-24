@extends('admin.layouts.master')

@section('content')
<div class="content-wrapper">
    <h3>Quản Lý User Của Hệ Thống</h3>
    <div class="container-fluid"> 
        <div class="row ">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="dt-basic-example" class="table table-bordered table-hover table-striped w-100">
                
                            <thead class="bg-primary-600">
                            <tr>
                                <th>#</th>
                                <th>Tên</th>
                                <th>email</th>
                                {{-- <th></th> --}}
                            </tr>
                            </thead>
                
                            <tbody>
                            <?php if (!isset($page) || $page == 1) $total = 1 ?>
                            <?php if ($page >= 2) $total = ($page - 1) * 6 + 1 ?>
                            @foreach($user as $value)
                                <tr class="data-row">
                                    <td>{{ $total++ }}</td>
                                    <td id="name"><p class = 'text'>{{ $value->name }}</p></td>
                                    <td id="email"><p class = 'text'>{{ $value->email }}</p></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{ $user->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection