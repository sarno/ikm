<div
    x-data="{ chart: null }"
    x-init="
        Alpine.nextTick(() => {
            chart = new Chart($refs.canvas.getContext('2d'), {
                type: 'line',
                data: {
                    labels: @js($dateRange),
                    datasets: [],
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        xAxes: [
                            {
                                // You might need more specific configuration here based on your date range
                            },
                        ],
                        yAxes: [
                            {
                                ticks: {
                                    beginAtZero: true,
                                    callback: function (value, index, values) {
                                        return value + '%'
                                    },
                                },
                            },
                        ],
                    },
                },
            })
        })

        Livewire.on('updatePelayananDailyChart', (payload) => {
            console.log(payload)

            chart.data.labels = payload.dateRange

            chart.data.datasets = payload.datasets.map((ds, idx) => {
                const colors = [
                    'rgba(255, 99, 132, 1)', // Red
                    'rgba(54, 162, 235, 1)', // Blue
                    'rgba(255, 206, 86, 1)', // Yellow
                    'rgba(75, 192, 192, 1)', // Green
                    'rgba(153, 102, 255, 1)', // Purple
                    'rgba(255, 159, 64, 1)', // Orange
                ]
                const borderColor = colors[idx % colors.length]
                const backgroundColor = borderColor.replace('1)', '0.2)') // Use a lighter fill color

                return {
                    label: ds.label,
                    data: ds.data,
                    borderWidth: 2,
                    borderColor: borderColor,
                    backgroundColor: backgroundColor, // Add background color for better visibility
                    tension: 0.3,
                    fill: true, // Fill under the line
                }
            })

            chart.update()
        })
    "
>
    <canvas x-ref="canvas" class="w-full h-[250px]"></canvas>
</div>
