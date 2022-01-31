@extends('layouts.main')
@section('content')
<section class="container-fluid">
   <div class="row">
      <div class="col">
         @include('partials.breadcrumb')
      </div>
   </div>
   <div class="row g-4 pt-3">
      <div class="col-md-4">
         <div class="card text-center">
            <h5 class="card-header">Inventories</h5>
            <div class="card-body py-4">
               <h2 class="card-title">{{ $inventory }}</h2>
            </div>
         </div>
      </div>
      <div class="col-md-4">
         <div class="card text-center">
            <h5 class="card-header">Customers</h5>
            <div class="card-body py-4">
               <h2 class="card-title">{{ $customer }}</h2>
            </div>
         </div>
      </div>
      <div class="col-md-4">
         <div class="card text-center">
            <h5 class="card-header">Invoices</h5>
            <div class="card-body py-4">
               <h2 class="card-title">{{ $invoices->count() }}</h2>
            </div>
         </div>
      </div>
      <div class="col-md-8">
         <canvas id="myChart" class="w-100"></canvas>
      </div>
      <div class="col-md-4">
         <div class="row g-4">
            <div class="col-12">
               <div class="card text-center">
                  <h5 class="card-header">Total Revenue</h5>
                  <div class="card-body py-4">
                     <h2 class="card-title">{{ money($invoices->sum('grand_total')) }}</h2>
                  </div>
               </div>
            </div>
            <div class="col-12">
               <div class="card text-center">
                  <h5 class="card-header">Monthly Revenue</h5>
                  <div class="card-body py-4">
                     <h2 class="card-title">{{ money($invoices->whereBetween('inv_date', [Carbon\Carbon::now()->startOfMonth(), Carbon\Carbon::now()->endOfMonth()])->sum('grand_total')) }}</h2>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
@endsection
@php
   $grouped = $invoices->groupBy(function($invoice) {
      return $invoice->inv_date->format('M');
   })->map(function($row) {
      return $row->sum('grand_total');
   })->toArray();
@endphp
@push('script')
<script>
   let ctx = document.querySelector('#myChart');
   const myChart = new Chart(ctx, {
      type: 'line',
      data: {
         labels: ['', '{!! implode("', '", array_keys($grouped)) !!}', ''],
         datasets: [{
            label: 'Monthly Revenue',
            backgroundColor: 'grey',
            borderColor: 'grey',
            data: [0, {!! implode(', ', $grouped) !!}, ],
         }]
      },
      options: {}
   });
</script>
@endpush