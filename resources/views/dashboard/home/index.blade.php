@extends('dashboard.layout.master')

<style>
    .highcharts-credits{
        display: none;
    }
</style>

@section('main')
<div class="container-fluid">
    <!-- Info boxes -->
    <div class="row">
      <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box">
          <span class="info-box-icon bg-info elevation-1"><i class="fas fa-truck"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Vận chuyển</span>
            <span class="info-box-number">
              2
              {{-- <small>%</small> --}}
            </span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
      <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
          <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-dollar-sign"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Doanh thu</span>
            <span class="info-box-number">41,410</span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->

      <!-- fix for small devices only -->
      <div class="clearfix hidden-md-up"></div>

      <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
          <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Đơn hàng</span>
            <span class="info-box-number">760</span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
      <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
          <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Khách hàng</span>
            <span class="info-box-number">2,000</span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <section class="content">
        <div class="container-fluid">
          <div class="row">
            <script src="https://code.highcharts.com/highcharts.js"></script>
            <script src="https://code.highcharts.com/modules/exporting.js"></script>
            <script src="https://code.highcharts.com/modules/export-data.js"></script>
            <script src="https://code.highcharts.com/modules/accessibility.js"></script>
            <div class="col-md-6">
              <!-- AREA CHART -->

              <!-- /.card -->

              <!-- DONUT CHART -->
              <div class="card card-danger">
                <div class="card-header">
                  <h3 class="card-title">Thống kê doanh thu</h3>

                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                      <i class="fas fa-times"></i>
                    </button>
                  </div>
                </div>
                <div class="card-body">
                <figure class="highcharts-figures">
                    <div id="containers"></div>
                </figure>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->

              <!-- PIE CHART -->

              <!-- /.card -->

            </div>

            <!-- /.col (LEFT) -->
            <div class="col-md-6">
              <!-- LINE CHART -->

              <!-- /.card -->

              <!-- BAR CHART -->
              <div class="card card-success">
                <div class="card-header">
                  <h3 class="card-title">Thống kê đơn hàng</h3>

                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                      <i class="fas fa-times"></i>
                    </button>
                  </div>
                </div>
                <div class="card-body">
                <figure class="highcharts-figure">
                    <div id="container"></div>

                </figure>
                </div>
            </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->

              <!-- STACKED BAR CHART -->

              <!-- /.card -->

            </div>
            <!-- /.col (RIGHT) -->
          </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </section>

    <!-- /.row -->
  </div><!--/. container-fluid -->
@endsection
@section('js')
<script src="{{asset('backend/plugins/chart.js/Chart.min.js')}}"></script>

<script>
    Highcharts.chart('container', {
    chart: {
        type: 'line'
    },
    title: {
        text: 'Thống kê đơn hàng'
    },
    subtitle: {
        text: 'Source: MacTree'
    },
    xAxis: {
        categories: ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12']
    },
    yAxis: {
        title: {
            text: 'Số lượng đơn hàng'
        }
    },
    plotOptions: {
        line: {
            dataLabels: {
                enabled: true
            },
            enableMouseTracking: false
        }
    },
    series: [{
        name: 'Đơn thành công',
        data: [7.0, 6.9, 9.5, 14.5, 18.4, 21.5, 25.2, 26.5, 23.3, 18.3, 13.9, 9.6]
    }, {
        name: 'Đơn huỷ',
        data: [3.9, 4.2, 5.7, 8.5, 11.9, 15.2, 17.0, 16.6, 14.2, 10.3, 6.6, 4.8]
    }, {
        name: 'Đang vận chuyển',
        data: [3.9, 4.2, 5.7, 8.5, 11.9, 15.2, 17.0, 16.6, 14.2, 10.3, 6.6, 4.8]
    }]
});
</script>

<script>
     Highcharts.chart('containers', {
    chart: {
        type: 'line'
    },
    title: {
        text: 'Thống kê doanh thu'
    },
    subtitle: {
        text: 'Source: MacTree'
    },
    xAxis: {
        categories: ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12']
    },
    yAxis: {
        title: {
            text: 'VNĐ'
        }
    },
    plotOptions: {
        line: {
            dataLabels: {
                enabled: true
            },
            enableMouseTracking: false
        }
    },
    series: [{
        name: 'Doanh thu theo từng tháng',
        data: [7.0, 6.9, 9.5, 14.5, 18.4, 21.5, 25.2, 26.5, 23.3, 18.3, 13.9, 9.6]
    }]
});
</script>
@endsection
