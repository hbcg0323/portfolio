@extends('admin.layouts.app')
@section('page')

    @section('style')
        <link href="{{asset('assets/css/admin/taskmng.css')}}" rel="stylesheet">
    @endsection

    @section('scripts')
        <script src="{{asset('assets/js/pages/dashboard.js')}}"></script>
        <script src="{{asset('assets/js/pages/task.js')}}"></script>
    @endsection

    <!-- /# sidebar -->
    <div class="content-wrap">
        <div class="main">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8 p-r-0 title-margin-right">
                        <div class="page-header">
                            <div class="page-title">
                                <h1>Dashboard</h1>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                    <div class="col-lg-4 p-l-0 title-margin-left">
                        <div class="page-header">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="{{url('admin')}}">Dashboard</a></li>
                                    <li class="active">Home</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                </div>
                <!-- /# row -->
                <section id="main-content">
                    <div class="row">
                        <div class="col-md-2">
                            <span>Filter</span>
                       
                            <select class="form-control year" name="year">
                                @for($i = date('Y')-5; $i <= date('Y')+5; $i++)
                                    <option @if($i == date('Y')) selected @endif value="{{$i}}">{{$i}}</option>
                                @endfor
                            </select>
                       
                            <select class="form-control month" name="month">
                                @for($i = 1; $i <= 12; $i++)
                                    <option @if($i == date('m')) selected @endif value="{{$i}}">{{$i}}</option>
                                @endfor
                            </select>
                        </div>
                        <h3 class="total_price">Total Price :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; $ {{ $total_price }}</h3>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card alert">
                                <div class="card-header row">
                                    <h4>Task List</h4>
                                    
                                </div>
                                <div class="bootstrap-data-table-panel">
                                    <div class="table-responsive">
                                        <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">No</th>
                                                    <th class="text-center">User</th>
                                                    <th class="text-center">Teammate</th>
                                                    <th class="text-center">Title</th>
                                                    <th class="text-center desc">Desc</th>
                                                    <th class="text-center">Payment Mode</th>
                                                    <th class="text-center">Contract Price</th>
                                                    <th class="text-center">Start Date</th>
                                                    <th class="text-center">End Date</th>
                                                    <th class="text-center">Status</th>
                                                    <th class="text-center">UpWork.com</th>
                                                    <th class="text-center">Freelancer.com</th>
                                                    <th class="text-center">Paypal</th>
                                                    <th class="text-center">Payoneer</th>
                                                    <th class="text-center">Total Price</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i = 0; ?>
                                                @foreach($tasks as $task)
                                                    <?php $i++; ?>
                                                    @if($task->status == 2)
                                                        <tr class="complete">
                                                    @elseif($task->status == 3 || $task->status == 4)
                                                        <tr class="incomplete">
                                                    @else
                                                        <tr>
                                                    @endif
                                                        <td class="text-center">{{$i}}</td>
                                                        <td>
                                                            {{$task->name}}
                                                        </td>
                                                        <td>
                                                        @if($task->teammate != 0)
                                                        {{$task->teammate}}
                                                        @endif
                                                        </td>
                                                        <td>
                                                            {{$task->title}}
                                                        </td>
                                                        <td class="desc">
                                                            {{$task->desc}}
                                                        </td>
                                                        <td>
                                                            @if($task->payment_mode == 1)
                                                                Fixed
                                                            @elseif($task->payment_mode == 2)
                                                                Hourly
                                                            @endif
                                                        </td>
                                                        <td class="text-right">
                                                            {{$task->contract_price}}
                                                        </td>
                                                        <td>
                                                            {{$task->start_date}}
                                                        </td>
                                                        <td>
                                                            {{$task->end_date}}
                                                        </td>
                                                        <td>
                                                        @if ($task->status == 1)
                                                            Processing
                                                        @elseif($task->status == 2)
                                                            Complete
                                                        @elseif($task->status == 3)
                                                            Incomplete
                                                        @elseif($task->status == 4)
                                                            Cancel
                                                        @endif
                                                        </td>
                                                        <td class="text-right">@if($task->upwork != 0){{$task->upwork}}@endif</td>
                                                        <td class="text-right">@if($task->freelancer != 0){{$task->freelancer}}@endif</td>
                                                        <td class="text-right">@if($task->paypal != 0){{$task->paypal}}@endif</td>
                                                        <td class="text-right">@if($task->payoneer != 0){{$task->payoneer}}@endif</td>
                                                        <td class="text-right">@if($task->price != 0){{$task->price}}@endif</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- /# card -->
                        </div>
                        <!-- /# column -->
                    </div>
                    <!-- /# row -->
                </section>
            </div>
        </div>
    </div>

    <div id="search">
        <button type="button" class="close">×</button>
        <form>
            <input type="search" value="" placeholder="type keyword(s) here" />
            <button type="submit" class="btn btn-primary">Search</button>
        </form>
    </div>
@endsection 