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
            <div class="col-md-12 text-right mb-3 ">
                <a href="{{route('articles.add')}}" class="btn btn-primary" >Add</a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Articles/Add</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{url('articles/add')}}" method="post" name="addArticle" id="addArticle">
                        @csrf
                            <div class="form-group" >
                                <lable for="" >Title</lable>
                                <input type="text" name="title" id="title" value="{{old('title')}}" class="form-control {{($errors->any() && $errors->first('title')) ? 'is-invalid': '' }} " >
                                @if($errors->any())
                                    <p class="invalid-feedback" >{{$errors->first('title')}}</p>
                                @endif
                            </div>
                            <div class="form-group" >
                                <lable for="" >Description</lable>
                                <textarea name="description" id="description" cols="30" rows="5" class="form-control {{($errors->any() && $errors->first('description')) ? 'is-invalid': '' }}  " >{{old('description')}}</textarea>
                                @if($errors->any())
                                    <p class="invalid-feedback" >{{$errors->first('description')}}</p>
                                @endif
                            </div>
                            <div class="form-group" >
                                <lable for="" >Author</lable>
                                <input type="text" name="author" id="author" value="{{old('author')}}" class="form-control {{($errors->any() && $errors->first('author')) ? 'is-invalid': '' }}  " >
                                @if($errors->any())
                                    <p class="invalid-feedback" >{{$errors->first('author')}}</p>
                                @endif
                            </div>
                            <div class="form-group">
                                <button type="submit" name="submit" class="btn btn-primary">Save Article</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>