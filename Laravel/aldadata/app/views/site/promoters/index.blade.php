@extends('site.layouts.promoters')

<div id="promotersRoot" ng-app="promotersApp" data-token="<?php echo Session::getToken();?>">

    @if (Auth::user()->hasRole("promoter"))
    <div id="promotersContainer" class="default-btns">
    @else
    <div id="promotersContainer" class="default-rows">
    @endif
        <div ui-view></div>
    </div>

    @include('site.promoters.parts.main')
    @include('site.promoters.parts.events')
    @include('site.promoters.parts.eventforms')
    @include('site.promoters.parts.tasksS3')
    @include('site.promoters.parts.tickets')
    @include('site.promoters.parts.misc')

</div>

