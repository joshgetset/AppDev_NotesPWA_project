@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/showNote.css') }}">

<div class="note-wrapper">
    <div class="note-card">
        <h1 class="note-title">Notes Application</h1>

        <p class="note-subtitle">
            This is a note page     
        </p>

        <div class="author-box">
            <span class="author-name">Josiah Joed G. Getes</span>
            <span class="author-section">BSIT 3 - A</span>
        </div>

        <a href="{{ route('notes.index') }}" class="back-btn">
            ← Back to Notes
        </a>
    </div>
</div>
@endsection
