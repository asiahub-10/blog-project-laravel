@extends('admin.master')

@section('title')
    Manage Slider
@endsection

@section('body')
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <h3 class="text-info text-center">{{ Session::get('message') }}</h3>
                <table class="table table-bordered table-hover table-striped" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>SL NO</th>
                            <th>Slider Image</th>
                            <th>Slider Title</th>
                            <th>Slider Para</th>
                            <th>Publication Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>SL NO</th>
                            <th>Slider Image</th>
                            <th>Slider Title</th>
                            <th>Slider Para</th>
                            <th>Publication Status</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                    @php($i=1)
                    @foreach($sliders as $slider)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td><img src="{{ asset($slider->slider_image) }}" alt="" height="100" width="120"/></td>
                            <td>{{ $slider->slider_title }}</td>
                            <td>{{ $slider->slider_para }}</td>
                            <td>{{ $slider->publication_status == 1 ? 'Published' : 'Unpublished' }}</td>
                            <td>
                                <a href="{{ route('edit-slider', ['id'=>$slider->id]) }}">Edit</a>
                                <a href="#" id="{{ $slider->id }}" onclick="
                                    event.preventDefault();
                                    var check = confirm('Are you sure to delete this ? ? ?');
                                    if (check) {
                                        document.getElementById('deleteSliderForm'+'{{ $slider->id }}').submit();
                                    }
                                ">Delete</a>
                                <form id="deleteSliderForm{{ $slider->id }}" action="{{ route('delete-slider') }}" method="post">
                                    @csrf
                                    <input type="hidden" value="{{ $slider->id }}" name="id"/>
                                </form>
                            </td>
                        </tr>
                     @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection