@extends('layouts.app')

@section('breadcrumb')
    @include('common.breadcrumb')
@stop

@section('content')
  <br><br><br><br><br><br>
  	
  	
  <!-- <div id="static-content" class="col-md-10">
      <h1 id="par-1">par-1</h1>
    <h2 id="sub-par-1-1">sub-par-1-1</h2>
    <h2 id="sub-par-1-2">sub-par-1-2</h2>
      <h1 id="par-2">par-2</h1>
    <h2 id="sub-par-2-1">sub-par-2-1</h2>
    <h2 id="sub-par-2-2">sub-par-2-2</h2>
  </div> -->
  @foreach ($categories as $item => $category)
    <!-- <ul class="nav child_menu">
      <li>list</li>
      <li>waiting posts</li>
      <li>rejected posts</li>
      <li>approval posts</li>
    </ul> -->
    <h1> {{ $categories[$item]->root_name }} </h1>
    <h2> {{ $categories[$item]->node1_name }} </h2>
    <h4> {{ $categories[$item]->node2_name }} </h4>
    <h6> {{ $categories[$item]->node3_name }} </h6>
  @endforeach
@endsection

