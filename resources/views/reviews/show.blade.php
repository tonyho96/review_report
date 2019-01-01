<?php use App\User; ?>
@extends('adminlte::page')
@section('adminlte_custom_css')
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/css/fontawesome-stars.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/css/jquery-confirm.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/css/create-review-recruit.css') }}">
@stop

@section('adminlte_custom_js')
    <script src="{{ asset('vendor/adminlte/js/jquery-confirm.min.js') }}"></script>
    <script src="{{ asset('vendor/adminlte/js/jquery.barrating.min.js') }}"></script>
    <script src="{{ asset('vendor/adminlte/js/create-review-recruit.js') }}"></script>
@stop

@section('content')

        <div class="row">

            <div class="col-md-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Review {{ $review->id }}</h3>
                    </div>

                    <div class="box-body">
                        @can('is_admin')
                            <a href="{{ url('/reviews') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        @endcan
                        @can('is_recruit')
                                <a href="{{ url('/review-recruits') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        @endcan
                        <br />
                        <br />                    
                        <div id="reviewer" class="table-div" style="max-width: 500px;">
                            <div class="table-cell-div table-cell-top" style="width: 50%;">
                                <label class="control-label">Reviewer:</label>
                                <p class="rating-comment">
                                   
                                </p>
                            </div>
                            <div class="table-cell-div table-cell-top" style="width: 25%;">
                            {{ User::findOrFail($review->reviewer)->firstname .' '. User::findOrFail($review->reviewer)->lastname}}
                            </div>
                            
                            <div class="table-cell-div table-cell-top" style="width: 25%;">
                            </div>
                        </div>


                        <div id="reviewee" class="table-div" style="max-width: 500px;">
                            <div class="table-cell-div table-cell-top" style="width: 50%;">
                                <label class="control-label">Reviewee:</label>
                                <p class="rating-comment">
                                   
                                </p>
                            </div>
                            <div class="table-cell-div table-cell-top" style="width: 25%;">
                            {{ User::findOrFail($review->reviewee)->firstname .' '. User::findOrFail($review->reviewee)->lastname}}
                            </div>
                            
                            <div class="table-cell-div table-cell-top" style="width: 25%;">
                            </div>
                        </div>


                        <div id="uniform" class="table-div" style="max-width: 500px;">
                            <div class="table-cell-div table-cell-top" style="width: 50%;">
                                <label class="control-label">Uniform / Appearance</label>
                                <p class="rating-comment">
                                {{ @$review->uniform_comment }}
                                </p>
                            </div>
                            <div class="table-cell-div table-cell-top" style="width: 25%;">
                                <span class="rating-point">{{ @$review->uniform | 0 }}</span>
                            </div>
                            
                            <div class="table-cell-div table-cell-top" style="width: 25%;">
                            </div>
                        </div>

                        <div id="hygience" class="table-div" style="max-width: 500px;">
                            <div class="table-cell-div table-cell-top" style="width: 50%;">
                                <label class="control-label">Hygience / Grooming</label>
                                <p class="rating-comment">
                                {{ @$review->hygience_comment}}
                                </p>
                                
                            </div>
                            <div class="table-cell-div table-cell-top" style="width: 25%;">
                                <span class="rating-point">{{ @$review->hygience | 0 }}</span>
                               
                            </div>
                            <div class="table-cell-div table-cell-top" style="width: 25%;">
                            </div>
                            
                        </div>

                        <div id="respectful" class="table-div" style="max-width: 500px;">
                            <div class="table-cell-div table-cell-top" style="width: 50%;">
                                <label class="control-label">Respectful / Tactful Communication</label>
                                <p class="rating-comment">
                                 {{ @$review->respectful_comment }}
                                </p>
                                
                            </div>
                            <div class="table-cell-div table-cell-top" style="width: 25%;">
                                <span class="rating-point">{{ @$review->respectful | 0 }}</span>
                               
                            </div>
                            <div class="table-cell-div table-cell-top" style="width: 25%;">
                            </div>
                        </div>

                        <div id="teamwork" class="table-div" style="max-width: 500px;">
                            <div class="table-cell-div table-cell-top" style="width: 50%;">
                                <label class="control-label">Teamwork</label>
                                <p class="rating-comment">
                                 {{ @$review->teamwork_comment }}
                                </p>
                               
                            </div>
                            <div class="table-cell-div table-cell-top" style="width: 25%;">
                                <span class="rating-point">{{ @$review->teamwork | 0 }}</span>
                            
                            </div>
                            <div class="table-cell-div table-cell-top" style="width: 25%;">
                            </div>
                            
                        </div>

                        <div id="adaptability" class="table-div" style="max-width: 500px;">
                            <div class="table-cell-div table-cell-top" style="width: 50%;">

                                <label class="control-label">Adaptability</label>
                                <p class="rating-comment">
                                 {{ @$review->teamwork_comment }}
                                </p>
                              
                            </div>
                            <div class="table-cell-div table-cell-top" style="width: 25%;">
                                <span class="rating-point">{{ @$review->adaptability | 0 }}</span>
                               
                            </div>
                            <div class="table-cell-div table-cell-top" style="width: 25%;">
                            </div>
                           
                        </div>

                        <div id="dependability" class="table-div" style="max-width: 500px;">
                            <div class="table-cell-div table-cell-top" style="width: 50%;">
                                <label class="control-label">Dependability</label>
                                <p class="rating-comment">
                                 {{ @$review->dependability_comment }}
                                </p>
                                
                            </div>
                            <div class="table-cell-div table-cell-top" style="width: 25%;">
                                <span class="rating-point">{{ @$review->dependability | 0 }}</span>
                               
                            </div>
                            <div class="table-cell-div table-cell-top" style="width: 25%;">
                            </div>
                            
                        </div>

                        <div id="attention_to_safety" class="table-div" style="max-width: 500px;">
                            <div class="table-cell-div table-cell-top" style="width: 50%;">
                                <label class="control-label">Attention to Safety</label>
                                <p class="rating-comment">
                                 {{ @$review->attention_to_safety_comment }}
                                </p>
                               
                            </div>
                            <div class="table-cell-div table-cell-top" style="width: 25%;">
                                <span class="rating-point">{{ @$review->attention_to_safety | 0 }}</span>
                               
                            </div>
                            <div class="table-cell-div table-cell-top" style="width: 25%;">
                            </div>
                            
                        </div>

                        <div id="integrity" class="table-div" style="max-width: 500px;">
                            <div class="table-cell-div table-cell-top" style="width: 50%;">
                                <label class="control-label">Integrity / Ethics</label>
                                <p class="rating-comment">
                                 {{ @$review->integrity_comment }}
                                </p>
                                
                            </div>
                            <div class="table-cell-div table-cell-top" style="width: 25%;">
                                <span class="rating-point">{{ @$review->integrity | 0 }}</span>
                               
                            </div>
                            <div class="table-cell-div table-cell-top" style="width: 25%;">
                            </div>
                            
                        </div>

                        <div id="ability_to_tolerate_stress" class="table-div" style="max-width: 500px;">
                            <div class="table-cell-div table-cell-top" style="width: 50%;">
                                <label class="control-label">Ability to Tolerate Stress</label>
                                <p class="rating-comment">
                                 {{ @$review->ability_to_tolerate_stress_comment }}
                                </p>
                                
                            </div>
                            <div class="table-cell-div table-cell-top" style="width: 25%;">
                                <span class="rating-point">{{ @$review->ability_to_tolerate_stress | 0 }}</span>
                                
                            </div>
                            <div class="table-cell-div table-cell-top" style="width: 25%;">
                            </div>
                            
                        </div>

                        <div id="decision_making" class="table-div" style="max-width: 500px;">
                            <div class="table-cell-div table-cell-top" style="width: 50%;">
                                <label class="control-label">Decision Making</label>
                                <p class="rating-comment">
                                 {{ @$review->decision_making_comment }}
                                </p>
                                
                            </div>
                            <div class="table-cell-div table-cell-top" style="width: 25%;">
                                <span class="rating-point">{{ @$review->decision_making | 0 }}</span>
                                
                            </div>
                            <div class="table-cell-div table-cell-top" style="width: 25%;">
                            </div>
                            
                        </div>

                        <div id="assertiveness" class="table-div" style="max-width: 500px;">
                            <div class="table-cell-div table-cell-top" style="width: 50%;">
                                <label class="control-label">Assertiveness</label>
                                <p class="rating-comment">
                                 {{ @$review->assertiveness_comment }}
                                </p>
                               
                            </div>
                            <div class="table-cell-div table-cell-top" style="width: 25%;">
                                <span class="rating-point">{{ @$review->assertiveness | 0 }}</span>
                               
                            </div>
                            <div class="table-cell-div table-cell-top" style="width: 25%;">
                                
                            </div>
                           
                        </div>
                        <br/><br/>
                    </div>
                </div>
            </div>
        </div>

@endsection
