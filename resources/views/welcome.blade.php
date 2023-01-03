@extends('layouts.app')
@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-6">
                <h1 class="font-weight-semibold m-4 text-left" data-aos="zoom-in" data-aos-delay="100">
                    Kerjakan, kerjakan dan Sukses! 🚂 🚂
                </h1>
                <p class="text-left m-4">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut ea voluptatum, consequuntur sit laborum
                    neque nostrum recusandae rerum molestias autem consequatur! Esse cupiditate fugiat quae dicta odit
                    obcaecati error eligendi!
                </p>
                <div class="d-flex justify-content-start m-4">
                    <a href="{{ url('list-soal') }}" class="btn btn-info me-2">
                        <span class="mdi mdi-lock"></span> Kerjakan Soal</a>
                </div>
            </div>
            <div class="col-lg-6">
                <img id="img-fluid" class="h-auto mw-100"
                    src="http://api.elements.buildwithangga.com/storage/files/2/assets/Header/Header2/Header-2-1.png"
                    alt="" />
            </div>
        </div>
    </div>
@endsection
