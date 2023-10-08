@extends('layouts.app')

@section('title', __('outlet.edit'))

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12" style="align-content: center">
            <embed src="{{ asset('assets/extras/pon.pdf') }}" type="application/pdf" width="80%" height="600px" />
        </div>
    </div>
@endsection
