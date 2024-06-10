@extends('layouts.app')

@section('title', 'Perpus TB')

@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <h3>Dashboard</h3>
                <div class="card-body ">
                    <div>
                        <label for="">Total Buku : </label>
                    <progress value="{{ $totalBooks }}" max="100">{{ $totalBooks }}</progress>
                    </div>
                    <div>
                        <label>Total Users : </label>
                    <progress value="{{ $totalUsers }}" max="100">{{ $totalUsers }}</progress>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection