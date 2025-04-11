<h1>Báo Cáo Thống Kê</h1>
    <div>
        <h2>Tổng Doanh Thu: <?php echo number_format($revenue, 0, ',', '.'); ?> VNĐ</h2>
        <h2>Tổng Đơn Hàng Hoàn Thành: <?php echo $totalDH; ?></h2>
        <h2>Tổng Người Dùng: <?php echo $totalUser; ?></h2>
        <h2>Lợi Nhuận: <?php echo number_format($loiNhuan, 0, ',', '.'); ?> VNĐ</h2>
    </div>

    <h2>Lợi Nhuận Theo Tháng</h2>
    <canvas id="monthlyProfitChart"></canvas> <!-- Biểu đồ lợi nhuận -->
    
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('monthlyProfitChart').getContext('2d');
        const monthlyProfitData = <?php echo $bieudoArray; ?>;
        const monthlyLabels = <?php echo $bieudoArrayMoth; ?>;

        const myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: monthlyLabels,
                datasets: [{
                    label: 'Lợi Nhuận Hàng Tháng',
                    data: monthlyProfitData,
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 2,
                    fill: false
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>