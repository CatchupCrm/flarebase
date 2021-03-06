




<br/><br/>
<div class="col-sm-6">

    <div class="box box-primary">
        <div class="box-header with-border">
             <h4 class="box-title"
              >
                 @lang('dashboard.tasks.each_month')
             </h4>
             <div class="box-tools pull-right">
                <button type="button" id="collapse1" class="btn btn-box-tool"    data-toggle="collapse"
                 data-target="#collapseOne"><i id="toggler1" class="fa fa-minus"></i>
                </button>
              </div>
        </div>
        <div id="collapseOne" class="panel-collapse">
            <div class="box-body">
              <div>
                  ...
              </div>
            </div>
        </div>
    </div>
     <div class="box box-primary">
        <div class="box-header with-border">
             <h4 class="box-title">
                 @lang('dashboard.leads.each_month')
             </h4>
             <div class="box-tools pull-right">
                <button type="button" id="collapse2" class="btn btn-box-tool" data-toggle="collapse"
                 data-target="#collapseTwo"><i id="toggler2" class="fa fa-minus"></i>
                </button>
              </div>
        </div>
        <div id="collapseTwo" class="panel-collapse">
            <div class="box-body">
              <div >
                ...
              </div>
            </div>
        </div>
    </div>
</div>
<div class="col-sm-6">

  <div class="col-lg-12">
          <!-- Info Boxes Style 2 -->
          <div class="info-box bg-yellow">
            <span class="info-box-icon"><i class="ion ion-ios-book-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">@lang('dashboard.tasks.all')</span>
              <span class="info-box-number">All Completed / All</span>

              <div class="progress">
                <div class="progress-bar" style="width: {{$totalPercentageTasks}}%"></div>
              </div>
                  <span class="progress-description">
                    Percentage completed
                  </span>
            </div>
            <!-- /.info-box-content -->
          </div>
 </div>
          <div class="col-lg-12">
          <!-- /.info-box -->
          <div class="info-box bg-red">
            <span class="info-box-icon"><i class="ion ion-stats-bars"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">All Leads</span>
              <span class="info-box-number">{{$allCompletedLeads}} / {{$allleads}}</span>

              <div class="progress">
                <div class="progress-bar" style="width: {{$totalPercentageLeads}}%"></div>
              </div>
                  <span class="progress-description">
                    Percentage leads
                  </span>
            </div>
            <!-- /.info-box-content -->
          </div>

</div>
<div class="col-sm-12">

    <div class="box box-primary">
        <div class="box-header with-border">
             <h4 class="box-title"
              >
                 @lang('dashboard.users')
             </h4>
             <div class="box-tools pull-right">

              </div>
        </div>
        <div id="collapseOne" class="panel-collapse">
            
@foreach($users as $user)
<div class="col-lg-1">
  @if($user->isOnline())
    <i class="dot-online" data-toggle="tooltip" title="Online" data-placement="left"></i>
  @else
    <i class="dot-offline" data-toggle="tooltip" title="Offline" data-placement="left"></i>
  @endif
  <a href="{{route('users.show', $user->id)}}">
  <img class="small-profile-picture" data-toggle="tooltip" title="{{$user->name}}" data-placement="left"
  @if($user->image_path != "")
      src="images/{{$companyname}}/{{$user->image_path}}"
  @else
      src="images/default_avatar.jpg"
  @endif />
   </a>

</div>
  
@endforeach
            
        </div>
    </div>
    </div>


</div>
      </div>  


         <!-- Info boxes -->
      <div class="row movedown">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="ion ion-ios-book-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">@lang('dashboard.tasks.completed_today')</span>
              <span class="info-box-number">{{$completedTasksToday}}<small></small></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="ion ion-ios-book-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">@lang('dashboard.tasks.created_today')</span>
              <span class="info-box-number">{{$createdTasksToday}}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="ion ion-stats-bars"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">@lang('dashboard.leads.completed_today')</span>
              <span class="info-box-number">{{$completedLeadsToday}}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="ion ion-stats-bars"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">@lang('dashboard.leads.created_today')</span>
              <span class="info-box-number">{{$createdLeadsToday}}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
        </div>
    </div>
          <!-- /.info-box -->
    
