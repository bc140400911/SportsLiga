

<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="{{asset('assets/backend/plugins/jquery/jquery.min.js')}}"></script>
<script src="{{asset('assets/backend/plugins/popper/popper.min.js')}}"></script>
<script src="{{asset('assets/backend/plugins/responsejs/response.min.js')}}"></script>
<script src="{{asset('assets/backend/plugins/loading-overlay/loadingoverlay.min.js')}}"></script>
<script src="{{asset('assets/backend/plugins/tether/js/tether.min.js')}}"></script>
<script src="{{asset('assets/backend/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/backend/plugins/jscrollpane/jquery.jscrollpane.min.js')}}"></script>
<script src="{{asset('assets/backend/plugins/jscrollpane/jquery.mousewheel.js')}}"></script>
<script src="{{asset('assets/backend/plugins/flexibility/flexibility.js')}}"></script>
<script src="{{asset('assets/backend/plugins/noty/noty.min.js')}}"></script>
<script src="{{asset('assets/backend/plugins/velocity/velocity.min.js')}}"></script>

<!-- END PAGE LEVEL PLUGINS -->

<!-- BEGIN THEME LAYOUT SCRIPTS -->
<script src="{{asset('assets/backend/js/common.min.js')}}"></script>
<!-- END THEME LAYOUT SCRIPTS -->

<script src="{{asset('assets/backend/plugins/d3/d3.min.js')}}"></script>
<script src="{{asset('assets/backend/plugins/c3js/c3.min.js')}}"></script>
<script src="{{asset('assets/backend/plugins/noty/noty.min.js')}}"></script>
<script src="{{asset('assets/backend/plugins/maplace/maplace.min.js')}}"></script>
<script src="{{asset('assets/backend/plugins/datatables-net/media/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/backend/plugins/datatables-net/media/js/dataTables.bootstrap4.js')}}"></script>
<script src="{{asset('assets/backend/plugins/sweetalert/sweetalert.min.js')}}"></script>

<script src="{{asset('assets/backend/js/script.js')}}"></script>

<script src="https://maps.google.com/maps/api/js?libraries=geometry&v=3.26&key=AIzaSyBBjLDxcCjc4s9ngpR11uwBWXRhyp3KPYM"></script>
<script type="application/javascript">
    $('#sport-table').DataTable();
    $('#teams-table').DataTable();
    $('#admins-table').DataTable();
    $('#users-table').DataTable();
    $('#tournament-table').DataTable();
    (function ($) {
        $(document).ready(function () {
            c3.generate({
                bindto: '#ks-next-payout-chart',
                data: {
                    columns: [
                        ['data1', 6, 5, 6, 5, 7, 8, 7]
                    ],
                    types: {
                        data1: 'area'
                    },
                    colors: {
                        data1: '#81c159'
                    }
                },
                legend: {
                    show: false
                },
                tooltip: {
                    show: false
                },
                point: {
                    show: false
                },
                axis: {
                    x: {show:false},
                    y: {show:false}
                }
            });

            c3.generate({
                bindto: '#ks-total-earning-chart',
                data: {
                    columns: [
                        ['data1', 6, 5, 6, 5, 7, 8, 7]
                    ],
                    types: {
                        data1: 'area'
                    },
                    colors: {
                        data1: '#4e54a8'
                    }
                },
                legend: {
                    show: false
                },
                tooltip: {
                    show: false
                },
                point: {
                    show: false
                },
                axis: {
                    x: {show:false},
                    y: {show:false}
                }
            });

            c3.generate({
                bindto: '.ks-chart-orders-block',
                data: {
                    columns: [
                        ['Revenue', 150, 200, 220, 280, 400, 160, 260, 400, 300, 400, 500, 420, 500, 300, 200, 100, 400, 600, 300, 360, 600],
                        ['Profit', 350, 300,  200, 140, 200, 30, 200, 100, 400, 600, 300, 200, 100, 50, 200, 600, 300, 500, 30, 200, 320]
                    ],
                    colors: {
                        'Revenue': '#f88528',
                        'Profit': '#81c159'
                    }
                },
                point: {
                    r: 5
                },
                grid: {
                    y: {
                        show: true
                    }
                }
            });

            setTimeout(function () {
                new Noty({
                    text: '<strong>Welcome to SportsLiga Admin Dashboard</strong>!',
                    type   : 'information',
                    theme  : 'mint',
                    layout : 'topRight',
                    timeout: 3000
                }).show();
            }, 1500);

            var maplace = new Maplace({
                map_div: '#ks-payment-widget-table-and-map-map',
                controls_on_map: false
            });
            maplace.Load();
        });

    })(jQuery);
</script>
