<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel Crud</title>
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
</head>
<body class="bg-light">
    <div class="p-3 mb-2 bg-dark text-white ">
        <div class="container">
            <div class="h3">
                Laravel Crud Application
            </div>
        </div>
    </div>
    
    <div class="container">
        <div class="row">
            @if(Session::has('msg'))
                <div class="col-md-12">
                    <div class="alert alert-success" > {{Session::get('msg')}} </div>
                </div>
            @endif
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Articles/List</h4>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead class="thead-dark">
                                <th>ID</th>
                                <th>Article Type</th>
                                <th>Title</th>
                                <th>Author</th>
                            </thead>
                            @if($articles ?? '')
                                @foreach($articles ?? '' as $article )
                                <tr>
                                    <td> {{$article->id}} </td>
                                    <td> {{$article->article_type}} </td>
                                    <td> {{$article->title}} </td>
                                    <td> {{$article->author}} </td>
                                </tr>
                                @endforeach
                            @else
                            <tr>
                                <td colspan="6" >Articles Not Added.</td>
                            </tr>
                            @endif
                            @if(Session::has('errorMsg'))
                                <div class="col-md-12">
                                    <div class="alert alert-danger" > {{Session::get('errorMsg')}} </div>
                                </div>
                            @endif
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>