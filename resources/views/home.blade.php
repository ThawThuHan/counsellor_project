@extends('layouts.master')

@section('content')
    {{-- Hero Section --}}
    @if (session('success'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
      <strong>{{ session('success') }}</strong>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <div class="container mb-4">
        <div class="row">
            <div class="col-6">
                <img src="/assets/images/undraw_doctor_kw-5-l.svg" style="width: 100%" alt="">
            </div>
            <div class="col-6 d-flex flex-column justify-content-center align-items-end">
                <h1 class="text-white text-end mb-4">Welcome To <br> Aceplus <br> Online Counselling</h1>
                <a class="btn btn-primary" href="/find-counsellor">Get Start Now</a>
            </div>
        </div>
    </div>
    
    <div class="container border rounded py-4 mb-4">
        <h3 class="text-white text-center mb-4">What is Counselling?</h3>
        <div class="row">
            <div class="col-6 d-flex justify-content-center">
                <img src="/assets/images/9O5A0342.jpg" style="width: 80%; border-radius: 20px" alt="">
            </div>
            <div class="col-6">
                <p class="text-white">
                    <b>Counselling</b> is a talking therapy that involves a trained therapist listening to you and helping you find ways to deal with emotional issues leading to positive ways.” Whatever your problems may be, by exploring your situation in a safe and non-judgmental professional environment, we can search together for new possibilities. Therapy offers a space where you can be heard, a space where you can speak, feel and think freely, perhaps for the first time.
                </p>
            </div>
        </div>
    </div>

    <div class="container py-4 mb-4">
        <div class="row">
            <div class="col-6 text-white d-flex flex-column justify-content-center align-items-center">
                <h3 class="text-primary">Why Anyone need a counselling?</h3>
                <p>Counselling can help you become a better person and grow in new ways. It’s additional input that can spark your development both personally and professionally. In counselling, you can work on developing the traits and behaviours that you aspire to have.</p>
            </div>
            <div class="col-6">
                <img src="/assets/images/undraw_meditation_re_gll0.svg" style="width: 80%" alt="">
            </div>
        </div>
    </div>

    <div class="container text-white mb-4">
        <hr>
        <h5>
            <i class="fa-solid fa-quote-left"></i>
            Talking about it can help identify, treat and start to heal the pain and turmoil caused by these experiences and feelings. Talking about it can help create some mental and emotional space inside to be able to consider what to do next - irrespective, or even despite, what the diagnosis might be.
            <i class="fa-solid fa-quote-right"></i> <br>
            <div class="text-end">- Psychotherapist Karin Sieger.</div>
        </h5>
        <hr>
    </div>
@endsection