@extends('layouts.app')

@section('title', 'Message')

@section('content')
<style>
    section {
        width: 100%;
        display: flex;
        flex-wrap: wrap;
        grid-template-columns: 500px 500px 500px;
        justify-content: center;
        justify-self: center;
    }

    @media screen and (max-width: 900px) {
        .column {
            flex: 50%;
        }
    }

    .productItem {
        position: relative;
        display: inline-block;
        background: white;
        width: 350px;
        height: 450px;
        margin: 70px;
        margin-top: 0px;
        color: #55595c;
        border-style: solid;
        border-color: black;

        vertical-align: center;
    }

    .img_description {
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;

        position: absolute;
        height: 100%;
        width: 100%;

        top: 0;
        bottom: 0;
        left: 0;
        right: 0;

        background-color: rgba(0, 0, 0, 0.4);
        color: white;
        visibility: hidden;
        opacity: 0;

        /* transition effect. not necessary */
        transition: color 0.15s ease-in-out, background-color 0.25s ease-in-out;
    }

    .productItem:hover .img_description {
        visibility: visible;
        opacity: 1;
    }

    .productItem:hover .productFooter {
        visibility: hidden;
    }

    .productItem>img {
        width: 100%;
        height: 100%;
    }

    .productFooter {
        position: absolute;
        bottom: 0px;
        height: 50px;
        width: 100%;
        background-color: black;
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
    }
</style>

<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('/home')}}">Home</a></li>
    <li class=" breadcrumb-item active">Messages</li>
</ol>

<h2 style="text-align: center;">Messages</h2>
<section id="products">
    @foreach($orders as $order)
    <a class="productItem" href="{{ route('messagePage.id', ['id' => $order->id]) }}">
        <div class="productFooter">
            <span>
                {{ $order->id}}
            </span>
        </div>
        <img alt="User Image" src="{{ asset('uploads/avatarImages/'. $order->img) }}">
        <div class="img_description">
            <br>
        </div>
    </a>
    @endforeach
</section>




@endsection