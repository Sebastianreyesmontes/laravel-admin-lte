var sampleChartClass;
(function ($) {
    $(document).ready(function () {
        console.log(dates, 'variable dates');

        // var labels = dates.map(item => item.airline_code);
        // console.log(labels, 'variable labels');

        var llegadaNa_names = window.nacionalLlegadaCounts1;
        var llegadaNa_values = window.nacionalLlegadaCounts2;

        const ctx = document.getElementById('Grafica1vnll').getContext('2d');
        sampleChartClass.ChartData(ctx, 'pie', llegadaNa_names, llegadaNa_values)
    });

    sampleChartClass = {
        ChartData: function (ctx, type, llegadaNa_names, llegadaNa_values) {
            new Chart(ctx, {
                type: type,
                data: {
                    labels: llegadaNa_names,
                    datasets: [{
                        label: llegadaNa_names,
                        data: llegadaNa_values,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(255, 159, 64, 0.2)',
                            'rgba(255, 205, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(201, 203, 207, 0.2)'
                        ],
                        borderColor: [
                            'rgb(255, 99, 132)',
                            'rgb(255, 159, 64)',
                            'rgb(255, 205, 86)',
                            'rgb(75, 192, 192)',
                            'rgb(54, 162, 235)',
                            'rgb(153, 102, 255)',
                            'rgb(201, 203, 207)'
                        ],
                        borderWidth: 1
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