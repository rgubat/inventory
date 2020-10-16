@extends('template.admin_template')


@section('content')

@parent

<div class="container-fluid">
    <h1 class="mt-4">Dashboard</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
    </ol>
    <div class="row">
        <canvas id="myChartbar" width="200" height="200"></canvas>
    </div>

    <div class="row">
        <canvas id="myChartline" width="200" height="200"></canvas>
    </div>

    <div class="row">
        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button>
    </div>

    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">

          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form method="POST">
                    <div>
                        <label for="code">Code No.</label>
                        <input type="text" class="form-control" id="code" placeholder="Enter code no"/>
                    </div>

                    <div>
                        <label for="product">Product</label>
                        <input type="text" class="form-control" id="product" placeholder="Enter product"/>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>

        </div>
      </div>

</div>
@endsection
