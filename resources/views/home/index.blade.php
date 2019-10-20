@extends('layouts.master')

@section('contents')
    <div class="container">
        <div class="vertical-center">
            <?php foreach ($users as $user) { ?>
                <a class="btn btn-primary" href="<?php echo route('invoice.edit', $user->id); ?>">
                    Login as {{ $user->name }}
                </a> 
            <?php } ?>
        </div>
    </div>
@endsection