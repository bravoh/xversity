<?php
/**
 * Created by PhpStorm.
 * User: tblisi
 * Date: 3/25/18
 * Time: 6:31 PM
 */
?>
@extends('layouts.app')

@section('content')
    <?php $user = Auth::user(); ?>
    <div class="container">
        <div class="row">
            @include('partials.menu')
            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Student Enrollments</div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        <a href="{{url('enrollments/print')}}" class="btn btn-default pull-right" style="margin-bottom: 10px">Print</a>

                        <table class="table table-bordered">
                            <tr>
                                <th>#</th>
                                <th>Registration No</th>
                                <th>Student Name</th>
                                <th>Course</th>
                                <th>Unit</th>
                                <th>Date</th>
                            </tr>
                            @foreach($items as $item)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>stud_00{{$item->student->id}}</td>
                                    <td>{{$item->student->name}}</td>
                                    <td>{{$item->unit->courses->name}}</td>
                                    <td>{{$item->unit->code}}</td>
                                    <td>{{$item->created_at}}</td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


