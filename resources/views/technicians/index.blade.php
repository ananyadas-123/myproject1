@extends('layouts.app')

@section('title', 'Choose Technician - ProductLife')

@section('page_title', 'Choose a Technician')

@section(
    'page_subtitle',
    'Select a verified and available technician for your repair request.'
)

@section('content')

<div class="technician-page">

    {{-- Repair Request Summary --}}
    <div class="repair-summary-card">

        <div class="repair-summary-icon">
            <i class="bi bi-tools"></i>
        </div>

        <div class="repair-summary-content">
            <span class="summary-label">
                REPAIR REQUEST
            </span>

            <h2>{{ $repairRequest->problem_title }}</h2>

            <p>
                {{ $repairRequest->problem_description }}
            </p>

            <div class="summary-meta">
                <span>
                    <i class="bi bi-flag-fill"></i>
                    {{ ucfirst($repairRequest->priority) }} Priority
                </span>

                <span>
                    <i class="bi bi-clock"></i>
                    {{ ucfirst($repairRequest->status) }}
                </span>
            </div>
        </div>

        <div class="request-status">
            <span></span>
            {{ ucfirst($repairRequest->status) }}
        </div>

    </div>


    {{-- Page Header --}}
    <div class="technician-header">

        <div>
            <span class="section-kicker">
                <i class="bi bi-person-check-fill"></i>
                VERIFIED TECHNICIANS
            </span>

            <h2>Find the right technician</h2>

            <p>
                Choose from technicians who are currently available
                and verified by ProductLife.
            </p>
        </div>

        <div class="technician-count">
            <strong>{{ $technicians->count() }}</strong>
            <span>Available</span>
        </div>

    </div>


    {{-- Technician List --}}
    @if($technicians->count())

        <div class="technician-grid">

            @foreach($technicians as $technician)

                <div class="technician-card">

                    {{-- Profile --}}
                    <div class="technician-top">

                        <div class="technician-avatar">

                            @if($technician->profile_image)
                                <img
                                    src="{{ asset('storage/' . $technician->profile_image) }}"
                                    alt="{{ $technician->name }}"
                                >
                            @else
                                <span>
                                    {{ strtoupper(substr($technician->name, 0, 1)) }}
                                </span>
                            @endif

                        </div>

                        <div class="verified-badge">
                            <i class="bi bi-patch-check-fill"></i>
                            Verified
                        </div>

                    </div>


                    {{-- Name --}}
                    <div class="technician-info">

                        <h3>{{ $technician->name }}</h3>

                        <div class="specialization">
                            <i class="bi bi-wrench-adjustable-circle"></i>
                            {{ $technician->specialization }}
                        </div>

                    </div>


                    {{-- Rating --}}
                    <div class="rating-row">

                        <div class="rating">

                            @php
                                $rating = (float) ($technician->rating ?? 0);
                                $fullStars = floor($rating);
                            @endphp

                            @for($i = 1; $i <= 5; $i++)
                                @if($i <= $fullStars)
                                    <i class="bi bi-star-fill"></i>
                                @else
                                    <i class="bi bi-star"></i>
                                @endif
                            @endfor

                            <strong>
                                {{ number_format($rating, 1) }}
                            </strong>

                        </div>

                        <span class="available-badge">
                            <span></span>
                            Available
                        </span>

                    </div>


                    {{-- Details --}}
                    <div class="technician-details">

                        <div class="detail-row">
                            <div class="detail-icon">
                                <i class="bi bi-briefcase"></i>
                            </div>

                            <div>
                                <span>Experience</span>
                                <strong>
                                    {{ $technician->experience }}
                                </strong>
                            </div>
                        </div>


                        <div class="detail-row">
                            <div class="detail-icon">
                                <i class="bi bi-geo-alt"></i>
                            </div>

                            <div>
                                <span>Location</span>
                                <strong>
                                    {{ $technician->address }}
                                </strong>
                            </div>
                        </div>


                        <div class="detail-row">
                            <div class="detail-icon">
                                <i class="bi bi-telephone"></i>
                            </div>

                            <div>
                                <span>Phone</span>
                                <strong>
                                    {{ $technician->phone }}
                                </strong>
                            </div>
                        </div>

                    </div>


                    {{-- Service Charge --}}
                    <div class="charge-box">

                        <div>
                            <span>Service Charge</span>
                            <small>Estimated technician fee</small>
                        </div>

                        <strong>
                            ₹{{ number_format((float) $technician->service_charge, 2) }}
                        </strong>

                    </div>


                    {{-- Assign --}}
                    <form
                        action="{{ route('technicians.assign', $repairRequest) }}"
                        method="POST"
                    >
                        @csrf

                        <input
                            type="hidden"
                            name="technician_id"
                            value="{{ $technician->id }}"
                        >

                        <button
                            type="submit"
                            class="assign-btn"
                        >
                            <i class="bi bi-person-check"></i>
                            Assign Technician
                        </button>

                    </form>

                </div>

            @endforeach

        </div>

    @else

        {{-- Empty State --}}
        <div class="empty-technicians">

            <div class="empty-icon">
                <i class="bi bi-person-x"></i>
            </div>

            <h3>No technicians available</h3>

            <p>
                There are currently no verified and available technicians.
                Please check again later.
            </p>

            <a
                href="{{ route('products.passport', $repairRequest->product_id) }}"
                class="back-btn"
            >
                <i class="bi bi-arrow-left"></i>
                Back to Product Passport
            </a>

        </div>

    @endif


    {{-- Bottom Navigation --}}
    <div class="bottom-navigation">

        <a
            href="{{ route('products.passport', $repairRequest->product_id) }}"
            class="back-btn"
        >
            <i class="bi bi-arrow-left"></i>
            Back to Passport
        </a>

    </div>

</div>

@endsection


@push('styles')
<style>

    .technician-page {
        max-width: 1180px;
        margin: 0 auto;
    }

    /* Repair Summary */

    .repair-summary-card {
        position: relative;
        display: flex;
        align-items: center;
        gap: 18px;
        background: linear-gradient(
            135deg,
            #ffffff 0%,
            #f4fbf7 100%
        );
        border: 1px solid #e3eee7;
        border-radius: 22px;
        padding: 22px;
        margin-bottom: 30px;
        box-shadow: 0 12px 35px rgba(23, 107, 77, .06);
        overflow: hidden;
    }

    .repair-summary-card::after {
        content: "";
        position: absolute;
        width: 150px;
        height: 150px;
        border-radius: 50%;
        background: rgba(46, 153, 105, .06);
        right: -50px;
        top: -70px;
    }

    .repair-summary-icon {
        width: 58px;
        height: 58px;
        border-radius: 17px;
        background: #e7f6ed;
        color: #176b4d;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 25px;
        flex-shrink: 0;
    }

    .repair-summary-content {
        min-width: 0;
        flex: 1;
    }

    .summary-label {
        color: #26805d;
        font-size: 10px;
        font-weight: 900;
        letter-spacing: 1px;
    }

    .repair-summary-content h2 {
        margin: 4px 0 5px;
        color: #17372b;
        font-size: 20px;
        font-weight: 850;
    }

    .repair-summary-content p {
        margin: 0 0 9px;
        color: #7a8880;
        font-size: 11px;
        line-height: 1.55;
        max-width: 650px;
    }

    .summary-meta {
        display: flex;
        flex-wrap: wrap;
        gap: 15px;
        color: #62726a;
        font-size: 11px;
        font-weight: 700;
    }

    .summary-meta i {
        color: #176b4d;
        margin-right: 4px;
    }

    .request-status {
        position: relative;
        z-index: 1;
        display: inline-flex;
        align-items: center;
        gap: 7px;
        padding: 8px 12px;
        border-radius: 30px;
        background: #fff7e6;
        color: #a86600;
        font-size: 10px;
        font-weight: 850;
        text-transform: uppercase;
    }

    .request-status span {
        width: 7px;
        height: 7px;
        background: #f59e0b;
        border-radius: 50%;
    }


    /* Header */

    .technician-header {
        display: flex;
        align-items: flex-end;
        justify-content: space-between;
        gap: 20px;
        margin-bottom: 22px;
    }

    .section-kicker {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        color: #176b4d;
        font-size: 10px;
        font-weight: 900;
        letter-spacing: .9px;
    }

    .technician-header h2 {
        margin: 6px 0 5px;
        color: #19382d;
        font-size: 25px;
        font-weight: 900;
    }

    .technician-header p {
        margin: 0;
        color: #7c8982;
        font-size: 12px;
    }

    .technician-count {
        min-width: 90px;
        padding: 12px 17px;
        border-radius: 14px;
        background: #ffffff;
        border: 1px solid #e4ece7;
        text-align: center;
    }

    .technician-count strong {
        display: block;
        color: #176b4d;
        font-size: 22px;
        font-weight: 900;
    }

    .technician-count span {
        color: #7e8b84;
        font-size: 10px;
        font-weight: 700;
    }


    /* Grid */

    .technician-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 20px;
    }


    /* Card */

    .technician-card {
        background: #ffffff;
        border: 1px solid #e4ece7;
        border-radius: 22px;
        padding: 22px;
        box-shadow: 0 10px 30px rgba(23, 107, 77, .055);
        transition: .25s ease;
    }

    .technician-card:hover {
        transform: translateY(-4px);
        border-color: #c9e2d4;
        box-shadow: 0 18px 38px rgba(23, 107, 77, .10);
    }


    /* Profile */

    .technician-top {
        display: flex;
        align-items: flex-start;
        justify-content: space-between;
        margin-bottom: 15px;
    }

    .technician-avatar {
        width: 72px;
        height: 72px;
        border-radius: 20px;
        overflow: hidden;
        background: linear-gradient(
            135deg,
            #e7f7ed,
            #d8eee2
        );
        display: flex;
        align-items: center;
        justify-content: center;
        color: #176b4d;
        font-size: 25px;
        font-weight: 900;
    }

    .technician-avatar img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .verified-badge {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        padding: 6px 9px;
        border-radius: 20px;
        background: #effaf3;
        color: #18804b;
        font-size: 9px;
        font-weight: 850;
    }


    /* Info */

    .technician-info h3 {
        margin: 0 0 6px;
        color: #203b30;
        font-size: 18px;
        font-weight: 900;
    }

    .specialization {
        display: flex;
        align-items: center;
        gap: 6px;
        color: #708078;
        font-size: 11px;
        font-weight: 650;
    }

    .specialization i {
        color: #176b4d;
    }


    /* Rating */

    .rating-row {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 14px 0;
        margin: 15px 0;
        border-top: 1px solid #edf2ef;
        border-bottom: 1px solid #edf2ef;
    }

    .rating {
        display: flex;
        align-items: center;
        gap: 2px;
        color: #f4a11a;
        font-size: 12px;
    }

    .rating strong {
        margin-left: 5px;
        color: #495b53;
        font-size: 11px;
    }

    .available-badge {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        color: #16834b;
        font-size: 9px;
        font-weight: 800;
    }

    .available-badge span {
        width: 6px;
        height: 6px;
        background: #22c55e;
        border-radius: 50%;
    }


    /* Details */

    .technician-details {
        display: grid;
        gap: 12px;
    }

    .detail-row {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .detail-icon {
        width: 32px;
        height: 32px;
        border-radius: 9px;
        background: #f0f7f3;
        color: #176b4d;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 13px;
        flex-shrink: 0;
    }

    .detail-row span {
        display: block;
        color: #9aa49f;
        font-size: 9px;
        margin-bottom: 2px;
    }

    .detail-row strong {
        display: block;
        color: #40544b;
        font-size: 10px;
        font-weight: 750;
        max-width: 190px;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }


    /* Charge */

    .charge-box {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 10px;
        padding: 13px;
        margin: 17px 0 13px;
        border-radius: 13px;
        background: #f7faf8;
        border: 1px solid #e8efeb;
    }

    .charge-box span {
        display: block;
        color: #52635a;
        font-size: 10px;
        font-weight: 800;
    }

    .charge-box small {
        display: block;
        color: #9aa49f;
        font-size: 8px;
        margin-top: 2px;
    }

    .charge-box > strong {
        color: #176b4d;
        font-size: 15px;
        font-weight: 900;
        white-space: nowrap;
    }


    /* Assign */

    .assign-btn {
        width: 100%;
        min-height: 46px;
        border: 0;
        border-radius: 11px;
        background: #176b4d;
        color: #ffffff;
        font-size: 11px;
        font-weight: 850;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 7px;
        cursor: pointer;
        transition: .2s ease;
        box-shadow: 0 7px 16px rgba(23, 107, 77, .16);
    }

    .assign-btn:hover {
        background: #12583e;
        transform: translateY(-1px);
        box-shadow: 0 10px 20px rgba(23, 107, 77, .20);
    }


    /* Empty */

    .empty-technicians {
        background: #ffffff;
        border: 1px solid #e4ece7;
        border-radius: 22px;
        padding: 55px 25px;
        text-align: center;
        box-shadow: 0 10px 30px rgba(23, 107, 77, .05);
    }

    .empty-icon {
        width: 65px;
        height: 65px;
        border-radius: 18px;
        background: #eef6f1;
        color: #176b4d;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 16px;
        font-size: 27px;
    }

    .empty-technicians h3 {
        margin: 0 0 7px;
        color: #203b30;
        font-size: 19px;
        font-weight: 850;
    }

    .empty-technicians p {
        max-width: 420px;
        margin: 0 auto 20px;
        color: #849088;
        font-size: 12px;
        line-height: 1.6;
    }


    /* Bottom */

    .bottom-navigation {
        margin-top: 25px;
    }

    .back-btn {
        display: inline-flex;
        align-items: center;
        gap: 7px;
        min-height: 42px;
        padding: 0 15px;
        border-radius: 10px;
        background: #ffffff;
        border: 1px solid #e2ebe6;
        color: #596a61;
        font-size: 11px;
        font-weight: 800;
        text-decoration: none;
        transition: .2s ease;
    }

    .back-btn:hover {
        color: #176b4d;
        background: #eff8f3;
        border-color: #cfe4d8;
    }


    /* Responsive */

    @media (max-width: 1050px) {

        .technician-grid {
            grid-template-columns: repeat(2, 1fr);
        }

    }

    @media (max-width: 760px) {

        .repair-summary-card {
            align-items: flex-start;
            flex-wrap: wrap;
        }

        .request-status {
            margin-left: 76px;
        }

        .technician-header {
            align-items: flex-start;
        }

        .technician-grid {
            grid-template-columns: 1fr;
        }

    }

    @media (max-width: 520px) {

        .repair-summary-card {
            padding: 17px;
        }

        .repair-summary-icon {
            width: 48px;
            height: 48px;
            font-size: 20px;
        }

        .repair-summary-content h2 {
            font-size: 17px;
        }

        .request-status {
            margin-left: 0;
        }

        .technician-header {
            display: block;
        }

        .technician-count {
            display: inline-block;
            margin-top: 14px;
        }

        .technician-header h2 {
            font-size: 21px;
        }

    }

</style>
@endpush