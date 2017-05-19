@extends('layouts.default')
@section('content')

 {!! Form::model($item, ['method' => 'PATCH','route' => ['itemCRUD.update', $item->id]]) !!}
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

    <hr>

    <table class="table table-bordered table-form" id="app">
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
            <tr v-for="product in form.products">
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
                <td class="table-remove">
                    <span @click="remove(product)" class="table-remove-btn">&times;</span>
                </td>
            </tr>
        </tbody>
        <tfoot>
            <tr>
                <td class="table-empty" colspan=3><a href="#" @click="addLine()">Add Line</a></td>
                <td class="table-label">Sub Total</td>
                <td class="table-amount"></td>
            </tr>
            <tr>
                <td class="table-empty" colspan=3></td>
                <td class="table-label">Tax</td>
                <td>
                  {!! Form::text('tax', null, array('class' => 'form-control')) !!} %
                </td>
            </tr>
            <tr>
                <td class="table-empty" colspan=3></td>
                <td class="table-label">Grand Total</td>
                <td class="table-amount"></td>
            </tr>
        </tfoot>
    </table>

    <input type="submit"  value="Create" class="btn btn-primary">
{!! Form::close() !!}
@stop
