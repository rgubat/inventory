@extends('template.admin_template')

@section('style')
@parent

<style>
    #myTable_wrapper{
        width:100% !important;
    }
</style>

@endsection


@section('content')

@parent
<div class="container-fluid">
    <h1 class="mt-4">Products</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item">Code Libraries</li>
        <li class="breadcrumb-item active">Products</li>
    </ol>

    <div class="row" style="flex-flow: row-reverse;">
        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal" style="
        margin-bottom: 20px !important;
        margin-right: 10px !important;
    ">Add Product</button>
    </div>

    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">

          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Products</h5>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form method="POST" id="form_products">
                    {{csrf_field()}}
                    <div>
                        <label for="code">Code No.</label>
                        <input type="text" class="form-control" id="code" name="code" placeholder="Enter code no" data-parsley-required="true"/>
                    </div>

                    <div class="code hide" style="color: red">This is required</div>

                    <div>
                        <label for="product">Product</label>
                        <input type="text" class="form-control" id="product" name="product_name" placeholder="Enter product"/>
                    </div>

                </form>


            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary save">Save changes</button>
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>

        </div>
    </div>

    <div class="row">
        <table id="myTable" class="display">
            <thead>
                <tr>
                    <th>Code</th>
                    <th>Product Name</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Row 1 Data 1</td>
                    <td>Row 1 Data 2</td>
                </tr>
                <tr>
                    <td>Row 2 Data 1</td>
                    <td>Row 2 Data 2</td>
                </tr>
            </tbody>
        </table>
    </div>

    <div id="snackbar">Saved Successfully</div>
    <div id="snackbarError">Error</div>

    <?php

        for ($i = 0; $i < 5; $i++)
        {
            for($j = 4; $j >= $i; $j-- )
            {
                echo "* ";
            }
            echo "<br/>";
        }

    ?>


</div>
@endsection

@section('js')

<script>


    $('.save').on('click', function(){
        alert($('#code').val());
        var instance = $('#form_products').parsley();
        if(instance.isValid()){

            var data = $('#form_products').serialize();

			$.post("process_products", data, function(result) {
				notification_msg(result.status, result.msg);
				button_loader(button_id, 0);

				if(result.status == "success")
				{
					var d_table = JSON.parse(result.datatable);
					if(button_id == "submit_modal_assign_subject_code"){
						$("#submit_modal_assign_subject_code").modal("close");
					}
					load_datatable(d_table);
				}

            }, 'json');

            $("#myModal .close").click();
            // Get the snackbar DIV
            var x = document.getElementById("snackbar");

            // Add the "show" class to DIV
            x.className = "show";

            // After 3 seconds, remove the show class from DIV
            setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);

        }
        else{
            $('.code').removeClass('hide');
        }

    });
</script>

@parent
@endsection
