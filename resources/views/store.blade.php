@extends('layouts.app')

@section('content')
@if (session('error'))
<div style="text-align: center" class="alert alert-danger" role="alert">
  <strong>{{session('error')}}</strong>
</div>
@endif



<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-8">
            <div class="card text-center">
            <div class="card-header">{{ __('Welcome') }} {{ $user->name}}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Your score') }}
                    <h3 class="alert alert-info">{{$user->score}}</h3>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br>

<div class="container-fluid text-center">
    <form action="/redeem" method="POST">
    @csrf
    <div class="text-center">
        <h2 class="alert alert-light">الهدايا التى يمكنك شرائها</h2>
        <select name="gift" required style="text-align: center" class="browser-default custom-select">
            <option disabled value="" selected>اختر هدية</option>
            @foreach ($gifts as $gift)
            <option value="{{$gift->id}}">{{$gift->name}} || pirce {{$gift->price}} points</option>
            @endforeach
        </select>
      <input class="btn btn-success"onclick="return confirm('هل انت متأكد من شراء الهدية؟')" value="تأكيد الشراء" type="submit">
    </div>
    <br>
    <div class="alert alert-warning" role="alert">
        أستلام الهدايا من الكنيسة يوم الاحد 23/8 من الساعة 4 الى 8  امام مبنى الانبا ونس 
        <br>
        لمن لا يناسبه الموعد برجاء مراسلة فيلوباتير على الواتساب على الرقم 01203566808   
      </div>
</form>
    @endsection
