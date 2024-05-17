var sampleChartClass;
(function ($) {
    $(document).ready(function () {
        var salidaNa_names = window.nacionalSalidaCounts1;
        var salidaNa_values = window.nacionalSalidaCounts2;

        // console.log(window.nacionalSalidaCounts1, 'namesSA');
        // console.log(window.nacionalSalidaCounts2, 'cuantasSA');

        const ctx = document.getElementById('Grafica2vnll').getContext('2d');
        sampleChartClass.ChartData(ctx, 'doughnut', salidaNa_names, salidaNa_values)
    });

    sampleChartClass = {
        ChartData: function (ctx, type, salidaNa_names, salidaNa_values) {
            new Chart(ctx, {
                type: type,
                data: {
                    labels: salidaNa_names,
                    datasets: [{
                        label: 'Aerolineas',
                        data: salidaNa_values,
                        backgroundColor: [
                            'rgb(255, 99, 132)',
                            'rgb(54, 162, 235)',
                            'rgb(255, 205, 86)',
                            'rgb(75, 192, 192)',
                            'rgb(153, 102, 255)',
                            'rgb(255, 159, 64)',
                            'rgb(51, 204, 51)',
                            'rgb(255, 102, 102)',
                            'rgb(102, 255, 102)',
                            'rgb(255, 153, 51)'
                          ],
                          hoverOffset: 4
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    },
                    layout: {
                        padding: 20
                    }
                }
            });
        }
    }
})(jQuery);