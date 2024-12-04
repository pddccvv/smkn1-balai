@extends('layouts.master')

@section('title', 'Kontak | Informasi')

@push('css')
    <link rel="stylesheet" href="{{ asset('css/user/contact.css') }}">
@endpush

@section('content')
    <div class="container">
        <h2 class="text-danger fw-bolder text-center mb-4">HUBUNGI KAMI</h2>
        <hr class="text-danger">

        @include('components.error_handle')

        <div class="row align-items-center">
            <div class="col-md-6 mb-4">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15959.219981266377!2d110.0944659!3d0.1480796!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31fd6f82ea01bfcd%3A0x104c2d6e008485bc!2sSMKN%201%20Balai!5e0!3m2!1sid!2sid!4v1730125344104!5m2!1sid!2sid"
                    width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
                <p class="mt-3 text-center text-muted">
                    Bakung, Hilir, Kec. Balai, Kabupaten Sanggau, Kalimantan Barat 78563
                </p>
            </div>

            <div class="col-md-6">
                <ul class="list-unstyled">
                    <li class="mb-3">
                        @if ($contact->whatsapp)
                            <a href="https://wa.me/{{ $contact->whatsapp }}" target="_blank"
                                class="btn btn-success w-100 d-flex align-items-center justify-content-center shadow-sm">
                                <i class="fa-brands fa-whatsapp me-2" style="font-size: 1.5rem;"></i> WhatsApp
                            </a>
                        @else
                            <span class="text-muted">WhatsApp not available</span>
                        @endif
                    </li>
                    <li class="mb-3">
                        @if ($contact->mail)
                            <a href="mailto:{{ $contact->mail }}"
                                class="btn btn-primary w-100 d-flex align-items-center justify-content-center shadow-sm">
                                <i class="fa-solid fa-envelope me-2" style="font-size: 1.5rem;"></i> Email
                            </a>
                        @else
                            <span class="text-muted">Email not available</span>
                        @endif
                    </li>
                    <li class="mb-3">
                        @if ($contact->facebook)
                            <a href="{{ $contact->facebook }}" target="_blank"
                                class="btn btn-info w-100 d-flex align-items-center justify-content-center text-white shadow-sm">
                                <i class="fa-brands fa-facebook me-2" style="font-size: 1.5rem;"></i> Facebook
                            </a>
                        @else
                            <span class="text-muted">Facebook not available</span>
                        @endif
                    </li>
                    <li class="mb-3">
                        @if ($contact->instagram)
                            <a href="{{ $contact->instagram }}" target="_blank"
                                class="btn btn-danger w-100 d-flex align-items-center justify-content-center shadow-sm">
                                <i class="fa-brands fa-instagram me-2" style="font-size: 1.5rem;"></i> Instagram
                            </a>
                        @else
                            <span class="text-muted">Instagram not available</span>
                        @endif
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endsection
