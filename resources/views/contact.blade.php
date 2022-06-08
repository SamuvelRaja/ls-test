@extends('layout.app')
@section('content')
   <div  class="cover-container d-flex w-100 h-100 p-3 mx-auto my-5 flex-column">

       <form class="w-25 mx-auto my-2 ">
        <h2 class="text-center">Contact us</h2>
        <div class="form-group"><input class="form-control" type="text" name="name" placeholder="Name"></div>
        <div class="form-group"><input class="form-control" type="email" name="email" placeholder="Email"></div>
        <div class="form-group"><textarea class="form-control" name="message" placeholder="Message" rows="4"></textarea></div>
        <div class="form-group"><button class="btn btn-primary" type="submit">send </button></div>
    </form>
   </div>
@endsection
