@extends('layouts.master')

@section('contents')
    <?php 
        $configuration = [];
        if($user->settings){
            $configuration = $user->settings;
            $configuration = json_decode($configuration->settings, true);
        }                
    ?>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <span class="h3">
                    Welcome <?php echo $user->name; ?>
                </span> 
                <hr>
            </div>            
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Invoice Configuration
                    </div>
                    <div class="card-body">
                        <form action="<?php echo route('invoice.update', $user->id); ?>" method="post">
                            <input type="hidden" name="_method" value="put">
                            @csrf
                            <input type="hidden" name="user_id" value="<?php echo $user->id; ?>">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="bouquet-image" 
                                    name="settings[bouquet-image]" value="1" 
                                    <?php echo (isset($configuration['bouquet-image']) && $configuration['bouquet-image'] == 1) ? 'checked' : ''; ?>
                                >
                                <label class="form-check-label" for="bouquet-image">Display bouquet image</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="flower-details" name="settings[flower-details]" value="1"
                                    <?php echo (isset($configuration['flower-details']) && $configuration['flower-details'] == 1) ? 'checked' : ''; ?>
                                >
                                <label class="form-check-label" for="flower-details">Display flower details</label>
                            </div>
                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" id="pricing-summary" name="settings[pricing-summary]" value="1"
                                    <?php echo (isset($configuration['pricing-summary']) && $configuration['pricing-summary'] == 1) ? 'checked' : ''; ?>
                                >
                                <label class="form-check-label" for="pricing-summary">Display pricing summary</label>
                            </div>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">                
                <a href="<?php echo route('invoice.show',$user->id); ?>" class="btn btn-primary mt-5">Download Invoice</a> 
            </div>
        </div>
    </div>

@endsection