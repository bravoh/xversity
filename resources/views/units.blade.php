<?php
/**
 * Created by PhpStorm.
 * User: tblisi
 * Date: 3/25/18
 * Time: 3:04 AM
 */
$courses = \App\Course::all();
?>
@extends('layouts.app')

@section('content')
    <?php $user = Auth::user(); ?>
    <div class="container">
        <div class="row">
            @include('partials.menu')
            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Manage Units</div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif



                            <form class="form-horizontal" method="POST">
                                {{ csrf_field() }}
                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label for="name" class="col-md-4 control-label">Name</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                        @if ($errors->has('name'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('code') ? ' has-error' : '' }}">
                                    <label for="name" class="col-md-4 control-label">CODE</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control" name="code" value="{{ old('code') }}" required autofocus>

                                        @if ($errors->has('code'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('code') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('duration') ? ' has-error' : '' }}">
                                    <label for="name" class="col-md-4 control-label">Course</label>

                                    <div class="col-md-6">
                                        <select class="form-control" name="course">
                                            @foreach($courses as $c)
                                                <option value="{{$c->id}}">{{$c->name}}</option>
                                            @endforeach
                                        </select>

                                        @if ($errors->has('course'))
                                            <span class="help-block"><strong>{{ $errors->first('course') }}</strong></span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-4">
                                        <button type="submit" class="btn btn-primary">
                                            Save
                                        </button>
                                    </div>
                                </div>
                            </form>

                            <table class="table table-bordered">
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Code</th>
                                    <th>Course</th>
                                    <th>Action</th>
                                </tr>
                                @foreach($items as $item)
                                    <tr>
                                        <td>{{$item->id}}</td>
                                        <td>{{$item->name}}</td>
                                        <td>{{$item->code}}</td>
                                        <td>{{$item->courses->name}}</td>
                                        <td><a href="#">Delete</a></td>
                                    </tr>
                                @endforeach
                            </table>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
