<?php
/**
 * Created by PhpStorm.
 * User: tblisi
 * Date: 3/25/18
 * Time: 2:53 AM
 */
?>
<div class="col-md-3">
    <div class="panel panel-default">
        <div class="panel-heading">Menu</div>

        <div class="panel-body">
            @if($user->type =='admin')
                <ul class="nav">
                    <li><a href="{{url('academic-years')}}">Academic Years</a></li>
                    <li><a href="{{url('semesters')}}">Semesters</a></li>
                    <li><a href="{{url('courses')}}">Courses</a></li>
                    <li><a href="{{url('units')}}">Units</a></li>
                    <li><a href="{{url('students')}}">Students</a></li>
                    <li><a href="{{url('enrollments')}}">Enrollments</a></li>
                </ul>
            @endif

            @if($user->type =='student')
                <ul class="nav">
                    <li><a href="{{url('registration')}}">Unit Registration</a></li>
                </ul>
            @endif
        </div>
    </div>
</div>
