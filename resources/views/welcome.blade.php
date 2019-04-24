@extends('layouts.app')

@section('content')
  <b-container>
      <post-index v-if="module == 'post'" :module="module"> </post-index>
      <new-index v-if="module == 'news'" :module="module"></new-index>
  </b-container>
@endsection
