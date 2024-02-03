@extends('layouts.app')

@section('title','Index Page')

@section('content')

    <h1>Index Page</h1>

    <div class="col-md-12 mb-3">
        <a href="{{route('products.create')}}" class="btn btn-primary btn-sm rounded-0"> Create New product</a>
    </div>

    <div class="col-md-12">
        <table id="mydata" class="table table-sm table-hover border">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $idx=>$product)
                <tr>
                    <td>{{++$idx}}</td> {{-- ဒါဆို db ကidမဟုတ်တော့ဘူး ဒီတိုင်း1,2,3ပဲပြမှာ --}}
                    <td>

                        {{-- <img src="{{ asset($product->image) }}" class="rounded-circle" style="width:50px;height:50px;" alt="{{$product->image}}" />
                        <img src="{{ asset('images/'.$product->image) }}" class="rounded-circle" style="width:50px;height:50px;" alt="{{$product->image}}" /> --}}

                        {{-- <img src="{{ url($product->image) }}" class="rounded-circle" style="width:50px;height:50px;" alt="{{$product->image}}" />
                        <img src="{{ url('images/'.$product->image) }}" class="rounded-circle" style="width:50px;height:50px;" alt="{{$product->image}}" /> --}}

                        {{-- <img src="{{ URL::asset($product->image) }}" class="rounded-circle" style="width:50px;height:50px;" alt="{{$product->image}}" />
                        <img src="{{ URL::asset('images/'.$product->image) }}" class="rounded-circle" style="width:50px;height:50px;" alt="{{$product->image}}" /> --}}

                        {{-- <img src="{{ asset('storage/'.$product->image) }}" class="rounded-circle" style="width:50px;height:50px;" alt="{{$product->image}}" /> --}}
                        <img src="{{ asset('storage/images/'.$product->image) }}" class="rounded-circle" style="width:50px;height:50px;" alt="{{$product->image}}" />

                    </td>
                    <td><a href="{{route('products.show',$product->id)}}">{{$product->name}}</a></td>
                    <td>{{$product->capital}}</td>
                    <td>{{$product->created_at}}</td>
                    <td>{{$product->updated_at}}</td>
                    <td>

                        <a href="{{route('products.edit',$product->id)}}" class="text-info me-3"><i class="fas fa-pen"></i></a>


                        {{-- {{route('products.destroy',$product->id)}} --}}
                        {{-- {{route('products.destroy',$product['id'])}} --}}
                        {{-- /products/{{$product->id}} --}}
                        {{-- /products/{{$product['id']}} --}}
                        {{-- {{url('/products,$product->id)}} --}}
                        {{-- {{url('products,$product['id'])}} --}}

                        <form class="formdelete" action="{{url('products',$product['id'])}}" method="POST">
                            @csrf
                            @method("DELETE")
                            <button type="submit" class="btn btn-danger btn-sm rounded-0"><i class="fas fa-trash-alt"></i></button>
                        </form>
                        {{-- <a href="{{route('products.delete',$product->id)}}" class="text-danger"><i class="fas fa-trash-alt"></i></a> --}}
                    </td>

                    <td>
                        <a href="{{route('products.edit',$product->id)}}" class="text-info me-3"><i class="fas fa-pen"></i></a>
                        <a href="#" class="text-danger" onclick="event.preventDefault();document.getElementById('formdelete-{{$product->id}}').submit();"><i class="fas fa-trash-alt"></i></a>
                    </td>
                    <form id="formdelete-{{$product->id}}" action="{{route('products.destroy',$product->id)}}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                    </form>

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection


@section('script')

<script type="text/javascript">

    $(document).ready(function(){
        $('.formdelete').on('submit',function(){
            if(confirm('Are you sure you want to delete it?')){
                return true;
            }else{
                return false;
            }
        });
    });

</script>

@endsection

