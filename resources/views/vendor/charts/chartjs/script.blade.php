<script type="text/javascript">
    let {{ $chart->id }}_load = function () {
        if (document.getElementById("{{ $chart->id }}")) {
            window.{{ $chart->id }} = new Chart(document.getElementById("{{ $chart->id }}").getContext("2d"), {
                type: "{{ $chart->formatType() }}",
                data: {
                    labels: {!! $chart->formatLabels() !!},
                    datasets: {!! $chart->formatDatasets() !!}
                },
                options: {!! $chart->formatOptions(true) !!}
            });
        }
    };
    window.addEventListener("load", {{ $chart->id }}_load);
    document.addEventListener("turbolinks:load", {{ $chart->id }}_load);
</script>
