<div class="empyData mt-7">
    <div class="mx-auto flex min-h-[30rem] w-full justify-center">
        <div
            class="mx-auto w-full h-96 flex flex-col justify-center items-center"
            x-data="{ chart: null }"
            x-init="
                chart = new Chart(document.getElementById('myChart').getContext('2d'), {
                    type: 'line',
                    data: {
                        labels: @js($dateRange),
                        datasets: @js(
                                    isset($datasets)
                                        ? collect($datasets)->map(function ($ds) {
                                            $color = rand(0, 360);
                                            return [
                                                "label" => $ds["label"],
                                                "data" => $ds["data"],
                                                "borderWidth" => 3,
                                                "tension" => 0.3,
                                                "fill" => true,
                                                "borderColor" => "hsl($color, 80%, 50%)",
                                                "backgroundColor" => "hsla($color, 80%, 50%, 0.2)",
                                            ];
                                        })
                                        : []
                                ),
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        scales: {
                            yAxes: [
                                {
                                    ticks: {
                                        beginAtZero: true,
                                        userCallback: function (value, index, values) {
                                            // Convert the number to a string and splite the string every 3 charaters from the end
                                            value = value.toString()
                                            value = value.split(/(?=(?:...)*$)/)

                                            // Convert the array to a string and format the output
                                            value = value.join('.')
                                            return value
                                        },
                                    },
                                },
                            ],
                        },
                    },
                })
            "
        >
            <canvas id="myChart"></canvas>
        </div>
    </div>
</div>
