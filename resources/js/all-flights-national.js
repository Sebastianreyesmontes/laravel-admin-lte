var sampleChartClass;
(function ($) {
    $(document).ready(function () {

        var llegadaDataNA = window.nacionalLlegadaCounts2;
        var salidaDataNA = window.nacionalSalidaCounts2;

        var labels = window.nacionalSalidaCounts1;

        // console.log(window.namesallNa, 'All namesNA');
        // console.log(window.countsallNa, 'All cuantasNA');

        const ctx = document.getElementById('Graficall').getContext('2d');
        sampleChartClass.ChartData(ctx, 'bar', labels, llegadaDataNA, salidaDataNA)
    });

    sampleChartClass = {
        ChartData: function (ctx, type, labels, llegadaDataNA, salidaDataNA) {
            new Chart(ctx, {
                type: type,
                data: {
                    labels: labels,
                    datasets: [
                        {
                            label: 'Salida',
                            data: salidaDataNA,
                            backgroundColor: 'rgb(255, 99, 132)',
                        },
                        {
                            label: 'Llegada',
                            data: llegadaDataNA,
                            backgroundColor: 'rgb(54, 162, 235)',
                        },
                    ],
                },
                options: {
                    scales: {
                        x: {
                            mode: 'group',
                        },
                        y: {
                            beginAtZero: true,
                        },
                    }
                }
            });
        }
    }
})(jQuery);