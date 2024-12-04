var chartColors = [
    "#b91d47",
    "#00aba9",
    "#2b5797",
    "#e8c3b9",
    "#1e7145",
    "#ffc107",
    "#28a745",
    "#17a2b8",
    "#dc3545",
    "#6f42c1",
];

new Chart("studentChart", {
    type: "pie",
    data: {
        labels: majors,
        datasets: [
            {
                backgroundColor: chartColors.slice(0, majors.length),
                data: studentCounts,
            },
        ],
    },
    options: {
        responsive: true,
        plugins: {
            legend: {
                position: "top",
            },
            tooltip: {
                callbacks: {
                    label: function (tooltipItem) {
                        const total = studentCounts.reduce((a, b) => a + b, 0);
                        const value = tooltipItem.raw;
                        const percentage = ((value / total) * 100).toFixed(2);
                        return `${tooltipItem.label}: ${value} siswa (${percentage}%)`;
                    },
                },
            },
        },
        title: {
            display: true,
            text: "Data Jumlah Siswa per Jurusan",
        },
    },
});
