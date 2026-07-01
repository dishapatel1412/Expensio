@extends('layouts.app')

@section('title', 'Product Details')

@section('content')
    @foreach($expense as $exp)
        <h2>{{ $expense->expense_name }}</h2>
        <p>{{ $expense->category?->category_name }}</p>
        <p>{{ $expense->amount }}</p>
        <p>{{ $expense->expense_date }}</p>
        <p>{{ $expense->description }}</p>
    @endforeach
@endsection