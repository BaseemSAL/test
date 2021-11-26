<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>ff</title>
</head>
<body>
<form method="get" action="{{url('offer\all')}}">

    @if(session("error"))
        <div class="alert alert-success" role="alert">
            {{session("error")}}

        </div>
    @endif
    <table class="table">
        <thead>
        <tr>
            <th scope="col"></th>
            <th scope="col">Name</th>
            <th scope="col">Price</th>
            <th scope="col">Details</th>
            <th scope="col">Operation</th>
            <th scope="col">Delete</th>

        </tr>
        </thead>
        <tbody>
        @foreach($offers as $offer)
        <tr>

            <th scope="row">{{$offer->id}}</th>

            <td>{{$offer->name}} </td>
            <td>{{$offer->price}}</td>
            <td>{{$offer->photo}}</td>
           <td>
                   <a href="{{url('offer/edit/'.$offer->id)}}" class="btn btn-primary" type="submit">Update</a>
               </td>

            <td>
                <a href="{{url('offer/delete/'.$offer->id)}}" class="btn btn-danger" type="submit">delete</a>
            </td>


        </tr>
        @endforeach

        </tbody>
    </table>
</form>
</body>
</html>
