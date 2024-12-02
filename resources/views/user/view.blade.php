<!DOCTYPE html>
<!-- app/views/user/view.blade.php -->

@extends('layout/layout')

<html lang="en">
<!-- Edit User Form... -->

    <div class="row">
        <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-body">

                <!-- if there are creation errors, they will show here -->
                {!! Html::ul($errors->all()) !!}


                <div class="form-group">
                    {{ $user->firstNname }} {{ $user->lastName }}
                </div>
            </div>
        </div>
    </div>
</html>