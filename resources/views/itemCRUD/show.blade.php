@extends('layouts.default')
@section('content')

    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-left">

                <h2 class="text-primary"> Show Item Invoice</h2>

            </div>

            <div class="pull-right">

                <a class="btn btn-primary" href="{{ route('itemCRUD.index') }}"> Back</a>

            </div>

        </div>

    </div>


    <div class="row">


        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Item Name:</strong>

                {{ $item->item_name }}

            </div>

        </div>


        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Qty:</strong>

                {{ $item->qty }}

            </div>

        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Price:</strong>

                {{ $item->price }}

            </div>

        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Total:</strong>

                {{ $item->qty*$item->price }}

            </div>

        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Subtotal:</strong>

                {{ $item->qty*$item->price }}

            </div>

        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Tax:</strong>

              {{ ($item->qty*$item->price)*($item->tax/100) }}

            </div>

        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Grand Total:</strong>

              {{ ($item->qty*$item->price)+($item->qty*$item->price)*($item->tax/100) }}

            </div>

        </div>

    </div>


@endsection
