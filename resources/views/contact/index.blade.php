@extends('layouts.app')

@section('title', 'Contact · Anovator GCC')
@section('description', 'Contact Anovator GCC in Qatar, UAE, Saudi Arabia, Bahrain, Kuwait, and Oman. Request a demo or a tailored consultation.')

@section('content')
<section class="page-hero has-photo" style="background-image:url('{{ asset('images/photos/map.png') }}')">
    <p class="breadcrumb"><a href="{{ route('home') }}">Home</a> / Contact</p>
    <p class="kicker">Contact Us</p>
    <h1>Let Us Help You Choose the Right Solution</h1>
    <p>Our GCC team is ready to answer your inquiries and provide a tailored proposal. We will reply within 24 hours.</p>
</section>

<section class="page-wrap">
    <div class="contact-layout">
        <div class="contact-info">
            <div class="contact-card">
                <span>Email</span>
                <a href="mailto:contact@anovatorgcc.com">contact@anovatorgcc.com</a>
            </div>
            <div class="contact-card">
                <span>Phone</span>
                <a href="tel:+97450664777">+974 5066 4777</a><br>
                <a href="tel:+97472020005">+974 7202 0005</a>
            </div>
            <div class="contact-card">
                <span>Hours</span>
                Sunday – Thursday, 8:00 AM – 6:00 PM
            </div>
            <div class="contact-card">
                <span>Coverage</span>
                {{ implode(' · ', $countries) }}
            </div>
        </div>

        <div>
            <h2 class="section-title">Request a Tailored Consultation</h2>
            <form class="underline-form" method="post" action="{{ route('contact.store') }}">
                @csrf
                <div class="form-row two">
                    <div>
                        <label>Full Name *</label>
                        <input type="text" name="full_name" required value="{{ old('full_name') }}">
                        @error('full_name')<p class="form-error">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label>Email *</label>
                        <input type="email" name="email" required value="{{ old('email') }}">
                        @error('email')<p class="form-error">{{ $message }}</p>@enderror
                    </div>
                </div>
                <div class="form-row two">
                    <div>
                        <label>Phone</label>
                        <input type="text" name="phone" value="{{ old('phone') }}">
                    </div>
                    <div>
                        <label>Facility Type</label>
                        <select name="facility_type">
                            <option value="">— Select —</option>
                            @foreach($facilityTypes as $type)
                                <option value="{{ $type }}" @selected(old('facility_type') === $type)>{{ $type }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <label>Message</label>
                    <textarea name="message">{{ old('message') }}</textarea>
                </div>
                <button class="btn-solid" type="submit">Contact Anovator GCC →</button>
            </form>
        </div>
    </div>
</section>
@endsection
