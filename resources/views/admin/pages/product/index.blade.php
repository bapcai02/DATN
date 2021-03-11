@extends('admin.layouts.master')

@section('content')

<div class="content-wrapper">
  <div class = "col-md-12 ">
    <form action="" method="GET">
      <div class="row">
          <div class="col-md-4 col-xs-12 mb-2">
              <div class="form-group">
                <label class="form-label" for="example-date">Date</label>
                <input class="form-control" type="date" name="date">
              </div>
          </div>

          <div class="col-md-4 col-xs-12 mb-2">
              <div class="form-group">
                  <label class="form-label" for="simpleinput">product</label>
                  <input type="text" name="customer" class="form-control" placeholder="product name">
              </div>
          </div>
          <div class="col-md-4 col-xs-12 mb-2">
              <div class="form-group">
                  <label class="form-label" for="simpleinput">Status</label>
                  <select class="form-control" id="" name="">                     
                      <option value="">A</option>
                      <option value="0">全て</option>
                  </select>
              </div>
          </div>
          <div class="col-md-4 col-xs-12 mb-2">
              <div class="form-group">
                  <label class="form-label" for="example-select">Category</label>
                  <select class="form-control" id="example-select" name="status">
                      <option value="0">全て</option>
                  </select>
              </div>
          </div>

          <div class="col-md-4 col-xs-12 mb-2">
              <div class="d-flex flex-column align-items-start justify-content-end h-100">
                  <button class="btn btn-primary waves-effect waves-themed" type="submit">
                      <i class="fa fa-search"></i>
                      Search
                  </button>
              </div>
          </div>
      </div>
  </form>
  </div>
  <div class="container-fluid"> 
    <div class="row ">
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
          <div class="table-responsive">
          <table id="dt-basic-example" class="table table-bordered table-hover table-striped w-100">
            <div class="row mb-3">
                <div class="col-12">
                    <a class="btn btn-success btn-sm js-btn-add"
                      id="add-worker"
                      href="javascript:void(0);"
                      data-toggle="modal"
                      data-target="#add-worker-modal"
                      type="button">
                    <span>
                        <i class="fa fa-plus mr-1"></i>
                        add_new
                    </span>
                    </a>
                </div>
            </div>

            <thead class="bg-primary-600">
            <tr>
                <th>#</th>
                <th>name</th>
                <th>id</th>
                <th></th>
            </tr>
            </thead>

            <tbody>
                <tr class="data-row">
                    <td></td>
                    <td id="worker-name"></td>
                    <td id="worker-id"></td>
                    <td class="text-center">
                        <a id="delete-item"
                           class="btn btn-sm btn-danger btn-icon btn-inline-block mr-1 waves-effect waves-themed"
                           data-toggle="modal"
                           data-item-id=""
                           title="">
                            <i class="fa fa-times"></i>
                        </a>
                        <a id="edit-item"
                           class="btn btn-sm btn-primary btn-icon btn-inline-block mr-1"
                           title="Edit"
                           data-item-id=""
                           data-dismiss="">
                            <i class="fa fa-edit"></i>
                        </a>
                    </td>
                </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div><!--End Row-->
  </div>
  <!-- End container-fluid-->
  
</div>

@endsection