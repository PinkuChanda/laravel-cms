
@extends('layouts.admin')


@section('content')


    <h1>Media</h1>

    @if($photos)

        <form action="/delete/medias" method="post" class="form-inline">

        {{csrf_field()}}

        {{method_field('delete')}}


        <div class="form-group">
            <select name="checkBoxArray" id="" class="form-control">

                <option value="delete">Delete</option>

            </select>
        </div>
        <div class="form-group">
            <input type="submit" class="btn-primary">
        </div>

    <table class="table table-striped">
        <thead>
        <tr>
            <th><input type="checkbox" id="options"></th>
            <th>Id</th>
            <th>Name</th>
            <th>Created</th>
        </tr>
        </thead>
        <tbody>

            @foreach($photos as $photo)
                <tr>
                    <td><input class="checkBoxes" type="checkbox" name="checkBoxArray[]" value="{{$photo->id}}"></td>
                    <td>{{$photo->id}}</td>
                    <td><img height="30px" width="50px" src="{{$photo->file}}" alt="" class="img-responsive img-rounded"></td>
                    <td>{{$photo->created_at->diffForHumans()}}</td>
                    <td>
                        {!! Form::open(['method' => 'DELETE', 'route' => ['medias.destroy', $photo->id]]) !!}

                        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}

                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>

        </form>

    @endif

@stop


@section('scripts')


    <script>


        $(document).ready(function(){


            $('#options').click(function(){


                if(this.checked){

                    $('.checkBoxes').each(function(){


                        this.checked = true;

                    });

                }else {

                    $('.checkBoxes').each(function(){


                        this.checked = false;

                    });



                }






            });



        });


    </script>


@stop