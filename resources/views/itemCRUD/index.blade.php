@extends('layouts.default')
@section('content')

    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-left">

                <h2 class="text-primary">Simple Invoice System</h2>

            </div>

            <div class="pull-right">

                <a class="btn btn-success" href="{{ route('itemCRUD.create') }}"><img src="images/add.png" alt="">Add Invoice</a>

            </div>

        </div>

    </div>
    <br><br>
    <!-- search box -->
    <div class="col-md-6">
          {!! Form::open(['method'=>'GET','url'=>'itemCRUD','class'=>'navbar-form navbar-left','role'=>'search']) !!}
          <div class="input-group custom-search-form">
            <input type="text" name="search" class="form-control" placeholder="Search ....">
            <span class="input-group-btn">&nbsp;
              <button type="submit" class="btn btn-default-sm">
                <i class="fa fa-search">Search</i>
              </button>
            </span>
          </div>
          {!! Form::close() !!}
    </div>
    <!-- end search box -->


    <br><br>
    @if ($message = Session::get('success'))

        <div class="alert alert-success">

            <p>{{ $message }}</p>

        </div>

    @endif


    <table class="table table-bordered">

        <tr>

            <th>No.</th>

            <th>Invoice Name</th>

            <th># of items</th>

            <th>Grand Total</th>

            <th width="280px">Action</th>

        </tr>

    <?php $i=1; ?>
    @foreach ($items as $key => $item)

    <tr>

        <td>{{ ++$i }}</td>

        <td>{{ $item->invoice_name }}</td>

        <td>{{ $item->qty }}</td>

        <td>{{ ($item->qty*$item->price)+($item->qty*$item->price)*($item->tax/100) }}</td>

        <td>

            <a class="btn btn-info" href="{{ route('itemCRUD.show',$item->id) }}">PDF</a>

            <a class="btn btn-primary" href="{{ route('itemCRUD.edit',$item->id) }}">Edit</a>

            {!! Form::open(['method' => 'DELETE','route' => ['itemCRUD.destroy', $item->id],'style'=>'display:inline']) !!}

            {!! Form::submit('Remove', ['class' => 'btn btn-danger']) !!}

            {!! Form::close() !!}

        </td>

    </tr>

    @endforeach

    </table>

    {!! $items->render() !!}

@endsection
