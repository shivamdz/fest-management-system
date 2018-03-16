<script type="text/javascript">
    let {{ $chart->id }}_load = function() {
        if (document.getElementById("{{ $chart->id }}")) {
            window.{{ $chart->id }} = new Highcharts.Chart("{{ $chart->id }}", {
                series: {!! $chart->formatDatasets() !!},
                {!! $chart->formatOptions(false, true) !!}
            });
        }
    };
    window.addEventListener("load", {{ $chart->id }}_load);
    document.addEventListener("turbolinks:load", {{ $chart->id }}_load);
</script>
