@extends('layouts.default')
@section('content')

 {!! Form::open(array('route' => 'itemCRUD.store','method'=>'POST')) !!}
    <input type="hidden" name="_token" value="<?= csrf_token(); ?>" >
    <h1 class="text-primary">New Invoice</h1>
    <div class="row">
        <div class="col-sm-2">
            <div class="form-group">
                <label>Invoice Name</label>
               {!! Form::text('invoice_name', null, array('class' => 'form-control')) !!}
            </div>
        </div>
    </div>

    <table class="table table-bordered table-form">
        <thead>
            <tr>
                <th>Item Name</th>
                <th># of items</th>
                <th>Price</th>
                <th>Total</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                  {!! Form::text('item_name', null, array('class' => 'form-control')) !!}
                </td>
                <td>
                   {!! Form::text('qty', null, array('class' => 'form-control')) !!}
                </td>
                <td>
                    {!! Form::text('price', null, array('class' => 'form-control')) !!}
                </td>
                <td>
                    <span class="table-text"></span>
                </td>
                <td>
                    <span class="table-remove-btn">&times;</span>
                </td>
            </tr>

        </tbody>
        <tfoot>
            <tr>
                <td colspan=3>
                  <button id="addItembutton">Add Line</button>
                </td>
                <td>Sub Total</td>
                <td></td>
            </tr>
            <tr>
                <td colspan=3></td>
                <td>Tax</td>
                <td>
                  {!! Form::text('tax', null, array('class' => 'form-control','placeholder' => '%'))  !!}
                </td>
            </tr>
            <tr>
                <td colspan=3></td>
                <td>Grand Total</td>
                <td></td>
            </tr>
        </tfoot>
    </table>
    <a href="{{route('itemCRUD.index')}}" class="btn btn-primary">Cancle</a>
    <input type="submit"  value="Create" class="btn btn-primary">
{!! Form::close() !!}

@stop
