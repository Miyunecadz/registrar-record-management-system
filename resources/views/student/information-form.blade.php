@extends('layout.contentLayoutMaster')

@section('title', 'Student | Information Form')

@section('content')


    <h5 class="py-3">
        <span class="text-muted fw-light">Student /</span> Information Form
    </h5>

    <div class="row">

    <x-form.information
        :data="[]"
        formURL="localhost/requestor"
        formTitle="Student Information"
        cancelURL="{{ route('student.decline')}}"
        cancelText="Decline"
        cancelVisible="true"
    >
    </x-form.information>

        
    </div>

@endsection