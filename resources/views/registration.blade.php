<?php
/**
 * Created by PhpStorm.
 * User: tblisi
 * Date: 3/25/18
 * Time: 4:26 AM
 */
$active_semester = \App\Semester::whereStatus('1')->first();
$active_yr = \App\AcademicYear::whereStatus('1')->first();
?>
@extends('layouts.app')

@section('content')
    <?php $user = Auth::user(); ?>
    <div class="container">
        <div class="row">
            @include('partials.menu')
            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Unit Registration</div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif


                            <form class="form-horizontal" method="POST">
                                {{ csrf_field() }}
                                <input type="hidden" name="student_id" value="{{$user->id}}">
                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label for="name" class="col-md-4 control-label">Unit</label>

                                    <div class="col-md-6">
                                        <select class="form-control" name="unit_id">
                                            @foreach(\App\Unit::all() as $unit)
                                                <option value="{{$unit->id}}">{{$unit->code}} - {{$unit->name}} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="name" class="col-md-4 control-label">Academic Year</label>

                                    <div class="col-md-6">
                                        <input type="hidden" value="{{$active_yr->id}}" name="a_year">
                                        <input class="form-control" type="text" value="{{$active_yr->name}}" readonly>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="name" class="col-md-4 control-label">Semester</label>

                                    <div class="col-md-6">
                                        <input type="hidden" value="{{$active_semester->id}}" name="semester">
                                        <input style="background-color: #eeeeee" class="form-control" type="text" value="{{$active_semester->name}}" readonly>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-4">
                                        <button type="submit" class="btn btn-primary">
                                            Enroll
                                        </button>
                                    </div>
                                </div>
                            </form>

                            <table class="table table-bordered">
                                <tr>
                                    <th>#</th>
                                    <th>Unit</th>
                                    <th>Academic Year</th>
                                    <th>Semester</th>
                                </tr>
                                @foreach($items as $item)
                                    <tr>
                                        <td>{{$item->id}}</td>
                                        <td>{{$item->unit->code}} - {{$item->unit->name}}</td>
                                        <td>{{$active_yr->name}}</td>
                                        <td>{{$active_semester->name}}</td>
                                    </tr>
                                @endforeach
                            </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
