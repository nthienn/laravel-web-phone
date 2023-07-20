<!-- Content Wrapper. Contains page content -->
@extends('admin.layouts.admin')

@section('title')
    <title>Trang chủ</title>
@endsection

@section('content')
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      @include('admin.partials.content-header', ['name' => 'Trang chủ', 'key' => 'Home', 'value' => 'Trang chủ'])
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
          <div class="container-fluid">

          </div>
      </section>
      <!-- /.content -->
  </div>
@endsection